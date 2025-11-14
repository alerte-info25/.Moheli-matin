<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Publicités</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("css/back/publicitesListe.css") }}">
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
                <div>
                    <h1 class="page-title">Toutes les Publicités</h1>
                    <p class="page-description">Gérez et suivez toutes vos publicités en un seul endroit</p>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Total des publicités</div>
                        <div class="stat-icon blue">
                            <i class="fas fa-play-circle"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $total }}</div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Publicités Actives</div>
                        <div class="stat-icon blue">
                            <i class="fas fa-play-circle"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $actives }}</div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Publicités Non Actives</div>
                        <div class="stat-icon blue">
                            <i class="fas fa-play-circle"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $inactives }}</div>
                </div>
            </div>

            <!-- Advertisements Table -->
            <div class="table-container">
                <div class="table-header">
                    <div class="table-title">Liste des Publicités</div>
                </div>

                @if (session()->has('alert'))
                    <x-alert type="{{ session('alert')['type'] }}">
                        {{ session('alert')['message'] }}
                    </x-alert>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th>Publicité</th>
                            <th>Campagne</th>
                            <th>Statut</th>
                            <th>Date début</th>
                            <th>Date fin</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($publicites as $publicite)
                            <tr>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 1rem;">
                                        <div class="ad-image">
                                            <img src="{{ asset("storage/".$publicite->image_path) }}" style="width: 45px" alt="">
                                        </div>
                                        <div>
                                            <div class="ad-title">
                                                {{ $publicite->title }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ Str::limit($publicite->description, 75) }}
                                </td>
                                @php
                                    $statusColors = [
                                        'active' => 'bg-success text-white',
                                        'inactive' => 'bg-secondary text-white',
                                        'expiré' => 'bg-danger text-white',
                                    ];
                                @endphp

                                <td>
                                    <span class="status-badge {{ $statusColors[$publicite->status] ?? 'bg-light text-dark' }}">
                                        {{ ucfirst($publicite->status) }}
                                    </span>
                                </td>
                                <td>
                                    {{ $publicite->start_date->diffForHumans() }}
                                </td>
                                <td>
                                    {{ $publicite->end_date->diffForHumans() }}
                                </td>
                                <td>
                                    <div class="action-buttons-cell">
                                        <!-- Voir (pas de form) -->
                                        <a href="{{ route("dashboard.publicites.show", ["publicite" => $publicite->id]) }}" class="action-btn view" title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        @if ($publicite->status == 'inactive')
                                            <!-- Activer -->
                                            <form action="{{ route('dashboard.publicites.activate', $publicite->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="action-btn play" title="Activer">
                                                    <i class="fa-solid fa-play"></i>
                                                </button>
                                            </form>
                                        @endif
                                        
                                        @if ($publicite->status == 'active')
                                            <!-- Désactiver -->
                                            <form action="{{ route('dashboard.publicites.deactivate', $publicite->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="action-btn play" title="Désactiver">
                                                    <i class="fa-solid fa-xmark"></i>
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
                                            <button type="submit" class="action-btn delete" title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>


                            </tr>
                        @empty
                            <div class="alert alert-warning">Aucune publicité trouvée</div>
                        @endforelse
                        
                    </tbody>
                </table>
                <div class="pagination">
                    {{ $publicites->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay"></div>

    <script src="{{ asset("js/back/publicitesListe.js") }}"></script>
</body>
</html>