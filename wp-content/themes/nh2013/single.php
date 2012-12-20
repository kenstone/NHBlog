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

	<?php get_sidebar(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<section id="articles">
		        <article id="singleton">
		        	<h1><?php the_title(); ?></h1>
		        	<?php the_content(); ?>
				</article>
		</section>
    <?php endwhile; // end of the loop. ?>

 	<div id="leaderboard">
        
    </div>
    <?php comments_template( '', true ); ?>
</div>

<?php get_footer(); ?>

<script src="//dadchartsstorage.blob.core.windows.net/nhblogjs/shCore.js"></script>
<script src="//dadchartsstorage.blob.core.windows.net/nhblogjs/shBrushCSharp.js"></script>
<script type="text/javascript">SyntaxHighlighter.all();</script>