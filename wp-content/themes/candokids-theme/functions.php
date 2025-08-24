<?php
//--------------------------------------------------------------------------------------------------------------
// load style sheets
function load_css()
{
    // Google Fonts: M PLUS Rounded 1c
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700;800;900&display=swap',
        false
    );

    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.3.7', 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
    wp_enqueue_style('main');
}
add_action('wp_enqueue_scripts', 'load_css');
//--------------------------------------------------------------------------------------------------------------
// load javascript files
function load_js()
{
    wp_enqueue_script('jquery');

    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '5.3.7', true);
    wp_enqueue_script('bootstrap');

    wp_register_script('custom', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);
    wp_enqueue_script('custom');
}
add_action('wp_enqueue_scripts', 'load_js');
//--------------------------------------------------------------------------------------------------------------
// Theme options
add_theme_support('menus');
add_theme_support('post-thumbnails');
//--------------------------------------------------------------------------------------------------------------
// Menus
register_nav_menus(
    array(
        'primary' => 'Primary Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
        'footer-menu' => 'Footer Menu Location',
    )
);
//--------------------------------------------------------------------------------------------------------------
// Custom image sizes
add_image_size('blog-large', 800, 400, false);
add_image_size('blog-small', 300, 200, true);
add_image_size('', 0, 400, false);
//--------------------------------------------------------------------------------------------------------------
function custom_excerpt_length($length)
{
    return 20; // ~20 words
}
add_filter('excerpt_length', 'custom_excerpt_length');
