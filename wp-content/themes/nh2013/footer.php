<?php
/**
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

 ?>


    

    <footer>
        <label>&copy; 2012, <a href="http://plus.google.com/117442799415877949162/?rel=me" title="David Iffland">David Iffland</a></label>
        <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.en_US"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" /></a>
        <label>Designed in Illinois by me</label>
    </footer>


    <!-- JavaScript at the bottom for fast page loading -->

    <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-4053014-3']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>

    <?php
        if (is_single()) : ?>
            <script src="//dadchartsstorage.blob.core.windows.net/nhblogjs/shCore.js"></script>
            <script src="//dadchartsstorage.blob.core.windows.net/nhblogjs/shBrushCSharp.js"></script>
            <script src="//dadchartsstorage.blob.core.windows.net/nhblogjs/shBrushJScript.js"></script>
            <script src="//dadchartsstorage.blob.core.windows.net/nhblogjs/shBrushXml.js"></script>

            <script type="text/javascript">SyntaxHighlighter.all();</script>
        <?php endif; ?>

        
        
    
</body>
</html>