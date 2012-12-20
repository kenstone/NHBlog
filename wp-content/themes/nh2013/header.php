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

    <meta name="description" content="">

    <link rel="me" type="text/html" href="http://plus.google.com/117442799415877949162" />
    <link rel="me" type="text/html" href="http://twitter.com/kenstone"> 


    <!-- Mobile viewport optimized: h5bp.com/viewport -->
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

    <link rel="alternate" type="application/rss+xml" title="Notebook Heavy &raquo; Feed" href="http://notebookheavy.com/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Notebook Heavy &raquo; Comments Feed" href="http://notebookheavy.com/comments/feed/" />

    <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->
    <script type="text/javascript" src="//use.typekit.net/iis6ajs.js"></script>
    <script type="text/javascript">try { Typekit.load(); } catch (e) { }</script>
    <script src="//dadchartsstorage.blob.core.windows.net/nhblogjs/modernizr-2.5.3.min.js"></script>


    <?php wp_head(); ?>
</head>
<body>
    <header>
        <a href="/" title="Notebook Heavy">NOTEBOOK HEAVY</a>
        <nav>
            <ul>
                <li>
                    <a href="/category/words" title="words">Words</a>
                </li>
                <li><a href="/category/code" title="code">Code</a></li>
                <li><a href="/about" title="about">About</a></li>
            </ul>
        </nav>


    </header>
    <div id="main">
    	