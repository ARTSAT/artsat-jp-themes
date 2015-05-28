<?php
/**
 * Header Template
 *
 * The header template is generally used on every page of your site. Nearly all other templates call it 
 * somewhere near the top of the file. It is used mostly as an opening wrapper, which is closed with the 
 * footer.php file. It also executes key functions needed by the theme, child themes, and plugins. 
 *
 * @package Origin
 * @subpackage Template
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<meta name="keywords" content="アートサット、インベーダー、アート、インタラクティブ、衛星、衛星芸術、芸術衛星、多摩美術大学×東京大学、多摩美術大学、東京大学、平川紀道、久保田晃弘、田崎佑樹" />


<?php if(is_page('on-orbit')) : ?>
<meta name="description" content="「ARTSAT：衛星芸術プロジェクト」は、 地球を周回する「宇宙と地上を結ぶメディア」としての衛星を使って、さまざまな芸術作品の制作を展開していくプロジェクトです。" />
<meta property="og:title" content="On-Orbit | Exhibition | ARTSAT" />
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/exhibition/on-orbit/ogimage.jpg" />
<meta property="og:url" content="http://artsat.jp/exhibition/on-orbit" />
<meta property="og:site_name" content="ARTSAT PROJECT1:INVADER" />
<meta property="og:description" content="ARTSAT：衛星芸術プロジェクトは、 地球を周回する「宇宙と地上を結ぶメディア」としての衛星を使って、さまざまな芸術作品の制作を展開していくプロジェクトです。">

<!-- Title -->
<title>On-Orbit | Exhibition | ARTSAT</title>

<?php else: ?>
<meta name="description" content="「ARTSAT：衛星芸術プロジェクト」は、 地球を周回する「宇宙と地上を結ぶメディア」としての衛星を使って、さまざまな芸術作品の制作を展開していくプロジェクトです。" />
<meta property="og:title" content="ARTSAT PROJECT1:INVADER" />
<meta property="og:image" content="http://artsat.jp/img/common/as_og_image.png" />
<meta property="og:url" content="http://artsat.jp/" />
<meta property="og:site_name" content="ARTSAT PROJECT1:INVADER" />
<meta property="og:description" content="ARTSAT：衛星芸術プロジェクトは、 地球を周回する「宇宙と地上を結ぶメディア」としての衛星を使って、さまざまな芸術作品の制作を展開していくプロジェクトです。">

<!-- Title -->
<title><?php hybrid_document_title(); ?></title>
<?php endif ?>



<!-- Mobile viewport optimized -->
<meta name="viewport" content="width=device-width,initial-scale=1">

<?php if ( hybrid_get_setting( 'origin_favicon_url' ) ) { ?>
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo hybrid_get_setting( 'origin_favicon_url' ); ?>" />
<?php } ?>


<!-- Stylesheet -->	
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />
<?php if(is_page('on-orbit')) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/on-orbit.css" type="text/css" />
<?php endif ?>

<!-- JS -->
<script type="text/javascript" charset="utf-8" src="<?php echo get_template_directory_uri() ?>/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo get_template_directory_uri() ?>/js/jq-jquery-onready.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo get_template_directory_uri() ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo get_template_directory_uri() ?>/js/artsat.js"></script>
<script type="text/javascript">
var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5071576-31']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- WP Head -->
<?php wp_head(); ?>

<meta name="google-site-verification" content="tluiRRiJRMmWJogoK6iAgyUtyU5YsEffr1r8WeA1K6c" />

</head>

<body class="<?php hybrid_body_class(); ?>">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=412225855581456";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<?php do_atomic( 'open_body' ); // origin_open_body ?>

	<div id="container">
		
		<div class="wrap">

			<?php do_atomic( 'before_header' ); // origin_before_header ?>
	
			<div id="header">
	
				<?php do_atomic( 'open_header' ); // origin_open_header ?>
					<div id="language" class="directLanguageSelect">
                        <?php if(is_page('on-orbit')) : ?>
                            <!-- ORBIT -->
                            <ul>
                                <li><a href="javascript:void(0);" onclick="selectLanguage('ja')"><img src="<?php home_url(); ?>/wp-content/img/qtranslate/jp_white.png" alt="jp"></a></li>
                                <li><a href="javascript:void(0);" onclick="selectLanguage('en')"><img src="<?php home_url(); ?>/wp-content/img/qtranslate/gb_white.png" alt="en"></a></li>
                            </ul>
                            <!--
                            <ul class="qtrans_language_chooser" id="qtranslate-chooser">
                                <li class="lang-ja active"><a href="http://artsat.localhost/exhibition/on-orbit" hreflang="ja" title="日本語" class="qtrans_flag qtrans_flag_ja">
                                        <span style="display:none">日本語</span></a></li><li class="lang-en"><a href="http://artsat.localhost/en/exhibition/on-orbit" hreflang="en" title="English" class="qtrans_flag qtrans_flag_en"><span style="display:none">English</span></a></li><li class="lang-es"><a href="http://artsat.localhost/es/exhibition/on-orbit" hreflang="es" title="Español" class="qtrans_flag qtrans_flag_es"><span style="display:none">Español</span></a></li><li class="lang-zh"><a href="http://artsat.localhost/zh/exhibition/on-orbit" hreflang="zh" title="中文" class="qtrans_flag qtrans_flag_zh"><span style="display:none">中文</span></a></li><li class="lang-fr"><a href="http://artsat.localhost/fr/exhibition/on-orbit" hreflang="fr" title="Français" class="qtrans_flag qtrans_flag_fr"><span style="display:none">Français</span></a></li>
                            </ul>-->
                        <?php else : ?>
                            <?php echo qtrans_generateLanguageSelectCode('image'); ?>
                        <?php endif ?>

						<div class="clear"></div>
					</div>
					
					<div id="branding">

                        <?php if(is_page('on-orbit')) : ?>
                            <a href="/"><img src="<?php echo get_template_directory_uri() ?>/img/common/white/logo.jpg" alt="ARTSAT" /></a>
                        <?php else : ?>
                            <a href="/"><img src="/wp-content/uploads/2014/02/logo.jpg" alt="ARTSAT" /></a>
                        <?php endif ?>

					</div><!-- #branding -->

					<div id="navi-bar">
						<ul class="row">
                            <?php if(is_page('on-orbit')) : ?>
                                <li><a href="/about/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/white/about.gif" alt="about" /></a></li>
                                <li><a href="/news/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/white/news.gif" alt="news" /></a></li>
                                <li><a href="/exhibition/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/white/exhibition.gif" alt="exhibition" /></a></li>
                                <li><a href="/project/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/white/project.gif" alt="project" /></a></li>
								<li><a href="/api/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/white/api.gif" alt="api" /></a></li>
                                <li><a href="/credits/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/white/credits.gif" alt="credits" /></a></li>
                            <?php else : ?>
                                <li><a href="/about/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/about.gif" alt="about" /></a></li>
                                <li><a href="/news/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/news.gif" alt="news" /></a></li>
                                <li><a href="/exhibition/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/exhibition.gif" alt="exhibition" /></a></li>
                                <li><a href="/project/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/project.gif" alt="project" /></a></li>
                                <li><a href="/api/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/api.gif" alt="api" /></a></li>
                                <li><a href="/credits/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/credits.gif" alt="credits" /></a></li>
                            <?php endif ?>
						</ul>
						<div class="clear"></div>
					</div>
					<div id="border">
                        <?php if(is_page('on-orbit')) : ?>
    						<img src="<?php echo get_template_directory_uri() ?>/img/navi/border.gif" alt="" width="43px" height="1px" id="w-border"/>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri() ?>/img/navi/border_on.gif" alt="" width="43px" height="1px" id="w-border"/>
                        <?php endif ?>
					</div>
					
					
					
					<?php get_template_part( 'menu', 'primary' ); // Loads the menu-primary.php template. ?>
					
					<?php hybrid_site_description(); ?>
	
					<?php do_atomic( 'header' ); // origin_header ?>
	
	
			</div><!-- #header -->
	
			<?php do_atomic( 'after_header' ); // origin_after_header ?>
	
			<?php do_atomic( 'before_main' ); // origin_before_main ?>
	
			<div id="main">
	
				<?php do_atomic( 'open_main' ); // origin_open_main ?>