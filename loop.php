<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="article-wrapper">
			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
				<div class="col-md-5 blog-image">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail('blog-preview'); // Declare pixel size you need inside the array ?>
					</a>
				</div>
				<div class="col-md-7 blog-post">
			<?php else: ?>
				<div class="col-md-12 blog-post">
			<?php endif; ?>
			<!-- /post thumbnail -->

			<!-- post title -->
				<h2>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2>
				<!-- /post title -->

				<!-- post details -->
				<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
				<span class="author"><?php _e( 'Published by', 'the_photo' ); ?> <?php the_author_posts_link(); ?></span>
				<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'the_photo' ), __( '1 Comment', 'the_photo' ), __( '% Comments', 'the_photo' )); ?></span>
				<!-- /post details -->

				<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>

				<?php edit_post_link(); ?>
			</div>
			<div class="clearfix">
		</div>

	</article>
	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'the_photo' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
