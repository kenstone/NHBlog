<?php
/**
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
 <div id="main">
	<div id="bigImage" style="background-image: url(img/eeprom-wide.jpg)">
	    <div class="blackOverlay"></div>

	</div>

	<?php get_sidebar(); ?>
	<section id="articles">
            <article id="singleton">
            	<h1><?php the_title(); ?></h1>
            	<?php the_content(); ?>
    		</article>
    </section>

 	<div id="leaderboard">
        
    </div>
</div>

<?php get_footer(); ?>