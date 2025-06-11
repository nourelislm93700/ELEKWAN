// === DIAPORAMA PHOTO JAVASCRIPT === //

// Variables globales pour le diaporama
let currentSlideIndex = 0;
const slides = document.querySelectorAll(".slide");
const indicators = document.querySelectorAll(".indicator");
const totalSlides = slides.length;

// Fonction pour afficher une slide spécifique
function showSlide(index) {
    // Masquer toutes les slides
    slides.forEach(slide => {
        slide.classList.remove("active");
    });
    
    // Désactiver tous les indicateurs
    indicators.forEach(indicator => {
        indicator.classList.remove("active");
    });
    
    // Afficher la slide courante
    if (slides[index]) {
        slides[index].classList.add("active");
    }
    
    // Activer l'indicateur correspondant
    if (indicators[index]) {
        indicators[index].classList.add("active");
    }
}

// Fonction pour changer de slide (flèches gauche/droite)
function changeSlide(direction) {
    currentSlideIndex += direction;
    
    // Gestion du bouclage
    if (currentSlideIndex >= totalSlides) {
        currentSlideIndex = 0;
    } else if (currentSlideIndex < 0) {
        currentSlideIndex = totalSlides - 1;
    }
    
    showSlide(currentSlideIndex);
}

// Fonction pour aller à une slide spécifique (indicateurs)
function currentSlide(index) {
    currentSlideIndex = index - 1; // Les indicateurs commencent à 1
    showSlide(currentSlideIndex);
}

// Fonction pour le défilement automatique
function autoSlide() {
    currentSlideIndex++;
    if (currentSlideIndex >= totalSlides) {
        currentSlideIndex = 0;
    }
    showSlide(currentSlideIndex);
}

// Initialisation du diaporama
function initSlideshow() {
    // Vérifier que les éléments existent
    if (slides.length === 0) {
        console.log("Aucune slide trouvée");
        return;
    }
    
    // Afficher la première slide
    showSlide(0);
    
    // Démarrer le défilement automatique (optionnel)
    // Décommentez la ligne suivante pour activer le défilement automatique toutes les 5 secondes
    // setInterval(autoSlide, 5000);
}

// Gestion des événements clavier
function handleKeyboard(event) {
    switch(event.key) {
        case "ArrowLeft":
            changeSlide(-1);
            break;
        case "ArrowRight":
            changeSlide(1);
            break;
        case "Escape":
            // Optionnel : arrêter le diaporama avec Escape
            break;
    }
}

// Gestion du swipe sur mobile (optionnel)
let startX = 0;
let endX = 0;

function handleTouchStart(event) {
    startX = event.touches[0].clientX;
}

function handleTouchEnd(event) {
    endX = event.changedTouches[0].clientX;
    handleSwipe();
}

function handleSwipe() {
    const threshold = 50; // Distance minimale pour déclencher un swipe
    const diff = startX - endX;
    
    if (Math.abs(diff) > threshold) {
        if (diff > 0) {
            // Swipe vers la gauche - slide suivante
            changeSlide(1);
        } else {
            // Swipe vers la droite - slide précédente
            changeSlide(-1);
        }
    }
}

// Initialisation quand le DOM est chargé
document.addEventListener("DOMContentLoaded", function() {
    initSlideshow();
    
    // Ajouter les événements clavier
    document.addEventListener("keydown", handleKeyboard);
    
    // Ajouter les événements tactiles pour mobile
    const slideshowContainer = document.querySelector(".slideshow-container");
    if (slideshowContainer) {
        slideshowContainer.addEventListener("touchstart", handleTouchStart, { passive: true });
        slideshowContainer.addEventListener("touchend", handleTouchEnd, { passive: true });
    }
});

// Fonction pour pause/reprendre le défilement automatique au survol (optionnel)
function pauseOnHover() {
    const slideshowContainer = document.querySelector(".slideshow-container");
    let autoSlideInterval;
    
    if (slideshowContainer) {
        slideshowContainer.addEventListener("mouseenter", function() {
            clearInterval(autoSlideInterval);
        });
        
        slideshowContainer.addEventListener("mouseleave", function() {
            // Redémarrer le défilement automatique
            // autoSlideInterval = setInterval(autoSlide, 5000);
        });
    }
}

// Fonction utilitaire pour précharger les images
function preloadImages() {
    const imageUrls = [
        "assets/img/img_d.png",
        "assets/img/img_g.avif",
        "assets/img/img_6.png",
        "assets/img/img_f.jpg"
    ];
    
    imageUrls.forEach(url => {
        const img = new Image();
        img.src = url;
    });
}

// Précharger les images au chargement de la page
window.addEventListener("load", preloadImages);

// Export des fonctions pour utilisation globale
window.changeSlide = changeSlide;
window.currentSlide = currentSlide;

