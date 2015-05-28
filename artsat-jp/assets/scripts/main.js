var o;
var bWidth;
var bHeight;

$(function(){

	//--------------------------------------------
	// common 
	//--------------------------------------------
	
	//browser check -------------------------------------------- */
	if (navigator.platform.indexOf("Win") != -1) {
		$('body').addClass("win");
		if ( !jQuery.support.leadingWhitespace ) { $('body').addClass("win-ie"); }
		
		if(!jQuery.support.opacity){
			if(!jQuery.support.style){
				if (typeof document.documentElement.style.maxHeight != "undefined") {
					//IE7
					$('body').addClass("win-ie7");
				} else {
					//IE6
					$('body').addClass("win-ie6");
				}
			} else {
				//IE8
				$('body').addClass("win-ie8");
			}
		}
	}

	//scroll -------------------------------------------- */
	$('.a-pagetop').click( function() { 
		$('html,body').animate({ scrollTop: 0 }, 400, 'quart');
		return false;
	});

	//mail -------------------------------------------- */
	$('.a-mail').each(function() {
		var e = $(this).html().split(' ').join('@');
		$(this).attr('href','mailto:'+ e).html(e);
	});
	var e = $('a.a-mail-img img').attr('alt').split(' ').join('@')
	$('a.a-mail-img').attr('href', 'mailto:'+ e);
	
	o = {
		$win:$(window),
		$doc:$(document),
		$body:$('body'),
		$w:bWidth,
		$h:bHeight
	};


	$('#nav ul').droppy();
	$('#nav ul li img.yet').fadeTo(0, .6);
	
	if($('#contents').height() < $('#sidebar').height()){
		$('.page-inner').not('.news').height($('#sidebar').height() - $('.page-header-img').height());
	}

	$('a img').hover( function() {
		$(this).stop(true, false).animate({ opacity: .7 }, { duration: 100});
		if ( !jQuery.support.leadingWhitespace ) { this.style.removeAttribute('filter'); }
	}, function() {
		$(this).stop(true, false).animate({ opacity: 1 }, { duration: 100});
		if ( !jQuery.support.leadingWhitespace ) { this.style.removeAttribute('filter'); }
	});

	/*
	$('ul#side-news li').hover(
		function(){
			$(this).children('.text').css('backgroundImage', 'url(http://artsat.jp/wp-content/themes/artsat-jp/assets/imgs/bt-arrow-over.png)');
		},
		function(){
			$(this).children('.text').css('backgroundImage', 'url(http://artsat.jp/wp-content/themes/artsat-jp/assets/imgs/bt-arrow.png)');
		}
	);*/

	$('#slides').slides({
		preload: true,
		play: 5000,
		pause: 2500,
		hoverPause: true,
		container: 'slides_inner',
		generatePagination: false
	});
	$('ul#link-banner a').wrap('<li></li>');
	$('ul#link-banner li a').append('<img src="http://artsat.jp/wp-content/themes/artsat-jp/assets/imgs/bt-arrow.png" width="30" class="bt"/>');
	$('ul#link-banner li a, h3.pbl').hover(
		function(){
			var src = $(this).children('img.bt').attr('src');
			$(this).children('img.bt').attr('src', src.split('.png').join('-over.png'));
		},
		function(){
			$(this).children('img.bt').attr('src', 'http://artsat.jp/wp-content/themes/artsat-jp/assets/imgs/bt-arrow.png');
		}
	);

	$(window).resize(function(){
	});
	
	
	var path = window.location.pathname.split('/');
	if(path[1] == 'pbl'){
		$('.entry').not($('.entry').eq(0)).hide();
		$('.entry a img').parent().addClass('colorbox');
	}
	$('h3.pbl').click(function(){
		var i = $('h3.archive').index(this);
		$('.entry').eq(i).slideToggle(500);
	});
	
	$('.colorbox').colorbox();
	
});

$(window).load(function(){
	$('.twtr-ft div span a').text('VIEW MORE').fadeIn(0);
});

/*function window_size () {
	o.$w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth || $(window).width();
	o.$h = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight || $(window).height();
}*/

$(window).scroll(function () {
	var scroll = $(window).scrollTop() || $(document).scrollTop();
	
	//fixed nav at top if log hidden
	if(scroll > 200) $('#sidebar').css({position:'fixed', top:-200 });
	else $('#sidebar').css({position:'relative', top:0});
});


$.fn.urlAutoLink = function(baseURL){  
    return this.each(function(){  
        var srcText = this.innerHTML;  
        this.innerHTML = srcText.replace(/(http:\/\/[\x21-\x7e]+)/gi, "<a href='$1'>$1</a>");  
    });  
}  