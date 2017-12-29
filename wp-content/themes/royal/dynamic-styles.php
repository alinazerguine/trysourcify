<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

// Generate the background styles based on the
// given options key
$background_options = array(
	'global__layout__background'      => 'body, .site',
	'global__sidebar__background'     => '.main-sidebar',
	'header__background'              => '.site-header, .site-header .widget.widget_search',
	'header__topbar__background'      => '.site-topbar',
	'header__nav__background'         => '.site-header .navigator',

	'header__sticky__background'      => '.site-header-sticky, .site-header-sticky .widget.widget_search',
	'header__sticky__nav__background' => '.site-header-sticky .navigator',
	
	// Title bar
	'header__titlebar__background' => '.content-header'
);

foreach ( $background_options as $key => $selector ) {
	royal_define_style( $selector, royal_background_styles(
		royal_option( $key )
	) );
}

if ( is_singular() ) {
	$featured_background_types = (array) royal_option( 'header__titlebar__backgroundFeatured' );
	$current_post_type         = royal_current_post_type();
	
	if ( in_array( $current_post_type, $featured_background_types ) && has_post_thumbnail() ) {
		list($src, $width, $height, $crop) = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false );
		
		royal_define_style( '.content-header', array(
			'background-image' => sprintf( 'url(%s)', $src )
		) );
	}
}


// Generate the typography styles based on the
// given options key
$typography_options = array(
	'global__typography__body'              => 'body',
	'global__typography__h1'                => 'h1',
	'global__typography__h2'                => 'h2',
	'global__typography__h3'                => 'h3',
	'global__typography__h4'                => 'h4',
	'global__typography__h5'                => 'h5',
	'global__typography__h6'                => 'h6',
	'global__typography__blockquote'        => 'blockquote',
	'header__topbar__typography'            => '.site-topbar',
	'header__nav__typography'               => '.site-header .navigator > .menu > li > a',
	'header__sticky__nav__typography'       => '.site-header-sticky .navigator > .menu > li > a',

	// Title bar
	'header__titlebar__titleFont' => '.content-header .page-title-inner',
	'header__titlebar__breadcrumbFont' => '.content-header .breadcrumbs, .content-header .down-arrow a, .page-title .subtitle',

	// Widget
	'global__widget__title'   => '.widget > .widget-title',
	'global__widget__content' => '.widget',

	// Sliding content
	'sliding__sidebarTypography'  => '.off-canvas-left .off-canvas-wrap',
	'sliding__menuTypography'     => '.sliding-menu',

	// Content bottom widgets
	'contentBottom__widgets__typography'   => '.content-bottom-widgets',
	'contentBottom__widgets__title'        => '.content-bottom-widgets .widget-title',

	// Footer typography
	'footer__typography'            => '.site-footer',
	'footer__copyright__typography' => '.footer-copyright',
	'footer__widgets__typography'   => '.footer-widgets',
	'footer__widgets__title'        => '.footer-widgets .widget-title'

);

foreach ( $typography_options as $key => $selector ) {
	royal_define_style( $selector, royal_typography_styles(
		(array) royal_option( $key )
	) );
}

if ( $heading_sizes = royal_option( 'global__typography__headingSize' ) ) {
	foreach ( $heading_sizes as $tag => $size ) {
		royal_define_style( $tag, array(
			'font-size' => $size
		) );
	}
}

// Generate the text colors based on the
// given options key
$text_color_options = array( 'global__typography__colors' );

foreach ( $text_color_options as $key ) {
	$color_values = array_filter( royal_option( $key ) );
	
	foreach ( $color_values as $selector => $color ) {
		royal_define_style( $selector, array(
			'color' => $color
		) );
	}
}

$nav_colors_options = array(
	'header__topbar__colors' => array(
		'menu'        => '.site-topbar a',
		'menu-hover'  => '.site-topbar a:hover',
		'menu-active' => array(
			'.site-topbar a:active',
			'.site-topbar .current-menu-item > a',
			'.site-topbar .current_page_item > a',
			'.site-topbar .current-menu-ancestor > a',
			'.site-topbar .current-menu-parent > a'
		)
	),
	'header__nav__colors' => array(
		'menu'        => '.site-header .off-canvas-toggle, .site-header .navigator .menu > li > a, .site-header .social-icons a',
		'menu-hover'  => '.site-header .off-canvas-toggle:hover, .site-header .navigator .menu > li:hover > a, .site-header .social-icons a:hover',
		'menu-active' => array(
			'.site-header .navigator .menu > li.current-menu-item > a',
			'.site-header .navigator .menu > li.current_page_item > a',
			'.site-header .navigator .menu > li.current-menu-ancestor > a',
			'.site-header .navigator .menu > li.current-menu-parent > a',
			'.site-header .navigator .menu.menu-extras > li > a',
			'.site-header .navigator .menu.menu-extras .search-field',
			'.site-header .off-canvas-toggle',
			'.site-header .off-canvas-toggle:hover'
		)
	),
	'header__sticky__nav__colors' => array(
		'menu'        => '.site-header-sticky .off-canvas-toggle, .site-header-sticky .navigator .menu > li > a, .site-header-sticky .social-icons a',
		'menu-hover'  => '.site-header-sticky .off-canvas-toggle:hover, .site-header-sticky .navigator .menu > li:hover > a, .site-header-sticky .social-icons a:hover',
		'menu-active' => array(
			'.site-header-sticky .navigator .menu > li.current-menu-item > a',
			'.site-header-sticky .navigator .menu > li.current_page_item > a',
			'.site-header-sticky .navigator .menu > li.current-menu-ancestor > a',
			'.site-header-sticky .navigator .menu > li.current-menu-parent > a',
			'.site-header-sticky .navigator .menu.menu-extras > li > a',
			'.site-header-sticky .navigator .menu.menu-extras .search-field',
			'.site-header-sticky .off-canvas-toggle',
			'.site-header-sticky .off-canvas-toggle:hover',
		)
	),
	'header__titlebar__breadcrumbColors' => array(
		'link'      => '.breadcrumbs a',
		'linkHover' => '.breadcrumbs a:hover'
	),

	// Widget link color
	'global__widget__linkColors' => array(
		'link'      => '.main-sidebar a',
		'linkHover' => '.main-sidebar a:hover'
	),

	// Sliding content color
	'sliding__sidebarColors' => array(
		'link'      => '.off-canvas-left a',
		'linkHover' => '.off-canvas-left a:hover'
	),
	'sliding__menuColors' => array(
		'link'      => '.sliding-menu a',
		'linkHover' => '.sliding-menu a:hover'
	),

	// Content bottom widgets
	'contentBottom__widgets__colors' => array(
		'link'      => '.content-bottom-widgets a',
		'linkHover' => '.content-bottom-widgets a:hover'
	),

	// Footer
	'footer__colors' => array(
		'link'      => '.site-footer a',
		'linkHover' => '.site-footer a:hover'
	),
	'footer__widgets__colors' => array(
		'link'      => '.site-footer .footer-widgets a',
		'linkHover' => '.site-footer .footer-widgets a:hover'
	),
	'footer__copyright__colors' => array(
		'link'      => '.site-footer .footer-copyright a',
		'linkHover' => '.site-footer .footer-copyright a:hover'
	),
);

foreach ( $nav_colors_options as $option_key => $selectors ) {
	$colors = royal_option( $option_key );

	foreach ( $colors as $key => $value ) {
		$selector = is_array( $selectors[ $key ] )
			? join( ', ', $selectors[ $key ] )
			: $selectors[ $key ];

		royal_define_style( $selector, array(
			'color' => $value
		) );
	}
}

// Generate the layout width settings
royal_define_style( '.wrap',
	(array) royal_option( 'global__layout__width' )
);

// The content padding styles
royal_define_style( '.content-body-inner',
	(array) royal_option( 'global__layout__padding' )
);

/**
 * The header options
 */
royal_define_style( '.site-header .header-brand',
	(array) royal_option( 'header__logoMargin' )
);
royal_define_style( '.site-header .site-header-inner', array(
	'height' => royal_option( 'header__height' )
) );
royal_define_style( '.site-header .off-canvas-toggle, .site-header .navigator .menu, .site-header .social-icons',
	(array) royal_option( 'header__nav__margin' )
);
royal_define_style( '.site-header .off-canvas-toggle, .site-header .navigator .menu > li > a, .site-header .social-icons a',
	(array) royal_option( 'header__nav__padding' )
);

// Generate styles for the custom header border
if ( royal_option( 'header__border' ) === 'on' ) {
	royal_define_style( '.site-header', royal_border_styles(
		(array) royal_option( 'header__border__options' )
	) );
}

// Generate styles for the custom header title border
if ( royal_option( 'header__titlebar__border' ) === 'on' ) {
	royal_define_style( '.content-header', royal_border_styles(
		(array) royal_option( 'header__titlebar__border__options' )
	) );
}


/**
 * The header options
 */
royal_define_style( '.site-header-sticky .header-brand',
	(array) royal_option( 'header__sticky__logoMargin' )
);
royal_define_style( '.site-header-sticky .site-header-inner', array(
	'height' => royal_option( 'header__sticky__height' )
) );
royal_define_style( '.site-header-sticky .off-canvas-toggle, .site-header-sticky .navigator .menu, .site-header-sticky .social-icons',
	(array) royal_option( 'header__sticky__nav__margin' )
);
royal_define_style( '.site-header-sticky .off-canvas-toggle, .site-header-sticky .navigator .menu > li > a, .site-header-sticky .social-icons a',
	(array) royal_option( 'header__sticky__nav__padding' )
);

// Generate styles for the custom header border
if ( royal_option( 'header__sticky__border' ) === 'on' ) {
	royal_define_style( '.site-header-sticky', royal_border_styles(
		(array) royal_option( 'header__sticky__border__options' )
	) );
}


royal_define_style( '.content-header', (array) royal_option( 'header__titlebar__margin' ) );
royal_define_style( '.content-header', (array) royal_option( 'header__titlebar__padding' ) );
royal_define_style( '.content-header .content-header-inner', array( 'height' => royal_option( 'header__titlebar__height' ) ) );


/**
 * The logo size
 */
foreach ( array( 'logoDefault', 'logoLight', 'logoDark' ) as $logo_profile ) {
	$size = (array) royal_option( "{$logo_profile}__logoSize" );
	$size = array_filter( $size );

	royal_define_style( ".logo.{$logo_profile}", $size );
}

/**
 * The layout framed
 */
if ( royal_option( 'global__layout__mode' ) === 'frame' ) {
	royal_define_style( '#frame > span', array(
		'background' => royal_option( 'global__layout__frame' )
	) );
}


/**
 * The sliding content
 */
if ( is_active_sidebar( 'off-canvas-left' ) ) {
	royal_define_style( '.off-canvas-left .off-canvas-wrap', royal_background_styles(
		(array) royal_option( 'sliding__sidebarBackground' )
	) );
	royal_define_style( '.off-canvas-left .off-canvas-wrap', (array) royal_option( 'sliding__sidebarPadding' ) );
}
if ( has_nav_menu( 'sliding' ) ) {
	royal_define_style( '.sliding-menu', royal_background_styles(
		(array) royal_option( 'sliding__menuBackground' )
	) );
	royal_define_style( '.sliding-menu .off-canvas-wrap', (array) royal_option( 'sliding__menuPadding' ) );
}


/**
 * Sidebar Styles
 */
if ( royal_has_sidebar() ) {
	$layout_dimension = royal_option( 'global__layout__width' );
	$sidebar_dimension = royal_option( 'global__sidebar__dimension' );
	$padding_side = royal_sidebar_position() == 'right' ? 'padding-left' : 'padding-right';

	royal_define_style( '#main-content', array(
		'width' => sprintf( 'calc(100%% - %spx)', (int)$sidebar_dimension['width'] + (int)$sidebar_dimension['margin'] )
	) );
	royal_define_style( '.main-sidebar', array(
		'width' => sprintf( '%spx', (int)$sidebar_dimension['width'] + (int)$sidebar_dimension['margin'] ),
		$padding_side => $sidebar_dimension['margin']
	) );
	royal_define_style( '.main-sidebar', royal_background_styles(
		(array) royal_option( 'global__sidebar__background' )
	) );
}

/**
 * The widget styles
 */
royal_define_style( '.widget', royal_background_styles(
	(array) royal_option( 'global__widget__contentBackground' )
) );
royal_define_style( '.widget', (array) royal_option( 'global__widget__contentPadding' ) );
royal_define_style( '.widget', (array) royal_option( 'global__widget__contentMargin' ) );

royal_define_style( '.widget > .widget-title', royal_background_styles(
	(array) royal_option( 'global__widget__titleBackground' )
) );
royal_define_style( '.widget > .widget-title', (array) royal_option( 'global__widget__titlePadding' ) );
royal_define_style( '.widget > .widget-title', (array) royal_option( 'global__widget__titleMargin' ) );

/**
 * Button styles
 */
royal_define_style( '.button, input[type="button"], input[type="submit"], button', array(
	'background' => royal_option( 'button__background' )
) );
royal_define_style( '.button, input[type="button"], input[type="submit"], button', array( 
	'height' => royal_option( 'button__height' ) 
) );
royal_define_style( '.button, input[type="button"], input[type="submit"], button', royal_typography_styles(
	(array) royal_option( 'button__typography' )
) );
royal_define_style( '.button, input[type="button"], input[type="submit"], button',
	(array) royal_option( 'button__padding' )
);
royal_define_style( '.button, input[type="button"], input[type="submit"], button', royal_border_styles(
	(array) royal_option( 'button__border' )
) );
royal_define_style( '.button, input[type="button"], input[type="submit"], button', array(
	'border-radius' => royal_option( 'button__borderRadius' )
) );

/**
 * Input styles
 */
royal_define_style( 'input, textarea, select', array(
	'background' => royal_option( 'input__background' )
) );
royal_define_style( 'input, select', array( 
	'height' => royal_option( 'input__height' ) 
) );
royal_define_style( 'input, textarea, select', royal_typography_styles(
	(array) royal_option( 'input__typography' )
) );
royal_define_style( 'input, textarea, select',
	(array) royal_option( 'input__padding' )
);
royal_define_style( 'input, textarea, select', royal_border_styles(
	(array) royal_option( 'input__border' )
) );
royal_define_style( 'input, textarea, select', array(
	'border-radius' => royal_option( 'input__borderRadius' )
) );

// Content bottom widgets
if ( royal_option( 'contentBottom__widgets' ) == 'on' ) {
	royal_define_style( '.content-bottom-widgets', royal_background_styles(
		(array) royal_option( 'contentBottom__widgets__background' )
	) );
	royal_define_style( '.content-bottom-widgets', (array) royal_option( 'contentBottom__widgets__padding' ) );
	royal_define_style( '.content-bottom-widgets .widget', (array) royal_option( 'contentBottom__widgets__margin' ) );
}


/**
 * Footer styles
 */
royal_define_style( '.site-footer', royal_border_styles(
	(array) royal_option( 'footer__border' )
) );
royal_define_style( '.site-footer', royal_background_styles(
	(array) royal_option( 'footer__background' )
) );
royal_define_style( '.site-footer', (array) royal_option( 'footer__padding' ) );

// Footer widgets
if ( royal_option( 'footer__widgets' ) == 'on' ) {
	royal_define_style( '.footer-widgets', royal_background_styles(
		(array) royal_option( 'footer__widgets__background' )
	) );
	royal_define_style( '.footer-widgets', (array) royal_option( 'footer__widgets__padding' ) );
	royal_define_style( '.footer-widgets .widget', (array) royal_option( 'footer__widgets__margin' ) );
}

// Footer copyright
if ( royal_option( 'footer__copyright' ) == 'on' ) {
	royal_define_style( '.site-footer .footer-copyright', royal_border_styles(
		(array) royal_option( 'footer__copyright__border' )
	) );
	royal_define_style( '.site-footer .footer-copyright', royal_background_styles(
		(array) royal_option( 'footer__copyright__background' )
	) );
	royal_define_style( '.site-footer .footer-copyright', (array) royal_option( 'footer__copyright__padding' ) );
}


/**
 * Projects
 */
if ( is_post_type_archive( 'nproject' ) ||
	 is_tax( 'nproject-category' ) ||
	 is_tax( 'nproject-tag' ) ||
	 is_page_template( 'tmpl/template-projects.php' ) ) {

	$grid_spacing = abs( (int)royal_option( 'projects__gridGutter' ) );
	
	royal_define_style( '.content-inner[data-grid] .project', array(
		'padding-left'  => sprintf( '%fpx', $grid_spacing/2 ),
		'padding-right' => sprintf( '%fpx', $grid_spacing/2 ),
		'margin-bottom' => sprintf( '%dpx', $grid_spacing )
	) );

	royal_define_style( '.projects .content-inner[data-grid]', array(
		'margin-left'  => sprintf( '%dpx', -$grid_spacing/2 ),
		'margin-right' => sprintf( '%dpx', -$grid_spacing/2 )
	) );
}

/**
 * Shop
 */
if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	$grid_spacing = abs( (int)royal_option( 'shop__gridGutter' ) );
	
	royal_define_style( '.content-inner.products[data-grid] .product', array(
		'padding-left'  => sprintf( '%fpx', $grid_spacing/2 ),
		'padding-right' => sprintf( '%fpx', $grid_spacing/2 ),
		'margin-bottom' => sprintf( '%dpx', $grid_spacing )
	) );

	royal_define_style( '.content-inner.products[data-grid]', array(
		'margin-left'  => sprintf( '%dpx', -$grid_spacing/2 ),
		'margin-right' => sprintf( '%dpx', -$grid_spacing/2 )
	) );
}

/**
 * Blog
 */
$grid_spacing = abs( (int)royal_option( 'blog__archive__gridGutter' ) );
	
royal_define_style( '.content-inner[data-grid] .post, .content-inner[data-grid-normal] .post', array(
	'padding-left'  => sprintf( '%fpx', $grid_spacing/2 ),
	'padding-right' => sprintf( '%fpx', $grid_spacing/2 ),
	'margin-bottom' => sprintf( '%dpx', $grid_spacing )
) );

royal_define_style( '.content-inner[data-grid], .content-inner[data-grid-normal]', array(
	'margin-left'  => sprintf( '%dpx', -$grid_spacing/2 ),
	'margin-right' => sprintf( '%dpx', -$grid_spacing/2 )
) );
