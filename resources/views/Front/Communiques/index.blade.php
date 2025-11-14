<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Communiqués officiels - MOHELI MATIN - Tous les communiqués officiels de Mohéli">
    <meta name="keywords" content="Mohéli, Comores, communiqués, officiel, gouvernement, administration, déclarations">
    <title>Communiqués officiels | MOHELI MATIN | Journal en ligne de Mohéli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Front/communiques.css") }}">
</head>
<body>

    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <i class="fas fa-bullhorn"></i>
            </div>
            <h2>MOHELI MATIN</h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p>Chargement des communiqués officiels...</p>
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

    @include("Front.partials.search")

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
                                <i class="fas fa-bullhorn"></i>
                            </div>
                            <span class="eyebrow-text">COMMUNIQUÉS OFFICIELS</span>
                        </div>

                        <h1 class="hero-title">
                            Communiqués <span class="highlight">officiels</span>
                        </h1>

                        <p class="hero-subtitle">
                            Tous les communiqués officiels du gouvernement, des administrations 
                            et des institutions de l'île de Mohéli. Informations vérifiées et sources officielles.
                        </p>

                        <div class="hero-cta">
                            <a href="#communiques" class="btn-primary" style="text-decoration: none;">
                                <i class="fas fa-file-alt"></i>
                                Voir les communiqués
                            </a>
                            <a href="#newsletter" class="btn-secondary" style="text-decoration: none;">
                                <i class="fas fa-bell"></i>
                                Alertes articles
                            </a>
                        </div>
                    </div>

                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1551135049-8a33b4273818?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Communiqués officiels Mohéli">
                        <div class="image-overlay">
                            <h3>Sources officielles</h3>
                            <p>Informations vérifiées provenant des institutions de Mohéli</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Communiqués Section -->
        <section class="communiques-section" id="communiques">
            <div class="container">

                <div class="text-center mb-5">
                    <h2 class="section-title">Communiqués Officiels</h2>
                    <p class="section-subtitle">
                        Les déclarations officielles des institutions de Mohéli
                    </p>
                </div>

                <div class="communiques-grid">
                    @forelse ($communiques as $communique)
                        <!-- Communiqué -->
                        <article class="communique-card urgent">
                            <div class="communique-header">
                                <div>
                                    <h3 class="communique-title">
                                        {{ $communique->title }}
                                    </h3>
                                    <div class="communique-meta">
                                        <div class="communique-meta-item">
                                            <i class="fas fa-building"></i>
                                            <span>Gouvernement de Mohéli</span>
                                        </div>
                                        <div class="communique-meta-item">
                                            <i class="far fa-clock"></i>
                                            <span>
                                                {{ $communique->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <span class="communique-badge badge-urgent">MOHELI MATIN</span>
                            </div>
                            <div class="communique-body">
                                <p class="communique-excerpt">
                                    {{ Str::limit(strip_tags($communique->content), 250, ' (...)') }}
                                </p>
                                <div class="communique-actions">
                                    <a href="{{ route("moheli.front.communique.show", ["slug" => $communique->slug]) }}" style="text-decoration: none" class="btn-communique btn-read">
                                        <i class="fas fa-eye"></i>
                                        Lire le communiqué
                                    </a>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="alert alert-warning">Aucun communiqué trouvé.</div>
                    @endforelse
                    
                </div>

                @if ($communiques)
                    {{ $communiques->links() }}
                @endif
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
    
    <script src="{{ asset("js/Front/communiques.js") }}"></script>
</body>
</html>