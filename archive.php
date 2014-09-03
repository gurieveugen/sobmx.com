<?php
/**
 *
 * @package WordPress
 */
?>
<?php get_header(); ?>

			<div id="content" role="main">
				<?php wp_nav_menu( array( 'menu' => 'MainMenu','container' =>false,'menu_id' =>'nav' ) ); ?>
				<h1 class="page-title">
				<span><em><?php global $post;
					 			  if ( is_day() ) : 
					 				echo 'Daily Archives: <span>'.get_the_date().'</span>';
					 			  elseif ( is_month() ) : 
					 			  	echo 'Monthly Archives: <span>'.get_the_date('F Y').'</span>';
					 			  elseif ( is_year() ) :  
					 			  	echo 'Yearly Archives: <span>'.get_the_date('Y').'</span>';
					 			  elseif ( is_tag() ) :  
					 			  	echo 'Tag Archives: <span>'.single_tag_title().'</span>';
					 			  else : 
					 			  	echo 'Blog Archives';
					 			  endif; 
					 			 ?></em></span>
				</h1>
				<?php include("loop.php"); ?>
			</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
