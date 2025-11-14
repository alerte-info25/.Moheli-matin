<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contactez MOHELI MATIN - Votre journal en ligne de Mohéli">
    <meta name="keywords" content="Mohéli, Comores, contact, journal, actualités, rédaction">
    <title>Contact | MOHELI MATIN | Journal en ligne de Mohéli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Front/contact.css") }}">
</head>
<body>

    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <i class="fas fa-envelope"></i>
            </div>
            <h2>MOHELI MATIN</h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p>Chargement de la page contact...</p>
        </div>
    </div>

    <!-- Toast Container -->
    @if (session()->has("alert"))
        <!-- Toast Container -->
        <div class="toast-container" id="toastContainer">
            <div class="custom-toast toast-{{ session("alert")["type"] }}">
                <div class="toast-icon">
                    <i class="fas fa-check"></i>
                </div>
                <div class="toast-content">
                    <h4>
                        {{ session("alert")["reason"] }}
                    </h4>
                    <p>
                        {{ session("alert")["message"] }}
                    </p>
                </div>
            </div>
        </div>
    @endif

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
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <span class="eyebrow-text">CONTACTEZ-NOUS</span>
                        </div>

                        <h1 class="hero-title">
                            Restons en <span class="highlight">contact</span>
                        </h1>

                        <p class="hero-subtitle">
                            Votre avis nous intéresse ! Contactez la rédaction de MOHELI MATIN 
                            pour partager vos idées, suggestions ou signaler des informations.
                        </p>

                        <div class="hero-cta">
                            <a href="{{ route("moheli.front.acceuil") }}" style="text-decoration: none" class="btn-primary">
                                <i class="fas fa-home"></i>
                                Retour à l'accueil
                            </a>
                            <a href="#contact-form" style="text-decoration: none" class="btn-secondary">
                                <i class="fas fa-paper-plane"></i>
                                Envoyer un message
                            </a>
                        </div>
                    </div>

                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1562575214-da9fcf59b907?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Contact Mohéli Matin">
                        <div class="image-overlay">
                            <h3>Une équipe à votre écoute</h3>
                            <p>Journalistes et rédacteurs disponibles pour vous répondre</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact-section">
            <div class="container">
                <div class="contact-container">

                    <div class="contact-grid">
                        <!-- Contact Information -->
                        <div class="contact-info">
                            <div class="contact-info-header">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <h2 class="contact-info-title">Nos Coordonnées</h2>
                                <p class="contact-info-subtitle">
                                    N'hésitez pas à nous contacter par téléphone, email ou à nous rendre visite à notre rédaction.
                                </p>
                            </div>

                            <div class="contact-methods">
                                <!-- Address -->
                                <div class="contact-method">
                                    <div class="method-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="method-content">
                                        <h3>Notre Adresse</h3>
                                        <p>Rue de la Presse, Fomboni</p>
                                        <p>Mohéli, Comores</p>
                                        <a href="#" class="method-link">
                                            <i class="fas fa-directions"></i>
                                            Voir sur la carte
                                        </a>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="contact-method">
                                    <div class="method-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="method-content">
                                        <h3>Téléphone</h3>
                                        <p>+269 123 45 67</p>
                                        <p>+269 987 65 43</p>
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
                                        <h3>Email</h3>
                                        <p>redaction@moheli-matin.km</p>
                                        <p>contact@moheli-matin.km</p>
                                        <a href="mailto:redaction@moheli-matin.km" class="method-link">
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
                                        <h3>Horaires d'ouverture</h3>
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
                                    <i class="fas fa-paper-plane"></i>
                                </div>
                                <h2 class="contact-form-title" id="contact-form">Envoyer un message</h2>
                                <p class="contact-form-subtitle">Nous vous répondrons dans les plus brefs délais</p>
                            </div>

                            <div class="contact-form-body">
                                <form method="POST" action="{{ route('moheli.front.contact.store') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">
                                                    <i class="fas fa-asterisk"></i> Prénom
                                                </label>
                                                <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
                                                @error('prenom')
                                                    <div class="text-danger small">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">
                                                    <i class="fas fa-asterisk"></i> Nom
                                                </label>
                                                <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
                                                @error('nom')
                                                    <div class="text-danger small">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-asterisk"></i> Adresse email
                                        </label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-phone"></i> Téléphone
                                        </label>
                                        <input type="tel" name="telephone" class="form-control" value="{{ old('telephone') }}" required>
                                        @error('telephone')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-asterisk"></i> Sujet
                                        </label>
                                        <select name="sujet" class="form-control" required>
                                            <option value="">Sélectionnez un sujet</option>
                                            <option value="info" {{ old('sujet') == 'info' ? 'selected' : '' }}>Demande d'information</option>
                                            <option value="suggestion" {{ old('sujet') == 'suggestion' ? 'selected' : '' }}>Suggestion</option>
                                            <option value="signalement" {{ old('sujet') == 'signalement' ? 'selected' : '' }}>Signalement</option>
                                            <option value="publicite" {{ old('sujet') == 'publicite' ? 'selected' : '' }}>Publicité</option>
                                            <option value="partenariat" {{ old('sujet') == 'partenariat' ? 'selected' : '' }}>Partenariat</option>
                                            <option value="autre" {{ old('sujet') == 'autre' ? 'selected' : '' }}>Autre</option>
                                        </select>
                                        @error('sujet')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-asterisk"></i> Message
                                        </label>
                                        <textarea name="message" rows="5" class="form-control" required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn-send">
                                        <i class="fas fa-paper-plane"></i> Envoyer le message
                                    </button>

                                    @if(session('success'))
                                        <div class="alert alert-success mt-3">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Map Section -->
        <section class="map-section">
            <div class="container">
                <div class="map-container">
                    <div class="map-header">
                        <h2 class="section-title">Notre Localisation</h2>
                        <p class="section-subtitle">
                            Retrouvez notre rédaction au cœur de Fomboni, accessible facilement depuis tout Mohéli
                        </p>
                    </div>
                    <div class="map-wrapper">
                        <div class="text-center">
                            <i class="fas fa-map-marked-alt fa-3x mb-3"></i>
                            <!-- <p>Carte interactive en cours de chargement...</p> -->
                            <small>Rue de la Presse, Fomboni - Mohéli</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section">
            <div class="container">
                <div class="faq-container">
                    <div class="map-header">
                        <h2 class="section-title">Questions Fréquentes</h2>
                        <p class="section-subtitle">
                            Retrouvez les réponses aux questions les plus courantes concernant notre journal
                        </p>
                    </div>

                    <div class="faq-list">
                        <!-- FAQ Item 1 -->
                        <div class="faq-item">
                            <button class="faq-question">
                                Comment proposer un article ou une information ?
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="faq-answer">
                                <p>
                                    Vous pouvez nous envoyer vos propositions d'articles via le formulaire de contact en sélectionnant 
                                    "Suggestion" comme sujet. Notre équipe de rédaction étudiera votre proposition et vous recontactera 
                                    si elle correspond à notre ligne éditoriale.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="faq-item">
                            <button class="faq-question">
                                Quels sont les délais de réponse ?
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="faq-answer">
                                <p>
                                    Nous nous engageons à répondre à tous les messages dans un délai de 48 heures ouvrées. 
                                    Pour les demandes urgentes, privilégiez l'appel téléphonique durant nos heures d'ouverture.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="faq-item">
                            <button class="faq-question">
                                Puis-je signaler une erreur dans un article ?
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="faq-answer">
                                <p>
                                    Oui, nous prenons très au sérieux l'exactitude de nos informations. Utilisez le formulaire 
                                    de contact en sélectionnant "Signalement" comme sujet et précisez l'article concerné ainsi 
                                    que l'erreur constatée. Nous corrigerons dans les plus brefs délais.
                                </p>
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="faq-item">
                            <button class="faq-question">
                                Comment devenir annonceur dans votre journal ?
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="faq-answer">
                                <p>
                                    Pour toute demande de publicité ou partenariat, contactez-nous via le formulaire en sélectionnant 
                                    "Publicité" ou "Partenariat". Notre service commercial vous recontactera pour discuter des 
                                    différentes options et tarifs disponibles.
                                </p>
                            </div>
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
    
    <script src="{{ asset("js/Front/contact.js") }}"></script>
</body>
</html>