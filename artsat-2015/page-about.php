<?php
/*
Template Name: ABOUT
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <div id="page-content">
            <div id="left-box">
                <?php
                if($cfs->get('content_name')) {
                    $name = array_shift($cfs->get('content_name'));
                    echo '<img src="' .  get_template_directory_uri() . '/img/title/'.$name.'.gif" class="page-title-img">';
                } else {
                    echo '<img src="' .  get_template_directory_uri() . '/img/title/'.strtolower(get_the_title()).'.gif" class="page-title-img">';
                }
                ?>
            </div>
            <div id="right-box">
                <div class="entry-content">
                    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'origin' ) ); ?>
                </div>

            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>