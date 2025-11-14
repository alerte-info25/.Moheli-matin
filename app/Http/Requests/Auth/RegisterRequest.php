<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as RulesPassword;

class RegisterRequest extends FormRequest
{
    /**
     * Déterminer si l'utilisateur est autorisé à faire cette requête.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Règles de validation correspondant à ton formulaire.
     */
    public function rules(): array
    {
        return [
            'prenom' => ['required', 'string', 'max:50', 'min:2'],
            'nom' => ['required', 'string', 'max:50', 'min:2'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
            'contact' => ['required', 'string', 'max:20'],
            'genre' => ['required', 'in:homme,Femme,autres'],
            'localite' => ['required', 'string', 'max:100'],
            'password' => ['required', 'confirmed', RulesPassword::min(8)],
            'terms' => ['accepted'],
            'newsletter' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Messages d’erreur personnalisés.
     */
    public function messages(): array
    {
        return [
            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.string' => 'Le prénom doit être une chaîne de caractères.',
            'prenom.max' => 'Le prénom ne peut pas dépasser :max caractères.',
            'prenom.min' => 'Le prénom doit contenir au moins :min caractères.',

            'nom.required' => 'Le nom est obligatoire.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.max' => 'Le nom ne peut pas dépasser :max caractères.',
            'nom.min' => 'Le nom doit contenir au moins :min caractères.',

            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'email.max' => 'L\'adresse email ne peut pas dépasser :max caractères.',

            'contact.required' => 'Le numéro de téléphone est obligatoire.',
            'contact.max' => 'Le numéro de téléphone ne peut pas dépasser :max caractères.',

            'genre.required' => 'Veuillez sélectionner votre genre.',
            'genre.in' => 'Le genre sélectionné n’est pas valide.',

            'localite.required' => 'La localité est obligatoire.',
            'localite.max' => 'La localité ne peut pas dépasser :max caractères.',

            'password.required' => 'Le mot de passe est obligatoire.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',

            'terms.accepted' => 'Vous devez accepter les conditions d\'utilisation.',
        ];
    }

    /**
     * Nettoyage avant validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'prenom' => trim($this->prenom),
            'nom' => trim($this->nom),
            'email' => strtolower(trim($this->email)),
            'contact' => $this->contact ? trim($this->contact) : null,
            'localite' => $this->localite ? trim($this->localite) : null,
            'newsletter' => $this->has('newsletter'),
        ]);
    }
}
