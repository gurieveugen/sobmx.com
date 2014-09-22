<?php

/**
 * Template Name: page Media Photo Details
 * @package WordPress
 * @subpackage Base_Theme
 */

?>

<?php get_header(); ?>

<?php get_sidebar(); ?>

<?php

$gallery_istagram          = get_post_meta(get_the_ID(), 'gallery_istagram', true);
$gallery_practice_training = get_post_meta(get_the_ID(), 'gallery_practice_training', true);
$gallery_race_events       = get_post_meta(get_the_ID(), 'gallery_race_events', true);
$gallery_team_riders       = get_post_meta(get_the_ID(), 'gallery_team_riders', true);
$gallery_tracks            = get_post_meta(get_the_ID(), 'gallery_tracks', true);
$gallery_videos            = get_post_meta(get_the_ID(), 'gallery_videos', true);

?>
<div id="content" role="main">

	<?php wp_nav_menu( array( 'menu' => 'MainMenu','container' =>false,'menu_id' =>'nav' ) ); ?>

	<?php if ( have_posts() ) : the_post(); ?>

	<h1 class="entry-title v1"><span><em>Media</em></span></h1>
	<div class="content-media">
		
		<div class="media-filter-holder cf">
			<ul class="media-filter">
				<li  class="active"><a href="#block-instagram">Instagram</a></li>
				<li><a href="#block-practice-training">Practice Training</a></li>
				<li><a href="#block-race-events">Race Events</a></li>
				<li><a href="#block-team-riders">Team Riders</a></li>
				<li><a href="#block-tracks">Tracks</a></li>
				<li><a href="#block-videos">Videos</a></li>
			</ul>
		</div>
		<h2 class="subtitle m-f-subtitle">Instagram</h2>
		<div class="gallery-container">
			<div id="block-instagram" class="block instagram">
				<?php echo do_shortcode($gallery_istagram); ?>
			</div>
			<div id="block-practice-training" class="block practice-training" style="display: none;">
				<?php echo do_shortcode($gallery_practice_training); ?>
			</div>
			<div id="block-race-events" class="block race-events" style="display: none;">
				<?php echo do_shortcode($gallery_race_events); ?>
			</div>
			<div id="block-team-riders" class="block team-riders" style="display: none;">
				<?php echo do_shortcode($gallery_team_riders); ?>
			</div>
			<div id="block-tracks" class="block tracks" style="display: none;">
				<?php echo do_shortcode($gallery_tracks); ?>	
			</div>
			<div id="block-videos" class="block videos" style="display: none;">
				<?php echo do_shortcode($gallery_videos); ?>
			</div>
		</div>
	</div>

	<?php endif; ?>

</div>
<script>
	jQuery(function(){
		jQuery('.media-filter a').click(function(){
			jQuery('.m-f-subtitle').text(jQuery(this).text());
		});
	});
</script>

<?php get_footer(); ?>

