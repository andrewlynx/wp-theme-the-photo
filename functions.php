<?php
/*
 *  Author: Andrew Melnik
 *  URL: photographer.zp.ua
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 1280;
}

require_once( get_template_directory() . '/includes/extends/tgm/class-tgm-init.php');
require_once( get_template_directory() . '/includes/theme-settings.php');
require_once( get_template_directory() . '/includes/theme-inline-styles.php');
require_once( get_template_directory() . '/includes/extends/cmb/theme-metaboxes.php');
require_once( get_template_directory() . '/includes/theme-actions.php');
require_once( get_template_directory() . '/includes/theme-widgets.php');
require_once( get_template_directory() . '/includes/theme-functions.php');


add_action('wp_enqueue_scripts', 'the_photo_set_inline_styles');