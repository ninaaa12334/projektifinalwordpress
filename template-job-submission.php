<?php
/*
Template Name: Job Submission
*/
get_header();

if (!is_user_logged_in()) {
    echo '<div class="container mt-4"><p>Please <a href="' . wp_login_url(get_permalink()) . '">log in</a> to submit a job.</p></div>';
} else {
    if (isset($_POST['submit_job'])) {
        $job_title = sanitize_text_field($_POST['job_title']);
        $job_content = sanitize_textarea_field($_POST['job_content']);
        $job_category = intval($_POST['job_category']);
        
        $new_job = array(
            'post_title' => $job_title,
            'post_content' => $job_content,
            'post_type' => 'job',
            'post_status' => 'pending', // Requires admin approval
            'tax_input' => array(
                'job_category' => array($job_category),
            ),
        );
        
        $job_id = wp_insert_post($new_job);
        if ($job_id) {
            echo '<div class="container mt-4"><div class="alert alert-success">Job submitted for review!</div></div>';
        } else {
            echo '<div class="container mt-4"><div class="alert alert-danger">Error submitting job.</div></div>';
        }
    }
?>
<div class="container mt-4">
    <h2>Submit a Job</h2>
    <form id="job-submission-form" method="post" class="job-search-form">
        <div class="mb-3">
            <label for="job-title" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="job-title" name="job_title" required>
        </div>
        <div class="mb-3">
            <label for="job-content" class="form-label">Job Description</label>
            <textarea class="form-control" id="job-content" name="job_content" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="job-category" class="form-label">Job Category</label>
            <?php
            wp_dropdown_categories(array(
                'taxonomy' => 'job_category',
                'name' => 'job_category',
                'class' => 'form-select',
                'show_option_none' => 'Select Category',
            ));
            ?>
        </div>
        <button type="submit" name="submit_job" class="btn btn-primary">Submit Job</button>
    </form>
</div>
<?php } get_footer(); ?>