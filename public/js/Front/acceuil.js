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

// Newsletter form
const newsletterForm = document.getElementById('newsletterForm');
newsletterForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const email = newsletterForm.querySelector('input[type="email"]').value;
    showToast('Inscription réussie', `Vous êtes maintenant abonné avec l'adresse: ${email}`, 'success');
    newsletterForm.reset();
});

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
    }
    if (e.ctrlKey && e.key === 'k') {
        e.preventDefault();
        searchModal.classList.add('active');
        searchInput.focus();
    }
});

// Hero Slider Functionality
const heroSlider = document.getElementById('heroSlider');
const slides = document.querySelectorAll('.slide');
const sliderBtns = document.querySelectorAll('.slider-btn');
const prevBtn = document.querySelector('.prev-slide');
const nextBtn = document.querySelector('.next-slide');

let currentSlide = 0;
let slideInterval;

function showSlide(index) {
    // Masquer toutes les slides
    slides.forEach(slide => {
        slide.classList.remove('active');
    });
    
    // Afficher la slide sélectionnée
    slides[index].classList.add('active');
    
    // Mettre à jour les boutons indicateurs
    sliderBtns.forEach(btn => {
        btn.classList.remove('active');
    });
    sliderBtns[index].classList.add('active');
    
    currentSlide = index;
}

function nextSlide() {
    let nextIndex = (currentSlide + 1) % slides.length;
    showSlide(nextIndex);
}

function prevSlide() {
    let prevIndex = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(prevIndex);
}

// Événements pour les boutons de navigation
prevBtn.addEventListener('click', prevSlide);
nextBtn.addEventListener('click', nextSlide);

// Événements pour les boutons indicateurs
sliderBtns.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        showSlide(index);
        resetSlideInterval();
    });
});

// Fonction pour démarrer l'intervalle automatique
function startSlideInterval() {
    slideInterval = setInterval(nextSlide, 5000);
}

// Fonction pour réinitialiser l'intervalle
function resetSlideInterval() {
    clearInterval(slideInterval);
    startSlideInterval();
}

// Démarrer l'intervalle automatique
startSlideInterval();

// Pause l'intervalle quand la souris est sur le slider
heroSlider.addEventListener('mouseenter', () => {
    clearInterval(slideInterval);
});

// Reprend l'intervalle quand la souris quitte le slider
heroSlider.addEventListener('mouseleave', () => {
    startSlideInterval();
});

// Console welcome message
console.log('%cMOHELI MATIN', 'color: #FFD700; font-size: 24px; font-weight: bold;');
console.log('%cBienvenue sur le journal en ligne de Mohéli', 'color: #003366; font-size: 14px;');
console.log('%cRaccourcis clavier: Ctrl+K pour rechercher, Échap pour fermer les modales', 'color: #DC143C; font-size: 12px;');