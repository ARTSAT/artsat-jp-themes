<?php
/*
Template Name: about
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="contents">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="page">
<div class="page-header-img"><?php echo c2c_get_custom('page-header-img','','','','',''); ?></div>
<div class="page-inner">
<h2><?php the_title(); ?></h2>
<?php the_content(); ?>
</div>
</div>

<?php endwhile; endif; ?>
</div><!-- /content -->


<?php get_footer(); ?>