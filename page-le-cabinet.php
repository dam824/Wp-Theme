<?php
/*
Template Name: Le Cabinet
Description: Template dédié à la page "Le Cabinet"
*/

get_header();

$cabinet_query = get_cabinets();
//var_dump($cabinet_query);

if($cabinet_query->have_posts()) : 
    $posts = $cabinet_query->posts;
    $total_posts = count($posts);
?>


<div class="container">
    <div class="left">
        <?php
        $post = $posts[0];
        setup_postdata($post);
        //var_dump($post);
        ?>
        <h2><?php echo esc_html(get_the_title($post)); ?></h2>
        <?php if (has_post_thumbnail($post->ID)):?>
            <?php echo get_the_post_thumbnail($post->ID, 'large');  ?>
            <?php else : ?>
                <p>Aucunes image disponible</p>
                <?php endif; ?>
        <p><?php echo esc_html(get_the_excerpt($post)); ?></p>
    </div>
    <div class="right">
        <?php
        if($total_posts >1):
            $post = $posts[1];
            setup_postdata($post);
        ?>
        <h2><?php echo esc_html(get_the_title($post)); ?></h2>
        <?php if(has_post_thumbnail($post->ID)) : ?>
            <?php echo get_the_post_thumbnail($post->ID,'large'); ?>
        <?php else : ?>
            <p>Aucune image trouvée</p>
            <?php endif; ?>
        <p><?php echo esc_html(get_the_excerpt($post)); ?></p>
   <?php endif ; ?>
    </div>
    </div>
    <?php
    else: 
        echo '<p> Aucuns articles trouvés</p>';
    
    endif;

        wp_reset_postdata();
 
get_footer(); 

?>
