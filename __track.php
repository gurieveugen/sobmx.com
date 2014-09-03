<?php
add_action('init', 'tracks_init');

function tracks_init() 
{
    global $wp_rewrite;

	$labels = array(
      'name' => _x('Tracks', 'post type general name'),
      'singular_name' => _x('Track', 'post type singular name'),
      'add_new' => _x('Add New', 'Track'),
      'add_new_item' => __('Add New Track'),
      'edit_item' => __('Edit Track'),
      'new_item' => __('New Track'),
      'view_item' => __('View Track'),
      'search_items' => __('Search Track'),
      'not_found' =>  __('No Track found'),
      'not_found_in_trash' => __('No Track found in Trash'), 
      'parent_item_colon' => ''
    );

	$args = array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true, 
      'query_var' => true,
	  'rewrite' => array('slug' => 'property', 'with_front' => FALSE),
      'capability_type' => 'post',
      'hierarchical' => true,
      'menu_position' => null,
      'supports' => array('title', 'editor', 'thumbnail')
    ); 
    
	register_post_type('track', $args);
  
    $wp_rewrite->flush_rules();
}


//add filter to insure the text Fish, or Fish, is displayed when user updates a Fish 
add_filter('post_updated_messages', 'tracks_updated_messages');
function tracks_updated_messages( $messages ) {
    $messages['exercise'] = array(
      0 => '', // Unused. Messages start at index 1.
      1 => sprintf( __('Track updated. <a href="%s">View Track</a>'), esc_url( get_permalink($post_ID) ) ),
      2 => __('Custom field updated.'),
      3 => __('Custom field deleted.'),
      4 => __('Track updated.'),
      5 => isset($_GET['revision']) ? sprintf( __('Track restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
      6 => sprintf( __('Track published. <a href="%s">View Track</a>'), esc_url( get_permalink($post_ID) ) ),
      7 => __('Track saved.'),
      8 => sprintf( __('Track submitted. <a target="_blank" href="%s">Preview Track</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
      9 => sprintf( __('Track scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Track</a>'),
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
      10 => sprintf( __('Track draft updated. <a target="_blank" href="%s">Preview Track</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    );

    return $messages;
}

//display contextual help for Fish
add_action( 'contextual_help', 'add_tracks_help_text', 10, 3 );

function add_tracks_help_text($contextual_help, $screen_id, $screen) { 
    if ('exercise' == $screen->id ) {
      $contextual_help =
        '<p>' . __('Things to remember when adding or editing a Track:') . '</p>' .
        '<ul>' .
        '<li>' . __('Specify the correct genre such as Mystery, or Historic.') . '</li>' .
        '<li>' . __('Specify the correct writer of the Track. Remember that the Author module refers to you, the author of this Track review.') . '</li>' .
        '</ul>' .
        '<p>' . __('If you want to schedule the Track review to be published in the future:') . '</p>' .
        '<ul>' .
        '<li>' . __('Under the Publish module, click on the Edit link next to Publish.') . '</li>' .
        '<li>' . __('Change the date to the date to actual publish this article, then click on Ok.') . '</li>' .
        '</ul>' .
        '<p><strong>' . __('For more information:') . '</strong></p>' .
        '<p>' . __('<a href="http://codex.wordpress.org/Posts_Edit_SubPanel" target="_blank">Edit Posts Documentation</a>') . '</p>' .
        '<p>' . __('<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>') . '</p>' ;
    } elseif ( 'edit-exercise' == $screen->id ) {
      $contextual_help = '<p>' . __('This is the help screen displaying the table of Track blah blah blah.') . '</p>' ;
    }

	return $contextual_help;
}

// Custom Taxonomy Code
add_action( 'init', 'tracks_build_taxonomies', 0 );   
function tracks_build_taxonomies() {
    $labels = array(
      'name' => _x( 'Ability Levels', 'taxonomy general name' ),
      'singular_name' => _x( 'Ability Level', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Ability Level' ),
      'all_items' => __( 'All Ability Levels' ),
      'edit_item' => __( 'Edit Ability Level' ), 
      'update_item' => __( 'Update Ability Level' ),
      'add_new_item' => __( 'Add New Ability Level' ),
      'new_item_name' => __( 'New Ability Level' ),
      'menu_name' => __( 'Ability Levels' ),
    );
    register_taxonomy('ability-level', 'track', array('hierarchical' => true, 'label' => 'Ability Level', 'labels' => $labels, 'query_var' => true, 'rewrite' => true ));
    $labels = array(
      'name' => _x( 'Dirt Types', 'taxonomy general name' ),
      'singular_name' => _x( 'Dirt Type', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Dirt Type' ),
      'all_items' => __( 'All Dirt Types' ),
      'edit_item' => __( 'Edit Dirt Type' ), 
      'update_item' => __( 'Update Dirt Type' ),
      'add_new_item' => __( 'Add New Dirt Type' ),
      'new_item_name' => __( 'New Dirt Type' ),
      'menu_name' => __( 'Dirt Types' ),
    );
    register_taxonomy('dirt-type', 'track', array('hierarchical' => true, 'label' => 'Dirt Type', 'labels' => $labels, 'query_var' => true, 'rewrite' => true ));
}

add_action( 'admin_menu', 'tracks_info_box');
function tracks_info_box() {
	add_meta_box("tracks-box", "Track Info", "tracks_box", "track", "normal", "high");  	
}

function tracks_box(){
	global $post;

	echo '<input type="hidden" name="track_noncename" id="track_noncename" value="' . 
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';	
	
	$custom = get_post_meta($post->ID, 'track_info', true);
?>
	<table style="width:auto;">
	  <tr>
	    <td>Price:</td>
	    <td><input type="text" name="track_price" style="width:100px;" value="<?php echo $custom["track_price"]; ?>">/mo</td>
	  </tr>
	  <tr>
	    <td>Square:</td>
	    <td><input type="text" name="track_square" style="width:100px;" value="<?php echo $custom["track_square"]; ?>">sqft</td>
	  </tr>
	  <tr>
	    <td>Unit Plan:</td>
	    <td><input type="text" name="track_unit_plan" style="width:400px;" value="<?php echo $custom["track_unit_plan"]; ?>"></td>
	  </tr>
	  <tr>
	    <td>Map Link:</td>
	    <td><input type="text" name="track_map_link" style="width:400px;" value="<?php echo $custom["track_map_link"]; ?>"></td>
	  </tr>	
	  <tr>
	    <td>Virtual Tour:</td>
	    <td><input type="text" name="track_map_link" style="width:400px;" value="<?php echo $custom["track_virtual_tour"]; ?>"></td>
	  </tr>		  
	</table>
<?php
}

//add_action('save_post', 'save_track'); 

function save_track($post_id){
	global $post, $wpdb;
	
	if ( !wp_verify_nonce( $_POST['track_noncename'], plugin_basename(__FILE__) )) {
	    return $post_id;
	}
	
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) { return $post_id; }
	
	
	if($post->post_type == 'track' && $_SERVER['REQUEST_METHOD'] == 'POST') {
		/* Save Track custom fields */


		$track_info = array();
		$track_info['track_price'] = $_POST["track_price"];
		$track_info['track_square'] = $_POST["track_square"];
		$track_info['track_unit_plan'] = $_POST["track_unit_plan"];
		$track_info['track_map_link'] = $_POST["track_map_link"];
		$track_info['track_virtual_tour'] = $_POST["track_virtual_tour"];		

		update_post_meta($post->ID, "track_info", $track_info);

	}
}

// add columns to exercise list
//add_filter('manage_edit-track_columns', 'tracks_list_columns');
function tracks_list_columns($columns) {
	if (!$columns['ag-state']) {
		$new_columns = array();
		foreach($columns as $column_key => $column_val) {
			$new_columns[$column_key] = $column_val;
			if ($column_key == 'title') {
				$new_columns['ag-state'] = 'State';
				$new_columns['ag-speciality'] = 'Speciality';
				$new_columns['ag-featured'] = 'Featured';
			}
		}
		$columns = $new_columns;
	}
    return $columns;
}

//add_action('manage_track_posts_custom_column', 'tracks_list_columns_value', 10, 2);
function tracks_list_columns_value($name, $post_id) {
	switch ($name) {
		case 'ag-state':
			$astates = get_the_terms($post_id, 'track-state');
			if (count($astates) > 0) {
				foreach($astates as $astate) {
					echo $sep.$astate->name;
					$sep = ', ';
				}
			}
		break;
		case 'ag-speciality':
			$aspecialities = get_the_terms($post_id, 'track-speciality');
			if (count($aspecialities) > 0) {
				foreach($aspecialities as $aspeciality) {
					echo $sep.$aspeciality->name;
					$sep = ', ';
				}
			}
		break;
		case 'ag-featured':
			$post_data = get_post($post_id);
			$featured = '&nbsp;';
			if ($post_data->menu_order == 1) { $featured = 'YES'; }
			echo $featured;
		break;
	}
}

//add_action( 'restrict_manage_posts', 'tracks_filter_fields' );
function tracks_filter_fields() {
    global $typenow, $wpdb;
	if ($typenow == 'track') {
		$astates = get_categories('type=track&hide_empty=0&hierarchical=0&taxonomy=track-state');
		if (count($astates) > 0) {
?>
	<select name="track-state">
	  <option value="">All States</option>
	  <?php foreach($astates as $astate) { $s = ''; if ($_GET['track-state'] == $astate->term_id) { $s = ' SELECTED'; } ?>
	  <option value="<?php echo $astate->term_id; ?>"<?php echo $s; ?>><?php echo $astate->name; ?></option>
	  <?php } ?>
	</select>
<?php
		}
		$aspecialities = get_categories('type=track&hide_empty=0&hierarchical=0&taxonomy=track-speciality');
		if (count($aspecialities) > 0) {
?>
	<select name="track-speciality">
	  <option value="">All Specialities</option>
	  <?php foreach($aspecialities as $aspeciality) { $s = ''; if ($_GET['track-speciality'] == $aspeciality->term_id) { $s = ' SELECTED'; } ?>
	  <option value="<?php echo $aspeciality->term_id; ?>"<?php echo $s; ?>><?php echo $aspeciality->name; ?></option>
	  <?php } ?>
	</select>
<?php
		}
	}
}

//add_action( 'request', 'tracks_request' );
function tracks_request($request) {
	global $pagenow;
	if (is_admin() && $pagenow == 'edit.php' && isset($request['post_type']) && $request['post_type'] == 'track') {
		$request['order'] = 'desc';
		$request['orderby'] = 'menu_order';
		if (strlen($request['track-state'])) {
			$request['track-state'] = get_term($request['track-state'],'track-state')->name;
		}
		if (strlen($request['track-speciality'])) {
			$request['track-speciality'] = get_term($request['track-speciality'],'track-speciality')->name;
		}
	}
	return $request;
}
?>