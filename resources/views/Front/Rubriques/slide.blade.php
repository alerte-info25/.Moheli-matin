<link rel="stylesheet" href="{{ asset("css/Front/rubriques/rubriqueSlide.css") }}">

<section class="hero-section">
    <div class="container">
        <div class="hero-container">

            @if($slideArticles->count() > 0)

                <div class="hero-slider" id="heroSlider">
                    @foreach($slideArticles as $article)
                        <div class="slide active" style="background-image: url('{{ asset("storage/".$article->media->image) }}')">
                            <div class="slide-content">
                                <span class="slide-category">
                                    {{ strtoupper($article->categorieArticle->libelle) }}
                                </span>
                                <h3 class="slide-title">
                                    {{ Str::limit(strip_tags($article->media->description), 50, ' (...)') }}
                                </h3>
                                <p class="slide-excerpt">
                                    {{ Str::limit(strip_tags($article->media->description), 100, ' (...)') }}
                                </p>
                                <a href="{{ route("moheli.front.detail-article", ['slug' => $article->media->slug]) }}" class="news-read-more">
                                    Lire l'article
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                    <!-- Contrôles du slider -->
                    <div class="slider-nav">
                        <button class="slider-arrow prev-slide">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="slider-arrow next-slide">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    
                    <!-- Indicateurs de slide -->
                    <div class="slider-controls">
                        <button class="slider-btn active" data-slide="0"></button>
                        <button class="slider-btn" data-slide="1"></button>
                        <button class="slider-btn" data-slide="2"></button>
                    </div>

                </div>
                
                @else
                    <!-- Slider Hero avec 3 articles -->
                    <div class="hero-slider" id="heroSlider">
                        <!-- Slide 1 -->
                        <div class="slide active" style="background-image: url('https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80')">
                            <div class="slide-content">
                                <span class="slide-category">POLITIQUE</span>
                                <h3 class="slide-title">Le Président annonce un nouveau plan de développement pour Mohéli</h3>
                                <p class="slide-excerpt">Le chef de l'État a présenté hier un ambitieux plan quinquennal visant à renforcer les infrastructures et stimuler l'économie locale.</p>
                                <a href="#" class="news-read-more">
                                    Lire l'article
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Slide 2 -->
                        <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80')">
                            <div class="slide-content">
                                <span class="slide-category">ÉCONOMIE</span>
                                <h3 class="slide-title">Lancement d'un nouveau programme d'aide aux entrepreneurs locaux</h3>
                                <p class="slide-excerpt">Le gouvernement débloque 5 millions d'euros pour soutenir les petites et moyennes entreprises comoriennes dans leur développement.</p>
                                <a href="#" class="news-read-more">
                                    Lire l'article
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Slide 3 -->
                        <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1541336032412-2048a678540d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80')">
                            <div class="slide-content">
                                <span class="slide-category">ÉDUCATION</span>
                                <h3 class="slide-title">Inauguration du nouveau campus universitaire de Fomboni</h3>
                                <p class="slide-excerpt">Un établissement moderne équipé des dernières technologies éducatives ouvrira ses portes aux étudiants dès le semestre prochain.</p>
                                <a href="#" class="news-read-more">
                                    Lire l'article
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Contrôles du slider -->
                        <div class="slider-nav">
                            <button class="slider-arrow prev-slide">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="slider-arrow next-slide">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                        
                        <!-- Indicateurs de slide -->
                        <div class="slider-controls">
                            <button class="slider-btn active" data-slide="0"></button>
                            <button class="slider-btn" data-slide="1"></button>
                            <button class="slider-btn" data-slide="2"></button>
                        </div>
                    </div>
            @endif

            
        </div>
    </div>
</section>

<script src="{{ asset("js/Front/rubriques/rubriqueSlide.js") }}"></script>