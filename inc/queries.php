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
    return new WP_Query([
        'category_name' => "collaborateurs",
        'posts_per_page' => '2',
        'orderby' => 'date',
        'order' => 'ASC',
    ]);
}

function get_cabinets(){
    return new WP_Query([
        'category_name' => "cabinets",
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'ASC',
    ]);
}



 

?>