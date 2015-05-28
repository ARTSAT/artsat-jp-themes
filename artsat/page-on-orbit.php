<?php
/**
 * Template Name: on-orbit
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

                            <div id="mainVisual" class="imageSlideShow">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/exhibition/on-orbit/mainVisual01.jpg" alt="ARTSAT:On-Orbit">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/exhibition/on-orbit/mainVisual02.jpg" alt="ARTSAT:On-Orbit">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/exhibition/on-orbit/mainVisual03.jpg" alt="ARTSAT:On-Orbit">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/exhibition/on-orbit/mainVisual04.jpg" alt="ARTSAT:On-Orbit">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/exhibition/on-orbit/mainVisual05.jpg" alt="ARTSAT:On-Orbit">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/exhibition/on-orbit/mainVisual06.jpg" alt="ARTSAT:On-Orbit">
                            </div>


                            <ul id="information">
                                <li>
                                    <div class="left">
                                        <p class="ja">展覧会名 :</p>
                                        <p class="en">Exhibition :</p>
                                    </div>
                                    <div class="right">
                                        <p class="ja">ミッション[宇宙×芸術]－コスモロジーを超えて</p>
                                        <p class="en">mission [SPACE×ART]－beyond Cosmologies</p>
                                    </div>
                                    <div class="informationBorder clearfix"><span class="left"></span><span class="right"></span></div>
                                </li>
                                <li>
                                    <div class="left">
                                        <p class="ja">会期 :</p>
                                        <p class="en">Period:</p>
                                    </div>
                                    <div class="right">
                                        <p class="ja">2014年6月7日（土） − 8月31日（日）</p>
                                        <p class="en">June 7 (Sat), 2014 - Aug 31 (Sun), 2014</p>
                                    </div>
                                    <div class="informationBorder"><span class="left"></span><span class="right"></span></div>
                                </li>
                                <li>
                                    <div class="left">
                                        <p class="ja">休館日 :</p>
                                        <p class="en">Closed on :</p>
                                    </div>
                                    <div class="right">
                                        <p class="ja">月曜日（7月21日は開館）、7月22日</p>
                                        <p class="en">Mondays (except 21 July), 22 July</p>
                                    </div>
                                    <div class="informationBorder"><span class="left"></span><span class="right"></span></div>
                                </li>
                                <li>
                                    <div class="left">
                                        <p class="ja">会場 :</p>
                                        <p class="en">Venue :</p>
                                    </div>
                                    <div class="right">
                                        <p class="ja">東京都現代美術館 (企画展示室1Ｆ / 地下2Ｆ・アトリウム)</p>
                                        <p class="en">Museum of Contemporary Art Tokyo (MOT) Exhibition Gallery 1F, B2F・Atrium</p>
                                    </div>
                                    <div class="informationBorder"><span class="left"></span><span class="right"></span></div>
                                </li>
                                <li>
                                    <div class="left">
                                        <p class="ja">開館時間 :</p>
                                        <p class="en">Opening Hours :</p>
                                    </div>
                                    <div class="right">
                                        <p class="ja">10:00-18:00 (7月18日、25日、8月1日、8日、15日、22日、29日は21:00まで)</p>
                                        <p class="en">
                                            10:00-18:00<br>
                                            <span class="notice">*Jul.18, 25, Aug.1, 8, 15, 22, 29 (Fridays) is open until 21:00<br>Last admission to the gallery floor & last ticket purchase is 30minutes before the closing hour.</span>
                                        </p>
                                    </div>
                                    <div class="informationBorder"><span class="left"></span><span class="right"></span></div>
                                </li>

                            </ul>


                            <div id="conceptTitle">
                                <p class="ja">
                                    <span class="sub">出品作品について</span><br>
                                    ARTSAT:On-Orbit(新作)
                                </p>
                                <p class="en">
                                    <span class="sub">Presented work:</span><br>
                                    ARTSAT:On-Orbit(新作)
                                </p>
                            </div>
                            <div id="conceptText">
                                <p class="ja">
                                    本展覧会では、現在軌道上に存在するINVADERや現在開発中のDESPATCHを紹介すると同時に、現在軌道上に存在するINVADERからの生データを増幅、拡張した新作インスタレーション作品を7点展示する。
                                </p>
                                <p class="en">
                                    In this exhibition, the ARTSAT Project will present an introduction to the INVADER, still on orbit and DESPATCH, currently under development, as well as showcase 7 new installation works that amplifies and expands live data transmitted from the INVADER.
                                </p>
                            </div>

                            <div class="credit">
                                <p class="ja">
                                    <span class="creditCaption">展示協力 :</span><br>
                                    多摩美術大学情報デザイン学科メディア芸術コース<br>
                                    フォステクス　カンパニー<br>
                                    株式会社シンタックスジャパン<br>
                                    EIZO株式会社<br>
                                    (翻訳) 相磯展子<br><br>
                                    <span class="creditCaption">機体開発協力 :</span><br>
                                    INVADER: 野方電機工業株式会社<br>
                                    DESPATCH：株式会社由紀精密、SOLIZE株式会社 、株式会社西無線研究所<br><br>
                                    <span class="creditCaption">助成 :</span><br>
                                    公益財団法人アサヒグループ芸術文化財団<br>
                                    公益財団法人朝日新聞文化財団
                                </p>
                                <p class="en">
                                    <span class="creditCaption">Cooperation :</span><br>
                                    Art & Media Course in Information Design Department of Tama Art University<br>
                                    FOSTEX COMPANY<br>
                                    Synthax Japan Inc.<br>
                                    EIZO Corporation<br>
                                    (translation) Nobuko Aiso<br><br>

                                    INVADER: NOGATA DENKI KOGYO Co.,Ltd.<br>
                                    DESPATCH：Yuki Precision co.,ltd. / SOLIZE Corporation / NISHI MUSEN KENKYUSYO CO.,LTD<br><br>

                                    <span class="creditCaption">[Supported by]</span><br>
                                    ASAHI GROUP ARTS FOUNDATION<br>
                                    The Asahi Shimbun Foundation
                                </p>
                            </div>



                            <!--
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
                                        <li><a href="/invader">概要</a></li>
                                        <li><a href="/invader/invader-feature">特徴</a></li>
                                        <li><a href="/invader/invader-mission">ミッション</a></li>
                                        <li><a href="/invader/invader-specification">仕様</a></li>
                                        <li><a href="/invader/invader-subsystem">サブシステム</a></li>
                                        <li><a href="/invader/verification-card">Verification (SWL/QSL) Card</a></li>
                                        <li><a href="/invader/cw-format">CW Format</a></li>
                                        <li><a href="/invader/3d-model">3Dモデル</a></li>
                                        <li><a href="/invader/morikawa">MORIKAWA</a></li>
                                    <?php	};
                                };
                                echo '</ul>';
                                ?>

                            </div>

                            <div id="right-box">
                                <div class="entry-content">

                                    <img src="<?php echo $cfs->get('ttl_img') ?>" alt="">
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

                                </div>
                            </div>
                            -->
                            <!-- .entry-content -->

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