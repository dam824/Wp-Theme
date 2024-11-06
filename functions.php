<?php 

function redcat_register_menus(){
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'redcat'),
        'footer' => __('Menu Footer', 'redcat')
    ));
}

function redcat_custom_logo_setup(){
    add_theme_support('custom-logo',array(
        'height' => 100,
        'width'  => 300,
        'flex-height' => true,
        'flex-width' => true,
    ));
}

add_action('after_setup_theme', 'redcat_register_menus');
add_action('after_setup_theme','redcat_custom_logo_setup');

?>