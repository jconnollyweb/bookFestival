<?php
function bookfestival_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'main-menu' => __( 'Main Menu', 'bookfestival' ),
    ));
}
add_action( 'after_setup_theme', 'bookfestival_setup' );

function bookfestival_enqueue_styles() {
    wp_enqueue_style( 'bookfestival-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'bookfestival_enqueue_styles' );


function enqueue_custom_scripts() {
    // Enqueue the countdown timer script
    wp_enqueue_script(
        'countdown-timer',
        get_template_directory_uri() . '/js/countdown-timer.js',
        [],
        null,
        true
    );
   
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function my_custom_post_type() {
    register_post_type('authors',
        array(
            'labels' => array(
                'name' => 'Authors',
                'singular_name' => 'Author'
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'),
            'rewrite' => array('slug' => 'authors'),
        )
    );
}
add_action('init', 'my_custom_post_type');

function register_my_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'your-theme-textdomain'),
    ));
}
add_action('init', 'register_my_menus');


