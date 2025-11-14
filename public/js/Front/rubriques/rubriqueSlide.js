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