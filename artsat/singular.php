<?php
/**
 * Singular Template
 *
 * This is the default singular template.  It is used when a more specific template can't be found to display
 * singular views of posts (any post type).
 *
 * @package Origin
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<?php do_atomic( 'before_content' ); // origin_before_content ?>
	<div id="content">
		<div id="page-content">
			<div id="left-box">
				<?php
					/* 現在のカテゴリ－orポストタイプの取得と月別アーカイヴの処理 */
					//カテゴリー取得
					$cat_now = get_the_category(); 
					$cat_now = $cat_now[0];
					$now_name = $cat_now->cat_name;
					$now_id = $cat_now->cat_ID;
					$this_archive = 'cat='.$now_id;
					//ポストタイプ取得
					$post_type =  get_post_type(); 
					if($now_name == 'NEWS'){
						echo '<img src="/img/title/news.gif" class="page-title-img">';
						echo '<div id="monthly-list">';
						wp_get_archives($this_archive);
						echo '</div>';
					}else if($post_type =='blog'){
						echo '<img src="/img/title/blog.gif" class="page-title-img">';
						echo '<div id="monthly-list">';
						$args = array(
							'post_type' => 'blog',
							'type' => 'monthly',
							'echo' => 0
						);
						$list = wp_get_archives($args);
						echo "<ul>$list</ul>";
						echo '</div>';
					}else if($post_type =='education'){
						echo '<img src="/img/title/education.gif" class="page-title-img">';
						echo '<div id="monthly-list">';
						$args = array(
							'post_type' => 'education',
							'type' => 'monthly',
							'echo' => 0
						);
						$list = wp_get_archives($args);
						echo "<ul>$list</ul>";
						echo '</div>';
					}
				?>
			</div>
		
			<div id="right-box">
				<?php do_atomic( 'open_content' ); // origin_open_content ?>
		
				<div class="hfeed">
		
					<?php if ( have_posts() ) : ?>
		
						<?php while ( have_posts() ) : the_post(); ?>
		
							<?php do_atomic( 'before_entry' ); // origin_before_entry ?>
		
							<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
		
								<?php do_atomic( 'open_entry' ); // origin_open_entry ?>
		
								<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
		
								<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( '[entry-published]', 'origin' ) . '</div>' ); ?>
		
								<div class="entry-content">
									
									<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'origin' ) ); ?>
									
									<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'origin' ), 'after' => '</p>' ) ); ?>
									
								</div><!-- .entry-content -->
		
								<?php do_atomic( 'close_entry' ); // origin_close_entry ?>
		
							</div><!-- .hentry -->
		
							<?php do_atomic( 'after_entry' ); // origin_after_entry ?>
		
							<?php get_sidebar( 'after-singular' ); // Loads the sidebar-after-singular.php template. ?>
		
							<?php do_atomic( 'after_singular' ); // origin_after_singular ?>
		
		
						<?php endwhile; ?>
		
					<?php endif; ?>
		
				</div><!-- .hfeed -->
		
				<?php do_atomic( 'close_content' ); // origin_close_content ?>
		
				<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>
		
			</div>
		</div>
	</div>

	<?php do_atomic( 'after_content' ); // origin_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>