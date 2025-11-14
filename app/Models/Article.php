<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_id',
        'categorie_article_id',
        'type_article_id',
        'sous_titre',
    ];

    public function media () 
    {
        return $this->belongsTo(Media::class);
    }

    public function categorieArticle ()
    {
        return $this->belongsTo(CategorieArticle::class);
    }

    public function typeArticle ()
    {
        return $this->belongsTo(TypeArticle::class);
    }

    public function commentaires ()
    {
        return $this->hasMany(Commentaire::class);
    }

    // Nouvelle relation pour les sauvegardes
    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'article_user_saves')
                    ->withTimestamps();
    }

    // Helper method pour vérifier si l'article est sauvegardé par un utilisateur
    public function isSavedBy($userId)
    {
        return $this->savedByUsers()->where('user_id', $userId)->exists();
    }

}
