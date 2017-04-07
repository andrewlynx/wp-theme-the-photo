<?php 

	$logo = $width = $height = '';
	$theme_url = get_template_directory_uri();
	$logo = get_option('the_photo_main_logo', $theme_url.'/includes/img/logo.png');

if(!empty($logo)){

	$width = get_option('the_photo_logo_width', '150');
	$height = get_option('the_photo_logo_height');
	?>

	<div id="main-logo" class="main-logo text-center">
		<a href="<?php echo get_site_url(); ?>">
			<img src="<?php echo $logo; ?>" width="<?php if(!empty($width)) echo esc_attr($width); ?>px" height="<?php if(!empty($height)) echo esc_attr($height); ?>px">
		</a>
	</div>

<?php } ?>
