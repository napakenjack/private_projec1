<?php
/*
Template Name: クラス
*/
?>


<?php get_header(); ?>

<section class="page-wrap">
    <div class="container">
        <h1 class="has-text-align-center" style="text-align: center;"><?php the_title(); ?></h1>
        <div class="row">
            <div class="col-lg-12">
                <?php get_template_part('includes/section', 'content'); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>