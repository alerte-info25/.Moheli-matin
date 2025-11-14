@if ($section3)

    <section class="news-section">
        <div class="container">
            <div class="section-header">
                <span class="section-title">à la une</span>
                <a href="{{ route("moheli.front.LastInfos") }}" class="view-all">
                    Voir tout
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="news-grid">
                @foreach ($section3 as $article)
                    <!-- Article -->
                    <div class="news-card">
                        <div class="news-image-wrapper">
                            <img src="{{ asset("storage/".$article->media->image) }}" alt="Actualité" class="news-image">
                            <span class="news-category-tag">
                                {{ $article->categorieArticle->libelle }}
                            </span>
                            <span class="news-date">
                                <i class="far fa-calendar"></i>
                                {{ $article->created_at->format('d M') }}
                            </span>
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">
                                {{ $article->media->titre }}
                            </h3>
                            <p class="news-excerpt">
                                {{ Str::limit(strip_tags($article->media->description), 200, ' (...)') }}
                            </p>
                            <div class="news-footer">
                                <a href="{{ route("moheli.front.detail-article", ['slug' => $article->media->slug]) }}" class="news-read-more">
                                    Lire la suite
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                <div class="news-stats">
                                    <span><i class="far fa-eye"></i> {{ $article->views }}</span>
                                    <span><i class="far fa-comment"></i> {{ $article->commentaires_count }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </section>

    @else
    <section class="news-section">
        <div class="container">
            <div class="section-header">
                <span class="section-title">à la une</span>
                <a href="#" class="view-all">
                    Voir tout
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="news-grid">
                <!-- Article 1 -->
                <div class="news-card">
                    <div class="news-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité" class="news-image">
                        <span class="news-category-tag">Politique</span>
                        <span class="news-date">
                            <i class="far fa-calendar"></i>
                            15 Nov
                        </span>
                    </div>
                    <div class="news-content">
                        <h3 class="news-title">Le Président annonce un nouveau plan de développement pour Mohéli</h3>
                        <p class="news-excerpt">
                            Le chef de l'État a présenté hier un ambitieux plan quinquennal visant à renforcer les infrastructures et stimuler l'économie locale.
                        </p>
                        <div class="news-footer">
                            <a href="#" class="news-read-more">
                                Lire la suite
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <div class="news-stats">
                                <span><i class="far fa-eye"></i> 2.4K</span>
                                <span><i class="far fa-comment"></i> 87</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article 2 -->
                <div class="news-card">
                    <div class="news-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité" class="news-image">
                        <span class="news-category-tag">Économie</span>
                        <span class="news-date">
                            <i class="far fa-calendar"></i>
                            14 Nov
                        </span>
                    </div>
                    <div class="news-content">
                        <h3 class="news-title">Lancement d'un nouveau programme d'aide aux entrepreneurs locaux</h3>
                        <p class="news-excerpt">
                            Le gouvernement débloque 5 millions d'euros pour soutenir les petites et moyennes entreprises comoriennes dans leur développement.
                        </p>
                        <div class="news-footer">
                            <a href="#" class="news-read-more">
                                Lire la suite
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <div class="news-stats">
                                <span><i class="far fa-eye"></i> 1.8K</span>
                                <span><i class="far fa-comment"></i> 42</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article 3 -->
                <div class="news-card">
                    <div class="news-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1541336032412-2048a678540d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité" class="news-image">
                        <span class="news-category-tag">Éducation</span>
                        <span class="news-date">
                            <i class="far fa-calendar"></i>
                            13 Nov
                        </span>
                    </div>
                    <div class="news-content">
                        <h3 class="news-title">Inauguration du nouveau campus universitaire de Fomboni</h3>
                        <p class="news-excerpt">
                            Un établissement moderne équipé des dernières technologies éducatives ouvrira ses portes aux étudiants dès le semestre prochain.
                        </p>
                        <div class="news-footer">
                            <a href="#" class="news-read-more">
                                Lire la suite
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <div class="news-stats">
                                <span><i class="far fa-eye"></i> 3.1K</span>
                                <span><i class="far fa-comment"></i> 124</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article 4 -->
                <div class="news-card">
                    <div class="news-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité" class="news-image">
                        <span class="news-category-tag">Culture</span>
                        <span class="news-date">
                            <i class="far fa-calendar"></i>
                            12 Nov
                        </span>
                    </div>
                    <div class="news-content">
                        <h3 class="news-title">Festival international de musique traditionnelle à Mohéli</h3>
                        <p class="news-excerpt">
                            Des artistes venus de toute la région participeront à cet événement qui célèbre la richesse du patrimoine musical comorien.
                        </p>
                        <div class="news-footer">
                            <a href="#" class="news-read-more">
                                Lire la suite
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <div class="news-stats">
                                <span><i class="far fa-eye"></i> 2.7K</span>
                                <span><i class="far fa-comment"></i> 96</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article 5 -->
                <div class="news-card">
                    <div class="news-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité" class="news-image">
                        <span class="news-category-tag">Santé</span>
                        <span class="news-date">
                            <i class="far fa-calendar"></i>
                            11 Nov
                        </span>
                    </div>
                    <div class="news-content">
                        <h3 class="news-title">Nouvelle campagne de vaccination contre la malaria à Mohéli</h3>
                        <p class="news-excerpt">
                            Le ministère de la Santé annonce une vaste campagne de prévention qui touchera plus de 50 000 personnes dans la région.
                        </p>
                        <div class="news-footer">
                            <a href="#" class="news-read-more">
                                Lire la suite
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <div class="news-stats">
                                <span><i class="far fa-eye"></i> 1.9K</span>
                                <span><i class="far fa-comment"></i> 53</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article 6 -->
                <div class="news-card">
                    <div class="news-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Actualité" class="news-image">
                        <span class="news-category-tag">Sport</span>
                        <span class="news-date">
                            <i class="far fa-calendar"></i>
                            10 Nov
                        </span>
                    </div>
                    <div class="news-content">
                        <h3 class="news-title">Victoire historique de l'équipe de Mohéli aux Jeux des Îles</h3>
                        <p class="news-excerpt">
                            Les Mohéliens remportent la médaille d'or après une finale épique contre l'équipe de Ngazidja.
                        </p>
                        <div class="news-footer">
                            <a href="#" class="news-read-more">
                                Lire la suite
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <div class="news-stats">
                                <span><i class="far fa-eye"></i> 4.2K</span>
                                <span><i class="far fa-comment"></i> 215</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif