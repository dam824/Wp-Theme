<?php

// Gestion du filtre AJAX des articles
function redcat_filter_articles() {
    error_log('AJAX action appelée');
    $category = sanitize_text_field($_POST['category']); // Catégorie sélectionnée
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = 6; // Nombre d'articles affichés par page

    $args = [
        'posts_per_page' => $posts_per_page,
        'paged' => $page,
        'orderby' => 'date',
        'order' => 'DESC',
    ];

    // Si une catégorie spécifique est sélectionnée
    if ($category !== 'all') {
        $args['category_name'] = $category;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <div class="card">
                <h3><?php the_title(); ?></h3>
                <p><?php echo esc_html(wp_trim_words(get_the_content(), 15, '...')); ?></p>
                <a href="<?php the_permalink(); ?>">Lire la suite</a>
            </div>
            <?php
        }
    } else {
        echo '<p>Aucun article trouvé.</p>';
    }

    wp_die(); // Terminer proprement la requête AJAX
}

// Actions AJAX pour utilisateurs connectés et non-connectés
add_action('wp_ajax_redcat_filter_articles', 'redcat_filter_articles');
add_action('wp_ajax_nopriv_redcat_filter_articles', 'redcat_filter_articles');

?>
