<?php
/**
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
 <div id="main">
	<?php get_sidebar(); ?>
		<section id="articles">


			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'index' ); ?>
			<?php endwhile; ?>

	      <?php nhthirteen_content_nav(); ?>

		</section>


</div>

<div id="leaderboard">
    
</div>

<?php get_footer(); ?>