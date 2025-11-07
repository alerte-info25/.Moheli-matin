<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Économie - MOHELI MATIN - Actualités économiques de Mohéli">
    <meta name="keywords" content="Mohéli, Comores, économie, business, entreprise, commerce, développement, investissement">
    <title>Économie | MOHELI MATIN | Journal en ligne de Mohéli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Front/rubriques/economie.css") }}">
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <i class="fas fa-chart-line"></i>
            </div>
            <h2>MOHELI MATIN</h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p>Chargement des actualités économiques...</p>
        </div>
    </div>

    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>

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
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <span class="eyebrow-text">ACTUALITÉS ÉCONOMIQUES</span>
                        </div>

                        <h1 class="hero-title">
                            Économie à <span class="highlight">Mohéli</span>
                        </h1>

                        <p class="hero-subtitle">
                            Découvrez les dynamiques économiques de l'île : entreprises innovantes, 
                            secteurs porteurs, investissements et opportunités de développement. 
                            Toute l'actualité business de Mohéli.
                        </p>

                        <div class="hero-cta">
                            <a href="#articles" class="btn-primary" style="text-decoration: none;">
                                <i class="fas fa-newspaper"></i>
                                Voir les articles
                            </a>
                            <a href="#newsletter" class="btn-secondary" style="text-decoration: none;">
                                <i class="fas fa-bell"></i>
                                S'abonner
                            </a>
                        </div>
                    </div>

                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1211&q=80" alt="Développement économique">
                        <div class="image-overlay">
                            <h3>Croissance et innovation</h3>
                            <p>Le moteur du développement de l'île</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Filters Section -->
        <section class="filters-section">
            <div class="container">
                <div class="filters-container">
                    <div class="filter-tags">
                        <span class="filter-tag active">Tous</span>
                        <span class="filter-tag">Entreprises</span>
                        <span class="filter-tag">Commerce</span>
                        <span class="filter-tag">Investissement</span>
                        <span class="filter-tag">Tourisme</span>
                        <span class="filter-tag">Agriculture</span>
                        <span class="filter-tag">Pêche</span>
                    </div>
                    <div class="sort-options">
                        <select id="sortArticles">
                            <option value="newest">Plus récent</option>
                            <option value="popular">Plus populaire</option>
                            <option value="commented">Plus commenté</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>

        <!-- Articles Section -->
        <section class="articles-section" id="articles">
            <div class="container">
                <a href="#" class="back-to-home">
                    <i class="fas fa-arrow-left"></i>
                    Retour à l'accueil
                </a>

                <div class="text-center mb-5">
                    <h2 class="section-title">Actualités Économiques</h2>
                    <p class="section-subtitle">
                        Les entreprises, investissements et secteurs qui font l'économie mohélienne
                    </p>
                </div>

                <div class="articles-grid">
                    <!-- Article 1 - Featured -->
                    <article class="article-card featured">
                        <div class="article-image">
                            <img src="https://images.unsplash.com/photo-1560520653-9e0e4c89eb11?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1073&q=80" alt="Investissement touristique">
                            <span class="article-badge">À la une</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Investissement</span>
                                <span><i class="far fa-clock"></i> Il y a 2 heures</span>
                            </div>
                            <h3 class="article-title">
                                Ouverture d'un complexe hôtelier écologique à Nioumachoua
                            </h3>
                            <p class="article-excerpt">
                                Un investisseur local inaugure le premier éco-resort de luxe de Mohéli, 
                                créant 50 emplois directs. Ce projet de 2 millions d'euros mise sur 
                                le tourisme durable avec des constructions respectueuses de 
                                l'environnement et une gestion écologique des ressources. 
                                L'établissement vise la clientèle internationale...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">SM</div>
                                    <div class="author-info">
                                        <h4>Saïd Mohamed</h4>
                                        <span>Journaliste économique</span>
                                    </div>
                                </div>
                                <div class="article-stats">
                                    <span class="article-stat">
                                        <i class="far fa-eye"></i> 2.4K
                                    </span>
                                    <span class="article-stat">
                                        <i class="far fa-comment"></i> 47
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Article 2 -->
                    <article class="article-card">
                        <div class="article-image">
                            <img src="https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Coopérative agricole">
                            <span class="article-badge">Agriculture</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Agriculture</span>
                                <span><i class="far fa-clock"></i> Il y a 1 jour</span>
                            </div>
                            <h3 class="article-title">
                                La coopérative vanille de Fomboni triple ses exportations
                            </h3>
                            <p class="article-excerpt">
                                Grâce à une certification bio internationale, la coopérative 
                                vanille de Mohéli a multiplié ses ventes vers l'Europe. 
                                200 producteurs bénéficient de cette valorisation de leur production...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">AM</div>
                                    <div class="author-info">
                                        <h4>Ali Moussa</h4>
                                        <span>Spécialiste agriculture</span>
                                    </div>
                                </div>
                                <div class="article-stats">
                                    <span class="article-stat">
                                        <i class="far fa-eye"></i> 1.8K
                                    </span>
                                    <span class="article-stat">
                                        <i class="far fa-comment"></i> 32
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Article 3 -->
                    <article class="article-card">
                        <div class="article-image">
                            <img src="https://images.unsplash.com/photo-1584184924103-e310d9dc82fc?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=687" alt="Pêche durable">
                            <span class="article-badge">Pêche</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Pêche</span>
                                <span><i class="far fa-clock"></i> Il y a 2 jours</span>
                            </div>
                            <h3 class="article-title">
                                Modernisation de la flotte de pêche artisanale
                            </h3>
                            <p class="article-excerpt">
                                Un programme d'aide permet à 50 pêcheurs de s'équiper de 
                                nouvelles embarcations plus sûres et économes en carburant. 
                                L'objectif : augmenter les rendements tout en préservant 
                                les ressources marines...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">NA</div>
                                    <div class="author-info">
                                        <h4>Nassur Ahmed</h4>
                                        <span>Journaliste pêche</span>
                                    </div>
                                </div>
                                <div class="article-stats">
                                    <span class="article-stat">
                                        <i class="far fa-eye"></i> 2.1K
                                    </span>
                                    <span class="article-stat">
                                        <i class="far fa-comment"></i> 41
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Article 4 -->
                    <article class="article-card">
                        <div class="article-image">
                            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Commerce digital">
                            <span class="article-badge">Commerce</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Commerce</span>
                                <span><i class="far fa-clock"></i> Il y a 3 jours</span>
                            </div>
                            <h3 class="article-title">
                                Lancement d'une plateforme e-commerce locale
                            </h3>
                            <p class="article-excerpt">
                                Une startup mohélienne crée "Mohéli Market", une place de marché 
                                en ligne pour les produits locaux. Artisans et producteurs 
                                peuvent désormais vendre directement aux consommateurs...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">FM</div>
                                    <div class="author-info">
                                        <h4>Fatima Madi</h4>
                                        <span>Journaliste innovation</span>
                                    </div>
                                </div>
                                <div class="article-stats">
                                    <span class="article-stat">
                                        <i class="far fa-eye"></i> 1.5K
                                    </span>
                                    <span class="article-stat">
                                        <i class="far fa-comment"></i> 28
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Article 5 -->
                    <article class="article-card">
                        <div class="article-image">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Artisanat local">
                            <span class="article-badge">Entreprises</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Entreprises</span>
                                <span><i class="far fa-clock"></i> Il y a 4 jours</span>
                            </div>
                            <h3 class="article-title">
                                L'atelier de vannerie "Tresses Mohéliennes" exporte vers la France
                            </h3>
                            <p class="article-excerpt">
                                Spécialisée dans la vannerie traditionnelle, cette entreprise 
                                familiale signe un contrat d'exportation avec une chaîne 
                                de décoration française. 15 emplois créés...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">SA</div>
                                    <div class="author-info">
                                        <h4>Salima Abdou</h4>
                                        <span>Journaliste entreprises</span>
                                    </div>
                                </div>
                                <div class="article-stats">
                                    <span class="article-stat">
                                        <i class="far fa-eye"></i> 3.2K
                                    </span>
                                    <span class="article-stat">
                                        <i class="far fa-comment"></i> 89
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Article 6 -->
                    <article class="article-card">
                        <div class="article-image">
                            <img src="https://plus.unsplash.com/premium_photo-1664300611129-9acbed19485b?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170" alt="Infrastructures">
                            <span class="article-badge">Investissement</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Investissement</span>
                                <span><i class="far fa-clock"></i> Il y a 5 jours</span>
                            </div>
                            <h3 class="article-title">
                                Création d'une zone artisanale à Fomboni
                            </h3>
                            <p class="article-excerpt">
                                La province investit 500 millions de francs comoriens dans 
                                une zone dédiée aux artisans. 50 ateliers équipés seront 
                                mis à disposition des entrepreneurs...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">OA</div>
                                    <div class="author-info">
                                        <h4>Omar Ali</h4>
                                        <span>Journaliste infrastructures</span>
                                    </div>
                                </div>
                                <div class="article-stats">
                                    <span class="article-stat">
                                        <i class="far fa-eye"></i> 1.9K
                                    </span>
                                    <span class="article-stat">
                                        <i class="far fa-comment"></i> 35
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Article 7 -->
                    <article class="article-card">
                        <div class="article-image">
                            <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1211&q=80" alt="Formation professionnelle">
                            <span class="article-badge">Entreprises</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Entreprises</span>
                                <span><i class="far fa-clock"></i> Il y a 8 jours</span>
                            </div>
                            <h3 class="article-title">
                                Partenariat pour la formation aux métiers du tourisme
                            </h3>
                            <p class="article-excerpt">
                                L'office du tourisme et les hôteliers lancent un programme 
                                de formation pour 100 jeunes aux métiers de l'hôtellerie 
                                et de la restauration...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">MA</div>
                                    <div class="author-info">
                                        <h4>Mariam Ahmed</h4>
                                        <span>Journaliste formation</span>
                                    </div>
                                </div>
                                <div class="article-stats">
                                    <span class="article-stat">
                                        <i class="far fa-eye"></i> 2.3K
                                    </span>
                                    <span class="article-stat">
                                        <i class="far fa-comment"></i> 42
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Pagination -->
                <nav class="pagination">
                    <li class="page-item">
                        <a href="#" class="page-link"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link active">1</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">3</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">4</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </nav>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section class="newsletter-section" id="newsletter">
            <div class="container">
                <div class="newsletter-container">
                    <div class="newsletter-icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <h2 class="section-title" style="color: white; text-align: center;">Restez Informé</h2>
                    <p class="section-subtitle" style="color: rgba(255,255,255,0.8);">
                        Recevez chaque semaine les dernières actualités économiques de Mohéli directement dans votre boîte email
                    </p>
                    
                    <form class="newsletter-form">
                        <input type="email" class="newsletter-input" placeholder="Votre adresse email" required>
                        <button type="submit" class="btn-newsletter">
                            <i class="fas fa-paper-plane"></i>
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
    
    <script src="{{ asset("js/Front/rubriques/economie.js") }}"></script>
</body>
</html>