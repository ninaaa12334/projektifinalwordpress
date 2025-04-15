<?php
function jobboard_scripts() {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    wp_enqueue_style('jobboard-style', get_stylesheet_uri());

    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('jobboard-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'jobboard_scripts');

function jobboard_menus() {
    register_nav_menus(array(
        'main-menu' => __('Main Menu')
    ));
}
add_action('init', 'jobboard_menus');

require get_template_directory() . '/inc/custom-post-types.php';

