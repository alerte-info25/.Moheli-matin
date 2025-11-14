<?php

namespace App\Http\Controllers\Front\Contact;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserContactController extends Controller
{
    public function index ()
    {
        return view('Front.Contact.index');
    }

    public function store(Request $request)
    {
        // Validation des champs
        $validated = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:30',
            'sujet' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ], [
            'prenom.required' => 'Le prénom est obligatoire.',
            'nom.required' => 'Le nom est obligatoire.',
            'email.required' => 'L’adresse email est obligatoire.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'sujet.required' => 'Veuillez sélectionner un sujet.',
            'message.required' => 'Veuillez écrire un message.',
        ]);

        // dd($validated);

        // Sauvegarde en base
        Message::create($validated);

        // Envoyer l'email
        Mail::to('haybafm41@gmail.com')
            ->queue(new ContactMessage($validated));

        // Redirection avec message de succès
        return redirect()->back()->with('alert', [
            'type' => 'success',
            'action' => 'send',
            'reason' => 'message envoyé',
            'message' => 'Votre message a bien été envoyé ! nous vous contacterons bientôt.'
        ]);
    }
}
