$.gotop = function() {
	$('.go-to-top a').on('click', function() {
		$( 'html, body' ).animate({ scrollTop: 0 });
	});

	$win.on('scroll', function() {
		if ($win.scrollTop() > 0) $('.go-to-top').addClass('active');
		else $('.go-to-top').removeClass('active');
	}).on('load', function() {
		$win.trigger('scroll');
	});
};