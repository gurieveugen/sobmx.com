<?php
/**
 * Template Name: page Single rider
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
				<h1 class="entry-title"><span><em><?php the_title(); ?></em></span> <a href="<?php echo get_permalink($post->post_parent);?>" class="btn-back">&laquo; Back to Race Team</a></h1>
				<div class="entry-content">
					<div class="single-rider">
						<div class="feature-img">
							<?php								
								$photo_id = get_featured_image_id(get_the_ID());								
								if(!empty($photo_id)){
								$photo = wp_get_attachment_image_src($photo_id, 'full');
								?>
                                <?php /* ?>
								<img src="<?php echo get_thumb($photo[0], 160, 230, 1);?>" alt="<?php the_title(); ?>">
                                <?php */ ?>
                                <img src="<?php echo get_thumb($photo_id, 160, 230, 1);?>" alt="<?php the_title(); ?>">
									
								<?php }?>	
						</div>
						<div class="txt-holder">
							<?php the_content(); ?>
						</div>
						
						<?php 
						$rider_video_shortcode = get_post_meta(get_the_ID(), 'video', true);
						if(!empty($rider_video_shortcode)){ ?>						
							<div class="clear-box">
							<h4 class="subtitle"><?php the_title(); ?> Videos</h4>
							<?php echo do_shortcode($rider_video_shortcode); ?>
							</div>						
						<?php }	?>

						
						<?php 
						$gallery_id = get_post_meta(get_the_ID(), 'Gallery ID', true);
						if(!empty($gallery_id)){ ?>						
							<div class="clear-box">
							<h4 class="subtitle"><?php the_title(); ?> Photos</h4>
							<?php echo nggShowGallery( $gallery_id, '', 1000 ) ; ?>
							</div>						
						<?php }	?>						
						
					</div>
				</div>
			
			</div>

			<?php //comments_template( '', true ); ?>

<?php endif; ?>

		</div>


<?php get_footer(); ?>
