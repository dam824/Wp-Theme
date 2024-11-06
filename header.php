<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="header-container">
            <!-- logo -->
            <div class="site-logo">
                <?php if(function_exists('the_custom_logo')): ?>
                    <?php the_custom_logo();?>
                <?php else : ?>
                        <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="logo">
                </a>
               <?php endif; ?>
                
            </div>
            <!-- Menu de navigation -->
            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary', //emplacement de menu
                    'menu_class' => 'nav-menu', //class css pour le menu
                    'container' => 'false' // pas de container supp
                ));
                ?>
            </nav>
        </div>
    </header>