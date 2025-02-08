jQuery(document).ready(function ($) {
  let currentPage = 1; // Définition de la page actuelle

  // Lorsqu'une catégorie est cliquée
  $(".actualites__blog-menu li").on("click", function () {
    let category = $(this).data("category");
    currentPage = 1; 

  

    // Ajouter une classe active sur l'élément cliqué
    $(".actualites__blog-menu li").removeClass("filter__active");
    $(this).addClass("filter__active");

    // Requête AJAX
    $.ajax({
      url: ajax_params.ajax_url, // URL définie dans wp_localize_script
      type: "POST",
      data: {
        action: "redcat_filter_articles", // Action définie dans WordPress
        category: category,
        page: currentPage, // On charge depuis la page 1
      },
      success: function (response) {
        // Injecter les articles dans la div des cartes
        $(".actualites__blog-card").html(response);
        $("#loadMoreArticles").attr("data-category", category); // Stocke la catégorie actuelle
        $("#loadMoreArticles").attr("data-page", currentPage + 1); // Prépare la prochaine page
      },
      error: function (xhr, status, error) {
        console.error("Erreur AJAX :", status, error);
        $(".actualites__blog-card").html(
          "<p>Erreur lors de la récupération des articles.</p>"
        );
      },
    });
  });

  $("#loadMoreArticles").on("click", function () {
    let category = $(this).attr("data-category") || "all"; // Catégorie actuelle
    let nextPage = parseInt($(this).attr("data-page"));
  
    $.ajax({
      url: ajax_params.ajax_url,
      type: "POST",
      data: {
        action: "redcat_filter_articles",
        category: category,
        page: nextPage, // Charger la prochaine page
      },
      success: function (response) {
        $(".actualites__blog-card").append(response); // Ajoute au lieu de remplacer
        $("#loadMoreArticles").attr("data-page", nextPage + 1); // Mise à jour de la page suivante
      },
      error: function (xhr, status, error) {
        console.error("Erreur AJAX :", status, error);
      },
    });
  });
  
  // Lancer le chargement initial pour afficher "Tout voir" par défaut
  $(".actualites__blog-menu li[data-category='all']").trigger("click");
});



