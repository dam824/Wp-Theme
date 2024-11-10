<section class="home-section-actualites">
    <div class="actualites-titre">
        <h2>Les dernières actualités du <span>cabinet KLP Partners</span></h2>
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
      if($actualites_query ->have_posts()) :
        while($actualites_query->have_posts()) : $actualites_query->the_post(); 
        ?>
        <div class="actu-container">
            <h4><?php esc_html(the_title()); ?></h4>
            <p><?php echo wp_kses_post( wp_trim_words(get_the_content(), 20, '...')); ?></p>
            <p><?php echo esc_html(get_the_date('d/m/Y')) ; ?></p>
        </div>
        <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>
    </div>
    <div class="actualite-boutton">
        <button>TOUTE NOS ACTUALITES</button>
    </div>
</section>