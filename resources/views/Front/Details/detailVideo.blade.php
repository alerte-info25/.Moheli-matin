<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vidéo détaillée - Journal en ligne de Mohéli">
    <meta name="keywords" content="Mohéli, Comores, vidéo, journal, news">
    <title>{{ $video->media->titre }} | MOHELI MATIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/Front/detailVideo.css") }}">
</head>
<body>

    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-content">
            <div class="loading-logo">
                <i class="fas fa-newspaper"></i>
            </div>
            <h2>MOHELI MATIN</h2>
            <div class="loading-bar">
                <div class="loading-progress"></div>
            </div>
            <p>Chargement de la vidéo...</p>
        </div>
    </div>

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
        <!-- Video Detail Section -->
        <section class="video-detail-section">
            <div class="container">
                <div class="video-header">
                    <span class="video-category">ACTUALITÉS</span>
                    <h1 class="video-title">Inauguration du nouveau port de Fomboni</h1>
                    
                    <div class="video-meta">
                        <div class="video-meta-item">
                            <i class="far fa-user"></i>
                            <span>Par {{ $video->media->redacteur->user->nom . " " . $video->media->redacteur->user->prenom }}</span>
                        </div>
                        <div class="video-meta-item">
                            <i class="far fa-calendar"></i>
                            <span>{{ $video->created_at->format('d M Y') }}</span>
                        </div>
                        {{-- <div class="video-meta-item">
                            <i class="far fa-clock"></i>
                            <span>Durée: 8:42</span>
                        </div> --}}
                        <div class="video-meta-item">
                            <i class="far fa-eye"></i>
                            <span>
                                {{ $video->views }}
                            </span>
                        </div>
                    </div>
                </div>

                @php
                    $rawLink = $video->url_video ?? '#';
                    $defaultThumbnail = 'https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80';
                    
                    // Extraire l'ID de la vidéo YouTube
                    $videoId = null;
                    $videoExists = false;
                    
                    if (Str::contains($rawLink, 'watch?v=')) {
                        $videoId = last(explode('watch?v=', $rawLink));
                    } elseif (Str::contains($rawLink, 'youtu.be/')) {
                        $videoId = last(explode('youtu.be/', $rawLink));
                    }
                    
                    // Vérifier si la vidéo existe
                    if ($videoId) {
                        $oembedUrl = "https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v={$videoId}&format=json";
                        try {
                            $response = @file_get_contents($oembedUrl);
                            $videoExists = $response !== false;
                            $thumbnail = $videoExists ? "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg" : $defaultThumbnail;
                        } catch (\Exception $e) {
                            $videoExists = false;
                            $thumbnail = $defaultThumbnail;
                        }
                    } else {
                        $thumbnail = $defaultThumbnail;
                    }
                @endphp

                <div class="video-player-container">
                    <div class="video-player" id="videoPlayerWrapper">
                        @if($videoId && $videoExists)
                            <!-- Placeholder avant le clic -->
                            <div class="video-player-placeholder" id="videoPlaceholder" style="background-image: url('{{ $thumbnail }}');">
                                <div class="play-icon">
                                    <i class="fas fa-play"></i>
                                </div>
                                <h3>{{ $video->media->titre }}</h3>
                                <p>Cliquez pour lire la vidéo</p>
                            </div>
                            
                            <!-- Iframe YouTube (caché au début) -->
                            <div id="youtubePlayerContainer" style="display: none;">
                                <iframe 
                                    id="youtubePlayer"
                                    width="100%" 
                                    height="100%" 
                                    src="https://www.youtube.com/embed/{{ $videoId }}?enablejsapi=1&rel=0" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                                </iframe>
                            </div>
                        @else
                            <div class="video-player-placeholder" style="background-image: url('{{ $thumbnail }}');">
                                <div class="alert alert-danger">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    @if($videoId && !$videoExists)
                                        Cette vidéo n'est plus disponible
                                    @else
                                        Vidéo non disponible
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    @if($videoId && $videoExists)
                        <div class="video-controls" id="customControls">
                            <div class="control-group">
                                <button class="video-control-btn" id="playPauseBtn">
                                    <i class="fas fa-play"></i>
                                </button>
                                <button class="video-control-btn" id="muteBtn">
                                    <i class="fas fa-volume-up"></i>
                                </button>
                                <input type="range" id="volumeSlider" min="0" max="100" value="100" class="volume-slider">
                            </div>
                            <div class="progress-bar" id="progressBar">
                                <div class="progress" id="progress"></div>
                            </div>
                            <div class="time-display" id="timeDisplay">0:00 / 0:00</div>
                            <div class="control-group">
                                <button class="video-control-btn" id="fullscreenBtn">
                                    <i class="fas fa-expand"></i>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="video-content">
                    <div class="video-description">
                        <div class="video-description-text">
                            <p>
                                {{ strip_tags($video->media->description) }}
                            </p>
                        </div>

                        <div class="video-tags">
                            @foreach($video->media->tags as $tag)
                                <span class="video-tag">{{ $tag->libelle }}</span>
                            @endforeach
                        </div>

                    </div>

                    <div class="video-sidebar">

                        <div class="sidebar-widget">
                            <h3 class="widget-title">Vidéos similaires</h3>
                            <div class="related-videos">
                                @forelse ($videosSimilaires as $similaire)

                                    @php
                                        $rawLink = $similaire->url_video ?? '#';

                                        // ID unique pour le modal
                                        $modalId = 'videoModal_' . $loop->index;

                                        // lien embed pour iframe
                                        if (Str::contains($rawLink, 'watch?v=')) {
                                            $videoId = last(explode('watch?v=', $rawLink));
                                            $videoLink = 'https://www.youtube.com/embed/' . $videoId;
                                            $thumbnail = 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg';
                                        } elseif (Str::contains($rawLink, 'youtu.be/')) {
                                            $videoId = last(explode('youtu.be/', $rawLink));
                                            $videoLink = 'https://www.youtube.com/embed/' . $videoId;
                                            $thumbnail = 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg';
                                        } else {
                                            // fallback image si ce n'est pas YouTube
                                            $videoLink = $rawLink;
                                            $thumbnail = 'https://via.placeholder.com/800x450?text=Vidéo';
                                        }
                                    @endphp

                                    <a href="{{ route("moheli.front.detail-video", ["slug" => $similaire->media->slug]) }}" style="text-decoration: none" class="related-video">
                                        <div class="related-video-thumbnail">
                                            <img src="{{ $thumbnail }}" alt="{{ $similaire->media->titre }}">
                                            <div class="play-overlay">
                                                <i class="fas fa-play"></i>
                                            </div>
                                        </div>
                                        <div class="related-video-content">
                                            <h4 class="related-video-title">
                                                {{ $similaire->media->titre }}
                                            </h4>
                                            <div class="related-video-meta">
                                                <span>{{ $similaire->views }} vues</span>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <div class="alert alert-warning">Aucune vidéos similaire trouvée.</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

        </section>

        @include("Front.Newsletters.index")

        <!-- Footer -->
        @include("Front.Partials.footer")
    </main>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTop">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="{{ asset("js/Front/detailVideo.js") }}"></script>
</body>
</html>