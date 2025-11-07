<link rel="stylesheet" href="{{ asset("css/Front/headerAjust.css") }}">

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Sidebar Navigation -->
<nav class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <button class="close-sidebar" id="closeSidebar">
            <i class="fas fa-times"></i>
        </button>
        <div class="logo-icon-sidebar">
            <i class="fas fa-newspaper"></i>
        </div>
        <div class="logo-text-sidebar">
            <h1>MOHELI MATIN</h1>
            <span>Journal en ligne de Mohéli</span>
        </div>
    </div>

    

    <div class="sidebar-nav">
        <a href="{{ route("mohelie.front.acceuil") }}" class="nav-item {{ request()->routeIs("mohelie.front.acceuil") ? "active" : "" }}">
            <i class="fas fa-home"></i>
            Accueil
        </a>
        <a href="{{ route("mohelie.front.societe") }}" class="nav-item {{ request()->routeIs("mohelie.front.societe") ? "active" : "" }}">
            <i class="fas fa-users"></i>
            Société
        </a>
        <a href="{{ route("mohelie.front.sante") }}" class="nav-item {{ request()->routeIs("mohelie.front.sante") ? "active" : "" }}">
            <i class="fas fa-heartbeat"></i>
            Santé
        </a>
        <a href="{{ route("mohelie.front.culture") }}" class="nav-item {{ request()->routeIs("mohelie.front.culture") ? "active" : "" }}">
            <i class="fas fa-palette"></i>
            Culture
        </a>
        <a href="{{ route("mohelie.front.opinion") }}" class="nav-item {{ request()->routeIs("mohelie.front.opinion") ? "active" : "" }}">
            <i class="fas fa-comment-alt"></i>
            Opinion
        </a>
        <a href="{{ route("mohelie.front.politique") }}" class="nav-item {{ request()->routeIs("mohelie.front.politique") ? "active" : "" }}">
            <i class="fas fa-landmark"></i>
            Politique
        </a>
        <a href="{{ route("mohelie.front.economie") }}" class="nav-item {{ request()->routeIs("mohelie.front.economie") ? "active" : "" }}">
            <i class="fas fa-chart-line"></i>
            Économie
        </a>
        <a href="{{ route("mohelie.front.sport") }}" class="nav-item {{ request()->routeIs("mohelie.front.sport") ? "active" : "" }}">
            <i class="fas fa-running"></i>
            Sport
        </a>
        <a href="{{ route("mohelie.front.contact") }}" class="nav-item {{ request()->routeIs("mohelie.front.contact") ? "active" : "" }}">
            <i class="fas fa-phone-alt"></i>
            Contact
        </a>
        <a href="{{ route("mohelie.front.publicite") }}" class="nav-item {{ request()->routeIs("mohelie.front.publicite") ? "active" : "" }}">
            <i class="fas fa-bullhorn"></i>
            Communication
        </a>
        <a href="{{ route("mohelie.front.videos") }}" class="nav-item {{ request()->routeIs("mohelie.front.videos") ? "active" : "" }}">
            <i class="fas fa-video"></i>
            Vidéos
        </a>
        <a href="{{ route("mohelie.front.LastInfos") }}" class="nav-item {{ request()->routeIs("mohelie.front.LastInfos") ? "active" : "" }}">
            <i class="fas fa-fire"></i>
            Dernières infos
        </a>
        <a href="{{ route("mohelie.register") }}" class="nav-item {{ request()->routeIs("mohelie.register") ? "active" : "" }}">
            <i class="fas fa-user-plus"></i>
            Inscription
        </a>
    </div>

    <div class="sidebar-footer">
        <div class="social-links">
            <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
            <a href="#" class="social-link"><i class="fab fa-whatsapp"></i></a>
        </div>
        <p>&copy; 2025 MOHELI MATIN, DEVELOPPE PAR <a href="https://www.alerte-info.net/" style="color: #fff; text-decoration: none">ALERTE INFO</a> </p>
    </div>
</nav>

<!-- Header -->
<header class="main-header" id="mainHeader">
    <div class="container">
        <div class="header-content">
            <div class="logo-section">
                <button class="menu-toggle menuToggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="logo-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="logo-text">
                    <h1>MOHELI MATIN</h1>
                    <span>Journal en ligne de Mohéli</span>
                </div>
            </div>

            <!-- Navigation principale dans le header -->
            <nav class="main-nav">
                <a href="{{ route("mohelie.front.acceuil") }}" class="nav-link {{ request()->routeIs("mohelie.front.acceuil") ? "active" : "" }}">Accueil</a>
                <a href="{{ route("mohelie.front.societe") }}" class="nav-link {{ request()->routeIs("mohelie.front.societe") ? "active" : "" }}">Société</a>
                <a href="{{ route("mohelie.front.politique") }}" class="nav-link {{ request()->routeIs("mohelie.front.politique") ? "active" : "" }}">Politique</a>
                <a href="{{ route("mohelie.front.economie") }}" class="nav-link {{ request()->routeIs("mohelie.front.economie") ? "active" : "" }}">Économie</a>
                <a class="nav-link menuToggle" id="menuToggle" style="cursor: pointer;">autres</a>
            </nav>

            <div class="header-actions">
                <button class="search-btn" id="searchBtn">
                    <i class="fas fa-search"></i>
                </button>
                
                <div class="user-info" id="userInfo" style="display: none;">
                    <div class="user-avatar" id="userAvatar">U</div>
                    <span id="userName">Utilisateur</span>
                    <div class="user-dropdown">
                        <a href="#"><i class="fas fa-user"></i> Mon profil</a>
                        <a href="#"><i class="fas fa-bookmark"></i> Articles sauvegardés</a>
                        <a href="#"><i class="fas fa-cog"></i> Paramètres</a>
                    </div>
                </div>
                
                <button class="btn-login" id="btnLogin">
                    <i class="fas fa-sign-in-alt"></i>
                    Connexion
                </button>
                
                <button class="btn-logout" id="btnLogout" style="display: none;">
                    <i class="fas fa-sign-out-alt"></i>
                    Déconnexion
                </button>
            </div>
        </div>
    </div>
</header>