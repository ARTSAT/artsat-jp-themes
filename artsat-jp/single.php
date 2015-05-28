<?php get_header(); ?>
<?php get_sidebar(); ?>    

<div id="contents">
<div class="page archive">

<?php if (have_posts()) : ?>

<?php //ヘッダー --------------------------------------------------------//
if (in_category(4)) { ?>
<div class="page-header-img"><img src="<?php bloginfo('template_url'); ?>/assets/imgs/content-header-pbl.jpg" width="700" /></div>
<?php }elseif(in_category(3)){ ?>
<div class="page-header-img"><img src="<?php bloginfo('template_url'); ?>/assets/imgs/content-header-news.gif" width="700" /></div>
<?php }?>


<?php while (have_posts()) : the_post(); ?>

<?php //NEWアーカイブ -----------------------------------------------------------//
if(in_category(3)):?>
<div class="page-inner news">
<h3 class="archive"><img src="<?php bloginfo('template_url'); ?>/assets/imgs/bt-arrow.png" width="30" class="bt" /><?php the_title(); ?></h3>
<p class="date"><?php the_time('Y.m.d') ?></p>
<div class="entry">
<?php the_content() ?>
</div>
</div>

<?php endif; ?>
<?php endwhile; ?>

<div class="navigation">
<div class="left"><?php next_posts_link('&laquo; Older') ?></div>
<div class="right"><?php previous_posts_link('Newer &raquo;') ?></div>
</div>

<?php else : ?>

<h2 class="center">Not Found</h2>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<?php endif; ?>

</div>
</div>

</div><!-- /content -->

<?php get_footer(); ?>
