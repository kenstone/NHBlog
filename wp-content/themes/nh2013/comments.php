<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentytwelve_comment() which is
 * located in the functions.php file.
 *
 * @package NotebookHeavy
 * @subpackage NH2013
 * @since NH2013 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

 <section id="comments">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			Comments
		</h2>

		<ol>
			<?php wp_list_comments( array( 'callback' => 'nhthirteen_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .commentlist -->


		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'twentytwelve' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>
	<?php
		$fields = array(
			'title_reply' => 'Reply',
			'title_reply_to' => 'Reply to %s',
			'label_submit' => 'Post Comment!',
			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '<p class="comment-form-author">' . '<label for="author" class="ancientHelper">Your Name</label><input id="author" name="author" type="text" placeholder="Your Name" required="required" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' /></p>',
			'email' => '<p class="comment-form-email"><label for="email" class="ancientHelper">Your Email</label><input id="email" name="email" type="email" placeholder="Your Email" required="required" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></p>',
			'url' => '<p class="comment-form-url"><label for="url" class=ancientHelper>Your Website</label><input id="url" name="url" type="text" placeholder="Your Website" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></p>'
			)),
			'comment_field' => '<p class="comment-form-comment"><label for="comment" class="ancientHelper">Comment</label><textarea id="comment" name="comment" placeholder="Comment" cols="45" rows="8" aria-required="true"></textarea></p>',


			);



	?>

	<?php comment_form($fields); ?>

</section><!-- #comments .comments-area -->