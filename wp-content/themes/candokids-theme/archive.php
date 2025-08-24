<?php get_header(); ?>

<section class="page-wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1><?php echo single_cat_title(); ?></h1>
                <?php get_template_part('includes/section', 'archive'); ?>

                <?php
                global $wp_query;

                $big = 999999999; // an unlikely integer
                
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $wp_query->max_num_pages,
                    'prev_text' => __('« Previous'),
                    'next_text' => __('Next »'),
                ));
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>