<?php get_header(); ?>
<?php get_sidebar(); ?>


<!-- #contents -->
<div id="contents">

<!-- #slides -->
<div id="slides">
<div class="slides_inner">
<?php
$lastposts = get_posts('include=5&post_type=page');
foreach($lastposts as $post) :
setup_postdata($post);
?>
<?php echo c2c_get_custom('index-photos','','','','',''); ?>
<?php endforeach; ?>
</div>
<a href="#" class="prev"></a>
<a href="#" class="next"></a>
</div>
<!-- /#slides -->

<div class="clearfix index-text-wapper">
<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'search',
  search: 'dicesat',
  interval: 30000,
  title: 'dicesat',
  subject: '<a href="http://dicesat.net/" target="_blank">衛星すごろく</a>',
  width: 340,
  height: 210,
  theme: {
    shell: {
      background: '#000000',
      color: '#ffffff'
    },
    tweets: {
      background: '#f2f2f2',
      color: '#666666',
      links: '#000000'
    }
  },
  features: {
    scrollbar: false,
    loop: true,
    live: true,
    behavior: 'default'
  }
}).render().start();
</script>

<div id="index-text-blog" class="index-text">
<div>
<h3><a href="" target="_blank"></a></h3>
<p></p>
</div>
<a href="http://artsat.tumblr.com/" target="_blank" class="viewmore" >VIEW MORE</a>
</div>

</div>
<!-- /.index-text-wapper -->

<div class="clearfix index-text-wapper">

<div id="index-text-about" class="index-text">
<div>
<h3>衛星データを用いたアートプロジェクト</h3>
衛星芸術とは、地球を周回する衛星を「宇宙と地上を結ぶメディア」であると捉え、そこからサウンドアートや、インタラクティブなメディアアート作品など、広く芸術作品への応用やデザイン展開、さらにはゲームやエンターテインメント活用を行うプロジェクトです。衛星のオープンかつソーシャルな運用を可能にすることで、衛星を専門家のための「特別なモノ」から、市民の日常の中の「身近なコト」へと変えていきます。
</div>
<a href="<?php bloginfo('url'); ?>/about/" class="viewmore">VIEW MORE</a>
</div>

<div id="index-text-invader" class="index-text">
<div>
<h3>アート&デザインのための衛星</h3>
芸術衛星 INVADER (INteractiVe satellite for Art and Design Experimental Research) は、衛星芸術専用の1U CubeSat規格衛星です。CubeSatとしての最小限の機能を最大限に活用して、さまざまな衛星芸術ミッションを行います。衛星開発の主体は、東京大学チームが担当し、地上局系、およびデータ利用系を多摩美術大学チームが担当します。
</div>
<a href="<?php bloginfo('url'); ?>/invader/" class="viewmore">VIEW MORE</a>
</div>

</div>
<!-- /.index-text-wapper -->

<ul id="link-banner" class="clearfix">
<?php
$lastposts = get_posts('include=17&post_type=page');
foreach($lastposts as $post) :
setup_postdata($post);
?>
<?php echo c2c_get_custom('banner-link','','','','',''); ?>
<?php endforeach; ?>
</ul>
<br />

</div>
<!-- /#contents -->

<?php get_footer(); ?>
