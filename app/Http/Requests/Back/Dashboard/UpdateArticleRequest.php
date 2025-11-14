<?php

namespace App\Http\Requests\Back\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Ajustez selon votre logique d'autorisation
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10048',
            'category' => 'required|string',
            'type' => 'required|string',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => "Le titre de l'article est obligatoire.",
            'subtitle.required' => "Le sous titre de l'article est obligatoire.",
            'content.required' => "Le contenu de l'article ne peut pas être vide.",
            'tags.required' => "Le champ tag de l'article ne peut pas être vide.",
            'category.required' => "Veuillez choisir une catégorie.",
            'image.image' => "Le fichier doit être une image valide.",
            'image.mimes' => "L'image doit être de type jpeg, png, jpg, gif ou webp.",
            'image.max' => "L'image ne doit pas dépasser 10 Mo.",
            'type.required' => "Le type de l'article est requis.",
        ];
    }
}