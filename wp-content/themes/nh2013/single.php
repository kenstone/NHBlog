<?php
/**
 *
 * @package NotebookHeavy
 * @subpackage NH2013
 * @since NH2013 1.0
 */

get_header(); ?>
 <div id="main">
	<div id="bigImage" style="background-image: url(<?php echo nhthirteen_get_featured_source(); ?>)">
	    <div class="blackOverlay"></div>

	</div>

	
	<?php while ( have_posts() ) : the_post(); ?>
		<section id="articles">
		        <article id="singleton">
		        	<h1><?php the_title(); ?></h1>
		        	<?php the_content(); ?>
				</article>
		</section>
    <?php endwhile; // end of the loop. ?>
	<?php get_sidebar(); ?>
</div>
 	<div id="leaderboard" class="singleton">
        
    </div>
    <?php comments_template( '', true ); ?>



<?php get_footer(); ?>

