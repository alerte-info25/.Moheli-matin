// Loading Screen
const loadingScreen = document.getElementById('loadingScreen');
window.addEventListener('load', () => {
    setTimeout(() => {
        loadingScreen.classList.add('hidden');
    }, 2000);
});

// Sidebar functionality
const menuToggle = document.getElementById('menuToggle');
const closeSidebar = document.getElementById('closeSidebar');
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

menuToggle.addEventListener('click', openSidebar);
closeSidebar.addEventListener('click', closeSidebarFunc);
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

// Registration form validation
const registrationForm = document.getElementById('registrationForm');
const btnRegister = document.getElementById('btnRegister');

registrationForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    // Basic validation
    const firstName = document.getElementById('firstName');
    const lastName = document.getElementById('lastName');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    const terms = document.getElementById('terms');
    
    let isValid = true;
    
    // Reset validation states
    [firstName, lastName, email, password, confirmPassword].forEach(field => {
        field.classList.remove('is-invalid');
    });
    
    // Validate required fields
    if (!firstName.value.trim()) {
        firstName.classList.add('is-invalid');
        isValid = false;
    }
    
    if (!lastName.value.trim()) {
        lastName.classList.add('is-invalid');
        isValid = false;
    }
    
    if (!email.value.trim() || !isValidEmail(email.value)) {
        email.classList.add('is-invalid');
        isValid = false;
    }
    
    if (!password.value || password.value.length < 8) {
        password.classList.add('is-invalid');
        isValid = false;
    }
    
    if (password.value !== confirmPassword.value) {
        confirmPassword.classList.add('is-invalid');
        isValid = false;
    }
    
    if (!terms.checked) {
        terms.classList.add('is-invalid');
        isValid = false;
    }
    
    if (isValid) {
        // Simulate registration process
        btnRegister.disabled = true;
        btnRegister.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Création du compte...';
        
        setTimeout(() => {
            showToast('Inscription réussie !', 'Votre compte a été créé avec succès. Bienvenue sur MOHELI MATIN !', 'success');
            btnRegister.innerHTML = '<i class="fas fa-check"></i> Compte créé !';
            
            // Redirect to home page after 2 seconds
            setTimeout(() => {
                window.location.href = 'index.html'; // Replace with your actual home page URL
            }, 2000);
        }, 2000);
    }
});

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Password strength indicator (optional enhancement)
const passwordInput = document.getElementById('password');
passwordInput.addEventListener('input', () => {
    const password = passwordInput.value;
    // You could add password strength visualization here
});

// Back to home functionality
document.querySelectorAll('.back-to-home, .btn-primary[href="#"]').forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        // In a real scenario, this would redirect to the home page
        showToast('Redirection', 'Retour à la page d\'accueil...', 'info');
        setTimeout(() => {
            window.location.href = 'index.html'; // Replace with your actual home page URL
        }, 1000);
    });
});

// Social registration buttons
document.querySelectorAll('.btn-social').forEach(button => {
    button.addEventListener('click', () => {
        const provider = button.classList.contains('btn-facebook') ? 'Facebook' : 'Google';
        showToast('Inscription avec ' + provider, 'Redirection vers le service d\'authentification...', 'info');
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

// Console welcome message
console.log('%cMOHELI MATIN - INSCRIPTION', 'color: #FFD700; font-size: 24px; font-weight: bold;');
console.log('%cBienvenue sur la page d\'inscription de MOHELI MATIN', 'color: #003366; font-size: 14px;');
console.log('%cRaccourcis clavier: Ctrl+K pour rechercher, Échap pour fermer les modales', 'color: #DC143C; font-size: 12px;');