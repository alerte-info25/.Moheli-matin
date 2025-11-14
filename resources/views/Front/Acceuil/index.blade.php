<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Journal en ligne de Mohéli - Actualités, culture, société et sport">
    <meta name="keywords" content="Mohéli, Comores, actualités, journal, news">
    <title>MOHELI MATIN | Journal en ligne de Mohéli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Front/acceuil.css") }}">
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
            <p>Chargement des actualités...</p>
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

    <!-- Search Modal -->
    @include("Front.Partials.search")

    @include("Front.Partials.header")

    <!-- Main Content -->
    <main class="main-content">
        <!-- Hero Section avec Slider -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-container">
                    <!-- Slider Hero avec 3 articles -->
                    <div class="hero-slider" id="heroSlider">
                        
                        @include("Front.Acceuil.slide")
                        
                        <!-- Contrôles du slider -->
                        <div class="slider-nav">
                            <button class="slider-arrow prev-slide">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="slider-arrow next-slide">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                        
                        <!-- Indicateurs de slide -->
                        <div class="slider-controls">
                            <button class="slider-btn active" data-slide="0"></button>
                            <button class="slider-btn" data-slide="1"></button>
                            <button class="slider-btn" data-slide="2"></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Espace Publicitaire 1 -->
        @if(isset($publicites[0]))
            <div class="container">
                <div class="ad-container">
                    <a href="{{ $publicites[0]->link_url }}" class="ad-content">
                        <img src="{{ asset('storage/'.$publicites[0]->image_path) }}" class="ad-image"
                            style="height: {{ $publicites[0]->height }}px !important; display: block !important;">
                    </a>
                </div>
            </div>
            @else
                <div class="container">
                    <div class="ad-container">
                        <div class="ad-label">Publicité</div>
                        <div class="ad-content">
                            <i class="fas fa-ad"></i>
                            <p>Espace publicitaire disponible</p>
                            <a href="mailto:contact.moheli@gmail.com" class="news-read-more" style="background: #003366; color: #fff">Contactez-nous pour promouvoir votre entreprise</a>
                        </div>
                    </div>
                </div>
        @endif

        <!-- Featured Section -->
        @include("Front.Acceuil.featured")

        <!-- Videos Section -->
        @include("Front.Acceuil.videos")

        <!-- Espace Publicitaire 2 -->
        @if(isset($publicites[1]))
            <div class="container">
                <div class="ad-container">
                    <a href="{{ $publicites[1]->link_url }}" class="ad-content">
                        <img src="{{ asset('storage/'.$publicites[1]->image_path) }}" class="ad-image"
                            style="height: {{ $publicites[1]->height }}px !important; display: block !important;">
                    </a>
                </div>
            </div>
            @else
                <div class="container">
                    <div class="ad-container">
                        <div class="ad-label">Publicité</div>
                        <div class="ad-content">
                            <i class="fas fa-ad"></i>
                            <p>Espace publicitaire disponible</p>
                            <a href="mailto:contact.moheli@gmail.com" class="news-read-more" style="background: #003366; color: #fff">Contactez-nous pour promouvoir votre entreprise</a>
                        </div>
                    </div>
                </div>
        @endif
        

        <!-- Latest News -->
        @include("Front.Acceuil.latest-news")

        <!-- Espace Publicitaire 3 -->
        @if(isset($publicites[2]))
            <div class="container">
                <div class="ad-container">
                    <a href="{{ $publicites[2]->link_url }}" class="ad-content">
                        <img src="{{ asset('storage/'.$publicites[2]->image_path) }}" class="ad-image"
                            style="height: {{ $publicites[2]->height }}px !important; display: block !important;">
                    </a>
                </div>
            </div>
            @else
                <div class="container">
                    <div class="ad-container">
                        <div class="ad-label">Publicité</div>
                        <div class="ad-content">
                            <i class="fas fa-ad"></i>
                            <p>Espace publicitaire disponible</p>
                            <a href="mailto:contact.moheli@gmail.com" class="news-read-more" style="background: #003366; color: #fff">Contactez-nous pour promouvoir votre entreprise</a>
                        </div>
                    </div>
                </div>
        @endif

        <!-- Category Sections -->
        @include("Front.Acceuil.category")

        <!-- Espace Publicitaire 4 -->
        @if(isset($publicites[3]))
            <div class="container">
                <div class="ad-container">
                    <a href="{{ $publicites[2]->link_url }}" class="ad-content">
                        <img src="{{ asset('storage/'.$publicites[2]->image_path) }}" class="ad-image"
                            style="height: {{ $publicites[2]->height }}px !important; display: block !important;">
                    </a>
                </div>
            </div>
            @else
                <div class="container">
                    <div class="ad-container">
                        <div class="ad-label">Publicité</div>
                        <div class="ad-content">
                            <i class="fas fa-ad"></i>
                            <p>Espace publicitaire disponible</p>
                            <a href="mailto:contact.moheli@gmail.com" class="news-read-more" style="background: #003366; color: #fff">Contactez-nous pour promouvoir votre entreprise</a>
                        </div>
                    </div>
                </div>
        @endif

        @include("Front.Newsletters.index")

        <!-- Footer -->
        @include("Front.Partials.footer")
    </main>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTop">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="{{ asset("js/Front/acceuil.js") }}"></script>
</body>
</html>