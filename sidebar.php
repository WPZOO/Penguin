<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Penguin Gold
 */
?>

<?php penguin_sidebars_before(); ?>
<div id="secondary" class="widget-area" role="complementary">
	<?php penguin_sidebar_top(); ?>
	<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

		<aside id="search" class="widget widget_search">
			<?php get_search_form(); ?>
		</aside>

	<?php endif; // end sidebar widget area ?>
	<?php penguin_sidebar_bottom(); ?>
</div><!-- #secondary -->
<?php penguin_sidebars_after(); ?>