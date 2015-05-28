<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
    <head>
	<!--<script src="//j.wovn.io/0" data-wovnio="key=h34vZ"></script>-->
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
        <!--<title><?php wp_title( '|', true, 'right' ); ?></title>-->

        <meta name="description" content="「ARTSAT：衛星芸術プロジェクト」は、 地球を周回する「宇宙と地上を結ぶメディア」としての衛星を使って、さまざまな芸術作品の制作を展開していくプロジェクトです。" />
        <meta property="og:title" content="ARTSAT PROJECT1:INVADER" />
        <meta property="og:image" content="http://artsat.jp/img/common/as_og_image.png" />
        <meta property="og:url" content="http://artsat.jp/" />
        <meta property="og:site_name" content="ARTSAT PROJECT1:INVADER" />
        <meta property="og:description" content="ARTSAT：衛星芸術プロジェクトは、 地球を周回する「宇宙と地上を結ぶメディア」としての衛星を使って、さまざまな芸術作品の制作を展開していくプロジェクトです。">

        <!-- Title -->
        <title><?php hybrid_document_title(); ?></title>


        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/style.css">
        <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/global.css">

        <?php if(is_home()): ?>
        <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/top.css">

        <?php elseif(is_page('on-orbit') || is_parent_slug() == 'on-orbit'): ?>
        <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/on-orbit.css" type="text/css" />
        <?php endif; ?>


        <!--<script type='text/javascript' src='<?php echo get_template_directory_uri() ?>/assets/js/lib/jquery-2.1.1.min.js'></script>-->
        <!-- JS -->
        <script type="text/javascript" charset="utf-8" src="<?php echo get_template_directory_uri() ?>/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo get_template_directory_uri() ?>/js/jq-jquery-onready.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo get_template_directory_uri() ?>/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo get_template_directory_uri() ?>/js/artsat.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo get_template_directory_uri() ?>/assets/js/common.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo get_template_directory_uri() ?>/assets/js/main.js"></script>
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

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&appId=320554561447925&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div id="wrapper">
            <div id="content">
                <header>
                    <div id="language" class="directLanguageSelect">
                           
                            <!-- new tag -for qTranslate X -->
                            <?php echo qtranxf_generateLanguageSelectCode('image'); ?>

                        <div class="clearfix"></div>
                    </div>

                    <div id="branding">

                        <?php if(is_page('on-orbit')) : ?>
                            <!--<a href="/"><img src="<?php echo get_template_directory_uri() ?>/img/common/white/logo.jpg" alt="ARTSAT" /></a>-->
                            <a href="/"><img src="/wp-content/uploads/2014/02/logo.jpg" alt="ARTSAT" /></a>
                        <?php else : ?>
                            <a href="/"><img src="/wp-content/uploads/2014/02/logo.jpg" alt="ARTSAT" /></a>
                        <?php endif ?>

                    </div><!-- #branding -->

                    <div id="navi-bar">
                        <ul class="row">
                            <?php if(is_page('on-orbit')) : ?>
                                <!--
                                <li><a href="/about/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/white/about.gif" alt="about" /></a></li>
                                <li><a href="/news/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/white/news.gif" alt="news" /></a></li>
                                <li><a href="/exhibition/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/white/exhibition.gif" alt="exhibition" /></a></li>
                                <li><a href="/project/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/white/project.gif" alt="project" /></a></li>
                                <li><a href="http://api.artsat.jp/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/white/api.gif" alt="api" /></a></li>
                                <li><a href="/credits/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/white/credits.gif" alt="credits" /></a></li>
                                -->
                                <li><a href="/about/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/about.gif" alt="about" /></a></li>
                                <li><a href="/news/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/news.gif" alt="news" /></a></li>
                                <li><a href="/exhibition/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/exhibition.gif" alt="exhibition" /></a></li>
                                <li><a href="/project/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/project.gif" alt="project" /></a></li>
                                <li><a href="http://api.artsat.jp/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/api.gif" alt="api" /></a></li>
                                <li><a href="/credits/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/credits.gif" alt="credits" /></a></li>
                            <?php else : ?>
                                <li><a href="/about/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/about.gif" alt="about" /></a></li>
                                <li><a href="/news/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/news.gif" alt="news" /></a></li>
                                <li><a href="/exhibition/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/exhibition.gif" alt="exhibition" /></a></li>
                                <li><a href="/project/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/project.gif" alt="project" /></a></li>
                                <li><a href="http://api.artsat.jp/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/api.gif" alt="api" /></a></li>
                                <li><a href="/credits/"><img src="<?php echo get_template_directory_uri() ?>/img/navi/credits.gif" alt="credits" /></a></li>
                            <?php endif ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div id="border">
                        <?php if(is_page('on-orbit')) : ?>
                            <img src="<?php echo get_template_directory_uri() ?>/img/navi/border.gif" alt="" width="43px" height="1px" id="w-border"/>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri() ?>/img/navi/border_on.gif" alt="" width="43px" height="1px" id="w-border"/>
                        <?php endif ?>
                    </div>
                </header>
