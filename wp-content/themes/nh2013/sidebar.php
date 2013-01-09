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
                <img src="//dadchartsstorage.blob.core.windows.net/nhblogimage/headshot.jpg" alt="Dave Iffland Headshot" /></a>
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
      <script type="text/javascript"><!--
        google_ad_client = "ca-pub-0038909073879850";
        /* NH13 sisebar aquare */
        google_ad_slot = "9586690583";
        google_ad_width = 336;
        google_ad_height = 280;
        //-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>  
    </div>
    <div id="ad2">
        <script type="text/javascript"><!--
            google_ad_client = "ca-pub-0038909073879850";
            /* nh13 sidebar tower */
            google_ad_slot = "2063423787";
            google_ad_width = 160;
            google_ad_height = 600;
            //-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

    </div>
    <?php if (is_single()) {
        
        $instance = array("title" => "Recent Posts", "number" => 5);
        the_widget('WP_Widget_Recent_Posts', $instance); 
    }

    ?>
</section>