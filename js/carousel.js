/*======================================
 * Controle de la rotation du carousel *
 ======================================*/
 let carousel = document.querySelector('.carousel'); // Le carousel au complet
 let cartes = document.querySelectorAll('.flip-card'); // Les cartes du carousel
 const nextButton = document.querySelector('.next1'); // Le bouton suivant
 const prevButton = document.querySelector('.prev1'); // Le bouton précédent
 let currentAngle = 0; // L'angle de rotation initial des cartes
 
 // Si on clique sur le bouton suivant...
 nextButton.addEventListener('click', () => {
     // L'angle de rotation des cartes change en augmentant de 45 degrés (selon le calcul en commentaire en ligne 100 du CSS)
     currentAngle -= 45; 
     resetFlippedCards();
     updateImages();
 });
 
 // Si on clique sur le bouton précédent...
 prevButton.addEventListener('click', () => {
     // L'angle de rotation des cartes change en baissant de 45 degrés (selon le calcul en commentaire en ligne 100 du CSS)
     currentAngle += 45; 
     resetFlippedCards();
     updateImages();
 });
 
 function updateImages() {
    cartes.forEach((carte, index) => {
        carte.style.transform = `rotateY(${(index * 45) + currentAngle}deg) translateZ(253px)`;
        // Add the 'nonClickable' class to all cards
        carte.classList.add('nonClickable');
    });

    // Calculate the index of the card that is in front
    let frontCardIndex = Math.round(currentAngle / 45) % cartes.length;
    if (frontCardIndex < 0) {
        frontCardIndex += cartes.length;
    }

    // Remove the 'nonClickable' class from the card that is in front
    cartes[frontCardIndex].classList.remove('nonClickable');
}
 
 function resetFlippedCards() {
     inner.forEach((carte) => {
         // Vérifie si la carte est retournée
         if (carte.classList.contains('flipped')) {
             // La carte revient à sa position initiale (on enlève tout changement JS au style)
             carte.style.transform = '';
             // Retire la classe 'flipped' pour indiquer que la carte est revenue à sa position initiale
             carte.classList.remove('flipped');
         }
     });
 }
 
 /*============================= 
  * Contrôle du flip des cartes * 
  ==============================*/
 let inner = document.querySelectorAll('.inner-flip'); // Le positionnement de l'avant et de l'arrière des cartes 
 
 // Pour chaque carte...
 inner.forEach((carte) => {
     // Si la carte est cliquée...
     carte.addEventListener('click', () => {
         // Vérifie si la carte est cliquable
         if (!carte.classList.contains('nonClickable')) {
             // Vérifie si la carte n'est pas déjà retournée
             if (!carte.classList.contains('flipped')) {
                 // La carte fait une rotation de 180 degrés et est agrandie de 0.2
                 carte.style.transform = 'rotateY(180deg) scale(1.2)';
                 // Ajoute la classe 'flipped' pour indiquer que la carte est retournée
                 carte.classList.add('flipped');
             } else {
                 // La carte revient à sa position initiale (on enlève tout changement JS au style)
                 carte.style.transform = '';
                 // Retire la classe 'flipped' pour indiquer que la carte est revenue à sa position initiale
                 carte.classList.remove('flipped');
             }
         }
     });
 });
 
 // Initial call to set the correct classes on page load
 updateImages();