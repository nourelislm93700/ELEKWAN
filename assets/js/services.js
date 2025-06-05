function switchToBleu() {
  // Change toutes les couleurs orange vers bleu
  const allElements = document.querySelectorAll('*');

  allElements.forEach(el => {
    const style = window.getComputedStyle(el);

    // Texte
    if (style.color === 'rgb(255, 102, 0)') {
      el.style.color = '#00bfff';
    }

    // Fond
    if (style.backgroundColor === 'rgb(255, 102, 0)') {
      el.style.backgroundColor = '#00bfff';
    }

    // Bordure
    if (style.borderColor === 'rgb(255, 102, 0)') {
      el.style.borderColor = '#00bfff';
    }
  });
}

function switchToOrange() {
  const allElements = document.querySelectorAll('*');

  allElements.forEach(el => {
    const style = window.getComputedStyle(el);

    // Texte
    if (style.color === 'rgb(0, 191, 255)') {
      el.style.color = '#ff6600';
    }

    // Fond
    if (style.backgroundColor === 'rgb(0, 191, 255)') {
      el.style.backgroundColor = '#ff6600';
    }

    // Bordure
    if (style.borderColor === 'rgb(0, 191, 255)') {
      el.style.borderColor = '#ff6600';
    }
  });
}
