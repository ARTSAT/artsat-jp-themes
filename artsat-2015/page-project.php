<?php
/**
 * Template Name: PROJECT
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
                                echo '<ul>';
                                if($cfs->get('local_navi_list')){
                                    if($cfs->get('local_navi_list') == 'INVADER'){
                                        ?>
                                        <li><a href="/exhibition"><img src="<?php echo get_template_directory_uri() ?>/img/exhibition/intro.gif" alt="ARTSAT:INTRODUCTION"></a></li>
                                        <li><a href="/exhibition/#phase1"><img src="<?php echo get_template_directory_uri() ?>/img/exhibition/1st.gif" alt="Manmade Moon"></a></li>
                                        <li><a href="/exhibition/#phase2"><img src="<?php echo get_template_directory_uri() ?>/img/exhibition/2nd.gif" alt="Physycal Satellite"></a></li>
                                        <li><a href="/exhibition#phase3"><img src="<?php echo get_template_directory_uri() ?>/img/exhibition/3rd.gif" alt="ARTSAT1:INVADER"></a></li>
                                    <?php }else if($cfs->get('local_navi_list') == 'invader-outline'){ ?>
                                        <li><a href="/project/invader">About</a></li>
                                        <li><a href="/project/invader/invader-feature">Feature</a></li>
                                        <li><a href="/project/invader/invader-mission">Missions</a></li>
                                        <li><a href="/project/invader/invader-specification">Specification</a></li>
                                        <li><a href="/project/invader/verification-card">Verification (SWL/QSL) Card</a></li>
                                        <li><a href="/project/invader/cw-format-2">CW Format</a></li>
                                        <li><a href="/project/invader/3d-model">3D Model</a></li>
                                        <li><a href="/project/invader/morikawa">MORIKAWA</a></li>

                                    <?php }else if($cfs->get('local_navi_list') == 'despatch'){ ?>
                                        <li><a href="/project/despatch/">About</a></li>
                                        <li><a href="/project/despatch/specification">Specification</a></li>
                                        <li><a href="/project/despatch/3d-model">3D Model</a></li>
					                              <li><a href="/project/despatch/celestial">Find DESPATCH in Sky</a></li>
					                              <li><a href="/project/despatch/orbit">DESPATCH Orbit Viewer</a></li>

                                    <?php }else if($cfs->get('local_navi_list') == 'gs'){ ?>
                                        <!--<li><a href="/project/gs"><b>【TamabiGS】多摩美地上局</b></a></li>
                                        <li class="sub"><a href="#hardware">ハードウェア構成</a></li>
                                        <li class="sub"><a href="#diagram">地上局ダイアグラム</a></li>
                                        <li class="sub"><a href="#software">地上局ソフトウェア</a></li>
                                        <li><br></li>
                                        <li><a href="/project/gs/api"><b>【ARTSAT API】衛星API</b></a></li>
                                        <li class="sub"><a href="/project/gs/api#preview">ARTSAT API Preview</a></li>
                                        <li class="sub"><a href="/project/gs/api#system">システム仕様</a></li>
                                        <li class="sub"><a href="/project/gs/api#concept">基本コンセプト</a></li>
                                        <li class="sub"><a href="/project/gs/api#hardware">ハードウェア</a></li>
                                        <li class="sub"><a href="/project/gs/api#software">ソフトウェア</a></li>
                                        <li class="sub"><a href="/project/gs/api#protocol">プロトコル</a></li>
                                        <li class="sub"><a href="/project/gs/api#configuration">システム構成</a></li>
                                        <li class="sub"><font color="#666">クラス構成</font></li>
                                        <li class="sub"><font color="#666">シミュレーションとの連携</font></li>-->
                                    <?php
                                    };
                                };
                                echo '</ul>';
                                ?>

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
