<?php
/**
 * @package WordPress
 * @subpackage Base_theme
 */
?>
	<div id="sidebar">
		<div class="sb-holder">
			<div class="links-holder">
				<h3><span>Quick links</span></h3>
				<?php wp_nav_menu( array( 'menu' => 'QuickMenu','container' =>false,'menu_id' =>'menu' ) ); ?>
			</div>
			<a href="http://sobmx.com/registration/" class="btn-registration">registration</a>
			<a href="http://sobmx.com/schedule-events/" class="btn-shedule">shedule</a>
			<a href="/media-develop-2/" class="btn-gallery">gallery</a>
			<a href="/videos" class="btn-youtube">videos</a>
		</div>
	</div>