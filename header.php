<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- preloader -->
		<div class="preloader">
			<div class="cs-loader">
			  <div class="cs-loader-inner">
			    <label>	●</label>
			    <label>	●</label>
			    <label>	●</label>
			    <label>	●</label>
			    <label>	●</label>
			    <label>	●</label>
			  </div>
			</div>
		</div>
		<!-- wrapper -->
		<div id="page" class="hfeed site">
			<button class="sidebar-button">
				<div id="nav-icon">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</button>

			<!-- header -->

			<div id="sidebar" class="sidebar">
				<div id="sidebar-wrapper" class="sidebar-wrapper">
					<header id="masthead" class="site-header" role="banner">
						<div class="site-branding">
								
								<?php 	
								the_photo_get_sidebar_logo();
								?>
						</div><!-- .site-branding -->
					</header><!-- .site-header -->

					<?php the_photo_nav();
					the_photo_sidebar('primary'); ?>
				</div>	
			</div>
			<!-- /header -->
			<?php the_photo_get_header_logo(); ?>
			
			<div id="content" class="site-content container">