<?php get_header(); ?>

	<?php if (have_posts()): 

		while (have_posts()) : the_post(); ?>
	
			<!-- post thumbnail -->
			<?php do_action( 'the_photo_photosession_before_page' ); ?>
			<!-- /post thumbnail -->
			
			<div id="content" class="site-content container">
			
				<?php the_photo_before_single_post(); ?>
				
					<main role="main">
					<!-- section -->

						<section>
					
							<!-- article -->
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<?php do_action( 'the_photo_photosession_before_title' ); ?>

								<!-- post title -->
								<h1>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								</h1>
								<!-- /post title -->								

								<?php do_action( 'the_photo_photosession_before_content' ); ?>

								<?php the_content(); // Dynamic Content ?>

								<?php do_action( 'the_photo_photosession_after_content' ); ?>								
								
								<?php 
								$images = get_post_meta( $id, 'the_photo_ps_photo');
								
								global $the_photo;	

									foreach($images[0] as $image){ 

										echo wp_get_attachment_image($image["the_photo_ps_image_id"], 'full');
										?>
										<div class="image-meta-box">
											<?php
											$fields = $the_photo->the_photo_attachment_fields($image["the_photo_ps_image"], $image["the_photo_ps_image_id"]);
											foreach ($fields as $field => $value) { 
												if($value){ ?>
													<span class="image-meta"><?php echo $field ?></span>
													<span class="image-meta-value"><?php echo $value ?></span>
											<?php }
											} ?>
										</div>
										<?php						
									}									
								
								?>

								<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

								<?php do_action( 'the_photo_photosession_after_content' );	?>

								<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'the_photo' ), __( '1 Comment', 'the_photo' ), __( '% Comments', 'the_photo' )); ?></span>

								<?php comments_template(); ?>

								<?php do_action( 'the_photo_photosession_after_comments' );	?>

							</article>
							<!-- /article -->
					
						</section>
					<!-- /section -->
					</main>

				<?php the_photo_post_sidebar(); ?>
	
			</div>
			<!-- /content -->

		<?php endwhile; ?>

	<?php else: ?>
			
			<div id="content" class="site-content container">

				<?php the_photo_before_single_post(); ?>
				
					<!-- article -->
					<article>

						<h1><?php _e( 'Sorry, nothing to display.', 'the_photo' ); ?></h1>

					</article>
					<!-- /article -->

				<?php the_photo_post_sidebar(); ?>
		
			</div>
			<!-- /content -->

	<?php endif; ?>
		
<?php get_footer(); ?>
