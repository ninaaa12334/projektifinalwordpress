<?php 
function job_board_enqueue_scripts() {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/script.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'job_board_enqueue_scripts');


function job_board_custom_post_types() {
    register_post_type('job', array(
        'labels' => array('name' => __('Jobs'), 'singular_name' => __('Job')),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-briefcase',
    ));

    register_post_type('application', array(
        'labels' => array('name' => __('Applications'), 'singular_name' => __('Application')),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'custom-fields'),
        'menu_icon' => 'dashicons-id',
    ));
}
add_action('init', 'job_board_custom_post_types');



function handle_application_submission() {
    if (!empty($_POST['applicant_name']) && !empty($_POST['applicant_email']) && !empty($_POST['cover_letter'])) {
        $new_post = array(
            'post_title'   => sanitize_text_field($_POST['applicant_name']),
            'post_content' => sanitize_textarea_field($_POST['cover_letter']),
            'post_status'  => 'pending',
            'post_type'    => 'application',
            'meta_input'   => array(
                'job_id'   => intval($_POST['job_id']),
                'email'    => sanitize_email($_POST['applicant_email'])
            )
        );
        wp_insert_post($new_post);
        wp_redirect(home_url('/thank-you/'));
        exit;
    }
}
add_action('admin_post_submit_application', 'handle_application_submission');
add_action('admin_post_nopriv_submit_application', 'handle_application_submission');

?>

