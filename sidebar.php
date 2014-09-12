<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package pengu!n
 */
?>
<?php tha_sidebars_before(); ?>
<div id="secondary" class="widget-area" role="complementary">
	<?php tha_sidebar_top(); ?>
	<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

		<aside id="search" class="widget widget_search">
			<?php get_search_form(); ?>
		</aside>

	<?php endif; // end sidebar widget area ?>
	<?php tha_sidebar_bottom(); ?>
</div><!-- #secondary -->
<?php tha_sidebars_after(); ?>