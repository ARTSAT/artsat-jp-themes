<?php
/**
 * Template Name: EXHIBITION-INTRODUCTION
 *
 */

get_header(); // Loads the header.php template. ?>

<?php do_atomic( 'before_content' ); // origin_before_content ?>

    <div id="content">

        <?php do_atomic( 'open_content' ); // origin_open_content ?>

        <div id="page-content">
            <div class="hfeed">

                <?php if ( have_posts() ) : ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php do_atomic( 'before_entry' ); // origin_before_entry ?>

                        <div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

                            <?php do_atomic( 'open_entry' ); // origin_open_entry ?>

                            <div id="left-box">
                                <?php
                                if($cfs->get('content_name')) {
                                    $name = array_shift($cfs->get('content_name'));
                                    echo '<img src="' .  get_template_directory_uri() . '/img/title/'.$name.'.gif" class="page-title-img">';
                                } else {
                                    echo '<img src="' .  get_template_directory_uri() . '/img/title/'.strtolower(get_the_title()).'.gif" class="page-title-img">';
                                }
                                ?>

                                <ul>
                                    <ul>
                                        <li><a href="/exhibition/on-orbit"><img src="<?php echo get_template_directory_uri() ?>/img/exhibition/on-orbit.gif" alt="ARTSAT:On-Orbit"></a></li>
                                        <li><a href="/exhibition/artsat-intro-2"><img src="<?php echo get_template_directory_uri() ?>/img/exhibition/intro.gif" alt="ARTSAT:INTRODUCTION"></a></li>
                                        <?php if(is_page('manmade-moon') or is_page('physical-satellite') or is_page('invader')): ?>
                                            <li><a href="/exhibition/artsat-intro-2/manmade-moon"><img src="<?php echo get_template_directory_uri() ?>/img/exhibition/1st.gif" alt="Manmade Moon"></a></li>
                                            <li><a href="/exhibition/artsat-intro-2/physical-satellite"><img src="<?php echo get_template_directory_uri() ?>/img/exhibition/2nd.gif" alt="Physycal Satellite"></a></li>
                                            <li><a href="/exhibition/artsat-intro-2/invader"><img src="<?php echo get_template_directory_uri() ?>/img/exhibition/3rd.gif" alt="ARTSAT1:INVADER"></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </ul>

                            </div>

                            <div id="right-box">
                                <div class="entry-content">
                                    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'origin' ) ); ?>
                                    <?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'origin' ), 'after' => '</p>' ) ); ?>
                                </div><!-- .entry-content -->
                            </div>

                            <?php do_atomic( 'close_entry' ); // origin_close_entry ?>

                        </div><!-- .hentry -->

                        <?php do_atomic( 'after_entry' ); // origin_after_entry ?>

                        <?php do_atomic( 'after_singular' ); // origin_after_singular ?>


                    <?php endwhile; ?>

                <?php endif; ?>

            </div><!-- .hfeed -->
        </div><!-- #page-content -->

        <?php do_atomic( 'close_content' ); // origin_close_content ?>

    </div><!-- #content -->

<?php do_atomic( 'after_content' ); // origin_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>