<?php
/**
 * Custom search form template
 *
 * @package Penguin Gold
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'penguin' ) ?></span>
		<input type="search" class="search-field"
			placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder', 'penguin' ) ?>"
			value="<?php echo get_search_query() ?>" name="s"
			title="<?php echo esc_attr_x( 'Search for:', 'label', 'penguin' ) ?>" />
	</label>
	<input type="submit" class="search-submit screen-reader-text" value="<?php echo esc_attr_x( 'Search', 'submit button', 'penguin' ) ?>" />
</form>