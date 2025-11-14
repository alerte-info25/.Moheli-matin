// Loader
window.addEventListener('load', function() {
    let progress = 0;
    const progressBar = document.getElementById('loadingProgress');
    const loader = document.getElementById('loader');
    
    const interval = setInterval(() => {
        progress += 5;
        progressBar.style.width = progress + '%';
        
        if (progress >= 100) {
            clearInterval(interval);
            setTimeout(() => {
                loader.style.opacity = '0';
                setTimeout(() => {
                    loader.style.display = 'none';
                }, 500);
            }, 200);
        }
    }, 30);
});

// Sidebar toggle for mobile and desktop
const toggleSidebar = document.getElementById('toggleSidebar');
const sidebar = document.getElementById('sidebar');
const sidebarOverlay = document.getElementById('sidebarOverlay');

toggleSidebar.addEventListener('click', function() {
    if (window.innerWidth <= 768) {
        sidebar.classList.toggle('mobile-open');
        sidebarOverlay.classList.toggle('active');
    } else {
        sidebar.classList.toggle('collapsed');
    }
});

// Close sidebar when clicking overlay
sidebarOverlay.addEventListener('click', function() {
    sidebar.classList.remove('mobile-open');
    sidebarOverlay.classList.remove('active');
});

// Close sidebar when clicking a link on mobile
const navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
        navLinks.forEach(l => l.classList.remove('active'));
        this.classList.add('active');
        
        // Close sidebar on mobile
        if (window.innerWidth <= 768) {
            sidebar.classList.remove('mobile-open');
            sidebarOverlay.classList.remove('active');
        }
    });
});

// File upload functionality
const audioUpload = document.getElementById('audioUpload');
const audioFile = document.getElementById('audioFile');
const audioPlayer = document.getElementById('audioPlayer');
const audioPreview = document.getElementById('audioPreview');

const coverUpload = document.getElementById('coverUpload');
const coverFile = document.getElementById('coverFile');
const coverPreview = document.getElementById('coverPreview');

// Audio file upload (si ces éléments existent)
if (audioUpload && audioFile) {
    audioUpload.addEventListener('click', function() {
        audioFile.click();
    });

    audioFile.addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            const objectURL = URL.createObjectURL(file);
            audioPreview.src = objectURL;
            audioPlayer.style.display = 'block';
            audioUpload.classList.add('active');
            
            // Calculate duration when audio loads
            audioPreview.addEventListener('loadedmetadata', function() {
                const duration = Math.floor(audioPreview.duration / 60);
                const durationInput = document.getElementById('podcastDuration');
                if (durationInput) {
                    durationInput.value = duration;
                }
            });
        }
    });
}

// Cover image upload (si ces éléments existent)
if (coverUpload && coverFile) {
    coverUpload.addEventListener('click', function() {
        coverFile.click();
    });

    coverFile.addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            const reader = new FileReader();
            
            reader.onload = function(e) {
                coverPreview.src = e.target.result;
                coverPreview.style.display = 'block';
                coverUpload.classList.add('active');
            }
            
            reader.readAsDataURL(file);
        }
    });
}

// Editor Toolbar
const editorButtons = document.querySelectorAll('.editor-btn');
const editorContent = document.getElementById('editorContent');

editorButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        const command = btn.getAttribute('data-command');
        
        if (command === 'createLink') {
            const url = prompt('Entrez l\'URL du lien:');
            if (url) {
                document.execCommand(command, false, url);
            }
        } else {
            document.execCommand(command, false, null);
        }
        editorContent.focus();
    });
});

// CORRECTION PRINCIPALE : Copier le contenu de l'éditeur avant la soumission
const podcastForm = document.getElementById('podcastForm');
if (podcastForm) {
    podcastForm.addEventListener('submit', function (e) {
        const editorContent = document.getElementById('editorContent');
        const hiddenContent = document.getElementById('hiddenContent');
        
        if (editorContent && hiddenContent) {
            // Copier le contenu HTML de l'éditeur dans le champ caché
            hiddenContent.value = editorContent.innerHTML.trim();
            
            // Debug : afficher le contenu pour vérifier
            console.log('Contenu copié:', hiddenContent.value);
            
            // Si le contenu est vide ou juste le placeholder, empêcher la soumission
            if (!hiddenContent.value || hiddenContent.value === '<p>Commencez à rédiger votre article ici...</p>') {
                e.preventDefault();
                alert('Veuillez saisir le contenu du podcast.');
                return false;
            }
        }
    });
}

// Handle window resize
window.addEventListener('resize', function() {
    if (window.innerWidth > 768) {
        sidebar.classList.remove('mobile-open');
        sidebarOverlay.classList.remove('active');
    }
});