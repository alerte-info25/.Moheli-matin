<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier un Article - MOHELI MATIN back office</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    
    {{-- local css --}}
    <link rel="stylesheet" href="{{ asset("css/back/articles.css") }}">
</head>
<body>

    @include("back.partials.loader")

    <!-- Mobile Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Dashboard Container -->
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            @include("back.partials.logo")
            
            @include("back.partials.sidebar")
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Bar -->
            <div class="top-bar">
                <button class="toggle-sidebar" id="toggleSidebar">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="user-menu">
                    <div class="user-info">
                        <div class="user-details">
                            @include("back.partials.link")
                        </div>
                    </div>
                </div>

                <div class="header-right">
                    <div class="user-profile">
                        <div class="user-avatar">
                            {{ substr(auth()->user()->nom, 0, 1) . substr(auth()->user()->prenom, 0, 1) }}
                        </div>
                        <div class="user-info">
                            <div class="user-name">{{ auth()->user()->nom . " " . auth()->user()->prenom }}</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Content Area -->
            <div class="content-area">
                <!-- Page Header -->
                <div class="page-header">
                    <h1 class="page-title">Publier un Nouvel Article</h1>
                    <p class="page-description">Créez et publiez du contenu pour votre audience</p>
                </div>

                <form class="form-container"
                    action="{{ isset($article) ? route('dashboard.articles.update', $article->id) : route('dashboard.articles.store') }}" 
                    method="POST" enctype="multipart/form-data" novalidate>

                    @csrf
                    @if(isset($article))
                        @method('PUT')
                    @endif

                    @if (session()->has('alert'))
                        <x-alert type="{{ session('alert')['type'] }}">
                            {{ session('alert')['message'] }}
                        </x-alert>
                    @endif

                    <!-- Basic Information -->
                    <div class="form-card">
                        <h3 class="form-section-title">
                            <i class="fas fa-info-circle"></i>
                            Informations de base
                        </h3>

                        <div class="form-group">
                            <label for="articleTitle" class="form-label required">Titre de l'article</label>
                            <input type="text" 
                                class="form-control @error('title') is-invalid @enderror" 
                                id="articleTitle" name="title" 
                                placeholder="Entrez un titre accrocheur..." 
                                value="{{ old('title', $article->media->titre ?? '') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text">Le titre apparaîtra en haut de votre article</small>
                        </div>

                        <div class="form-group">
                            <label for="articleSubtitle" class="form-label">Sous-titre</label>
                            <input type="text" 
                                class="form-control @error('subtitle') is-invalid @enderror" 
                                id="articleSubtitle" name="subtitle" 
                                placeholder="Sous-titre..." 
                                value="{{ old('subtitle', $article->sous_titre ?? '') }}">
                            @error('subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text">Un sous-titre pour compléter votre titre principal</small>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="articleCategory" class="form-label required">Catégorie</label>
                                    <select class="form-select" name="category" id="articleCategory">
                                        <option value="">Sélectionner une catégorie</option>
                                        <option value="politique" {{ old('category', $article->categorieArticle->libelle ?? '') == 'politique' ? 'selected' : '' }}>Politique</option>
                                        <option value="economie" {{ old('category', $article->categorieArticle->libelle ?? '') == 'economie' ? 'selected' : '' }}>Économie</option>
                                        <option value="culture" {{ old('category', $article->categorieArticle->libelle ?? '') == 'culture' ? 'selected' : '' }}>Culture</option>
                                        <option value="sport" {{ old('category', $article->categorieArticle->libelle ?? '') == 'sport' ? 'selected' : '' }}>Sport</option>
                                        <option value="societe" {{ old('category', $article->categorieArticle->libelle ?? '') == 'societe' ? 'selected' : '' }}>Société</option>
                                        <option value="opinion" {{ old('category', $article->categorieArticle->libelle ?? '') == 'opinion' ? 'selected' : '' }}>Opinion</option>
                                        <option value="communication" {{ old('category', $article->categorieArticle->libelle ?? '') == 'communication' ? 'selected' : '' }}>Communication</option>
                                        <option value="sante" {{ old('category', $article->categorieArticle->libelle ?? '') == 'sante' ? 'selected' : '' }}>Santé</option>
                                        <option value="divers" {{ old('category', $article->categorieArticle->libelle ?? '') == 'divers' ? 'selected' : '' }}>Divers</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="type" class="form-label required">Type d'article</label>
                                    <select class="form-select" id="type" name="type">
                                        <option value="">Sélectionner un type</option>
                                        <option value="Tribune" {{ old('type', $article->typeArticle->libelle ?? '') == 'Tribune' ? 'selected' : '' }}>Tribune</option>
                                        <option value="Analyse" {{ old('type', $article->typeArticle->libelle ?? '') == 'Analyse' ? 'selected' : '' }}>Analyse</option>
                                        <option value="Chronique" {{ old('type', $article->typeArticle->libelle ?? '') == 'Chronique' ? 'selected' : '' }}>Chronique</option>
                                        <option value="Reportage" {{ old('type', $article->typeArticle->libelle ?? '') == 'Reportage' ? 'selected' : '' }}>Reportage</option>
                                        <option value="Breve" {{ old('type', $article->typeArticle->libelle ?? '') == 'Breve' ? 'selected' : '' }}>Brève</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Tags</label>
                            <div class="tags-container" id="tagsContainer">
                                <input type="text"
                                    class="tag-input @error('tags') is-invalid @enderror"
                                    id="articleTags"
                                    name="tags"
                                    placeholder="sport, actualité, culture..."
                                    value="{{ old('tags', isset($article) ? $article->media->tags->pluck('libelle')->implode(', ') : '') }}">
                                @error('tags')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text">Ajoutez des mots-clés pour faciliter la recherche de votre article</small>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <div class="form-card">
                        <h3 class="form-section-title">
                            <i class="fas fa-image"></i>
                            Image à la une
                            @if(isset($article))
                                <span style="font-size: 0.85rem; color: #6c757d; font-weight: normal; margin-left: 8px;">
                                    (optionnel - laissez vide pour conserver l'image actuelle)
                                </span>
                            @endif
                        </h3>

                        <div class="image-upload-area" id="imageUploadArea">
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <div class="upload-text">Cliquez pour télécharger ou glissez-déposez</div>
                            <div class="upload-hint">PNG, JPG ou JPEG (MAX. 5MB)</div>
                            <input type="file" id="imageInput" accept="image/*" name="image" style="display: none;">
                        </div>

                        @if (isset($article) && $article->media->image)
                            <div style="margin-top: 20px; text-align: center;">
                                <p style="color: #6c757d; font-size: 0.9rem; margin-bottom: 10px;">
                                    <i class="fas fa-info-circle"></i> Image actuelle
                                </p>
                                <img src="{{ asset('storage/' . $article->media->image) }}" 
                                    alt="Image actuelle" 
                                    style="max-width: 350px; width: 100%; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                            </div>
                        @endif

                        <div class="image-preview-container" id="imagePreviewContainer">
                            <div class="image-preview">
                                <img id="imagePreview" src="" alt="Preview">
                                <button class="remove-image-btn" id="removeImageBtn">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Article Content -->
                    <div class="form-card">
                        <h3 class="form-section-title">
                            <i class="fas fa-pen"></i>
                            Contenu de l'article
                        </h3>

                        <div class="form-group">
                            <label class="form-label required">Corps de l'article</label>
                            <div class="editor-toolbar">
                                <button class="editor-btn" data-command="bold" title="Gras">
                                    <i class="fas fa-bold"></i>
                                </button>
                                <button class="editor-btn" data-command="italic" title="Italique">
                                    <i class="fas fa-italic"></i>
                                </button>
                                <button class="editor-btn" data-command="underline" title="Souligné">
                                    <i class="fas fa-underline"></i>
                                </button>
                                <button class="editor-btn" data-command="insertUnorderedList" title="Liste à puces">
                                    <i class="fas fa-list-ul"></i>
                                </button>
                                <button class="editor-btn" data-command="insertOrderedList" title="Liste numérotée">
                                    <i class="fas fa-list-ol"></i>
                                </button>
                                <button class="editor-btn" data-command="justifyLeft" title="Aligner à gauche">
                                    <i class="fas fa-align-left"></i>
                                </button>
                                <button class="editor-btn" data-command="justifyCenter" title="Centrer">
                                    <i class="fas fa-align-center"></i>
                                </button>
                                <button class="editor-btn" data-command="justifyRight" title="Aligner à droite">
                                    <i class="fas fa-align-right"></i>
                                </button>
                                <button class="editor-btn" data-command="createLink" title="Insérer un lien">
                                    <i class="fas fa-link"></i>
                                </button>
                            </div>
                            <div class="editor-content" id="editorContent" contenteditable="true">
                            <p>
                                    {!! old('content', isset($article) ? $article->media->description : 'Commencez à rédiger votre article ici...') !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    <textarea id="hiddenContent" name="content" style="display: none;"></textarea>

                    <!-- Action Buttons -->
                    <div class="form-card">
                        <div class="action-buttons">
                            <button class="btn btn-primary" id="publishBtn">
                                <i class="fas fa-paper-plane"></i>
                                {{ isset($article) ? 'Mettre à jour l\'article' : 'Publier l\'article' }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="success-modal" id="successModal">
        <div class="success-modal-content">
            <i class="fas fa-check-circle success-icon"></i>
            <h2 class="success-title">Article publié avec succès!</h2>
            <p class="success-message">Votre article est maintenant visible par votre audience.</p>
            <button class="btn btn-primary" id="closeSuccessBtn">
                <i class="fas fa-check"></i>
                Parfait!
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="{{ asset("js/back/articles.js") }}"></script>
</body>
</html>