<?php
/**
 *
 * @package WordPress
 * @subpackage Base_Theme
 */

get_header(); ?>

		<div id="content" role="main">
		<?php wp_nav_menu( array( 'menu' => 'MainMenu','container' =>false,'menu_id' =>'nav' ) ); ?>
			<h1 class="entry-title">
				<span><em>Category Archives: <span class="results"><?php echo single_cat_title( '', false ) ?></span></em></span>
			</h1>
			<?php
				$category_description = category_description();
				if ( ! empty( $category_description ) )
					echo '<div class="archive-meta">' . $category_description . '</div>';
				include('loop.php');
			?>
		</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
