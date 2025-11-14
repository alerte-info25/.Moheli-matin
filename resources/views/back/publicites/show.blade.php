<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Publicité - AdManager</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/back/publicitesShow.css") }}">
</head>
<body>

    @include("back.partials.loader")

    <!-- Sidebar -->
    <div class="sidebar">
        @include("back.partials.logo")

        @include("back.partials.sidebar")
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="dashboard-header">
            <div class="header-left">
                <button class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>

                @include("back.partials.link")
            </div>
            <div class="header-right">
                <div class="user-profile">
                    <div class="user-avatar">
                        {{ substr(auth()->user()->nom, 0, 1) . substr(auth()->user()->prenom, 0, 1) }}
                    </div>
                    <div class="user-info">
                        <div class="user-name">{{ auth()->user()->nom . " " . auth()->user()->prenom }}</div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="page-title-section">
                    <h1 class="page-title">
                        {{ $publicite->title }}
                    </h1>
                    <div class="page-subtitle">
                        @php
                            $statusColors = [
                                'active' => 'active',
                                'inactive' => 'inactive',
                                'expiré' => 'expired',
                            ];
                        @endphp
                        <span class="status-badge status-{{ $statusColors[$publicite->status] }}">{{ $publicite->status }}</span>
                        <span>
                            {{ $publicite->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
                <div class="page-actions">
                    <button class="btn btn-secondary">
                        <i class="fas fa-edit"></i>
                        Modifier
                    </button>
                    <button class="btn btn-primary">
                        <i class="fas fa-chart-line"></i>
                        Analytics
                    </button>
                </div>
            </div>

            <!-- Content Layout -->
            <div class="content-layout">
                <!-- Main Content -->
                <div class="main-details">
                    <!-- Ad Preview -->
                    <div class="ad-preview-container">
                        <h2 class="preview-title">
                            <i class="fas fa-eye"></i>
                            Aperçu de la Publicité
                        </h2>
                        <div class="ad-preview">
                            <div class="ad-content">
                                <div class="ad-image">
                                    @if (!empty($publicite->image_path) && Storage::disk('public')->exists($publicite->image_path))
                                        <img src="{{ asset('storage/'.$publicite->image_path) }}" alt="Image publicité" style="width: {{ $publicite->width }}; height: {{ $publicite->height }};">
                                    @else
                                        <i class="fas fa-sun"></i>
                                    @endif
                                </div>
                                <h3 class="ad-headline">{{ $publicite->title }}</h3>
                                <p class="ad-description">
                                    {{ $publicite->description }}
                                </p>
                            </div>
                        </div>
                    </div>

                    @php
                        use Carbon\Carbon;
                    @endphp

                    <!-- Campaign Details -->
                    <div class="details-section">
                        <h2 class="section-title">
                            <i class="fas fa-info-circle"></i>
                            Détails de la Campagne
                        </h2>
                        <div class="details-grid">
                            <div class="detail-item">
                                <span class="detail-label">Nom de la campagne</span>
                                <span class="detail-value highlight">{{ $publicite->title }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label"><Link>Largeur</span>
                                <span class="detail-value">{{ $publicite->width }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Hauteur</span>
                                <span class="detail-value">{{ $publicite->height }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Bannière</span>
                                <span class="detail-value">{{ $publicite->width . "x" . $publicite->height }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Date de début</span>
                                <span class="detail-value">
                                    {{ Carbon::parse($publicite->start_date)->translatedFormat('d F Y') }}
                                </span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Date de fin</span>
                                
                                <span class="detail-value">
                                    {{ Carbon::parse($publicite->end_date)->translatedFormat('d F Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
                <div class="ad-sidebar">
                    <!-- Quick Actions -->
                    <div class="details-section">
                        <h2 class="section-title">
                            <i class="fas fa-bolt"></i>
                            Actions Rapides
                        </h2>
                        <div style="display: flex; flex-direction: column; gap: 1rem;">

                            @if ($publicite->status == "inactive")
                                <!-- Activer -->
                                <form action="{{ route('dashboard.publicites.activate', $publicite->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-light" style="width: 100%;" title="Activer">
                                        <i class="fa-solid fa-play"></i>
                                        Activer
                                    </button>
                                </form>
                            @endif
                            
                            @if ($publicite->status == "active")
                                <!-- Désactiver -->
                                <form action="{{ route('dashboard.publicites.deactivate', $publicite->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-secondary" style="width: 100%;" title="Désactiver">
                                        <i class="fa-solid fa-xmark"></i>
                                        Désactiver
                                    </button>
                                </form>
                            @endif

                            <!-- Supprimer -->
                            <form action="{{ route('dashboard.publicites.destroy', $publicite->id) }}" 
                                method="POST" 
                                data-action="delete"
                                onsubmit="return confirm('Voulez-vous supprimer cette publicité ?')">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger" style="width: 100%;" title="Supprimer">
                                    <i class="fas fa-trash"></i>
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Timeline -->
                    <div class="details-section">
                        <h2 class="section-title">
                            <i class="fas fa-history"></i>
                            Historique
                        </h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-date">
                                    {{ Carbon::parse($publicite->created_at)->translatedFormat('d F Y') }}
                                </div>
                                <div class="timeline-content">Publicité créée</div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-date">
                                    {{ Carbon::parse($publicite->start_date)->translatedFormat('d F Y') }}
                                </div>
                                <div class="timeline-content">Campagne lancée</div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-date">{{ Carbon::parse($publicite->end_date)->translatedFormat('d F Y') }}</div>
                                <div class="timeline-content">Fin de la campagne</div>
                            </div>
                        </div>
                    </div>

                </div>
        </div>
    </div>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay"></div>

    <script src="{{ asset("js/back/publicitesShow.js") }}"></script>
</body>
</html>