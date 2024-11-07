jQuery(document).ready(function ($) {
  console.log("jquery ready");
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

});
