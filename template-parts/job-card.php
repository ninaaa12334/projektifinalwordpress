<div class="col-md-4 mb-4">
    <div class="card h-100">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('job-thumbnail'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-job.jpg" class="card-img-top" alt="Default Job">
        <?php endif; ?>
        <div class="card-body">
            <h5 class="card-title"><?php the_title(); ?></h5>
            <p class="card-text"><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Job</a>
        </div>
    </div>
</div>