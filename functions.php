<?php
/*
 * @package WordPress
 * @subpackage Base_Theme
 */

require_once (dirname (__FILE__) . '/widget_instagram_hashtag.php');

$content_width = 600;				// Defines maximum width of images in posts
add_editor_style();					// Allows editor-style.css to configure editor visual style.
add_theme_support( 'post-thumbnails' );

function scripts_method() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_bloginfo("template_directory").'/js/jquery-1.7.1.min.js' );
	wp_enqueue_script( 'jquery' );
}
add_action('wp_enqueue_scripts', 'scripts_method');


register_sidebar( array(
	'id' => 'main-sidebar',
	'name' => 'Main Sidebar',
	'description' => 'Main sidebar',
	'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => 'Secondary Sidebar',
	'description' => 'The secondary widget area',
	'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );
register_sidebar( array(
	'id' => 'weather-sidebar',
	'name' => 'Weather Sidebar',
	'description' => 'The secondary widget area',
	'before_widget' => '<div class="weather-box">',
	'after_widget' => '</div>',
	'before_title' => '<span class="ttl">',
	'after_title' => '</span>',
) );

register_sidebar( array(
	'id' => 'contact-sidebar',
	'name' => 'Contact Sidebar',
	'description' => 'Contact page widget area',
	'before_widget' => '<div class="block">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'id' => 'footer-sidebar',
	'name' => 'Footer Sidebar',
	'description' => 'Main sidebar',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
) );

/*register_sidebar( array(
	'id' => 'testimonial-twitters-sidebar',
	'name' => 'Testimonial Twitters',
	'description' => 'Multi twitter area',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h3 class="tweet-title"><span>',
	'after_title' => '</span></h3>',
) );*/


register_nav_menus( array(
	'main' => 'Main Navigation Menu',
	'secondary' => 'Secondary navigation Menu'
) );
wp_create_nav_menu('MainMenu');
wp_create_nav_menu('FooterMenu');

function get_top_menu(){
  wp_nav_menu(array(
  'container'       => 'div', 			// tag name '' - for no container.
  'container_id'    => 'nav-holder',    // tag id
  'menu_class'      => '',				// ul class
  'menu_id'			=> 'nav',			// ul id
  'echo'            => true,
  'theme_location'  => 'main'));		// menu location name ('main' or 'secondary' by default)
}

function get_footer_menu(){
  wp_nav_menu(array(
  'container'       => 'div', 			// tag name '' - for no container.
  'container_id'    => 'nav-holder',    // tag id
  'menu_class'      => '',				// ul class
  'menu_id'			=> 'nav',			// ul id
  'echo'            => true,
  'theme_location'  => 'secondary'));		// menu location name ('main' or 'secondary' by default)
}

/*function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );*/

function show_posted_in() {
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	} else {
		$posted_in = 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	}
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}

add_theme_support( 'automatic-feed-links' );

function short_content($content,$sz = 500,$more = '...') {
	if (strlen($content)<$sz) return $content;
	$p = strpos($content, " ",$sz);
    if (!$p) return $content;
        $content = strip_tags($content);
        if (strlen($content)<$sz) return $content;
        $p = strpos($content, " ",$sz);
        if (!$p) return $content;
	return substr($content, 0, $p).$more;
}


function new_excerpt_more($excerpt) {
	global $post;
	if(is_page('training')){
		$more =  ' <a href="#" class="details toggle" rel="'.$post->ID.'">// Details</a>';
		return str_replace('[...]', $more, $excerpt);		
	}else{
		return str_replace('[...]', '...', $excerpt);
	}	
}
add_filter('wp_trim_excerpt', 'new_excerpt_more');


/*
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more) {
	global $post;
	//if(is_page('pro-team') || is_page('amateur-team')){
		$more =  ' <a href="'.get_permalink($post->ID).'" class="more" title="read more about '.$post->post_title.'">read more</a>';
		return $more;			
	//}else{
	//	return $more;
	//}	
}
*/

function custom_excerpt_length( $length ) {
	if(is_front_page()){
		return 30;
	}elseif(is_page('training')){	
		return 30;
	}else{
		return $length;
	}
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function get_thumb($attach_id, $width, $height, $crop = false) {
	if (is_numeric($attach_id)) {
		$image_src = wp_get_attachment_image_src($attach_id, 'full');
		$file_path = get_attached_file($attach_id);
	} else {
		$imagesize = getimagesize($attach_id);
		$image_src[0] = $attach_id;
		$image_src[1] = $imagesize[0];
		$image_src[2] = $imagesize[1];
		$file_path = $_SERVER["DOCUMENT_ROOT"].str_replace(get_bloginfo('siteurl'), '', $attach_id);
		
	}
	
	$file_info = pathinfo($file_path);
	$extension = '.'. $file_info['extension'];

	// image path without extension
	$no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];

	$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;

	// if file size is larger than the target size
	if ($image_src[1] > $width || $image_src[2] > $height) {
		// if resized version already exists
		if (file_exists($cropped_img_path)) {
			return str_replace(basename($image_src[0]), basename($cropped_img_path), $image_src[0]);
		}

		if (!$crop) {
			// calculate size proportionaly
			$proportional_size = wp_constrain_dimensions($image_src[1], $image_src[2], $width, $height);
			$resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;			

			// if file already exists
			if (file_exists($resized_img_path)) {
				return str_replace(basename($image_src[0]), basename($resized_img_path), $image_src[0]);
			}
		}

		// resize image if no such resized file
		$new_img_path = image_resize($file_path, $width, $height, $crop);
		$new_img_size = getimagesize($new_img_path);
		return str_replace(basename($image_src[0]), basename($new_img_path), $image_src[0]);
	}

	// return without resizing
	return $image_src[0];
}

/*function get_thumb($iurl, $iw = '', $ih = '', $zc = '', $q = 100) {
  $thumb = '';
  if (is_numeric($iurl)) { $iurl = get_attach_url($iurl); }
  if (strlen($iurl)) {
    $thumb = get_bloginfo('template_url').'/timthumb.php?src='.$iurl;
    if (strlen($iw)) { $thumb .= '&amp;w='.$iw; }
    if (strlen($ih)) { $thumb .= '&amp;h='.$ih; }
    if (strlen($zc)) { $thumb .= '&amp;zc='.$zc; }
	if (strlen($q)) { $thumb .= '&amp;q='.$q; }
  }
  return $thumb;
}*/

function get_featured_image_id($pid) {
	return get_post_meta($pid, '_thumbnail_id', true);
}


//add_filter( 'wpcf7_validate_text*', 'my_validate_text', 20, 2 );
//add_filter( 'wpcf7_validate_text', 'my_validate_text', 20, 2 );

function my_validate_text( $result, $tag ) {
	$type = $tag['type'];
	$name = $tag['name'];

	$_POST[$name] = trim( strtr( (string) $_POST[$name], "\n", " " ) );

	$custom_response = '!This field or the '. $lmatch .'  field are required';
	
	/*
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	*/
	
	/*
	if ( 'text*' == $type ) {
		if ( '' == $_POST[$name] && '' == $_POST[$match] && $match) {
			$result['valid'] = false;

			$result['reason'][$name] = $custom_response;
		} elseif ($match) {

			$result['valid'] = true;

		}
	}
	*/	
		$result['valid'] = false;
		$result['reason'][$name] = '!!!!!!!';			
}	

//include(TEMPLATEPATH . '/__track.php');

function page_excerpts_agentwp() {
add_post_type_support('page', array('excerpt'));
}

add_action('init', 'page_excerpts_agentwp');

if($_REQUEST['action'] == 'ajax-page'){
	$ajax_page_id = $_REQUEST['ajax_page_id'];
	$ajax_page = get_page($ajax_page_id);
	$ajax_page_content = $ajax_page->post_content;
	$ajax_page_content = apply_filters('the_content', $ajax_page_content);
	$ajax_page_content = str_replace(']]>', ']]&gt;', $ajax_page_content);
	echo $ajax_page_content;
	exit;
}