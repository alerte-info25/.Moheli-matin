<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Culture - MOHELI MATIN - Actualités culturelles de Mohéli">
    <meta name="keywords" content="Mohéli, Comores, culture, traditions, art, musique, danse, patrimoine">
    <title>Culture | MOHELI MATIN | Journal en ligne de Mohéli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Front/rubriques/culture.css") }}">
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <i class="fas fa-palette"></i>
            </div>
            <h2>MOHELI MATIN</h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p>Chargement des actualités culturelles...</p>
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
                                <i class="fas fa-palette"></i>
                            </div>
                            <span class="eyebrow-text">ACTUALITÉS CULTURELLES</span>
                        </div>

                        <h1 class="hero-title">
                            Culture à <span class="highlight">Mohéli</span>
                        </h1>

                        <p class="hero-subtitle">
                            Découvrez la richesse culturelle de Mohéli : traditions ancestrales, 
                            arts contemporains, musique, danse et patrimoine vivant de l'île aux parfums.
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
                        <img src="https://images.unsplash.com/photo-1541336032412-2048a678540d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="Culture Mohéli">
                        <div class="image-overlay">
                            <h3>Patrimoine vivant</h3>
                            <p>Les traditions se perpétuent à travers les générations</p>
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
                        <span class="filter-tag">Musique</span>
                        <span class="filter-tag">Danse</span>
                        <span class="filter-tag">Artisanat</span>
                        <span class="filter-tag">Festival</span>
                        <span class="filter-tag">Tradition</span>
                        <span class="filter-tag">Patrimoine</span>
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
                    <h2 class="section-title">Actualités Culturelles</h2>
                    <p class="section-subtitle">
                        Explorez la diversité culturelle et artistique de Mohéli
                    </p>
                </div>

                <div class="articles-grid">
                    <!-- Article 1 - Featured -->
                    <article class="article-card featured">
                        <div class="article-image">
                            <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="Festival culturel">
                            <span class="article-badge">À la une</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Festival</span>
                                <span><i class="far fa-clock"></i> Il y a 2 heures</span>
                            </div>
                            <h3 class="article-title">
                                Grand retour du Festival des Arts Traditionnels de Mohéli
                            </h3>
                            <p class="article-excerpt">
                                Après trois ans d'absence, le célèbre festival des arts traditionnels 
                                fait son grand retour avec une programmation exceptionnelle. Plus de 
                                200 artistes venus des quatre coins de l'île se produiront pendant 
                                quatre jours de célébration culturelle...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">SM</div>
                                    <div class="author-info">
                                        <h4>Saïda Mohamed</h4>
                                        <span>Critique culturelle</span>
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
                            <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Musique traditionnelle">
                            <span class="article-badge">Musique</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Musique</span>
                                <span><i class="far fa-clock"></i> Il y a 1 jour</span>
                            </div>
                            <h3 class="article-title">
                                Renaissance du gambusi : les jeunes s'approprient l'instrument ancestral
                            </h3>
                            <p class="article-excerpt">
                                Une nouvelle génération de musiciens redonne vie au gambusi, 
                                instrument traditionnel comorien. Des ateliers de formation 
                                attirent de plus en plus de jeunes passionnés...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">AM</div>
                                    <div class="author-info">
                                        <h4>Ali Moussa</h4>
                                        <span>Journaliste culture</span>
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
                            <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Artisanat local">
                            <span class="article-badge">Artisanat</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Artisanat</span>
                                <span><i class="far fa-clock"></i> Il y a 2 jours</span>
                            </div>
                            <h3 class="article-title">
                                Les tisseuses de Fomboni préservent un savoir-faire séculaire
                            </h3>
                            <p class="article-excerpt">
                                Dans les ateliers traditionnels de Fomboni, les tisseuses 
                                perpétuent l'art du tissage du shiromani, étoffe précieuse 
                                aux motifs complexes transmis de mère en fille...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">NM</div>
                                    <div class="author-info">
                                        <h4>Nassur Ahmed</h4>
                                        <span>Correspondant culture</span>
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
                            <img src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Danse traditionnelle">
                            <span class="article-badge">Danse</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Danse</span>
                                <span><i class="far fa-clock"></i> Il y a 3 jours</span>
                            </div>
                            <h3 class="article-title">
                                Le sambé : une danse rituelle qui résiste au temps
                            </h3>
                            <p class="article-excerpt">
                                Célébrant les grandes occasions, le sambé continue d'animer 
                                les villages mohéliens. Des stages sont organisés pour 
                                enseigner cette danse ancestrale aux plus jeunes...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">FM</div>
                                    <div class="author-info">
                                        <h4>Fatima Madi</h4>
                                        <span>Journaliste danse</span>
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
                            <img src="https://images.unsplash.com/photo-1563089145-599997674d42?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Cuisine traditionnelle">
                            <span class="article-badge">Gastronomie</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Gastronomie</span>
                                <span><i class="far fa-clock"></i> Il y a 4 jours</span>
                            </div>
                            <h3 class="article-title">
                                Les secrets culinaires des grand-mères de Mohéli
                            </h3>
                            <p class="article-excerpt">
                                Un livre recueille les recettes traditionnelles transmises 
                                oralement depuis des générations. Mkatra foutra, langouste 
                                grillée et autres spécialités dévoilent leurs secrets...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">SA</div>
                                    <div class="author-info">
                                        <h4>Salima Abdou</h4>
                                        <span>Critique gastronomique</span>
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
                            <img src="https://images.unsplash.com/photo-1518998053901-5348d3961a04?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="Architecture traditionnelle">
                            <span class="article-badge">Patrimoine</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Patrimoine</span>
                                <span><i class="far fa-clock"></i> Il y a 5 jours</span>
                            </div>
                            <h3 class="article-title">
                                Sauvegarde des cases traditionnelles à toit de palme
                            </h3>
                            <p class="article-excerpt">
                                Un programme de restauration vise à préserver les dernières 
                                cases traditionnelles mohéliennes, témoins d'un habitat 
                                ancestral adapté au climat tropical...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">OA</div>
                                    <div class="author-info">
                                        <h4>Omar Ali</h4>
                                        <span>Journaliste patrimoine</span>
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
                            <img src="https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Concert moderne">
                            <span class="article-badge">Musique</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Musique</span>
                                <span><i class="far fa-clock"></i> Il y a 8 jours</span>
                            </div>
                            <h3 class="article-title">
                                Fusion musicale : quand le twarab rencontre le hip-hop
                            </h3>
                            <p class="article-excerpt">
                                De jeunes artistes créent un nouveau son en mêlant les 
                                mélodies traditionnelles du twarab aux rythmes urbains 
                                du hip-hop. Une révolution musicale en marche...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">MA</div>
                                    <div class="author-info">
                                        <h4>Mariam Ahmed</h4>
                                        <span>Journaliste musique</span>
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
                        Recevez chaque semaine les dernières actualités culturelles de Mohéli directement dans votre boîte email
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
    
    <script src="{{ asset("js/Front/rubriques/culture.js") }}"></script>
</body>
</html>