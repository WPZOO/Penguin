/**
 * navigation.js
 * Handles toggling the navigation menu for small screens.
 */
( function() {
	var container, button, menu;

	container = document.getElementById( 'site-navigation' );
	if ( ! container )
		return;

	button = container.getElementsByTagName( 'span' )[0];
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
 * Scroll to Top link
 */
// http://codepen.io/sturobson/pen/equnb
document.getElementById('scroll-to-top').onclick = function () {
	scrollTo(document.body, 0, 800);
}

function scrollTo(element, to, duration) {
	if (duration < 0) return;
	var difference = to - element.scrollTop;
	var perTick = difference / duration * 2;

	setTimeout(function() {
		element.scrollTop = element.scrollTop + perTick;
		scrollTo(element, to, duration - 2);
	}, 10);
}

// http://codepen.io/foleyatwork/pen/wxurt
(function () {
	var button = document.getElementById('scroll-to-top'), opacity;
	var min = 0;

	function setButtonOpacity () {
		if (screen.height < 100) return;
		opacity = 0 + window.scrollY / (screen.height + 100);
		button.style.display = 'block';
		button.style.opacity = opacity > min ? opacity : min;
	}

	window.addEventListener('scroll', setButtonOpacity);
})();
