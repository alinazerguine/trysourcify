$.fn['offCanvasToggle'] = function() {
	return this.each(function() {
		var activeClass = $(this).attr('data-target') + '-active';

		$(this).on('click', function(e) {
			e.preventDefault();
			e.stopPropagation();
			
			$('body').toggleClass(activeClass);
		});

		$doc.on('click', function() {
			$('body').removeClass(activeClass);
		});

		$('.off-canvas').on('click', function(e) {
			e.stopPropagation();
		});
	});
};
