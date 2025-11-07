<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Publicité - MOHELI MATIN - Votre journal en ligne de Mohéli">
    <meta name="keywords" content="Mohéli, Comores, publicité, annonces, marketing, médias">
    <title>Publicité | MOHELI MATIN | Journal en ligne de Mohéli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Front/publicite.css") }}">
</head>
<body>

    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <i class="fas fa-bullhorn"></i>
            </div>
            <h2>MOHELI MATIN</h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p>Chargement de l'espace publicité...</p>
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
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <span class="eyebrow-text">ESPACE PUBLICITAIRE</span>
                        </div>

                        <h1 class="hero-title">
                            Boostez votre <span class="highlight">visibilité</span>
                        </h1>

                        <p class="hero-subtitle">
                            Touchez plus de 50 000 lecteurs mensuels avec MOHELI MATIN. 
                            Des solutions publicitaires adaptées à votre budget et vos objectifs.
                        </p>

                        <div class="hero-cta">
                            <a href="#packages" class="btn-primary" style="text-decoration: none">
                                <i class="fas fa-eye"></i>
                                Voir nos offres
                            </a>
                            <a href="#contact" class="btn-secondary" style="text-decoration: none">
                                <i class="fas fa-phone-alt"></i>
                                Nous contacter
                            </a>
                        </div>
                    </div>

                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Publicité Mohéli Matin">
                        <div class="image-overlay">
                            <h3>Votre audience vous attend</h3>
                            <p>Plus de 50 000 lecteurs mensuels sur Mohéli</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Packages Section -->
        <section class="packages-section" id="packages">
            <div class="container">
                <a href="{{ route("mohelie.front.acceuil") }}" class="back-to-home">
                    <i class="fas fa-arrow-left"></i>
                    Retour à l'accueil
                </a>

                <div class="text-center mb-5">
                    <h2 class="section-title">Nos Formules Publicitaires</h2>
                    <p class="section-subtitle">
                        Choisissez la formule qui correspond le mieux à vos besoins et votre budget
                    </p>
                </div>

                <div class="packages-grid">
                    <!-- Package Basic -->
                    <div class="package-card">
                        <div class="package-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3 class="package-name">Découverte</h3>
                        <div class="package-price">
                            50 000 KMF
                            <span class="package-period">/mois</span>
                        </div>
                        <ul class="package-features">
                            <li><i class="fas fa-check"></i> Bannière 300x250 pixels</li>
                            <li><i class="fas fa-check"></i> 50 000 impressions/mois</li>
                            <li><i class="fas fa-check"></i> Page dédiée entreprise</li>
                            <li><i class="fas fa-check"></i> Statistiques mensuelles</li>
                            <li><i class="fas fa-times"></i> Article sponsorisé</li>
                            <li><i class="fas fa-times"></i> Réseaux sociaux</li>
                        </ul>
                        <button class="btn-package btn-package-secondary">
                            <i class="fas fa-shopping-cart"></i>
                            Choisir cette offre
                        </button>
                    </div>

                    <!-- Package Professional -->
                    <div class="package-card featured">
                        <div class="package-icon">
                            <i class="fas fa-gem"></i>
                        </div>
                        <h3 class="package-name">Professionnel</h3>
                        <div class="package-price">
                            150 000 KMF
                            <span class="package-period">/mois</span>
                        </div>
                        <ul class="package-features">
                            <li><i class="fas fa-check"></i> Bannière 728x90 pixels</li>
                            <li><i class="fas fa-check"></i> 150 000 impressions/mois</li>
                            <li><i class="fas fa-check"></i> 1 article sponsorisé/mois</li>
                            <li><i class="fas fa-check"></i> Publication réseaux sociaux</li>
                            <li><i class="fas fa-check"></i> Newsletter inclusion</li>
                            <li><i class="fas fa-check"></i> Rapport détaillé</li>
                        </ul>
                        <button class="btn-package btn-package-primary">
                            <i class="fas fa-crown"></i>
                            Offre populaire
                        </button>
                    </div>

                    <!-- Package Enterprise -->
                    <div class="package-card">
                        <div class="package-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3 class="package-name">Enterprise</h3>
                        <div class="package-price">
                            300 000 KMF
                            <span class="package-period">/mois</span>
                        </div>
                        <ul class="package-features">
                            <li><i class="fas fa-check"></i> Bannière homepage</li>
                            <li><i class="fas fa-check"></i> Illimité impressions</li>
                            <li><i class="fas fa-check"></i> 4 articles sponsorisés/mois</li>
                            <li><i class="fas fa-check"></i> Campagne réseaux sociaux</li>
                            <li><i class="fas fa-check"></i> Interview exclusive</li>
                            <li><i class="fas fa-check"></i> Support dédié</li>
                        </ul>
                        <button class="btn-package btn-package-secondary">
                            <i class="fas fa-briefcase"></i>
                            Choisir cette offre
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats-section">
            <div class="container">
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number">50K+</div>
                        <div class="stat-label">Lecteurs Mensuels</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">75%</div>
                        <div class="stat-label">Taux d'Engagement</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">2.5x</div>
                        <div class="stat-label">ROI Moyen</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">24h</div>
                        <div class="stat-label">Support Réactif</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact-section" id="contact">
            <div class="container">
                <div class="contact-container">
                    <div class="contact-grid">
                        <!-- Contact Information -->
                        <div class="contact-info">
                            <div class="contact-info-header">
                                <div class="contact-icon">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <h2 class="contact-info-title">Service Commercial</h2>
                                <p class="contact-info-subtitle">
                                    Notre équipe commerciale est à votre disposition pour étudier 
                                    votre projet et vous proposer la solution la plus adaptée.
                                </p>
                            </div>

                            <div class="contact-methods">
                                <!-- Commercial Contact -->
                                <div class="contact-method">
                                    <div class="method-icon">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <div class="method-content">
                                        <h3>Responsable Commercial</h3>
                                        <p>M. Ali Mohamed</p>
                                        <p>Spécialiste en marketing digital</p>
                                        <a href="tel:+2691234567" class="method-link">
                                            <i class="fas fa-phone-alt"></i>
                                            Appeler maintenant
                                        </a>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="contact-method">
                                    <div class="method-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="method-content">
                                        <h3>Email Commercial</h3>
                                        <p>pub@moheli-matin.km</p>
                                        <p>commercial@moheli-matin.km</p>
                                        <a href="mailto:pub@moheli-matin.km" class="method-link">
                                            <i class="fas fa-paper-plane"></i>
                                            Envoyer un email
                                        </a>
                                    </div>
                                </div>

                                <!-- Hours -->
                                <div class="contact-method">
                                    <div class="method-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="method-content">
                                        <h3>Horaires Commercial</h3>
                                        <p>Lundi - Vendredi: 8h00 - 18h00</p>
                                        <p>Samedi: 9h00 - 13h00</p>
                                        <p>Dimanche: Fermé</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Form -->
                        <div class="contact-form-card">
                            <div class="contact-form-header">
                                <div class="form-icon">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                                <h2 class="contact-form-title">Devis Gratuit</h2>
                                <p class="contact-form-subtitle">Obtenez une proposition personnalisée sous 24h</p>
                            </div>

                            <div class="contact-form-body">
                                <form id="adForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="companyName">
                                                    <i class="fas fa-asterisk"></i>
                                                    Entreprise
                                                </label>
                                                <input type="text" class="form-control" id="companyName" required>
                                                <div class="invalid-feedback">
                                                    Veuillez renseigner le nom de votre entreprise
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="contactPerson">
                                                    <i class="fas fa-asterisk"></i>
                                                    Contact
                                                </label>
                                                <input type="text" class="form-control" id="contactPerson" required>
                                                <div class="invalid-feedback">
                                                    Veuillez renseigner votre nom
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="adEmail">
                                            <i class="fas fa-asterisk"></i>
                                            Email professionnel
                                        </label>
                                        <input type="email" class="form-control" id="adEmail" required>
                                        <div class="invalid-feedback">
                                            Veuillez renseigner une adresse email valide
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="adPhone">
                                            <i class="fas fa-phone"></i>
                                            Téléphone
                                        </label>
                                        <input type="tel" class="form-control" id="adPhone" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="budget">
                                            <i class="fas fa-asterisk"></i>
                                            Budget mensuel
                                        </label>
                                        <select class="form-control" id="budget" required>
                                            <option value="">Sélectionnez votre budget</option>
                                            <option value="50k">50 000 - 100 000 KMF</option>
                                            <option value="150k">100 000 - 200 000 KMF</option>
                                            <option value="300k">200 000 - 500 000 KMF</option>
                                            <option value="500k">+500 000 KMF</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Veuillez sélectionner votre budget
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="campaignType">
                                            <i class="fas fa-asterisk"></i>
                                            Type de campagne
                                        </label>
                                        <select class="form-control" id="campaignType" required>
                                            <option value="">Sélectionnez un type</option>
                                            <option value="branding">Notoriété de marque</option>
                                            <option value="traffic">Génération de trafic</option>
                                            <option value="lead">Génération de leads</option>
                                            <option value="sales">Augmentation des ventes</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Veuillez sélectionner le type de campagne
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="adMessage">
                                            <i class="fas fa-asterisk"></i>
                                            Description du projet
                                        </label>
                                        <textarea class="form-control" id="adMessage" rows="4" required placeholder="Décrivez votre projet, vos objectifs et vos attentes..."></textarea>
                                        <div class="invalid-feedback">
                                            Veuillez décrire votre projet
                                        </div>
                                    </div>

                                    <button type="submit" class="btn-send">
                                        <i class="fas fa-paper-plane"></i>
                                        Demander un devis
                                    </button>
                                </form>
                            </div>
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
    
    <script src="{{ asset("js/Front/publicite.js") }}"></script>
</body>
</html>