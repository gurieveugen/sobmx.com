<?php
/**
 *
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
				<h2 class="subtitle">Tracks</h2>				
				<?php
				$tracks_query = new WP_Query(array('post_type' => 'page', 'post_parent' => get_the_ID(), 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => '-1'));

				// The Loop
				if($tracks_query->have_posts()){
				echo '<ul class="tracks-list">';
				while ( $tracks_query->have_posts() ) : $tracks_query->the_post();
				$custom = get_post_custom(get_the_ID());
				?>
					<li>
					<?php
					$cover = $wpdb->get_var("SELECT guid FROM $wpdb->posts WHERE post_title = 'cover' AND post_parent = ".get_the_ID()." AND post_type = 'attachment' ");
					if(!empty($cover)){
					?>
						<div class="thumbs-img">
							<img src="<?php echo $cover;?>" alt="#" />
							<div class="link-holder">
								<a href="<?php the_permalink(); ?>">More Info</a>
							</div>
						</div>
					<?php }?>	
					<h3><?php the_title(); ?></h3>						
						<ul>
							<li>Ability Level: <?php echo $custom['Ability Level'][0];?></li>
							<li>Dirt Type: <?php echo $custom['Dirt Type'][0];?></li>
							<li>Lap Time: <?php echo $custom['Lap Time'][0];?></li>
						</ul>					
					</li>
					
				<?php 	
				endwhile;
				echo '</ul>';
				}
				// Reset Post Data
				wp_reset_postdata();
				?>
			</div>

			<?php //comments_template( '', true ); ?>

<?php endif; ?>

		</div>


<?php get_footer(); ?>
