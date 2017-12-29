<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();


// Add filter to register customize containers
add_filter( 'royal_customize_containers', 'royal_customize_elements_containers' );
add_filter( 'royal_customize_settings', 'royal_customize_elements_settings' );


// Add filter to register customize controls
add_filter( 'royal_customize_controls', 'royal_customize_elements_button_controls' );
add_filter( 'royal_customize_controls', 'royal_customize_elements_input_controls' );
// add_filter( 'royal_customize_controls', 'royal_customize_elements_layout_controls' );
// add_filter( 'royal_customize_controls', 'royal_customize_elements_styles_controls' );
// add_filter( 'royal_customize_controls', 'royal_customize_elements_connections_controls' );


function royal_customize_elements_containers( $containers ) {
	$containers['elementButton'] = array(
		'type'  => 'section',
		'panel' => 'global__styles',
		'title' => __( 'Button', 'royal' ),
		'heading'     => array(
			'title'       => __( 'Element Settings', 'royal' ),
			'description' => __( 'Controls the settings for customizing the element styles.', 'royal' )
		)
	);
	$containers['elementInput'] = array(
		'type'  => 'section',
		'panel' => 'global__styles',
		'title' => __( 'Input, Textarea & Select', 'royal' )
	);

	return $containers;
}

function royal_customize_elements_settings( $settings ) {
	// The default settings for the button
	$settings['button__height'] = array( 'default' => '50px' );
	$settings['button__border'] = array( 'default' => array(
		'all'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'top'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'right'  => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'bottom' => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'left'   => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' )
	) );
	$settings['button__borderRadius'] = array( 'default' => '0px' );
	$settings['button_colors'] = array( 'default' => array(
		'default' => '',
		'hover'   => '',
		'pressed' => ''
	) );
	$settings['button__typography'] = array( 'default' => array() );
	$settings['button__padding']    = array( 'default' => array(
		'padding-top' => '0px', 'padding-right' => '0px', 'padding-bottom' => '0px', 'padding-left' => '0px'
	) );

	// The default settings for the input
	$settings['input__height'] = array( 'default' => '50px' );
	$settings['input__border'] = array( 'default' => array(
		'all'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'top'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'right'  => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'bottom' => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'left'   => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' )
	) );
	$settings['input__borderRadius'] = array( 'default' => '0px' );
	$settings['input_colors'] = array( 'default' => array(
		'default' => '',
		'hover'   => '',
		'pressed' => ''
	) );
	$settings['input__typography'] = array( 'default' => array() );
	$settings['input__padding']    = array( 'default' => array(
		'padding-top' => '0px', 'padding-right' => '0px', 'padding-bottom' => '0px', 'padding-left' => '0px'
	) );

	return $settings;
}

function royal_customize_elements_button_controls( $controls ) {
	$controls['button__background'] = array(
		'type'        => 'color',
		'section'     => 'elementButton',
		'label'       => __( 'Button Background Color', 'royal' ),
	);

	$controls['button__height'] = array(
		'type'        => 'textfield',
		'section'     => 'elementButton',
		'label'       => __( 'Button Height (px)', 'royal' ),
	);

	$controls['button__typography'] = array(
		'type'        => 'typography',
		'section'     => 'elementButton',
		'label'       => __( 'Button Font', 'royal' ),
	);

	$controls['button__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'elementButton',
		'label'       => __( 'Button Padding', 'royal' ),
		'choices'     => array(
			'padding-top'    => __( 'Top', 'royal' ),
			'padding-right'  => __( 'Right', 'royal' ),
			'padding-bottom' => __( 'Bottom', 'royal' ),
			'padding-left'   => __( 'Left', 'royal' )
		)
	);

	$controls['button__border'] = array(
		'type'        => 'border',
		'section'     => 'elementButton',
		'label'       => __( 'Button Border', 'royal' ),
		'choices'     => array(
			'top'    => __( 'Top', 'royal' ),
			'right'  => __( 'Right', 'royal' ),
			'bottom' => __( 'Bottom', 'royal' ),
			'left'   => __( 'Left', 'royal' )
		)
	);
	$controls['button__borderRadius'] = array(
		'type'        => 'textfield',
		'section'     => 'elementButton',
		'label'       => __( 'Button Border Radius', 'royal' ),
	);

	return $controls;
}

function royal_customize_elements_input_controls( $controls ) {
	$controls['input__background'] = array(
		'type'        => 'color',
		'section'     => 'elementInput',
		'label'       => __( 'Background Color', 'royal' ),
	);

	$controls['input__height'] = array(
		'type'        => 'textfield',
		'section'     => 'elementInput',
		'label'       => __( 'Height (px)', 'royal' ),
	);

	$controls['input__typography'] = array(
		'type'        => 'typography',
		'section'     => 'elementInput',
		'label'       => __( 'Font', 'royal' ),
	);

	$controls['input__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'elementInput',
		'label'       => __( 'Padding', 'royal' ),
		'choices'     => array(
			'padding-top'    => __( 'Top', 'royal' ),
			'padding-right'  => __( 'Right', 'royal' ),
			'padding-bottom' => __( 'Bottom', 'royal' ),
			'padding-left'   => __( 'Left', 'royal' )
		)
	);

	$controls['input__border'] = array(
		'type'        => 'border',
		'section'     => 'elementInput',
		'label'       => __( 'Border', 'royal' ),
		'choices'     => array(
			'top'    => __( 'Top', 'royal' ),
			'right'  => __( 'Right', 'royal' ),
			'bottom' => __( 'Bottom', 'royal' ),
			'left'   => __( 'Left', 'royal' )
		)
	);
	$controls['input__borderRadius'] = array(
		'type'        => 'textfield',
		'section'     => 'elementInput',
		'label'       => __( 'Border Radius', 'royal' ),
	);

	return $controls;
}
