<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Politique - MOHELI MATIN - Actualités politiques de Mohéli">
    <meta name="keywords" content="Mohéli, Comores, politique, gouvernement, élections, assemblée, administration">
    <title>Politique | MOHELI MATIN | Journal en ligne de Mohéli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Front/rubriques/politique.css") }}">
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <i class="fas fa-landmark"></i>
            </div>
            <h2>MOHELI MATIN</h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p>Chargement des actualités politiques...</p>
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
                                <i class="fas fa-landmark"></i>
                            </div>
                            <span class="eyebrow-text">ACTUALITÉS POLITIQUES</span>
                        </div>

                        <h1 class="hero-title">
                            Politique à <span class="highlight">Mohéli</span>
                        </h1>

                        <p class="hero-subtitle">
                            Suivez la vie politique mohélienne : décisions gouvernementales, 
                            débats parlementaires, élections et relations internationales. 
                            Toute l'information politique de l'île en temps réel.
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
                        <img src="https://images.unsplash.com/photo-1551135049-8a33b5883817?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Vie politique mohélienne">
                        <div class="image-overlay">
                            <h3>Débats et décisions</h3>
                            <p>La vie politique au cœur de l'actualité</p>
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
                        <span class="filter-tag">Gouvernement</span>
                        <span class="filter-tag">Élections</span>
                        <span class="filter-tag">Assemblée</span>
                        <span class="filter-tag">Administration</span>
                        <span class="filter-tag">Partis</span>
                        <span class="filter-tag">Diplomatie</span>
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
                    <h2 class="section-title">Actualités Politiques</h2>
                    <p class="section-subtitle">
                        Les décisions et débats qui façonnent l'avenir de Mohéli
                    </p>
                </div>

                <div class="articles-grid">
                    <!-- Article 1 - Featured -->
                    <article class="article-card featured">
                        <div class="article-image">
                            <img src="https://plus.unsplash.com/premium_photo-1680795561618-267bfb9694e5?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1172" alt="Session parlementaire">
                            <span class="article-badge">À la une</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Assemblée</span>
                                <span><i class="far fa-clock"></i> Il y a 2 heures</span>
                            </div>
                            <h3 class="article-title">
                                Ouverture de la session budgétaire de l'Assemblée de Mohéli
                            </h3>
                            <p class="article-excerpt">
                                Les députés mohéliens ont entamé ce matin l'examen du projet de loi 
                                de finances 2025. Le budget, d'un montant record de 15 milliards 
                                de francs comoriens, prévoit d'importants investissements dans 
                                les infrastructures et l'éducation. Des débats animés sont attendus 
                                sur la répartition des crédits...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">SM</div>
                                    <div class="author-info">
                                        <h4>Saïd Mohamed</h4>
                                        <span>Correspondant parlementaire</span>
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
                            <img src="https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=687" alt="Visite officielle">
                            <span class="article-badge">Diplomatie</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Diplomatie</span>
                                <span><i class="far fa-clock"></i> Il y a 1 jour</span>
                            </div>
                            <h3 class="article-title">
                                Visite historique du président de l'Union des Comores à Fomboni
                            </h3>
                            <p class="article-excerpt">
                                Le président de l'Union des Comores effectue une visite de deux jours 
                                à Mohéli pour renforcer la coopération inter-îles. Au programme : 
                                signature d'accords de développement et inauguration de nouveaux 
                                projets d'infrastructure...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">AM</div>
                                    <div class="author-info">
                                        <h4>Ali Moussa</h4>
                                        <span>Journaliste politique</span>
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
                            <img src="https://plus.unsplash.com/premium_photo-1680247755157-dc23af6a9e88?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170" alt="Réforme administrative">
                            <span class="article-badge">Administration</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Administration</span>
                                <span><i class="far fa-clock"></i> Il y a 2 jours</span>
                            </div>
                            <h3 class="article-title">
                                Lancement de la réforme de la fonction publique mohélienne
                            </h3>
                            <p class="article-excerpt">
                                Le gouvernement provincial annonce une vaste réforme visant à 
                                moderniser l'administration et améliorer les services publics. 
                                Formation des agents, digitalisation et lutte contre la corruption 
                                sont au cœur du dispositif...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">NA</div>
                                    <div class="author-info">
                                        <h4>Nassur Ahmed</h4>
                                        <span>Spécialiste administration</span>
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
                            <img src="https://images.unsplash.com/photo-1494172961521-33799ddd43a5?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1171" alt="Élections municipales">
                            <span class="article-badge">Élections</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Élections</span>
                                <span><i class="far fa-clock"></i> Il y a 3 jours</span>
                            </div>
                            <h3 class="article-title">
                                Préparation des élections municipales : les partis en campagne
                            </h3>
                            <p class="article-excerpt">
                                Les formations politiques commencent à dévoiler leurs candidats 
                                pour les prochaines élections municipales. Enjeu majeur : 
                                le renouvellement des conseils municipaux dans les 12 communes 
                                de l'île...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">FM</div>
                                    <div class="author-info">
                                        <h4>Fatima Madi</h4>
                                        <span>Journaliste élections</span>
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
                            <img src="https://plus.unsplash.com/premium_photo-1722859358264-7ee23aeabd9d?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1169" alt="Coopération internationale">
                            <span class="article-badge">Diplomatie</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Diplomatie</span>
                                <span><i class="far fa-clock"></i> Il y a 4 jours</span>
                            </div>
                            <h3 class="article-title">
                                Signature d'un accord de coopération avec la France
                            </h3>
                            <p class="article-excerpt">
                                Mohéli et la France renforcent leur partenariat dans les domaines 
                                de l'éducation, la santé et le développement durable. L'accord 
                                prévoit notamment des bourses d'études et des échanges culturels...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">SA</div>
                                    <div class="author-info">
                                        <h4>Salima Abdou</h4>
                                        <span>Correspondante diplomatique</span>
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
                            <img src="https://images.unsplash.com/photo-1603119761708-9252f043c139?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1332" alt="Partis politiques">
                            <span class="article-badge">Partis</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Partis</span>
                                <span><i class="far fa-clock"></i> Il y a 5 jours</span>
                            </div>
                            <h3 class="article-title">
                                Congrès du parti au pouvoir : vers un renouvellement des cadres
                            </h3>
                            <p class="article-excerpt">
                                Le parti majoritaire tient son congrès extraordinaire avec pour 
                                objectif de rajeunir son équipe dirigeante. Plusieurs nouvelles 
                                têtes devraient faire leur entrée au bureau politique...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">OA</div>
                                    <div class="author-info">
                                        <h4>Omar Ali</h4>
                                        <span>Analyste politique</span>
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
                            <img src="https://images.unsplash.com/photo-1481189421626-9ab38078efc2?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170" alt="Gouvernement provincial">
                            <span class="article-badge">Gouvernement</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Gouvernement</span>
                                <span><i class="far fa-clock"></i> Il y a 8 jours</span>
                            </div>
                            <h3 class="article-title">
                                Remaniement ministériel : trois nouveaux portefeuilles
                            </h3>
                            <p class="article-content">
                                Le gouverneur de Mohéli procède à un remaniement de son équipe 
                                gouvernementale. Les secteurs de l'environnement, du numérique 
                                et du tourisme changent de titulaires...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">MA</div>
                                    <div class="author-info">
                                        <h4>Mariam Ahmed</h4>
                                        <span>Journaliste gouvernement</span>
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
                        Recevez chaque semaine les dernières actualités politiques de Mohéli directement dans votre boîte email
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
    
    <script src="{{ asset("js/Front/rubriques/politique.js") }}"></script>
</body>
</html>