<?php
// Enqueue scripts and styles
function jobboard_scripts() {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    wp_enqueue_style('jobboard-style', get_stylesheet_uri());
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('jobboard-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'jobboard_scripts');

// Register menus
function jobboard_menus() {
    register_nav_menus(array(
        'main-menu' => __('Main Menu'),
    ));
}
add_action('init', 'jobboard_menus');

// Theme setup
function jobboard_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('job-thumbnail', 400, 300, true); // For job cards
    add_image_size('slider-image', 1200, 400, true); // For slider
}
add_action('after_setup_theme', 'jobboard_setup');

// Register sidebar
function jobboard_widgets_init() {
    register_sidebar(array(
        'name' => __('Job Board Sidebar', 'jobboard'),
        'id' => 'job-sidebar',
        'before_widget' => '<div class="card mb-4">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="card-header">',
        'after_title' => '</h5>',
    ));
}
add_action('widgets_init', 'jobboard_widgets_init');






