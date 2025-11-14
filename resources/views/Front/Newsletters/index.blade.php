<!-- Newsletter Section -->
<section class="newsletter-section" id="newsletter">
    <div class="container">
        <div class="newsletter-container">
            <div class="newsletter-icon">
                <i class="fas fa-paper-plane"></i>
            </div>
            <h2 class="section-title" style="color: white; text-align: center;">Restez Informé</h2>
            <p class="section-subtitle" style="color: rgba(255,255,255,0.8);">
                Recevez chaque semaine les dernières actualités sur les médias et la communication à Mohéli
            </p>
            
            <form class="newsletter-form" method="POST" action="{{ route("moheli.newsletters.store") }}">
                @csrf
                <input type="email" name="email" class="newsletter-input" placeholder="Votre adresse email" required>
                <button type="submit" class="btn-newsletter">
                    <i class="fas fa-paper-plane"></i>
                    S'abonner
                </button>
            </form> 

        </div>
    </div>
</section>