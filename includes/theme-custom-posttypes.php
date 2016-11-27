<?php

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

if(!function_exists('the_photo_photosession_post_type')){
	function the_photo_photosession_post_type()
	{
		register_post_type('photosessions', // Register Custom Post Type
			array(
			'labels' => array(
				'name' => __('Photosessions', 'the_photo'), // Rename these to suit
				'singular_name' => __('Photosession', 'the_photo'),
				'add_new' => __('Add New', 'the_photo'),
				'add_new_item' => __('Add New Photosession', 'the_photo'),
				'edit' => __('Edit', 'the_photo'),
				'edit_item' => __('Edit Photosession', 'the_photo'),
				'new_item' => __('New Photosession', 'the_photo'),
				'view' => __('View', 'the_photo'),
				'view_item' => __('View Photosession', 'the_photo'),
				'search_items' => __('Search Photosessions', 'the_photo'),
				'not_found' => __('No Photosessions found', 'the_photo'),
				'not_found_in_trash' => __('No Photosessions found in Trash', 'the_photo')
			),
			'public' => true,
			'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
			'has_archive' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail'
			), // Go to Dashboard Custom The Photo post for supports
			'can_export' => true, // Allows export in Tools > Export
			'taxonomies' => array(
				'post_tag',
				'category'
			) // Add Category and Post Tags support
		));
		
		register_post_type('albums', // Register Custom Post Type
			array(
			'labels' => array(
				'name' => __('Albums', 'the_photo'), // Rename these to suit
				'singular_name' => __('Album', 'the_photo'),
				'add_new' => __('Add New', 'the_photo'),
				'add_new_item' => __('Add New Album', 'the_photo'),
				'edit' => __('Edit', 'the_photo'),
				'edit_item' => __('Edit Album', 'the_photo'),
				'new_item' => __('New Album', 'the_photo'),
				'view' => __('View', 'the_photo'),
				'view_item' => __('View Album', 'the_photo'),
				'search_items' => __('Search Albums', 'the_photo'),
				'not_found' => __('No Albums found', 'the_photo'),
				'not_found_in_trash' => __('No Albums found in Trash', 'the_photo')
			),
			'public' => true,
			'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
			'has_archive' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail'
			), // Go to Dashboard Custom The Photo post for supports
			'can_export' => true, // Allows export in Tools > Export
			'taxonomies' => array(
				'post_tag',
				'category',
				
			) // Add Category and Post Tags support
		));
	}
}