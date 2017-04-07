<?php 
$logo = get_option('the_photo_sidebar_logo');
?>

<div id="side-logo" class="side-logo text-center">
	<a href="<?php echo get_site_url(); ?>">
	<?php 
		if(!empty($logo)) {
	?>
		<img class="logo-image" src="<?php echo $logo; ?>">
	<?php } else { ?>
		<h2><?php echo get_bloginfo( 'name', 'display' ); ?></h2>
		<?php 
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $description; ?></p>
		<?php endif; ?>
	<?php } ?>
	</a>
</div> 