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

// Package selection
document.querySelectorAll('.btn-package').forEach(btn => {
    btn.addEventListener('click', function() {
        const packageName = this.closest('.package-card').querySelector('.package-name').textContent;
        const packagePrice = this.closest('.package-card').querySelector('.package-price').textContent;
        
        // Scroll to contact form
        document.getElementById('contact').scrollIntoView({
            behavior: 'smooth'
        });
        
        // Auto-fill the form
        setTimeout(() => {
            document.getElementById('budget').value = packageName.includes('Découverte') ? '50k' : 
                                                        packageName.includes('Professionnel') ? '150k' : '300k';
            
            // Show confirmation message
            showToast('Offre sélectionnée', `Vous avez choisi l'offre ${packageName} (${packagePrice})`, 'success');
        }, 1000);
    });
});

// Form validation
const adForm = document.getElementById('adForm');
adForm.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const btnSend = this.querySelector('.btn-send');
    btnSend.disabled = true;
    btnSend.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
    
    // Simulate form submission
    setTimeout(() => {
        btnSend.innerHTML = '<i class="fas fa-check"></i> Demande envoyée !';
        btnSend.style.background = 'var(--success)';
        
        setTimeout(() => {
            showToast('Devis demandé !', 'Notre équipe vous contactera dans les 24h.', 'success');
            adForm.reset();
            btnSend.disabled = false;
            btnSend.innerHTML = '<i class="fas fa-paper-plane"></i> Demander un devis';
            btnSend.style.background = '';
        }, 1000);
    }, 2000);
});

// Smooth scrolling for anchor links
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

console.log('MOHELI MATIN - Page publicité chargée avec succès');