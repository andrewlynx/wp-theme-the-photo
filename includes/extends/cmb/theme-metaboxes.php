<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'the_photo_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	 
	$meta_boxes['post_slider'] = array(
		'id'         => 'post_slider',
		'title'      => __( 'Add slider to the header instead of featured image. Slider proportions are 2/1 (width/heigth)', 'the_photo' ),
		'pages'      => array( 'photosessions', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'         => __( 'Multiple Files', 'the_photo' ),
				'desc'         => __( 'Upload or add multiple images/attachments.', 'the_photo' ),
				'id'           => $prefix . 'slider',
				'type'         => 'file_list',
				'preview_size' => array( 200, 100 ), // Default: array( 50, 50 )
			),
			array(
				'name'    => __( 'Number of photos on screen', 'the_photo' ),
				'id'      => $prefix . 'slider_items',
				'type'    => 'select',
				'options' => array(
					'1' 	=> __( '1', 'the_photo' ),
					'2'   	=> __( '2', 'the_photo' ),
					'3'     => __( '3', 'the_photo' ),
				),
			),
		),
	);
	 
	$meta_boxes['shooting_team'] = array(
		'id'         => 'shooting_team',
		'title'      => __( 'Photoshoot Team. You can use user full names or IDs to show name as link to user profile page', 'the_photo' ),
		'pages'      => array( 'photosessions', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'       => __( 'Photographer', 'the_photo' ),
				'id'         => $prefix . 'photographer',
				'type'       => 'text',
				'show_on_cb' => 'cmb_test_text_show_on_cb', 
			),
			array(
				'name'       => __( 'Model', 'the_photo' ),
				'id'         => $prefix . 'model',
				'type'       => 'text',
				'show_on_cb' => 'cmb_test_text_show_on_cb', 
			),
			array(
				'name'       => __( 'Assistant', 'the_photo' ),
				'id'         => $prefix . 'assistant',
				'type'       => 'text',
				'show_on_cb' => 'cmb_test_text_show_on_cb',
			),
			array(
				'name'       => __( 'Makeup', 'the_photo' ),
				'id'         => $prefix . 'makeup',
				'type'       => 'text',
				'show_on_cb' => 'cmb_test_text_show_on_cb', 
			),
			array(
				'id'          => $prefix . 'add_team',
				'type'        => 'group',
				'description' => __( 'Add team', 'the_photo' ),
				'options'     => array(
					'add_button'    => __( 'Add Team Member', 'the_photo' ),
					'remove_button' => __( 'Remove Team Member', 'the_photo' ),
					'sortable'      => true, // beta
				),
				'fields'      => array(
					array(
						'name' => 'Role',
						'id'   => 'role',
						'type' => 'text',
					),
					array(
						'name' => 'Member',
						'description' => 'Name',
						'id'   => 'member',
						'type' => 'text',
					),
				),
			),
			// array(
			// 	'name' => __( 'Test Text Small', 'the_photo' ),
			// 	'desc' => __( 'field description (optional)', 'the_photo' ),
			// 	'id'   => $prefix . 'test_textsmall',
			// 	'type' => 'text_small',
			// 	// 'repeatable' => true,
			// ),
			// array(
			// 	'name' => __( 'Test Text Medium', 'the_photo' ),
			// 	'desc' => __( 'field description (optional)', 'the_photo' ),
			// 	'id'   => $prefix . 'test_textmedium',
			// 	'type' => 'text_medium',
			// 	// 'repeatable' => true,
			// ),
			// array(
			// 	'name' => __( 'Website URL', 'the_photo' ),
			// 	'desc' => __( 'field description (optional)', 'the_photo' ),
			// 	'id'   => $prefix . 'url',
			// 	'type' => 'text_url',
			// 	// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
			// 	// 'repeatable' => true,
			// ),
			// array(
			// 	'name' => __( 'Test Text Email', 'the_photo' ),
			// 	'desc' => __( 'field description (optional)', 'the_photo' ),
			// 	'id'   => $prefix . 'email',
			// 	'type' => 'text_email',
			// 	// 'repeatable' => true,
			// ),
			// array(
			// 	'name' => __( 'Test Time', 'the_photo' ),
			// 	'desc' => __( 'field description (optional)', 'the_photo' ),
			// 	'id'   => $prefix . 'test_time',
			// 	'type' => 'text_time',
			// ),
			// array(
			// 	'name' => __( 'Time zone', 'the_photo' ),
			// 	'desc' => __( 'Time zone', 'the_photo' ),
			// 	'id'   => $prefix . 'timezone',
			// 	'type' => 'select_timezone',
			// ),
			// array(
			// 	'name' => __( 'Test Date Picker', 'the_photo' ),
			// 	'desc' => __( 'field description (optional)', 'the_photo' ),
			// 	'id'   => $prefix . 'test_textdate',
			// 	'type' => 'text_date',
			// ),
			// array(
			// 	'name' => __( 'Test Date Picker (UNIX timestamp)', 'the_photo' ),
			// 	'desc' => __( 'field description (optional)', 'the_photo' ),
			// 	'id'   => $prefix . 'test_textdate_timestamp',
			// 	'type' => 'text_date_timestamp',
			// 	// 'timezone_meta_key' => $prefix . 'timezone', // Optionally make this field honor the timezone selected in the select_timezone specified above
			// ),
			// array(
			// 	'name' => __( 'Test Date/Time Picker Combo (UNIX timestamp)', 'the_photo' ),
			// 	'desc' => __( 'field description (optional)', 'the_photo' ),
			// 	'id'   => $prefix . 'test_datetime_timestamp',
			// 	'type' => 'text_datetime_timestamp',
			// ),
			// // This text_datetime_timestamp_timezone field type
			// // is only compatible with PHP versions 5.3 or above.
			// // Feel free to uncomment and use if your server meets the requirement
			// // array(
			// // 	'name' => __( 'Test Date/Time Picker/Time zone Combo (serialized DateTime object)', 'the_photo' ),
			// // 	'desc' => __( 'field description (optional)', 'the_photo' ),
			// // 	'id'   => $prefix . 'test_datetime_timestamp_timezone',
			// // 	'type' => 'text_datetime_timestamp_timezone',
			// // ),
			// array(
			// 	'name' => __( 'Test Money', 'the_photo' ),
			// 	'desc' => __( 'field description (optional)', 'the_photo' ),
			// 	'id'   => $prefix . 'test_textmoney',
			// 	'type' => 'text_money',
			// 	// 'before'     => '£', // override '$' symbol if needed
			// 	// 'repeatable' => true,
			// ),
			// array(
			// 	'name'    => __( 'Test Color Picker', 'the_photo' ),
			// 	'desc'    => __( 'field description (optional)', 'the_photo' ),
			// 	'id'      => $prefix . 'test_colorpicker',
			// 	'type'    => 'colorpicker',
			// 	'default' => '#ffffff'
			// ),
			// array(
			// 	'name' => __( 'Test Text Area', 'the_photo' ),
			// 	'desc' => __( 'field description (optional)', 'the_photo' ),
			// 	'id'   => $prefix . 'test_textarea',
			// 	'type' => 'textarea',
			// ),
			// array(
			// 	'name' => __( 'Test Text Area Small', 'the_photo' ),
			// 	'desc' => __( 'field description (optional)', 'the_photo' ),
			// 	'id'   => $prefix . 'test_textareasmall',
			// 	'type' => 'textarea_small',
			// ),
			// array(
			// 	'name' => __( 'Test Text Area for Code', 'the_photo' ),
			// 	'desc' => __( 'field description (optional)', 'the_photo' ),
			// 	'id'   => $prefix . 'test_textarea_code',
			// 	'type' => 'textarea_code',
			// ),
			// array(
			// 	'name' => __( 'Test Title Weeeee', 'the_photo' ),
			// 	'desc' => __( 'This is a title description', 'the_photo' ),
			// 	'id'   => $prefix . 'test_title',
			// 	'type' => 'title',
			// ),
			// array(
			// 	'name'    => __( 'Test Select', 'the_photo' ),
			// 	'desc'    => __( 'field description (optional)', 'the_photo' ),
			// 	'id'      => $prefix . 'test_select',
			// 	'type'    => 'select',
			// 	'options' => array(
			// 		'standard' => __( 'Option One', 'the_photo' ),
			// 		'custom'   => __( 'Option Two', 'the_photo' ),
			// 		'none'     => __( 'Option Three', 'the_photo' ),
			// 	),
			// ),
			// array(
			// 	'name'    => __( 'Test Radio inline', 'the_photo' ),
			// 	'desc'    => __( 'field description (optional)', 'the_photo' ),
			// 	'id'      => $prefix . 'test_radio_inline',
			// 	'type'    => 'radio_inline',
			// 	'options' => array(
			// 		'standard' => __( 'Option One', 'the_photo' ),
			// 		'custom'   => __( 'Option Two', 'the_photo' ),
			// 		'none'     => __( 'Option Three', 'the_photo' ),
			// 	),
			// ),
			// array(
			// 	'name'    => __( 'Test Radio', 'the_photo' ),
			// 	'desc'    => __( 'field description (optional)', 'the_photo' ),
			// 	'id'      => $prefix . 'test_radio',
			// 	'type'    => 'radio',
			// 	'options' => array(
			// 		'option1' => __( 'Option One', 'the_photo' ),
			// 		'option2' => __( 'Option Two', 'the_photo' ),
			// 		'option3' => __( 'Option Three', 'the_photo' ),
			// 	),
			// ),
			// array(
			// 	'name'     => __( 'Test Taxonomy Radio', 'the_photo' ),
			// 	'desc'     => __( 'field description (optional)', 'the_photo' ),
			// 	'id'       => $prefix . 'text_taxonomy_radio',
			// 	'type'     => 'taxonomy_radio',
			// 	'taxonomy' => 'category', // Taxonomy Slug
			// 	// 'inline'  => true, // Toggles display to inline
			// ),
			// array(
			// 	'name'     => __( 'Test Taxonomy Select', 'the_photo' ),
			// 	'desc'     => __( 'field description (optional)', 'the_photo' ),
			// 	'id'       => $prefix . 'text_taxonomy_select',
			// 	'type'     => 'taxonomy_select',
			// 	'taxonomy' => 'category', // Taxonomy Slug
			// ),
			// array(
			// 	'name'     => __( 'Test Taxonomy Multi Checkbox', 'the_photo' ),
			// 	'desc'     => __( 'field description (optional)', 'the_photo' ),
			// 	'id'       => $prefix . 'test_multitaxonomy',
			// 	'type'     => 'taxonomy_multicheck',
			// 	'taxonomy' => 'post_tag', // Taxonomy Slug
			// 	// 'inline'  => true, // Toggles display to inline
			// ),
			// array(
			// 	'name' => __( 'Test Checkbox', 'the_photo' ),
			// 	'desc' => __( 'field description (optional)', 'the_photo' ),
			// 	'id'   => $prefix . 'test_checkbox',
			// 	'type' => 'checkbox',
			// ),
			// array(
			// 	'name'    => __( 'Test Multi Checkbox', 'the_photo' ),
			// 	'desc'    => __( 'field description (optional)', 'the_photo' ),
			// 	'id'      => $prefix . 'test_multicheckbox',
			// 	'type'    => 'multicheck',
			// 	'options' => array(
			// 		'check1' => __( 'Check One', 'the_photo' ),
			// 		'check2' => __( 'Check Two', 'the_photo' ),
			// 		'check3' => __( 'Check Three', 'the_photo' ),
			// 	),
			// 	// 'inline'  => true, // Toggles display to inline
			// ),
			// array(
			// 	'name'    => __( 'Test wysiwyg', 'the_photo' ),
			// 	'desc'    => __( 'field description (optional)', 'the_photo' ),
			// 	'id'      => $prefix . 'test_wysiwyg',
			// 	'type'    => 'wysiwyg',
			// 	'options' => array( 'textarea_rows' => 5, ),
			// ),
			// array(
			// 	'name' => __( 'Test Image', 'the_photo' ),
			// 	'desc' => __( 'Upload an image or enter a URL.', 'the_photo' ),
			// 	'id'   => $prefix . 'test_image',
			// 	'type' => 'file',
			// ),
			// array(
			// 	'name'         => __( 'Multiple Files', 'the_photo' ),
			// 	'desc'         => __( 'Upload or add multiple images/attachments.', 'the_photo' ),
			// 	'id'           => $prefix . 'test_file_list',
			// 	'type'         => 'file_list',
			// 	'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			// ),
			// array(
			// 	'name' => __( 'oEmbed', 'the_photo' ),
			// 	'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'the_photo' ),
			// 	'id'   => $prefix . 'test_embed',
			// 	'type' => 'oembed',
			// ),
		),
	);
	
	$meta_boxes['photosession_images'] = array(
		'id'         => 'photosession_images',
		'title'      => __( 'Photosession Images', 'the_photo' ),
		'pages'      => array( 'photosessions', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'id'          => $prefix . 'ps_photo',
				'type'        => 'group',
				'description' => __( 'Add Photos', 'the_photo' ),
				'options'     => array(
					'add_button'    => __( 'Add Photo', 'the_photo' ),
					'remove_button' => __( 'Remove Photo', 'the_photo' ),
					'sortable'      => true, // beta
				),
				'fields'      => array(
					array(
						'name' => __( 'Image', 'the_photo' ),
						'desc' => __( 'Upload an image or enter a URL.', 'the_photo' ),
						'id'   => $prefix . 'ps_image',
						'type' => 'file',
					),
				),
			),
		),
	);
	
	/*$meta_boxes['photoion_images'] = array(
		'id'         => 'the-photo-options',
		'title'      => __( 'Photosession Images', 'the_photo' ),
		'show_on' => array( 'key' => 'options-page', 'value' => array( 'the-photo-options', ), ), 
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'id'          => $prefix . 'ps_photo',
				'type'        => 'group',
				'description' => __( 'Add Photos', 'the_photo' ),
				'options'     => array(
					'add_button'    => __( 'Add Photo', 'the_photo' ),
					'remove_button' => __( 'Remove Photo', 'the_photo' ),
					'sortable'      => true, // beta
				),
				'fields'      => array(
					array(
						'name' => __( 'Image', 'the_photo' ),
						'desc' => __( 'Upload an image or enter a URL.', 'the_photo' ),
						'id'   => $prefix . 'ps_image',
						'type' => 'file',
					),
				),
			),
		),
	);*/

	/**
	 * Metabox to be displayed on a single page ID
	 */
	// $meta_boxes['about_page_metabox'] = array(
	// 	'id'         => 'about_page_metabox',
	// 	'title'      => __( 'About Page Metabox', 'the_photo' ),
	// 	'pages'      => array( 'page', ), // Post type
	// 	'context'    => 'normal',
	// 	'priority'   => 'high',
	// 	'show_names' => true, // Show field names on the left
	// 	'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
	// 	'fields'     => array(
	// 		array(
	// 			'name' => __( 'Test Text', 'the_photo' ),
	// 			'desc' => __( 'field description (optional)', 'the_photo' ),
	// 			'id'   => $prefix . '_about_test_text',
	// 			'type' => 'text',
	// 		),
	// 	)
	// );

	/**
	 * Repeatable Field Groups
	 */
/* 	$meta_boxes['field_group'] = array(
		'id'         => 'field_group',
		'title'      => __( 'Repeating Field Group', 'the_photo' ),
		'pages'      => array( 'page', ),
		'fields'     => array(
			array(
				'id'          => $prefix . 'repeat_group',
				'type'        => 'group',
				'description' => __( 'Generates reusable form entries', 'the_photo' ),
				'options'     => array(
					'group_title'   => __( 'Entry {#}', 'the_photo' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add Another Entry', 'the_photo' ),
					'remove_button' => __( 'Remove Entry', 'the_photo' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array(
						'name' => 'Entry Title',
						'id'   => 'title',
						'type' => 'text',
						// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
					),
					array(
						'name' => 'Description',
						'description' => 'Write a short description for this entry',
						'id'   => 'description',
						'type' => 'textarea_small',
					),
					array(
						'name' => 'Entry Image',
						'id'   => 'image',
						'type' => 'file',
					),
					array(
						'name' => 'Image Caption',
						'id'   => 'image_caption',
						'type' => 'text',
					),
				),
			),
		),
	); */

	/**
	 * Metabox for the user profile screen
	 */
	// $meta_boxes['user_edit'] = array(
	// 	'id'         => 'user_edit',
	// 	'title'      => __( 'User Profile Metabox', 'the_photo' ),
	// 	'pages'      => array( 'user' ), // Tells CMB to use user_meta vs post_meta
	// 	'show_names' => true,
	// 	'cmb_styles' => false, // Show cmb bundled styles.. not needed on user profile page
	// 	'fields'     => array(
	// 		array(
	// 			'name'     => __( 'Extra Info', 'the_photo' ),
	// 			'desc'     => __( 'field description (optional)', 'the_photo' ),
	// 			'id'       => $prefix . 'exta_info',
	// 			'type'     => 'title',
	// 			'on_front' => false,
	// 		),
	// 		array(
	// 			'name'    => __( 'Avatar', 'the_photo' ),
	// 			'desc'    => __( 'field description (optional)', 'the_photo' ),
	// 			'id'      => $prefix . 'avatar',
	// 			'type'    => 'file',
	// 			'save_id' => true,
	// 		),
	// 		array(
	// 			'name' => __( 'Facebook URL', 'the_photo' ),
	// 			'desc' => __( 'field description (optional)', 'the_photo' ),
	// 			'id'   => $prefix . 'facebookurl',
	// 			'type' => 'text_url',
	// 		),
	// 		array(
	// 			'name' => __( 'Twitter URL', 'the_photo' ),
	// 			'desc' => __( 'field description (optional)', 'the_photo' ),
	// 			'id'   => $prefix . 'twitterurl',
	// 			'type' => 'text_url',
	// 		),
	// 		array(
	// 			'name' => __( 'Google+ URL', 'the_photo' ),
	// 			'desc' => __( 'field description (optional)', 'the_photo' ),
	// 			'id'   => $prefix . 'googleplusurl',
	// 			'type' => 'text_url',
	// 		),
	// 		array(
	// 			'name' => __( 'Linkedin URL', 'the_photo' ),
	// 			'desc' => __( 'field description (optional)', 'the_photo' ),
	// 			'id'   => $prefix . 'linkedinurl',
	// 			'type' => 'text_url',
	// 		),
	// 		array(
	// 			'name' => __( 'User Field', 'the_photo' ),
	// 			'desc' => __( 'field description (optional)', 'the_photo' ),
	// 			'id'   => $prefix . 'user_text_field',
	// 			'type' => 'text',
	// 		),
	// 	)
	// );

	/**
	 * Metabox for an options page. Will not be added automatically, but needs to be called with
	 * the `cmb_metabox_form` helper function. See wiki for more info.
	 */
	// $meta_boxes['options_page'] = array(
	// 	'id'      => 'options_page',
	// 	'title'   => __( 'Theme Options Metabox', 'the_photo' ),
	// 	'show_on' => array( 'key' => 'options-page', 'value' => array( $prefix . 'theme_options', ), ),
	// 	'fields'  => array(
	// 		array(
	// 			'name'    => __( 'Site Background Color', 'the_photo' ),
	// 			'desc'    => __( 'field description (optional)', 'the_photo' ),
	// 			'id'      => $prefix . 'bg_color',
	// 			'type'    => 'colorpicker',
	// 			'default' => '#ffffff'
	// 		),
	// 	)
	// );

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
