<?php get_header(); ?>

<div id="content" class="site-content container">

	<main role="main">
		<!-- section -->
		<section>

			<h1><?php _e( 'Categories for ', 'the_photo' ); single_cat_title(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
