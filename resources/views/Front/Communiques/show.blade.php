<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Communiqué officiel - Mesures exceptionnelles pour la sécurité publique - MOHELI MATIN">
    <meta name="keywords" content="Mohéli, Comores, communiqué, sécurité, gouvernement, mesures, couvre-feu">
    <title>Communiqué officiel - Mesures sécurité | MOHELI MATIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Front/showCommunique.css") }}">
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
            <p>Chargement du communiqué...</p>
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
                    <a href="{{ route("moheli.front.communique") }}" class="btn-secondary" style="text-decoration: none;">
                        <i class="fas fa-arrow-left"></i>
                        Retour aux communiqués
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">

        <!-- Communiqué Detail -->
        <section class="communique-detail-section">
            <div class="container">
                <div class="communique-container">
                    <!-- Communiqué Header -->
                    <div class="communique-header">
                        <div class="communique-badge">
                            {{-- <i class="fas fa-exclamation-triangle"></i> --}}
                            MOHELI MATIN
                        </div>
                        
                        <h1 class="communique-title">
                            {{ $communique->title }}
                        </h1>
                        
                        <div class="communique-meta">
                            <div class="meta-item">
                                <i class="far fa-clock"></i>
                                <span>Publié le {{ $communique->created_at->format('d M Y à H:i') }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-eye"></i>
                                <span>{{ $communique->views_count }} consultations</span>
                            </div>
                        </div>
                    </div>

                    @php
                        $images = json_decode($communique->images, true);
                    @endphp

                    @if ($images)
                        @foreach ($images as $img)
                            <img src="{{ asset('storage/' . $img) }}" alt="Image du communiqué">
                        @endforeach
                    @endif

                    <!-- Communiqué Content -->
                    <div class="communique-content">
                        <!-- Introduction -->
                        <div class="content-section">
                            <p class="content-text">
                                {{ strip_tags($communique->content) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include("Front.Partials.footer")
    </main>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTop">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="{{ asset("js/Front/showCommunique.js") }}"></script>
</body>
</html>