<?php
function jobboard_custom_post_types() {
    // Jobs Post Type
    register_post_type('job', array(
        'labels' => array(
            'name' => __('Jobs'),
            'singular_name' => __('Job'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'jobs'),
        'menu_icon' => 'dashicons-briefcase',
    ));

    // Companies Post Type
    register_post_type('company', array(
        'labels' => array(
            'name' => __('Companies'),
            'singular_name' => __('Company'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'companies'),
        'menu_icon' => 'dashicons-building',
    ));

    // Job Category Taxonomy
    register_taxonomy('job_category', 'job', array(
        'labels' => array(
            'name' => __('Job Categories'),
            'singular_name' => __('Job Category'),
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'rewrite' => array('slug' => 'job-category'),
    ));
}
add_action('init', 'jobboard_custom_post_types');