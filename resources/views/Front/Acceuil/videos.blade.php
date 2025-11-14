@if ($videos)
    <section class="videos-section">
        <div class="container">
            <div class="section-header">
                <span class="section-title">Dernières vidéos</span>
                <a href="{{ route("moheli.front.videos") }}" class="view-all">
                    Voir toutes les vidéos
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="videos-grid">
                <!-- Video -->
                @foreach ($videos as $video)

                    @php
                        $rawLink = $video->url_video ?? '#';
                        $defaultThumbnail = 'https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80';

                        // ID unique pour le modal
                        $modalId = 'videoModal_' . $loop->index;
                        $videoId = null;
                        $videoExists = false;

                        // lien embed pour iframe
                        if (Str::contains($rawLink, 'watch?v=')) {
                            $videoId = last(explode('watch?v=', $rawLink));
                            $videoLink = 'https://www.youtube.com/embed/' . $videoId;
                            
                            // Vérifier si la vidéo existe via l'API oEmbed de YouTube
                            $oembedUrl = "https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v={$videoId}&format=json";
                            try {
                                $response = @file_get_contents($oembedUrl);
                                $videoExists = $response !== false;
                                $thumbnail = $videoExists ? 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg' : $defaultThumbnail;
                            } catch (\Exception $e) {
                                $videoExists = false;
                                $thumbnail = $defaultThumbnail;
                            }
                        } elseif (Str::contains($rawLink, 'youtu.be/')) {
                            $videoId = last(explode('youtu.be/', $rawLink));
                            $videoLink = 'https://www.youtube.com/embed/' . $videoId;
                            
                            // Vérifier si la vidéo existe via l'API oEmbed de YouTube
                            $oembedUrl = "https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v={$videoId}&format=json";
                            try {
                                $response = @file_get_contents($oembedUrl);
                                $videoExists = $response !== false;
                                $thumbnail = $videoExists ? 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg' : $defaultThumbnail;
                            } catch (\Exception $e) {
                                $videoExists = false;
                                $thumbnail = $defaultThumbnail;
                            }
                        } else {
                            // fallback image si ce n'est pas YouTube
                            $videoLink = $rawLink;
                            $thumbnail = $video->thumbnail ?? $defaultThumbnail;
                        }
                    @endphp

                    <a href="{{ route('moheli.front.detail-video', ['slug' => $video->media->slug]) }}" class="video-card" style="text-decoration: none">
                        <div class="video-thumbnail">
                            <img src="{{ $thumbnail }}" 
                                alt="{{ $video->media->titre ?? 'Vidéo' }}"
                                onerror="this.onerror=null; this.src='{{ $defaultThumbnail }}';">
                            <div class="play-button">
                                <i class="fas fa-play"></i>
                            </div>
                            @if(!empty($video->duree))
                                <div class="video-duration">{{ $video->duree }}</div>
                            @endif
                            @if($videoId && !$videoExists)
                                <div class="video-unavailable-badge">
                                    <i class="fas fa-exclamation-circle"></i> Indisponible
                                </div>
                            @endif
                        </div>
                        <div class="video-content">
                            <div class="video-category">{{ $video->categorieVideo->libelle ?? 'ACTUALITÉ' }}</div>
                            <h3 class="video-title">{{ $video->media->titre }}</h3>
                            <div class="video-meta">
                                <span><i class="far fa-eye"></i> {{ $video->views }} vues</span>
                                <span><i class="far fa-calendar"></i> {{ $video->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </a>

                @endforeach
            </div>
        </div>
    </section>
    @else
    <div class="videos-grid">
        <!-- Video 1 -->
        <div class="video-card">
            <div class="video-thumbnail">
                <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo">
                <div class="play-button">
                    <i class="fas fa-play"></i>
                </div>
                <div class="video-duration">12:45</div>
            </div>
            <div class="video-content">
                <div class="video-category">ACTUALITÉ</div>
                <h3 class="video-title">Reportage exclusif : La vie quotidienne à Fomboni</h3>
                <div class="video-meta">
                    <span><i class="far fa-eye"></i> 24K vues</span>
                    <span><i class="far fa-calendar"></i> 15 Nov</span>
                </div>
            </div>
        </div>

        <!-- Video 2 -->
        <div class="video-card">
            <div class="video-thumbnail">
                <img src="https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo">
                <div class="play-button">
                    <i class="fas fa-play"></i>
                </div>
                <div class="video-duration">08:32</div>
            </div>
            <div class="video-content">
                <div class="video-category">CULTURE</div>
                <h3 class="video-title">Festival de musique traditionnelle de Mohéli 2025</h3>
                <div class="video-meta">
                    <span><i class="far fa-eye"></i> 18K vues</span>
                    <span><i class="far fa-calendar"></i> 14 Nov</span>
                </div>
            </div>
        </div>

        <!-- Video 3 -->
        <div class="video-card">
            <div class="video-thumbnail">
                <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo">
                <div class="play-button">
                    <i class="fas fa-play"></i>
                </div>
                <div class="video-duration">15:20</div>
            </div>
            <div class="video-content">
                <div class="video-category">SPORT</div>
                <h3 class="video-title">Victoire historique de l'équipe de Mohéli aux Jeux des Îles</h3>
                <div class="video-meta">
                    <span><i class="far fa-eye"></i> 42K vues</span>
                    <span><i class="far fa-calendar"></i> 13 Nov</span>
                </div>
            </div>
        </div>
    </div>
@endif

