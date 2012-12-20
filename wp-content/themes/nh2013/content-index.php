<?php
/**
 * The template for displaying post snippets. Used for both single and index/archive/search.
 *
 * @package NotebookHeavy
 * @subpackage NH2013
 * @since NH2013 1.0
 */
?>

<article id="post-<?php the_ID(); ?>">
    <div style="background-image: url(<?php nhthirteen_get_sliver_source(); ?>)" class="sliver">
    	<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( 'Permalink to %s', the_title_attribute( 'echo=0' )  ) ); ?>" rel="bookmark">&nbsp;</a>
    </div>
    <div class="postInfo">
        <h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( 'Permalink to %s', the_title_attribute( 'echo=0' )  ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <footer>
            <time><?php the_date('Y-m-d'); ?></time>
            
            <div class="tags">
               <?php the_tags('', ', ',''); ?>
            </div>

        </footer>
    </div>
    <div class="postSample">
        <section>
            <?php the_excerpt(); ?>
        </section>
       <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( 'Permalink to %s', the_title_attribute( 'echo=0' )  ) ); ?>" rel="bookmark">Continue Reading</a>
    </div>


</article>