<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after
 *
 * @package Penguin Gold
 */
?>

<?php penguin_content_bottom(); ?>
</div><!-- #content -->
<?php penguin_content_after(); ?>

<?php penguin_footer_before(); ?>
<footer id="colophon" class="site-footer container" role="contentinfo">
	<?php penguin_footer_top(); ?>

	<nav id="secondary-navigation" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'footer-menu nav-menu clear', 'depth' => 1, 'fallback_cb'=> '' ) ); ?>
	</nav>
	<?php penguin_footer_bottom(); ?>
</footer><!-- #colophon -->
<?php penguin_footer_after(); ?>

</div><!-- #page -->
<?php penguin_body_bottom(); ?>
<?php wp_footer(); ?>
</body>
</html>