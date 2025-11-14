@if($section2)

    <section class="featured-section">
        <div class="container">
            <div class="section-header">
                <span class="section-title">à la une</span>
                <a href="{{ route("moheli.front.LastInfos") }}" class="view-all">
                    Voir tout
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="featured-grid">
                @if($section2->count())
                    <!-- Article principal -->
                    @php $main = $section2->first(); @endphp
                    <div class="main-featured">
                        <img src="{{ asset("storage/".$main->media->image) }}" alt="{{ $main->media->titre }}">
                        <div class="main-featured-content">
                            <span class="main-featured-category">
                                {{ $main->categorieArticle->libelle }}
                            </span>
                            <h3 class="main-featured-title">
                                {{ $main->media->title }}
                            </h3>
                            <p class="main-featured-excerpt">
                                {{ Str::limit(strip_tags($main->media->description), 100, ' (...)') }}
                            </p>
                            <a href="{{ route("moheli.front.detail-article", ['slug' => $main->media->slug]) }}" class="news-read-more">
                                Lire l'article
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="side-featured">
                        @foreach($section2->skip(1) as $article)
                            <a href="{{ route("moheli.front.detail-article", ['slug' => $main->media->slug]) }}" style="text-decoration: none" class="side-featured-item">
                                <div class="side-featured-image">
                                    <img src="{{ asset("storage/".$article->media->image) }}" alt="{{ $article->media->titre }}">
                                </div>
                                <div class="side-featured-content">
                                    <span class="side-featured-category">
                                        {{ $article->categorieArticle->libelle }}
                                    </span>
                                    <h4 class="side-featured-title">
                                        {{ Str::limit(strip_tags($article->media->description), 50, ' (...)') }}
                                    </h4>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>

    @else
        <section class="featured-section">
            <div class="container">
                <div class="section-header">
                    <span class="section-title">à la une</span>
                    <a href="#" class="view-all">
                        Voir tout
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="featured-grid">
                    <div class="main-featured">
                        <img src="https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité principale">
                        <div class="main-featured-content">
                            <span class="main-featured-category">Politique</span>
                            <h3 class="main-featured-title">Le Président annonce un nouveau plan de développement pour Mohéli</h3>
                            <p class="main-featured-excerpt">
                                Le chef de l'État a présenté hier un ambitieux plan quinquennal visant à renforcer les infrastructures et stimuler l'économie locale.
                            </p>
                            <a href="#" class="news-read-more">
                                Lire l'article
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="side-featured">
                        <div class="side-featured-item">
                            <div class="side-featured-image">
                                <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité secondaire">
                            </div>
                            <div class="side-featured-content">
                                <span class="side-featured-category">Économie</span>
                                <h4 class="side-featured-title">Lancement d'un nouveau programme d'aide aux entrepreneurs locaux</h4>
                            </div>
                        </div>

                        <div class="side-featured-item">
                            <div class="side-featured-image">
                                <img src="https://images.unsplash.com/photo-1541336032412-2048a678540d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité secondaire">
                            </div>
                            <div class="side-featured-content">
                                <span class="side-featured-category">Éducation</span>
                                <h4 class="side-featured-title">Inauguration du nouveau campus universitaire de Fomboni</h4>
                            </div>
                        </div>

                        <div class="side-featured-item">
                            <div class="side-featured-image">
                                <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité secondaire">
                            </div>
                            <div class="side-featured-content">
                                <span class="side-featured-category">Culture</span>
                                <h4 class="side-featured-title">Festival international de musique traditionnelle à Mohéli</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endif

