<?php 

get_header();

// Récupérer les catégories de l'article en cours
$categories = get_the_category();
$category_slug = $categories[0]->slug; // Récupérer le slug de la première catégorie

// Construire le chemin du template spécifique en fonction de la catégorie
$template_file = locate_template("partials/single-{$category_slug}.php");

// Inclure le fichier correspondant, ou afficher un fallback générique
if ($template_file) :
    include($template_file); // Inclure le fichier spécifique
else :
    ?>
    <div class="generic-single">
        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>
    </div>
    <?php
endif;

get_footer();
?>
