<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>

	<div id="nav-above" class="navigation">
		<div class="nav-previous">
			<?php next_posts_link( '<span class="meta-nav">&larr;</span> Older posts'); ?>
		</div>
		<div class="nav-next">
			<?php previous_posts_link( 'Newer posts <span class="meta-nav">&rarr;</span>'); ?>
		</div>
	</div>
	
<?php endif; ?>

<?php if ( ! have_posts() ) : ?>

	<div id="post-0" class="post hentry error404 not-found">
		<h1 class="entry-title">Not Found</h1>
		<div class="entry-content">
			<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
			<?php get_search_form(); ?>
		</div>
	</div>
	
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<div class="top">
		<div class="date-box">
			<em><?php the_time('M');?></em>
			<strong><?php the_time('j');?></strong>
			<em class="comments"><img src="<?php bloginfo('template_directory'); ?>/images/buble.png" alt="#" /><?php comments_number( '0', '1', '%' ); ?></em>
		</div>
		<div class="holder">
			<h3 class="hentry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<em class="post-info"><span class="entry-date"><?php the_date() ?></span> - Posted in <?php the_category(', '); ?></em>
		</div>
	</div>
	<div class="hentry-content">
		<?php if ( is_archive() || is_search() ) : ?>
	
			<div class="entry-summary">
				<?php 
				$cont = get_the_excerpt(); 
				if (!$cont) $cont = short_content(get_the_content()); 
				echo $cont;
				?>
			</div>
			
		<?php else : ?>
		
				<?php the_content( 'Continue reading &rarr;' ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">Pages:', 'after' => '</div>' ) ); ?>
			
			
		<?php endif; ?>
	</div>
	<ul class="post-info">
		<li class="comments"><?php comments_popup_link( '0 COMMENTS', '1 COMMENT', '% COMMENTS', 'comments-link', 'Comments are off for this post'); ?></li>
		<li><a href="<?php the_permalink();?>/#respond">Post A Comment</a></li>
	</ul>

	<ul class="share-box addthis_toolbox" addthis:url="<?php echo the_permalink();?>" addthis:title="<?php echo  the_title();?>">
		<li><a href="#" class="addthis_button_facebook">Share on Facebook</a></li>
		<li><a href="#" class="addthis_button_twitter">Tweet This</a></li>
		<li><a href="http://www.addthis.com/bookmark.php" class="share-any addthis_button">Share Anywhere</a></li>
	</ul>
	
	
	<!--<div class="entry-utility">
		<?php show_posted_in(); // defined in functions.php ?>
	</div>-->
	 
</div>

<?php comments_template( '', true ); ?>
<?php endwhile; ?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>

	<div id="nav-below" class="navigation">
		<div class="nav-previous">
			<?php next_posts_link( '<span class="meta-nav">&larr;</span> Older posts' ); ?>
		</div>
		<div class="nav-next">
			<?php previous_posts_link( 'Newer posts <span class="meta-nav">&rarr;</span>' ); ?>
		</div>
	</div>
	
<?php endif; ?>
