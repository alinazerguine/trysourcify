$.fn['contentGrid'] = function() {
	return this.each(function() {
		var $this = $(this);

		$this.imagesLoaded().then(function() {
			$this.isotope(
				$.extend({}, $this.data('grid'), {
					layoutMode: 'packery',
					percentPosition: true
				})
			);
		});
	});
};