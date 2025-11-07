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

sidebarOverlay.addEventListener('click', function() {
    sidebar.classList.remove('active');
    sidebarOverlay.classList.remove('active');
    document.body.style.overflow = '';
});

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

// Login/Logout functionality
const btnLogin = document.getElementById('btnLogin');
const btnLogout = document.getElementById('btnLogout');
const userInfo = document.getElementById('userInfo');
const userAvatar = document.getElementById('userAvatar');
const userName = document.getElementById('userName');

let isLoggedIn = false;

function login() {
    isLoggedIn = true;
    btnLogin.style.display = 'none';
    btnLogout.style.display = 'flex';
    userInfo.style.display = 'flex';
    
    userName.textContent = 'Jean Dupont';
    userAvatar.textContent = 'JD';
    
    showToast('Connexion réussie', 'Bienvenue Jean Dupont !', 'success');
}

function logout() {
    isLoggedIn = false;
    btnLogin.style.display = 'flex';
    btnLogout.style.display = 'none';
    userInfo.style.display = 'none';
    
    showToast('Déconnexion', 'À bientôt !', 'info');
}

btnLogin.addEventListener('click', login);
btnLogout.addEventListener('click', logout);

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

// Video Modal functionality
const videoModal = document.getElementById('videoModal');
const closeVideoModal = document.getElementById('closeVideoModal');
const videoModalIframe = document.getElementById('videoModalIframe');

function openVideoModal(videoId) {
    videoModalIframe.innerHTML = `
        <iframe src="https://www.youtube.com/embed/${videoId}?autoplay=1" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
        </iframe>
    `;
    videoModal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeVideoModalFunc() {
    videoModal.classList.remove('active');
    videoModalIframe.innerHTML = '';
    document.body.style.overflow = '';
}

closeVideoModal.addEventListener('click', closeVideoModalFunc);
videoModal.addEventListener('click', (e) => {
    if (e.target === videoModal) {
        closeVideoModalFunc();
    }
});

// Play video buttons
document.querySelectorAll('.play-button').forEach(button => {
    button.addEventListener('click', (e) => {
        e.stopPropagation();
        const videoId = 'dQw4w9WgXcQ'; // Default video ID
        openVideoModal(videoId);
    });
});

// Video card interactions
document.querySelectorAll('.video-card').forEach(card => {
    card.addEventListener('click', (e) => {
        if (!e.target.closest('.play-button')) {
            const videoId = 'dQw4w9WgXcQ'; // Default video ID
            openVideoModal(videoId);
        }
    });
});

// Simulate live updates
function addLiveUpdate() {
    const updates = [
        {
            time: new Date().toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' }),
            title: "Nouveau point de collecte ouvert à la mairie de Fomboni",
            excerpt: "La municipalité met en place un nouveau centre pour recueillir les dons en faveur des sinistrés.",
            breaking: false
        },
        {
            time: new Date().toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' }),
            title: "Amélioration des conditions météorologiques prévue pour demain",
            excerpt: "Les services météorologiques annoncent une accalmie à partir de demain matin.",
            breaking: false
        }
    ];
    
    const randomUpdate = updates[Math.floor(Math.random() * updates.length)];
    const liveContainer = document.querySelector('.live-updates-container');
    
    const updateElement = document.createElement('div');
    updateElement.className = `live-update-item ${randomUpdate.breaking ? 'breaking' : ''}`;
    updateElement.innerHTML = `
        <div class="live-time">
            <span class="live-time-badge" style="background: ${randomUpdate.breaking ? 'var(--red)' : 'var(--blue)'};">${randomUpdate.breaking ? 'BREAKING' : 'INFO'}</span>
            <span class="live-time-text">${randomUpdate.time}</span>
        </div>
        <div class="live-content">
            <h3 class="live-title">${randomUpdate.title}</h3>
            <p class="live-excerpt">${randomUpdate.excerpt}</p>
        </div>
    `;
    
    liveContainer.prepend(updateElement);
    
    // Animation
    setTimeout(() => {
        updateElement.style.opacity = '1';
        updateElement.style.transform = 'translateX(0)';
    }, 100);
}

// Add a new live update every 2 minutes
setInterval(addLiveUpdate, 120000);

// News card interactions
document.querySelectorAll('.news-card').forEach(card => {
    card.addEventListener('click', (e) => {
        if (!e.target.closest('.news-read-more')) {
            card.style.transform = 'translateY(-5px)';
            setTimeout(() => {
                card.style.transform = '';
            }, 200);
            console.log('Opening news details...');
        }
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

// Keyboard shortcuts
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeSidebarFunc();
        searchModal.classList.remove('active');
        closeVideoModalFunc();
    }
    if (e.ctrlKey && e.key === 'k') {
        e.preventDefault();
        searchModal.classList.add('active');
        searchInput.focus();
    }
});

// Console welcome message
console.log('%cMOHELI MATIN - DERNIÈRES INFOS', 'color: #FFD700; font-size: 24px; font-weight: bold;');
console.log('%cBienvenue sur la page des dernières informations de Mohéli', 'color: #003366; font-size: 14px;');
console.log('%cRaccourcis clavier: Ctrl+K pour rechercher, Échap pour fermer les modales', 'color: #DC143C; font-size: 12px;');