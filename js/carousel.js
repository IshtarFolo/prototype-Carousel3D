    /*======================================
     * Controle de la rotation du carousel *
     ======================================*/
     let carousel = document.querySelector('.carousel'); // Le carousel au complet
     let cartes = document.querySelectorAll('.flip-card'); // Les cartes du carousel
     const nextButton = document.querySelector('.next'); // Le bouton suivant
     const prevButton = document.querySelector('.prev'); // Le bouton précédent
     let currentAngle = 0; // L'angle de rotation initial des cartes
 
     // Si on clique sur le bouton suivant...
     nextButton.addEventListener('click', () => {
         // L'angle de rotation des cartes change en augmnentant de 45 degrés (selon le calcul en commentaire en ligne 100 du CSS)
         currentAngle += 45; 
         updateImages();
     });
 
     // Si on clique sur le bouton précédent...
     prevButton.addEventListener('click', () => {
         // L'angle de rotation des cartes change en baissant de 45 degrés (selon le calcul en commentaire en ligne 100 du CSS)
         currentAngle -= 45; 
         updateImages();
     });
 
     function updateImages() {
         cartes.forEach((carte, index) => {
         carte.style.transform = `rotateY(${(index * 45) + currentAngle}deg) translateZ(253px)`;
     });
     }
 
     /*============================= 
     * Contrôle du flip des cartes * 
     ==============================*/
     let front = document.querySelectorAll('.front-flip'); // Le devant des cartes
     let inner = document.querySelectorAll('.inner-flip'); // Le positionnement de l'avant et de l'arrière des cartes 
     let back = document.querySelectorAll('.flip-card-back'); // Le dos des cartes
 
     // Pour chaque carte...
     inner.forEach((carte, index) => {
         // L'état "flipped" est faux
         let isFlipped = false;
 
     // Si la carte est cliquée...
     carte.addEventListener('click', () => {
         // L'état retourné de la carte
         if (!isFlipped) 
         {
             // La carte fait une rotation de 180 degrés et est agrandie de 0.2
             carte.style.transform = 'rotateY(180deg) scale(1.2)';
             // L'état "flipped" est vrai
             isFlipped = true;
         } 
         // L'état initial de la carte
         else
         {
             // La carte revient à sa position initiale (on enlève tout changement JS au style)
             carte.style.transform = '';
             // L'état "flipped" est faux
             isFlipped = false;
         }
     });
 });     
 
 
 /*===========================================================================
  * La forme suit la souris en 3D (comme une carte qui bouge sur un plan 3D) *
 =============================================================================*/
// On detecte quelle carte est devant l'utilisateur
// let card = document.querySelector('.flip-card'); // Les cartes
// let cardRect = card.getBoundingClientRect();

// // On detecte la position initiale de la carte
// let cardX = cardRect.left + cardRect.width / 2;
// let cardY = cardRect.top + cardRect.height / 2;

// // On detecte la position de la souris quand elle entre dans la carte
// card.addEventListener('mouseenter', () => {
//     cardRect = card.getBoundingClientRect();
//     cardX = cardRect.left + cardRect.width / 2;
//     cardY = cardRect.top + cardRect.height / 2;
// });

// // On detecte la position de la souris quand elle bouge sur la carte
// card.addEventListener('mousemove', (e) => {
//     // On calcule la position de la souris
//     let mouseX = e.clientX;
//     let mouseY = e.clientY;

//     // On calcule la distance entre la souris et la carte
//     let diffX = mouseX - cardX;
//     let diffY = mouseY - cardY;

//     // On calcule l'angle de rotation de la carte
//     let angleX = diffY / 10;
//     let angleY = diffX / 10;

//     // On applique la rotation à la carte
//     card.style.transform = `rotateX(${-angleX}deg) rotateY(${angleY}deg) scale(1.2)`;
// });

// // On remet la carte à sa position initiale quand la souris quitte la carte
// card.addEventListener('mouseleave', () => {
//     card.style.transform = 'rotateX(0deg) rotateY(0deg) translateZ(253px) scale(1.2)';
// });


