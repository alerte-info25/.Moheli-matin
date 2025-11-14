<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dernières informations et vidéos de MOHELI MATIN - Actualités en temps réel">
    <meta name="keywords" content="Mohéli, Comores, dernières infos, actualités, vidéos YouTube, breaking news">
    <title>Dernières Infos | MOHELI MATIN | Journal en ligne de Mohéli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Front/LastInfos.css") }}">
</head>
<body>

    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <i class="fas fa-fire"></i>
            </div>
            <h2>MOHELI MATIN</h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p>Chargement des dernières infos...</p>
        </div>
    </div>

    <!-- Toast Container -->
    @if (session()->has("alert"))
        <!-- Toast Container -->
        <div class="toast-container" id="toastContainer">
            <div class="custom-toast toast-{{ session("alert")["type"] }}">
                <div class="toast-icon">
                    <i class="fas fa-check"></i>
                </div>
                <div class="toast-content">
                    <h4>
                        {{ session("alert")["reason"] }}
                    </h4>
                    <p>
                        {{ session("alert")["message"] }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    <!-- Search Modal -->
    @include("Front.Partials.search")

    <!-- Video Modal -->
    <div class="video-modal" id="videoModal">
        <div class="video-modal-content">
            <button class="close-video-modal" id="closeVideoModal">
                <i class="fas fa-times"></i>
            </button>
            <div class="video-modal-iframe" id="videoModalIframe">
                <!-- YouTube iframe will be inserted here -->
            </div>
        </div>
    </div>

    @include("Front.Partials.header")

    <!-- Main Content -->
    <main class="main-content">

        <div class="breaking-news-banner">
            <div class="container">
                <div class="breaking-news-content">
                    <div class="breaking-news-label">BREAKING NEWS</div>
                    <div class="breaking-news-text">
                        {{ $flash->media->titre }}
                    </div>
                </div>
            </div>
        </div>

        @include("Front.Rubriques.slide")

        <!-- Latest News Section -->
        <section class="latest-news-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Dernières actualités</h2>
                </div>

                <div class="latest-news-grid">
                    @forelse ($AllArticles as $article)
                        <!-- Article -->
                        <div class="news-card">
                            <div class="news-image-wrapper">
                                <img src="{{ asset("storage/".$article->media->image) }}" alt="Actualité" class="news-image">
                                <span class="news-category-tag breaking-badge">{{ $article->categorieArticle->libelle }}</span>
                                <span class="news-date">
                                    {{ $article->typeArticle->libelle }}
                                </span>
                            </div>
                            <div class="news-content">
                                <h3 class="news-title">
                                    <a href="{{ route("moheli.front.detail-article", ['slug' => $article->media->slug]) }}" style="text-decoration: none">
                                        {{ $article->media->titre }}
                                    </a>
                                </h3>
                                <a href="{{ route("moheli.front.detail-article", ['slug' => $article->media->slug]) }}" style="text-decoration: none" class="news-excerpt">
                                    {{ Str::limit(strip_tags($article->media->description), 200, ' (...)') }}
                                </a>
                                <div class="news-footer">
                                    <a class="news-read-more">
                                        <i class="far fa-calendar"></i>
                                        {{ $article->created_at->format('d M') }}
                                    </a>
                                    <div class="news-stats">
                                        <span><i class="far fa-eye"></i> {{ $article->views }}</span>
                                        <span><i class="far fa-comment"></i> {{ $article->commentaires_count }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-warning">Aucun article trouvé.</div>
                    @endforelse
                    
                </div>
                {{ $AllArticles->links() }}
            </div>
        </section>

        <!-- Footer -->
        @include("Front.Partials.footer")
    </main>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTop">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="{{ asset("js/Front/LastInfos.js") }}"></script>
</body>
</html>