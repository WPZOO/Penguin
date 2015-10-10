/*
 * Initialization and options of Masonry
 */
if ( typeof jQuery == 'undefined' ) {
	var posts_container = document.querySelector('#posts-container');
	var penguin_post = document.querySelector('.penguin-post');
	var msnry = new Masonry( posts_container, {
		columnWidth: 400,
		gutter: 32,
		itemSelector: '.penguin-post',
		transitionDuration: '1s'
	});
	// initialize Masonry after all images have loaded
	imagesLoaded( posts_container, function() {
		msnry.layout();
	});
//	window.twttr = function (d, s, id) {
//		var t, js, fjs = d.getElementsByTagName(s)[0];
//		if (d.getElementById(id)) return; js = d.createElement(s); js.id = id;
//		js.src = "https://platform.twitter.com/widgets.js";
//		fjs.parentNode.insertBefore(js, fjs);
//		return window.twttr || (t = { _e: [], ready: function (f) { t._e.push(f) } });
//	}(document, 'script', 'twitter-wjs');
//
//	twttr.ready(function (twttr) {
//		twttr.events.bind('loaded', function (event) {
//			//DO A MASONRY RELAYOUT HERE
//			msnry.layout();
//		});
//	});
	$('.elem').each(function(elem,index){
		var height = $(elem).find('iframe').height();
		$(elem).height(height);
	});
} else {
	jQuery(document).ready(function ($) {

		//Masonry blocks
		var $container = $( "#posts-container" );

		$container.imagesLoaded( function() {
			$container.masonry({
				columnWidth: 400,
				gutter: 32,
				itemSelector: '.penguin-post',
				transitionDuration: '1s'
			});

			// Fade blocks in after images are ready (prevents jumping and re-rendering)
			$( ".penguin-post" ).show();
		});

		$( window ).resize( function() {
			$container.masonry();
		});

		// Layout posts that arrive via infinite scroll
		infinite_count = 0;
		$( document.body ).on( 'post-load', function () {

			infinite_count = $( '.infinite-wrap:last-of-type' ).data( 'page-num' );

			// Show the blocks
			$( ".penguin-post" ).show();

			var $newItems = $( '#infinite-view-' + infinite_count  ).not('.is--replaced');
			var $elements = $newItems.find('.penguin-post');
			$elements.hide();
			$container.append($elements);

			$container.imagesLoaded( function() {
				$container.masonry( "appended", $elements, true ).masonry( "reloadItems" ).masonry( "layout" );
				$elements.fadeIn();
			});

		});
	});
}
