<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

// Add filter to register customize containers
add_filter( 'royal_customize_containers', 'royal_customize_global_containers' );
add_filter( 'royal_customize_settings', 'royal_customize_global_settings' );


// Add filter to register customize controls
add_filter( 'royal_customize_controls', 'royal_customize_global_logo_controls' );
add_filter( 'royal_customize_controls', 'royal_customize_global_layout_controls' );
add_filter( 'royal_customize_controls', 'royal_customize_global_styles_controls' );
add_filter( 'royal_customize_controls', 'royal_customize_global_connections_controls' );
add_filter( 'royal_customize_controls', 'royal_customize_global_sliding_controls' );
add_filter( 'royal_customize_controls', 'royal_customize_global_misc_controls' );
add_filter( 'royal_customize_controls', 'royal_customize_global_content_bottom_controls' );



/**
 * Return an array of the containers that will be registered
 * into the theme customizer
 * 
 * @return  array
 * @since   1.0.0
 */
function royal_customize_global_containers( $containers ) {
	$containers['global__logo'] = array(
		'type'    => 'panel',
		'title'   => __( 'Logos', 'royal' ),
		'heading' => array(
			'title'       => __( 'Global Settings', 'royal' ),
			'description' => __( 'Controls the settings that will throughout the theme. These settings can be overridden by the specific sections.', 'royal' )
		)
	);
	$containers['global__logoDefault'] = array(
		'type'        => 'section',
		'panel'       => 'global__logo',
		'title'       => __( 'Logo Default', 'royal' ),
		'description' => __( 'Configure the logo image that will be used in overall pages', 'royal' )
	);
	$containers['global__logoDark'] = array(
		'type'        => 'section',
		'panel'       => 'global__logo',
		'title'       => __( 'Logo Dark', 'royal' ),
		'description' => __( 'Configure the logo image in the dark style that will be used in overall pages', 'royal' )
	);
	$containers['global__logoLight'] = array(
		'type'        => 'section',
		'panel'       => 'global__logo',
		'title'       => __( 'Logo Light', 'royal' ),
		'description' => __( 'Configure the logo image in the light style that will be used in overall pages', 'royal' )
	);


	$containers['global__styles'] = array(
		'type'  => 'panel',
		'title' => __( 'Layout & Styles', 'royal' )
	);
	$containers['global__layout'] = array(
		'type'        => 'section',
		'panel'       => 'global__styles',
		'title'       => __( 'Layout Settings', 'royal' ),
		'description' => __( 'Controls the settings for the overall site layout.', 'royal' )
	);
	$containers['global__sidebar'] = array(
		'type'  => 'section',
		'panel' => 'global__styles',
		'title' => __( 'Sidebar Settings', 'royal' )
	);
	$containers['global__typography'] = array(
		'type'  => 'section',
		'panel' => 'global__styles',
		'title' => __( 'Color & Typography', 'royal' )
	);
	$containers['global__connections'] = array(
		'type'     => 'section',
		'title'    => __( 'Social Networks', 'royal' )
	);
	$containers['global__slidingSidebar'] = array(
		'type'        => 'section',
		'panel'       => 'global__styles',
		'title'       => _x( 'Sliding Sidebar', 'customize', 'royal' ),
		'description' => _x( 'Configure the styles for the left content area.', 'customize', 'royal' ),
		'heading'     => array(
			'title'       => __( 'Sliding Areas', 'royal' ),
			'description' => __( 'Controls the settings for the sliding content areas.', 'royal' )
		)
	);
	$containers['global__slidingMenu'] = array(
		'type'        => 'section',
		'panel'       => 'global__styles',
		'title'       => _x( 'Sliding Menu', 'customize', 'royal' ),
		'description' => _x( 'Configure the styles for the left content area.', 'customize', 'royal' )
	);
	$containers['global__contentBottom'] = array(
		'type'  => 'section',
		'panel' => 'global__styles',
		'title' => _x( 'Content Bottom Widgets', 'customize', 'royal' )
	);

	return $containers;
}


/**
 * Return an array of the settings that will be registered
 * into the theme customizer
 * 
 * @return  array
 * @since   1.0.0
 */
function royal_customize_global_settings( $settings ) {
	$layout_width = array(
		'width'     => '1100px',
		'max-width' => '90%'
	);
	$layout_padding = array(
		'padding-top'    => '0px',
		'padding-right'  => '0px',
		'padding-bottom' => '0px',
		'padding-left'   => '0px'
	);

	$text_link_colors = array(
		'a'                 => '',
		'a:hover'           => '',
		'a:visited'         => '',
		'a:active, a:focus' => ''
	);

	$settings = array_merge( $settings, array(
		'logoDefault__logo'       => array( 'default' => array( 'id' => -1, 'url' => false ) ),
		'logoDefault__logoRetina' => array( 'default' => array( 'id' => -1, 'url' => false ) ),
		'logoDefault__logoSize'   => array( 'default' => array( 'width' => 'auto', 'height' => 'auto' ) ),
		
		'logoDark__logo'       => array( 'default' => array( 'id' => -1, 'url' => false ) ),
		'logoDark__logoRetina' => array( 'default' => array( 'id' => -1, 'url' => false ) ),
		'logoDark__logoSize'   => array( 'default' => array( 'width' => 'auto', 'height' => 'auto' ) ),
		
		'logoLight__logo'       => array( 'default' => array( 'id' => -1, 'url' => false ) ),
		'logoLight__logoRetina' => array( 'default' => array( 'id' => -1, 'url' => false ) ),
		'logoLight__logoSize'   => array( 'default' => array( 'width' => 'auto', 'height' => 'auto' ) ),

		'global__layout__mode'       => array( 'default' => 'wide' ),
		'global__layout__width'      => array( 'default' => $layout_width ),
		'global__layout__padding'    => array( 'default' => $layout_padding ),
		'global__layout__background' => array( 'default' => array() ),
		'global__layout__frame'      => array( 'default' => '#000' ),
		
		'global__sidebar__position'         => array( 'default' => 'right' ),
		'global__sidebar__dimension'        => array( 'default' => array( 'width' => '200px', 'margin' => '50px' ) ),
		'global__sidebar__background'       => array( 'default' => array() ),
		'global__widget__title'             => array( 'default' => array() ),
		'global__widget__titlePadding'      => array( 'default' => array(
			'padding-top'    => '0px',
			'padding-right'  => '0px',
			'padding-bottom' => '0px',
			'padding-left'   => '0px'
		) ),
		'global__widget__titleMargin'      => array( 'default' => array(
			'margin-top'    => '0px',
			'margin-right'  => '0px',
			'margin-bottom' => '0px',
			'margin-left'   => '0px'
		) ),
		'global__widget__content'           => array( 'default' => array() ),
		'global__widget__linkColors'     => array( 'default' => array() ),
		'global__widget__titleBackground'   => array( 'default' => array() ),
		'global__widget__contentBackground' => array( 'default' => array() ),
		'global__widget__contentPadding'      => array( 'default' => array(
			'padding-top'    => '0px',
			'padding-right'  => '0px',
			'padding-bottom' => '0px',
			'padding-left'   => '0px'
		) ),
		'global__widget__contentMargin'      => array( 'default' => array(
			'margin-top'    => '0px',
			'margin-right'  => '0px',
			'margin-bottom' => '0px',
			'margin-left'   => '0px'
		) ),
		'global__widget__heading'      => array( 'default' => array() ),
		'global__widget__titleHeading' => array( 'default' => array() ),
		'global__typography__scheme'       => array( 'default' => array() ),
		'global__typography__body'         => array( 'default' => array() ),
		'global__typography__colors'       => array( 'default' => $text_link_colors ),
		'global__typography__h1'           => array( 'default' => array() ),
		'global__typography__h2'           => array( 'default' => array() ),
		'global__typography__h3'           => array( 'default' => array() ),
		'global__typography__h4'           => array( 'default' => array() ),
		'global__typography__h5'           => array( 'default' => array() ),
		'global__typography__h6'           => array( 'default' => array() ),
		'global__typography__blockquote'   => array( 'default' => array() ),

		'global__social__positions' => array( 'default' => array() ),
		'global__social__icons'     => array( 'default' => array() ),

		'sliding__sidebarTypography' => array( 'default' => array() ),
		'sliding__sidebarColors'     => array( 'default' => array() ),
		'sliding__sidebarBackground' => array( 'default' => array() ),
		'sliding__sidebarPadding'    => array( 'default' => array(
			'padding-top'    => '0px', 'padding-right' => '0px',
			'padding-bottom' => '0px', 'padding-left'  => '0px'
		) ),

		
		'sliding__menuStyle'      => array( 'default' => 'overlay' ),
		'sliding__menuDesktop'    => array( 'default' => 'off' ),
		'sliding__menuTypography' => array( 'default' => array() ),
		'sliding__menuColors'     => array( 'default' => array() ),
		'sliding__menuBackground' => array( 'default' => array() ),
		'sliding__menuPadding'    => array( 'default' => array(
			'padding-top'    => '0px', 'padding-right' => '0px',
			'padding-bottom' => '0px', 'padding-left'  => '0px'
		) ),

		'global__misc__gotop'                 => array( 'default' => 'on' ),
		'sliding__menuTypographyHeading'      => array( 'default' => array() ),
		'header__backgroundHeading'           => array( 'default' => array() ),
		'header__topbar__typoHeading'         => array( 'default' => array() ),
		'header__topbar__backgroundHeading'   => array( 'default' => array() ),
		'header__nav__backgroundHeading'      => array( 'default' => array() ),
		'header__sticky'                      => array( 'default' => array() ),
		'header__sticky__backgroundHeading'   => array( 'default' => array() ),
		'header__titlebar__titleHeading'      => array( 'default' => array() ),
		'header__titlebar__breadcrumbHeading' => array( 'default' => array() ),
		'header__widgets'                     => array( 'default' => array() ),
		'footer__widgets__titleHeading'       => array( 'default' => array() ),
		'blog__author__backgroundHeading'     => array( 'default' => array() ),
		'projects__sidebarHeading'            => array( 'default' => array() ),
		'project__sidebarHeading'             => array( 'default' => array() ),
		'button__background'                  => array( 'default' => array() ),
		'input__background'                   => array( 'default' => array() )
	) );

	$settings['contentBottom__widgets']         = array( 'default' => 'off' );
	$settings['contentBottom__widgets__layout'] = array( 'default' => array(
		'columns' => 4,
		'layout'  => array(
			1 => array( 12 ),
			2 => array( 6, 6 ),
			3 => array( 4, 4, 4 ),
			4 => array( 3, 3, 3, 3 ),
		)
	) );
	$settings['contentBottom__widgets__full']    = array( 'default' => 'off' );
	$settings['contentBottom__widgets__padding'] = array( 'default' => array(
		'padding-top'    => '0px',
		'padding-right'  => '0px',
		'padding-bottom' => '0px',
		'padding-left'   => '0px'
	) );
	$settings['contentBottom__widgets__background'] = array( 'default' => array() );
	$settings['contentBottom__widgets__typography'] = array( 'default' => array() );
	$settings['contentBottom__widgets__colors']     = array( 'default' => array() );
	$settings['contentBottom__widgets__title']      = array( 'default' => array() );
	$settings['contentBottom__widgets__margin']     = array( 'default' => array(
		'margin-top'    => '0px',
		'margin-right'  => '0px',
		'margin-bottom' => '0px',
		'margin-left'   => '0px'
	) );

	return $settings;
}


/**
 * Return an array of the controls which will be used
 * for customize the logo
 * 
 * @param   array  $controls  The given controls list
 * @return  array
 */
function royal_customize_global_logo_controls( $controls ) {
	royal_customize_generate_branding_controls( $controls, array(
		'prefix'  => 'logoDefault__',
		'section' => 'global__logoDefault'
	) );

	royal_customize_generate_branding_controls( $controls, array(
		'prefix'  => 'logoDark__',
		'section' => 'global__logoDark'
	) );
	
	royal_customize_generate_branding_controls( $controls, array(
		'prefix'  => 'logoLight__',
		'section' => 'global__logoLight'
	) );
	
	return $controls;
}


/**
 * Return an array of the controls which will be used
 * for customize the layout
 * 
 * @param   array  $controls  The given controls list
 * @return  array
 */
function royal_customize_global_layout_controls( $controls ) {
	$controls['global__layout__mode'] = array(
		'type'        => 'radio-buttons',
		'label'       => __( 'Site Layout', 'royal' ),
		'section'     => 'global__layout',
		'choices'     => array(
			'wide'  => __( 'Wide', 'royal' ),
			'boxed' => __( 'Boxed', 'royal' ),
			'frame' => __( 'Frame', 'royal' )
		)
	);

	$controls['global__layout__frame'] = array(
		'type'        => 'color',
		'section'     => 'global__layout',
		'label'       => __( 'Frame Color', 'royal' ),
	);

	$controls['global__layout__width'] = array(
		'type'        => 'dimension',
		'section'     => 'global__layout',
		'label'       => __( 'Layout Width', 'royal' ),
		'choices'      => array(
			'width'    => __( 'Width', 'royal' ),
			'max-width' => __( 'Max Width', 'royal' )
		)
	);

	$controls['global__layout__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'global__layout',
		'label'       => __( 'Content Padding', 'royal' ),
		'choices'      => array(
			'padding-top'    => __( 'Top', 'royal' ),
			'padding-right'  => __( 'Right', 'royal' ),
			'padding-bottom' => __( 'Bottom', 'royal' ),
			'padding-left'   => __( 'Left', 'royal' )
		)
	);
	$controls['global__layout__background'] = array(
		'type'        => 'background',
		'section'     => 'global__layout',
		'label'       => __( 'Background Settings', 'royal' )
	);

	/**
	 * Sidebar options
	 */
	$controls['global__sidebar__position'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'global__sidebar',
		'label'       => __( 'Sidebar Position', 'royal' ),
		'choices'     => array(
			'none'  => __( 'No Sidebar', 'royal' ),
			'left'  => __( 'Left', 'royal' ),
			'right' => __( 'Right', 'royal' )
		)
	);
	$controls['global__sidebar__dimension'] = array(
		'type'        => 'dimension',
		'section'     => 'global__sidebar',
		'label'       => __( 'Sidebar Layout', 'royal' ),
		'choices'     => array(
			'width'  => __( 'Width', 'royal' ),
			'margin' => __( 'Margin', 'royal' )
		)
	);
	$controls['global__sidebar__background'] = array(
		'type'        => 'background',
		'section'     => 'global__sidebar',
		'label'       => __( 'Sidebar Background', 'royal' ),
	);

	$controls['global__widget__heading'] = array(
		'type'        => 'heading',
		'section'     => 'global__sidebar',
		'label'       => __( 'Widget Font', 'royal' ),
	);
	$controls['global__widget__content'] = array(
		'type'        => 'typography',
		'section'     => 'global__sidebar'
	);
	$controls['global__widget__linkColors'] = array(
		'type'        => 'colors',
		'section'     => 'global__sidebar',
		'label'       => __( 'Widget Link Colors', 'royal' ),
		'choices'     => array(
			'link' => __( 'Link Color', 'royal' ),
			'linkHover'   => __( 'Hover Link Color', 'royal' )
		)
	);
	$controls['global__widget__contentPadding'] = array(
		'type'    => 'dimension',
		'section' => 'global__sidebar',
		'label'   => __( 'Widget Padding', 'royal' ),
		'choices' => array(
			'padding-top'    => __( 'Top', 'royal' ),
			'padding-right'  => __( 'Right', 'royal' ),
			'padding-bottom' => __( 'Bottom', 'royal' ),
			'padding-left'   => __( 'Left', 'royal' )
		)
	);
	$controls['global__widget__contentMargin'] = array(
		'type'    => 'dimension',
		'section' => 'global__sidebar',
		'label'   => __( 'Widget Margin', 'royal' ),
		'choices' => array(
			'margin-top'    => __( 'Top', 'royal' ),
			'margin-right'  => __( 'Right', 'royal' ),
			'margin-bottom' => __( 'Bottom', 'royal' ),
			'margin-left'   => __( 'Left', 'royal' )
		)
	);
	$controls['global__widget__contentBackground'] = array(
		'type'        => 'background',
		'section'     => 'global__sidebar',
		'label'   => __( 'Widget Background', 'royal' ),
	);

	$controls['global__widget__titleHeading'] = array(
		'type'        => 'heading',
		'section'     => 'global__sidebar',
		'label'       => __( 'Widget Title Font', 'royal' ),
	);
	$controls['global__widget__title'] = array(
		'type'        => 'typography',
		'section'     => 'global__sidebar'
	);
	$controls['global__widget__titlePadding'] = array(
		'type'    => 'dimension',
		'section' => 'global__sidebar',
		'label'   => __( 'Widget Title Padding', 'royal' ),
		'choices' => array(
			'padding-top'    => __( 'Top', 'royal' ),
			'padding-right'  => __( 'Right', 'royal' ),
			'padding-bottom' => __( 'Bottom', 'royal' ),
			'padding-left'   => __( 'Left', 'royal' )
		)
	);
	$controls['global__widget__titleMargin'] = array(
		'type'    => 'dimension',
		'section' => 'global__sidebar',
		'label'   => __( 'Widget Title Margin', 'royal' ),
		'choices' => array(
			'margin-top'    => __( 'Top', 'royal' ),
			'margin-right'  => __( 'Right', 'royal' ),
			'margin-bottom' => __( 'Bottom', 'royal' ),
			'margin-left'   => __( 'Left', 'royal' )
		)
	);
	$controls['global__widget__titleBackground'] = array(
		'type'        => 'background',
		'section'     => 'global__sidebar',
		'label'       => __( 'Widget Title Background', 'royal' ),
	);

	return $controls;
}


/**
 * Return an array of the controls which will be used
 * for customize the styles
 * 
 * @param   array  $controls  The given controls list
 * @return  array
 */
function royal_customize_global_styles_controls( $controls ) {
	$controls['global__typography__scheme'] = array(
		'type'        => 'colors',
		'section'     => 'global__typography',
		'label'       => __( 'Scheme Color', 'royal' ),
		'choices'     => array(
			'primary' => __( 'Primary Color', 'royal' ),
			'accent'  => __( 'Accent Color', 'royal' )
		)
	);

	$controls['global__typography__body'] = array(
		'type'        => 'typography',
		'section'     => 'global__typography',
		'label'       => __( 'Body Font', 'royal' ),
	);
	$controls['global__typography__colors'] = array(
		'type'        => 'colors',
		'section'     => 'global__typography',
		'label'       => __( 'Link Colors', 'royal' ),
		'choices'     => array(
			'a'         => __( 'Link Color', 'royal' ),
			'a:hover'   => __( 'Hover Color', 'royal' ),
			'a:visited' => __( 'Visited Color', 'royal' )
		)
	);

	foreach ( range( 1, 6 ) as $index ) {
		$controls["global__typography__h{$index}"] = array(
			'type'        => 'typography',
			'section'     => 'global__typography',
			'label'       => sprintf( __( 'Heading %d', 'royal' ), $index )
		);
	}

	$controls['global__typography__blockquote'] = array(
		'type'        => 'typography',
		'section'     => 'global__typography',
		'label'       => __( 'Blockquote Font', 'royal' ),
	);
	

	return $controls;
}


/**
 * Return an array of the controls which will be used
 * for customize the social network icons
 * 
 * @param   array  $controls  The given controls list
 * @return  array
 */
function royal_customize_global_connections_controls( $controls ) {
	$controls['global__social__icons'] = array(
		'type'        => 'icons',
		'section'     => 'global__connections'
	);

	$controls['global__social__positions'] = array(
		'type'        => 'checkboxes',
		'section'     => 'global__connections',
		'label'       => __( 'Position', 'royal' ),
		'choices'     => array(
			'top'    => __( 'Topbar', 'royal' ),
			'nav'    => __( 'Navigation', 'royal' ),
			'sticky' => __( 'Sticky Header', 'royal' ),
			'footer' => __( 'Footer', 'royal' )
		)
	);


	return $controls;
}



function royal_customize_global_sliding_controls( $controls ) {
	/**
	 * The content sliding from the left
	 */
	$controls['sliding__sidebarTypography'] = array(
		'type'        => 'typography',
		'section'     => 'global__slidingSidebar',
		'label'       => __( 'Sliding Area Font', 'royal' ),
	);
	$controls['sliding__sidebarColors'] = array(
		'type'        => 'colors',
		'section'     => 'global__slidingSidebar',
		'label'       => __( 'Sliding Area Link Colors', 'royal' ),
		'choices'     => array(
			'link' => __( 'Link Color', 'royal' ),
			'linkHover'   => __( 'Hover Link Color', 'royal' )
		)
	);
	$controls['sliding__sidebarBackground'] = array(
		'type'        => 'background',
		'section'     => 'global__slidingSidebar',
		'label'       => __( 'Sliding Area Background', 'royal' ),
	);
	$controls['sliding__sidebarPadding'] = array(
		'type'        => 'dimension',
		'section'     => 'global__slidingSidebar',
		'label'       => __( 'Sliding Area Padding', 'royal' ),
		'choices'     => array(
			'padding-top'    => __( 'Top', 'royal' ),
			'padding-right'  => __( 'Right', 'royal' ),
			'padding-bottom' => __( 'Bottom', 'royal' ),
			'padding-left'   => __( 'Left', 'royal' )
		)
	);


	/**
	 * The content sliding from the right
	 */
	$controls['sliding__menuStyle'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'global__slidingMenu',
		'label'       => __( 'Select Styles', 'royal' ),
		'choices'     => array(
			'overlay' => _x( 'Overlay', 'customize', 'royal' ),
			'slide'   => _x( 'Slide', 'customize', 'royal' )
		)
	);
	$controls['sliding__menuDesktop'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'global__slidingMenu',
		'label'       => __( 'Show On Desktop', 'royal' ),
	);


	// Typography
	$controls['sliding__menuTypographyHeading'] = array(
		'type'        => 'heading',
		'section'     => 'global__slidingMenu',
		'label'       => __( 'Sliding Menu Font', 'royal' ),
	);
	$controls['sliding__menuTypography'] = array(
		'type'        => 'typography',
		'section'     => 'global__slidingMenu'
	);
	$controls['sliding__menuColors'] = array(
		'type'        => 'colors',
		'section'     => 'global__slidingMenu',
		'label'       => __( 'Sliding Menu Color', 'royal' ),
		'choices'     => array(
			'link' => __( 'Link Color', 'royal' ),
			'linkHover'   => __( 'Hover Link Color', 'royal' )
		)
	);
	$controls['sliding__menuBackground'] = array(
		'type'        => 'background',
		'section'     => 'global__slidingMenu',
		'label'       => __( 'Sliding Menu Background', 'royal' ),
	);
	$controls['sliding__menuPadding'] = array(
		'type'        => 'dimension',
		'section'     => 'global__slidingMenu',
		'label'       => __( 'Sliding Menu Padding', 'royal' ),
		'choices'     => array(
			'padding-top'    => __( 'Top', 'royal' ),
			'padding-right'  => __( 'Right', 'royal' ),
			'padding-bottom' => __( 'Bottom', 'royal' ),
			'padding-left'   => __( 'Left', 'royal' )
		)
	);

	return $controls;
}


function royal_customize_global_misc_controls( $controls ) {
	$controls['global__misc__gotop'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'global__layout',
		'label'       => __( 'Enable Go Top Button', 'royal' ),
	);

	return $controls;
}


function royal_customize_global_content_bottom_controls( $controls ) {
	$controls['contentBottom__widgets'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'global__contentBottom',
		'label'       => _x( 'Enable Content Bottom Areas', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['contentBottom__widgets__full'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'global__contentBottom',
		'label'       => _x( '100% Full Width', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['contentBottom__widgets__layout'] = array(
		'type'        => 'column-layout',
		'section'     => 'global__contentBottom',
		'label'       => _x( 'Widgetized Layout Builder', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['contentBottom__widgets__background'] = array(
		'type'        => 'background',
		'section'     => 'global__contentBottom',
		'label'       => _x( 'Footer Widget Areas Background', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['contentBottom__widgets__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'global__contentBottom',
		'label'       => _x( 'Footer Widget Areas Padding', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' ),
		'choices'     => array(
			'padding-top'    => _x( 'Top', 'customize', 'royal' ),
			'padding-right'  => _x( 'Right', 'customize', 'royal' ),
			'padding-bottom' => _x( 'Bottom', 'customize', 'royal' ),
			'padding-left'   => _x( 'Left', 'customize', 'royal' )
		)
	);
	$controls['contentBottom__widgets__typography'] = array(
		'type'        => 'typography',
		'section'     => 'global__contentBottom',
		'label'       => _x( 'Footer Widget Areas Font', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['contentBottom__widgets__colors'] = array(
		'type'        => 'colors',
		'section'     => 'global__contentBottom',
		'label'       => _x( 'Footer Widget Areas Link Colors', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' ),
		'choices'     => array(
			'link'      => _x( 'Link', 'customize', 'royal' ),
			'linkHover' => _x( 'Link Hover', 'customize', 'royal' )
		)
	);
	$controls['contentBottom__widgets__titleHeading'] = array(
		'type'        => 'heading',
		'section'     => 'global__contentBottom',
		'label'       => __( 'Footer Widget Title Font', 'royal' ),
	);
	$controls['contentBottom__widgets__title'] = array(
		'type'        => 'typography',
		'section'     => 'global__contentBottom'
	);
	$controls['contentBottom__widgets__margin'] = array(
		'type'    => 'dimension',
		'section' => 'global__contentBottom',
		'label'   => __( 'Footer Widget Margin', 'royal' ),
		'choices' => array(
			'margin-top'    => __( 'Top', 'royal' ),
			'margin-right'  => __( 'Right', 'royal' ),
			'margin-bottom' => __( 'Bottom', 'royal' ),
			'margin-left'   => __( 'Left', 'royal' )
		)
	);

	return $controls;
}


