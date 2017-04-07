<?php
if ( the_photo_thumb_or_slider( $id ) ) : // Check if Thumbnail exists 
	$items = get_post_meta(get_the_ID(), 'the_photo_slider_items');
	if ( !empty($slider)) { 

		wp_localize_script	( 
				'the_photo_scripts', 
				'sliderOptions', 
				array( 	'slider_items' 	=> $items[0],
		  	)
		);  ?>
		<div class="slider-wrapper">
			<?php echo the_photo_photoset_metadata( $id ); ?>
			<div class="post-slider owl-carousel">
				<?php foreach($slider[0] as $slide){ ?>
					<div class="header-slide" style="background-image: url(<?php echo $slide ?>)"></div>
				<?php } ?>
			</div>
		</div>

	<?php } else { ?>

		<div class="slider-wrapper">
			<?php echo the_photo_photoset_metadata( $id ); ?>
			<div class="featured-image">
				<div class="header-img" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)"></div>
			</div>
		</div>

	<?php }	

endif;