<?php get_header(); ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	
		<!-- post thumbnail -->
			<?php 	$id = get_the_ID();
					the_photo_single_feat_img( $id );	?>
		<!-- /post thumbnail -->
		
		<?php the_photo_before_single_post(); ?>
		
		<main role="main">
		<!-- section -->
			<section>
			
				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<!-- post title -->
					<h1>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h1>
					<!-- /post title -->

					<!-- post details -->
					<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
					<span class="author"><?php _e( 'Published by', 'the_photo' ); ?> <?php the_author_posts_link(); ?></span>
					<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'the_photo' ), __( '1 Comment', 'the_photo' ), __( '% Comments', 'the_photo' )); ?></span>
					<!-- /post details -->

					<?php the_content(); // Dynamic Content ?>

					<?php the_tags( __( 'Tags: ', 'the_photo' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

					<p><?php _e( 'Categorised in: ', 'the_photo' ); the_category(', '); // Separated by commas ?></p>

					<p><?php _e( 'This post was written by ', 'the_photo' ); the_author(); ?></p>

					<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

					<?php comments_template(); ?>

				</article>
				<!-- /article -->
				
				

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h1><?php _e( 'Sorry, nothing to display.', 'the_photo' ); ?></h1>

				</article>
				<!-- /article -->

			<?php endif; ?>

			</section>
		<!-- /section -->
		</main>
		
	<?php the_photo_post_sidebar(); ?>
	
	</div>
	<!-- /content -->
<?php get_footer(); ?>
