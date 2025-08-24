<?php if (have_posts()): ?>
    <section class="newsletter-list">
        <ul>
            <?php while (have_posts()):
                the_post(); ?>
                <li>
                    <div class=""> <!-- forces 3 per row, always same height -->
                        <a href="<?php the_permalink(); ?>" class="">
                            <div class="">
                                <!-- Image -->
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
                            </div>
                        </a>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </section>
<?php endif; ?>