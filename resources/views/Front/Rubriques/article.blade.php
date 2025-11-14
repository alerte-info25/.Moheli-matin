<section class="articles-section" id="articles">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Dernières Actualités</h2>
            <p class="section-subtitle">
                Restez informé des derniers développements sociaux à Mohéli
            </p>
        </div>

        <div class="articles-grid">
            <!-- Article 1 - Featured -->
            @if ($featuredArticle )
                <a href="{{ route("moheli.front.detail-article", ['slug' => $featuredArticle->media->slug]) }}" class="article-card featured" style="text-decoration: none">
                    <div class="article-image">
                        <img src="{{ asset("storage/".$featuredArticle->media->image) }}" alt="{{ $featuredArticle->media->titre }}" class="featuredImg">
                        <span class="article-badge">À la une</span>
                    </div>
                    <div class="article-content">
                        <div class="article-meta">
                            <span class="article-category">{{ $featuredArticle->categorieArticle->libelle }}</span>
                            <span><i class="far fa-clock"></i> {{ $featuredArticle->created_at->diffForHumans() }}</span>
                        </div>
                        <h3 class="article-title">
                            {{ $featuredArticle->media->titre }}
                        </h3>
                        <p class="article-excerpt">
                            {{ Str::limit(strip_tags($featuredArticle->media->description), 150, ' (...)') }}
                        </p>
                        <div class="article-footer">
                            <div class="article-author">
                                <div class="author-avatar">SM</div>
                                <div class="author-info">
                                    <h4>
                                        {{ $featuredArticle->media->redacteur->user->nom . $featuredArticle->media->redacteur->user->prenom }}
                                    </h4>
                                </div>
                            </div>
                            <div class="article-stats">
                                <span class="article-stat">
                                    <i class="far fa-eye"></i> {{ $featuredArticle->views }}
                                </span>
                                <span class="article-stat">
                                    <i class="far fa-comment"></i> {{ $featuredArticle->commentaires_count }}
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
                @else
                    <article class="article-card featured">
                        <div class="article-image">
                            <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Nouvelle école à Fomboni">
                            <span class="article-badge">À la une</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">Éducation</span>
                                <span><i class="far fa-clock"></i> Il y a 2 heures</span>
                            </div>
                            <h3 class="article-title">
                                Inauguration d'une nouvelle école primaire à Fomboni
                            </h3>
                            <p class="article-excerpt">
                                Le gouvernement provincial a inauguré ce matin une nouvelle école primaire 
                                pouvant accueillir 400 élèves. Cet établissement moderne comprend 12 salles 
                                de classe équipées et une bibliothèque...
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">SM</div>
                                    <div class="author-info">
                                        <h4>Saïd Mohamed</h4>
                                        <span>Correspondant éducation</span>
                                    </div>
                                </div>
                                <div class="article-stats">
                                    <span class="article-stat">
                                        <i class="far fa-eye"></i> 2.4K
                                    </span>
                                    <span class="article-stat">
                                        <i class="far fa-comment"></i> 47
                                    </span>
                                </div>
                            </div>
                        </div>
                    </article>
            @endif
                
            @if($otherArticles->count() > 0)
                @foreach($otherArticles as $article)
                    <!-- Article -->
                    <a href="{{ route("moheli.front.detail-article", ['slug' => $article->media->slug]) }}" class="article-card" style="text-decoration: none">
                        <div class="article-image">
                            <img src="{{ asset("storage/".$article->media->image )}}" alt="{{ $article->media->titre }}">
                            <span class="article-badge">{{ $article->typeArticle->libelle }}</span>
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">{{ $article->categorieArticle->libelle }}</span>
                                <span><i class="far fa-clock"></i> {{ $article->created_at->diffForHumans() }}</span>
                            </div>
                            <h3 class="article-title">
                                {{ $article->media->titre }}
                            </h3>
                            <p class="article-excerpt">
                                {{ Str::limit(strip_tags($article->media->description), 150, ' (...)') }}
                            </p>
                            <div class="article-footer">
                                <div class="article-author">
                                    <div class="author-avatar">
                                        {{ substr($article->media->redacteur->user->nom, 0, 1) . substr($article->media->redacteur->user->prenom, 0, 1) }}
                                    </div>
                                    <div class="author-info">
                                        <h4>{{ $article->media->redacteur->user->nom . $article->media->redacteur->user->prenom }}</h4>
                                    </div>
                                </div>
                                <div class="article-stats">
                                    <span class="article-stat">
                                        <i class="far fa-eye"></i> {{ $article->views }}
                                    </span>
                                    <span class="article-stat">
                                        <i class="far fa-comment"></i> {{ $article->commentaires_count }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                @else
                    <div class="alert alert-warning">Aucun autre articles trouvé.</div>
            @endif
            
        </div>

        <!-- Pagination -->
        <nav class="pagination">
            @if($otherArticles->count() > 0)
                {{ $otherArticles->links() }}
            @endif
        </nav>
    </div>
</section>