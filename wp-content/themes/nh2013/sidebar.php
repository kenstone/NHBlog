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
                <img src="//az415353.vo.msecnd.net/nhblogimage/headshot.jpg" alt="Dave Iffland Headshot" /></a>
        </div>
        <div id="socialButtons">    
           <?php get_social_buttons(); ?>
        </div>

    </div>
    <div id="bio">
        
        <div>
            Dave Iffland is a blogger, speaker, dad, hubby, and creator of <a href="http://www.momcharts.com" title="MomCharts">MomCharts</a>. He is the founder of Heavy Code, LLC and is passionate about
            web development.
        </div>
    </div>

    <!-- Begin MailChimp Signup Form -->
    <div id="mc_embed_signup">
    <form action="http://momcharts.us6.list-manage.com/subscribe/post?u=075c5043fb371be6f49a9ceb5&amp;id=7afda3ee95" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    	<h2>Want The Newsletter?</h2>
    	<label for="mce-EMAIL" class="ancientHelper">Email Address </label>
    	<input type="email" value="" name="EMAIL" id="mce-EMAIL" placeholder="email address">
    	<button>Get It!</button>

    </form>
    </div>

    <?php 
       get_ad_section();
    ?>

    <!--End mc_embed_signup-->
    
    <?php if (is_single()) {
        
        $instance = array("title" => "Recent Posts", "number" => 5);
        the_widget('WP_Widget_Recent_Posts', $instance); 
    }

    ?>
</section>