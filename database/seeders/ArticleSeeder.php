<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\CategorieArticle;
use App\Models\Media;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        // Catégories cibles
        $categories = [
            'societe', 'sante', 'culture', 'opinion',
            'politique', 'economie', 'sport', 'communication'
        ];

        for ($i = 1; $i <= 20; $i++) {
            // Catégorie aléatoire existante
            $categorie = CategorieArticle::whereIn('libelle', $categories)->inRandomOrder()->first();

            // Création du média associé
            $media = Media::create([
                'redacteur_id' => 6, // adapte selon ton user connecté
                'titre' => 'Image illustrant l’article ' . $i,
                'slug' => Str::slug('media-article-' . uniqid()),
                'description' => '<p>Image d’illustration pour l’article <strong>' . $i . '</strong>. 
                Ce média accompagne un contenu informatif lié à la catégorie <em>' . $categorie->libelle . '</em>.</p>',
                'image' => 'articles/2025-11-12/article-test.jpg',
            ]);

            // Création de l’article
            Article::create([
                'media_id' => $media->id,
                'categorie_article_id' => $categorie->id,
                'type_article_id' => 6, 
                'sous_titre' => 'Sous-titre de l’article numéro ' . $i,
                'views' => rand(50, 1000),
                'created_at' => now()->subDays(rand(0, 30)),
                'updated_at' => now(),
            ]);
        }
    }
}
