/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	wp.customize( 'footer-text', function( value ) {
		value.bind( function( to ) {
			$( '#poweredby' ).text( to );
		} );
	} );

	wp.customize( 'brightness-navbar', function( value ) {
		value.bind( function( to ) {
			if ( to === 'bright' ) {
				$( document.body ).addClass( 'bright-navbar' );
			} else {
				$( document.body ).removeClass( 'bright-navbar' );
			}
			
		} );
	} );

	wp.customize( 'link-color', function( value ) {
		value.bind( function( to, from ) {
			$( '#penguin-style-inline-css' ).html( function ( index, html ) {
				return html.replace( from, to );
			} );
		} );
	} );

} )( jQuery );