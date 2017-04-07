<div class="comments">
	<?php if (post_password_required()) : ?>
	<p><?php _e( 'Post is password protected. Enter the password to view any comments.', 'the_photo' ); ?></p>
</div>

	<?php return; endif; ?>

<?php if (have_comments()) : ?>

	<h2><?php comments_number(); ?></h2>

	<?php paginate_comments_links(); ?>

	<ul>
		<?php wp_list_comments('type=comment&callback=the_photo_comments'); // Custom callback in functions.php ?>
	</ul>

	<?php paginate_comments_links(); ?>

<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

	<p><?php _e( 'Comments are closed here.', 'the_photo' ); ?></p>

<?php endif; ?>

<?php comment_form(); ?>

</div>
