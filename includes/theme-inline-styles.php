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
		$feat_img = get_the_post_thumbnail();
		if( (!empty($main_logo) || !empty($feat_img) ) && !is_front_page() && is_singular() ) {$styles .= '.site-content { padding-top: 0; }';}

		$main_color = get_option('the_photo_font_color', '#000');
		if(!empty($main_color)) {$styles .= '.body { color: '. $main_color .'; }';}

		$link_color = get_option('the_photo_link_color', '#337ab7');
		if(!empty($link_color)) {$styles .= 'a, .footer a:hover { color: '. $link_color .'; }';}

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

		$the_photo_transparent_header_background = get_option('the_photo_transparent_header_background' );
		$the_photo_gradient_header_background = get_option('the_photo_gradient_header_background' );
		if( !empty( $the_photo_transparent_header_background ) ) {$styles .= '.site-header { background-color: transparent; position: absolute; }';}
		elseif( !empty( $the_photo_gradient_header_background ) ){
			$color_1 = get_option('the_photo_gradient_header_color_1', '#080808' );
			$color_2 = get_option('the_photo_gradient_header_color_2', '#080808' );
			$direction = get_option('the_photo_gradient_direction', 'l_r' );
			switch ($direction) {
				case 'rad':
					$dir = 'ellipse at center';
					$wdir = 'center, ellipse cover';
					$type = 'radial';
					break;

				case 'bl_r':
					$dir = '45deg';
					$wdir = '45deg';
					$type = 'linear';
					break;

				case 'br_l':
					$dir = '135deg';
					$wdir = '-45deg';
					$type = 'linear';
					break;

				case 'b_t':
					$dir = 'to bottom';
					$wdir = 'top';
					$type = 'linear';
					break;
				
				default:
					$dir = 'to right';
					$wdir = 'left';
					$type = 'linear';
					break;
			}
			$styles .= '.site-header { 
				background: '. $color_1 .';
		    	background: -webkit-'.$type.'-gradient('.$wdir.', '. $color_1 .', '. $color_2 .');
		    	background: -moz-'.$type.'-gradient('.$wdir.', '. $color_1 .', '. $color_2 .');
		    	background: '.$type.'-gradient('.$dir.', '. $color_1 .', '. $color_2 .');
			}';
			
		}
		else {
			$the_photo_header_background = get_option('the_photo_header_background', '#080808' );
			if(!empty($the_photo_header_background)) {$styles .= '.site-header { background-color: '. $the_photo_header_background .'; }';}
		}
		
		$header_logo_position = get_option('the_photo_header_logo_position', 'center');
		if($header_logo_position == 'center'){ $header_logo_position = 'none';}
		if($header_logo_position == 'left'){ $header_menu_position = 'right'; }
		if(!empty($header_logo_position)) {$styles .= '.site-header .site-branding { float: '. $header_logo_position .'}';}
		if(!empty($header_menu_position)) {$styles .= '.site-header .header-menu { float: '. $header_menu_position .'}';}
		
		$elements_color = get_option('the_photo_elements_color','#ffba00');
		if(!empty($elements_color)) {$styles .= 'article:before, article:after { background-color: '. $elements_color .'; }';}
		
		$footer_back = get_option('the_photo_footer_background','#000');
		if(!empty($footer_back)) {$styles .= '.footer { background-color: '. $footer_back .'; }';}
		
		$footer_font_color = get_option('the_photo_footer_font_color', '#fff');
		if(!empty($footer_font_color)) {$styles .= '.footer, .footer a { color: '.$footer_font_color .'; }';}

		if(!empty($styles)) {
			wp_add_inline_style("the_photo_styles", $styles);
		}
	}
}