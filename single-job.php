<?php get_header(); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <h2><?php the_title(); ?></h2>
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('large'); ?>" class="img-fluid mb-3" alt="<?php the_title(); ?>">
            <?php endif; ?>
            <div><?php the_content(); ?></div>
            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</button>
        </div>
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>

    <!-- Application Modal -->
    <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="applyModalLabel">Apply for <?php the_title(); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="job-application-form" method="post">
                        <div class="mb-3">
                            <label for="applicant-name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="applicant-name" name="applicant_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="applicant-email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="applicant-email" name="applicant_email" required>
                        </div>
                        <div class="mb-3">
                            <label for="applicant-message" class="form-label">Cover Letter</label>
                            <textarea class="form-control" id="applicant-message" name="applicant_message" rows="4"></textarea>
                        </div>
                        <button type="submit" name="submit_application" class="btn btn-primary">Submit Application</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submit_application'])) {
    $name = sanitize_text_field($_POST['applicant_name']);
    $email = sanitize_email($_POST['applicant_email']);
    $message = sanitize_textarea_field($_POST['applicant_message']);
    $job_title = get_the_title();
    
    $to = 'admin@yourdomain.com'; // Replace with job poster’s email
    $subject = 'Job Application: ' . $job_title;
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    wp_mail($to, $subject, $body);
    
    echo '<div class="alert alert-success mt-3">Application submitted!</div>';
}
get_footer();