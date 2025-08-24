<?php get_header(); ?>
<!-- Front page -->
<section class="page-wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- <h1><?php the_title(); ?></h1> -->
                <?php get_template_part('includes/section', 'content'); ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">                
                <?php get_template_part('includes/section', 'newsletter'); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>