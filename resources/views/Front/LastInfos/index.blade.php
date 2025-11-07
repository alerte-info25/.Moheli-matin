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

        <div class="breaking-news-banner">
            <div class="container">
                <div class="breaking-news-content">
                    <div class="breaking-news-label">BREAKING NEWS</div>
                    <div class="breaking-news-text">Le Président annonce un plan d'urgence pour faire face aux inondations dans le sud de l'île - Suivez notre couverture en direct</div>
                </div>
            </div>
        </div>

        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-container">
                    <div class="hero-content">
                        <div class="hero-eyebrow">
                            <div class="eyebrow-icon">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <span class="eyebrow-text">INFOS EN DIRECT</span>
                        </div>

                        <h1 class="hero-title">
                            Les <span class="highlight">dernières infos</span> de Mohéli
                        </h1>

                        <p class="hero-subtitle">
                            Restez informé en temps réel des événements qui marquent notre île. 
                            Actualités fraîches, reportages exclusifs et informations vérifiées.
                        </p>

                        <div class="hero-cta">
                            <button class="btn-primary">
                                <i class="fas fa-bell"></i>
                                Recevoir les alertes
                            </button>
                            <button class="btn-secondary">
                                <i class="fas fa-share-alt"></i>
                                Partager cette page
                            </button>
                        </div>
                    </div>

                    <div class="hero-image">
                        <img src="https://plus.unsplash.com/premium_photo-1661962476059-13543ea45d4d?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1180">
                        <div class="image-overlay">
                            <h3>Suivi en direct des inondations</h3>
                            <p>Notre équipe sur le terrain vous rapporte les dernières informations</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Latest News -->
        <section class="featured-latest-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">À la Une</h2>
                    <a href="#" class="view-all">
                        Voir tout
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="featured-latest-grid">
                    <div class="main-featured-latest">
                        <img src="https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Article principal">
                        <div class="main-featured-latest-content">
                            <span class="main-featured-latest-category">URGENCE</span>
                            <h3 class="main-featured-latest-title">Inondations à Mohéli : état des lieux et mesures d'urgence</h3>
                            <p class="main-featured-latest-excerpt">Des pluies diluviennes s'abattent sur l'île depuis 48 heures, causant d'importants dégâts matériels. Le point sur la situation.</p>
                            <a href="#" class="news-read-more" style="color: white;">
                                Lire l'article complet
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="side-featured-latest">
                        <div class="side-featured-latest-item">
                            <div class="side-featured-latest-image">
                                <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Article secondaire">
                            </div>
                            <div class="side-featured-latest-content">
                                <div class="side-featured-latest-category">ÉCONOMIE</div>
                                <h4 class="side-featured-latest-title">Impact des intempéries sur l'économie locale</h4>
                            </div>
                        </div>

                        <div class="side-featured-latest-item">
                            <div class="side-featured-latest-image">
                                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Article secondaire">
                            </div>
                            <div class="side-featured-latest-content">
                                <div class="side-featured-latest-category">SANTÉ</div>
                                <h4 class="side-featured-latest-title">Risques sanitaires après les inondations</h4>
                            </div>
                        </div>

                        <div class="side-featured-latest-item">
                            <div class="side-featured-latest-image">
                                <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Article secondaire">
                            </div>
                            <div class="side-featured-latest-content">
                                <div class="side-featured-latest-category">SOLIDARITÉ</div>
                                <h4 class="side-featured-latest-title">La population se mobilise pour aider les sinistrés</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Latest Videos Section -->
        <section class="latest-videos-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Dernières Vidéos</h2>
                    <a href="#" class="view-all">
                        Voir toutes les vidéos
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="videos-grid">
                    <!-- Video 1 -->
                    <div class="video-card">
                        <div class="video-thumbnail">
                            <img src="https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo">
                            <div class="play-button">
                                <i class="fas fa-play"></i>
                            </div>
                            <div class="video-duration">15:32</div>
                        </div>
                        <div class="video-content">
                            <span class="video-category">URGENCE</span>
                            <h3 class="video-title">Reportage en direct des zones inondées du sud de l'île</h3>
                            <p class="video-description">
                                Notre équipe de reportage sur le terrain vous montre l'ampleur des dégâts causés par les inondations.
                            </p>
                            <div class="video-footer">
                                <div class="video-date">
                                    <i class="far fa-calendar"></i>
                                    Aujourd'hui
                                </div>
                                <div class="video-stats">
                                    <span><i class="far fa-eye"></i> 12.4K</span>
                                    <span><i class="far fa-comment"></i> 342</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video 2 -->
                    <div class="video-card">
                        <div class="video-thumbnail">
                            <img src="https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo">
                            <div class="play-button">
                                <i class="fas fa-play"></i>
                            </div>
                            <div class="video-duration">08:45</div>
                        </div>
                        <div class="video-content">
                            <span class="video-category">INTERVIEW</span>
                            <h3 class="video-title">Interview exclusive du ministre de l'Intérieur</h3>
                            <p class="video-description">
                                Le ministre répond à nos questions sur les mesures prises pour faire face à la crise.
                            </p>
                            <div class="video-footer">
                                <div class="video-date">
                                    <i class="far fa-calendar"></i>
                                    Aujourd'hui
                                </div>
                                <div class="video-stats">
                                    <span><i class="far fa-eye"></i> 8.7K</span>
                                    <span><i class="far fa-comment"></i> 187</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video 3 -->
                    <div class="video-card">
                        <div class="video-thumbnail">
                            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo">
                            <div class="play-button">
                                <i class="fas fa-play"></i>
                            </div>
                            <div class="video-duration">12:20</div>
                        </div>
                        <div class="video-content">
                            <span class="video-category">SOLIDARITÉ</span>
                            <h3 class="video-title">La mobilisation citoyenne pour aider les sinistrés</h3>
                            <p class="video-description">
                                Reportage sur les initiatives solidaires qui se multiplient à travers l'île.
                            </p>
                            <div class="video-footer">
                                <div class="video-date">
                                    <i class="far fa-calendar"></i>
                                    Hier
                                </div>
                                <div class="video-stats">
                                    <span><i class="far fa-eye"></i> 15.2K</span>
                                    <span><i class="far fa-comment"></i> 423</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video 4 -->
                    <div class="video-card">
                        <div class="video-thumbnail">
                            <img src="https://images.unsplash.com/photo-1541336032412-2048a678540d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo">
                            <div class="play-button">
                                <i class="fas fa-play"></i>
                            </div>
                            <div class="video-duration">06:30</div>
                        </div>
                        <div class="video-content">
                            <span class="video-category">CONSEILS</span>
                            <h3 class="video-title">Les gestes à adopter en cas d'inondation</h3>
                            <p class="video-description">
                                Les conseils des pompiers pour se protéger et protéger ses biens face aux inondations.
                            </p>
                            <div class="video-footer">
                                <div class="video-date">
                                    <i class="far fa-calendar"></i>
                                    Hier
                                </div>
                                <div class="video-stats">
                                    <span><i class="far fa-eye"></i> 22.8K</span>
                                    <span><i class="far fa-comment"></i> 156</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Latest News Section -->
        <section class="latest-news-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Dernières Informations</h2>
                    <a href="#" class="view-all">
                        Voir tout
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="latest-news-grid">
                    <!-- Article 1 -->
                    <div class="news-card">
                        <div class="news-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1585829365295-ab7cd400d7e9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité" class="news-image">
                            <span class="news-category-tag breaking-badge">URGENT</span>
                            <span class="news-date">
                                <i class="far fa-calendar"></i>
                                Aujourd'hui
                            </span>
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">Nouveau bilan : 3 villages coupés du monde après les glissements de terrain</h3>
                            <p class="news-excerpt">
                                Les équipes de secours tentent d'établir un contact avec les habitants des villages isolés dans les hauteurs de l'île.
                            </p>
                            <div class="news-footer">
                                <a href="#" class="news-read-more">
                                    Lire la suite
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                <div class="news-stats">
                                    <span><i class="far fa-eye"></i> 3.2K</span>
                                    <span><i class="far fa-comment"></i> 142</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Article 2 -->
                    <div class="news-card">
                        <div class="news-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité" class="news-image">
                            <span class="news-category-tag">Économie</span>
                            <span class="news-date">
                                <i class="far fa-calendar"></i>
                                Aujourd'hui
                            </span>
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">Les agriculteurs déplorent des pertes importantes après les intempéries</h3>
                            <p class="news-excerpt">
                                Les cultures de vanille et d'ylang-ylang particulièrement touchées. Le gouvernement promet une aide d'urgence.
                            </p>
                            <div class="news-footer">
                                <a href="#" class="news-read-more">
                                    Lire la suite
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                <div class="news-stats">
                                    <span><i class="far fa-eye"></i> 2.1K</span>
                                    <span><i class="far fa-comment"></i> 87</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Article 3 -->
                    <div class="news-card">
                        <div class="news-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1541336032412-2048a678540d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité" class="news-image">
                            <span class="news-category-tag">Éducation</span>
                            <span class="news-date">
                                <i class="far fa-calendar"></i>
                                Aujourd'hui
                            </span>
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">Fermeture des établissements scolaires dans le sud de l'île</h3>
                            <p class="news-excerpt">
                                Par mesure de sécurité, les écoles resteront fermées jusqu'à nouvel ordre dans les zones affectées par les inondations.
                            </p>
                            <div class="news-footer">
                                <a href="#" class="news-read-more">
                                    Lire la suite
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                <div class="news-stats">
                                    <span><i class="far fa-eye"></i> 1.8K</span>
                                    <span><i class="far fa-comment"></i> 54</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Article 4 -->
                    <div class="news-card">
                        <div class="news-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité" class="news-image">
                            <span class="news-category-tag">Infrastructures</span>
                            <span class="news-date">
                                <i class="far fa-calendar"></i>
                                Hier
                            </span>
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">Rétablissement progressif de l'électricité dans les zones touchées</h3>
                            <p class="news-excerpt">
                                Les équipes techniques travaillent sans relâche pour rétablir l'alimentation électrique dans les secteurs affectés.
                            </p>
                            <div class="news-footer">
                                <a href="#" class="news-read-more">
                                    Lire la suite
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                <div class="news-stats">
                                    <span><i class="far fa-eye"></i> 2.4K</span>
                                    <span><i class="far fa-comment"></i> 76</span>
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
    
    <script src="{{ asset("js/Front/LastInfos.js") }}"></script>
</body>
</html>