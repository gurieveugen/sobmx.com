<?php
/**
 * @package WordPress
 * @subpackage adility
 */
?>
<?php get_header(); ?>

				<div class="main-holder">
					
					<div id="content">
						<!--<ul id="nav">
							<li><a href="#">HOME</a></li>
							<li><a href="#">TRAINING</a></li>
							<li><a href="#">FACILITY</a></li>
							<li><a href="#">MEDIA</a></li>
							<li><a href="#">RACE TEAM</a></li>
							<li><a href="#">SOBX STORE</a></li>
							<li><a href="#">NEWS</a></li>
							<li><a href="#">CONTACT</a></li>
						</ul>-->
						<?php wp_nav_menu( array( 'menu' => 'MainMenu','container' =>false,'menu_id' =>'nav' ) ); ?>
						<div class="slider-holder">
							<h1 class="slides-ttl">motocross training complex</h1>
						<?php
								$slides = $wpdb->get_results("SELECT *
									FROM $wpdb->posts
									WHERE post_parent = '".$post->ID."'
									AND post_type = 'attachment'
									AND post_title LIKE 'slide%'
									AND post_mime_type LIKE 'image%'
									ORDER BY menu_order ASC");
									
						if(!empty($slides)){
						?>			
							<span class="prev"><a href="#" id="prev-slide">prev</a></span>
							<span class="next"><a href="#" id="next-slide">next</a></span>
							<ul id="slider">
								<?php foreach($slides as $slide){?>
                                <?php /* ?>                                
								<li><a href="#"><img src="<?php echo get_thumb($slide->guid, 875, 539, 1);?>" alt="#" width="875" height="539" /></a></li>
                                <?php */ ?>
                                <li><a href="#"><img src="<?php echo get_thumb($slide->ID, 875, 539, 1);?>" alt="#" width="875" height="539" /></a></li>
								<?php }?>
							</ul>
							<?php 
						}	
							
							/*
							$home_block_pages = get_post_meta($post->ID, 'home_block_pages', true);							
							if(!empty($home_block_pages)){
							$hbp_array = explode(",", $home_block_pages);							
							$hbp_query = new WP_Query(array('post_type' => 'page', 'post__in' => $hbp_array, 'orderby' => 'menu_order', 'order' => 'asc'));
							?>							
							<ul class="ad-list">
								<?php while ( $hbp_query->have_posts() ) : $hbp_query->the_post(); ?>
								<?php $thumbnail_id = get_featured_image_id(get_the_ID()); ?>
								<li>
								<?php
									$video_code = get_post_meta(get_the_ID(), 'video', true);
									if(!empty($video_code)){ ?>
									<div style="display: none;">
										<div id="video_code_<?php the_ID()?>"><?php echo $video_code;?></div>
									</div>									
									<a href="#video_code_<?php the_ID()?>" class="video_link" title="<?php the_title();?>">		
									<?php }else{ ?>								
									<a href="<?php the_permalink();?>" title="<?php the_title();?>">
									<?php } ?>
									<?php if(!empty($thumbnail_id)){?>
									<?php $thumbnail = wp_get_attachment_image_src($thumbnail_id, 'full');?>
										<img src="<?php echo get_thumb($thumbnail[0], 244, 81, 1);?>" alt="<?php the_title();?>" />
									<?php }?>	
										<span><?php the_title();?></span>
									</a>
								</li>
								<?php endwhile; ?>
								<?php wp_reset_postdata();?>
							</ul>
							<?php } */?>


						<ul class="ad-list">
							<li><a href="category/race-event/" title="Race Events">
								<img src="/wp-content/themes/SOBMXtheme/timthumb.php?src=<?php bloginfo('url');?>/wp-content/uploads/2014/03/ad01-1.jpg&amp;w=244&amp;h=81&amp;zc=1&amp;q=100" alt="Race Events" />
								<span>Race Events</span>
								</a>
							</li>
							<li>
								<div style="display: none;">
									<div id="video_code_68"><iframe width="560" height="315" src="http://www.youtube.com/embed/C7hTtyjSQkM" frameborder="0" allowfullscreen></iframe></div>
								</div>									
								<a href="#video_code_68" class="video_link" title="Training Facility Feature Video">		
								<img src="/wp-content/themes/SOBMXtheme/timthumb.php?src=<?php bloginfo('url');?>/wp-content/uploads/2011/12/ad_2.jpg&amp;w=244&amp;h=81&amp;zc=1&amp;q=100" alt="Training Facility Feature Video" />
								<span>Training Facility Feature Video</span>
								</a>
							</li>
							<li><a href="/facility/on-site-amenities/" title="South of the Border Facilities">
								<img src="/wp-content/themes/SOBMXtheme/timthumb.php?src=<?php bloginfo('url');?>/wp-content/uploads/2011/12/ad03.jpg&amp;w=244&amp;h=81&amp;zc=1&amp;q=100" alt="South of the Border Facilities" />
								<span>South of the Border Facilities</span>
								</a>
							</li>
							</ul>
							
						</div>
					</div>
					<?php get_sidebar(); ?>
					
					
				</div>
				<?php
				$news_query = new WP_Query(array('posts_per_page' => 21));
				
				?>
				<div class="news-container">
					<div class="top">
						<h3>LATEST NEWS</h3>
						<div class="news-navigation">
							<em>Scroll for more</em>
							<a href="#" id="news-prev">prev</a>
							<a href="#" id="news-next">next</a>
						</div>
					</div>
					<ul class="news-holder" id="mycarousel">
					<?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
						<li class="news-block">
							<div class="date-box">
								<em><?php the_time('M');?></em>
								<strong><?php the_time('j');?></strong>
								<em class="comments"><img src="<?php bloginfo('template_directory'); ?>/images/buble.png" alt="#" /> <?php comments_number( '0', '1', '%' ); ?></em>
							</div>
							<div class="txt">
								<h3><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
								<?php the_excerpt();?>
								<div class="more">
									<a href="<?php the_permalink();?>" title="<?php the_title();?>">Read More &raquo;</a>
								</div>
							</div>
						</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					</ul>
				</div>
<?php get_footer(); ?>
