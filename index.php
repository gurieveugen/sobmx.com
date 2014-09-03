<?php
/**
 * @package WordPress
 * @subpackage adility
 */
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div id="content" role="main">
		<?php wp_nav_menu( array( 'menu' => 'MainMenu','container' =>false,'menu_id' =>'nav' ) ); ?>
		<h1 class="entry-title"><span><em>News</em></span></h1>
		<div class="two-holder">
			<div class="two-column">
				<div class="content">
					<?php include("loop.php"); ?>
					<?php wp_pagenavi(); ?>
				</div>
				<?php get_template_part('aside'); ?>
			</div>
		</div>
		
	</div>
<?php get_footer(); ?>
