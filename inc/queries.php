<?php


//requete pour recup data le cabinet 
function get_data_le_cabinet($slug ='le-cabinet'){
    $args = array(
        'post_type' => 'page',
        'name' => $slug,
    );

    $query = new WP_Query($args);

    if($query ->have_posts()){
        $query ->the_post();
        $sections = array(
            'title' => get_the_title(),
            'content' => get_the_content(),
            'featured_image' => get_the_post_thumbnail_url(),
        );

        wp_reset_postdata();
        return $sections;
       
    };
      
    return false;
} 



 

function get_collaborateurs(){
    $query = new WP_Query([
        'category_name' => "collaborateurs",
        'posts_per_page' => '2',
        'orderby' => 'date',
        'order' => 'ASC',
    ]);

    $collaborateurs = [];
    if($query->have_posts()){
        while($query->have_posts()){
            $query->the_post();

            $collaborateurs [] = [
                'title' => get_the_title(),
                'content' => get_the_content(),
                'featured_image' => get_the_post_thumbnail_url(get_the_ID(), 'medium'),
                'linkedin'=> get_post_meta(get_the_ID(). 'linkedin', true),
                'mail' => get_post_meta(get_the_ID(). 'mail', true),
                'téléphone' => get_post_meta(get_the_ID(), 'téléphone', true),
                'fonction' => get_post_meta(get_the_ID(), 'fonction', true),
            ];
           
        }
        wp_reset_postdata();
    }
    return $collaborateurs;
}

function get_cabinets() {
    $query = new WP_Query([
        'category_name' => 'cabinets', // Nom de la catégorie
        'posts_per_page' => -1, // Récupérer tous les posts
        'orderby' => 'date',
        'order' => 'ASC',
    ]);

    $cabinets = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $cabinets[] = [
                'title' => get_the_title(),
                'content' => get_the_content(),
                'featured_image' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
                'adresse' => get_post_meta(get_the_ID(), 'Adresse', true),
                'horaires' => get_post_meta(get_the_ID(), 'horaires', true),
                'mail' => get_post_meta(get_the_ID(), 'mail', true),
                'telephone' => get_post_meta(get_the_ID(), 'téléphone', true),
            ];
        }
        wp_reset_postdata(); // Réinitialiser les données après la boucle
    }

    return $cabinets;
}

function get_articles(){
  $args = [
    'category_name' => 'contentieux, formation, conseil',
    'posts_per_page'  => -1,
    'orderby' => 'date',
    'order'  => 'ASC',   
  ];

  return new WP_Query($args);
}

function get_articles_by_categories(){
    $args = [
        'category_name' => 'contentieux, formation, conseil',
        'posts_per_page' => -1,
        'orderby'    => 'date',
        'order'    => 'DESC',
    ];
    $query = new WP_Query($args);

    return $query->posts;
}

function get_categories_data(){
    $args = [
        'taxonomy' => 'category',
        'orderby' => 'name',
        'order'  => 'ASC',
        'hide_empty' => true, 
        'slug' => ['contentieux', 'formation', 'conseil'],
    ];

    return get_categories($args);
}



 

?>