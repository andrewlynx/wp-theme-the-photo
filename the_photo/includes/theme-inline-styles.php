<?php
/*
 *  Author: Andrew Melnik
 *  URL: photographer.zp.ua
 *  Inline styles
 */

if(!function_exists('the_photo_set_inline_styles')) {
	function the_photo_set_inline_styles() {
		$theme_url = get_template_directory_uri ();
		$styles = '';		

		$main_logo = get_option('the_photo_main_logo', $theme_url.'/includes/img/logo.png');
		if( !empty($main_logo) && !is_front_page() && !is_singular() ) {$styles .= '.site-content { padding-top: 0; }';}

		$main_color = get_option('the_photo_font_color', '#000');
		if(!empty($main_color)) {$styles .= '.body { color: '. $main_color .'; }';}

		$link_color = get_option('the_photo_link_color', '#337ab7');
		if(!empty($link_color)) {$styles .= 'a { color: '. $link_color .'; }';}

		$link_hover_color = get_option('the_photo_link_hover_color', '#23527c');
		if(!empty($link_hover_color)) {$styles .= 'a:hover, a:active { color: '. $link_hover_color .'; }';}

		$header_color = get_option('the_photo_header_color', '#000');
		if(!empty($header_color)) {$styles .= 'h1, h2, h3, h4, h5, h6 { color: '. $header_color .'; }';}

		$font_size = get_option('the_photo_font_size', '14');
		if(!empty($font_size)) {$styles .= 'body, p { font-size: '. $font_size .'px; }';}

		$h1 = get_option('the_photo_hone_size', '36');
		if(!empty($h1)) {$styles .= 'h1 { font-size: '. $h1 .'px; }';}

		$h2 = get_option('the_photo_htwo_size', '30');
		if(!empty($h2)) {$styles .= 'h2 { font-size: '. $h2 .'px; }';}

		$h3 = get_option('the_photo_hthree_size', '24');
		if(!empty($h3)) {$styles .= 'h3 { font-size: '. $h3 .'px; }';}

		$h4 = get_option('the_photo_hfour_size', '20');
		if(!empty($h4)) {$styles .= 'h4 { font-size: '. $h4 .'px; }';}

		$h5 = get_option('the_photo_hfive_size', '18');
		if(!empty($h5)) {$styles .= 'h5 { font-size: '. $h5 .'px; }';}

		$h6 = get_option('the_photo_hsix_size', '16');
		if(!empty($h6)) {$styles .= 'h6 { font-size: '. $h6 .'px; }';}
		
		$sidebar_back = get_option('the_photo_sidebar_background','#080808');
		if(!empty($sidebar_back)) {$styles .= '#sidebar { background-color: '. $sidebar_back .'; }';}
		
		$sidebar_pattern = get_option('the_photo_sidebar_pattern', $theme_url.'/includes/img/bg.png');
		if(!empty($sidebar_pattern)) {$styles .= '#sidebar { background-image: url('. $sidebar_pattern .'); }';}
		
		$sidebar_font = get_option('the_photo_sidebar_font_size', '18');
		if(!empty($sidebar_font)) {$styles .= '#sidebar, #sidebar a { font-size: '. $sidebar_font .'px; }';}
		
		$sidebar_font_color = get_option('the_photo_sidebar_font_color', '#f1a400');
		if(!empty($sidebar_font_color)) {$styles .= '#sidebar, #sidebar a, #sidebar h1, #sidebar h2, #sidebar h3, #sidebar h4, #sidebar h5, #sidebar h6 { color: '.$sidebar_font_color .'; }';}
		

		if(!empty($styles)) {
			wp_add_inline_style("the_photo_styles", $styles);
		}
	}
}