jQuery(document).ready(function ($) {
  // Lorsqu'une catégorie est cliquée
  $(".actualites__blog-menu li").on("click", function () {
    let category = $(this).data("category");

    console.log("Catégorie sélectionnée :", category); // Afficher la catégorie sélectionnée
    console.log("Données envoyées :", {
      action: "redcat_filter_articles",
      category: category,
    });

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
      },
      success: function (response) {
        // Injecter les articles dans la div des cartes
        $(".actualites__blog-card").html(response);
      },
      error: function (xhr, status, error) {
        console.error("Erreur AJAX :", status, error);
        console.log("Réponse du serveur :", xhr.responseText);
        $(".actualites__blog-card").html(
          "<p>Erreur lors de la récupération des articles.</p>"
        );
      },
    });
  });
});
