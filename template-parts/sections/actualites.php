<section class="home-section-actualites">
    <div class="actualites-titre">
        <h2 class="animated-text">Les dernières actualités du <span>cabinet KLP Partners</span></h2>
    </div>
    <div class="actualites-content">
        <?php
        //requete
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'category_name' => 'actualites',
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $actualites_query = new WP_Query($args);

        //la boucle
        if ($actualites_query->have_posts()) :
            while ($actualites_query->have_posts()) : $actualites_query->the_post();
        ?>
                <div class="actu-container">
                    <h4><?php esc_html(the_title()); ?></h4>
                    <p class="actu-content"><?php echo wp_kses_post(wp_trim_words(get_the_content(), 20, '...')); ?></p>
                    <p class="actu-date"><?php echo esc_html(get_the_date('d/m/Y')); ?> | <a href="<?php echo esc_url(get_permalink()); ?>">Lire la suite</a></p>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
    <!-- Bouton en dehors de la boucle center -->
    <div class="actualite-boutton">
        <button>
            TOUTE NOS ACTUALITES
            <span class="svg-circle">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M3.55975 1.05512L19.0553 1.0549M19.0553 1.0549L19.0553 16.3301M19.0553 1.0549L1.05504 19.0552" stroke="#C9171E" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
        </button>
    </div>
</section>