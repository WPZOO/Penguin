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
jQuery(document).ready(function(){
	
	//Check to see if the window is top if not then display button
	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.scrollToTop').fadeIn();
		} else {
			jQuery('.scrollToTop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	jQuery('.scrollToTop').click(function(){
		jQuery('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});