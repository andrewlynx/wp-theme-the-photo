<?php

$sidebar = get_option('the_photo_post_sidebar', 'no_sidebar');
$posttype = get_post_type();

if($sidebar == 'right' || $sidebar == 'left'){ ?>

	</div>

	<div class="col-md-4">
		<?php the_photo_sidebar( $posttype ); ?>
	</div>

<?php } else { ?>

	</div>
	
<?php } ?>