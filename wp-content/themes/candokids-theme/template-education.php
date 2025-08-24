<?php
/*
Template Name: 独自の教育
*/
?>


<?php get_header(); ?>

<section class="page-wrap">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="row">
            <div class="col-lg-8">
                <?php get_template_part('includes/section', 'content'); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>