<?php
/**
 * Template Name: page testimonials
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
		<div id="content" role="main">
			<?php wp_nav_menu( array( 'menu' => 'MainMenu','container' =>false,'menu_id' =>'nav' ) ); ?>


			
					<h2 class="entry-title"><span><em>Testimonials</em></span></h2>
						<div class="entry-content testimonials-content">
							<div class="container">
							<?php
							//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							query_posts('post_type=page&post_parent='.$post->ID.'&orderby=menu_order&order=asc&posts_per_page=-1');
							?>
							
							<?php while ( have_posts() ) : the_post(); ?>
								<blockquote>
									<div>
										<div class="message">
											<q><?php the_content();?></q>
											<span class="corner">&nbsp;</span>
										</div>
										<cite><?php the_title();?></cite>
									</div>
								</blockquote>
							<?php endwhile; ?>
							
							<?php if ( $wp_query->max_num_pages > 1 ) : ?>

								<div id="nav-below" class="navigation">
									<div class="nav-previous">
										<?php next_posts_link( '<span class="meta-nav">&larr;</span> Older testimonials' ); ?>
									</div>
									<div class="nav-next">
										<?php previous_posts_link( 'Newer testimonials <span class="meta-nav">&rarr;</span>' ); ?>
									</div>
								</div>
								
							<?php endif; ?>		
							<?php wp_reset_query(); ?>
							</div>
							
														
							<div class="column">
							
								<?php if ( is_active_sidebar( 'Main Sidebar' ) ) : ?>
									<?php dynamic_sidebar( 'Main Sidebar' ); ?>
								<?php endif; ?>
							
							</div>
						</div>

		</div>


<?php get_footer(); ?>
