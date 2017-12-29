$(function() {
	// Initialize the header sticky
	$.headerSticky();

  // Initialize the menu mobile
  $.mobileMenu();

	// Initialize go-to-top button
	$.gotop();

	// Initialize scroll down arrow
	$('.content-header .down-arrow a').on('click', function() {
		var stickyHeaderHeight = $('#site-header-sticky').height() || 0;
		var adminbarHeight = $('#wpadminbar').height() || 0;
		var contentOffset = $('.content-header').offset().top + $('.content-header').outerHeight();

		$( 'html, body' ).animate({
			scrollTop: contentOffset - (stickyHeaderHeight + adminbarHeight)
		});
	});

	// Initialize the off-canvas toggler
	$('.off-canvas-toggle').offCanvasToggle();

	// Initialize the search box toggler on the
	// navigation bar
	$('.navigator .search-box').navSearch();

	// Initialize the grid component
	$('[data-grid]').contentGrid();

	// Initialize the grid items filter
	$('[data-filter-target]').contentGridFilter();

	// Initialize swiper slider
	$('[data-swiper]').swiperSlider();

	// Initialize lightbox
	$('[rel^="prettyPhoto"]').prettyPhoto({
		social_tools: ''
	});
});

$(window).on('load', function() {
  $('.elm-google-maps[data-options]').googleMaps();
});
