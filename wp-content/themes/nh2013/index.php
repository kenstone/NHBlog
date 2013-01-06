<?php
/**
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
 <div id="main">
	
		<section id="articles">


			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'index' ); ?>
			<?php endwhile; ?>

	      <?php nhthirteen_content_nav(); ?>

		</section>
<?php get_sidebar(); ?>

</div>

<div id="leaderboard">
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

<?php get_footer(); ?>