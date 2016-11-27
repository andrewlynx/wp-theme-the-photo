<?php
/*
 *  Author: Andrew Melnik
 *  URL: photographer.zp.ua
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (function_exists('add_theme_support')){
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 1000, '', true); // Large Thumbnail
    add_image_size('medium', 500, '', true); // Medium Thumbnail
    add_image_size('small', 300, '', true); // Small Thumbnail
	add_image_size('blog-preview', 460, 460, true); // Medium Thumbnail

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    add_theme_support('custom-background', array(
		'default-color' => 'FFF',
    ));

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');
	add_theme_support( "title-tag" );

    // Localisation Support
    load_theme_textdomain('the_photo', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

if ( ! function_exists( 'the_photo_body_classes' ) ) :
function the_photo_body_classes( $classes ) {
	
	if( !is_singular() ){
		$classes[] = 'blog';
	}
	$classes[] = 'loading';

	return $classes;
}
endif;

// The Photo navigation
if ( ! function_exists( 'the_photo_nav' ) ) {
	function the_photo_nav(){
		wp_nav_menu(
			array(
				'theme_location'  => 'header-menu',
				'menu'            => '',
				'container'       => 'div',
				'container_class' => 'header-menu-container',
				'container_id'    => '',
				'menu_class'      => 'menu',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul>%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
			)
		);
	}
}

function the_photo_admin_scripts()
{
		wp_register_style('the_photo_admin', get_template_directory_uri() . '/includes/css/admin-style.css', array(), '1.0', 'all');
		wp_enqueue_style('the_photo_admin'); 
}

// Load The Photo scripts (header.php)
function the_photo_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/includes/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/includes/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1', true); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!
		
		wp_register_script('jquery', get_template_directory_uri() . '/includes/js/jquery-1.12.0.min', array(), '1.12.0', true); // jquery
        wp_enqueue_script('jquery'); // Enqueue it!
		
		wp_register_script('bootstrap', get_template_directory_uri() . '/includes/js/bootstrap.min.js', array(), '3.3.6', true); // bootstrap
        wp_enqueue_script('bootstrap'); // Enqueue it!

        wp_register_script('mCustomScrollbar', get_template_directory_uri() . '/includes/js/jquery.mCustomScrollbar.min.js', array(), '3.1.11', true); // bootstrap
        wp_enqueue_script('mCustomScrollbar'); // Enqueue it!
		
		wp_register_script('owl.carousel', get_template_directory_uri() . '/includes/js/owl.carousel.min.js', array(), '1.3.2', true); // Custom scripts
        wp_enqueue_script('owl.carousel'); // Enqueue it!

        wp_register_script('the_photo_scripts', get_template_directory_uri() . '/includes/js/scripts.js', array(), '1.0.0', true); // Custom scripts
        wp_enqueue_script('the_photo_scripts'); // Enqueue it!
		
    }
}

// Load The Photo styles
function the_photo_styles()
{
	wp_register_style('the_photo', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('the_photo'); 
	
    wp_register_style('normalize', get_template_directory_uri() . '/includes/css/normalize.min.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); 
	
	wp_register_style('bootstrap', get_template_directory_uri() . '/includes/css/bootstrap.min.css', array(), '3.3.6', 'all');
    wp_enqueue_style('bootstrap'); 

    wp_register_style('mCustomScrollbar', get_template_directory_uri() . '/includes/css/jquery.mCustomScrollbar.css', array(), '3.1.11', 'all');
    wp_enqueue_style('mCustomScrollbar'); 

    wp_register_style('fontawesome', get_template_directory_uri() . '/includes/fonts/fontawesome/css/font-awesome.min.css', array(), '4.5.0', 'all');
    wp_enqueue_style('fontawesome'); 
	
	wp_register_style('owl-carousel', get_template_directory_uri() . '/includes/css/owl.carousel.css', array(), '1.3.2', 'all');
	wp_enqueue_style('owl-carousel'); 
 
	wp_register_style('owl.theme', get_template_directory_uri() . '/includes/css/owl.theme.css', array(), '1.3.2', 'all');
	wp_enqueue_style('owl.theme'); 
	
	wp_register_style('the_photo_styles', get_template_directory_uri() . '/includes/css/style.css', array(), '1.0', 'all');
    wp_enqueue_style('the_photo_styles'); // Enqueue it!
}

// Register The Photo Navigation
function the_photo_register_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'the_photo'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'the_photo'), // Sidebar Navigation
    ));
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function the_photo_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Add custom classes to posts in blog listing
function the_photo_post_classes( $classes ) {
	/*$classes[] = 'has-post-thumbnail';*/
	return $classes;
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function the_photo_pagination(){
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 100;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'the_photo') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
if(!function_exists('the_photo_gravatar')){
	function the_photo_gravatar ($avatar_defaults)
	{
		$myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
		$avatar_defaults[$myavatar] = "Custom Gravatar";
		return $avatar_defaults;
	}
}

// Threaded Comments
if(!function_exists('the_photo_enable_threaded_comments')){
	function the_photo_enable_threaded_comments()
	{
		if (!is_admin()) {
			if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
				wp_enqueue_script('comment-reply');
			}
		}
	}
}

// Custom Comments Callback
if(!function_exists('the_photo_comments')){
	function the_photo_comments($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
	?>
		<!-- heads up: starting < for the html tag (li or div) in the next line: -->
		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		<div class="comment-author vcard">
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment ); ?>
		<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
		</div>
	<?php if ($comment->comment_approved == '0') : ?>
		<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
		<br />
	<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
			<?php
				printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
			?>
		</div>

		<?php comment_text() ?>

		<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
	<?php }
}

if(!function_exists('the_photo_thumb_or_slider')){
	function the_photo_thumb_or_slider( $id ) {
		$slider = get_post_meta( $id, 'the_photo_slider');
		if ( has_post_thumbnail($id) || !empty($slider) ) {
			return true;
		}
		return false;
	}
}

if(!function_exists('the_photo_get_header_logo')){
	function the_photo_get_header_logo() {
	$header = get_option('the_photo_header_visible', 'on'); 
	if($header == 'on'){
		return;
	}			
	if( !is_front_page() && !is_singular() ){ ?>
		<div id="main-logo" class="main-logo container text-center">
			<?php 
				$logo = $width = $height = '';
				$theme_url = get_template_directory_uri ();
				$logo = get_option('the_photo_main_logo', $theme_url.'/includes/img/logo.png');
				$width = get_option('the_photo_logo_width');
				$height = get_option('the_photo_logo_height');
			
			if(!empty($logo)){?>
				<img src="<?php echo $logo; ?>" width="<?php if(!empty($width)) echo esc_attr($width); ?>px" height="<?php if(!empty($height)) echo esc_attr($height); ?>px"> 
			<?php } ?>
		</div>
	<?php }
	}
}

if(!function_exists('the_photo_get_sidebar_logo')){
	function the_photo_get_sidebar_logo() {

			$logo = '';
			$logo = get_option('the_photo_sidebar_logo'); ?>
				<div id="side-logo" class="side-logo text-center">
					<a href="<?php echo get_site_url(); ?>">
					<?php 
						if(!empty($logo)) {
					?>
						<img src="<?php echo $logo; ?>">
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
			<?php
	}
}

if(!function_exists('the_photo_photoset_metadata')){
	function the_photo_photoset_metadata( $id ){		
		$photographer = $assistant = $makeup = $assistant = $location = $custom = $out = '';
		
		$photographer = get_post_meta($id, 'the_photo_photographer');
		$assistant = get_post_meta($id, 'the_photo_assistant');
		$makeup = get_post_meta($id, 'the_photo_makeup');
		$location = get_post_meta($id, 'the_photo_location');
		$custom = get_post_meta($id, 'the_photo_add_team');
	
		if(!empty($photographer) || !empty($assistant) || !empty($makeup) || !empty($location) || !empty($custom[0])) {
			$out .= '<div class="photo-team col-md-offset-8 col-md-4 col-sm-6 col-xs-12">';
				$out .= '<div>';
				if(!empty($photographer)) {
					$out .= '<p><span class="role">'. __('Photographer').': </span>';
					$out .= '<span class="name">'.$photographer[0].'</span></p>';
				}
				if(!empty($assistant)) {
					$out .= '<p><span class="role">'. __('Assistant').': </span>';
					$out .= '<span class="name">'.$assistant[0].'</span></p>';
				}
				if(!empty($makeup)) {
					$out .= '<p><span class="role">'. __('Makeup').': </span>';
					$out .= '<span class="name">'.$makeup[0].'</span></p>';
				}
				if(!empty($location)) {
					$out .= '<p><span class="role">'. __('Location').': </span>';
					$out .= '<span class="name">'.$location[0].'</span></p>';
				}
				if(!empty($custom)) {
					foreach($custom[0] as $assist) {
						$out .= '<p><span class="role">'.$assist['role'].': </span>';
						$out .= '<span class="name">'.$assist['member'].'</span></p>';
					}
				}
				$out .= '</div>';
			$out .= '</div>';
			return $out;
		} 
	}
}

if(!function_exists('the_photo_before_single_post')){
	function the_photo_before_single_post(){	
		$sidebar = get_option('the_photo_post_sidebar', 'no_sidebar');
		if($sidebar == 'right'){
			echo '<div class="col-md-8">';
		} elseif($sidebar == 'left'){
			echo '<div class="col-md-8 pull-right">';
		} else {
			echo '<div class="col-md-12">';
		}
	}
}


if(!function_exists('the_photo_post_sidebar')){
	function the_photo_post_sidebar(){	
		$sidebar = get_option('the_photo_post_sidebar', 'no_sidebar');
		if($sidebar == 'right' || $sidebar == 'left'){
			echo '</div>';
			echo '<div class="col-md-4">';
			the_photo_sidebar('post');
			echo '</div>';
		} else {
			echo '</div>';
		}
	}
}

if(!function_exists('the_photo_single_feat_img')){
	function the_photo_single_feat_img( $id ){
		$slider = get_post_meta( $id, 'the_photo_slider');
		if ( the_photo_thumb_or_slider( $id ) ) : // Check if Thumbnail exists 
			$items = get_post_meta(get_the_ID(), 'the_photo_slider_items');
			if ( !empty($slider)) { 
				wp_localize_script( 'the_photo_scripts', 'thePhoto', 	array( 	'slider_items' 	=> $items[0],
																			)
				);  
				$_out = '';
				$_out .= '<div class="slider-wrapper">';
					$_out .= the_photo_photoset_metadata( $id );
					$_out .= '<div class="post-slider">';
						foreach($slider[0] as $slide){
							$_out .= '<div class="header-slide" style="background-image: url(' .$slide. ');"></div>';
						}
					$_out .= '</div>';
				$_out .= '</div>';
				echo $_out;
			} else {
				$_out = '';
				$_out .= '<div class="slider-wrapper">';
					$_out .= the_photo_photoset_metadata( $id );
					$_out .= '<div class="featured-image">';
						$_out .= '<div class="header-img" style="background-image: url(' .get_the_post_thumbnail_url(). ');"></div>';
					$_out .= '</div>';
				$_out .= '</div>';
				echo $_out;
			} 
			
		
		endif;
	}
}

if(!function_exists('the_photo_get_footer')){
	function the_photo_get_footer(){
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
	}
}

if(!function_exists('the_photo_read_image_metadata')){
	function the_photo_read_image_metadata( $file ) {
		$out = '';
		$exif = array(
			'Model',
			'ExposureTime',
			'FocalLength',
			'ISOSpeedRatings',
			'FNumber',
		);
		$meta = exif_read_data($file);
		foreach($meta as $field => $value){
			if(in_array($field, $exif)){
				$divider = explode('/',$value);
				switch ($field){
					case 'ExposureTime':
						$field = 'Exposure Time';
						$value = '1/' . $divider[1]/$divider[0] . ' s';
						break;
					case 'FocalLength':
						$field = 'Focal Length';
						$value = $divider[0]/$divider[1] . ' mm';
						break;
					case 'ISOSpeedRatings':
						$field = 'ISO';
						break;
					case 'FNumber':
						$field = 'Aperture';
						$value = 'F/' . $divider[0]/$divider[1];
						break;
				}
					
				$out .= $field . ': ' . $value . '<br>';
			}
		}
		return $out;
	}
}

function the_photo_attachment_field_credit( $form_fields, $post ) {
	$form_fields['be-photographer-name'] = array(
		'label' => 'Photographer Name',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'be_photographer_name', true ),
		'helps' => 'If provided, photo credit will be displayed',
	);

	$form_fields['be-photographer-url'] = array(
		'label' => 'Photographer URL',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'be_photographer_url', true ),
		'helps' => 'Add Photographer URL',
	);

	return $form_fields;
}



function the_photo_attachment_field_credit_save( $post, $attachment ) {
	if( isset( $attachment['be-photographer-name'] ) )
		update_post_meta( $post['ID'], 'be_photographer_name', $attachment['be-photographer-name'] );

	if( isset( $attachment['be-photographer-url'] ) )
update_post_meta( $post['ID'], 'be_photographer_url', esc_url( $attachment['be-photographer-url'] ) );

	return $post;
}