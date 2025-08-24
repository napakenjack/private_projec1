<?php
/*
Template Name: 小学生クラス
*/
?>


<?php get_header(); ?>

<section class="page-wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1><?php the_title(); ?></h1>
                <?php get_template_part('includes/section', 'content'); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>