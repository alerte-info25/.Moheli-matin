<?php

namespace App\Http\Controllers\Front\Rubriques;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CategorieArticle;
use Illuminate\Http\Request;

class RubriquesController extends Controller
{
    /**
     * Affiche les articles d'une rubrique dynamiquement
     */
    /**
     * Affiche les articles d'une rubrique dynamiquement
     */
    public function index($slug)
    {
        // Trouver la catégorie par slug ou libellé
        $category = CategorieArticle::where('libelle', $slug)
            ->orWhere('slug', $slug)
            ->firstOrFail();

        // Récupérer tous les articles de la catégorie
        $allArticles = Article::where('categorie_article_id', $category->id)
            ->with('media', 'categorieArticle', 'typeArticle', 'commentaires')
            ->withCount('commentaires')
            ->latest()
            ->get();

        // Vérifier qu'il y a assez d'articles
        if ($allArticles->count() < 4) {
            // Si moins de 4 articles, adapter la logique
            $slideArticles = $allArticles->take(3);
            $featuredArticle = $allArticles->skip(3)->first();
            $otherArticles = collect([]);
        } else {
            // 3 premiers articles pour le slide
            $slideArticles = $allArticles->take(3);
            
            // 1 article pour l'article à la une (le 4ème)
            $featuredArticle = $allArticles->skip(3)->first();
            
            // Le reste des articles (à partir du 5ème) avec pagination
            $otherArticles = Article::where('categorie_article_id', $category->id)
                ->with('media', 'categorieArticle', 'typeArticle', 'commentaires')
                ->withCount('commentaires')
                ->latest()
                ->skip(4) // Skip les 4 premiers (3 slide + 1 featured)
                ->paginate(10);
        }

        // Nom de variable dynamique pour compatibilité
        $variableName = $slug . 'Articles';

        return view("Front.Rubriques.{$slug}", [
            'slideArticles' => $slideArticles,
            'featuredArticle' => $featuredArticle,
            'otherArticles' => $otherArticles,
            'category' => $category,
            'allArticles' => $allArticles,
            $variableName => $otherArticles // Pour compatibilité avec vos vues existantes
        ]);
    }

    // Ou garder vos méthodes spécifiques qui appellent la méthode générique
    public function societes()
    {
        return $this->index('societe');
    }

    public function santes()
    {
        return $this->index('sante');
    }

    public function politiques()
    {
        return $this->index('politique');
    }

    public function cultures()
    {
        return $this->index('culture');
    }

    public function economies()
    {
        return $this->index('economie');
    }

    public function opinions()
    {
        return $this->index('opinion');
    }

    public function sports()
    {
        return $this->index('sport');
    }

    public function communications()
    {
        return $this->index('communication');
    }
}