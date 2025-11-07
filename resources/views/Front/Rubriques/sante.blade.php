<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Santé - MOHELI MATIN - Actualités santé de Mohéli">
    <meta name="keywords" content="Mohéli, Comores, santé, médecine, hôpital, soins, prévention">
    <title>Santé | MOHELI MATIN | Journal en ligne de Mohéli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Front/rubriques/sante.css") }}">
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <i class="fas fa-heartbeat"></i>
            </div>
            <h2>MOHELI MATIN</h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p>Chargement des actualités santé...</p>
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
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <span class="eyebrow-text">ACTUALITÉS SANTÉ</span>
                        </div>

                        <h1 class="hero-title">
                            Santé à <span class="highlight">Mohéli</span>
                        </h1>

                        <p class="hero-subtitle">
                            Informations médicales, prévention, et actualités des établissements de santé 
                            de l'île. Votre source fiable pour tout ce qui concerne la santé à Mohéli.
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
                        <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80" alt="Santé Mohéli">
                        <div class="image-overlay">
                            <h3>Soins de qualité</h3>
                            <p>Des professionnels dévoués au service de la population</p>
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
                        <span class="filter-tag">Hôpital</span>
                        <span class="filter-tag">Médecine</span>
                        <span class="filter-tag">Prévention</span>
                        <span class="filter-tag">Vaccination</span>
                        <span class="filter-tag">Maternité</span>
                        <span class="filter-tag">Médecins</span>
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
                    <h2 class="section-title">Actualités Santé</h2>
                    <p class="section-subtitle">
                        Les dernières informations sur la santé à Mohéli
                    </p>
                </div>

                <div class="articles-grid">
                    <!-- Article 1 - Featured -->
                    <article class="article-card featured">
                        <div class="article-image">
                            <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1173&q=80" alt="Nouvel équipement médical">
                            <span class="article-badge">À la une</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Équipement</span>
                                <span><i class="far fa-clock"></i> Il y a 2 heures</span>
                            </div>
                            <h3 class="article-title">
                                L'hôpital de Fomboni s'équipe d'un nouveau scanner médical
                            </h3>
                            <p class="article-excerpt">
                                Grâce à un financement du gouvernement provincial, l'hôpital de Fomboni 
                                dispose désormais d'un scanner moderne permettant des diagnostics plus 
                                précis. Cet équipement bénéficiera à toute la population de l'île...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">DM</div>
                                    <div class="author-info">
                                        <h4>Dr. Ali Mohamed</h4>
                                        <span>Correspondant médical</span>
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
                            <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1180&q=80" alt="Campagne vaccination">
                            <span class="article-badge">Prévention</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Vaccination</span>
                                <span><i class="far fa-clock"></i> Il y a 1 jour</span>
                            </div>
                            <h3 class="article-title">
                                Campagne de vaccination contre la rougeole dans les écoles
                            </h3>
                            <p class="article-excerpt">
                                Le service de santé lance une campagne massive de vaccination 
                                contre la rougeole ciblant les enfants de 6 à 12 ans...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">SM</div>
                                    <div class="author-info">
                                        <h4>Saïda Moussa</h4>
                                        <span>Journaliste santé</span>
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
                            <img src="https://images.unsplash.com/photo-1551601651-2a8555f1a136?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1332&q=80" alt="Formation médecins">
                            <span class="article-badge">Formation</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Médecine</span>
                                <span><i class="far fa-clock"></i> Il y a 2 jours</span>
                            </div>
                            <h3 class="article-title">
                                Formation continue pour les médecins généralistes de l'île
                            </h3>
                            <p class="article-excerpt">
                                Un programme de formation en partenariat avec l'OMS permet 
                                aux médecins de se perfectionner dans le traitement des 
                                maladies tropicales...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">NA</div>
                                    <div class="author-info">
                                        <h4>Nassur Ahmed</h4>
                                        <span>Correspondant médical</span>
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
                            <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1153&q=80" alt="Maternité">
                            <span class="article-badge">Infrastructure</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Maternité</span>
                                <span><i class="far fa-clock"></i> Il y a 3 jours</span>
                            </div>
                            <h3 class="article-title">
                                Rénovation complète de la maternité de Nioumachoua
                            </h3>
                            <p class="article-excerpt">
                                La maternité du centre de santé de Nioumachoua a été entièrement 
                                rénovée et équipée de nouveaux lits et matériels médicaux...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">FM</div>
                                    <div class="author-info">
                                        <h4>Fatima Madi</h4>
                                        <span>Journaliste santé</span>
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
                            <img src="https://plus.unsplash.com/premium_photo-1723107368162-58b152cb1f32?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1332" alt="Prévention paludisme">
                            <span class="article-badge">Sensibilisation</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Prévention</span>
                                <span><i class="far fa-clock"></i> Il y a 4 jours</span>
                            </div>
                            <h3 class="article-title">
                                Campagne de sensibilisation contre le paludisme
                            </h3>
                            <p class="article-excerpt">
                                Distribution de moustiquaires imprégnées et sensibilisation 
                                aux gestes de prévention dans les villages les plus touchés...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">SA</div>
                                    <div class="author-info">
                                        <h4>Salima Abdou</h4>
                                        <span>Correspondante santé</span>
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
                            <img src="https://images.unsplash.com/photo-1559757175-0eb30cd8c063?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Médecins bénévoles">
                            <span class="article-badge">Solidarité</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Médecins</span>
                                <span><i class="far fa-clock"></i> Il y a 5 jours</span>
                            </div>
                            <h3 class="article-title">
                                Mission médicale française à Mohéli
                            </h3>
                            <p class="article-excerpt">
                                Une équipe de médecins français bénévoles propose des consultations 
                                gratuites dans les villages reculés pendant deux semaines...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">OA</div>
                                    <div class="author-info">
                                        <h4>Omar Ali</h4>
                                        <span>Journaliste santé</span>
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
                            <img src="https://images.unsplash.com/photo-1622230208995-0f26eba75875?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=880" alt="Pharmacie communautaire">
                            <span class="article-badge">Innovation</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Médicaments</span>
                                <span><i class="far fa-clock"></i> Il y a 8 jours</span>
                            </div>
                            <h3 class="article-title">
                                Ouverture d'une pharmacie communautaire à Fomboni
                            </h3>
                            <p class="article-excerpt">
                                Une nouvelle pharmacie offrant des médicaments à prix réduits 
                                pour les familles modestes vient d'ouvrir ses portes...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">MA</div>
                                    <div class="author-info">
                                        <h4>Mariam Ahmed</h4>
                                        <span>Journaliste santé</span>
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
                        Recevez chaque semaine les dernières actualités santé de Mohéli directement dans votre boîte email
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
    
    <script src="{{ asset("js/Front/rubriques/sante.js") }}"></script>
</body>
</html>