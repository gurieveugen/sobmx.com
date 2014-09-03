<?php

/**

 * Template Name: page Training

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

			<div class="entry-content">

				<?php the_content(); ?>

				<?php wp_link_pages( array( 'before' => '<div class="page-link">Pages:', 'after' => '</div>' ) ); ?>

				<?php edit_post_link('Edit', '<span class="edit-link">', '</span>' ); ?>

			</div>

<?php /* ?>
			<div class="people-section">
				<h2 class="entry-title"><span><em>Trainers</em></span></h2>
				<div class="entry-content three-columns cf">
					<div class="p-column">
						<img src="<?php echo bloginfo('template_directory'); ?>/images/trainer-1.jpg" alt="">
						<h4>Grant Ransdell</h4>
						<p>Grant has been racing motorcycles at a high level since the year 2000.  He holds the distinction of qualifying for Loretta Lynn’s the most consecutive years of any rider in the events history.  Grant also qualified for 5 Supercrosses last season in the 450 classes.</p>
					</div>
					<div class="p-column">
						<img src="<?php echo bloginfo('template_directory'); ?>/images/trainer-2.jpg" alt="">
						<h4>Hunter Mims</h4>
						<p>21 year old Hunter has been racing since 1997.  He has many amateur national podiums and qualified for 2 Supercrosses in the 2013/2014 season.  In addition to training riders, Hunter will be running all of the east coast rounds of the Lucas Oil Outdoor Nationals this summer.</p>
					</div>
					<div class="p-column">
						<img src="<?php echo bloginfo('template_directory'); ?>/images/trainer-3.jpg" alt="">
						<h4>Ryan Zimmer</h4>
						<p>Ryan has been a competitor in motocross since the age of 4.  He has been one of the top privateers in the Pro ranks securing the AMA Pro Racing Privateer of the Year award in 2013.  Ryan bring both knowledge of technique as well as a great understanding of what it takes to make it on the national level.</p>
					</div>
				</div>
			</div>
<?php */ ?>


			<h2 class="entry-title"><span><em>Pricing</em></span></h2>

			<div class="pricing-block">

							<h3>Riders holding an AMA/FIM Professional License</h3>

							<span class="notes">* Includes riding on MX track and Gym</span>

							<div class="plans-block">

								<ul class="plans-list">

									<li>

										<div class="plan-box">

											<h4>Private Room</h4>

											<strong>$1,145</strong>

											<span>per month</span>

										</div>

									</li>

									<li>

										<div class="plan-box red-box">

											<h4>Double Occupancy</h4>

											<strong>$875</strong>

											<span>per month</span>

										</div>

									</li>

								</ul>

							</div>

							<h3>Amateur Riders</h3>

							<span class="notes">* Includes riding on all tracks including MX, SX, AX and Gym</span>

							<div class="plans-block">

								<h4 class="ttl-holder"><strong>Monthly Training</strong> - includes training and instruction on and off bike</h4>

								<ul class="plans-list">

									<li>

										<div class="plan-box">

											<h4>Private Room</h4>

											<strong>$1,545</strong>

											<span>per month</span>

										</div>

									</li>

									<li>

										<div class="plan-box red-box">

											<h4>Semi Private Room</h4>

											<strong>$1,275</strong>

											<span>per month</span>

										</div>

									</li>

								</ul>

								<h4 class="ttl-holder"><strong>Weekly Training</strong> (Including Room)</h4>

								<ul class="plans-list">

									<li>

										<div class="plan-box">

											<h4>Pro Rate <span>(private room)</span></h4>

											<strong>$335</strong>

											<span>per week</span>

										</div>

									</li>

									<li>

										<div class="plan-box red-box">

											<h4>Pro Rate <span>(double occup.)</span></h4>

											<strong>$245</strong>

											<span>per week</span>

										</div>

										<span class="provide-text">* We do not provide roommates</span>

									</li>

									<li>

										<div class="plan-box">

											<h4>Amateur Rate <span>(private room)</span></h4>

											<strong>$635</strong>

											<span>per week</span>

										</div>

									</li>

									<li>

										<div class="plan-box red-box">

											<h4>Amateur Rate <span>(double occup.)</span></h4>

											<strong>$540</strong>

											<span>per week</span>

										</div>

										<span class="provide-text">* We do not provide roommates</span>

									</li>

								</ul>

								<span class="plan-notes">*Amateur Rate includes private room and 5 days of training on and off bike</span>

							</div><?php /* ?>

							<h3>Open to Public</h3>

							<p>$25 daily fee - please check our <a href="http://sobmx.com/schedule-events/">calendar</a> for days and times for open practices.</p><?php */ ?>

						</div>

			<?php

			$args = array('post_type' => 'page', 'post_parent' => $post->ID, 'orderby' => 'menu_order', 'order' => 'ASC');

			$training_query = new WP_Query( $args );

			

			?>

		    <script type="text/javascript">

				jQuery(window).load(function() {

					jQuery(".toggle").click(function(){

						var tr_id = jQuery(this).attr('rel');					

						var current_content = jQuery("#content_"+tr_id).css('display');

						

						jQuery(".tr-content").hide()

						jQuery(".tr-excerpt").show();

						

						/*

						jQuery("#content_"+tr_id).toggle('slow', function(){

							if('none' == jQuery("#content_"+tr_id).css('display')){

								jQuery("#excerpt_"+tr_id).show();

							} else {

								jQuery("#excerpt_"+tr_id).hide();

							}							

						});

						*/

						if(current_content == 'none'){

							jQuery("#excerpt_"+tr_id).hide();

							jQuery("#content_"+tr_id).show()

						} else {

							jQuery("#excerpt_"+tr_id).show();					

							jQuery("#content_"+tr_id).hide();

						}

						

						return false;

					});

				});

			</script>

				<!--<div class="training-holder">

				<?php while ( $training_query->have_posts() ) : $training_query->the_post(); ?>				

					<div class="training-post opened" id="training_<?php the_ID();?>">

						<?php $thumbnail_id = get_featured_image_id(get_the_ID()); ?>

						<?php if(!empty($thumbnail_id)){?>

						<?php $thumbnail = wp_get_attachment_image_src($thumbnail_id, 'full');?>

						<div class="feature-img">

							<a href="<?php the_permalink(); ?>" class="toggle" rel="<?php the_ID()?>"><img src="<?php echo get_thumb($thumbnail_id, 210, 115, 1);?>" alt="#" /></a>

							<div class="link-holder">

								<a href="<?php the_permalink(); ?>">Read More</a>

							</div>	

						</div>

						<?php }?>

						<div class="txt">

							<h3><a href="<?php the_permalink(); ?>" class="toggle" rel="<?php the_ID()?>"><?php the_title();?></a></h3>

							<div id="excerpt_<?php the_ID()?>" class="tr-excerpt"><?php the_excerpt();?></div>

							<div id="content_<?php the_ID()?>" class="tr-content" style="display:none">

								<?php the_content();?>

								<p class="info-price">Price:  Please Contact For Quote</p>

							</div>

						</div>

					</div>

				<?php 	endwhile; ?>

				<?php 	wp_reset_postdata(); ?>

				</div>-->



<?php endif; ?>



		</div>





<?php get_footer(); ?>

