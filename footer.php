<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after
 *
 * @package pengu!n
 */
?>

<?php tha_content_bottom(); ?>
</div><!-- #content -->
<?php tha_content_after(); ?>

<?php tha_footer_before(); ?>
<footer id="colophon" class="site-footer container" role="contentinfo">
	<?php tha_footer_top(); ?>
	<?php tha_footer_bottom(); ?>
</footer><!-- #colophon -->
<?php tha_footer_after(); ?>

</div><!-- #page -->
<?php tha_body_bottom(); ?>
<?php wp_footer(); ?>
</body>
</html>