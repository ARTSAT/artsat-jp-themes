<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>


<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="robots" content="">


<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript" src="https://www.google.com/jsapi?key=ABQIAAAAvjkGh7sI4N_dMwANRxGxsRS6DeS-dbVOaGlK0ywHcnaom2kteRRHm_mfCVo7HpsbnAHlh2ewzzoPFA"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/scripts/jquery-1.5.1.min.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/scripts/slides.min.jquery.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/scripts/jquery.droppy.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/scripts/jquery.colorbox-min.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/scripts/main.js"></script> 
<?php wp_head(); ?>
<script type="text/javascript">

	// GOOGLE FUNCTIONS //
	/*analytics*/
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5071576-31']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

	/*translate*/
	function googleTranslateElementInit() {
	  new google.translate.TranslateElement({
	    pageLanguage: 'ja',
	    includedLanguages: 'ja,en,es,fr,de,ru,zh-CN,ko',
	    floatPosition: google.translate.TranslateElement.FloatPosition.TOP_RIGHT
	  });
	}
	
	/*feed*/
	google.load("feeds", "1");
	function initialize() {
		var feed = new google.feeds.Feed("http://www.facebook.com/feeds/page.php?id=221492007877337&format=atom10");
		feed.setNumEntries(1);
		feed.load(function(result) {
			if (!result.error) {
				var container = $("#container");
				$.each(result.feed.entries, function(){
					$('#side-news .text').html(this.content);
					var e = $('#side-news .text').html().split('<br>');
					//console.log(e);
					//console.log(' ');

					$('#side-news h3').html(e[3]);
					
					$('#side-news h3 a').attr({href:this.link, target:'_blank'});
					
					var description = '';
					if(e[5] == undefined) description = e[3];
					else if(e[3] == undefined) description = '';
					else description = e[5];

					$('#side-news .text').html(e[2] + ' ' + e[0] + '<br />' + description);
					if(e[0] == undefined || e[0] == '') $('#side-news .text').urlAutoLink();
					$('#side-news .text a').attr('target', '_blank');
					$('#side-news .text a img').addClass('left');
					var d = new Date(this.publishedDate);
					$('#side-news p.date').text(d.getFullYear()+'.'+d.getMonth()+'.'+d.getDate());
				});
			}
		});
		var feed_t = new google.feeds.Feed("http://artsat.tumblr.com/rss");
		feed_t.setNumEntries(1);
		feed_t.load(function(result){
			if (!result.error) {
				$.each(result.feed.entries, function(){
					$('#index-text-blog div h3 a').text(this.title);
					$('#index-text-blog div h3 a').attr('href', this.link);
					$('#index-text-blog div p').append(this.content);
					$('#index-text-blog div p p').each(function(){
						$(this).replaceWith($(this).html());
					});
					var img = $('#index-text-blog div p img').eq(0);
					$('#index-text-blog div p img').remove();
					var txt = $('#index-text-blog div p').text().substring(0, 190)+' …';
					$('#index-text-blog div p').text(txt);
					img.attr('width', 100).removeAttr('height').addClass('right');
					$('#index-text-blog div p').prepend(img);
				});
			}
		});
	}
	google.setOnLoadCallback(initialize);
	

</script>
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
</head>

<body>

<div id="wrapper">