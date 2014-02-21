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
		wp_enqueue_style( 'crayon', '//az415353.vo.msecnd.net/nhblogcss/crayon.min.css' );
	}

}

add_action( 'wp_enqueue_scripts', 'nhthirteen_scripts_styles' );


add_filter( 'next_posts_link_attributes', ' title="Older Posts" class="olderPostButton clearfix"');
add_filter( 'previous_posts_link_attributes', 'title="Newer Posts" class="newerPostButton"');


if (!function_exists('get_ad_section')) :

function get_ad_section() {
	$adIndex = rand(0,6);
	switch ($adIndex) {
		case 0:
			$adSection = get_ad_one();
			$adSection += get_hc_ad();
			$adSection += get_ad_two();
			return $adSection;
			break;
		case 1:
			$adSection = get_ad_one();
			$adSection += get_ad_three();
			$adSection += get_hc_ad();
			return $adSection;
			break;
		case 2:
			$adSection = get_hc_ad();
			$adSection += get_ad_two();
			$adSection += get_ad_three();
			return $adSection;
			break;
		case 3:
			$adSection = get_ad_three();
			$adSection += get_hc_ad();
			$adSection += get_ad_one();
			return $adSection;
			break;
		case 4:
			$adSection = get_ad_one();
			$adSection += get_ad_four();
			$adSection += get_hc_ad();
			return $adSection;
			break;
		case 5:
			$adSection = get_ad_four();
			$adSection += get_ad_one();
			$adSection += get_hc_ad();
			return $adSection;
			break;
		case 6:
			$adSection = get_ad_one();
			$adSection += get_hc_ad();
			$adSection += get_ad_four();
			return $adSection;
			break;
		default:
			
			break;
	}
}

endif;

if (!function_exists('get_ad_one')) :

/**
 * Displays the first adsense ad. In this case it is a large square.
 * @since NH2013 1.1
 */
function get_ad_one() { ?>
<div class="ad1">
	<ins class="adsbygoogle"
	     style="display:inline-block;width:336px;height:280px"
	     data-ad-client="ca-pub-0038909073879850"
	     data-ad-slot="9586690583"></ins>
	<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
</div>
	<?php
}

endif;

if (!function_exists('get_ad_two')) :

/**
 * Displays the second adsense ad. In this case it is a large square.
 * @since NH2013 1.1
 */
function get_ad_two() { ?>
	<div class="ad1">
		<ins class="adsbygoogle"
			     style="display:inline-block;width:336px;height:280px"
			     data-ad-client="ca-pub-0038909073879850"
			     data-ad-slot="3583619786"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	<?php
}

endif;

if (!function_exists('get_ad_three')) :

/**
 * Displays the third adsense ad. In this case, it's a large skyscraper.
 * @Since NH2013 1.1
 */
function get_ad_three() { ?>
<div class="ad1">
	<ins class="adsbygoogle"
	     style="display:inline-block;width:300px;height:600px"
	     data-ad-client="ca-pub-0038909073879850"
	     data-ad-slot="3245542588"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
</div>

<?php
}

endif;

if (!function_exists('get_ad_four')) :

/**
 * Displays the fourth adsense ad. In thise case, it's a thin skyscraper.
 * @Since NH2013 1.1
 */
function get_ad_four() { ?>

<div class="ad1">
	<ins class="adsbygoogle"
	     style="display:inline-block;width:160px;height:600px"
	     data-ad-client="ca-pub-0038909073879850"
	     data-ad-slot="2063423787"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
</div>

<?php
}

endif;

if (!function_exists('get_momcharts_ad')) : 

function get_momcharts_ad() { ?>

    <div id="mombio">
        <a href="http://www.momcharts.com" title="MomCharts.com"><img src="//az415353.vo.msecnd.net/nhblogimage/mc-prep-stripes-blog-336x168.png" alt="Mom Charts" title="Visit Mom Charts"/></a>
    </div>


<?php
}

endif;

if (!function_exists('get_hc_ad')) :
    function get_hc_ad() { ?>
        <div id="hcAd">
            <a href="http://heavyco.de" title="Heavy Code"><img src="//www.heavyco.de/images/logo.png" alt="Heavy Code Logo" title="Visit Heavy Code"/></a>
        </div>
    <?php
}
endif;


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
		?>
		 <a href="http://twitter.com/daveiffland" title="Follow me on Twitter">
	         <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		 width="80px" height="80px" viewBox="0 0 80 80" enable-background="new 0 0 80 80" xml:space="preserve">
				<circle fill="#B3B3B3" cx="140" cy="40" r="39"/>
				<circle fill="#B3B3B3" cx="40" cy="40" r="39"/>
				<path fill="#FFFFFF" d="M64,25.113c-1.767,0.783-3.664,1.313-5.656,1.551c2.033-1.219,3.595-3.148,4.33-5.448
					c-1.902,1.128-4.011,1.948-6.253,2.39c-1.797-1.914-4.356-3.11-7.188-3.11c-5.438,0-9.848,4.409-9.848,9.848
					c0,0.771,0.087,1.523,0.255,2.244c-8.184-0.41-15.44-4.331-20.297-10.289c-0.848,1.455-1.333,3.146-1.333,4.951
					c0,3.416,1.738,6.431,4.381,8.196c-1.614-0.051-3.132-0.494-4.46-1.231c-0.001,0.041-0.001,0.082-0.001,0.124
					c0,4.771,3.395,8.751,7.9,9.657c-0.827,0.224-1.696,0.345-2.595,0.345c-0.634,0-1.251-0.063-1.853-0.177
					c1.253,3.912,4.89,6.76,9.199,6.839c-3.371,2.641-7.617,4.216-12.23,4.216c-0.795,0-1.579-0.048-2.349-0.139
					c4.358,2.796,9.534,4.426,15.096,4.426c18.113,0,28.019-15.007,28.019-28.021c0-0.427-0.009-0.852-0.028-1.273
					C61.011,28.822,62.68,27.088,64,25.113z"/>
				<g>
					<g>
						<path fill="#FFFFFF" d="M162.989,54h-6.396c0-17-13.593-29.836-29.593-29.836v-6.397C147,17.767,162.989,34,162.989,54z"/>
					</g>
					<g>
						<path fill="#FFFFFF" d="M149.883,54h-6.397c0-10-8.485-16.728-16.485-16.728v-6.397C139,30.875,149.883,41,149.883,54z"/>
					</g>
					<circle fill="#FFFFFF" cx="131.649" cy="49.676" r="4.558"/>
				</g>
				<circle fill="#B3B3B3" cx="240" cy="40" r="39"/>
				<g>
					<line fill="none" x1="220" y1="26" x2="259" y2="26"/>
					<g>
						<polygon fill="#FFFFFF" points="240,48.658 238.081,47.515 217,34.033 217,53 263,53 263,34.033 241.919,47.515 		"/>
						<polygon fill="#FFFFFF" points="263,28 217,28 240,42.625 		"/>
					</g>
					<path fill="#B3B3B3" d="M259,26"/>
					<path fill="#B3B3B3" d="M220,26"/>
				</g>
			</svg>
         </a>
            <a href="http://feeds.feedburner.com/notebookheavy" title="Grab my RSS feed">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 width="80px" height="80px" viewBox="0 0 80 80" enable-background="new 0 0 80 80" xml:space="preserve">
				<circle fill="#B3B3B3" cx="40" cy="40" r="39"/>
				<circle fill="#B3B3B3" cx="-60" cy="40" r="39"/>
				<path fill="#FFFFFF" d="M-36,25.113c-1.767,0.783-3.664,1.313-5.656,1.551c2.033-1.219,3.595-3.148,4.33-5.448
					c-1.902,1.128-4.011,1.948-6.253,2.39c-1.797-1.914-4.356-3.11-7.188-3.11c-5.438,0-9.848,4.409-9.848,9.848
					c0,0.771,0.087,1.523,0.255,2.244c-8.184-0.41-15.44-4.331-20.297-10.289c-0.848,1.455-1.333,3.146-1.333,4.951
					c0,3.416,1.738,6.431,4.381,8.196c-1.614-0.051-3.132-0.494-4.46-1.231c-0.001,0.041-0.001,0.082-0.001,0.124
					c0,4.771,3.395,8.751,7.9,9.657c-0.827,0.224-1.696,0.345-2.595,0.345c-0.634,0-1.251-0.063-1.853-0.177
					c1.253,3.912,4.89,6.76,9.199,6.839c-3.371,2.641-7.617,4.216-12.23,4.216c-0.795,0-1.579-0.048-2.349-0.139
					c4.358,2.796,9.534,4.426,15.096,4.426c18.113,0,28.019-15.007,28.019-28.021c0-0.427-0.009-0.852-0.028-1.273
					C-38.989,28.822-37.32,27.088-36,25.113z"/>
				<g>
					<g>
						<path fill="#FFFFFF" d="M62.989,54h-6.396C56.593,37,43,24.164,27,24.164v-6.397C47,17.767,62.989,34,62.989,54z"/>
					</g>
					<g>
						<path fill="#FFFFFF" d="M49.883,54h-6.397C43.485,44,35,37.272,27,37.272v-6.397C39,30.875,49.883,41,49.883,54z"/>
					</g>
					<circle fill="#FFFFFF" cx="31.649" cy="49.676" r="4.558"/>
				</g>
				<circle fill="#B3B3B3" cx="140" cy="40" r="39"/>
				<g>
					<line fill="none" x1="120" y1="26" x2="159" y2="26"/>
					<g>
						<polygon fill="#FFFFFF" points="140,48.658 138.081,47.515 117,34.033 117,53 163,53 163,34.033 141.919,47.515 		"/>
						<polygon fill="#FFFFFF" points="163,28 117,28 140,42.625 		"/>
					</g>
					<path fill="#B3B3B3" d="M159,26"/>
					<path fill="#B3B3B3" d="M120,26"/>
				</g>
			</svg>
            </a>
            <a href="/contact" title="Contact me">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 width="80px" height="80px" viewBox="0 0 80 80" enable-background="new 0 0 80 80" xml:space="preserve">
				<circle fill="#B3B3B3" cx="-60" cy="40" r="39"/>
				<circle fill="#B3B3B3" cx="-160" cy="40" r="39"/>
				<path fill="#FFFFFF" d="M-136,25.113c-1.767,0.783-3.664,1.313-5.656,1.551c2.033-1.219,3.595-3.148,4.33-5.448
					c-1.902,1.128-4.011,1.948-6.253,2.39c-1.797-1.914-4.356-3.11-7.188-3.11c-5.438,0-9.848,4.409-9.848,9.848
					c0,0.771,0.087,1.523,0.255,2.244c-8.184-0.41-15.44-4.331-20.297-10.289c-0.848,1.455-1.333,3.146-1.333,4.951
					c0,3.416,1.738,6.431,4.381,8.196c-1.614-0.051-3.132-0.494-4.46-1.231c-0.001,0.041-0.001,0.082-0.001,0.124
					c0,4.771,3.395,8.751,7.9,9.657c-0.827,0.224-1.696,0.345-2.595,0.345c-0.634,0-1.251-0.063-1.853-0.177
					c1.253,3.912,4.89,6.76,9.199,6.839c-3.371,2.641-7.617,4.216-12.23,4.216c-0.795,0-1.579-0.048-2.349-0.139
					c4.358,2.796,9.534,4.426,15.096,4.426c18.113,0,28.019-15.007,28.019-28.021c0-0.427-0.009-0.852-0.028-1.273
					C-138.989,28.822-137.32,27.088-136,25.113z"/>
				<g>
					<g>
						<path fill="#FFFFFF" d="M-37.011,54h-6.396C-43.407,37-57,24.164-73,24.164v-6.397C-53,17.767-37.011,34-37.011,54z"/>
					</g>
					<g>
						<path fill="#FFFFFF" d="M-50.117,54h-6.397C-56.515,44-65,37.272-73,37.272v-6.397C-61,30.875-50.117,41-50.117,54z"/>
					</g>
					<circle fill="#FFFFFF" cx="-68.351" cy="49.676" r="4.558"/>
				</g>
				<circle fill="#B3B3B3" cx="40" cy="40" r="39"/>
				<g>
					<line fill="none" x1="20" y1="26" x2="59" y2="26"/>
					<g>
						<polygon fill="#FFFFFF" points="40,48.658 38.081,47.515 17,34.033 17,53 63,53 63,34.033 41.919,47.515 		"/>
						<polygon fill="#FFFFFF" points="63,28 17,28 40,42.625 		"/>
					</g>
					<path fill="#B3B3B3" d="M59,26"/>
					<path fill="#B3B3B3" d="M20,26"/>
				</g>
			</svg>

            </a>
                <?php 

	}

endif;


/* Helper function used to increase the length of the except shown on the front page.
 */
function custom_excerpt_length( $length ) {
	return 75;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function paragraph_indent($atts, $content = null) {
	return '<p class="indent">'.$content.'</p>';
}
add_shortcode("indent", "paragraph_indent");


function paragraph_endcall($atts, $content = null) {
	return '<p class="endCall">'.$content.'</p>';
}

add_shortcode("endcall", "paragraph_endcall");

function render_code($atts, $content = null) {

	extract(shortcode_atts(array(  
	        "type" => 'csharp'  
	    ), $atts));  

	return '<pre class="brush: '.$type.'">'.$content.'</pre>';

}

add_shortcode("code", "render_code");


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
		<p><?php _e( 'Pingback:', 'nhthirteen' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( 'Edit', '<span class="edit-link">', '</span>' ); ?></p>
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
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time><time class="mobile" datetime="%2$s">%4$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( '%1$s at %2$s', get_comment_date(), get_comment_time() ),
						sprintf( '%1$s %2$s', get_comment_date("Y-m-d"), get_comment_time())
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