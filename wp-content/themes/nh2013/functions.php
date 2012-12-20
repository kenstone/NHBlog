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

function twentytwelve_scripts_styles() {
	global $wp_styles;

	wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri() );

}

add_action( 'wp_enqueue_scripts', 'nh_scripts_styles' );


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
			<?php next_posts_link('Older Posts')?>
			<?php previous_posts_link( 'Newer Posts')?>
		</nav>
	<?php endif;
}
endif;

