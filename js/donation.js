/**
 * Donation notice for theme
 */

( function( $ ) {

	// Add Upgrade Message
	if ('undefined' !== typeof penguinL10n) {
		donation = $('<a class="penguin-customizer-donation"></a>')
			.attr('href', penguinL10n.penguinURL)
			.attr('target', '_blank')
			.text(penguinL10n.penguinLabel)
			.css({
				'background-color': '#00ade5',
				'clear': 'both',
				'color': '#fff',
				'display': 'inline-block',
				'margin-top': '6px',
				'padding': '4px 7px',
				'text-decoration': 'none'
			})
		;

		setTimeout(function () {
			$('#accordion-section-themes h3').append(donation);
		}, 200);

		// Remove accordion click event
		$('.penguin-donation-link').on('click', function(e) {
			e.stopPropagation();
		});
	}

} )( jQuery );