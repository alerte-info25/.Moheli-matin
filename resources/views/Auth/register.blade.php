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

    <!-- Loading Screen -->
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

                            <form id="registrationForm" method="POST" action="{{ route("moheli.register.post") }}">

                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="firstName">
                                                <i class="fas fa-asterisk"></i>
                                                Prénom
                                            </label>
                                            <input type="text" class="form-control" id="firstName" name="prenom" value="{{ old('prenom') }}" required>
                                            @error("prenom")
                                                <div class="invalid-feedback">
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    Veuillez renseigner un prénom valide.
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="lastName">
                                                <i class="fas fa-asterisk"></i>
                                                Nom
                                            </label>
                                            <input type="text" class="form-control" id="lastName" name="nom" value="{{ old('nom') }}" required>
                                            @error("nom")
                                                <div class="invalid-feedback">
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    Veuillez renseigner un nom valide.
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="email">
                                        <i class="fas fa-asterisk"></i>
                                        Adresse email
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                                    @error("email")
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-circle"></i>
                                            Veuillez renseigner une adresse email valide.
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="phone">
                                        <i class="fas fa-phone"></i>
                                        Téléphone
                                    </label>
                                    <input type="tel" class="form-control" id="phone" name="contact" value="{{ old('contact') }}" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role" class="form-label required">Genre</label>
                                            <div class="input-group">
                                                <select name="genre" class="form-control" id="role">
                                                    <option value="">choisissez votre genre</option>
                                                    <option value="homme">Homme</option>
                                                    <option value="Femme">Femme</option>
                                                    <option value="autres">autres</option>
                                                </select>
                                            </div>
                                        </div>
                                        @error("genre")
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle"></i>
                                                Veuillez sélectionne un genre s'il vous plaît.
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password" class="form-label">Localité</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="localite" name="localite" placeholder="abidjan" value="{{ old('localite') }}" required>
                                            </div>
                                        </div>

                                        @error("localite")
                                            <div class="invalid-feedback">
                                                <i class="fas fa-exclamation-circle"></i>
                                                Veuillez sélectionne une localité valide.
                                            </div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="password">
                                                <i class="fas fa-asterisk"></i>
                                                Mot de passe
                                            </label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                            @error("password")
                                                <div class="invalid-feedback">
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    Le mot de passe doit contenir au moins 8 caractères
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="confirmPassword">
                                                <i class="fas fa-asterisk"></i>
                                                Confirmer le mot de passe
                                            </label>
                                            <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" required>
                                            @error("password_confirmation")
                                                <div class="invalid-feedback">
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    Les mots de passe ne correspondent pas
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter" value="1">
                                    <label class="form-check-label" for="newsletter">
                                        Je souhaite recevoir la newsletter de MOHELI MATIN avec les dernières actualités
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms" value="1" required>
                                    <label class="form-check-label" for="terms">
                                        J'accepte les <a href="#">conditions d'utilisation</a> et la <a href="#">politique de confidentialité</a>
                                    </label>
                                    @error("terms")
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-circle"></i>
                                            Vous devez accepter les conditions d'utilisation
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn-register" id="btnRegister">
                                    <i class="fas fa-user-plus"></i>
                                    Créer mon compte
                                </button>

                                <div class="registration-footer">
                                    <p>Déjà inscrit ? <a href="{{ route("moheli.login") }}">Connectez-vous ici</a></p>
                                </div>
                            </form>
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
    
    <script src="{{ asset("js/Auth/register.js") }}"></script>
</body>
</html>