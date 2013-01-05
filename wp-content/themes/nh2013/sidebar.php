<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package NotebookHeavy
 * @subpackage NH2013
 * @since NH2013 1.0
 */
?>
<section id="sidebar">
    <div>
       <?php get_search_form( $echo ); ?>
    </div>
    <div class="clearfix">
        <div id="headshot">
            <a href="/about">
                <img src="//dadchartsstorage.blob.core.windows.net/nhblogimage/headshot.jpg" /></a>
        </div>
        <div id="socialButtons">    
           <?php get_social_buttons(); ?>
        </div>

    </div>
    <div id="bio">
        
        <div>
            Dave Iffland is a blogger, speaker, dad, hubby, and indie developer. He is the founder of Heavy Code, LLC and is passionate about
            web development.
        </div>
    </div>

  
    <div id="ad1">
        
    </div>
    <div id="ad2">
        

    </div>
    <?php if (is_single()) {
        
        $instance = array("title" => "Recent Posts", "number" => 5);
        the_widget('WP_Widget_Recent_Posts', $instance); 
    }

    ?>
</section>