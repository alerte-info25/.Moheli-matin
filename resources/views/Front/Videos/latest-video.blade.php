<div class="videos-grid">
    @forelse ($videos as $video)
        @php
            $rawLink = $video->url_video ?? '#';
            $defaultThumbnail = 'https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80';

            // ID unique pour le modal
            $modalId = 'videoModal_' . $loop->index;

            // lien embed pour iframe
            if (Str::contains($rawLink, 'watch?v=')) {
                $videoId = last(explode('watch?v=', $rawLink));
                $videoLink = 'https://www.youtube.com/embed/' . $videoId;
                
                // Vérifier si la vidéo existe via l'API oEmbed de YouTube
                $oembedUrl = "https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v={$videoId}&format=json";
                try {
                    $response = @file_get_contents($oembedUrl);
                    $thumbnail = $response ? 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg' : $defaultThumbnail;
                } catch (\Exception $e) {
                    $thumbnail = $defaultThumbnail;
                }
            } elseif (Str::contains($rawLink, 'youtu.be/')) {
                $videoId = last(explode('youtu.be/', $rawLink));
                $videoLink = 'https://www.youtube.com/embed/' . $videoId;
                
                // Vérifier si la vidéo existe via l'API oEmbed de YouTube
                $oembedUrl = "https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v={$videoId}&format=json";
                try {
                    $response = @file_get_contents($oembedUrl);
                    $thumbnail = $response ? 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg' : $defaultThumbnail;
                } catch (\Exception $e) {
                    $thumbnail = $defaultThumbnail;
                }
            } else {
                $videoLink = $rawLink;
                $thumbnail = $video->thumbnail ?? $defaultThumbnail;
            }
        @endphp

        <a href="{{ route("moheli.front.detail-video", ["slug" => $video->media->slug]) }}" style="text-decoration: none;" class="video-card">
            <div class="video-thumbnail">
                <img src="{{ $thumbnail }}" 
                    alt="{{ $video->media->titre }}"
                    onerror="this.onerror=null; this.src='{{ $defaultThumbnail }}';">                
                <div class="play-button">
                    <i class="fas fa-play"></i>
                </div>
                @if($video->duree ?? false)
                    <div class="video-duration">{{ $video->duree }}</div>
                @endif
            </div>
            <div class="video-content">
                <span class="video-category">{{ $video->categorieVideo->libelle }}</span>
                <h3 class="video-title">{{ $video->media->titre }}</h3>
                <p class="video-description">
                    {{ Str::limit(strip_tags($video->media->description), 150) }}
                </p>
                <div class="video-footer">
                    <div class="video-date">
                        <i class="far fa-calendar"></i>
                        {{ $video->created_at->format('d M') }}
                    </div>
                    <div class="video-stats">
                        <span><i class="far fa-eye"></i> {{ $video->views ?? '0' }}</span>
                    </div>
                </div>
            </div>
        </a>
    @empty
        <div class="col-12">
            <div class="alert alert-info">Aucune vidéo disponible pour le moment.</div>
        </div>
    @endforelse
</div>

{{ $videos->links() }}