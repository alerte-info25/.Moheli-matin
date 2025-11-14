// Loading Screen
const loadingScreen = document.getElementById('loadingScreen');
window.addEventListener('load', () => {
    setTimeout(() => {
        loadingScreen.classList.add('hidden');
    }, 2000);
});

// Sidebar functionality
const menuToggles = document.querySelectorAll('.menuToggle');
const closeSidebarBtns = document.querySelectorAll('.closeSidebar');
const sidebar = document.getElementById('sidebar');
const sidebarOverlay = document.getElementById('sidebarOverlay');

function openSidebar() {
    sidebar.classList.add('active');
    sidebarOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeSidebarFunc() {
    sidebar.classList.remove('active');
    sidebarOverlay.classList.remove('active');
    document.body.style.overflow = '';
}

// Ajouter l'événement à tous les boutons toggle
menuToggles.forEach(btn => {
    btn.addEventListener('click', openSidebar);
});

// Ajouter l'événement à tous les boutons de fermeture
closeSidebarBtns.forEach(btn => {
    btn.addEventListener('click', closeSidebarFunc);
});

// Fermer si on clique sur l’overlay
sidebarOverlay.addEventListener('click', closeSidebarFunc);

// Search functionality
const searchBtn = document.getElementById('searchBtn');
const searchModal = document.getElementById('searchModal');
const closeSearch = document.getElementById('closeSearch');
const searchInput = document.getElementById('searchInput');

searchBtn.addEventListener('click', () => {
    searchModal.classList.add('active');
    searchInput.focus();
});

closeSearch.addEventListener('click', () => {
    searchModal.classList.remove('active');
});

searchModal.addEventListener('click', (e) => {
    if (e.target === searchModal) {
        searchModal.classList.remove('active');
    }
});

// Suggestion tags
document.querySelectorAll('.suggestion-tag').forEach(tag => {
    tag.addEventListener('click', () => {
        searchInput.value = tag.textContent;
        searchInput.focus();
    });
});

// Toast notifications
function showToast(title, message, type = 'info') {
    const toastContainer = document.getElementById('toastContainer');
    const toast = document.createElement('div');
    toast.className = `custom-toast toast-${type}`;
    toast.innerHTML = `
        <div class="toast-icon">
            <i class="fas fa-${type === 'success' ? 'check' : 'info'}"></i>
        </div>
        <div class="toast-content">
            <h4>${title}</h4>
            <p>${message}</p>
        </div>
    `;
    
    toastContainer.appendChild(toast);
    
    setTimeout(() => {
        toast.remove();
    }, 5000);
}

// Header scroll effect
const mainHeader = document.getElementById('mainHeader');
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        mainHeader.classList.add('scrolled');
    } else {
        mainHeader.classList.remove('scrolled');
    }
});

// Scroll to top
const scrollTop = document.getElementById('scrollTop');
window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
        scrollTop.classList.add('visible');
    } else {
        scrollTop.classList.remove('visible');
    }
});

scrollTop.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

// Smooth scroll for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// video play
document.addEventListener('DOMContentLoaded', function() {
    const placeholder = document.getElementById('videoPlaceholder');
    const youtubeContainer = document.getElementById('youtubePlayerContainer');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const muteBtn = document.getElementById('muteBtn');
    const volumeSlider = document.getElementById('volumeSlider');
    const progressBar = document.getElementById('progressBar');
    const progress = document.getElementById('progress');
    const timeDisplay = document.getElementById('timeDisplay');
    const fullscreenBtn = document.getElementById('fullscreenBtn');
    const videoPlayerWrapper = document.getElementById('videoPlayerWrapper');
    
    let player;
    let isPlayerReady = false;
    
    // Charger l'API YouTube
    const tag = document.createElement('script');
    tag.src = 'https://www.youtube.com/iframe_api';
    const firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    
    // Callback quand l'API est prête
    window.onYouTubeIframeAPIReady = function() {
        player = new YT.Player('youtubePlayer', {
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    };
    
    function onPlayerReady(event) {
        isPlayerReady = true;
    }
    
    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING) {
            playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
            updateProgressBar();
        } else {
            playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
        }
    }
    
    // Clic sur le placeholder pour charger la vidéo
    if (placeholder) {
        placeholder.addEventListener('click', function() {
            placeholder.style.display = 'none';
            youtubeContainer.style.display = 'block';
            
            // Attendre que le player soit prêt avant de jouer
            const checkReady = setInterval(() => {
                if (isPlayerReady) {
                    player.playVideo();
                    clearInterval(checkReady);
                }
            }, 100);
        });
    }
    
    // Play/Pause
    if (playPauseBtn) {
        playPauseBtn.addEventListener('click', function() {
            if (!isPlayerReady) return;
            
            const state = player.getPlayerState();
            if (state == YT.PlayerState.PLAYING) {
                player.pauseVideo();
            } else {
                player.playVideo();
            }
        });
    }
    
    // Mute/Unmute
    if (muteBtn) {
        muteBtn.addEventListener('click', function() {
            if (!isPlayerReady) return;
            
            if (player.isMuted()) {
                player.unMute();
                muteBtn.innerHTML = '<i class="fas fa-volume-up"></i>';
            } else {
                player.mute();
                muteBtn.innerHTML = '<i class="fas fa-volume-mute"></i>';
            }
        });
    }
    
    // Volume slider
    if (volumeSlider) {
        volumeSlider.addEventListener('input', function() {
            if (!isPlayerReady) return;
            player.setVolume(this.value);
        });
    }
    
    // Progress bar
    if (progressBar) {
        progressBar.addEventListener('click', function(e) {
            if (!isPlayerReady) return;
            
            const rect = this.getBoundingClientRect();
            const percent = (e.clientX - rect.left) / rect.width;
            const duration = player.getDuration();
            player.seekTo(duration * percent);
        });
    }
    
    // Fullscreen
    if (fullscreenBtn) {
        fullscreenBtn.addEventListener('click', function() {
            if (videoPlayerWrapper.requestFullscreen) {
                videoPlayerWrapper.requestFullscreen();
            } else if (videoPlayerWrapper.webkitRequestFullscreen) {
                videoPlayerWrapper.webkitRequestFullscreen();
            } else if (videoPlayerWrapper.msRequestFullscreen) {
                videoPlayerWrapper.msRequestFullscreen();
            }
        });
    }
    
    // Mise à jour de la barre de progression
    function updateProgressBar() {
        if (!isPlayerReady) return;
        
        const currentTime = player.getCurrentTime();
        const duration = player.getDuration();
        const percent = (currentTime / duration) * 100;
        
        progress.style.width = percent + '%';
        timeDisplay.textContent = formatTime(currentTime) + ' / ' + formatTime(duration);
        
        if (player.getPlayerState() == YT.PlayerState.PLAYING) {
            requestAnimationFrame(updateProgressBar);
        }
    }
    
    // Formater le temps
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return mins + ':' + (secs < 10 ? '0' : '') + secs;
    }
});

// Console welcome message
console.log('%cMOHELI MATIN', 'color: #FFD700; font-size: 24px; font-weight: bold;');
console.log('%cPage de détail vidéo', 'color: #003366; font-size: 14px;');
console.log('%cRaccourcis clavier: Ctrl+K pour rechercher, Échap pour fermer les modales', 'color: #DC143C; font-size: 12px;');