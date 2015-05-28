<?php
/**
 * Template Name: EXHIBITION-DETAIL
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

                                    <?php
                                    $tmp = get_template_directory_uri();
                                    $parent_slug = get_page_uri($post->post_parent);
                                    if (
                                        $parent_slug == 'exhibition/artsat-intro/manmade-moon' ||
                                        $parent_slug == 'exhibition/artsat-intro/physical-satellite' ||
                                        $parent_slug == 'exhibition/artsat-intro/invader'
                                    ) {
                                        echo '<li><a href="/exhibition/artsat-intro/manmade-moon"><img src="'.$tmp.'/img/exhibition/1st.gif" alt="Manmade Moon"></a></li>';
                                        echo '<li><a href="/exhibition/artsat-intro/physical-satellite"><img src="'.$tmp.'/img/exhibition/2nd.gif" alt="Physycal Satellite"></a></li>';
                                        echo '<li><a href="/exhibition/artsat-intro/invader"><img src="'.$tmp.'/img/exhibition/3rd.gif" alt="ARTSAT1:INVADER"></a></li>';
                                    }
                                    ?>

                                </ul>
                            </ul>

                        </div>

                        <div id="right-box">
                            <div class="entry-content">



                                <?php if(is_parent_slug() == 'on-orbit'){ ?>
                                    <h2><?php the_title(); ?></h2>
                                <?php } else { ?>
                                    <img src="<?php echo $cfs->get('ttl_img') ?>" alt="">
                                <?php } ?>



                                <?php if($cfs->get('kv_img')){ ?>
                                    <p class="sub-ttl" style="text-align:center;"><img src="<?php echo $cfs->get('kv_img') ?>" alt=""></p>
                                <?php } ?>
                                <p class="sub-ttl">作品解説</p>
                                <div class="line-g"></div>
                                <?php
                                echo  $cfs->get('outline');
                                if($cfs->get('photo_list')){
                                    ?>
                                    <p class="sub-ttl">写真をみる</p>
                                    <div class="line-g"></div>
                                    <ul class="photos">
                                        <?php
                                        foreach ($cfs->get('photo_list') as $photo_list) {
                                            echo '<li><a href="' . $photo_list['photo'] . '"><img class="size-works-thumbnail" src="' . $photo_list['photo'] . '" width="90"></a></li>';
                                        };
                                        ?>
                                    </ul>
                                    <div class="clear"></div>
                                <?php
                                };
                                if($cfs->get('content_local_navi')){
                                    ?>
                                    <p class="sub-ttl">ほかの作品を見る</p>
                                    <?php
                                    echo $cfs->get('content_local_navi');
                                }
                                ?>
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

