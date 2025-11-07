<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Opinion - MOHELI MATIN - Tribune libre et débats d'idées à Mohéli">
    <meta name="keywords" content="Mohéli, Comores, opinion, tribune, débat, analyse, éditorial, point de vue">
    <title>Opinion | MOHELI MATIN | Journal en ligne de Mohéli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Front/rubriques/opinion.css") }}">
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <i class="fas fa-comment-alt"></i>
            </div>
            <h2>MOHELI MATIN</h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p>Chargement des tribunes et opinions...</p>
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
                                <i class="fas fa-comment-alt"></i>
                            </div>
                            <span class="eyebrow-text">TRIBUNE LIBRE</span>
                        </div>

                        <h1 class="hero-title">
                            Opinion à <span class="highlight">Mohéli</span>
                        </h1>

                        <p class="hero-subtitle">
                            L'espace de débat et de réflexion de Mohéli Matin. Points de vue, analyses 
                            et prises de position sur les enjeux qui façonnent l'avenir de notre île.
                        </p>

                        <div class="hero-cta">
                            <a href="#articles" class="btn-primary" style="text-decoration: none;">
                                <i class="fas fa-newspaper"></i>
                                Lire les opinions
                            </a>
                            <a href="#newsletter" class="btn-secondary" style="text-decoration: none;">
                                <i class="fas fa-bell"></i>
                                S'abonner
                            </a>
                        </div>
                    </div>

                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1589652717521-10c0d092dea9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Débat d'idées">
                        <div class="image-overlay">
                            <h3>Débat d'idées</h3>
                            <p>La parole est à vous, Mohéliens</p>
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
                        <span class="filter-tag">Politique</span>
                        <span class="filter-tag">Société</span>
                        <span class="filter-tag">Économie</span>
                        <span class="filter-tag">Éducation</span>
                        <span class="filter-tag">Environnement</span>
                        <span class="filter-tag">Culture</span>
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
                    <h2 class="section-title">Tribunes & Opinions</h2>
                    <p class="section-subtitle">
                        Les analyses et points de vue qui font débat à Mohéli
                    </p>
                </div>

                <div class="articles-grid">
                    <!-- Article 1 - Featured -->
                    <article class="article-card featured">
                        <div class="article-image">
                            <img src="https://images.unsplash.com/photo-1551135049-8a33b5883817?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Développement durable">
                            <span class="article-badge">À la une</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Environnement</span>
                                <span><i class="far fa-clock"></i> Il y a 2 heures</span>
                            </div>
                            <h3 class="article-title">
                                "Mohéli doit devenir un modèle de développement durable"
                            </h3>
                            <p class="article-excerpt">
                                Tribune d'un expert en écologie : face aux défis climatiques, 
                                notre île a l'opportunité unique de construire un avenir respectueux 
                                de son environnement exceptionnel. Tourisme écoresponsable, 
                                énergies renouvelables et préservation de la biodiversité doivent 
                                guider nos choix politiques...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">DM</div>
                                    <div class="author-info">
                                        <h4>Dr. Ali Mohamed</h4>
                                        <span>Expert en environnement</span>
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
                            <img src="https://images.unsplash.com/photo-1521791055366-0d553872125f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1169&q=80" alt="Jeunesse et emploi">
                            <span class="article-badge">Société</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Société</span>
                                <span><i class="far fa-clock"></i> Il y a 1 jour</span>
                            </div>
                            <h3 class="article-title">
                                "Notre jeunesse mérite mieux que l'exil"
                            </h3>
                            <p class="article-excerpt">
                                Un jeune entrepreneur interpelle les décideurs : créons les conditions 
                                pour que nos diplômés puissent s'épanouir ici, sur leur terre natale. 
                                L'entrepreneuriat et l'innovation doivent être au cœur de notre 
                                stratégie de développement...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">SM</div>
                                    <div class="author-info">
                                        <h4>Saïd Mohamed</h4>
                                        <span>Jeune entrepreneur</span>
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
                            <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Éducation">
                            <span class="article-badge">Éducation</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Éducation</span>
                                <span><i class="far fa-clock"></i> Il y a 2 jours</span>
                            </div>
                            <h3 class="article-title">
                                "Réinventons notre système éducatif"
                            </h3>
                            <p class="article-excerpt">
                                Une enseignante plaide pour une réforme en profondeur : entre 
                tradition et modernité, comment adapter notre école aux défis 
                du 21e siècle ? L'éducation numérique et l'apprentissage des 
                langues doivent devenir des priorités...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">NA</div>
                                    <div class="author-info">
                                        <h4>Nassur Ahmed</h4>
                                        <span>Enseignante</span>
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
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Tourisme">
                            <span class="article-badge">Économie</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Économie</span>
                                <span><i class="far fa-clock"></i> Il y a 3 jours</span>
                            </div>
                            <h3 class="article-title">
                                "Le tourisme : chance ou menace pour Mohéli ?"
                            </h3>
                            <p class="article-excerpt">
                                Un acteur du secteur hôtelier alerte sur les dérives possibles : 
                comment développer le tourisme sans sacrifier notre identité 
                et notre environnement ? La qualité doit primer sur la quantité...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">FM</div>
                                    <div class="author-info">
                                        <h4>Fatima Madi</h4>
                                        <span>Hôtelière</span>
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
                            <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Femmes et développement">
                            <span class="article-badge">Société</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Société</span>
                                <span><i class="far fa-clock"></i> Il y a 4 jours</span>
                            </div>
                            <h3 class="article-title">
                                "L'émancipation des femmes, levier du développement"
                            </h3>
                            <p class="article-excerpt">
                                Une militante associative défend la cause des femmes : leur pleine 
                participation à la vie économique et politique est essentielle 
                pour construire une société plus juste et prospère...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">SA</div>
                                    <div class="author-info">
                                        <h4>Salima Abdou</h4>
                                        <span>Militante associative</span>
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
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Patrimoine culturel">
                            <span class="article-badge">Culture</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Culture</span>
                                <span><i class="far fa-clock"></i> Il y a 5 jours</span>
                            </div>
                            <h3 class="article-title">
                                "Sauvegarder notre patrimoine sans nous fossiliser"
                            </h3>
                            <p class="article-excerpt">
                                Un artiste appelle à une approche équilibrée : comment préserver 
                nos traditions tout en encourageant la création contemporaine ? 
                Le patrimoine doit être vivant et évolutif...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">OA</div>
                                    <div class="author-info">
                                        <h4>Omar Ali</h4>
                                        <span>Artiste plasticien</span>
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
                            <img src="https://images.unsplash.com/photo-1551135049-8a33b5883817?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Gouvernance locale">
                            <span class="article-badge">Politique</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Politique</span>
                                <span><i class="far fa-clock"></i> Il y a 8 jours</span>
                            </div>
                            <h3 class="article-title">
                                "Pour une véritable démocratie participative"
                            </h3>
                            <p class="article-excerpt">
                                Un ancien élu plaide pour plus de transparence : associons 
                davantage les citoyens aux décisions qui les concernent. 
                Les conseils de village doivent retrouver leur rôle consultatif...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">MA</div>
                                    <div class="author-info">
                                        <h4>Mariam Ahmed</h4>
                                        <span>Ancienne élue</span>
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
                        Recevez chaque semaine les dernières opinions et tribunes de Mohéli directement dans votre boîte email
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
    
    <script src="{{ asset("js/Front/rubriques/opinion.js") }}"></script>
</body>
</html>