/*
 * Initialization and options of Masonry
 */
var container = document.querySelector('#posts-container');
var msnry = new Masonry( container, {
	columnWidth: 400,
	gutter: 32,
	itemSelector: 'hentry',
	transitionDuration: '1s'
});
// initialize Masonry after all images have loaded
imagesLoaded( container, function() {
	msnry.layout();
});

// Initialize Masonry for Jetpack Infinite Scroll
if (typeof jQuery != 'undefined') {
	jQuery( document ).ready( function( $ ) {
		infinite_count = 0;
		// Triggers on infinite scroll
		$( document.body ).on( 'post-load', function () {
			infinite_count = infinite_count + 1;
			var $container = $('#infinite-view-' + infinite_count);
			// initialize Masonry after all images have loaded
			$container.imagesLoaded( function() {
				$container.masonry({
					columnWidth: 400,
					gutter: 32,
					itemSelector: '.post'
				});
			});
		});
	});
}
