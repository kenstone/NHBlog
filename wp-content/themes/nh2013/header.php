<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!-->
<html class="no-js"<?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('name'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<meta name="author" content="David Iffland" />
	<meta name="copyright" content="David Iffland" />

    <meta name="msvalidate.01" content="2AEC1661F41A33829C241596C37C4E79" />
    <meta name="google-site-verification" content="JwzLQeu_nXodSwIGi85ocuqwah4WFZp0qxPGgVUeO3s" />


    <meta name="description" content="<?php 
        if (is_single()) {
            the_excerpt();
        }
        else { ?>
            Dave Iffland writes about living and programming while raising two kids.
        <?php } ?>">

    <link rel="me" type="text/html" href="http://plus.google.com/117442799415877949162" />
    <link rel="me" type="text/html" href="http://twitter.com/kenstone"> 

    <meta name="application-name" content=" Notebook Heavy"/> 
    <meta name="msapplication-TileColor" content="#9e1166"/> 
    <meta name="msapplication-TileImage" content="//dadchartsstorage.blob.core.windows.net/nhblogimage/nh.png"/> 

    <link rel="shortcut icon" href="//dadchartsstorage.blob.core.windows.net/nhblogimage/nh2013.ico" />
    <link rel="apple-touch-icon" href="//dadchartsstorage.blob.core.windows.net/nhblogimage/nh-apple.png" />
    

    <!-- Mobile viewport optimized: h5bp.com/viewport -->
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

    <link rel="alternate" type="application/rss+xml" title="Notebook Heavy &raquo; Feed" href="http://feeds.feedburner.com/notebookheavy" />
    <link rel="alternate" type="application/rss+xml" title="Notebook Heavy &raquo; Comments Feed" href="http://notebookheavy.com/comments/feed/" />

    <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->
    <script type="text/javascript" src="//use.typekit.net/iis6ajs.js"></script>
    <script type="text/javascript">try { Typekit.load(); } catch (e) { }</script>
    <script src="//dadchartsstorage.blob.core.windows.net/nhblogjs/modernizr-2.5.3.min.js"></script>


    <?php wp_head(); ?>
</head>
<body>
    <header class="clearfix">
        <h1>
            <a href="/" title="Notebook Heavy">NOTEBOOK HEAVY</a>
        </h1>
        <nav>
            <ul>
                <li>
                    <a href="/category/words" title="words">Words</a>
                </li>
                <li><a href="/category/code" title="code">Code</a></li>
                <li><a href="/about" title="about">About</a></li>
            </ul>
        </nav>
        <div id="socialButtonsMobile">
           <?php get_social_buttons(); ?>
        </div>

    </header>
   
    	