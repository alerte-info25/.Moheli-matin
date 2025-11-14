<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouveau Message de Contact - Moheli matin</title>
    
    <link rel="stylesheet" href="{{ asset('css/Mail/contact.css') }}">
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <div class="email-logo">
                <i class="fas fa-broadcast-tower"></i>
            </div>
            <h1 class="email-title">Moheli matin</h1>
        </div>

        <!-- Content -->
        <div class="email-content">
            <!-- Alert Message -->
            <div class="message-alert">
                <div class="alert-icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <h2 class="alert-title">Nouveau Message de Contact</h2>
                <p class="alert-text">Vous avez reçu un nouveau message via le formulaire de contact</p>
            </div>

            <!-- Contact Information -->
            <div class="contact-info">
                <div class="info-section">
                    <div class="info-label">
                        <i class="fas fa-user"></i>
                        Informations Personnelles
                    </div>
                    <div class="info-value">
                        {{ $data['prenom'] ?? '' }} {{ $data['nom'] ?? '' }}
                    </div>
                </div>

                <div class="info-section">
                    <div class="info-label">
                        <i class="fas fa-envelope"></i>
                        Adresse Email
                    </div>
                    <div class="info-value">
                        {{ $data['email'] ?? 'Non renseigné' }}
                    </div>
                </div>

                <div class="info-section">
                    <div class="info-label">
                        <i class="fas fa-phone"></i>
                        Téléphone
                    </div>
                    <div class="info-value">
                        {{ $data['telephone'] ?? 'Non renseigné' }}
                    </div>
                </div>

                <div class="info-section">
                    <div class="info-label">
                        <i class="fas fa-tag"></i>
                        Sujet du Message
                    </div>
                    <div class="info-value">
                        {{ $data['sujet'] ?? '(Sans sujet)' }}
                    </div>
                </div>
            </div>

            <!-- Message Content -->
            <div class="message-section">
                <div class="info-label">
                    <i class="fas fa-comment-dots"></i>
                    Message
                </div>
                <div class="message-content">
                    {{ $data['message'] ?? 'Aucun contenu fourni.' }}
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p class="footer-text">
                Ce message a été envoyé automatiquement depuis le formulaire de contact du site <strong>Moheli matin</strong>.
            </p>
            <div class="footer-contact">
                <a href="mailto:contact@mohelimatin.ne" class="contact-item">
                    <i class="fas fa-envelope"></i>
                    contact@mohelimatin.ne
                </a>
                <a href="tel:+22720200000" class="contact-item">
                    <i class="fas fa-phone"></i>
                    +227 20 20 00 00
                </a>
                <a href="#" class="contact-item">
                    <i class="fas fa-globe"></i>
                    mohelimatin.ne
                </a>
            </div>
        </div>
    </div>

    <!-- Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</body>
</html>
