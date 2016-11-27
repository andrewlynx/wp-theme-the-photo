<?php
/*
 *  Author: Andrew Melnik
 *  URL: photographer.zp.ua
 *  Theme widgets and sidebars
 */
 
class the_photo_Social_Widget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => __( "Displays block of cosial network links from Social tab in Customizer") );
		parent::__construct('the_photo_sw', __('The Photo Social Widget'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = '';
		$title = $instance['title'];
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
			foreach ( $instance as $social => $link){
				if( empty($link) ){
					continue;
				}
				echo '<a class="social-icon" href="'. $link .'" target="_blank"><i class="fa fa-'.$social.'" aria-hidden="true"></i></a>';
			}
			
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['facebook'] = stripslashes($new_instance['facebook']);
		$instance['vk'] = stripslashes($new_instance['vk']);
		$instance['twitter'] = stripslashes($new_instance['twitter']);
		$instance['linkedin'] = stripslashes($new_instance['linkedin']);
		$instance['google-plus'] = stripslashes($new_instance['google-plus']);
		$instance['dribbble'] = stripslashes($new_instance['dribbble']);
		$instance['flickr'] = stripslashes($new_instance['flickr']);
		$instance['youtube'] = stripslashes($new_instance['youtube']);
		$instance['deviantart'] = stripslashes($new_instance['deviantart']);
		$instance['instagram'] = stripslashes($new_instance['instagram']);
		$instance['pinterest'] = stripslashes($new_instance['pinterest']);
		$instance['vimeo'] = stripslashes($new_instance['vimeo']);
		$instance['tumblr'] = stripslashes($new_instance['tumblr']);
		$instance['paper-plane-o'] = stripslashes($new_instance['paper-plane-o']);
		$instance['envelope-o'] = stripslashes($new_instance['envelope-o']);
		
		return $instance;
	}

	function form( $instance ) {
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php if (isset ( $instance['facebook'])) {echo esc_attr( $instance['facebook'] );} ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('vk'); ?>"><?php _e('Vkontakte:') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('vk'); ?>" name="<?php echo $this->get_field_name('vk'); ?>" value="<?php if (isset ( $instance['vk'])) {echo esc_attr( $instance['vk'] );} ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php if (isset ( $instance['twitter'])) {echo esc_attr( $instance['twitter'] );} ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('LinkedIn:') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php if (isset ( $instance['linkedin'])) {echo esc_attr( $instance['linkedin'] );} ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('google-plus'); ?>"><?php _e('GPlus:') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('google-plus'); ?>" name="<?php echo $this->get_field_name('google-plus'); ?>" value="<?php if (isset ( $instance['google-plus'])) {echo esc_attr( $instance['google-plus'] );} ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php _e('Dribbble:') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" value="<?php if (isset ( $instance['dribbble'])) {echo esc_attr( $instance['dribbble'] );} ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e('Flickr:') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" value="<?php if (isset ( $instance['flickr'])) {echo esc_attr( $instance['flickr'] );} ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Youtube:') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" value="<?php if (isset ( $instance['youtube'])) {echo esc_attr( $instance['youtube'] );} ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('deviantart'); ?>"><?php _e('Deviantart:') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('deviantart'); ?>" name="<?php echo $this->get_field_name('deviantart'); ?>" value="<?php if (isset ( $instance['deviantart'])) {echo esc_attr( $instance['deviantart'] );} ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram:') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" value="<?php if (isset ( $instance['instagram'])) {echo esc_attr( $instance['instagram'] );} ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest:') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" value="<?php if (isset ( $instance['pinterest'])) {echo esc_attr( $instance['pinterest'] );} ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('vimeo'); ?>"><?php _e('Vimeo:') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>" value="<?php if (isset ( $instance['vimeo'])) {echo esc_attr( $instance['vimeo'] );} ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('tumblr'); ?>"><?php _e('Tumblr:') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('tumblr'); ?>" name="<?php echo $this->get_field_name('tumblr'); ?>" value="<?php if (isset ( $instance['tumblr'])) {echo esc_attr( $instance['tumblr'] );} ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('paper-plane-o'); ?>"><?php _e('paper-plane-o:') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('paper-plane-o'); ?>" name="<?php echo $this->get_field_name('paper-plane-o'); ?>" value="<?php if (isset ( $instance['paper-plane-o'])) {echo esc_attr( $instance['paper-plane-o'] );} ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('envelope-o'); ?>"><?php _e('Email:') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('envelope-o'); ?>" name="<?php echo $this->get_field_name('envelope-o'); ?>" value="<?php if (isset ( $instance['envelope-o'])) {echo esc_attr( $instance['envelope-o'] );} ?>" /></p>
		
		
	<?php
	}

}

function the_photo_register_widgets() { 
	register_widget( 'the_photo_Social_Widget' );
}
add_action( 'widgets_init', 'the_photo_register_widgets' );
 
if ( ! function_exists( 'the_photo_widgets_init' ) ) {
	function the_photo_widgets_init() {
	
		$columns = get_option('the_photo_footer_sidebar', '2');	
		
		register_sidebar( array(
			'name'          => __( 'Menu Sidebar', 'the_photo' ),
			'id'            => 'primary',
			'description'   => __( 'Sidebar under main menu.', 'the_photo' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar( array(
			'name'          => __( 'Post Sidebar', 'the_photo' ),
			'id'            => 'post',
			'description'   => __( 'Sidebar that appears on the left or right side of posts.', 'the_photo' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar( array(
			'name'          => __( 'Footer', 'the_photo' ),
			'id'            => 'footer1',
			'description'   => __( 'Sidebar for footer. You can change sidebar layout in Customizer', 'the_photo' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		if ($columns != 1){
			register_sidebar( array(
				'name'          => __( 'Footer 2', 'the_photo' ),
				'id'            => 'footer2',
				'description'   => __( 'Sidebar for footer. You can change sidebar layout in Customizer', 'the_photo' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
		
		if ($columns == 5){
			register_sidebar( array(
				'name'          => __( 'Footer 3', 'the_photo' ),
				'id'            => 'footer3',
				'description'   => __( 'Sidebar for footer. You can change sidebar layout in Customizer', 'the_photo' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
		
		if ($columns == 6){
			register_sidebar( array(
				'name'          => __( 'Footer 4', 'the_photo' ),
				'id'            => 'footer4',
				'description'   => __( 'Sidebar for footer. You can change sidebar layout in Customizer', 'the_photo' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
	}
}

if ( ! function_exists( 'the_photo_sidebar' ) ) {
	function the_photo_sidebar( $id = 'primary' ) {
		return dynamic_sidebar( $id );
	} 
}

if ( ! function_exists( 'the_photo_is_active_sidebar' ) ) {
	function the_photo_is_active_sidebar( $id ) {
		$is_active = false;
		if( is_active_sidebar( $id ) )  $is_active = true;
		return $is_active;
	} 
}