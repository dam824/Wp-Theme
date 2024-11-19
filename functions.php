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
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width'  => 300,
        'flex-height' => true,
        'flex-width' => true,
    ));
}

// Enqueue scripts et styles du thème
function redcat_enqueue_script(){
    echo '<!-- Chargement des scripts Redcat -->';
    
    // Charger le jQuery fourni par WordPress
    wp_enqueue_script('jquery');

    // Charger le fichier JavaScript principal du thème
    wp_enqueue_script(
        'redcat-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'), // jQuery en dépendance
        null,
        true // Charge le script dans le footer
    );

    // Charger le fichier CSS principal du thème
    wp_enqueue_style(
        'redcat-main-css',
        get_template_directory_uri() . '/assets/css/main.css'
    );

    // Charger le fichier CSS responsive
    wp_enqueue_style(
        'redcat-responsive-css',
        get_template_directory_uri() . '/assets/css/responsive.css'
    );

    // Charger les fonts Adobe
    wp_enqueue_style(
        'redcat-typekit',
        'https://use.typekit.net/mid3xpm.css'
    );
}

// Supprimer jQuery Migrate en frontend
function redcat_remove_jquery_migrate($scripts) {
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
}

add_action('wp_enqueue_scripts', 'redcat_enqueue_script', 10);
add_action('wp_default_scripts', 'redcat_remove_jquery_migrate'); // Supprime jquery-migrate en frontend
add_action('after_setup_theme', 'redcat_register_menus');
add_action('after_setup_theme', 'redcat_custom_logo_setup');

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

?>
