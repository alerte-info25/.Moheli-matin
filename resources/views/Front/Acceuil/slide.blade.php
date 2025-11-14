@forelse ($section1 as $article)

    @if(!empty($article->media) && !empty($article->media->image))
        <div class="slide active" style="background-image: url('{{ asset('storage/' . $article->media->image) }}')">
    @else
        <div class="slide active" style="background-image: url('https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80')">
    @endif

            <div class="slide-content">
                <span class="slide-category">{{ strtoupper($article->categorieArticle->libelle) }}</span>
                <h3 class="slide-title">
                    {{ $article->media->libelle }}
                </h3>
                <p class="slide-excerpt">
                    {{ Str::limit(strip_tags($article->media->description), 185, ' (...)') }}
                </p>
                <a href="{{ route("moheli.front.detail-article", ['slug' => $article->media->slug]) }}" class="news-read-more">
                    Lire l'article
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
    </div>
@empty
    <!-- Slide 1 -->
    <div class="slide active" style="background-image: url('https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80')">
        <div class="slide-content">
            <span class="slide-category">POLITIQUE</span>
            <h3 class="slide-title">Le Président annonce un nouveau plan de développement pour Mohéli</h3>
            <p class="slide-excerpt">Le chef de l'État a présenté hier un ambitieux plan quinquennal visant à renforcer les infrastructures et stimuler l'économie locale.</p>
            <a href="#" class="">
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
            <a href="#" class="">
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
            <a href="#" class="">
                Lire l'article
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
@endforelse