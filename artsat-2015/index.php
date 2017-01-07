<?php get_header(); ?>

        <div id="top__keyvisual">
            <div class="top__keyvisual--items">
                <div class="top__keyvisual--item">
                    <a href="http://space-moere.org" target="_blank">
                        <img src="<?php echo get_template_directory_uri() ?>/img/top/key_visuals/key_visual_moere_01.png">
                    </a>
                </div>
                <div class="top__keyvisual--item">
                    <a href="http://space-moere.org" target="_blank">
                        <img src="<?php echo get_template_directory_uri() ?>/img/top/key_visuals/key_visual_moere_02.png">
                    </a>
                </div>
                <div class="top__keyvisual--item">
                    <a href="http://space-moere.org" target="_blank">
                        <img src="<?php echo get_template_directory_uri() ?>/img/top/key_visuals/key_visual_moere_03.png">
                    </a>
                </div>
                <div class="top__keyvisual--item">
                    <a href="http://space-moere.org" target="_blank">
                        <img src="<?php echo get_template_directory_uri() ?>/img/top/key_visuals/key_visual_moere_04.png">
                    </a>
                </div>
            </div>
        </div>

            <div class="full-width-banner" id="content-despatch">
		<h1>One small spacecraft for (a) team, one giant leap for art.</h1>
		<h2>一つのチームにとっては小さな宇宙機だが、芸術にとっては偉大な飛躍だ。</h2>
		<br>
                <img src="<?php echo get_template_directory_uri() ?>/img/top/title-despatch.png">
                <div class="full-width-banner-link">
                    <a href="http://despatch.artsat.jp/ja" target="_blank">JP</a> / <a href="http://despatch.artsat.jp/en/Main_Page" target="_blank">EN</a>
                </div>
            </div>
            <div id="content-count">
                <!-- ==== start cownt up ==== -->

                <div id="countup">
                    <script type="text/javascript">
                        $(function() {
                            countUp();
                        });
                        function countUp() {
                            var startDateTime = new Date();//new Date("February 28,2014 03:37:00");
                            var endDateTime = new Date("December 3,2014 13:22:04");//new Date();
                            var left = startDateTime - endDateTime;
                            var a_day = 24 * 60 * 60 * 1000;

                            var d = Math.floor(left / a_day)

                            var h = Math.floor((left % a_day) / (60 * 60 * 1000))

                            var m = Math.floor((left % a_day) / (60 * 1000)) % 60

                            var s = Math.floor((left % a_day) / 1000) % 60 % 60

                            $("#TimeLeft").html(d + '<span class="day">days</span>' + h + '<span class="day">hours</span>' + m + '<span class="day">min</span>' + s + '<span class="day">sec</span>');
                            setTimeout('countUp()', 1000);

			    $.get('http://api.artsat.jp/despatch/track.json',
				{'time': ~~(startDateTime.getTime() / 1000), 'lat': 35.610603, 'lon': 139.351124, 'alt': 148},
				function(data){
					var km = data.distance / 1000.0;
					$("#Distance").html(km + '<span class="day"> km</span>');
				},
				'json');

/*
			    $.post('http://artsat.idd.tamabi.ac.jp:16782/rpc.json',
				'{"jsonrpc": "2.0", "method": "observer.getSpacecraftDistance", "params": null, "id": 1}',
				function(data){
					var km = data.result.distance;
					$("#Distance").html(km + '<span class="day"> km</span>');
				},
				'json');
*/
			}
		</script>

                    <div class="Timer">
			<br>
                        <span id="title">Distance from the Earth - 地球からの距離 : </span><br>
                        <span id="Distance">N/A</span><br>
                        <span id="title">Elapsed from Launch - 打ち上げから : </span><br>
                        <span id="TimeLeft"></span>
			<br>
                    </div>
                </div>
                <!-- ==== end cownt up ==== -->
            </div>

            <div id="content-despatch-sub" class="clearfix">
                <div class="left">
                    <p><a href="http://artsat.jp/project/despatch/celestial" target="_blank">Celestial Sphere Position<br>天球位置</a></p>
                </div>
                <div class="right">
                    <p><a href="http://artsat.jp/project/despatch/orbit" target="_blank">Orbital Position<br>軌道位置</a></p>
                </div>
		<!--
                <div class="left">
                    <p><a href="http://api.artsat.jp/pass/" target="_blank">Tracking DESPATCH<br>軌道予測</a></p>
                </div>
                <div class="right">
                    <p><a href="http://api.artsat.jp/report/" target="_blank">Reception Report<br>受信報告</a></p>
                </div>
		-->
            </div>

            <div id="top-content">
                <!--
                <img src="<?php echo get_template_directory_uri() ?>/img/top/mainVisual.png" alt="On-Orbit" />
                <h2>
                    Exhibition at Museum of Contemporary Art Tokyo (MOT)<br>
                    June 7 (Sat), 2014 - Aug 31 (Sun), 2014<br>
                </h2>-->
                <img src="<?php echo get_template_directory_uri() ?>/img/top/message-de-orbit.png" alt="On-Orbit" />
            </div>

            <!--<object id="invaderTracker" data="http://yoppa.org/works/InvaderTracker/" type="text/html" width="950" height="640" text="INVADER"></object>-->

            <div id="exhibitionArchiveContainer">
                <div class="subtitle">
                    <img src="<?php echo get_template_directory_uri() ?>/img/top/archive-exhibition.gif" alt="EXHIBITION ARCHIVE" />
                </div>
                <a href="/exhibition/on-orbit/">
                    <img src="<?php echo get_template_directory_uri() ?>/img/top/mainVisual.png" alt="On-Orbit" width="582"/>
                    <h3>
                        Exhibition at Museum of Contemporary Art Tokyo (MOT)<br>
                        June 7 (Sat), 2014 - Aug 31 (Sun), 2014
                    </h3>
                </a>

            </div>

            <div id="newsContainer">
                <div class="subtitle">
                    <img src="<?php echo get_template_directory_uri() ?>/img/top/news.gif" alt="NEWS" />
                </div>
                <ul class="news">
                  <li>
                    <a href="http://www.aec.at/prix/en/gewinner/#hybridart" target="blank">
                      <img src="<?php echo get_template_directory_uri() ?>/img/top/PX_logo_award_of_distinction_2015.jpg" width="289" height="108">
                    </a>
                  </li>

                    <?php
                    query_posts( array( 'post_type' => 'post', 'posts_per_page' => 5, 'post_status' => 'publish' ) );
                    while (have_posts()) : the_post();
                        echo '<li>' ;
                        echo '<a href="' ;
                        echo the_permalink();
                        echo '"><span class="date">' ;
                        echo the_time('Y.m.d');
                        echo '</span><br /><p class="news-title">' ;
                        echo the_title();
                        echo '</a></p></li>';
                    endwhile;
                    wp_reset_query();
                    ?>
                </ul>
            </div>

            <!--
            <div id="seekingVolunteersMessageContainer">
                <div class="subtitle">
                    <img src="<?php echo get_template_directory_uri() ?>/img/top/seeking_volunteers.gif" alt="SEEKING VOLUNTEERS" />
                </div>
                <p>
                    Seeking volunteers for cooperative data reconstruction from weak signals transmitted by a deep­-space craft “DESPATCH”<br>
                    <a href="https://dl.dropboxusercontent.com/u/1336163/despatch_abstract_en_ver1.0.1.pdf" target="_blank">despatch_abstract_en_ver1.0.1</a>
                </p>
                <p>
                    深宇宙彫刻「ARTSAT2:DESPATCH」による 深宇宙からの微弱電波の共同受信実験への<br>
                    ご協力のお願い<br>
                    <a href="https://dl.dropboxusercontent.com/u/1336163/despatch_abstract_ja_ver1.0.1.pdf" target="_blank">despatch_abstract_ja_ver1.0.1</a>
                </p>

            </div>-->


<?php get_footer(); ?>
