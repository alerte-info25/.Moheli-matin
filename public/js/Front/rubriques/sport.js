// Loading Screen
window.addEventListener('load', function() {
    const loadingScreen = document.getElementById('loadingScreen');
    setTimeout(() => {
        loadingScreen.classList.add('hidden');
    }, 1500);
});

// Header Scroll Effect
window.addEventListener('scroll', function() {
    const header = document.getElementById('mainHeader');
    const scrollTop = document.getElementById('scrollTop');
    
    if (window.scrollY > 100) {
        header.classList.add('scrolled');
        scrollTop.classList.add('visible');
    } else {
        header.classList.remove('scrolled');
        scrollTop.classList.remove('visible');
    }
});

// Scroll to Top
document.getElementById('scrollTop').addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

// Search Modal
const searchBtn = document.getElementById('searchBtn');
const searchModal = document.getElementById('searchModal');
const closeSearch = document.getElementById('closeSearch');
const searchInput = document.getElementById('searchInput');

searchBtn.addEventListener('click', function() {
    searchModal.classList.add('active');
    searchInput.focus();
});

closeSearch.addEventListener('click', function() {
    searchModal.classList.remove('active');
});

// Close search modal on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        searchModal.classList.remove('active');
    }
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

// User Authentication Simulation
const btnLogin = document.getElementById('btnLogin');
const btnLogout = document.getElementById('btnLogout');
const userInfo = document.getElementById('userInfo');
const userName = document.getElementById('userName');
const userAvatar = document.getElementById('userAvatar');

// Check if user is logged in (simulation)
const isLoggedIn = localStorage.getItem('isLoggedIn');

if (isLoggedIn) {
    showUserInfo();
}

btnLogin.addEventListener('click', function() {
    // Simulate login
    localStorage.setItem('isLoggedIn', 'true');
    showUserInfo();
    showToast('Connexion réussie', 'Bienvenue sur MOHELI MATIN !', 'success');
});

btnLogout.addEventListener('click', function() {
    // Simulate logout
    localStorage.removeItem('isLoggedIn');
    hideUserInfo();
    showToast('Déconnexion réussie', 'À bientôt sur MOHELI MATIN !', 'info');
});

function showUserInfo() {
    btnLogin.style.display = 'none';
    btnLogout.style.display = 'flex';
    userInfo.style.display = 'flex';
}

function hideUserInfo() {
    btnLogin.style.display = 'flex';
    btnLogout.style.display = 'none';
    userInfo.style.display = 'none';
}

// Toast Notification System
function showToast(title, message, type = 'info') {
    const toastContainer = document.getElementById('toastContainer');
    const toast = document.createElement('div');
    toast.className = `custom-toast toast-${type}`;
    
    const icon = type === 'success' ? 'fas fa-check-circle' : 'fas fa-info-circle';
    
    toast.innerHTML = `
        <div class="toast-icon">
            <i class="${icon}"></i>
        </div>
        <div class="toast-content">
            <h4>${title}</h4>
            <p>${message}</p>
        </div>
    `;
    
    toastContainer.appendChild(toast);
    
    // Remove toast after 5 seconds
    setTimeout(() => {
        toast.style.animation = 'slideIn 0.3s ease reverse forwards';
        setTimeout(() => {
            toast.remove();
        }, 300);
    }, 5000);
}

// Filter Tags
const filterTags = document.querySelectorAll('.filter-tag');
filterTags.forEach(tag => {
    tag.addEventListener('click', function() {
        filterTags.forEach(t => t.classList.remove('active'));
        this.classList.add('active');
        
        // Simulate filtering
        showToast('Filtre appliqué', `Affichage des articles : ${this.textContent}`, 'info');
    });
});

// Sort Articles
const sortSelect = document.getElementById('sortArticles');
sortSelect.addEventListener('change', function() {
    const sortText = this.options[this.selectedIndex].text;
    showToast('Tri appliqué', `Articles triés par : ${sortText}`, 'info');
});

// Newsletter Form
const newsletterForm = document.querySelector('.newsletter-form');
newsletterForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const email = this.querySelector('input[type="email"]').value;
    showToast('Inscription réussie', `Vous êtes maintenant abonné à notre newsletter avec : ${email}`, 'success');
    this.reset();
});

// Article Click Simulation
const articleCards = document.querySelectorAll('.article-card');
articleCards.forEach(card => {
    card.addEventListener('click', function(e) {
        if (!e.target.closest('.article-stats') && !e.target.closest('.author-avatar')) {
            const title = this.querySelector('.article-title').textContent;
            showToast('Article ouvert', `Lecture de : ${title}`, 'info');
        }
    });
});

// Suggestion Tags in Search
const suggestionTags = document.querySelectorAll('.suggestion-tag');
suggestionTags.forEach(tag => {
    tag.addEventListener('click', function() {
        searchInput.value = this.textContent;
        showToast('Recherche', `Recherche de : ${this.textContent}`, 'info');
    });
});

// Initialize with demo toast
setTimeout(() => {
    showToast('Bienvenue', 'Découvrez les actualités sportives de Mohéli !', 'info');
}, 2000);