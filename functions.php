<?php 
//menu header et footer 
function redcat_register_menus(){
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'redcat'),
        'footer' => __('Menu Footer', 'redcat')
    ));
}

//logo du site 
function redcat_custom_logo_setup(){
    add_theme_support('custom-logo',array(
        'height' => 100,
        'width'  => 300,
        'flex-height' => true,
        'flex-width' => true,
    ));
}

//jQuery

function redcat_enqueue_script(){
    //charger le jQuery fournis par WP
    wp_enqueue_script('jquery');

    //charger le fichier js principale du theme
    wp_enqueue_script(
        'redcat-main-js',
        get_template_directory_uri() .'/assets/js/main.js',
        array('jquery'), //jQuery en dependance
        null,
        true //Charge le script dans le footer 
    );

    //charge le fichier css principal du theme
    wp_enqueue_style(
        'redcat-main-css',
        get_template_directory_uri() . '/assets/css/main.css'
    );

    //charger le fichier CSS responsive
    wp_enqueue_style(
        'redcat-responsive-css',
        get_template_directory_uri() . '/assets/css/responsive.css'
    );
}


add_action('after_setup_theme', 'redcat_register_menus');
add_action('after_setup_theme','redcat_custom_logo_setup');
add_action('wp_enqueue_scripts', 'redcat_enqueue_script');

?>