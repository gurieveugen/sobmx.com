<?php
/**
 * Template Name: page Media
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
		<div id="content" role="main">
		<?php wp_nav_menu( array( 'menu' => 'MainMenu','container' =>false,'menu_id' =>'nav' ) ); ?>
		<h1 class="entry-title"><span><em>Media</em></span></h1>
		<div class="media-area">
			<h2 class="subtitle">SOBMX VIDEOS</h2>
			<div class="video-plugin">
				<img src="<?php bloginfo('template_directory'); ?>/images/video-plugin.jpg" alt="#" />
			</div>
			<h2 class="subtitle">PHOTO GALLERIES</h2>
			<ul class="gallery-list">
				<li>
					<div class="img"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/photo.jpg" alt="#" /></a></div>
					<div class="txt">
						<h4><a href="#">Sample Photo Gallery Title</a></h4>
						<p>Sample gallery description, lorem ipsum dolor sit amet, consectetur adipisicing</p>
					</div>
				</li>
				<li>
					<div class="img"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/photo.jpg" alt="#" /></a></div>
					<div class="txt">
						<h4><a href="#">Sample Photo Gallery Title</a></h4>
						<p>Sample gallery description, lorem ipsum dolor sit amet, consectetur adipisicing</p>
					</div>
				</li>
				<li>
					<div class="img"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/photo.jpg" alt="#" /></a></div>
					<div class="txt">
						<h4><a href="#">Sample Photo Gallery Title</a></h4>
						<p>Sample gallery description, lorem ipsum dolor sit amet, consectetur adipisicing</p>
					</div>
				</li>
				<li>
					<div class="img"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/photo.jpg" alt="#" /></a></div>
					<div class="txt">
						<h4><a href="#">Sample Photo Gallery Title</a></h4>
						<p>Sample gallery description, lorem ipsum dolor sit amet, consectetur adipisicing</p>
					</div>
				</li>
				<li>
					<div class="img"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/photo.jpg" alt="#" /></a></div>
					<div class="txt">
						<h4><a href="#">Sample Photo Gallery Title</a></h4>
						<p>Sample gallery description, lorem ipsum dolor sit amet, consectetur adipisicing</p>
					</div>
				</li>
				<li>
					<div class="img"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/photo.jpg" alt="#" /></a></div>
					<div class="txt">
						<h4><a href="#">Sample Photo Gallery Title</a></h4>
						<p>Sample gallery description, lorem ipsum dolor sit amet, consectetur adipisicing</p>
					</div>
				</li>
			</ul>
		</div>

		</div>


<?php get_footer(); ?>
