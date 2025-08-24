<?php get_header(); ?>
<!-- Page -->
<section class="page-wrap">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1><?php the_title(); ?></h1>
            <p> <?php get_template_part('includes/section','content');?> </p>
        </div>
    </div>
</div>
</section>

<?php get_footer(); ?>