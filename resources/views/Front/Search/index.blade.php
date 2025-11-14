<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Résultats de recherche - Journal en ligne de Mohéli">
    <meta name="keywords" content="Mohéli, Comores, actualités, journal, news, recherche">
    <title>Résultats de recherche | MOHELI MATIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Front/search.css") }}">
</head>
<body>

    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <i class="fas fa-search"></i>
            </div>
            <h2>MOHELI MATIN</h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p>Chargement des résultats de recherche...</p>
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
                    <a href="{{ url()->previous() }}" class="btn btn-secondary" style="text-decoration: none;">
                        <i class="fas fa-arrow-left"></i>
                        Retour
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Search Results Hero -->
        <section class="search-results-hero">
            <div class="container">
                <div class="search-results-content">
                    <h1 class="search-results-title">Résultats de recherche</h1>
                    <p class="search-results-subtitle">
                        Vous avez recherché : <span class="search-query" id="searchQuery">"{{ $query }}"</span>
                    </p>
                    <div class="results-count" id="resultsCount" style="color: #fff">{{ $resultCount }} articles trouvés</div>
                </div>
            </div>
        </section>

        <!-- Search Results -->
        <section class="search-results-section">
            <div class="container">
                <div class="search-results-grid" id="searchResults">

                    @if($articles->isEmpty())
                        <div class="alert alert-warning">
                            <p>Aucun article trouvé pour votre recherche.</p>
                            <a href="{{ route('moheli.front.acceuil') }}" class="btn">Retour à l'accueil</a>
                        </div>
                    @else
                        @foreach ($articles as $article)
                            <!-- Result -->
                            <div class="search-result-card">
                                <div class="result-image-wrapper">
                                    <img src="{{ asset("storage/".$article->media->image) }}" alt="Résultat" class="result-image">
                                    <span class="result-category-tag">{{ $article->categorieArticle->libelle }}</span>
                                    <span class="result-date">
                                        <i class="far fa-calendar"></i>
                                        {{ $article->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <div class="result-content">
                                    <a href="{{ route("moheli.front.detail-article", ['slug' => $article->media->slug]) }}" class="result-title" style="text-decoration: none">
                                        {{ $article->media->titre }}
                                    </a>
                                    <p class="result-excerpt">
                                        {{ Str::limit(strip_tags($article->media->description), 400, ' (...)') }}
                                    </p>
                                    <div class="result-footer">
                                        <a href="{{ route("moheli.front.detail-article", ['slug' => $article->media->slug]) }}" class="result-read-more">
                                            Lire la suite
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                        <div class="result-stats">
                                            <span><i class="far fa-eye"></i> {{ $article->views }}</span>
                                            <span><i class="far fa-comment"></i> {{ $article->commentaires_count }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

                @if(!$articles->isEmpty())
                    {{ $articles->links() }}
                @endif

            </div>
        </section>

        <!-- Footer -->
        @include("Front.Partials.footer")
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="{{ asset("js/Front/search.js") }}"></script>

</body>
</html>