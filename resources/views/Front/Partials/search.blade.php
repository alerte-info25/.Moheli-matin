<!-- Search Modal -->
<div class="search-modal" id="searchModal">
    <div class="search-modal-content">
        <form method="GET" action="{{ route('moheli.front.search') }}" class="search-input-wrapper">
            <input type="text" 
                name="q" 
                class="search-input" 
                placeholder="Rechercher des articles..." 
                id="searchInput"
                value="{{ request('q') }}"
                required>
            <button type="submit" style="display: none;"></button>
            <button type="button" class="close-search" id="closeSearch">
                <i class="fas fa-times"></i>
            </button>
        </form>
        <div class="search-suggestions">
            <h3>Recherches populaires</h3>
            <div class="suggestion-tags">
                <a href="{{ route('moheli.front.rubrique', ['slug' => 'politique']) }}" style="text-decoration: none;" class="suggestion-tag">Politique</a>
                <a href="{{ route('moheli.front.rubrique', ['slug' => 'economie']) }}" style="text-decoration: none;" class="suggestion-tag">Économie</a>
                <a href="{{ route('moheli.front.rubrique', ['slug' => 'sport']) }}" style="text-decoration: none;" class="suggestion-tag">Sport</a>
                <a href="{{ route('moheli.front.rubrique', ['slug' => 'culture']) }}" style="text-decoration: none;" class="suggestion-tag">Culture</a>
                <a href="{{ route('moheli.front.rubrique', ['slug' => 'sante']) }}" style="text-decoration: none;" class="suggestion-tag">Santé</a>
                <a href="{{ route('moheli.front.rubrique', ['slug' => 'opinion']) }}" style="text-decoration: none;" class="suggestion-tag">Opinion</a>
                <a href="{{ route('moheli.front.rubrique', ['slug' => 'communication']) }}" style="text-decoration: none;" class="suggestion-tag">Communication</a>
                <a href="{{ route('moheli.front.rubrique', ['slug' => 'societe']) }}" style="text-decoration: none;" class="suggestion-tag">Société</a>
            </div>
        </div>
    </div>
</div>