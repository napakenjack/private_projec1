<?php

$is_front = is_front_page();

// Current page (works on pages and posts)
$paged = max(1, get_query_var('paged'), get_query_var('page'));

// Build the query (change category_name as needed)
$newsletter_query = new WP_Query([
    'post_type' => 'post',
    'category_name' => 'news',     // or 'newsletter' if that’s the category you want
    'posts_per_page' => $is_front ? 3 : 999, // Show only 3 on front page, more elsewhere
    'paged' => $paged,
]);


if ($newsletter_query->have_posts()):
    ?>

    <section class="newsletter-list">
        <h2>News</h2>
        <ul>
            <?php while ($newsletter_query->have_posts()):
                $newsletter_query->the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()): ?>
                            <img src="<?php the_post_thumbnail_url('blog-small'); ?>" alt="<?php the_title(); ?>"
                                class="img-fluid mb-2 archive-thumb fixed-img">
                        <?php else: ?>
                            <div class="img-placeholder mb-2"></div>
                        <?php endif; ?>
                        <div class="newsletter-title"><?php the_title(); ?></div>
                        <div class="newsletter-excerpt"><?php the_excerpt(); ?></div>

                        <div class="badges_bg">
                            <?php
                            $categories = get_the_category();
                            foreach ($categories as $category): ?>
                                <span class="badge bg-primary">
                                    <?php echo $category->name; ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    </section>

    <?php if ($is_front): ?>
        <div class="see-all-btn text-center mt-3">
            <a href="<?php echo site_url('/news'); ?>" class="btn btn-primary">
                See all
            </a>
        </div>
    <?php else: ?>

        <?php
        // Pagination for THIS query
        echo paginate_links([
            'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format' => (get_option('permalink_structure') ? 'page/%#%/' : '?paged=%#%'),
            'current' => $paged,
            'total' => $newsletter_query->max_num_pages,
            'prev_text' => __('« Previous'),
            'next_text' => __('Next »'),
            'type' => 'list', // optional: wraps in <ul class="page-numbers">
        ]);
    ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>