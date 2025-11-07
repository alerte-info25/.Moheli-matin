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
    <div class="toast-container" id="toastContainer"></div>

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
                            <button class="btn-primary">
                                <i class="fas fa-play"></i>
                                Voir les vidéos
                            </button>
                            <button class="btn-secondary">
                                <i class="fas fa-newspaper"></i>
                                Retour aux articles
                            </button>
                        </div>
                    </div>

                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéos Mohéli">
                        <div class="image-overlay">
                            <h3>Reportage exclusif sur la pêche traditionnelle</h3>
                            <p>Découvrez les techniques ancestrales des pêcheurs de Mohéli</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Video Section -->
        <section class="featured-video-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Vidéo à la Une</h2>
                    <a href="#" class="view-all">
                        Voir tout
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="featured-video-grid">
                    <div class="main-featured-video">
                        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo principale">
                        <div class="main-featured-video-content">
                            <span class="main-featured-video-category">REPORTAGE</span>
                            <h3 class="main-featured-video-title">Nouveau plan de développement pour l'île de Mohéli</h3>
                            <p class="main-featured-video-description">Le gouvernement dévoile un ambitieux programme d'investissement de 50 millions d'euros pour les infrastructures de l'île.</p>
                            <button class="btn-primary play-featured-video" data-video-id="dQw4w9WgXcQ">
                                <i class="fas fa-play"></i>
                                Regarder maintenant
                            </button>
                        </div>
                    </div>

                    <div class="side-featured-videos">
                        <div class="side-featured-video-item">
                            <div class="side-featured-video-image">
                                <img src="https://images.unsplash.com/photo-1541336032412-2048a678540d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo secondaire">
                                <div class="play-button">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="side-featured-video-content">
                                <div class="side-featured-video-category">ÉDUCATION</div>
                                <h4 class="side-featured-video-title">Ouverture du nouveau lycée technique de Nioumachoua</h4>
                            </div>
                        </div>

                        <div class="side-featured-video-item">
                            <div class="side-featured-video-image">
                                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo secondaire">
                                <div class="play-button">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="side-featured-video-content">
                                <div class="side-featured-video-category">SANTÉ</div>
                                <h4 class="side-featured-video-title">Campagne de vaccination contre la malaria dans les villages reculés</h4>
                            </div>
                        </div>

                        <div class="side-featured-video-item">
                            <div class="side-featured-video-image">
                                <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo secondaire">
                                <div class="play-button">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="side-featured-video-content">
                                <div class="side-featured-video-category">SPORT</div>
                                <h4 class="side-featured-video-title">Victoire historique de l'équipe de football de Mohéli au tournoi régional</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Latest Videos Section -->
        <section class="videos-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Dernières Vidéos</h2>
                    <a href="#" class="view-all">
                        Voir tout
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="videos-grid">
                    <!-- Video 1 -->
                    <div class="video-card">
                        <div class="video-thumbnail">
                            <img src="https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo">
                            <div class="play-button">
                                <i class="fas fa-play"></i>
                            </div>
                            <div class="video-duration">15:32</div>
                        </div>
                        <div class="video-content">
                            <span class="video-category">Politique</span>
                            <h3 class="video-title">Le Président annonce un nouveau plan de développement pour Mohéli</h3>
                            <p class="video-description">
                                Le chef de l'État a présenté hier un ambitieux plan quinquennal visant à renforcer les infrastructures et stimuler l'économie locale.
                            </p>
                            <div class="video-footer">
                                <div class="video-date">
                                    <i class="far fa-calendar"></i>
                                    15 Nov
                                </div>
                                <div class="video-stats">
                                    <span><i class="far fa-eye"></i> 2.4K</span>
                                    <span><i class="far fa-comment"></i> 87</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video 2 -->
                    <div class="video-card">
                        <div class="video-thumbnail">
                            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo">
                            <div class="play-button">
                                <i class="fas fa-play"></i>
                            </div>
                            <div class="video-duration">12:45</div>
                        </div>
                        <div class="video-content">
                            <span class="video-category">Économie</span>
                            <h3 class="video-title">Lancement d'un nouveau programme d'aide aux entrepreneurs locaux</h3>
                            <p class="video-description">
                                Le gouvernement débloque 5 millions d'euros pour soutenir les petites et moyennes entreprises comoriennes dans leur développement.
                            </p>
                            <div class="video-footer">
                                <div class="video-date">
                                    <i class="far fa-calendar"></i>
                                    14 Nov
                                </div>
                                <div class="video-stats">
                                    <span><i class="far fa-eye"></i> 1.8K</span>
                                    <span><i class="far fa-comment"></i> 42</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video 3 -->
                    <div class="video-card">
                        <div class="video-thumbnail">
                            <img src="https://images.unsplash.com/photo-1541336032412-2048a678540d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo">
                            <div class="play-button">
                                <i class="fas fa-play"></i>
                            </div>
                            <div class="video-duration">18:20</div>
                        </div>
                        <div class="video-content">
                            <span class="video-category">Éducation</span>
                            <h3 class="video-title">Inauguration du nouveau campus universitaire de Fomboni</h3>
                            <p class="video-description">
                                Un établissement moderne équipé des dernières technologies éducatives ouvrira ses portes aux étudiants dès le semestre prochain.
                            </p>
                            <div class="video-footer">
                                <div class="video-date">
                                    <i class="far fa-calendar"></i>
                                    13 Nov
                                </div>
                                <div class="video-stats">
                                    <span><i class="far fa-eye"></i> 3.1K</span>
                                    <span><i class="far fa-comment"></i> 124</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video 4 -->
                    <div class="video-card">
                        <div class="video-thumbnail">
                            <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo">
                            <div class="play-button">
                                <i class="fas fa-play"></i>
                            </div>
                            <div class="video-duration">22:15</div>
                        </div>
                        <div class="video-content">
                            <span class="video-category">Culture</span>
                            <h3 class="video-title">Festival international de musique traditionnelle à Mohéli</h3>
                            <p class="video-description">
                                Des artistes venus de toute la région participeront à cet événement qui célèbre la richesse du patrimoine musical comorien.
                            </p>
                            <div class="video-footer">
                                <div class="video-date">
                                    <i class="far fa-calendar"></i>
                                    12 Nov
                                </div>
                                <div class="video-stats">
                                    <span><i class="far fa-eye"></i> 2.7K</span>
                                    <span><i class="far fa-comment"></i> 96</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video 5 -->
                    <div class="video-card">
                        <div class="video-thumbnail">
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo">
                            <div class="play-button">
                                <i class="fas fa-play"></i>
                            </div>
                            <div class="video-duration">14:30</div>
                        </div>
                        <div class="video-content">
                            <span class="video-category">Santé</span>
                            <h3 class="video-title">Nouvelle campagne de vaccination contre la malaria à Mohéli</h3>
                            <p class="video-description">
                                Le ministère de la Santé annonce une vaste campagne de prévention qui touchera plus de 50 000 personnes dans la région.
                            </p>
                            <div class="video-footer">
                                <div class="video-date">
                                    <i class="far fa-calendar"></i>
                                    11 Nov
                                </div>
                                <div class="video-stats">
                                    <span><i class="far fa-eye"></i> 1.9K</span>
                                    <span><i class="far fa-comment"></i> 53</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video 6 -->
                    <div class="video-card">
                        <div class="video-thumbnail">
                            <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo">
                            <div class="play-button">
                                <i class="fas fa-play"></i>
                            </div>
                            <div class="video-duration">25:45</div>
                        </div>
                        <div class="video-content">
                            <span class="video-category">Sport</span>
                            <h3 class="video-title">Victoire historique de l'équipe de Mohéli aux Jeux des Îles</h3>
                            <p class="video-description">
                                Les Mohéliens remportent la médaille d'or après une finale épique contre l'équipe de Ngazidja.
                            </p>
                            <div class="video-footer">
                                <div class="video-date">
                                    <i class="far fa-calendar"></i>
                                    10 Nov
                                </div>
                                <div class="video-stats">
                                    <span><i class="far fa-eye"></i> 4.2K</span>
                                    <span><i class="far fa-comment"></i> 215</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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