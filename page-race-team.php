<?php
/**
 * Template Name: page Race team
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
				<h1 class="entry-title"><span><em><?php the_title(); ?></em></span></h1>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
						
							<?php
							$riders_query = new WP_Query(array('post_type' => 'page', 'post_parent' => get_the_ID(), 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => '-1'));

							// The Loop
							if($riders_query->have_posts()){
							echo '<ul class="rider-list">';
							while ( $riders_query->have_posts() ) : $riders_query->the_post();
							$custom = get_post_custom(get_the_ID());
							$number = '';
							if(!empty($custom['number'][0])){
							$number = '#'.$custom['number'][0];
							}
							?>
								<li>
								<?php								
								$photo_id = get_featured_image_id(get_the_ID());								
								if(!empty($photo_id)){
								$photo = wp_get_attachment_image_src($photo_id, 'full');
								?>
									<div class="thumbs-img">
                                        <?php /* ?>
										<img src="<?php echo get_thumb($photo[0], 160, 230, 1);?>" alt="<?php the_title(); ?>">
                                        <?php */ ?>
                                        <img src="<?php echo get_thumb($photo_id, 160, 230, 1);?>" alt="<?php the_title(); ?>">
										<div class="link-holder">
											<a href="<?php the_permalink(); ?>">View</a>
										</div>
									</div>
								<?php }?>	
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <?php echo $number;?></a></h3>
									<?php 
									$rider_excerpt = get_the_excerpt();
									echo '<p>'.$rider_excerpt.' <a href="'.get_permalink().'" title="Read more about '.get_the_title().'">read more</a></p>';
									?>
									<?php //the_excerpt();?>			
								</li>
								
							<?php 	
							endwhile;
							echo '</ul>';
							}
							// Reset Post Data
							wp_reset_postdata();
							?>
				
				<?php //	endwhile; ?>
				<?php //}?>			
				<?php wp_reset_postdata(); ?>
			</div>

			<?php //comments_template( '', true ); ?>

<?php endif; ?>

		</div>


<?php get_footer(); ?>
