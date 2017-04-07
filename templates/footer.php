<?php 	
$columns = get_option('the_photo_footer_sidebar', '2');	
$out = '';
ob_start();
switch ($columns) {
	case 1:
		?>
		<div class="col-md-12">
			 <?php the_photo_sidebar( 'footer1' ); ?>
		</div>
		<?php
		break;
	case 2:
		?>
		<div class="col-md-6">
			<?php the_photo_sidebar( 'footer1' ); ?>
		</div>
		<div class="col-md-6">
			<?php the_photo_sidebar( 'footer2' ); ?>
		</div>
		<?php
		break;
	case 3:
		?>
		<div class="col-md-4">
			<?php the_photo_sidebar( 'footer1' ); ?>
		</div>
		<div class="col-md-8">
			<?php the_photo_sidebar( 'footer2' ); ?>
		</div>
		<?php 
		break;
	case 4:
		?>
		<div class="col-md-8">
			<?php the_photo_sidebar( 'footer1' ); ?>
		</div>
		<div class="col-md-4">
			<?php the_photo_sidebar( 'footer2' ); ?>
		</div>
		<?php 
		break;
	case 5:
		?>
		<div class="col-md-4">
			<?php the_photo_sidebar( 'footer1' ); ?>
		</div>
		<div class="col-md-4">
			<?php the_photo_sidebar( 'footer2' ); ?>
		</div>
		<div class="col-md-4">
			<?php the_photo_sidebar( 'footer3' ); ?>
		</div>
		<?php 
		break;				
	case 6:
		?>
		<div class="col-md-3">
			<?php the_photo_sidebar( 'footer1' ); ?>
		</div>
		<div class="col-md-3">
			<?php the_photo_sidebar( 'footer2' ); ?>
		</div>
		<div class="col-md-3">
			<?php the_photo_sidebar( 'footer3' ); ?>
		</div>
		<div class="col-md-3">
			<?php the_photo_sidebar( 'footer4' ); ?>
		</div>	
		<?php 
		break;
}
ob_end_flush();