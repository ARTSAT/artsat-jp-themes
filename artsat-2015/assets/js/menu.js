(function(){

  /*
    preload finnished
  */

  Pace.on("done", function(){
    $('#wrapper').addClass('visible');
  });


  /*
   toggle menu actions
  */

  $('document').ready(function() {

    $('#wrapper #content #menu-btn .content').click(function() {
      $('#menu').addClass('visible');
      $("html, body").animate({scrollTop:0},300);

      $('#menu .wrapper .list ul.top>li').addClass('animate');

      /*
       menu list delay
      */

      $('#menu .wrapper .list ul.top>li')
        .each(function(i){
          $(this).css({'opacity': 0});
          $(this).css({'animation-delay': 60 * i + 'ms'});
          $(this).css({'-webkit-animation-delay': 60 * i + 'ms'});
          $(this).css({'-moz-animation-delay': 60 * i + 'ms'});
          $(this).css({'-ms-animation-delay': 60 * i + 'ms'});
      });

    });

    $('#dismiss .content').click(function() {
      $('#menu').removeClass('visible');
      $('#menu').addClass('hide');
      //$('#menu .wrapper .list ul.top>li').removeClass('animate');
      $('#menu .wrapper .list ul.top>li').addClass('animate-out');
    });

    $('#menu .wrapper .list ul.top>li').bind("webkitAnimationEnd mozAnimationEnd msAnimationEnd oAnimationEnd animationEnd", function() {
      $(this).removeClass('animate');
      $(this).css({opacity:1});

      $('#menu .wrapper .list ul.top>li')
        .each(function(i){
          if (-1 < ($(this).attr('class')).search('animate-out')) {
            $(this).removeClass('animate-out');
            console.log($(this).attr('class'));
          }
        });

    });


    $('#menu').bind("webkitAnimationEnd mozAnimationEnd msAnimationEnd oAnimationEnd animationEnd", function(){
      $(this).removeClass('hide');
    });


    /*
      menu link events
    */

    $('#menu .wrapper .list a').click(function() {
      //alert('a');
      var pass = $(this).attr("href");
      $('#menu').removeClass('visible');
      $('#content').css({opacity: 0});
      $('header#content').css({opacity: 1});
      $('#menu').addClass('hide');

      $('#menu').bind("webkitAnimationEnd mozAnimationEnd msAnimationEnd oAnimationEnd animationEnd", function(){
        location.href = pass;
      });
      return false;
    })

  });
})();
