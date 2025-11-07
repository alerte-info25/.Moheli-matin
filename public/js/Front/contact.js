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

// Contact form validation
const contactForm = document.getElementById('contactForm');
const btnSend = document.getElementById('btnSend');

contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    // Basic validation
    const firstName = document.getElementById('firstName');
    const lastName = document.getElementById('lastName');
    const email = document.getElementById('email');
    const subject = document.getElementById('subject');
    const message = document.getElementById('message');
    
    let isValid = true;
    
    // Reset validation states
    [firstName, lastName, email, subject, message].forEach(field => {
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
    
    if (!subject.value) {
        subject.classList.add('is-invalid');
        isValid = false;
    }
    
    if (!message.value.trim()) {
        message.classList.add('is-invalid');
        isValid =                isValid = false;
    }
    
    if (isValid) {
        // Simulate form submission
        btnSend.disabled = true;
        btnSend.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
        
        setTimeout(() => {
            showToast('Message envoyé !', 'Nous vous répondrons dans les plus brefs délais.', 'success');
            contactForm.reset();
            btnSend.disabled = false;
            btnSend.innerHTML = '<i class="fas fa-paper-plane"></i> Envoyer le message';
        }, 2000);
    } else {
        showToast('Formulaire incomplet', 'Veuillez corriger les erreurs dans le formulaire.', 'info');
    }
});

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// FAQ functionality
document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', () => {
        const answer = question.nextElementSibling;
        const isActive = answer.classList.contains('active');
        
        // Close all answers
        document.querySelectorAll('.faq-answer').forEach(ans => {
            ans.classList.remove('active');
        });
        
        // Rotate all icons back
        document.querySelectorAll('.faq-question i').forEach(icon => {
            icon.style.transform = 'rotate(0deg)';
        });
        
        // If this answer wasn't active, open it
        if (!isActive) {
            answer.classList.add('active');
            question.querySelector('i').style.transform = 'rotate(180deg)';
        }
    });
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

// Image lazy loading
const images = document.querySelectorAll('img');
const imageOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px 50px 0px'
};

const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
            img.classList.remove('lazy');
            imageObserver.unobserve(img);
        }
    });
}, imageOptions);

images.forEach(img => {
    if (img.dataset.src) {
        imageObserver.observe(img);
    }
});

// Real-time form validation
document.querySelectorAll('.form-control').forEach(input => {
    input.addEventListener('blur', function() {
        validateField(this);
    });
    
    input.addEventListener('input', function() {
        if (this.classList.contains('is-invalid')) {
            validateField(this);
        }
    });
});

function validateField(field) {
    const value = field.value.trim();
    
    switch(field.id) {
        case 'firstName':
        case 'lastName':
            if (value === '') {
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
            break;
            
        case 'email':
            if (value === '' || !isValidEmail(value)) {
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
            break;
            
        case 'subject':
            if (value === '') {
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
            break;
            
        case 'message':
            if (value === '') {
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
            break;
    }
}

// Character counter for message
const messageField = document.getElementById('message');
const charCounter = document.createElement('div');
charCounter.className = 'form-text text-end mt-1';
charCounter.innerHTML = '<small><span id="charCount">0</span>/500 caractères</small>';
messageField.parentNode.appendChild(charCounter);

messageField.addEventListener('input', function() {
    const count = this.value.length;
    document.getElementById('charCount').textContent = count;
    
    if (count > 500) {
        charCounter.querySelector('small').style.color = 'var(--red)';
    } else {
        charCounter.querySelector('small').style.color = '#666';
    }
});

// Auto-save form data
let formAutoSave = {
    data: {},
    timer: null,
    
    save: function(field, value) {
        this.data[field] = value;
        localStorage.setItem('contactFormDraft', JSON.stringify(this.data));
    },
    
    load: function() {
        const saved = localStorage.getItem('contactFormDraft');
        if (saved) {
            this.data = JSON.parse(saved);
            Object.keys(this.data).forEach(field => {
                const element = document.getElementById(field);
                if (element) {
                    element.value = this.data[field];
                }
            });
            
            // Show restore notification
            if (Object.keys(this.data).length > 0) {
                showToast('Brouillon restauré', 'Vos données précédentes ont été restaurées.', 'info');
            }
        }
    },
    
    clear: function() {
        this.data = {};
        localStorage.removeItem('contactFormDraft');
    }
};

// Load saved form data
document.addEventListener('DOMContentLoaded', function() {
    formAutoSave.load();
});

// Auto-save on input with debounce
document.querySelectorAll('#contactForm input, #contactForm select, #contactForm textarea').forEach(field => {
    field.addEventListener('input', function() {
        clearTimeout(formAutoSave.timer);
        formAutoSave.timer = setTimeout(() => {
            formAutoSave.save(this.id, this.value);
        }, 1000);
    });
});

// Clear saved data on successful submission
contactForm.addEventListener('submit', function() {
    setTimeout(() => {
        formAutoSave.clear();
    }, 3000);
});

// Enhanced user interactions
document.querySelectorAll('.contact-method').forEach(method => {
    method.addEventListener('click', function() {
        this.style.transform = 'scale(0.98)';
        setTimeout(() => {
            this.style.transform = '';
        }, 150);
    });
});

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Ctrl + / to open search
    if (e.ctrlKey && e.key === '/') {
        e.preventDefault();
        searchModal.classList.add('active');
        searchInput.focus();
    }
    
    // Escape to close modals
    if (e.key === 'Escape') {
        searchModal.classList.remove('active');
        closeSidebarFunc();
    }
});

// Performance optimization - Intersection Observer for animations
const animateOnScroll = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = "1";
            entry.target.style.transform = "translateY(0)";
        }
    });
}, { threshold: 0.1 });

// Observe elements for scroll animations
document.querySelectorAll('.contact-method, .faq-item, .hero-image').forEach(el => {
    el.style.opacity = "0";
    el.style.transform = "translateY(30px)";
    el.style.transition = "opacity 0.6s ease, transform 0.6s ease";
    animateOnScroll.observe(el);
});

console.log('MOHELI MATIN - Contact page loaded successfully');