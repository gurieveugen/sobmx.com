<?php
/**
 * Template Name: page Calendar
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
		<div id="content" role="main">
			<?php wp_nav_menu( array( 'menu' => 'MainMenu','container' =>false,'menu_id' =>'nav' ) ); ?>

<?php if ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="entry-title"><span><em>Schedule & Events</em></span></h1>
				<div class="entry-content">
					<script type="text/javascript">
					jQuery(document).ready(function() {
							jQuery("#ajax-content").load('<?php bloginfo('url');?>?action=ajax-page&ajax_page_id=175');
					});
					</script>
					<div id="ajax-content"></div>
					
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">Pages:', 'after' => '</div>' ) ); ?>
					<?php edit_post_link('Edit', '<span class="edit-link">', '</span>' ); ?>
				</div>
			</div>

			<?php comments_template( '', true ); ?>

<?php endif; ?>

		</div>


<?php get_footer(); ?>
