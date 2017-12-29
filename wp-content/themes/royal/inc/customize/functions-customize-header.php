<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

add_filter( 'royal_customize_containers', 'royal_customize_header_containers' );
add_filter( 'royal_customize_controls', 'royal_customize_header_controls' );
add_filter( 'royal_customize_settings', 'royal_customize_header_settings' );

function royal_customize_header_containers( $containers ) {
	$containers['headerAndFooter'] = array(
		'type'        => 'panel',
		'title'       => _x( 'Header & Footer Builder', 'customize', 'royal' ),
		'description' => _x( 'Controls the settings for customizing the header and footer styles', 'customize', 'royal' )
	);

	$containers['headerGeneral'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'General', 'customize', 'royal' ),
		'parent'      => _x( 'Header Settings', 'customize', 'royal' ),
		'description' => _x( 'Controls the general settings for the header.', 'customize', 'royal' ),
		'heading'     => array(
			'title'       => __( 'Header Settings', 'royal' ),
		)
	);
	$containers['headerTopbar'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Topbar Settings', 'customize', 'royal' ),
		'parent'      => _x( 'Header Settings', 'customize', 'royal' ),
		'description' => _x( 'Configure the settings for the header topbar area.', 'customize', 'royal' )
	);
	$containers['headerNavigator'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Navigation Bar', 'customize', 'royal' ),
		'parent'      => _x( 'Header Settings', 'customize', 'royal' ),
		'description' => _x( 'Configure the settings for the header navigation bar area.', 'customize', 'royal' )
	);

	$containers['headerTitle'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Title Bar', 'customize', 'royal' ),
		'parent'      => _x( 'Header Settings', 'customize', 'royal' )
	);

	$containers['headerSticky'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'General Settings', 'customize', 'royal' ),
		'description' => _x( 'Configure the settings for the sticky header.', 'customize', 'royal' ),
		'heading'     => array(
			'title'       => __( 'Header Sticky Setting', 'royal' ),
		)
	);
	$containers['headerStickyNav'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Navigation Bar', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);

	return $containers;
}

function royal_customize_header_controls( $controls ) {
	$controls['header__position'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Header Position', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' ),
		'choices'     => array(
			'top'   => _x( 'Top', 'customize', 'royal' ),
			'right' => _x( 'Right', 'customize', 'royal' ),
			'bottom' => _x( 'Bottom', 'customize', 'royal' ),
			'left' => _x( 'Left', 'customize', 'royal' )
		)
	);

	/**
	 * The logo profile
	 */
	$controls['header__logo'] = array(
		'type'        => 'dropdown',
		'section'     => 'headerGeneral',
		'label'       => _x( 'logo that will be shown', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' ),
		'choices'     => array(
			'logoDefault' => _x( 'Logo Default', 'customize', 'royal' ),
			'logoDark'    => _x( 'Logo Dark', 'customize', 'royal' ),
			'logoLight'   => _x( 'Logo Light', 'customize', 'royal' )
		)
	);
	$controls['header__logoAlign'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Logo Alignment', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' ),
		'choices'     => array(
			'left'   => _x( 'Left', 'customize', 'royal' ),
			'center' => _x( 'Center', 'customize', 'royal' ),
			'right'  => _x( 'Right', 'customize', 'royal' )
		)
	);
	$controls[ 'header__logoMargin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerGeneral',
		'label'       => __( 'Logo Margin (px)', 'royal' ),
		'choices'     => array(
			'margin-top'    => __( 'Top', 'royal' ),
			'margin-right'  => __( 'Right', 'royal' ),
			'margin-bottom' => __( 'Bottom', 'royal' ),
			'margin-left'   => __( 'Left', 'royal' )
		)
	);

	/**
	 * Header Settings
	 */
	$controls['header__height'] = array(
		'type'        => 'textfield',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Header Height', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['header__width'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => _x( '100% Header Full Width', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['header__shadow'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => __( 'Enable Shadow', 'royal' ),
	);
	$controls['header__transparent'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => __( 'Enable Header Transparent', 'royal' ),
	);

	$controls['header__border'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => __( 'Header Border', 'royal' ),
	);
	$controls[ 'header__border__options'] = array(
		'type'        => 'border',
		'section'     => 'headerGeneral',
		'choices'     => array(
			'top'    => __( 'Top', 'royal' ),
			'right'  => __( 'Right', 'royal' ),
			'bottom' => __( 'Bottom', 'royal' ),
			'left'   => __( 'Left', 'royal' )
		)
	);

	$controls['header__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Header Background', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['header__background'] = array(
		'type'        => 'background',
		'section'     => 'headerGeneral'
	);


	/**
	 * Topbar Settings
	 */
	$controls['header__topbar'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Enable Topbar', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['header__topbar__height'] = array(
		'type'        => 'text',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Topbar Height', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);

	// Topbar content
	$controls['header__topbar__text'] = array(
		'type'        => 'textareafield',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Topbar Content', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);

	$controls['header__topbar__typoHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTopbar',
		'label'       => __( 'Topbar Font', 'royal' ),
	);
	$controls['header__topbar__typography'] = array(
		'type'        => 'typography',
		'section'     => 'headerTopbar'
	);
	$controls['header__topbar__colors'] = array(
		'type'        => 'colors',
		'section'     => 'headerTopbar',
		'label'       => __( 'Topbar Link Colors', 'royal' ),
		'choices'     => array(
			'menu'        => __( 'Link Color', 'royal' ),
			'menu-hover'  => __( 'Hover Color', 'royal' ),
			'menu-active' => __( 'Active Color', 'royal' )
		)
	);

	$controls['header__topbar__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Topbar Background', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['header__topbar__background'] = array(
		'type'        => 'background',
		'section'     => 'headerTopbar'
	);


	/**
	 * Navigation Bar Settings
	 */
	$controls['header__nav__typography'] = array(
		'type'        => 'typography',
		'section'     => 'headerNavigator',
		'label'       => __( 'Menu Font', 'royal' ),
	);
	$controls['header__nav__colors'] = array(
		'type'        => 'colors',
		'section'     => 'headerNavigator',
		'label'       => __( 'Menu Colors', 'royal' ),
		'choices'     => array(
			'menu'        => __( 'Menu Color', 'royal' ),
			'menu-hover'  => __( 'Hover Color', 'royal' ),
			'menu-active' => __( 'Active Color', 'royal' )
		)
	);
	$controls[ 'header__nav__margin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerNavigator',
		'label'       => __( 'Menu Margin', 'royal' ),
		'choices'     => array(
			'margin-top'    => __( 'Top', 'royal' ),
			'margin-right'  => __( 'Right', 'royal' ),
			'margin-bottom' => __( 'Bottom', 'royal' ),
			'margin-left'   => __( 'Left', 'royal' )
		)
	);
	$controls['header__nav__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'headerNavigator',
		'label'       => __( 'Menu Padding', 'royal' ),
		'choices'     => array(
			'padding-top'    => __( 'Top', 'royal' ),
			'padding-right'  => __( 'Right', 'royal' ),
			'padding-bottom' => __( 'Bottom', 'royal' ),
			'padding-left'   => __( 'Left', 'royal' )
		)
	);
	$controls['header__nav__extras'] = array(
		'type'        => 'checkboxes',
		'section'     => 'headerNavigator',
		'label'       => __( 'Show Extra Items On The Header', 'royal' ),
		'choices'     => array(
			'cart'      => _x( 'Shopping Cart', 'customize', 'royal' ),
			'search'    => _x( 'Search Box', 'customize', 'royal' )
		)
	);

	$controls['header__nav__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerNavigator',
		'label'       => _x( 'Navigator Background', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['header__nav__background'] = array(
		'type'        => 'background',
		'section'     => 'headerNavigator'
	);

	/**
	 * Sticky Header Settings
	 */
	$controls['header__sticky'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => _x( 'Enable Sticky Header', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' ),
		'default'     => 'on'
	);
	$controls['header__sticky__logo'] = array(
		'type'        => 'dropdown',
		'section'     => 'headerSticky',
		'label'       => _x( 'logo that will be shown', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' ),
		'choices'     => array(
			'logoDefault' => _x( 'Logo Default', 'customize', 'royal' ),
			'logoDark'    => _x( 'Logo Dark', 'customize', 'royal' ),
			'logoLight'   => _x( 'Logo Light', 'customize', 'royal' )
		)
	);
	$controls['header__sticky__logoAlign'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerSticky',
		'label'       => _x( 'Logo Alignment', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' ),
		'choices'     => array(
			'left'   => _x( 'Left', 'customize', 'royal' ),
			'center' => _x( 'Center', 'customize', 'royal' ),
			'right'  => _x( 'Right', 'customize', 'royal' )
		)
	);
	$controls[ 'header__sticky__logoMargin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerSticky',
		'label'       => __( 'Logo Margin', 'royal' ),
		'choices'     => array(
			'margin-top'    => __( 'Top', 'royal' ),
			'margin-right'  => __( 'Right', 'royal' ),
			'margin-bottom' => __( 'Bottom', 'royal' ),
			'margin-left'   => __( 'Left', 'royal' )
		)
	);

	/**
	 * Header Settings
	 */
	$controls['header__sticky__height'] = array(
		'type'        => 'textfield',
		'section'     => 'headerSticky',
		'label'       => _x( 'Header Sticky Height', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['header__sticky__width'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => _x( '100% Full Width', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	
	$controls['header__sticky__shadow'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => __( 'Enable Shadow', 'royal' ),
	);

	$controls['header__sticky__border'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => __( 'Header Sticky Border', 'royal' ),
	);
	$controls[ 'header__sticky__border__options'] = array(
		'type'        => 'border',
		'section'     => 'headerSticky',
		'choices'     => array(
			'top'    => __( 'Top', 'royal' ),
			'right'  => __( 'Right', 'royal' ),
			'bottom' => __( 'Bottom', 'royal' ),
			'left'   => __( 'Left', 'royal' )
		)
	);

	$controls['header__sticky__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerSticky',
		'label'       => _x( 'Header Sticky Background', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['header__sticky__background'] = array(
		'type'        => 'background',
		'section'     => 'headerSticky'
	);

	$controls['header__sticky__nav__typography'] = array(
		'type'        => 'typography',
		'section'     => 'headerStickyNav',
		'label'       => __( 'Menu Sticky Font', 'royal' ),
	);
	$controls['header__sticky__nav__colors'] = array(
		'type'        => 'colors',
		'section'     => 'headerStickyNav',
		'label'       => __( 'Menu Sticky Colors', 'royal' ),
		'choices'     => array(
			'menu'        => __( 'Menu Color', 'royal' ),
			'menu-hover'  => __( 'Hover Color', 'royal' ),
			'menu-active' => __( 'Active Color', 'royal' )
		)
	);
	$controls[ 'header__sticky__nav__margin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerStickyNav',
		'label'       => __( 'Menu Sticky Margin', 'royal' ),
		'choices'     => array(
			'margin-top'    => __( 'Top', 'royal' ),
			'margin-right'  => __( 'Right', 'royal' ),
			'margin-bottom' => __( 'Bottom', 'royal' ),
			'margin-left'   => __( 'Left', 'royal' )
		)
	);
	$controls['header__sticky__nav__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'headerStickyNav',
		'label'       => __( 'Menu Sticky Padding', 'royal' ),
		'choices'     => array(
			'padding-top'    => __( 'Top', 'royal' ),
			'padding-right'  => __( 'Right', 'royal' ),
			'padding-bottom' => __( 'Bottom', 'royal' ),
			'padding-left'   => __( 'Left', 'royal' )
		)
	);


	/**
	 * Title bar
	 */
	$controls['header__titlebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Displays', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' ),
		'choices'     => array(
			'both'        => _x( 'Page Title and Breadcrumbs', 'customize', 'royal' ),
			'title'       => _x( 'Page Title Only', 'customize', 'royal' ),
			'breadcrumbs' => _x( 'Breadcrumbs Only', 'customize', 'royal' ),
			'none'        => _x( 'None', 'customize', 'royal' )
		)
	);
	$controls['header__titlebar__align'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Alignment', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' ),
		'choices'     => array(
			'left'   => _x( 'Left', 'customize', 'royal' ),
			'center' => _x( 'Center', 'customize', 'royal' ),
			'right'  => _x( 'Right', 'customize', 'royal' ),
			'inline' => _x( 'Inline', 'customize', 'royal' )
		)
	);
	$controls['header__titlebar__height'] = array(
		'type'        => 'textfield',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Height', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['header__titlebar__full'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Full Width', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['header__titlebar__home'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => _x( 'Display On The Homepage', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	
	$controls['header__titlebar__shadow'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => __( 'Enable Shadow', 'royal' ),
	);

	$controls['header__titlebar__border'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => __( 'Title Bar Border', 'royal' ),
	);
	$controls[ 'header__titlebar__border__options'] = array(
		'type'        => 'border',
		'section'     => 'headerTitle',
		'choices'     => array(
			'top'    => __( 'Top', 'royal' ),
			'right'  => __( 'Right', 'royal' ),
			'bottom' => __( 'Bottom', 'royal' ),
			'left'   => __( 'Left', 'royal' )
		)
	);
	$controls['header__titlebar__background'] = array(
		'type'        => 'background',
		'section'     => 'headerTitle',
		'label'   => _x( 'Title Bar Background', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls[ 'header__titlebar__margin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerTitle',
		'label'       => __( 'Title Bar Margin', 'royal' ),
		'choices'     => array(
			'margin-top'    => __( 'Top', 'royal' ),
			'margin-right'  => __( 'Right', 'royal' ),
			'margin-bottom' => __( 'Bottom', 'royal' ),
			'margin-left'   => __( 'Left', 'royal' )
		)
	);
	$controls['header__titlebar__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'headerTitle',
		'label'       => __( 'Title Bar Padding', 'royal' ),
		'choices'     => array(
			'padding-top'    => __( 'Top', 'royal' ),
			'padding-right'  => __( 'Right', 'royal' ),
			'padding-bottom' => __( 'Bottom', 'royal' ),
			'padding-left'   => __( 'Left', 'royal' )
		)
	);
	$controls['header__titlebar__backgroundFeatured'] = array(
		'type'        => 'checkboxes',
		'section'     => 'headerTitle',
		'label'       => _x( 'Use Featured Image As Background in', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' ),
		'choices'     => 'royal_customize_post_types_options'
	);

	$controls['header__titlebar__titleHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTitle',
		'label'       => _x( 'Page Title Font', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['header__titlebar__titleFont'] = array(
		'type'        => 'typography',
		'section'     => 'headerTitle'
	);

	$controls['header__titlebar__breadcrumbHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTitle',
		'label'       => _x( 'Breadcrumbs Font', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' )
	);
	$controls['header__titlebar__breadcrumbFont'] = array(
		'type'        => 'typography',
		'section'     => 'headerTitle'
	);
	$controls['header__titlebar__breadcrumbColors'] = array(
		'type'        => 'colors',
		'section'     => 'headerTitle',
		'label'       => _x( 'Breadcrumbs Link Color', 'customize', 'royal' ),
		'choices'     => array(
			'link' => _x( 'Link Color', 'customize', 'royal' ),
			'linkHover' => _x( 'Hover Color', 'customize', 'royal' )
		)
	);


	/**
	 * Sticky Header Settings
	 */
	$controls['header__widgets'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'header__widgets',
		'label'       => _x( 'Enable Sticky Header', 'customize', 'royal' ),
		'description' => _x( 'Turn ON to enable the header widgets area', 'customize', 'royal' ),
		'default'     => 'on'
	);

	return $controls;
}



function royal_customize_header_settings( $settings ) {
	$border_default = array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' );
	$settings = array_merge( $settings, array(
		'header__position'  => array( 'default' => 'top' ),
		'header__logo'       => array( 'default' => 'logoDefault' ),
		'header__logoAlign'  => array( 'default' => 'left' ),
		'header__logoMargin' => array( 'default' => array(
			'margin-top'    => '0px', 'margin-right'  => '0px',
			'margin-bottom' => '0px', 'margin-left'   => '0px'
		) ),

		'header__width'      => array( 'default' => 'on' ),
		'header__height'     => array( 'default' => '80px' ),
		'header__background' => array( 'default' => array() ),
		'header__shadow'     => array( 'default' => 'off' ),
		'header__border'     => array( 'default' => 'off' ),
		'header__border__options'     => array( 'default' => array(
			'all'  => $border_default, 'top'   => $border_default, 'bottom' => $border_default,
			'left' => $border_default, 'right' => $border_default
		) ),
		'header__transparent' => array( 'default' => 'off' ),

		'header__topbar'             => array( 'default' => 'on' ),
		'header__topbar__width'      => array( 'default' => 'on' ),
		'header__topbar__height'     => array( 'default' => '40px' ),
		'header__topbar__text'       => array( 'default' => '' ),
		'header__topbar__icons'      => array( 'default' => '' ),
		'header__topbar__background' => array( 'default' => array() ),
		'header__topbar__typography' => array( 'default' => array() ),
		'header__topbar__colors'     => array( 'default' => array() ),

		'header__nav__typography' => array( 'default' => array() ),
		'header__nav__colors'     => array( 'default' => array() ),
		'header__nav__margin'     => array( 'default' => array(
			'margin-top'    => '0px', 'margin-right' => '0px',
			'margin-bottom' => '0px', 'margin-left'  => '0px'
		) ),
		'header__nav__padding' => array( 'default' => array(
			'padding-top'    => '0px', 'padding-right' => '0px',
			'padding-bottom' => '0px', 'padding-left'  => '0px'
		) ),
		'header__nav__background' => array( 'default' => array() ),
		'header__nav__extras'     => array( 'default' => array() ),


		'header__sticky__logo'       => array( 'default' => 'logoDefault' ),
		'header__sticky__logoAlign'  => array( 'default' => 'left' ),
		'header__sticky__logoMargin' => array( 'default' => array(
			'margin-top'    => '0px', 'margin-right'  => '0px',
			'margin-bottom' => '0px', 'margin-left'   => '0px'
		) ),

		'header__sticky__width'      => array( 'default' => 'on' ),
		'header__sticky__height'     => array( 'default' => '80px' ),
		'header__sticky__background' => array( 'default' => array() ),
		'header__sticky__shadow'     => array( 'default' => 'off' ),
		'header__sticky__border'     => array( 'default' => 'off' ),
		'header__sticky__border__options'     => array( 'default' => array(
			'all'  => $border_default, 'top'   => $border_default, 'bottom' => $border_default,
			'left' => $border_default, 'right' => $border_default
		) ),
		'header__sticky__transparent' => array( 'default' => 'off' ),
		'header__sticky__nav__typography' => array( 'default' => array() ),
		'header__sticky__nav__colors'     => array( 'default' => array() ),
		'header__sticky__nav__margin'     => array( 'default' => array(
			'margin-top'    => '0px', 'margin-right' => '0px',
			'margin-bottom' => '0px', 'margin-left'  => '0px'
		) ),
		'header__sticky__nav__padding'    => array( 'default' => array(
			'padding-top'    => '0px', 'padding-right' => '0px',
			'padding-bottom' => '0px', 'padding-left'  => '0px'
		) ),

		'header__titlebar'         => array( 'default' => 'both' ),
		'header__titlebar__home'   => array( 'default' => 'on' ),
		'header__titlebar__align'  => array( 'default' => 'left' ),
		'header__titlebar__full'   => array( 'default' => 'off' ),
		'header__titlebar__height' => array( 'default' => '80px' ),
		'header__titlebar__margin' => array( 'default' => array(
			'margin-top'    => '0px', 'margin-right' => '0px',
			'margin-bottom' => '0px', 'margin-left'  => '0px'
		) ),
		'header__titlebar__padding' => array( 'default' => array(
			'padding-top'    => '0px', 'padding-right' => '0px',
			'padding-bottom' => '0px', 'padding-left'  => '0px'
		) ),
		'header__titlebar__shadow' => array( 'default' => 'off' ),
		'header__titlebar__border' => array( 'default' => 'off' ),
		'header__titlebar__border__options' => array( 'default' => array(
			'all'  => $border_default, 'top'   => $border_default, 'bottom' => $border_default,
			'left' => $border_default, 'right' => $border_default
		) ),
		'header__titlebar__background'         => array( 'default' => array() ),
		'header__titlebar__backgroundFeatured' => array( 'default' => array() ),
		'header__titlebar__titleFont'          => array( 'default' => array() ),
		'header__titlebar__breadcrumbFont'     => array( 'default' => array() ),
		'header__titlebar__breadcrumbColors'   => array( 'default' => array() ),
	) );

	return $settings;
}
