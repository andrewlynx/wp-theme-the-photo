<?php get_header(); ?>

<div id="content" class="site-content container">

		<main role="main">
			<!-- section -->
			<section>

				<h1 class="text-center"><b><?php _e( 'Blog', 'the_photo' ); ?></b></h1>

				<?php get_template_part('loop'); ?>

				<?php get_template_part('pagination'); ?>

			</section>
			<!-- /section -->
		</main>
		
	</div>
</div>

<?php get_footer(); ?>
