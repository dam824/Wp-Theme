jQuery(document).ready(function ($) {
  console.log('jquery ready')
  // Lorsque l'on clique sur le burger menu, on toggle l'affichage du menu mobile
  $(".burger-menu").click(function () {
    $(".mobile-menu-overlay").toggleClass("active");
    $(this).toggleClass("active"); // Toggle la classe active pour le burger menu
    
  });

  // Pour fermer le menu en cliquant en dehors (facultatif)
  $(".mobile-menu-overlay").click(function (event) {
    if (!$(event.target).closest(".mobile-navigation").length) {
      $(".mobile-menu-overlay").removeClass("active");
      $(".burger-menu").removeClass("active"); // Enlève aussi la classe active du burger menu
    }
  });

   // Gestion du sous-menu mobile au clic
  $('.mobile-nav-menu .menu-item-has-children > a').click(function(e) {
    e.preventDefault(); // Empêche la navigation directe
    $(this).toggleClass('active'); // Toggle la classe active pour changer le chevron
    $(this).parent().find('.sub-menu').stop(true, true).slideToggle(300); // Affiche ou masque le sous-menu
  });

   //test caorousel 
   
   let currentSlide = 0;
  

   function showSlide(slideIndex) {
       // Changer l'indicateur actif
       $('.indicator').removeClass('active');
       $('.indicator[data-slide="' + slideIndex + '"]').addClass('active');

       // Changer le titre actif
       $('.carousel-slides-title h3').removeClass('active');
       $('.carousel-slides-title h3').eq(slideIndex).addClass('active');

       // Afficher le contenu correspondant
       $('.about-red-text').removeClass('active');
       $('.about-red-text[data-slide="' + slideIndex + '"]').addClass('active');
   }

   // Gestion des clics sur les indicateurs
   $('.indicator').click(function() {
       let slideIndex = $(this).data('slide');
       currentSlide = slideIndex;
       showSlide(currentSlide);
   });

   // Navigation automatique (facultatif)
   setInterval(function() {
       currentSlide = (currentSlide + 1) % 3; // Passe au slide suivant
       showSlide(currentSlide);
   }, 5000); // 5 secondes entre chaque slide
  
 
   

});
