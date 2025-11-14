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
        <a href="{{ route('moheli.front.acceuil') }}"
        class="nav-item {{ request()->routeIs('moheli.front.acceuil') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            Accueil
        </a>

        @php
            $rubriques = [
                'societe'   => ['icon' => 'fas fa-users', 'label' => 'Société'],
                'sante'     => ['icon' => 'fas fa-heartbeat', 'label' => 'Santé'],
                'culture'   => ['icon' => 'fas fa-palette', 'label' => 'Culture'],
                'opinion'   => ['icon' => 'fas fa-comment-alt', 'label' => 'Opinion'],
                'politique' => ['icon' => 'fas fa-landmark', 'label' => 'Politique'],
                'economie'  => ['icon' => 'fas fa-chart-line', 'label' => 'Économie'],
                'sport'     => ['icon' => 'fas fa-running', 'label' => 'Sport'],
                'communication'     => ['icon' => 'fas fa-comments', 'label' => 'Communication'],
            ];
        @endphp

        @foreach($rubriques as $slug => $data)
            <a href="{{ route('moheli.front.rubrique', ['slug' => $slug]) }}"
            class="nav-item {{ request()->routeIs('moheli.front.rubrique') && request()->route('slug') === $slug ? 'active' : '' }}">
                <i class="{{ $data['icon'] }}"></i>
                {{ $data['label'] }}
            </a>
        @endforeach

        <a href="{{ route('moheli.front.contact') }}"
        class="nav-item {{ request()->routeIs('moheli.front.contact') ? 'active' : '' }}">
            <i class="fas fa-phone-alt"></i>
            Contact
        </a>
        <a href="{{ route('moheli.front.videos') }}"
        class="nav-item {{ request()->routeIs('moheli.front.videos') ? 'active' : '' }}">
            <i class="fas fa-video"></i>
            Vidéos
        </a>
        <a href="{{ route('moheli.front.LastInfos') }}"
        class="nav-item {{ request()->routeIs('moheli.front.LastInfos') ? 'active' : '' }}">
            <i class="fas fa-fire"></i>
            Dernières infos
        </a>
        <a href="{{ route('moheli.front.communique') }}"
        class="nav-item {{ request()->routeIs('moheli.front.communique') ? 'active' : '' }}">
            <i class="fas fa-bullhorn"></i>
            Communiqués
        </a>
        @guest
            <a href="{{ route('moheli.register') }}"
            class="nav-item {{ request()->routeIs('moheli.register') ? 'active' : '' }}">
                <i class="fas fa-user-plus"></i>
                Inscription
            </a>
        @endguest

        @auth

            <a href="{{ route("moheli.articles.save") }}"
                class="nav-item {{ request()->routeIs('moheli.articles.save') ? 'active' : '' }}">
                <i class="fas fa-user-plus"></i>
                Articles sauvegardés
            </a>

            <a class="nav-item">
                <i class="fas fa-sign-out-alt"></i>
                <form action="{{ route("moheli.logout") }}" method="POST" onclick="return confirm('voulez-vous vous déconnecté ?')">
                    @csrf
                    <button class="" type="submit" href="{{ route('moheli.login') }}">
                        Déconnexion
                    </button>
                </form>
            </a>

        @endauth

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
                <a href="{{ route('moheli.front.acceuil') }}"
                class="nav-link {{ request()->routeIs('moheli.front.acceuil') ? 'active' : '' }}">
                Accueil
                </a>

                <a href="{{ route('moheli.front.rubrique', ['slug' => 'societe']) }}"
                class="nav-link {{ request()->routeIs('moheli.front.rubrique') && request()->route('slug') === 'societe' ? 'active' : '' }}">
                Société
                </a>

                <a href="{{ route('moheli.front.rubrique', ['slug' => 'politique']) }}"
                class="nav-link {{ request()->routeIs('moheli.front.rubrique') && request()->route('slug') === 'politique' ? 'active' : '' }}">
                Politique
                </a>

                <a href="{{ route('moheli.front.rubrique', ['slug' => 'economie']) }}"
                class="nav-link {{ request()->routeIs('moheli.front.rubrique') && request()->route('slug') === 'economie' ? 'active' : '' }}">
                Économie
                </a>
                <a class="nav-link menuToggle" id="menuToggle" style="cursor: pointer;">autres</a>
            </nav>

            <div class="header-actions">
                <button class="search-btn" id="searchBtn">
                    <i class="fas fa-search"></i>
                </button>
                
                @auth
                    @if (auth()->user()->role == "admin" || auth()->user()->role == "redacteur")
                        <div class="user-info" id="userInfo">
                            <div class="user-avatar" id="userAvatar">

                                @php
                                    $user = auth()->user();
                                    $initiales = strtoupper(substr($user->nom ?? '', 0, 1) . substr($user->prenom ?? '', 0, 1));
                                @endphp

                                {{ $initiales }}

                            </div>
                            <span id="userName">
                                {{ ucfirst($user->nom) }}
                            </span>
                            <div class="user-dropdown">
                                <a href="{{ route("dashboard.articles") }}"><i class="fas fa-user"></i> administration</a>
                                <form action="{{ route("moheli.logout") }}" method="POST" onclick="return confirm('voulez-vous vous déconnecté ?')">
                                    @csrf
                                    <button type="submit" href="{{ route('moheli.login') }}">
                                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                                    </button>
                                </form>
                            </div>
                        </div>
                        @else
                            <div class="user-info" id="userInfo">
                                <div class="user-avatar" id="userAvatar">

                                    @php
                                        $user = auth()->user();
                                        $initiales = strtoupper(substr($user->nom ?? '', 0, 1) . substr($user->prenom ?? '', 0, 1));
                                    @endphp

                                    {{ $initiales }}

                                </div>
                                <span id="userName">{{ ucfirst($user->nom) }}</span>
                                <div class="user-dropdown">
                                    <a href="{{ route("moheli.articles.save") }}"><i class="fas fa-bookmark"></i> Articles sauvegardés</a>
                                    <form action="{{ route("moheli.logout") }}" method="POST" onclick="return confirm('voulez-vous vous déconnecté ?')">
                                        @csrf
                                        <button type="submit" href="{{ route('moheli.login') }}">
                                            <i class="fas fa-sign-out-alt"></i> Déconnexion
                                        </button>
                                    </form>
                                </div>
                            </div>
                    @endif
                @endauth
                
                @guest
                    <a href="{{ route("moheli.login") }}" class="btn-login" style="text-decoration: none">
                        <i class="fas fa-sign-in-alt"></i>
                        Connexion
                    </a>
                @endguest

            </div>
        </div>
    </div>
</header>