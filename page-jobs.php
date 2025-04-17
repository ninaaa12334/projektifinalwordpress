<?php
/*
Template Name: Job Listings
*/
get_header(); ?>
<div class="container mt-4">
    <h2>Job Listings</h2>
    <form method="get" class="job-search-form mb-4">
        <div class="input-group">
            <input type="text" name="s" class="form-control" placeholder="Search jobs..." value="<?php echo get_search_query(); ?>">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
        <div class="mt-3">
            <label for="job-category" class="form-label">Filter by Category:</label>
            <?php
            wp_dropdown_categories(array(
                'taxonomy' => 'job_category',
                'name' => 'job_category',
                'class' => 'form-select',
                'show_option_all' => 'All Categories',
                'value_field' => 'term_id',
            ));
            ?>
        </div>
    </form>
    <div class="row">
        <?php
        $args = array(
            'post_type' => 'job',
            'posts_per_page' => 9,
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
        );
        if (isset($_GET['job_category']) && $_GET['job_category'] > 0) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'job_category',
                    'field' => 'term_id',
                    'terms' => intval($_GET['job_category']),
                ),
            );
        }
        if (get_search_query()) {
            $args['s'] = get_search_query();
        }
        $jobs = new WP_Query($args);
        if ($jobs->have_posts()) :
            while ($jobs->have_posts()) : $jobs->the_post();
                get_template_part('template-parts/job-card');
            endwhile;
            wp_reset_postdata();
            ?>
            <div class="mt-4">
                <?php
                echo paginate_links(array(
                    'total' => $jobs->max_num_pages,
                    'current' => max(1, get_query_var('paged')),
                ));
                ?>
            </div>
        <?php else : ?>
            <p>No jobs found.</p>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>