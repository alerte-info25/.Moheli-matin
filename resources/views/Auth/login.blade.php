<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Connexion à MOHELI MATIN - Accédez à votre compte personnel">
    <meta name="keywords" content="Mohéli, Comores, connexion, compte, journal, actualités">
    <title>Connexion | MOHELI MATIN | Journal en ligne de Mohéli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Auth/login.css") }}">
</head>
<body>

    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <i class="fas fa-sign-in-alt"></i>
            </div>
            <h2>MOHELI MATIN</h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p>Préparation de la connexion...</p>
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
                                <i class="fas fa-sign-in-alt"></i>
                            </div>
                            <span class="eyebrow-text">ACCÈS MEMBRE</span>
                        </div>

                        <h1 class="hero-title">
                            Connectez-vous à votre <span class="highlight">compte</span>
                        </h1>

                        <p class="hero-subtitle">
                            Accédez à votre espace personnel pour gérer vos préférences, 
                            sauvegarder vos articles et recevoir des alertes personnalisées sur l'actualité de Mohéli.
                        </p>
                    </div>

                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1509822929063-6b6cfc9b42f2?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170">
                        <div class="image-overlay">
                            <h3>Espace membre sécurisé</h3>
                            <p>Vos données sont protégées et confidentielles</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Login Section -->
        <section class="login-section">
            <div class="container">
                <div class="login-container">
                    <div class="login-card">
                        <div class="login-header">
                            <div class="login-icon">
                                <i class="fas fa-sign-in-alt"></i>
                            </div>
                            <h2 class="login-title">Connexion</h2>
                            <p class="login-subtitle">Accédez à votre espace personnel</p>
                        </div>

                        <div class="login-body">
                            <form id="loginForm" method="POST" action="{{ route("moheli.login.post") }}">
                                
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

                                @if (session()->has("alert"))
                                    <div class="alert alert-{{ session("alert")["type"] }}">
                                        {{ session("alert")["message"] }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label class="form-label" for="email">
                                        <i class="fas fa-asterisk"></i>
                                        Adresse email
                                    </label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                                    @error("email")
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-circle"></i>
                                            Veuillez renseigner une adresse email valide
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="password">
                                        <i class="fas fa-asterisk"></i>
                                        Mot de passe
                                    </label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                    @error("email")
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-circle"></i>
                                            Veuillez renseigner votre mot de passe
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn-login" id="btnLoginSubmit">
                                    <i class="fas fa-sign-in-alt"></i>
                                    Se connecter
                                </button>

                                <div class="login-footer">
                                    <p>Pas encore de compte ? <a href="{{ route("moheli.register") }}">Inscrivez-vous ici</a></p>
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
    
    <script src="{{ asset("js/Auth/login.js") }}"></script>
</body>
</html>