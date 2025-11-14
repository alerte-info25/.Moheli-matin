<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\Welcome\WelcomeEmail;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Departement;
use App\Models\Genre;
use App\Models\Localite;
use App\Models\Redacteur;
use App\Models\TypeContact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLoginForm ()
    {

        if(!User::where("email", "admin@moheli-matin.com")->exists()) {

            try {
        
                DB::beginTransaction();

                $matricule = "red - ". uniqid();
                
                $genre = Genre::firstOrCreate([
                    'libelle' => 'admin'
                ]);

                $localite = Localite::firstOrCreate([
                    'libelle' => 'admin'
                ]);

                $typeContact = TypeContact::firstOrCreate([
                    'libelle' => 'telephone',
                ]);

                $departement = Departement::firstOrCreate([
                    'libelle' => 'redaction principale',
                ]);

                $user = User::firstOrCreate([
                    'genre_id' => $genre->id,
                    'localite_id' => $localite->id,
                    'nom' => 'admin',
                    'prenom' => 'super admin',
                    'email' => 'admin@moheli-matin.com',
                    'password' => Hash::make(env("ADMIN_PASSWORD")), 
                    'role' => 'admin',
                ]);

                $contact = Contact::firstOrCreate([
                    'type_contact_id' => $typeContact->id,
                    'user_id' => $user->id,
                    'libelle' => '0101010101',
                ]);

                $redacteur = Redacteur::firstOrCreate([
                    'user_id' => $user->id,
                    'departement_id' => $departement->id,
                    'matricule' => $matricule,
                    'profession' => "chef de service",
                    'date_embauche' => '2000-01-01'
                ]);

                DB::commit();

            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }

        }

        return view('Auth.login');
    }

    public function login (LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            $request->session()->regenerate();

            if ($user->hasRole('admin') || $user->hasRole('redacteur')) {
                return redirect()->intended(route('dashboard.audios'))->with('alert', [
                    'type' => 'success',
                    'message' => 'Bienvenue ' . $user->nom
                ]);
            }

            if ($user->hasRole('client')) {
                return redirect()->intended(route('moheli.front.acceuil'))->with('alert', [
                    'type' => 'success',
                    'action' => 'login',
                    'message' => 'Soyez la bienvenue ' . $user->nom,
                    'reason' => 'connexion'
                ]);
            }

            Auth::logout();

            return redirect()->back()->withErrors([
                'email' => 'Accès refusé. Rôle non autorisé.',
            ]);

        }

        return back()->withErrors([
            'email' => 'Les informations de connexion ne correspondent pas.',
        ])->withInput();

    }

    public function showRegisterForm ()
    {
        return view('Auth.register');
    }

    public function register(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();

            $genre = Genre::firstOrCreate([
                'libelle' => $data['genre']
            ]);

            $localite = Localite::firstOrCreate([
                'libelle' => $data['localite']
            ]);

            $typeContact = TypeContact::firstOrCreate([
                'libelle' => 'telephone',
            ]);

            $user = User::create([
                'genre_id' => $genre->id,
                'localite_id' => $localite->id,
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'client',
            ]);

            $contact = Contact::firstOrCreate(
                [
                    'type_contact_id' => $typeContact->id,
                    'libelle' => $data['contact'],
                ],
                [
                    'user_id' => $user->id,
                ]
            );

            $client = Client::create([
                'user_id' => $user->id
            ]);

            if (!empty($data['newsletter'])) {
                DB::table('news_letter_abonnes')->insertOrIgnore([
                    'email' => $data['email'],
                    'date_abonnement' => now(),
                    'actif' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            auth()->login($user);

            // Mail de bienvenue
            Mail::to($user->email)->queue(new WelcomeEmail($user));

            DB::commit();

            return to_route("moheli.front.acceuil")->with('alert', [
                'type' => 'success',
                'action' => 'register',
                'reason' => 'inscription',
                'message' => 'Votre compte a été créé avec succès ! Bienvenue sur MOHELI MATIN.'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Invalider la session
        $request->session()->invalidate();

        // Régénérer le token CSRF
        $request->session()->regenerateToken();

        return to_route("moheli.front.acceuil")->with('alert', [
            'type' => 'warning',
            'action' => 'logout',
            'reason' => 'deconnexion',
            'message' => 'Vous êtes actuellement déconnecté'
        ]);

    }
}
