<?php get_header(); ?>
<div id="jobSlider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="carousel-image-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide1.jpg" class="d-block w-100" alt="Find Your Dream Job">
                <div class="carousel-overlay"></div>
            </div>
            <div class="carousel-caption d-flex flex-column justify-content-center">
                <h1 class="display-4 fw-bold">Find Your Dream Job</h1>
                <p class="lead">Search and apply for jobs easily.</p>
                <a href="<?php echo get_permalink(get_page_by_path('jobs')); ?>" class="btn btn-primary btn-lg mt-3">Search Jobs</a>
            </div>
        </div>
        <div class="carousel-item">
            <div class="carousel-image-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide2.jpg" class="d-block w-100" alt="Top Companies">
                <div class="carousel-overlay"></div>
            </div>
            <div class="carousel-caption d-flex flex-column justify-content-center">
                <h1 class="display-4 fw-bold">Top Companies Hiring</h1>
                <p class="lead">Join leading organizations today.</p>
                <a href="<?php echo get_permalink(get_page_by_path('companies')); ?>" class="btn btn-primary btn-lg mt-3">Browse Companies</a>
            </div>
        </div>
        <div class="carousel-item">
            <div class="carousel-image-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slide3.jpg" class="d-block w-100" alt="Career Growth">
                <div class="carousel-overlay"></div>
            </div>
            <div class="carousel-caption d-flex flex-column justify-content-center">
                <h1 class="display-4 fw-bold">Advance Your Career</h1>
                <p class="lead">Explore opportunities that match your skills.</p>
                <a href="<?php echo get_permalink(get_page_by_path('jobs')); ?>" class="btn btn-primary btn-lg mt-3">Explore Jobs</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#jobSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#jobSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container mt-5">
    <h2>Featured Jobs</h2>
    <div class="row">
        <?php
        $featured_jobs = new WP_Query(array(
            'post_type' => 'job',
            'posts_per_page' => 3,
        ));
        if ($featured_jobs->have_posts()) :
            while ($featured_jobs->have_posts()) : $featured_jobs->the_post();
                get_template_part('template-parts/job-card');
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No featured jobs found.</p>';
        endif;
        ?>
    </div>
</div>
<?php get_footer(); ?>