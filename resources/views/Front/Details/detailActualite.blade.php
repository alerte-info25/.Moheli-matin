<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Article détaillé - Journal en ligne de Mohéli">
    <meta name="keywords" content="Mohéli, Comores, actualités, journal, news">
    <title>{{ $article->media->titre }} | MOHELI MATIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Front/detailActualite.css") }}">
</head>
<body>

    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <i class="fas fa-newspaper"></i>
            </div>
            <h2>MOHELI MATIN</h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p>Chargement de l'article...</p>
        </div>
    </div>

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

    @include("Front.Partials.search")

    @include("Front.Partials.header")

    <!-- Main Content -->
    <main class="main-content">
        <!-- Article Detail Section -->
        <section class="article-detail-section">
            <div class="container">
                <div class="article-header">
                    <span class="article-category">{{ $article->categorieArticle->libelle }}</span>
                    <h1 class="article-title">
                        {{ $article->media->titre }}
                    </h1>
                    
                    <div class="article-meta">
                        <div class="article-meta-item">
                            <i class="far fa-user"></i>
                            <span>Par {{ $article->media->redacteur->user->nom . " " . $article->media->redacteur->user->prenom }}</span>
                        </div>
                        <div class="article-meta-item">
                            <i class="far fa-calendar"></i>
                            <span>{{ $article->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="article-meta-item">
                            <i class="far fa-clock"></i>
                            <span>Lecture 5 min</span>
                        </div>
                        <div class="article-meta-item">
                            <i class="far fa-eye"></i>
                            <span>{{ $article->views }} vues</span>
                        </div>
                    </div>
                </div>

                <div class="article-hero-image">
                    <img src="{{ asset("storage/".$article->media->image) }}" alt="Plan de développement Mohéli">
                </div>

                <div class="article-content">
                    <div class="article-body">
                        <div class="article-intro">
                            {{ $article->sous_titre }}
                        </div>

                        <div class="article-text">
                            <div class="article-quote">
                                <p>
                                    {{ strip_tags($article->media->description) }}
                                </p>
                                {{-- <div class="article-quote-footer">— Président de l'Union des Comores</div> --}}
                            </div>
                        </div>

                        <div class="article-tags">
                            @foreach($article->media->tags as $tag)
                                <span class="article-tag">{{ $tag->libelle }}</span>
                            @endforeach
                        </div>

                        <div class="article-actions">
                            <form action="{{ route("moheli.article.toggleSave", ["article" => $article->id]) }}" method="post">
                                @csrf
                                <button class="article-action-btn">
                                    <i class="far fa-bookmark"></i>
                                    <span class="save-text">
                                        {{ Auth::check() && $article->isSavedBy(Auth::id()) ? 'Sauvegardé' : 'Sauvegarder' }}
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="article-sidebar">
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Articles similaires</h3>
                            <div class="related-articles">
                                @forelse ($articlesSimilaires as $similaire)
                                    <a href="{{ route("moheli.front.detail-article", ['slug' => $similaire->media->slug]) }}" style="text-decoration: none" class="related-article">
                                        <div class="related-article-image">
                                            <img src="{{ asset("storage/".$similaire->media->image) }}" alt="{{ $similaire->media->titre }}">
                                        </div>
                                        <div class="related-article-content">
                                            <h4 class="related-article-title">
                                                {{ $similaire->media->titre }}
                                            </h4>
                                            <div class="related-article-date">
                                                {{ $similaire->created_at->format('d M Y') }}
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <div class="alert alert-warning">Aucun article similaire trouvé.</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="comments-section">
                    <div class="comments-header">
                        <h2 class="comments-title">Commentaires</h2>
                        <span class="comments-count">{{ $article->commentaires_count }} commentaires</span>
                    </div>

                    @auth
                        <div class="comment-form">
                            <h3>Laisser un commentaire</h3>
                            <form id="commentForm" method="POST" action="{{ route("moheli.comments.store") }}">
                                @csrf
                                <input type="hidden" name="article_id" value="{{ $article->id }}">

                                <div class="form-group">
                                    <label for="commentMessage" class="form-label">Message</label>
                                    <textarea id="commentMessage" class="form-control form-textarea" name="contenu" required></textarea>
                                </div>
                                <button type="submit" class="btn-submit">
                                    <i class="fas fa-paper-plane"></i>
                                    Publier le commentaire
                                </button>
                            </form>
                        </div>
                    @endauth

                    <div class="comments-list">
                        @if($article->commentaires->isNotEmpty())
                            @forelse($article->commentaires as $commentaire)
                                <!-- Comment 1 -->
                                <div class="comment">
                                    <div class="comment-header">
                                        <div class="comment-author">
                                            <div class="comment-avatar">
                                                {{ substr(auth()->user()->nom, 0, 1) . substr(auth()->user()->prenom, 0, 1) }}
                                            </div>
                                            <div class="comment-author-info">
                                                <h4>
                                                    {{ $commentaire->user->nom . " " . $commentaire->user->prenom }}
                                                </h4>
                                                <div class="comment-date">
                                                    {{ $commentaire->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-actions">
                                            <button class="comment-action">
                                            </button>
                                        </div>
                                    </div>
                                    <div class="comment-text">
                                        {{ $commentaire->contenu }}
                                    </div>
                                </div>
                                @empty
                                <div class="alert alert-warning">Aucun commentaire trouvé.</div>
                            @endforelse
                        @endif
                        
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter Section -->
        @include("Front.Newsletters.index")

        <!-- Footer -->
        @include("Front.Partials.footer")
    </main>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTop">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="{{ asset("js/Front/detailActualite.js") }}"></script>
</body>
</html>