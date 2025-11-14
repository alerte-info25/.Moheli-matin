<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier Publicité - MOHELI MATIN back office</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("css/back/publicitesIndex.css") }}">
</head>
<body>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    @include("back.partials.loader")

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">

        @include("back.partials.logo")

        @include("back.partials.sidebar")
        
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="dashboard-header">
            <div class="header-left">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>

                @include("back.partials.link")
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
        </header>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <div class="editor-container">
                <div class="editor-header">
                    <h2 class="editor-title">Nouvelle Publicité</h2>
                </div>

                <form id="adForm" method="POST" action="{{ route("dashboard.publicites.store") }}" enctype="multipart/form-data">

                    @csrf

                    @if (session()->has('alert'))
                        <x-alert type="{{ session('alert')['type'] }}">
                            {{ session('alert')['message'] }}
                        </x-alert>
                    @endif

                    <div class="form-grid">
                        <!-- Main Content Column -->
                        <div class="form-column">
                            <!-- Titre et description -->
                            <div class="form-section">
                                <div class="form-group">
                                    <label class="form-label required" for="adTitle">Titre de la publicité</label>
                                    <input type="text" class="form-input @error('title') is-invalid @enderror" 
				                           id="title" name="title" 
				                           value="{{ old('title') }}" 
				                           placeholder="Entrez un titre accrocheur..." required>
				                    @error('title')
				                        <span class="error-message">{{ $message }}</span>
				                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label required" for="adDescription">Description de la publicité</label>
                                    <textarea class="form-textarea @error('description') is-invalid @enderror" 
			                           	id="description" name="description" 
				                        placeholder="Décrivez votre publicité...">{{ old('description') }}</textarea>	
				                    @error('description')
				                        <span class="error-message">{{ $message }}</span>
				                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="adLink">Lien de destination</label>
                                    <input type="url" class="form-input @error('link_url') is-invalid @enderror" 
				                           id="link_url" name="link_url" 
				                           value="{{ old('link_url') }}" 
				                           placeholder="https://example.com">
				                    <div class="form-hint">URL vers laquelle les utilisateurs seront redirigés</div>
				                    @error('link_url')
				                        <span class="error-message">{{ $message }}</span>
				                    @enderror
                                </div>
                            </div>
                            
                            <!-- Sidebar Column -->
	                        <div class="form-column editor-sidebar">
	                            <!-- Image de la publicité -->
	                            <div class="form-section">
	                                <h3 class="section-title">
	                                    <i class="fas fa-image"></i>
	                                    Image de la publicité
	                                </h3>

	                                <div class="file-upload" id="adImageUpload">
	                                    <div class="upload-icon">
	                                        <i class="fas fa-camera"></i>
	                                    </div>
	                                    <div class="upload-text">
	                                        <h4>Ajouter une image</h4>
	                                        <p>JPG, PNG, GIF - Recommandé: 728x90px</p>
	                                    </div>
	                                    <button type="button" class="btn-browse">Choisir une image</button>
	                                    <input type="file" id="adImage" name="image" class="@error('image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.gif" style="display: none;">
	                                </div>

	                                @error('image')
				                        <span class="error-message">{{ $message }}</span>
				                    @enderror

	                                <div class="featured-image-preview" id="adImagePreview">
	                                    <div class="image-preview-container">
	                                        <img src="" alt="Preview" class="image-preview" id="adImagePreviewImg">
	                                        <div class="image-preview-actions">
	                                            <button type="button" class="preview-action-btn" id="changeAdImage" title="Changer">
	                                                <i class="fas fa-sync"></i>
	                                            </button>
	                                            <button type="button" class="preview-action-btn" id="removeAdImage" title="Supprimer">
	                                                <i class="fas fa-trash"></i>
	                                            </button>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>

	                        </div>

                            <!-- Aperçu de la publicité -->
                            <div class="form-section">
                                <h3 class="section-title">
                                    <i class="fas fa-eye"></i>
                                    Aperçu de la publicité
                                </h3>

                                <div class="ad-preview-container">
                                    <div class="ad-preview" id="adPreview">
                                        <div class="ad-preview-content">
                                            <p>Aperçu de votre publicité</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Dimensions de la publicité -->
                            <div class="form-section">
                                <h3 class="section-title">
                                    <i class="fas fa-expand-alt"></i>
                                    Dimensions de la publicité
                                </h3>

                                <div class="dimensions-section">
                                    <div class="form-group">
                                        <label class="form-label required" for="adWidth">Largeur</label>
                                        <div class="dimension-input">
                                            <!-- <input type="number" class="form-input" id="adWidth" min="100" max="2000" value="728" readonly> -->

                                            <input type="number" class="form-input @error('width') is-invalid @enderror" 
			                                   id="adWidth" name="width" 
			                                   min="100" max="2000" 
			                                   value="728" readonly>

                                            <span class="dimension-unit">px</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label required" for="adHeight">Hauteur</label>
                                        <div class="dimension-input">
                                        	
                                            <input type="number" class="form-input @error('height') is-invalid @enderror" 
		                                   id="adHeight" name="height" 
		                                   min="50" max="2000" 
		                                   value="90" readonly>

                                            <span class="dimension-unit">px</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Formats prédéfinis</label>
                                    <div class="radio-group">
                                        <div class="radio-item">
                                            <input type="radio" id="formatBanner" name="format" value="banner" checked>
                                            <label for="formatBanner">Bannière (728x90)</label>
                                        </div>
                                        <div class="radio-item">
                                            <input type="radio" id="formatHalfPage" name="format" value="halfpage">
                                            <label for="formatHalfPage">Demi-page (300x600)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label required" for="adTitle">Date de debut</label>
                                <input type="date" class="form-input @error('start_date') is-invalid @enderror" 
                                        id="start_date" name="start_date" 
                                        value="{{ old('start_date') }}" required>
                                @error('start_date')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label required" for="adTitle">Date de fin</label>
                                <input type="date" class="form-input @error('end_date') is-invalid @enderror" 
                                        id="end_date" name="end_date" 
                                        value="{{ old('end_date') }}" required>
                                @error('end_date')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <input type="hidden" name="status" value="inactive">

                        </div>
                    </div>

                    <!-- Actions du formulaire -->
                    <div class="form-actions">
                        <a href="#" type="button" class="btn btn-cancel" style="text-decoration: none">
                            <i class="fas fa-times"></i>
                            Annuler
                        </a>
                        <button type="submit" class="btn btn-publish">
                            <i class="fas fa-paper-plane"></i>
                            Publier la publicité
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="{{ asset("js/back/publicitesIndex.js") }}"></script>
</body>
</html>