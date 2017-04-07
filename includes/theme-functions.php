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

        	$logo_option = get_option('the_photo_header_logo_position');
        	$menu_width = 'false';
        	if($logo_option == 'left' OR $logo_option == 'right'){
        		$menu_width = 'true';
        	}

			// Localize the script with data
			$options_array = array(
				'menu_width' => $menu_width,
			);
			wp_localize_script( 'the_photo_scripts', 'themeOptions', $options_array );

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
		include( get_stylesheet_directory() . '/comment.php');
	}
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

function the_photo_get_preloader(){

	get_template_part('/templates/preloader');

}

function the_photo_get_menu_button(){
	include( get_stylesheet_directory() . '/templates/menu-button.php' );
}

if(!function_exists('the_photo_get_header_logo')){
	function the_photo_get_header_logo() {

		$header = get_option('the_photo_header_visible', 'on'); 
		if($header != 'on'){
			return;
		}			

		get_template_part( '/templates/header-logo' );

	}
}

if(!function_exists('the_photo_get_sidebar_logo')){
	function the_photo_get_sidebar_logo() {

		get_template_part( '/templates/sidebar-logo' );

	}
}

if(!function_exists('the_photo_photoset_metadata')){
	function the_photo_photoset_metadata( $id ){		
		include( get_stylesheet_directory() . '/templates/photoset-metadata.php' );
	}
}

if(!function_exists('the_photo_post_types_main_query')){
	function the_photo_post_types_main_query( $query ) {
		if ( is_home() && $query->is_main_query() )
		    $query->set( 'post_type', array( 'post', 'photosessions', 'albums' ) );
		return $query;
	}
}

if(!function_exists('the_photo_before_single_post')){
	function the_photo_before_single_post(){	

		get_template_part( '/templates/post', 'start' );

	}
}


if(!function_exists('the_photo_post_sidebar')){
	function the_photo_post_sidebar(){	

		get_template_part( '/templates/post', 'sidebar' );

	}
}

if(!function_exists('the_photo_single_feat_img')){
	function the_photo_single_feat_img( $id='' ){
		if(!$id){
			$id = get_the_ID();
		}

		$slider = get_post_meta( $id, 'the_photo_slider');
		include( get_stylesheet_directory() . '/templates/slider.php' );		
		
	}
}

if(!function_exists('the_photo_get_footer')){
	function the_photo_get_footer(){

		get_template_part( '/templates/footer' );

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
		@$meta = exif_read_data($file);
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

if(!function_exists('the_photo_get_post_tags')){
	function the_photo_get_post_tags(){

		get_template_part( '/templates/post-tags' );

	}
}

if(!function_exists('the_photo_get_post_categories')){
	function the_photo_get_post_categories(){

		get_template_part( '/templates/post-categories' );

	}
}

if(!function_exists('the_photo_get_post_author')){
	function the_photo_get_post_author(){

		get_template_part( '/templates/post-author' );

	}
}

if(!function_exists('the_photo_get_post_date')){
	function the_photo_get_post_date(){

		get_template_part( '/templates/post-date' );

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