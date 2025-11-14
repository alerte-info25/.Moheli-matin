<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Podcast - MOHELI MATIN back office Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset("css/back/podcastsaudios.css") }}">
</head>
<body>

    <!-- Loader -->
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
                    <h1 class="page-title">Gestion des Podcasts Audio</h1>
                    <p class="page-description">Créez et gérez vos podcasts audio pour Moheli matin</p>
                </div>

                <!-- Dashboard Content -->
                <div class="dashboard-content">
                    <!-- Podcast Form -->
                    <div class="form-section fade-in">
                        <div class="section-header">
                            <h3 class="section-title">
                                <i class="fas fa-plus-circle"></i>
                                Nouveau Podcast
                            </h3>
                        </div>

                        {{-- @dd($audio->media->tags) --}}

                        <form id="podcastForm" 
                            class="needs-validation"
                            method="POST" 
                            action="{{ isset($audio) ? route('dashboard.audios.update', $audio->id) : route('dashboard.audios.store') }}" 
                            enctype="multipart/form-data">
                            @csrf
                            @if(isset($audio))
                                @method('PUT')
                            @endif

                            @if (session()->has('alert'))
                                <x-alert type="{{ session('alert')['type'] }}">
                                    {{ session('alert')['message'] }}
                                </x-alert>
                            @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- File Upload Area -->
                                    <div class="mb-4">
                                        <label class="form-label">
                                            <i class="fas fa-file-audio me-1"></i>
                                            Url Audio *
                                        </label>

                                        <input type="text" name="url" placeholder="Ex : https://www.radiofrance.fr/franceinter/podcasts/le-fil-de-l-histoire/le-fil-de-l-histoire-du-vendredi-03-octobre-2025-8584237" 
                                                        class="form-control @error('url') is-invalid @enderror" 
                                                        value="{{ old('url', $audio->url_audio ?? '') }}">

                                        @error('url')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror                                        

                                        <!-- Preview -->
                                        @if(isset($audio) && $audio->url_audio)
                                            <div id="audioPreviewContainer" style="margin-top:10px; display:block;">
                                                <audio id="audioPreview" controls style="width:100%;" src="{{ $audio->url_audio}}"></audio>
                                            </div>
                                        @else
                                            <div id="audioPreviewContainer" style="margin-top:10px; display:none;">
                                                <audio id="audioPreview" controls style="width:100%;"></audio>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Title -->
                                    <div class="mb-3">
                                        <label for="audioTitle" class="form-label">
                                            <i class="fas fa-heading me-1"></i>
                                            Titre *
                                        </label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                            id="audioTitle" name="title" 
                                            value="{{ old('title', $audio->media->titre ?? '') }}" 
                                            placeholder="Titre..." required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Sous-titre -->
                                    <div class="mb-4">
                                        <label for="videoSubtitle" class="form-label">Sous-titre *</label>
                                        <input type="text" class="form-control @error('subtitle') is-invalid @enderror" 
                                            id="videoSubtitle" name="subtitle" 
                                            value="{{ old('subtitle', $audio->subtitle ?? '') }}" 
                                            placeholder="Sous-titre..." required>
                                        @error('subtitle')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Category -->
                                    <div class="mb-3">
                                        <label for="audioCategory" class="form-label">
                                            <i class="fas fa-tags me-1"></i>
                                            Catégorie *
                                        </label>
                                        <select class="form-select @error('category') is-invalid @enderror" id="audioCategory" name="category" required>
                                            <option value="">Sélectionner une catégorie</option>
                                            <option value="music" {{ old('category', $audio->category ?? '')=='music' ? 'selected' : '' }}>Musique</option>
                                            <option value="podcast" {{ old('category', $audio->category ?? '')=='podcast' ? 'selected' : '' }}>Podcast</option>
                                            <option value="talk-show" {{ old('category', $audio->category ?? '')=='talk-show' ? 'selected' : '' }}>Talk Show</option>
                                            <option value="news" {{ old('category', $audio->category ?? '')=='news' ? 'selected' : '' }}>Actualités</option>
                                            <option value="interview" {{ old('category', $audio->category ?? '')=='interview' ? 'selected' : '' }}>Interview</option>
                                            <option value="comedy" {{ old('category', $audio->category ?? '')=='comedy' ? 'selected' : '' }}>Comédie</option>
                                            <option value="culture" {{ old('category', $audio->category ?? '')=='culture' ? 'selected' : '' }}>Culture</option>
                                        </select>
                                        @error('category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-3">
                                        <input type="hidden" name="status" value="publie">
                                    </div>

                                    <!-- Tags -->
                                    <div class="mb-4">
                                        <label for="videoTags" class="form-label">
                                            <i class="fas fa-hashtag me-1"></i>
                                            Tags *
                                        </label>
                                        <input type="text" class="form-control @error('tags') is-invalid @enderror" 
                                            id="videoTags" name="tags" 
                                            value="{{ old('tags', isset($audio) ? $audio->media->tags->pluck('libelle')->implode(', ') : '') }}" 
                                            placeholder="Tags séparés par des virgules..." required>
                                        <small class="form-text text-muted">Ex: musique, clip, artiste, 2024</small>
                                        @error('tags')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-lg-12">

                                        <div class="form-card">
                                        <h3 class="form-section-title">
                                            <i class="fas fa-pen"></i>
                                            Contenu de la vidéo
                                        </h3>

                                        <div class="form-group  @error('content') is-invalid @enderror">
                                            <label class="form-label required">Corps de la vidéo</label>
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
                                                    {!! old('content', isset($audio) ? $audio->media->description : 'Commencez à rédiger votre article ici...') !!}
                                                </p>
                                            </div>
                                        </div>

                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <textarea id="hiddenContent" name="content" style="display: none;"></textarea>

                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="d-flex gap-3 mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i>
                                    Sauvegarder
                                </button>

                                <a href="{{ route('dashboard.audiosList') }}" 
                                class="btn btn-secondary d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-right-from-bracket me-1"></i>
                                    Annuler
                                </a>
                            </div>

                        </form>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset("js/back/podcastsaudios.js") }}"></script>
</body>
</html>