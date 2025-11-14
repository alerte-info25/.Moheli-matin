<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $newsletter->media->titre ?? 'Newsletter Moheli Matin' }}</title>
    
    <link rel="stylesheet" href="{{ asset("css/Mail/newsletter.css") }}">
</head>
<body>
    <div class="newsletter-container">
        <!-- Header -->
        <div class="newsletter-header">
            <div class="header-content">
                <div class="newsletter-logo">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="newsletter-brand">
                    <h1 class="newsletter-title">Moheli Matin</h1>
                    <p class="newsletter-subtitle">Votre source d'information quotidienne</p>
                </div>
            </div>
            <p class="issue-date">Newsletter du {{ now()->format('d/m/Y') }}</p>
        </div>

        <!-- Hero Section -->
        <div class="hero-section">
            @if ($newsletter->media && $newsletter->media->image)
                <img src="{{ asset('storage/' . $newsletter->media->image) }}" alt="{{ $newsletter->media->titre }}" class="hero-image">
                <div class="image-overlay">
                    <h2 class="hero-title">{{ $newsletter->media->titre ?? 'Newsletter Moheli Matin' }}</h2>
                    @if ($newsletter->media->sous_titre)
                        <p class="hero-subtitle">{{ $newsletter->media->sous_titre }}</p>
                    @endif
                </div>
            @else
                <div style="background: linear-gradient(135deg, var(--primary-blue) 0%, var(--light-blue) 100%); height: 200px; display: flex; align-items: center; justify-content: center; color: white;">
                    <h2 class="hero-title">{{ $newsletter->media->titre ?? 'Newsletter Moheli Matin' }}</h2>
                </div>
            @endif
        </div>

        <!-- Content -->
        <div class="newsletter-content">
            @if ($newsletter->media && $newsletter->media->description)
                <div class="content-section">
                    <h3 class="section-title">À la une</h3>
                    <div class="newsletter-description">
                        {!! $newsletter->media->description !!}
                    </div>
                </div>
            @endif

            <!-- Call to Action -->
            <div class="cta-section">
                <h3 class="cta-title">Restez informé</h3>
                <p class="cta-text">
                    Ne manquez aucune actualité importante. Consultez notre site web pour découvrir 
                    tous les articles et rester connecté avec l'actualité en temps réel.
                </p>
                <a href="{{ url('/') }}" class="cta-button">
                    <i class="fas fa-external-link-alt"></i>
                    Visiter notre site
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="newsletter-footer">
            <div class="social-links">
                <a href="#" class="social-link">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-link">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-link">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="social-link">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>

            <div class="footer-links">
                <a href="{{ url('/') }}" class="footer-link">Accueil</a>
                <a href="{{ url('/actualites') }}" class="footer-link">Actualités</a>
                <a href="{{ url('/contact') }}" class="footer-link">Contact</a>
                <a href="{{ url('/a-propos') }}" class="footer-link">À propos</a>
            </div>

            <p class="copyright">
                © {{ now()->year }} Moheli Matin. Tous droits réservés.
            </p>

            <p class="unsubscribe">
                <a href="{{ url('/unsubscribe') }}">Se désabonner</a> de cette newsletter
            </p>
        </div>
    </div>

    <!-- Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</body>
</html>