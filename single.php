<?php
/**
 *
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>

			<div id="content" role="main">
			<?php wp_nav_menu( array( 'menu' => 'MainMenu','container' =>false,'menu_id' =>'nav' ) ); ?>

<div class="two-holder">
			<div class="two-column">
			<div class="content">
					<?php if ( have_posts() ) : the_post(); ?>

				<div id="nav-above" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&larr; Previous post </span> %title'); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav"> &rarr; Next post link </span>' ); ?></div>
				</div>

				<div id="post-<?php the_ID(); ?>" class="post hentry single-post">
					<!--<h1 class="entry-title"><span><em><?php the_title(); ?></em></span></h1>-->
					<div class="top">
						<div class="date-box">
							<em><?php the_time('M');?></em>
							<strong><?php the_time('j');?></strong>
							<em class="comments"><img src="<?php bloginfo('template_directory'); ?>/images/buble.png" alt="#" /><?php comments_number( '0', '1', '%' ); ?></em>
						</div>
						<div class="holder">
							<h1 class="hentry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
							<em class="post-info"><span class="entry-date"><?php the_date() ?></span> - Posted in <?php the_category(', '); ?></em>
						</div>
					</div>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link"> Pages:', 'after' => '</div>' ) ); ?>
					</div>

				<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ),  60  ); ?>
						</div>
						<div id="author-description">
							<h2>About <?php the_author() ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									View all posts by <?php the_author() ?> <span class="meta-nav">&rarr;</span>
								</a>
							</div>
						</div>
					</div>
				<?php endif; ?>

					<ul class="post-info">
						<li class="comments"><?php comments_popup_link( '0 COMMENTS', '1 COMMENT', '% COMMENTS', 'comments-link', 'Comments are off for this post'); ?></li>
						<li><a href="<?php the_permalink();?>/#respond">Post A Comment</a></li>
					</ul>
				
					<ul class="share-box addthis_toolbox" addthis:url="<?php echo the_permalink();?>" addthis:title="<?php echo  the_title();?>">
						<li><a href="#" class="addthis_button_facebook">Share on Facebook</a></li>
						<li><a href="#" class="addthis_button_twitter">Tweet This</a></li>
						<li><a href="http://www.addthis.com/bookmark.php" class="share-any addthis_button">Share Anywhere</a></li>
					</ul>
				</div>

				<div id="nav-below" class="navigation">
					<div class="nav-next"><?php next_post_link( '%link', '<span class="meta-nav">&rarr; Next Entry:</span> %title ' ); ?></div>
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&larr; Previous Entry:</span> %title'); ?></div>					
				</div>

				<?php comments_template( '', true ); ?>

<?php endif; ?>
				</div>
				<?php get_template_part('aside'); ?>
</div>
		</div>


			</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
