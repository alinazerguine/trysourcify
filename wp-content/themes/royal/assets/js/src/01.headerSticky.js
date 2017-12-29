$.headerSticky = function() {
	$win.on( 'scroll load', function() {
		$win.scrollTop() > $( '#site-header' ).outerHeight()
			? $( '.site-header-sticky' ).addClass( 'active' )
			: $( '.site-header-sticky' ).removeClass( 'active' );
	} );
};
