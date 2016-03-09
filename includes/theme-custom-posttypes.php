<?php

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
if(!function_exists('the_photo_event_post_type')){
	function the_photo_event_post_type()
	{
		register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
		register_taxonomy_for_object_type('post_tag', 'html5-blank');
		register_post_type('html5-blank', // Register Custom Post Type
			array(
			'labels' => array(
				'name' => __('Events', 'the_photo'), // Rename these to suit
				'singular_name' => __('Event', 'the_photo'),
				'add_new' => __('Add New', 'the_photo'),
				'add_new_item' => __('Add New Event', 'the_photo'),
				'edit' => __('Edit', 'the_photo'),
				'edit_item' => __('Edit Event', 'the_photo'),
				'new_item' => __('New Event', 'the_photo'),
				'view' => __('View Event', 'the_photo'),
				'view_item' => __('View Event', 'the_photo'),
				'search_items' => __('Search Event', 'the_photo'),
				'not_found' => __('No Events found', 'the_photo'),
				'not_found_in_trash' => __('No Events found in Trash', 'the_photo')
			),
			'public' => true,
			'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
			'has_archive' => true,
			'supports' => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail'
			), // Go to Dashboard Custom The Photo post for supports
			'can_export' => true, // Allows export in Tools > Export
			'taxonomies' => array(
				'post_tag',
				'category'
			) // Add Category and Post Tags support
		));
	}
}