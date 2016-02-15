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
				'display' : 'inline-block',
				'background-color' : 'goldenrod',
				'color' : '#fff',
				'text-transform' : 'uppercase',
				'margin-top' : '6px',
				'padding' : '4px 6px',
				'font-size': '10px',
				'letter-spacing': '1px',
				'line-height': '1.5',
				'clear' : 'both'
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