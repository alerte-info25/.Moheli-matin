<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inscription à MOHELI MATIN - Créez votre compte pour accéder à toutes les fonctionnalités">
    <meta name="keywords" content="Mohéli, Comores, inscription, compte, journal, actualités">
    <title>Inscription | MOHELI MATIN | Journal en ligne de Mohéli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Auth/register.css") }}">
</head>
<body>

    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <i class="fas fa-user-plus"></i>
            </div>
            <h2>MOHELI MATIN</h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p>Préparation du formulaire d'inscription...</p>
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
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <span class="eyebrow-text">REJOIGNEZ-NOUS</span>
                        </div>

                        <h1 class="hero-title">
                            Créez votre <span class="highlight">compte</span> MOHELI MATIN
                        </h1>

                        <p class="hero-subtitle">
                            Accédez à toutes les fonctionnalités exclusives de notre plateforme. 
                            Recevez des alertes personnalisées, sauvegardez vos articles préférés et participez à la communauté.
                        </p>
                    </div>

                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1517817748493-49ec54a32465?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170">
                        <div class="image-overlay">
                            <h3>Rejoignez notre communauté</h3>
                            <p>Plus de 15 000 lecteurs nous font déjà confiance</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Registration Section -->
        <section class="registration-section">
            <div class="container">
                <div class="registration-container">
                    
                    <div class="registration-card">
                        <div class="registration-header">
                            <div class="registration-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <h2 class="registration-title">Inscription</h2>
                            <p class="registration-subtitle">Créez votre compte en moins de 2 minutes</p>
                        </div>

                        <div class="registration-body">
                            <form id="registrationForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="firstName">
                                                <i class="fas fa-asterisk"></i>
                                                Prénom
                                            </label>
                                            <input type="text" class="form-control" id="firstName" required>
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle"></i>
                                                Veuillez renseigner votre prénom
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="lastName">
                                                <i class="fas fa-asterisk"></i>
                                                Nom
                                            </label>
                                            <input type="text" class="form-control" id="lastName" required>
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle"></i>
                                                Veuillez renseigner votre nom
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="email">
                                        <i class="fas fa-asterisk"></i>
                                        Adresse email
                                    </label>
                                    <input type="email" class="form-control" id="email" required>
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle"></i>
                                        Veuillez renseigner une adresse email valide
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="phone">
                                        <i class="fas fa-phone"></i>
                                        Téléphone (optionnel)
                                    </label>
                                    <input type="tel" class="form-control" id="phone">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="password">
                                                <i class="fas fa-asterisk"></i>
                                                Mot de passe
                                            </label>
                                            <input type="password" class="form-control" id="password" required>
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle"></i>
                                                Le mot de passe doit contenir au moins 8 caractères
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="confirmPassword">
                                                <i class="fas fa-asterisk"></i>
                                                Confirmer le mot de passe
                                            </label>
                                            <input type="password" class="form-control" id="confirmPassword" required>
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle"></i>
                                                Les mots de passe ne correspondent pas
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Localisation (optionnel)
                                    </label>
                                    <select class="form-control" id="location">
                                        <option value="">Sélectionnez votre localisation</option>
                                        <option value="fomboni">Fomboni</option>
                                        <option value="nioumachoua">Nioumachoua</option>
                                        <option value="miringoni">Miringoni</option>
                                        <option value="other">Autre</option>
                                    </select>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="newsletter">
                                    <label class="form-check-label" for="newsletter">
                                        Je souhaite recevoir la newsletter de MOHELI MATIN avec les dernières actualités
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        J'accepte les <a href="#">conditions d'utilisation</a> et la <a href="#">politique de confidentialité</a>
                                    </label>
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle"></i>
                                        Vous devez accepter les conditions d'utilisation
                                    </div>
                                </div>

                                <button type="submit" class="btn-register" id="btnRegister">
                                    <i class="fas fa-user-plus"></i>
                                    Créer mon compte
                                </button>

                                <div class="registration-footer">
                                    <p>Déjà inscrit ? <a href="{{ route("mohelie.login") }}">Connectez-vous ici</a></p>
                                </div>
                            </form>
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
    
    <script src="{{ asset("js/Auth/register.js") }}"></script>
</body>
</html>