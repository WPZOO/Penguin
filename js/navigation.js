/**
 * navigation.js
 * Handles toggling the navigation menu for small screens.
 */
( function() {
	var container, button, menu;

	container = document.getElementById( 'site-navigation' );
	if ( ! container )
		return;

	button = container.getElementsByTagName( 'svg' )[0];
	if ( 'undefined' === typeof button )
		return;

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( -1 === menu.className.indexOf( 'nav-menu' ) )
		menu.className += ' nav-menu';

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) )
			container.className = container.className.replace( ' toggled', '' );
		else
			container.className += ' toggled';
	};
} )();

/**
 * Skip link focus fix
 */
( function() {
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
					element.tabIndex = -1;

				element.focus();
			}
		}, false );
	}
})();

/**
 * Init smoothScroll for the scroll to top link
 */
smoothScroll.init({
	speed: 500,                     // Integer. How fast to complete the scroll in milliseconds
	easing: 'easeInOutCubic',       // Easing pattern to use
	offset: 0,                      // Integer. How far to offset the scrolling anchor location in pixels
	updateURL: true,                // Boolean. Whether or not to update the URL with the anchor hash on scroll
	callbackBefore: function () {}, // Function to run before scrolling
	callbackAfter: function () {}   // Function to run after scrolling
});

/**
 * Scroll to top link
 * Adapted from http://codepen.io/foleyatwork/pen/wxurt
 * Uses smooth scroll for a smother experiance
 */
(function () {
	var button = document.getElementById('scroll-to-top'), opacity;
	var max = 1;

	function setButtonOpacity () {
		if ( screen.height < 100 ) {
			return;
		} else {
			opacity = window.scrollY / (screen.height + 100);
			if ( opacity > 0 ) {
				button.style.display = 'block';
			} else {
				button.style.display = 'none';
			}
			button.style.opacity = opacity < max ? opacity : max;
		}
	}

	if (window.addEventListener) { // For all major browsers, except IE 8 and earlier
		window.addEventListener('scroll', setButtonOpacity);
	} else if (window.attachEvent) { // For IE 8 and earlier versions
		window.attachEvent('scroll', setButtonOpacity);
	}

})();
