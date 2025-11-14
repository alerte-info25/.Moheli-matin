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
console.log('%cMOHELI MATIN - Recherche', 'color: #FFD700; font-size: 24px; font-weight: bold;');
console.log('%cPage de résultats de recherche', 'color: #003366; font-size: 14px;');