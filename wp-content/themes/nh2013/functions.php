<?php
/**
 * NH2013 functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package NotebookHeavy
 * @subpackage NH2013
 * @since NH2013 1.0
 */


function nhthirteen_setup() {

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 9999, 20, true ); // Unlimited height, soft crop

}

add_action( 'after_setup_theme', 'nhthirteen_setup' );


function nhthirteen_scripts_styles() {
	global $wp_styles;

	wp_enqueue_style( 'nh-style', get_stylesheet_uri() );


	if ( is_singular() ) {
		wp_enqueue_style( 'syntaxhighlighter', '//dadchartsstorage.blob.core.windows.net/nhblogcss/shCoreDefault.css' );
	}

}

add_action( 'wp_enqueue_scripts', 'nhthirteen_scripts_styles' );


add_filter( 'next_posts_link_attributes', ' title="Older Posts" class="olderPostButton clearfix"');
add_filter( 'previous_posts_link_attributes', 'title="Newer Posts" class="newerPostButton"');

if ( ! function_exists( 'nhthirteen_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since NH2013 1.0
 */
function nhthirteen_content_nav( ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav>
			<?php previous_posts_link( 'Newer Posts')?>
			<?php next_posts_link('Older Posts')?>
		</nav>
	<?php endif;
}
endif;

if ( ! function_exists( 'nhthirteen_get_sliver_source' ) ) :
/*
  Helper function used to return the src URL of the sliver image used on the front page.
 */ 
function nhthirteen_get_sliver_source( ) {

	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id, array(9999,20));
	$image_url = $image_url[0];

	return $image_url;
}
endif;


if ( ! function_exists( 'nhthirteen_get_featured_source' ) ) :

function nhthirteen_get_featured_source() {
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id, 'full');
	$image_url = $image_url[0];

	return $image_url;
}

endif;

if (! function_exists('get_social_buttons')) :

	function get_social_buttons() {
		 <a href="http://twitter.com/kenstone" title="Follow me on Twitter">
                <img src="//dadchartsstorage.blob.core.windows.net/nhblogimage/twitter.gif" alt="click to view my twitter feed" /></a>
            <a href="http://notebookheavy.com/feed/" title="Grab my RSS feed">
                <img src="//dadchartsstorage.blob.core.windows.net/nhblogimage/rss.gif" alt="click to subscribe to my RSS feed" /></a>
            <a href="/contact" title="Contact me">
                <img src="//dadchartsstorage.blob.core.windows.net/nhblogimage/mail.gif" alt="click to contact me via email" /></a>

	}

endif;


/* Helper function used to increase the length of the except shown on the front page.
 */
function custom_excerpt_length( $length ) {
	return 75;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



if ( ! function_exists( 'nhthirteen_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function nhthirteen_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( 'Edit', '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment-body">
			<?php echo get_avatar( $comment, 44 );?>
			<header class="comment-meta comment-author vcard">
				<?php
					
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . 'Post author' . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( '%1$s at %2$s', get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( 'Edit', '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => 'Reply', 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;