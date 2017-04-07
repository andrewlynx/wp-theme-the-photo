<?php 
		
$photographer = array( __('Photographer', 'the_photo'), get_post_meta($id, 'the_photo_photographer', true) );
$model = array( __('Model', 'the_photo'), get_post_meta($id, 'the_photo_model', true) );
$assistant = array( __('Assistant', 'the_photo'), get_post_meta($id, 'the_photo_assistant', true) );
$makeup = array( __('Makeup', 'the_photo'), get_post_meta($id, 'the_photo_makeup', true) );
$custom = get_post_meta($id, 'the_photo_add_team', true );

if(!empty($photographer) || !empty($assistant) || !empty($makeup) || !empty($location) || !empty($custom)) {
	?>
	<div class="photo-team col-md-offset-8 col-md-4 col-sm-6 col-xs-12">
		<div>
		<?php foreach( array($photographer, $model, $assistant, $makeup) as $role) {
			if(empty($role[1])) continue;

			foreach( array( 'id', 'ID', 'slug', 'email', 'login' ) as $key ) {
				$userdata = get_user_by($key, $role[1]);
				if($userdata) break;
			}
			
			if(!$userdata){
				$user = $role[1];
			} else {
				$user = apply_filters('single_photosession_user_meta', 
									  '<a href="'. get_author_posts_url($userdata->ID) .'">'. $userdata->display_name .'</a>', 
									  $userdata->ID );
			}
			?>

			<p><span class="role"><?php echo $role[0] ?>: </span>
			<span class="name"><?php echo $user ?></span></p>

			<?php
		}

		if(!empty($custom)) {
			foreach($custom as $role) { 

				foreach( array( 'id', 'ID', 'slug', 'email', 'login' ) as $key ) {
					$userdata = get_user_by($key, $role['member']);
					if($userdata) break;
				}
				
				if(!$userdata){
					$user = $role['member'];
				} else {
					$user = apply_filters('single_photosession_user_meta', 
										  '<a href="'. get_author_posts_url($userdata->ID) .'">'. $userdata->display_name .'</a>', 
										  $userdata->ID );
				}
				?>

				<p><span class="role"><?php echo $role['role'] ?>: </span>
				<span class="name"><?php echo $user ?></span></p>

			<?php }
		} ?>
		</div>
	</div>
	<?php
} 