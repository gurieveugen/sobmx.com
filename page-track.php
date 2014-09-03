<?php
/**
 * Template Name: page Particular Track
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
		<div id="content" role="main">
			<?php wp_nav_menu( array( 'menu' => 'MainMenu','container' =>false,'menu_id' =>'nav' ) ); ?>

<?php if ( have_posts() ) : the_post(); ?>

<?php 	$video_lap_shortcode = get_post_meta(get_the_ID(), 'Video Lap', true); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="entry-title"><span><em><?php the_title(); ?></em></span></h1>
				<div class="entry-content">
					<div class="track-info">
						<div class="track-map"><?php
								$custom = get_post_custom(get_the_ID());
								$thumbnail_id = get_featured_image_id(get_the_ID()); 
								if(!empty($thumbnail_id)){
								$thumbnail = wp_get_attachment_image_src($thumbnail_id, 'full');?>
									<a href="<?php echo $thumbnail[0];?>" class="fancybox"><img src="<?php echo get_thumb($thumbnail_id, 415, 300, 1);?>" alt="<?php the_title();?>" /></a>
							<?php	}
							?>
						</div>
						<div class="holder">
							<div class="cell">
								<ul class="track-tools">
									<li><a href="<?php echo $thumbnail[0];?>" class="fancybox">Track Map</a></li>
									<?php if(!empty($video_lap_shortcode)){?>
									<li><a href="#video_lap" class="fancybox">Video Lap</a></li>
									<?php }else{?>
									<li><a href="#" class="coming-soon">Video Lap</a></li>
									<?php }?>
								</ul>
								<div class="holder">
									<h2><?php the_title();?></h2>
									<ul>
										<li>Ability Level: <?php echo $custom['Ability Level'][0];?></li>
										<li>Dirt Type: <?php echo $custom['Dirt Type'][0];?></li>
										<li>Lap Time: <?php echo $custom['Lap Time'][0];?></li>
									</ul>
								</div>
							</div>
						</div>
						<?php the_content(); ?>
					

						<?php 
						$track_video_shortcode = get_post_meta(get_the_ID(), 'Track Video', true);
						if(!empty($track_video_shortcode)){ ?>						
							<div class="clear-box">
							<h4 class="subtitle">Track Video</h4>
							<?php echo do_shortcode($track_video_shortcode); ?>
							</div>						
						<?php }	?>						
					
					
						<?php 
						$gallery_id = get_post_meta(get_the_ID(), 'Gallery ID', true);
						if(!empty($gallery_id)){ ?>						
							<div class="clear-box">
							<h4 class="subtitle">Track Photos</h4>
							<?php //echo do_shortcode('[nggallery id='.$gallery_id.']'); ?>
							<?php echo nggShowGallery( $gallery_id, '', 1000 ) ; ?>
							</div>						
						<?php }	?>
						
									
						
						<?php
						if(!empty($video_lap_shortcode)){ ?>
						<div style="display:none">
							<div id="video_lap"><?php echo do_shortcode($video_lap_shortcode); ?></div>
						</div>
						<?php }?>
						
					</div>
					
					
				</div>
			</div>

			<?php /* comments_template( '', true ); */ ?>

<?php endif; ?>

		</div>


<?php get_footer(); ?>
