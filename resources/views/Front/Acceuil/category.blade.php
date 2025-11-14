@if ($section4)

    <section class="category-section">
        <div class="container">
            <div class="section-header">
                <span class="section-title">Par catégorie</span>
            </div>

            <div class="category-grid">
                @foreach(['opinion' => 'fas fa-users', 'communication' => 'fas fa-heartbeat', 'sport' => 'fas fa-palette'] as $cat => $icon)
                    @if(isset($section4[$cat]))
                        @php $article = $section4[$cat]; @endphp
                        <div>
                            <div class="category-header">
                                <div class="category-icon">
                                    <i class="{{ $icon }}"></i>
                                </div>
                                <h3 class="category-title">{{ ucfirst($cat) }}</h3>
                            </div>
                            <a href="{{ route("moheli.front.detail-article", ['slug' => $article->media->slug]) }}" class="news-grid" style="text-decoration: none;">
                                <div class="news-card">
                                    <div class="news-image-wrapper">
                                        <img src="{{ asset('storage/'.$article->media->image) }}" alt="{{ $article->media->titre }}" class="news-image">
                                    </div>
                                    <div class="news-content">
                                        <h4 class="news-title">{{ $article->media->titre }}</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>


    @else
    <section class="category-section">
        <div class="container">
            <div class="section-header">
                <span class="section-title">Par catégorie</span>
            </div>

            <div class="category-grid">
                <!-- Société -->
                <div>
                    <div class="category-header">
                        <div class="category-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="category-title">Société</h3>
                    </div>
                    <div class="news-grid">
                        <div class="news-card">
                            <div class="news-image-wrapper">
                                <img src="https://plus.unsplash.com/premium_photo-1661902398022-762e88ff3f82?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1170" alt="Société" class="news-image">
                            </div>
                            <div class="news-content">
                                <h4 class="news-title">Nouvelle initiative pour l'emploi des jeunes à Mohéli</h4>
                                <div class="news-footer">
                                    <a href="#" class="news-read-more">
                                        Lire
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Santé -->
                <div>
                    <div class="category-header">
                        <div class="category-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h3 class="category-title">Santé</h3>
                    </div>
                    <div class="news-grid">
                        <div class="news-card">
                            <div class="news-image-wrapper">
                                <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Santé" class="news-image">
                            </div>
                            <div class="news-content">
                                <h4 class="news-title">Nouvel équipement médical pour l'hôpital de Fomboni</h4>
                                <div class="news-footer">
                                    <a href="#" class="news-read-more">
                                        Lire
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Culture -->
                <div>
                    <div class="category-header">
                        <div class="category-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <h3 class="category-title">Culture</h3>
                    </div>
                    <div class="news-grid">
                        <div class="news-card">
                            <div class="news-image-wrapper">
                                <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Culture" class="news-image">
                            </div>
                            <div class="news-content">
                                <h4 class="news-title">Exposition d'art contemporain au centre culturel</h4>
                                <div class="news-footer">
                                    <a href="#" class="news-read-more">
                                        Lire
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif