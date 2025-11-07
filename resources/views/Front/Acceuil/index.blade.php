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

    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>

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
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="eyebrow-text">ACTUALITÉS EN DIRECT</span>
                        </div>

                        <h1 class="hero-title">
                            L'actualité de <span class="highlight">Mohéli</span> en temps réel
                        </h1>

                        <p class="hero-subtitle">
                            Découvrez les dernières nouvelles, reportages et analyses sur la vie à Mohéli. 
                            Informez-vous avec rigueur et objectivité sur les événements qui marquent notre île.
                        </p>

                        <div class="hero-cta">
                            <button class="btn-primary">
                                <i class="fas fa-newspaper"></i>
                                Dernières infos
                            </button>
                            <button class="btn-secondary">
                                <i class="fas fa-play"></i>
                                Vidéos
                            </button>
                        </div>
                    </div>

                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité Mohéli">
                        <div class="image-overlay">
                            <h3>Inauguration du nouveau port de Fomboni</h3>
                            <p>Le président en visite officielle pour l'ouverture des nouvelles installations portuaires</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats-section">
            <div class="container">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="stat-number" data-target="2500">0</div>
                        <div class="stat-label">Articles publiés</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-number" data-target="15000">0</div>
                        <div class="stat-label">Lecteurs quotidiens</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-pen"></i>
                        </div>
                        <div class="stat-number" data-target="25">0</div>
                        <div class="stat-label">Journalistes</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="stat-number" data-target="8">0</div>
                        <div class="stat-label">Prix remportés</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Latest News -->
        <section class="news-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Dernières Actualités</h2>
                    <a href="#" class="view-all">
                        Voir tout
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="news-grid">
                    <!-- Article 1 -->
                    <div class="news-card">
                        <div class="news-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité" class="news-image">
                            <span class="news-category-tag">Politique</span>
                            <span class="news-date">
                                <i class="far fa-calendar"></i>
                                15 Nov
                            </span>
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">Le Président annonce un nouveau plan de développement pour Mohéli</h3>
                            <p class="news-excerpt">
                                Le chef de l'État a présenté hier un ambitieux plan quinquennal visant à renforcer les infrastructures et stimuler l'économie locale.
                            </p>
                            <div class="news-footer">
                                <a href="#" class="news-read-more">
                                    Lire la suite
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                <div class="news-stats">
                                    <span><i class="far fa-eye"></i> 2.4K</span>
                                    <span><i class="far fa-comment"></i> 87</span>
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
                                14 Nov
                            </span>
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">Lancement d'un nouveau programme d'aide aux entrepreneurs locaux</h3>
                            <p class="news-excerpt">
                                Le gouvernement débloque 5 millions d'euros pour soutenir les petites et moyennes entreprises comoriennes dans leur développement.
                            </p>
                            <div class="news-footer">
                                <a href="#" class="news-read-more">
                                    Lire la suite
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                <div class="news-stats">
                                    <span><i class="far fa-eye"></i> 1.8K</span>
                                    <span><i class="far fa-comment"></i> 42</span>
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
                                13 Nov
                            </span>
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">Inauguration du nouveau campus universitaire de Fomboni</h3>
                            <p class="news-excerpt">
                                Un établissement moderne équipé des dernières technologies éducatives ouvrira ses portes aux étudiants dès le semestre prochain.
                            </p>
                            <div class="news-footer">
                                <a href="#" class="news-read-more">
                                    Lire la suite
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                <div class="news-stats">
                                    <span><i class="far fa-eye"></i> 3.1K</span>
                                    <span><i class="far fa-comment"></i> 124</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Article 4 -->
                    <div class="news-card">
                        <div class="news-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité" class="news-image">
                            <span class="news-category-tag">Culture</span>
                            <span class="news-date">
                                <i class="far fa-calendar"></i>
                                12 Nov
                            </span>
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">Festival international de musique traditionnelle à Mohéli</h3>
                            <p class="news-excerpt">
                                Des artistes venus de toute la région participeront à cet événement qui célèbre la richesse du patrimoine musical comorien.
                            </p>
                            <div class="news-footer">
                                <a href="#" class="news-read-more">
                                    Lire la suite
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                <div class="news-stats">
                                    <span><i class="far fa-eye"></i> 2.7K</span>
                                    <span><i class="far fa-comment"></i> 96</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Article 5 -->
                    <div class="news-card">
                        <div class="news-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité" class="news-image">
                            <span class="news-category-tag">Santé</span>
                            <span class="news-date">
                                <i class="far fa-calendar"></i>
                                11 Nov
                            </span>
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">Nouvelle campagne de vaccination contre la malaria à Mohéli</h3>
                            <p class="news-excerpt">
                                Le ministère de la Santé annonce une vaste campagne de prévention qui touchera plus de 50 000 personnes dans la région.
                            </p>
                            <div class="news-footer">
                                <a href="#" class="news-read-more">
                                    Lire la suite
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                <div class="news-stats">
                                    <span><i class="far fa-eye"></i> 1.9K</span>
                                    <span><i class="far fa-comment"></i> 53</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Article 6 -->
                    <div class="news-card">
                        <div class="news-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité" class="news-image">
                            <span class="news-category-tag">Sport</span>
                            <span class="news-date">
                                <i class="far fa-calendar"></i>
                                10 Nov
                            </span>
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">Victoire historique de l'équipe de Mohéli aux Jeux des Îles</h3>
                            <p class="news-excerpt">
                                Les Mohéliens remportent la médaille d'or après une finale épique contre l'équipe de Ngazidja.
                            </p>
                            <div class="news-footer">
                                <a href="#" class="news-read-more">
                                    Lire la suite
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                <div class="news-stats">
                                    <span><i class="far fa-eye"></i> 4.2K</span>
                                    <span><i class="far fa-comment"></i> 215</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured News -->
        <section class="featured-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">À la Une</h2>
                    <a href="#" class="view-all">
                        Voir tout
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="featured-grid">
                    <div class="main-featured">
                        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Article principal">
                        <div class="main-featured-content">
                            <span class="main-featured-category">ÉCONOMIE</span>
                            <h3 class="main-featured-title">Nouveau plan de développement pour l'île de Mohéli</h3>
                            <p class="main-featured-excerpt">Le gouvernement dévoile un ambitieux programme d'investissement de 50 millions d'euros pour les infrastructures de l'île.</p>
                            <a href="#" class="news-read-more">
                                Lire l'article
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="side-featured">
                        <div class="side-featured-item">
                            <div class="side-featured-image">
                                <img src="https://images.unsplash.com/photo-1541336032412-2048a678540d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Article secondaire">
                            </div>
                            <div class="side-featured-content">
                                <div class="side-featured-category">ÉDUCATION</div>
                                <h4 class="side-featured-title">Ouverture du nouveau lycée technique de Nioumachoua</h4>
                            </div>
                        </div>

                        <div class="side-featured-item">
                            <div class="side-featured-image">
                                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Article secondaire">
                            </div>
                            <div class="side-featured-content">
                                <div class="side-featured-category">SANTÉ</div>
                                <h4 class="side-featured-title">Campagne de vaccination contre la malaria dans les villages reculés</h4>
                            </div>
                        </div>

                        <div class="side-featured-item">
                            <div class="side-featured-image">
                                <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Article secondaire">
                            </div>
                            <div class="side-featured-content">
                                <div class="side-featured-category">SPORT</div>
                                <h4 class="side-featured-title">Victoire historique de l'équipe de football de Mohéli au tournoi régional</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Category Sections -->
        <section class="category-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Par Catégories</h2>
                </div>

                <div class="category-grid">
                    <!-- Société -->
                    <div>
                        <div class="category-header">
                            <div class="category-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h3 class="category-title">Société</h3>
                        </div>
                        <div class="news-grid">
                            <div class="news-card">
                                <div class="news-image-wrapper">
                                    <img src="https://plus.unsplash.com/premium_photo-1661902398022-762e88ff3f82?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170" alt="Société" class="news-image">
                                </div>
                                <div class="news-content">
                                    <h4 class="news-title">Nouvelle initiative pour l'emploi des jeunes à Mohéli</h4>
                                    <div class="news-footer">
                                        <a href="#" class="news-read-more">
                                            Lire
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Santé -->
                    <div>
                        <div class="category-header">
                            <div class="category-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <h3 class="category-title">Santé</h3>
                        </div>
                        <div class="news-grid">
                            <div class="news-card">
                                <div class="news-image-wrapper">
                                    <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Santé" class="news-image">
                                </div>
                                <div class="news-content">
                                    <h4 class="news-title">Nouvel équipement médical pour l'hôpital de Fomboni</h4>
                                    <div class="news-footer">
                                        <a href="#" class="news-read-more">
                                            Lire
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Culture -->
                    <div>
                        <div class="category-header">
                            <div class="category-icon">
                                <i class="fas fa-palette"></i>
                            </div>
                            <h3 class="category-title">Culture</h3>
                        </div>
                        <div class="news-grid">
                            <div class="news-card">
                                <div class="news-image-wrapper">
                                    <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Culture" class="news-image">
                                </div>
                                <div class="news-content">
                                    <h4 class="news-title">Exposition d'art contemporain au centre culturel</h4>
                                    <div class="news-footer">
                                        <a href="#" class="news-read-more">
                                            Lire
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section class="newsletter-section">
            <div class="container">
                <div class="newsletter-content">
                    <div class="newsletter-icon">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <h2 class="newsletter-title">Restez informé</h2>
                    <p class="newsletter-text">
                        Recevez chaque jour les dernières actualités de Mohéli directement dans votre boîte mail
                    </p>
                    <form class="newsletter-form" id="newsletterForm">
                        <input type="email" class="newsletter-input" placeholder="Votre adresse email" required>
                        <button type="submit" class="newsletter-btn">
                            <i class="fas fa-bell"></i>
                            S'abonner
                        </button>
                    </form>
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
    
    <script src="{{ asset("js/Front/acceuil.js") }}"></script>
</body>
</html>