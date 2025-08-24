<?php if (have_posts()): while (have_posts()): the_post(); ?>
<article <?php post_class('post-article'); ?>>

  <!-- Top bar: back + date -->
  <div class="post-topbar">
    <?php
      // Prefer real referrer; if none, fall back to your News page
      $back_url = wp_get_referer() ?: site_url('/news');
    ?>
    <a href="<?php echo esc_url($back_url); ?>" class="btn-back" rel="prev" aria-label="Go back">
      ← Go back
    </a>

    <time class="post-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
      <?php echo esc_html(get_the_date('M j, Y • H:i')); ?>
    </time>
  </div>

  <!-- Title -->
  <header class="post-header">
    <h1 class="post-title"><?php the_title(); ?></h1>
  </header>

  <!-- Categories -->
  <?php
    $cats = get_the_category();
    if (!empty($cats)):
  ?>
    <div class="post-chips">
      <?php foreach ($cats as $cat): ?>
        <a class="chip chip-primary" href="<?php echo esc_url(get_category_link($cat->term_id)); ?>">
          <?php echo esc_html($cat->name); ?>
        </a>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <!-- Featured image (optional) -->
  <?php if (has_post_thumbnail()): ?>
    <figure class="post-featured">
      <?php the_post_thumbnail('large', ['class' => 'post-featured-img', 'alt' => esc_attr(get_the_title())]); ?>
    </figure>
  <?php endif; ?>

  <!-- Content -->
  <div class="post-content">
    <?php the_content(); ?>
  </div>

  <!-- Tags -->
  <?php
    $tags = get_the_tags();
    if ($tags):
  ?>
    <div class="post-chips mt">
      <?php foreach ($tags as $tag): ?>
        <a class="chip chip-success" href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
          #<?php echo esc_html($tag->name); ?>
        </a>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <!-- Author -->
  <section class="post-author">
    <div class="author-avatar">
      <?php echo get_avatar(get_the_author_meta('ID'), 64); ?>
    </div>
    <div class="author-meta">
      <div class="author-name">
        <?php
          $fname = get_the_author_meta('first_name');
          $lname = get_the_author_meta('last_name');
          $display = trim(($fname . ' ' . $lname)) ?: get_the_author();
          echo esc_html($display);
        ?>
      </div>
      <div class="author-bio"><?php echo esc_html(get_the_author_meta('description')); ?></div>
    </div>
  </section>

</article>
<?php endwhile; endif; ?>
