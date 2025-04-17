<?php get_header(); ?>
<div class="container mt-4">
    <h2>Companies</h2>
    <div class="row">
        <?php
        $companies = new WP_Query(array(
            'post_type' => 'company',
            'posts_per_page' => 9,
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
        ));
        if ($companies->have_posts()) :
            while ($companies->have_posts()) : $companies->the_post(); ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('job-thumbnail'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-company.jpg" class="card-img-top" alt="Default Company">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Company</a>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
            ?>
            <div class="mt-4">
                <?php
                echo paginate_links(array(
                    'total' => $companies->max_num_pages,
                    'current' => max(1, get_query_var('paged')),
                ));
                ?>
            </div>
        <?php else : ?>
            <p>No companies found.</p>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>