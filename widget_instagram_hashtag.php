<?php
/**
 * Register "Instagram hashtag images" widget
 */
add_action('widgets_init', create_function('', 'register_widget( "widget_instagram_hastag" );'));

/**
 * Widget user login Class
 */
class widget_instagram_hastag extends WP_Widget 
{ 
	public function __construct() 
	{
	    parent::__construct(
	        'widget_instagram_hastag', 
	        'Instagram hashtag images widget2', 
	        array( 'description' => 'This widget shows Instagram hashtag images widget' )
	    );
	} 
   
    /**
     * Print widget to page
     */
    public function widget($args, $instance)
    {
    	extract($args);	
    	
		$hashtag      = $instance['hashtag'];
		$client_id    = $instance['client_id'];
		$count        = $instance['count'];
        $description  = $instance['description'];

		$url              = "https://api.instagram.com/v1/tags/".$hashtag."/media/recent?client_id=".$client_id."&count=".$count;
		$json             = file_get_contents($url);
		$images_instagram = json_decode($json, true);
        
        echo $before_widget;
        echo '<h3 class="tit">instagram</h3>';
        if ( $description ) echo "<p>$description</p>";

		echo '<ul class="widget instagram-hastag-images photo-list">';
		foreach ($images_instagram['data'] as $key => $value) 
		{
		  /*echo "<!--<pre>";
          var_dump($value);
          echo "</pre>-->";*/
		?>
			<li><a class="fancybox" rel="group" href="<?php echo $value['images']['standard_resolution']['url']; ?>" target="_blank"><img src="<?php echo $value['images']['thumbnail']['url']; ?>" width="100" height="100" alt="<?php echo $value['caption']['text']; ?>" /></a></li>			
		<?php
		}
		echo "</ul>";
        
        echo $after_widget;
    }   
     
    /**
     * Update data
     */
    public function update( $new_instance, $old_instance )
    {
		$instance                 = array();		
		$instance['hashtag']      = $new_instance['hashtag'];
		$instance['client_id']    = $new_instance['client_id'];
		$instance['count']        = $new_instance['count'];
        $instance['description']  = $new_instance['description'];
			
        return $instance;
    }

    /**
     * Create widget form on the admin panel
     */
    public function form( $instance )
    {		
		$hashtag      = isset( $instance[ 'hashtag' ] )  ? $instance[ 'hashtag' ] : '';		
		$client_id    = isset( $instance[ 'client_id' ] )  ? $instance[ 'client_id' ] : '';		
		$count        = isset( $instance[ 'count' ] )  ? $instance[ 'count' ] : '';
        $description  = $instance['description'];

		?>		

		<p>
			<label for="<?php echo $this->get_field_id( 'hashtag' ); ?>"><?php _e( '#Hashtag:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'hashtag' ); ?>" name="<?php echo $this->get_field_name( 'hashtag' ); ?>" type="text" value="<?php echo esc_attr($hashtag); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'client_id' ); ?>"><?php _e( 'Client ID:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'client_id' ); ?>" name="<?php echo $this->get_field_name( 'client_id' ); ?>" type="text" value="<?php echo esc_attr($client_id); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Count:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo esc_attr($count); ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr($description); ?>" />
		</p>
		
		<?php
    }    
}