<?php
/**
 * The template for displaying the footer for the oik2012 theme
 *
 * Contains footer content and the closing of the #main and #page div elements - for twentytwelve
 * Displays up to 4 footer widgets:
 * left middle right
 * fullwidth
 *
 */
?>
	</div><!-- #main .wrapper -->
        <?php oik2012_footer_widgets(); ?>
        
<br /> 
<br clear="all">
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
                <?php // do_action( 'oik2012_credits' ); ?>
                
                <?php dynamic_sidebar('Footer Widgets fullwidth'); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>

