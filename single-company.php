<?php get_header(); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <h2><?php the_title(); ?></h2>
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('large'); ?>" class="img-fluid mb-3" alt="<?php the_title(); ?>">
            <?php endif; ?>
            <div><?php the_content(); ?></div>
            <h3>Jobs by This Company</h3>
            <?php
            $company_jobs = new WP_Query(array(
                'post_type' => 'job',
                'posts_per_page' => 5,
                // Add meta query if linking jobs to companies (requires ACF or custom field)
            ));
            if ($company_jobs->have_posts()) :
                while ($company_jobs->have_posts()) : $company_jobs->the_post();
                    get_template_part('template-parts/job-card');
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No jobs available.</p>';
            endif;
            ?>
        </div>
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>