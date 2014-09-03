<?php

/**

 * Template Name: page Media Photo Details

 * @package WordPress

 * @subpackage Base_Theme

 */

?>

<?php get_header(); ?>

<?php get_sidebar(); ?>

<div id="content" role="main" class="content-contact">

	<?php wp_nav_menu( array( 'menu' => 'MainMenu','container' =>false,'menu_id' =>'nav' ) ); ?>

	<?php if ( have_posts() ) : the_post(); ?>

	<div class="media-filter-holder cf">
		<ul class="media-filter">
			<li><a href="#">Instagram</a></li>
			<li><a href="#">Practice Training</a></li>
			<li><a href="#">Race Events</a></li>
			<li><a href="#">Team Riders</a></li>
			<li><a href="#">Tracks</a></li>
			<li class="active"><a href="#">Videos</a></li>
		</ul>
	</div>
	<h2 class="subtitle">Instagram</h2>

	<?php endif; ?>

</div>

<?php get_footer(); ?>

