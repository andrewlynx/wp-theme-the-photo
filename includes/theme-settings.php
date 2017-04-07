<?php
/*
 *  Author: Andrew Melnik
 *  URL: photographer.zp.ua
 *  Customizer options
 */
Global $wp_customize;

function the_photo_customize( $wp_customize ) {
	$theme_url = get_template_directory_uri ();

////////////
//////////// Theme logo options
////////////

   	$wp_customize->add_section( 'the_photo_logo_upload', array(
	    'title'      => __( 'Logo', 'the_photo' ),
	    'description' => '',
	    'priority'   => 130,
	) );

		$wp_customize->add_setting('the_photo_main_logo', array(
			'default'           => $theme_url.'/includes/img/logo.png',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',		 
		)); 
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'the_photo_main_logo', array(
			'label'    => __('Main Logo', 'the_photo'),
			'section'  => 'the_photo_logo_upload',
			'settings' => 'the_photo_main_logo',
		)));

		$wp_customize->add_setting('the_photo_logo_width', array(
			'default'        => '150',
			'capability'     => 'edit_theme_options',
			'type'           => 'option',		 
		));		 
		$wp_customize->add_control('the_photo_logo_width', array(
			'label'      => __('Main Logo Width in pixels', 'the_photo'),
			'section'    => 'the_photo_logo_upload',
			'settings'   => 'the_photo_logo_width',
		));

		$wp_customize->add_setting('the_photo_logo_height', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'option',		 
		));		 
		$wp_customize->add_control('the_photo_logo_height', array(
			'label'      => __('Main Logo Height in pixels', 'the_photo'),
			'section'    => 'the_photo_logo_upload',
			'settings'   => 'the_photo_logo_height',
		));

		$wp_customize->add_setting('the_photo_sidebar_logo', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',		 
		));		 
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'the_photo_sidebar_logo', array(
			'label'    => __('Sidebar Logo', 'the_photo'),
			'section'  => 'the_photo_logo_upload',
			'settings' => 'the_photo_sidebar_logo',
		)));

////////////
//////////// Font options
////////////

    $wp_customize->add_section( 'the_photo_fonts', array(
	    'title'      => __( 'Font Settings', 'the_photo' ),
	    'description' => '',
	    'priority'   => 140,
	) );

		$wp_customize->add_setting('the_photo_font_color', array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			'type'           => 'option', 
		)); 
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'the_photo_font_color', array(
			'label'    => __('Font Color', 'the_photo'),
			'section'  => 'the_photo_fonts',
			'settings' => 'the_photo_font_color',
		)));
		
		$wp_customize->add_setting('the_photo_font_size', array(
			'default'        => '14',
			'capability'     => 'edit_theme_options',
			'type'           => 'option', 
		));
		$wp_customize->add_control('the_photo_font_size', array(
			'label'      => __('Font size in pixels', 'the_photo'),
			'section'    => 'the_photo_fonts',
			'settings'   => 'the_photo_font_size',
		));

		$wp_customize->add_setting('the_photo_link_color', array(
			'default'           => '#337ab7',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			'type'           => 'option', 
		)); 
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'the_photo_link_color', array(
			'label'    => __('Link Color', 'the_photo'),
			'section'  => 'the_photo_fonts',
			'settings' => 'the_photo_link_color',
		)));

		$wp_customize->add_setting('the_photo_link_hover_color', array(
			'default'           => '#23527c',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			'type'           => 'option', 
		)); 
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'the_photo_link_hover_color', array(
			'label'    => __('Link Color', 'the_photo'),
			'section'  => 'the_photo_fonts',
			'settings' => 'the_photo_link_hover_color',
		)));

		$wp_customize->add_setting('the_photo_header_color', array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			'type'           => 'option', 
		)); 
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'the_photo_header_color', array(
			'label'    => __('Headers Color', 'the_photo'),
			'section'  => 'the_photo_fonts',
			'settings' => 'the_photo_header_color',
		))); 

		$wp_customize->add_setting('the_photo_hone_size', array(
			'default'        => '36',
			'capability'     => 'edit_theme_options',
			'type'           => 'option', 
		)); 
		$wp_customize->add_control('the_photo_hone_size', array(
			'label'      => __('h1 size in pixels', 'the_photo'),
			'section'    => 'the_photo_fonts',
			'settings'   => 'the_photo_hone_size',
		));

		$wp_customize->add_setting('the_photo_htwo_size', array(
			'default'        => '30',
			'capability'     => 'edit_theme_options',
			'type'           => 'option', 
		)); 
		$wp_customize->add_control('the_photo_htwo_size', array(
			'label'      => __('h2 size in pixels', 'the_photo'),
			'section'    => 'the_photo_fonts',
			'settings'   => 'the_photo_htwo_size',
		));

		$wp_customize->add_setting('the_photo_hthree_size', array(
			'default'        => '24',
			'capability'     => 'edit_theme_options',
			'type'           => 'option', 
		)); 
		$wp_customize->add_control('the_photo_hthree_size', array(
			'label'      => __('h3 size in pixels', 'the_photo'),
			'section'    => 'the_photo_fonts',
			'settings'   => 'the_photo_hthree_size',
		));

		$wp_customize->add_setting('the_photo_hfour_size', array(
			'default'        => '20',
			'capability'     => 'edit_theme_options',
			'type'           => 'option', 
		)); 
		$wp_customize->add_control('the_photo_hfour_size', array(
			'label'      => __('h4 size in pixels', 'the_photo'),
			'section'    => 'the_photo_fonts',
			'settings'   => 'the_photo_hfour_size',
		));

		$wp_customize->add_setting('the_photo_hfive_size', array(
			'default'        => '18',
			'capability'     => 'edit_theme_options',
			'type'           => 'option', 
		)); 
		$wp_customize->add_control('the_photo_hfive_size', array(
			'label'      => __('h5 size in pixels', 'the_photo'),
			'section'    => 'the_photo_fonts',
			'settings'   => 'the_photo_hfive_size',
		));

		$wp_customize->add_setting('the_photo_hsix_size', array(
			'default'        => '18',
			'capability'     => 'edit_theme_options',
			'type'           => 'option', 
		)); 
		$wp_customize->add_control('the_photo_hsix_size', array(
			'label'      => __('h6 size in pixels', 'the_photo'),
			'section'    => 'the_photo_fonts',
			'settings'   => 'the_photo_hsix_size',
		));
		
////////////
//////////// Header settings
////////////
		
	$wp_customize->add_section( 'the_photo_header', array(
	    'title'      => __( 'Header Settings', 'the_photo' ),
	    'description' => '',
	    'priority'   => 150,
	) );
	
		$wp_customize->add_setting('the_photo_header_visible', array(
			'capability' => 'edit_theme_options',
			'type'       => 'option',
		));
	 
		$wp_customize->add_control('the_photo_header_visible', array(
			'settings' => 'the_photo_header_visible',
			'label'    => __('Show header with menu', 'the_photo'),
			'section'  => 'the_photo_header',
			        'type'    => 'select',
			        'choices'    => array(
			            'on' => __('Yes', 'the_photo'),
			            'off' => __('No (menu and logo in sidebar)', 'the_photo'),
			        ),
		));

		$wp_customize->add_setting('the_photo_header_logo_position', array(
			'capability' => 'edit_theme_options',
			'type'       => 'option',
		));
	 
		$wp_customize->add_control('the_photo_header_logo_position', array(
			'settings' => 'the_photo_header_logo_position',
			'label'    => __('Logo position (may not show correctly in preview, apply changes and exit composer)', 'the_photo'),
			'section'  => 'the_photo_header',
			'type'    => 'select',
			'choices'    => array(
				'left' => __('Left', 'the_photo'),
				'right' => __('Right', 'the_photo'),
				'center' => __('Center', 'the_photo'),
			),
		));

		$wp_customize->add_setting('the_photo_transparent_header_background', array(
			'capability' => 'edit_theme_options',
			'type'       => 'option',
		));
	 
		$wp_customize->add_control('the_photo_transparent_header_background', array(
			'settings' => 'the_photo_transparent_header_background',
			'label'    => __('Transparent Header', 'the_photo'),
			'section'  => 'the_photo_header',
			'type'     => 'checkbox',
		));

		$wp_customize->add_setting('the_photo_gradient_header_background', array(
			'capability' => 'edit_theme_options',
			'type'       => 'option',
		));
	 
		$wp_customize->add_control('the_photo_gradient_header_background', array(
			'settings' => 'the_photo_gradient_header_background',
			'label'    => __('Gradient Header', 'the_photo'),
			'section'  => 'the_photo_header',
			'type'     => 'checkbox',
			'active_callback' => 'the_photo_is_not_transparent_header',
		));

		$wp_customize->add_setting('the_photo_gradient_header_color_1', array(
			'default'           => '#080808',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			'type'           => 'option', 			
		)); 
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'the_photo_gradient_header_color_1', array(
			'label'    => __('Header Background Color 1', 'the_photo'),
			'section'  => 'the_photo_header',
			'settings' => 'the_photo_gradient_header_color_1',
			'active_callback' => 'the_photo_is_gradient_header',
		)));

		$wp_customize->add_setting('the_photo_gradient_header_color_2', array(
			'default'           => '#080808',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			'type'           => 'option', 			
		)); 
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'the_photo_gradient_header_color_2', array(
			'label'    => __('Header Background Color 2', 'the_photo'),
			'section'  => 'the_photo_header',
			'settings' => 'the_photo_gradient_header_color_2',
			'active_callback' => 'the_photo_is_gradient_header',
		)));

		$wp_customize->add_setting('the_photo_gradient_direction', array(
			'capability' => 'edit_theme_options',
			'default'    => 'l_r',
			'type'       => 'option',
		));
	 
		$wp_customize->add_control('the_photo_gradient_direction', array(
			'settings' => 'the_photo_gradient_direction',
			'label'    => __('Gradient Direction', 'the_photo'),
			'section'  => 'the_photo_header',
			'active_callback' => 'the_photo_is_gradient_header',
			'type'    => 'select',
			'choices'    => array(
				'l_r' => __('Left to Right', 'the_photo'),
				'bl_r' => __('Bottom Left to Top Right', 'the_photo'),
				'br_l' => __('Top Left to Bottom Right', 'the_photo'),
				'b_t' => __('Top to Bottom', 'the_photo'),
				'rad' => __('Radial', 'the_photo'),
			),
		));

		$wp_customize->add_setting('the_photo_header_background', array(
			'default'           => '#080808',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			'type'           => 'option', 			
		)); 
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'the_photo_header_background', array(
			'label'    => __('Header Background Color', 'the_photo'),
			'section'  => 'the_photo_header',
			'settings' => 'the_photo_header_background',
			'active_callback' => 'the_photo_is_not_solid_header',
		)));
		
////////////
//////////// Sidebar options
////////////
		
	$wp_customize->add_section( 'the_photo_sidebar', array(
	    'title'      => __( 'Sidebar Settings', 'the_photo' ),
	    'description' => '',
	    'priority'   => 160,
	) );
	
		$wp_customize->add_setting('the_photo_sidebar_background', array(
			'default'           => '#080808',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			'type'           => 'option', 
		)); 
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'the_photo_sidebar_background', array(
			'label'    => __('Sidebar Background Color', 'the_photo'),
			'section'  => 'the_photo_sidebar',
			'settings' => 'the_photo_sidebar_background',
		)));
		
		$wp_customize->add_setting('the_photo_sidebar_pattern', array(
			'default'           => $theme_url.'/includes/img/bg.png',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',		 
		));		 
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'the_photo_sidebar_pattern', array(
			'label'    => __('Sidebar Background Pattern', 'the_photo'),
			'section'  => 'the_photo_sidebar',
			'settings' => 'the_photo_sidebar_pattern',
		)));
		
		$wp_customize->add_setting('the_photo_sidebar_font_size', array(
			'default'        => '18',
			'capability'     => 'edit_theme_options',
			'type'           => 'option', 
		)); 
		$wp_customize->add_control('the_photo_sidebar_font_size', array(
			'label'      => __('Main Logo Height in pixels', 'the_photo'),
			'section'    => 'the_photo_sidebar',
			'settings'   => 'the_photo_sidebar_font_size',
		));
		
		$wp_customize->add_setting('the_photo_sidebar_font_color', array(
			'default'           => '#f1a400',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			'type'           => 'option', 
		)); 
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'the_photo_sidebar_font_color', array(
			'label'    => __('Link Color', 'the_photo'),
			'section'  => 'the_photo_sidebar',
			'settings' => 'the_photo_sidebar_font_color',
		)));
		
////////////
//////////// Post settings
////////////
		
	$wp_customize->add_section( 'the_photo_post', array(
	    'title'      => __( 'Post Settings', 'the_photo' ),
	    'description' => '',
	    'priority'   => 170,
	) );
	
		$wp_customize->add_setting('the_photo_post_sidebar', array(
			'capability' => 'edit_theme_options',
			'type'       => 'option',
		));
	 
		$wp_customize->add_control('the_photo_post_sidebar', array(
			'settings' => 'the_photo_post_sidebar',
			'label'    => __('Single post sidebar', 'the_photo'),
			'section'  => 'the_photo_post',
			'type'    => 'select',
			'choices'    => array(
				'no_sidebar' => __('No sidebar', 'the_photo'),
				'right' => __('Right sidebar', 'the_photo'),
				'left' => __('Left Sidebar', 'the_photo'),
			),
		));

		$wp_customize->add_setting('the_photo_cpt_sidebar', array(
			'capability' => 'edit_theme_options',
			'type'       => 'option',
		));
	 
		$wp_customize->add_control('the_photo_cpt_sidebar', array(
			'settings' => 'the_photo_cpt_sidebar',
			'label'    => __('Single photosession and album sidebar', 'the_photo'),
			'section'  => 'the_photo_post',
			'type'    => 'select',
			'choices'    => array(
				'no_sidebar' => __('No sidebar', 'the_photo'),
				'right' => __('Right sidebar', 'the_photo'),
				'left' => __('Left Sidebar', 'the_photo'),
			),
		));
		
		$wp_customize->add_setting('the_photo_elements_color', array(
			'default'           => '#ffba00',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability' => 'edit_theme_options',
			'type'       => 'option',
		));
	 
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'the_photo_elements_color', array(
			'label'    => __('Sidebar Background Color', 'the_photo'),
			'section'  => 'the_photo_post',
			'settings' => 'the_photo_elements_color',
		)));
		
////////////
//////////// Footer settings
////////////
		
	$wp_customize->add_section( 'the_photo_footer', array(
	    'title'      => __( 'Footer Settings', 'the_photo' ),
	    'description' => '',
	    'priority'   => 170,
	) );
	
		$wp_customize->add_setting('the_photo_footer_sidebar', array(
			'capability' => 'edit_theme_options',
			'type'       => 'option',
			'default'  => '2',
		));
	 
		$wp_customize->add_control('the_photo_footer_sidebar', array(
			'settings' => 'the_photo_footer_sidebar',
			'label'    => __('Number of columns', 'the_photo'),
			'section'  => 'the_photo_footer',
			'type'    => 'select',
			'choices'    => array(
				'1' => __('1 column', 'the_photo'),
				'2' => __('2 columns', 'the_photo'),
				'3' => __('2 columns (1 + 2)', 'the_photo'),
				'4' => __('2 columns (2 + 1)', 'the_photo'),
				'5' => __('3 columns', 'the_photo'),
				'6' => __('4 columns', 'the_photo'),
			),
		));
		
		$wp_customize->add_setting('the_photo_footer_background', array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			'type'           => 'option', 
		)); 
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'the_photo_footer_background', array(
			'label'    => __('Sidebar Background Color', 'the_photo'),
			'section'  => 'the_photo_footer',
			'settings' => 'the_photo_footer_background',
		)));
		
		$wp_customize->add_setting('the_photo_footer_font_color', array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			'type'           => 'option', 
		)); 
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'the_photo_footer_font_color', array(
			'label'    => __('Link Color', 'the_photo'),
			'section'  => 'the_photo_footer',
			'settings' => 'the_photo_footer_font_color',
		)));
		
////////////
//////////// Admin options
////////////
		
	$wp_customize->add_section( 'the_photo_admin', array(
	    'title'      => __( 'Admin Settings', 'the_photo' ),
	    'description' => '',
	    'priority'   => 260,
	) );
	
		$wp_customize->add_setting('the_photo_adminbar', array(
			'capability' => 'edit_theme_options',
			'type'       => 'option',
		));
	 
		$wp_customize->add_control('the_photo_adminbar', array(
			'settings' => 'the_photo_adminbar',
			'label'    => __('Disable admin bar when logged as admin', 'the_photo'),
			'section'  => 'the_photo_admin',
			'type'     => 'checkbox',
		));

}

add_action('customize_register', 'the_photo_customize');

// function the_photo_customize_register($wp_customize){
    
//     $wp_customize->add_section('the_photo_color_scheme', array(
//         'title'    => __('Color Scheme', 'the_photo'),
//         'description' => '',
//         'priority' => 120,
//     ));
 
//     //  =============================
//     //  = Text Input                =
//     //  =============================
//     $wp_customize->add_setting('the_photo_theme_options[text_test]', array(
//         'default'        => 'Arse!',
//         'capability'     => 'edit_theme_options',
//         'type'           => 'option',
 
//     ));
 
//     $wp_customize->add_control('the_photo_text_test', array(
//         'label'      => __('Text Test', 'the_photo'),
//         'section'    => 'the_photo_color_scheme',
//         'settings'   => 'the_photo_theme_options[text_test]',
//     ));
 
//     //  =============================
//     //  = Radio Input               =
//     //  =============================
//     $wp_customize->add_setting('the_photo_theme_options[color_scheme]', array(
//         'default'        => 'value2',
//         'capability'     => 'edit_theme_options',
//         'type'           => 'option',
//     ));
 
//  //    $wp_customize->add_control('the_photo_color_scheme', array(
//  //        'label'      => __('Color Scheme', 'the_photo'),
//  //        'section'    => 'the_photo_color_scheme',
//  //        'settings'   => 'the_photo_theme_options[color_scheme]',
//  //        'type'       => 'radio',
//  //        'choices'    => array(
//  //            'value1' => 'Choice 1',
//  //            'value2' => 'Choice 2',
//  //            'value3' => 'Choice 3',
//  //        ),
//  //    ));
 
//  //    //  =============================
//  //    //  = Checkbox                  =
//  //    //  =============================
//  //    $wp_customize->add_setting('the_photo_theme_options[checkbox_test]', array(
//  //        'capability' => 'edit_theme_options',
//  //        'type'       => 'option',
//  //    ));
 
//  //    $wp_customize->add_control('display_header_text', array(
//  //        'settings' => 'the_photo_theme_options[checkbox_test]',
//  //        'label'    => __('Display Header Text'),
//  //        'section'  => 'the_photo_color_scheme',
//  //        'type'     => 'checkbox',
//  //    ));
 
 
//  //    //  =============================
//  //    //  = Select Box                =
//  //    //  =============================
//  //     $wp_customize->add_setting('the_photo_theme_options[header_select]', array(
//  //        'default'        => 'value2',
//  //        'capability'     => 'edit_theme_options',
//  //        'type'           => 'option',
 
//  //    ));
//  //    $wp_customize->add_control( 'example_select_box', array(
//  //        'settings' => 'the_photo_theme_options[header_select]',
//  //        'label'   => 'Select Something:',
//  //        'section' => 'the_photo_color_scheme',
//  //        'type'    => 'select',
//  //        'choices'    => array(
//  //            'value1' => 'Choice 1',
//  //            'value2' => 'Choice 2',
//  //            'value3' => 'Choice 3',
//  //        ),
//  //    ));
 
 
//  //    //  =============================
//  //    //  = Image Upload              =
//  //    //  =============================
//  //    $wp_customize->add_setting('the_photo_theme_options[image_upload_test]', array(
//  //        'default'           => 'image.jpg',
//  //        'capability'        => 'edit_theme_options',
//  //        'type'           => 'option',
 
//  //    ));
 
//  //    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test', array(
//  //        'label'    => __('Image Upload Test', 'the_photo'),
//  //        'section'  => 'the_photo_color_scheme',
//  //        'settings' => 'the_photo_theme_options[image_upload_test]',
//  //    )));
 
//  //    //  =============================
//  //    //  = File Upload               =
//  //    //  =============================
//  //    $wp_customize->add_setting('the_photo_theme_options[upload_test]', array(
//  //        'default'           => 'arse',
//  //        'capability'        => 'edit_theme_options',
//  //        'type'           => 'option',
 
//  //    ));
 
//  //    $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'upload_test', array(
//  //        'label'    => __('Upload Test', 'the_photo'),
//  //        'section'  => 'the_photo_color_scheme',
//  //        'settings' => 'the_photo_theme_options[upload_test]',
//  //    )));
 
 
//  //    //  =============================
//  //    //  = Color Picker              =
//  //    //  =============================
//  //    $wp_customize->add_setting('the_photo_theme_options[link_color]', array(
//  //        'default'           => '#000',
//  //        'sanitize_callback' => 'sanitize_hex_color',
//  //        'capability'        => 'edit_theme_options',
//  //        'type'           => 'option',
 
//  //    ));
 
//  //    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
//  //        'label'    => __('Link Color', 'the_photo'),
//  //        'section'  => 'the_photo_color_scheme',
//  //        'settings' => 'the_photo_theme_options[link_color]',
//  //    )));
 
 
//  //    //  =============================
//  //    //  = Page Dropdown             =
//  //    //  =============================
//  //    $wp_customize->add_setting('the_photo_theme_options[page_test]', array(
//  //        'capability'     => 'edit_theme_options',
//  //        'type'           => 'option',
 
//  //    ));
 
//  //    $wp_customize->add_control('the_photo_page_test', array(
//  //        'label'      => __('Page Test', 'the_photo'),
//  //        'section'    => 'the_photo_color_scheme',
//  //        'type'    => 'dropdown-pages',
//  //        'settings'   => 'the_photo_theme_options[page_test]',
//  //    ));

//  //    // =====================
//  //    //  = Category Dropdown =
//  //    //  =====================
//  //    $categories = get_categories();
// 	// $cats = array();
// 	// $i = 0;
// 	// foreach($categories as $category){
// 	// 	if($i==0){
// 	// 		$default = $category->slug;
// 	// 		$i++;
// 	// 	}
// 	// 	$cats[$category->slug] = $category->name;
// 	// }
 
// 	// $wp_customize->add_setting('_s_f_slide_cat', array(
// 	// 	'default'        => $default
// 	// ));
// 	// $wp_customize->add_control( 'cat_select_box', array(
// 	// 	'settings' => '_s_f_slide_cat',
// 	// 	'label'   => 'Select Category:',
// 	// 	'section'  => '_s_f_home_slider',
// 	// 	'type'    => 'select',
// 	// 	'choices' => $cats,
// 	// ));
// }
 
// add_action('customize_register', 'the_photo_customize');

function the_photo_is_not_transparent_header(){

    if( empty( get_option('the_photo_transparent_header_background') ) ) {
        return true;
    }
    return false;
}

function the_photo_is_not_solid_header(){

    if( the_photo_is_not_transparent_header() == true AND the_photo_is_gradient_header() == false ){
    	return true;
    }
    return false;
}

function the_photo_is_gradient_header(){

    if( empty( get_option('the_photo_gradient_header_background') ) ) {
        return false;
    }
    return true;
}