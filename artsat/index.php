<?php
/**
 * Index Template
 *
 * This is the default template.  It is used when a more specific template can't be found to display
 * posts.  It is unlikely that this template will ever be used, but there may be rare cases.
 *
 * @package Origin
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>
	<script type="text/javascript">
		
    </script> 

	<?　//php do_atomic( 'before_content' ); // origin_before_content ?>
	<body onresize="increment()" onload="setting()">

	<div id="content">

		<?php do_atomic( 'open_content' ); // origin_open_content ?>
		
		<div id="top-content">

			<div id="main-txt">


                <a href="/exhibition/on-orbit/">
                    <img src="<?php echo get_template_directory_uri() ?>/img/exhibition/on-orbit/title_top.png" alt="On-Orbit">
                    <h2>
                        Exhibition at<br>
                        Museum of Contemporary Art Tokyo (MOT)<br>
                        June 7 (Sat), 2014 - Aug 31 (Sun), 2014<br>
                    </h2>
                </a>
                <h2>- <br> </h2>

				<!--<h2><a href="http://artsat.jp/en/digitalkerovereu" title="Digi-Talker over EU">Hello, space! over EU at 22-05-2014 18:34 UTC</a></h2><br>-->

				Facebook (Latest Information)<br>
				<a href="http://www.facebook.com/artsat">http://www.facebook.com/artsat</a><p><br>
				Reception Report<br>
				<a href="http://api.artsat.jp/report/">http://api.artsat.jp/report/</a><p>
				Twitter (Reception Report List)<br>
				<a href="http://twitter.com/INVADER_ARTSAT">http://twitter.com/INVADER_ARTSAT</a><p>
				ARTSAT API<br>
				<a href="http://api.artsat.jp/">http://api.artsat.jp/</a><p>
				GitHub<br>
				<a href="https://github.com/ARTSAT/">https://github.com/ARTSAT/</a>	

				<!-- ==== start cownt up ==== --> 
				<div id="countup">
					<script type="text/javascript">
					  $(function() {
					    countUp();
					  });
					  function countUp() {
					  var startDateTime = new Date("February 28,2014 03:37:00");
					  var endDateTime = new Date();
					  var left = endDateTime - startDateTime;
					  var a_day = 24 * 60 * 60 * 1000;
					
					  var d = Math.floor(left / a_day) 
					
					  var h = Math.floor((left % a_day) / (60 * 60 * 1000)) 
					
					  var m = Math.floor((left % a_day) / (60 * 1000)) % 60 
					
					  var s = Math.floor((left % a_day) / 1000) % 60 % 60 
					
					  $("#TimeLeft").html(d + '<span class="day">days</span>' + h + '<span class="day">hours</span>' + m + '<span class="day">min</span>' + s + '<span class="day">sec</span>');
					    setTimeout('countUp()', 1000);
					  }
					</script>
										
					<div class="Timer">
					  <span id="title">Elapsed Time from Launch :  </span>
					  <span id="TimeLeft"></span>
					</div>
				</div>
				<!-- ==== end cownt up ==== -->

				<p><object data="http://yoppa.org/works/InvaderTracker/" type="text/html" width="640" height="640" text="INVADER">
				</object></p>

				<iframe src="//player.vimeo.com/video/90871684" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> <p><a href="http://vimeo.com/84771002">ARTSAT1:INVADER PV</a> from <a href="http://vimeo.com/user13272107">artsat</a> on <a href="https://vimeo.com">Vimeo</a>.</p>
				<br>

				<iframe width="640" height="360" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/136268448&amp;auto_play=false&amp;hide_related=false&amp;visual=true"></iframe>		

			</div>
			
			
			<div id="conect">
				<div class="subtitle">
					<img src="<?php echo get_template_directory_uri() ?>/img/top/news.gif" alt="NEWS" />
				</div>
				<ul class="news">
				<?php
					query_posts( array( 'post_type' => 'post', 'posts_per_page' => 3 ) );
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
				
				<!--
				<div id="info">
				<div class="subtitle">
					<img src="/img/top/info.gif" alt="info" />
				</div>
				<img src="/img/top/artsat1_invader.gif" alt="ARTSAT1:INVADER" class="subtitle" width="295" height="350"/>
				<br />
				<a href="/exhibition">過去の展示を見る</a>
				</div>
				
				-->
				<div class="subtitle">
					<img src="<?php echo get_template_directory_uri() ?>/img/top/archive.gif" alt="archive" />
				</div>
				<div id="archive-banner">
					<a href="/exhibition/"><img src="<?php echo get_template_directory_uri() ?>/img/top/archive_banner.gif" alt="ARTSAT:INTRODUCTION" /></a>
					<p id="intro-txt">ARTSATイントロダクション</p>
				</div>


				<div class="subtitle">
					<img src="<?php echo get_template_directory_uri() ?>/img/top/sns.gif" alt="SNS" />
				</div>
				<a href="https://www.facebook.com/artsat" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/img/top/artsat_fb.gif" alt="ARTSAT Facebook" /></a><br />
				<!--<ul id="fb-feed" class="news">
				<div class="fb-like-box" data-href="https://www.facebook.com/artsat" data-width="296" data-colorscheme="dark" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>
				</ul>-->

<br />
<a href="https://twitter.com/INVADER_ARTSAT" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @INVADER_ARTSAT</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

				<br />
				<br />
				<br />
				<div class="subtitle">
					<img src="<?php echo get_template_directory_uri() ?>/img/top/contact.gif" alt="contact" />
				</div>
				<a href="" class="a-mail-img"><img src="<?php echo get_template_directory_uri() ?>/img/top/mail.gif" alt="info.artsat gmail.com" /><br /></a>
				<br />
				<br />
				<br />
				<div class="subtitle">
				</div>
				<a href="http://www.tamabi.ac.jp/" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/img/top/tamabi.gif" alt="Tama Art University" class="school-logo"/></a><br />
				<a href="http://www.u-tokyo.ac.jp/" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/img/top/todai.gif" alt="The University of Tokyo" class="school-logo"/></a>
			</div>
			
			<div class="clear"></div>
		</div>
			
		

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // origin_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>