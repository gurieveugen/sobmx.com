<?php



/**



 * Template Name: page Training Staff



 * @package WordPress



 * @subpackage Base_Theme



 */



?>


<?php get_header(); ?>

<?php get_sidebar(); ?>

		<div id="content" role="main">

			<?php wp_nav_menu( array( 'menu' => 'MainMenu','container' =>false,'menu_id' =>'nav' ) ); ?>

<?php if ( have_posts() ) : the_post(); ?>


	<h1 class="entry-title"><span><em><?php the_title(); ?></em></span></h1>

	<?php the_content(); ?>


	<?php wp_link_pages( array( 'before' => '<div class="page-link">Pages:', 'after' => '</div>' ) ); ?>


	<?php edit_post_link('Edit', '<span class="edit-link">', '</span>' ); ?>

<?php endif; ?>

</div>

<?php get_footer(); ?>



