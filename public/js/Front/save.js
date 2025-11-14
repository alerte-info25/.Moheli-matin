// Header scroll effect
const mainHeader = document.getElementById('mainHeader');

window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        mainHeader.classList.add('scrolled');
    } else {
        mainHeader.classList.remove('scrolled');
    }
});

// Loading Screen
const loadingScreen = document.getElementById('loadingScreen');
window.addEventListener('load', () => {
    setTimeout(() => {
        loadingScreen.classList.add('hidden');
    }, 2000);
});

// Console welcome message
console.log('%cMOHELI MATIN - Mes articles sauvegardés', 'color: #28a745; font-size: 24px; font-weight: bold;');
console.log('%cPage de gestion des articles sauvegardés', 'color: #003366; font-size: 14px;');