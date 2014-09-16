<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 
		wp_head(); ?>
	<!--<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/autoscaling-menu.js"></script>-->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.all.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.autocolumnlist.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/inputs.js"></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/PIE.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/init-pie.js"></script>
	<![endif]-->
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php /* ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/fancybox/jquery.fancybox-1.3.4.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<?php */ ?>

	
	<?php if(is_front_page()){?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.bxSlider.min.js"></script>

	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#slider').cycle({
			fx:'scrollHorz',
			timeout: 8000,
			prev:'#prev-slide',
			next:'#next-slide',
			after: function (curr, next, opts) { 
				if(opts.currSlide==0){
					jQuery('#prev-slide').parent().addClass('hidden');
				}
				else{jQuery('#prev-slide').parent().removeClass('hidden');}
				if(opts.currSlide==opts.slideCount-1){
					jQuery('#next-slide').parent().addClass('hidden');
				}
				if(opts.currSlide<opts.slideCount-1){
					jQuery('#next-slide').parent().removeClass('hidden');
				}
			}
		});
		var NEWSslider = jQuery('#mycarousel').bxSlider({
			displaySlideQty: 3,
			moveSlideQty: 1,
			controls: false
		});	
		jQuery('#news-prev').click(function(){
			NEWSslider.goToPreviousSlide();
			return false;
		  });
		jQuery('#news-next').click(function(){
			NEWSslider.goToNextSlide();
			return false;
		  });		  

		jQuery(".video_link").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});			 
	});
	</script>
	<?php }?>
	
	<?php /* if(is_page('media')){?>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("a.photo-gallery").fancybox();	
	});
	</script>	
	<?php } */?>

	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("a.fancybox").fancybox();	
	});
	</script>
	<script type="text/javascript">
	var addthis_config = {
		ui_language: "en"
	}	
	</script>
	<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=tyurinp"></script>	
	<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-30796553-1']);
	_gaq.push(['_trackPageview']);

	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	</script>	
	<meta name="google-site-verification" content="SYMuQ6uIr2GWDH4Yx_Jw3HAcbDQeSkQQkAKTC1fG0Zg" />
</head>
<body <?php body_class(); ?>>

			
<div id="wrapper">
	<div class="main-wrap">
		<div class="wrap">
			<div id="header">
				<a href="<?php echo home_url('/'); ?>" class="logo" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"><?php bloginfo('name'); ?></a>
				<?php dynamic_sidebar( 'weather-sidebar' ); ?>
				<?php /*
				<div class="weather-box">
					<span class="ttl">SOBMX Track Weather</span>
					<em>64˚  Mostly Cloudy</em>
				</div>
				*/?>
			</div>
			<div id="main">