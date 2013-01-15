<?php while ( have_posts() ) : the_post(); ?>

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

	
	
		<section id="articles">
		        <article id="singleton">
		        	<h1><?php the_title(); ?></h1>
		        	<?php the_content(); ?>
				</article>

				<div id="leaderboard" class="singleton"	>
        			<script type="text/javascript"><!--
						google_ad_client = "ca-pub-0038909073879850";
						/* nh13 footer */
						google_ad_slot = "3540156985";
						google_ad_width = 728;
						google_ad_height = 90;
						//-->
						</script>
						<script type="text/javascript"
						src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
						</script>
    			</div>
    			<?php comments_template( '', true ); ?>

		</section>

    
	<?php get_sidebar(); ?>

</div>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>

