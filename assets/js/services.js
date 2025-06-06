// theme.js - Gestion des thèmes de couleur

/**
 * Change le thème en bleu
 */
function switchToBleu() {
  document.body.classList.remove('theme-orange');
  document.body.classList.add('theme-blue');
  
  // Sauvegarde la préférence de l'utilisateur (optionnel)
  localStorage.setItem('theme', 'blue');
}

/**
 * Change le thème en orange
 */
function switchToOrange() {
  document.body.classList.remove('theme-blue');
  document.body.classList.add('theme-orange');
  
  // Sauvegarde la préférence de l'utilisateur (optionnel)
  localStorage.setItem('theme', 'orange');
}

/**
 * Initialise le thème au chargement de la page
 */
document.addEventListener('DOMContentLoaded', function() {
  // Récupère le thème sauvegardé ou utilise orange par défaut
  const savedTheme = localStorage.getItem('theme') || 'orange';
  
  if (savedTheme === 'blue') {
    switchToBleu();
  } else {
    switchToOrange();
  }
});
