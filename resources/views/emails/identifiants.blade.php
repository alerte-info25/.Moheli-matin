<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compte Créé - Moheli Matin</title>
    
    <link rel="stylesheet" href="{{ asset("css/Mail/identifiants.css") }}">
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <div class="email-logo">
                <i class="fas fa-newspaper"></i>
            </div>
            <h1 class="email-title">Moheli Matin</h1>
            <p class="email-subtitle">Votre source d'information quotidienne</p>
        </div>

        <!-- Content -->
        <div class="email-content">
            <!-- Welcome Section -->
            <div class="welcome-section">
                <div class="welcome-icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <h2 class="welcome-title">Bienvenue {{ $user->prenom }} {{ $user->nom }} !</h2>
                <p class="welcome-text">
                    Votre compte a été créé avec succès sur notre plateforme Moheli Matin.
                </p>
            </div>

            <!-- Credentials Card -->
            <div class="credentials-card">
                <h3 class="credentials-title">
                    <i class="fas fa-key"></i>
                    Vos identifiants de connexion
                </h3>
                <ul class="credentials-list">
                    <li class="credential-item">
                        <div class="credential-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="credential-content">
                            <div class="credential-label">Adresse Email</div>
                            <div class="credential-value">{{ $user->email }}</div>
                        </div>
                    </li>
                    <li class="credential-item">
                        <div class="credential-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="credential-content">
                            <div class="credential-label">Mot de passe par défaut</div>
                            <div class="credential-value">{{ $password }}</div>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Security Alert -->
            <div class="security-alert">
                <div class="alert-header">
                    <i class="fas fa-shield-alt alert-icon"></i>
                    <h4 class="alert-title">Recommandation de sécurité</h4>
                </div>
                <p class="alert-text">
                    Pour la sécurité de votre compte, nous vous conseillons de changer votre mot de passe 
                    lors de votre première connexion à la plateforme.
                </p>
            </div>

            <!-- Action Section -->
            <div class="action-section">
                <a href="{{ url('/moheli/login') }}" class="btn-primary">
                    <i class="fas fa-sign-in-alt"></i>
                    Se connecter à la plateforme
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p class="signature">
                Cordialement,<br>
                <span class="team-name">L'équipe Moheli Matin</span>
            </p>
            <div class="footer-contact">
                <a href="mailto:support@moheli-matin.com" class="contact-item">
                    <i class="fas fa-envelope"></i>
                    support@moheli-matin.com
                </a>
                <a href="#" class="contact-item">
                    <i class="fas fa-globe"></i>
                    moheli-matin.com
                </a>
            </div>
        </div>
    </div>

    <!-- Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</body>
</html>