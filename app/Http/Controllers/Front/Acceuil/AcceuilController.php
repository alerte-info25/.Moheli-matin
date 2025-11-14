<?php

namespace App\Http\Controllers\Front\Acceuil;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Audio;
use App\Models\CategorieArticle;
use App\Models\CategorieAudio;
use App\Models\CategorieVideo;
use App\Models\Publicite;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcceuilController extends Controller
{
    public function index()
    {
        // SECTION 1 : 3 articles récents
        $section1 = Article::with(['media', 'categorieArticle'])
            ->withCount('commentaires') // ← ajoute le nombre de commentaires
            ->latest()
            ->take(3)
            ->get();

        // SECTION 2 : 4 autres articles, exclus de section1
        $section2 = Article::with(['media', 'categorieArticle'])
            ->withCount('commentaires')
            ->whereNotIn('id', $section1->pluck('id'))
            ->latest()
            ->take(4)
            ->get();

        // SECTION 3 : 6 autres articles, exclus de section1 et section2
        $section3 = Article::with(['media', 'categorieArticle'])
            ->withCount('commentaires')
            ->whereNotIn('id', $section1->pluck('id')->merge($section2->pluck('id')))
            ->latest()
            ->take(6)
            ->get();

        // SECTION 4 : 1 article de société, santé, culture (exclus des précédents)
        $excludes = $section1->pluck('id')
            ->merge($section2->pluck('id'))
            ->merge($section3->pluck('id'));

        $categories = ['opinion', 'communication', 'sport'];
        $section4 = [];

        foreach ($categories as $cat) {
            $categorie = CategorieArticle::where('libelle', $cat)->first();

            if ($categorie) {
                $article = Article::with(['media', 'categorieArticle'])
                    ->withCount('commentaires')
                    ->where('categorie_article_id', $categorie->id)
                    ->whereNotIn('id', $excludes)
                    ->latest()
                    ->first();

                if ($article) {
                    $section4[$cat] = $article;
                    $excludes->push($article->id);
                }
            }
        }

        // Tous les podcasts vidéo
        $videos = Video::with(['media', 'categorieVideo'])
            ->latest()
            ->take(3)
            ->get();

        // 5 dernières publicités actives
        $publicites = Publicite::active()
            ->orderByDesc('start_date')
            ->limit(5)
            ->get();


        return view('Front.Acceuil.index', compact('section1', 'section2', 'section3', 'section4', 'videos', 'publicites'));
    }

    public function render(string $slug)
    {
        // Récupérer l'article principal via le slug du média
        $article = Article::whereHas('media', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->with(['media', 'categorieArticle', 'typeArticle', 'commentaires.user', 'media.tags'])->withCount("commentaires")->firstOrFail();

        // catégories d'articles
        $categoriesArticle = CategorieArticle::withCount('articles')
            ->orderByDesc('articles_count')
            ->get();

        // Récupérer les articles similaires (même catégorie ou même type)
        $articlesSimilaires = Article::where('id', '!=', $article->id)
            ->where(function ($query) use ($article) {
                $query->where('categorie_article_id', $article->categorie_article_id)
                    ->orWhere('type_article_id', $article->type_article_id);
            })
            ->with(['media', 'categorieArticle', 'typeArticle', 'media.tags'])
            ->latest()
            ->take(4)
            ->get();

        // Incrémente le nombre de vues
        $article->increment('views');

        return view('Front.Details.detailActualite', compact('article', 'categoriesArticle', 'articlesSimilaires'));
    }

    /**
     * Sauvegarder ou retirer un article des favoris
     */
    public function toggleSave(Request $request, $articleId)
    {
        // Vérifier que l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->back()->with('alert', [
                'type' => 'error',
                'action' => 'sauvegarde',
                'reason' => 'auth',
                'message' => 'Vous devez être connecté pour sauvegarder un article'
            ]);
        }

        $article = Article::findOrFail($articleId);
        $user = Auth::user();

        // Vérifier si l'article est déjà sauvegardé
        $isSaved = $user->savedArticles()->where('article_id', $articleId)->exists();

        if ($isSaved) {
            // Retirer des favoris
            $user->savedArticles()->detach($articleId);
            
            return redirect()->back()->with('alert', [
                'type' => 'info',
                'action' => 'sauvegarde',
                'reason' => 'unsave',
                'message' => 'Cet article a été retiré de vos favoris.'
            ]);
        } else {
            // Ajouter aux favoris
            $user->savedArticles()->attach($articleId);
            
            return redirect()->back()->with('alert', [
                'type' => 'success',
                'action' => 'sauvegarde',
                'reason' => 'save',
                'message' => 'Cet article a été sauvegardé avec succès. Vous pouvez le retrouver dans votre espace.'
            ]);
        }
    }

    public function lastInfos ()
    {
        // SECTION 1 : 1 articles récent
        $flash = Article::with(['media', 'categorieArticle'])
            ->withCount('commentaires') // ← ajoute le nombre de commentaires
            ->latest()
            ->first();

        // SECTION 2 : 3 articles récents
        $slideArticles = Article::with(['media', 'categorieArticle'])
            ->withCount('commentaires') // ← ajoute le nombre de commentaires
            ->latest()
            ->take(3)
            ->get();

        // SECTION 3 : tout les autres articles, exclus de section1 et 2
        $AllArticles = Article::with(['media', 'categorieArticle'])
            ->withCount('commentaires')
            ->whereNotIn('id', $slideArticles->pluck('id'))
            ->latest()
            ->paginate(10);

        return view ("Front.LastInfos.index", compact("flash", "slideArticles", "AllArticles"));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        
        // Validation
        $request->validate([
            'q' => 'required|string|min:2|max:100'
        ]);

        // Recherche dans les articles via leur média
        $articles = Article::with(['media.redacteur', 'media.tags', 'categorieArticle', 'typeArticle'])
            ->whereHas('media', function($q) use ($query) {
                $q->where('titre', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->orWhere('sous_titre', 'LIKE', "%{$query}%")
            ->orWhereHas('media.tags', function($q) use ($query) {
                $q->where('libelle', 'LIKE', "%{$query}%");
            })
            ->latest()
            ->paginate(10);

        return view ("Front.Search.index", [
            'articles' => $articles,
            'query' => $query,
            'resultCount' => $articles->total()
        ]);
    }

    public function asSaved ()
    {
        $savedArticles = Auth::user()
            ->savedArticles()
            ->with(['media.redacteur', 'media.tags', 'categorieArticle', 'typeArticle'])
            ->withCount('savedByUsers') 
            ->paginate(10);

        return view ("Front.Save.index", [
            'articles' => $savedArticles
        ]);
    }

}
