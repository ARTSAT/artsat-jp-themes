$(function(){

//    $('.imageSlideShow').each(function(){
//        new ImageSlideShow($(this));
//    });

	//***ページトップへ戻る
	$('a[href^=#]').click(function() {
		var speed = 700;
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top;
		$($.browser.safari ? 'body' : 'html').animate({scrollTop:position}, speed, 'easeOutQuad');
		return false;
	});

	//***グロナビの現在地検出
	//* 見た通りなんですが、現在地のurlとグロナビのaの中身(第一階層)が同じやつを探して、って感じです。
	// if(location.pathname != "/") {
 //                var path = location.pathname.split("/");
	// 	var target = $('#navi-bar .row li a[href^="/' + (path[1] == 'en' ? path[2] : path[1]) + '"] img');
	// 	var target_width = target.width();
	// 	var target_left = target.offset().left - ( ( $(window).width() - 950 ) / 2 );
	// 	$("img#w-border").stop().animate({
	// 		marginLeft: target_left,
	// 		width: target_width
	// 	}, {duration : 0, easing : "linear"});
 //    }

	// //***グロナビのマウスオーバー
	// $("#navi-bar ul.row li a img").hover(
	// 	function(){
	// 		var this_width = $(this).width();
	// 		var this_left = $(this).offset().left - ( ( $(window).width() - 950 ) / 2 );
	// 		var indx = $("#navi-bar ul.row li img").index(this);

	// 		$(this).css("cursor","pointer");

	// 		$("img#w-border").stop().animate({
	// 			marginLeft: this_left,
	// 			width: this_width,
	// 		}, {duration : 300, easing : "linear"});
	// 	},
	// 	function(){
	// 	}
	// );

	//top key visual slideshow

	// $(".top__keyvisual--items > .top__keyvisual--item:gt(0)").hide();
	/*
	setInterval(function() {
	  $('.top__keyvisual--item:first')
	    .fadeOut(2000)
	    .next()
	    .fadeIn(2000)
	    .end()
	    .appendTo('.top__keyvisual--items');
	},  6000);
	*/
});


//--↓↓↓ このへん要らない気がする.... ↓↓↓ --//
function setting(){
	//movie left-margin setting
	var rect = $("div.wrap").width();
	var movie_left = (window.innerWidth - rect)/2*(-1);
	//movie size setting
	var movie_width = window.innerWidth;
	var movie_height = (window.innerWidth*9)/16;
	$("#top-movie iframe").css("width", movie_width)
						  .css("height", movie_height)
						  .css("margin-left", movie_left)
						  .css("display", "block");
	$("#top-movie").css("height", movie_height);
}

function increment(){
	var _rect = $("div.wrap").width();
	var _movie_left = (window.innerWidth - _rect)/2*(-1);

	var _movie_width = window.innerWidth;
	var _movie_height = (window.innerWidth*9)/16;
	$("#top-movie iframe").css("width", _movie_width)
						  .css("height", _movie_height)
						  .css("margin-left", _movie_left);
	$("#top-movie").css("height", _movie_height);
}

//--↑↑↑ このへん要らない気がする.... ↑↑↑--//
