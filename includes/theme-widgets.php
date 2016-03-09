<?php
/*
 *  Author: Andrew Melnik
 *  URL: photographer.zp.ua
 *  Theme widgets and sidebars
 */
 
if ( ! function_exists( 'the_photo_widgets_init' ) ) {
	function the_photo_widgets_init() {

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