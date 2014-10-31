/*
 * Initialization and options of Masonry
 */

var container = document.querySelector('#posts-container');
var msnry;
// initialize Masonry after all images have loaded
imagesLoaded( container, function() {
	msnry = new Masonry( container, {
		columnWidth: 400,
		gutter: 32,
		itemSelector: '.hentry'
	});
});
