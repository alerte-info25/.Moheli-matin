<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mes articles sauvegardés - Journal en ligne de Mohéli">
    <meta name="keywords" content="Mohéli, Comores, actualités, journal, news, favoris, sauvegardés">
    <title>Mes articles sauvegardés | MOHELI MATIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Front/save.css") }}">
</head>
<body>

    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <i class="fa-solid fa-floppy-disk"></i>
            </div>
            <h2>MOHELI MATIN</h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p>Chargement des articles sauvegardés...</p>
        </div>
    </div>

    <!-- Header -->
    <header class="main-header" id="mainHeader">
        <div class="container">
            <div class="header-content">
                <div class="logo-section">
                    <a href="index.html" style="text-decoration: none; display: flex; align-items: center; gap: 1.2rem;">
                        <div class="logo-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="logo-text">
                            <h1>MOHELI MATIN</h1>
                            <span>Journal en ligne de Mohéli</span>
                        </div>
                    </a>
                </div>

                <div class="header-actions">
                    <a href="{{ route("moheli.front.acceuil") }}" class="btn btn-secondary" style="text-decoration: none;">
                        <i class="fas fa-arrow-left"></i>
                        Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Saved Articles Hero -->
        <section class="saved-articles-hero">
            <div class="container">
                <div class="saved-articles-content">
                    <h1 class="saved-articles-title">Mes articles sauvegardés</h1>
                    <p class="saved-articles-subtitle">
                        Retrouvez tous les articles que vous avez sauvegardés pour les lire plus tard
                    </p>
                    <div class="saved-count" id="savedCount" style="color: #fff">{{ $articles->total() }} articles sauvegardés</div>
                </div>
            </div>
        </section>

        <!-- Saved Articles -->
        <section class="saved-articles-section">
            <div class="container">
                <div class="saved-articles-grid" id="articles">
                    @if ($articles)
                        @forelse ($articles as $article)
                            <!-- Article -->
                            <div class="saved-article-card">
                                <div class="saved-image-wrapper">
                                    <img src="{{ asset("storage/".$article->media->image) }}" alt="Article sauvegardé" class="saved-image">
                                    <span class="saved-category-tag">{{ $article->categorieArticle->libelle }}</span>
                                    <span class="saved-date">
                                        <i class="far fa-calendar"></i> Publié lé
                                        {{ $article->media->created_at->format("d M H:i:s") }}
                                    </span>
                                </div>
                                <div class="saved-content">
                                    <a href="{{ route("moheli.front.detail-article", ['slug' => $article->media->slug]) }}" style="text-decoration: none;" class="saved-title">
                                        {{ $article->media->titre }}
                                    </a>
                                    <p class="saved-excerpt">
                                        {{ Str::limit(strip_tags($article->media->description), 350, ' (...)') }}
                                    </p>
                                    <div class="saved-footer">
                                        <a href="{{ route("moheli.front.detail-article", ['slug' => $article->media->slug]) }}" class="saved-read-more">
                                            Lire la suite
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                        <div class="saved-actions">
                                            <form action="{{ route("moheli.article.toggleSave", ["article" => $article->id]) }}" method="post" onclick="return confirm('voulez-vous retirer cet article de votre espace ?')">
                                                @csrf
                                                <button class="remove-saved" style="all: unset; display: flex; align-items: center; justify-content: space-between; gap: 12px">
                                                    <i class="far fa-bookmark"></i>
                                                    <span class="save-text">
                                                        Retiré
                                                    </span>
                                                </button>
                                            </form>
                                            <span class="mark-read" data-id="1">
                                                <i class="fas fa-check-circle"></i>
                                                sauvegardé le {{ $article->created_at->format("d M H:i:s") }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-warning">Vous n'avez sauvegardé aucun article.</div>
                        @endforelse
                    @endif
                </div>

                @if ($articles)
                    {{ $articles->links() }}
                @endif
                
            </div>
        </section>

        <!-- Reading Suggestions -->
        <section class="reading-suggestions">
            <div class="container">
                <h3 class="suggestion-title">Articles que vous pourriez aimer</h3>
                <div class="suggestion-tags">
                    <a href="{{ route('moheli.front.rubrique', ['slug' => 'politique']) }}" style="text-decoration: none;" class="suggestion-tag">Politique</a>
                    <a href="{{ route('moheli.front.rubrique', ['slug' => 'economie']) }}" style="text-decoration: none;" class="suggestion-tag">Économie</a>
                    <a href="{{ route('moheli.front.rubrique', ['slug' => 'sport']) }}" style="text-decoration: none;" class="suggestion-tag">Sport</a>
                    <a href="{{ route('moheli.front.rubrique', ['slug' => 'culture']) }}" style="text-decoration: none;" class="suggestion-tag">Culture</a>
                    <a href="{{ route('moheli.front.rubrique', ['slug' => 'sante']) }}" style="text-decoration: none;" class="suggestion-tag">Santé</a>
                    <a href="{{ route('moheli.front.rubrique', ['slug' => 'opinion']) }}" style="text-decoration: none;" class="suggestion-tag">Opinion</a>
                    <a href="{{ route('moheli.front.rubrique', ['slug' => 'communication']) }}" style="text-decoration: none;" class="suggestion-tag">Communication</a>
                    <a href="{{ route('moheli.front.rubrique', ['slug' => 'societe']) }}" style="text-decoration: none;" class="suggestion-tag">Société</a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        @include("Front.Partials.footer")
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="{{ asset("js/Front/save.js") }}"></script>
</body>
</html>