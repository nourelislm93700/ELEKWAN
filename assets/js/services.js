
 function switchToBleu() {

      // Change toutes les couleurs orange vers bleu
      const allElements = document.querySelectorAll('*');

      allElements.forEach(el => {
        const color = window.getComputedStyle(el).color;

        if (color === 'rgb(255, 102, 0)') {
          el.style.color = '#00bfff';
        }

        const bg = window.getComputedStyle(el).backgroundColor;
        if (bg === 'rgb(255, 102, 0)') {
          el.style.backgroundColor = '#00bfff';
        }

       
      });
    }

 function switchToOrange() {

      const allElements = document.querySelectorAll('*');
      allElements.forEach(el => {
        const color = window.getComputedStyle(el).color;
        if (color === 'rgb(0, 191, 255)') el.style.color = '#ff6600';

        const bg = window.getComputedStyle(el).backgroundColor;
        if (bg === 'rgb(0, 191, 255)') el.style.backgroundColor = '#ff6600';

      
      });
    }