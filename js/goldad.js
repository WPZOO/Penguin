/**
 * Upsell notice for theme
 */

( function( $ ) {

	// Add Upgrade Message
	if ('undefined' !== typeof penguinL10n) {
		upsell = $('<a class="penguin-goldad-link"></a>')
			.attr('href', penguinL10n.penguinURL)
			.attr('target', '_blank')
			.text(penguinL10n.penguinLabel)
			.css({
				'background-color': 'goldenrod',
				'clear': 'both',
				'color': '#fff',
				'display': 'inline-block',
				'font-size': '10px',
				'letter-spacing': '1px',
				'line-height': '1.5',
				'margin-top': '6px',
				'padding': '4px 6px',
				'text-transform': 'uppercase',
				'text-decoration': 'none'
			})
		;

		setTimeout(function () {
			$('#accordion-section-themes h3').append(upsell);
		}, 200);

		// Remove accordion click event
		$('.penguin-goldad-link').on('click', function(e) {
			e.stopPropagation();
		});
	}

} )( jQuery );