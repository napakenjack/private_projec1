<?php get_header(); ?>

<!-- Category news -->
<section class="page-wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1><?php echo single_cat_title(); ?></h1>
                <div class="row g-4"> <!-- Use Bootstrap grid spacing -->
                    <?php get_template_part('includes/section', 'archive'); ?>
                </div>


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