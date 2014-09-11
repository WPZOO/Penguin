<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package pengu!n
 */
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer container" role="contentinfo">
	<a href="#" class="scrollToTop"><?php __('Scroll To Top', 'penguin' ) ?></a>
	<a href="http://www.pixelstrol.ch/" rel="designer">
		PENGU!N WordPress Theme <?php _e( 'made by WPZOO', 'penguin' ) ?>
	</a>
</footer><!-- #colophon -->

</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>