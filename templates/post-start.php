<?php


if( 'post'== get_post_type() ){
	$sidebar = get_option('the_photo_post_sidebar', 'no_sidebar');
} else {
	$sidebar = get_option('the_photo_cpt_sidebar', 'no_sidebar');
}


if($sidebar == 'right'){ ?>

	<div class="col-md-8">

<?php } elseif($sidebar == 'left'){ ?>

	<div class="col-md-8 pull-right">

<?php } else { ?>

	<div class="col-md-12">

<?php }