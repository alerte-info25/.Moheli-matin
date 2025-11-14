<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dernières vidéos YouTube de MOHELI MATIN - Actualités, reportages et documentaires">
    <meta name="keywords" content="Mohéli, Comores, vidéos, YouTube, actualités, reportages">
    <title>Vidéos | MOHELI MATIN | Journal en ligne de Mohéli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Front/videos.css") }}">
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <i class="fas fa-video"></i>
            </div>
            <h2>MOHELI MATIN</h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p>Chargement des vidéos...</p>
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

    @include("Front.Partials.header")

    <!-- Main Content -->
    <main class="main-content">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-container">
                    <div class="hero-content">
                        <div class="hero-eyebrow">
                            <div class="eyebrow-icon">
                                <i class="fas fa-play-circle"></i>
                            </div>
                            <span class="eyebrow-text">VIDÉOS EN DIRECT</span>
                        </div>

                        <h1 class="hero-title">
                            Les <span class="highlight">vidéos</span> de Mohéli en continu
                        </h1>

                        <p class="hero-subtitle">
                            Découvrez les dernières vidéos, reportages et documentaires sur la vie à Mohéli. 
                            Informez-vous avec des contenus visuels captivants sur les événements qui marquent notre île.
                        </p>

                        <div class="hero-cta">
                            <a href="#videos-section" class="btn-primary" style="text-decoration: none">
                                <i class="fas fa-play"></i>
                                Voir les vidéos
                            </a>
                            <a href="{{ route("moheli.front.acceuil") }}" style="text-decoration: " class="btn-secondary">
                                <i class="fas fa-newspaper"></i>
                                Retour aux articles
                            </a>
                        </div>
                    </div>

                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéos Mohéli">
                        <div class="image-overlay">
                            <h3>Découvrez, vibrez, regardez</h3>
                            <p>Découvrez les meilleures vidéos de Mohéli, entre actualités, culture et découvertes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Latest Videos Section -->
        <section class="videos-section" id="videos-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Dernières Vidéos</h2>
                    <a href="#" class="view-all">
                        Voir tout
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                @include("Front.Videos.latest-video")

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
    
    <script src="{{ asset("js/Front/videos.js") }}"></script>
</body>
</html>