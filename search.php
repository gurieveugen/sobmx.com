<?php
/**
 *
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>

			<div id="content" role="main">
			<?php wp_nav_menu( array( 'menu' => 'MainMenu','container' =>false,'menu_id' =>'nav' ) ); ?>
			<?php if ( have_posts() ) : ?>
				<h1 class="page-title">
					<span><em>Search Results for: <span class="results"> <?php echo get_search_query() ?></span></em></span>
				</h1>
				<?php include('loop.php');	?>
			<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><span><em>Nothing Found</em></span></h2>
					<div class="entry-content">
						<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
						<?php get_search_form(); ?>
					</div>
				</div>
			<?php endif; ?>
			</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
