$.fn['contentGridFilter'] = function() {
	return this.each(function() {
		var targetSelector = $(this).attr('data-filter-target'),
			target = $(targetSelector),
			filter = $(this);

		filter.on('click', 'a', function(e) {
			e.preventDefault();

			$('.active', filter).removeClass('active');
			$(this).closest('li').addClass('active');

			target.isotope({
				filter: $( this ).parent().attr( 'data-filter' )
			});
		});
	});
};