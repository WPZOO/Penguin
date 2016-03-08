<?php
/**
 * The template part for displaying the big image on the top of the page.
 *
 * @package Penguin Gold
 */

$classes = get_body_class();
if ( in_array( 'has-headerimg', $classes ) ) : ?>
    <div class="headerimg">
        <?php the_post_thumbnail( 'full' ); ?>
    </div>
<?php endif; ?>