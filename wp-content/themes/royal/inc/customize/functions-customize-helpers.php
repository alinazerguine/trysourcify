<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();


/**
 * The helper function to generate controls definition
 * for the branding section
 * 
 * @param   array  $controls   The controls list
 * @param   array  $args       The arguments to generate the controls
 * 
 * @return  array
 * @since   1.0.0
 */
function royal_customize_generate_branding_controls( array &$controls, array $args ) {
	$args = array_replace_recursive( array(
			'prefix'  => '',
			'section' => false,
			'heading' => false
		), $args );

	if ( is_array( $args['heading'] ) ) {
		$controls[ $args['prefix'] . 'logoHeading' ] = array(
			'type'        => 'heading',
			'section'     => $args['section'],
			'label'       => $args['heading']['label'],
			'description' => $args['heading']['description']
		);
	}

	$controls[ $args['prefix'] . 'logo'] = array(
		'type'        => 'media-picker',
		'section'     => $args['section'],
		'label'       => __( 'Logo', 'royal' ),
	);
	$controls[ $args['prefix'] . 'logoRetina'] = array(
		'type'        => 'media-picker',
		'section'     => $args['section'],
		'label'       => __( 'Logo Retina', 'royal' ),
	);
	$controls[ $args['prefix'] . 'logoSize'] = array(
		'type'        => 'dimension',
		'section'     => $args['section'],
		'label'       => __( 'Logo Size', 'royal' ),
		'choices'     => array(
			'width'   => __( 'Width', 'royal' ),
			'height'  => __( 'Height', 'royal' )
		)
	);
	
	return $controls;
}


/**
 * The helper function to generate controls definition
 * for the background section
 * 
 * @param   array  $controls   The controls list
 * @param   array  $args       The arguments to generate the controls
 * 
 * @since   1.0.0
 */
function royal_customize_generate_background_controls( array &$controls, array $args ) {
	$args = array_replace_recursive( array(
			'prefix'  => '',
			'section' => false,
			'heading' => false
		), $args );

	if ( is_array( $args['heading'] ) ) {
		$controls[ $args['prefix'] . 'backgroundHeading' ] = array(
			'type'        => 'heading',
			'section'     => $args['section'],
			'label'       => $args['heading']['label'],
			'description' => $args['heading']['description']
		);
	}

	// Adding the controls
	$controls[ $args['prefix'] . 'backgroundImage'] = array(
		'type'        => 'media-picker',
		'section'     => $args['section'],
		'label'       => __( 'Image', 'royal' ),
		'description' => __( 'Select an image for the background. If left empty, the background color will be used.', 'royal' )
	);
	$controls[ $args['prefix'] . 'backgroundColor'] = array(
		'type'        => 'color-picker',
		'section'     => $args['section'],
		'label'       => __( 'Color', 'royal' ),
		'description' => __( 'Select the color you want to use for the background.', 'royal' )
	);
	$controls[ $args['prefix'] . 'backgroundRepeat'] = array(
		'type'    => 'dropdown',
		'section' => $args['section'],
		'label'   => __( 'Repeat', 'royal' ),
		'choices' => array(
			'no-repeat' => __( 'No Repeat', 'royal' ),
			'repeat-x'  => __( 'Repeat X', 'royal' ),
			'repeat-y'  => __( 'Repeat Y', 'royal' ),
			'repeat'    => __( 'Repeat Both', 'royal' )
		)
	);
	$controls[ $args['prefix'] . 'backgroundPosition'] = array(
		'type'    => 'dropdown',
		'section' => $args['section'],
		'label'   => __( 'Position', 'royal' ),
		'choices' => array(
			'top left'      => __( 'Top Left', 'royal' ),
			'top center'    => __( 'Top Center', 'royal' ),
			'top right'     => __( 'Top Right', 'royal' ),
			'center left'   => __( 'Center Left', 'royal' ),
			'center center' => __( 'Center Center', 'royal' ),
			'center right'  => __( 'Center Right', 'royal' ),
			'bottom left'   => __( 'Bottom Left', 'royal' ),
			'bottom center' => __( 'Bottom Center', 'royal' ),
			'bottom right'  => __( 'Bottom Right', 'royal' ),
			'custom'        => __( 'Custom Position', 'royal' )
		)
	);
	$controls[ $args['prefix'] . 'backgroundOffset'] = array(
		'type'    => 'dimension',
		'section' => $args['section'],
		'label'   => __( 'Custom Position', 'royal' ),
		'depends' => array(
			$args['prefix'] . 'backgroundPosition' => array( 'equals', 'custom' )
		),
		'fields'  => array(
			'x' => __( 'Position X', 'royal' ),
			'y' => __( 'Position Y', 'royal' )
		)
	);
	$controls[ $args['prefix'] . 'backgroundAttachment'] = array(
		'type'    => 'dropdown',
		'section' => $args['section'],
		'label'   => __( 'Attachment', 'royal' ),
		'choices' => array(
			'fixed'      => __( 'Fixed', 'royal' ),
			'scroll'     => __( 'Scroll', 'royal' )
		)
	);
	$controls[ $args['prefix'] . 'backgroundSize'] = array(
		'type'    => 'dropdown',
		'section' => $args['section'],
		'label'   => __( 'Size', 'royal' ),
		'choices' => array(
			'auto'       => __( 'Auto', 'royal' ),
			'cover'      => __( 'Cover', 'royal' ),
			'contain'    => __( 'Contain', 'royal' ),
			'fit-width'  => __( '100% Width', 'royal' ),
			'fit-height' => __( '100% Height', 'royal' ),
			'stretch'    => __( 'Stretch', 'royal' ),
			'custom'    => __( 'Custom', 'royal' )
		)
	);

	$controls[ $args['prefix'] . 'backgroundCustomSize'] = array(
		'type'    => 'dimension',
		'section' => $args['section'],
		'label'   => __( 'Size', 'royal' ),
		'depends' => array( $args['prefix'] . 'backgroundSize' => array( 'equals', 'custom' ) ),
		'fields'  => array(
			'width'  => __( 'Width', 'royal' ),
			'height' => __( 'Height', 'royal' )
		)
	);
}


/**
 * The helper function to generate controls definition
 * for the typography section
 * 
 * @param   array  $controls   The controls list
 * @param   array  $args       The arguments to generate the controls
 * 
 * @return  array
 * @since   1.0.0
 */
function royal_customize_generate_typography_controls( &$controls, $args ) {

}


/**
 * Retrieve the menu list for using as the menu dropdown
 * 
 * @return  array
 * @since   1.0.0
 */
function royal_customize_dropdown_menus() {
	$menus   = wp_get_nav_menus();
	$choices = array( 0 => esc_html__( '-- Select Menu --', 'royal' ) );
	$choices = array_merge( $choices, wp_list_pluck( $menus, 'name', 'term_id' ) );

	return $choices;
}


/**
 * Return an array of sidebars that will be use for
 * the dropdown in the theme options
 * 
 * @return  array
 */
function royal_customize_dropdown_sidebars() {
	global $wp_registered_sidebars;
	static $sidebars;

	if ( empty( $sidebars ) ) {
		$sidebars = array();

		foreach ( $wp_registered_sidebars as $sidebar ) {
			if ( $sidebar['id'] == 'wp_inactive_widgets' || strpos( $sidebar['id'], 'orphaned_widgets' ) !== false )
				continue;
			
			$sidebars[$sidebar['id']] = $sidebar['name'];
		}
	}
	
	return $sidebars;
}


function royal_customize_post_types_options() {
	$post_types = get_post_types( array( 'public' => true ), 'objects' );

	return wp_list_pluck(
		$post_types,
		'label',
		'name'
	);
}
