<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

add_action( 'customize_controls_enqueue_scripts', 'royal_customize_enqueue_assets' );
add_action( 'customize_register', 'royal_customize_register' );
add_action( 'after_switch_theme', 'royal_update_default_settings' );

function royal_update_default_settings() {
	$options_file = get_theme_file_path( 'admin/options.dat' );

	if ( royal_initialize_filesystem_api() ) {
		global $wp_filesystem;

		if ( $options = unserialize( $wp_filesystem->get_contents( $options_file ) ) ) {
			if ( isset( $options['mods'] ) && is_array( $options['mods'] ) ) {
				$options = $options['mods'];
			}
			
			$options['logoDefault__logo']       = array( 'url' => get_theme_file_uri( 'assets/img/logo.png' ) );
			$options['logoDefault__logoRetina'] = array( 'url' => get_theme_file_uri( 'assets/img/logo@2x.png' ) );
			
			foreach ( $options as $key => $value ) {
				set_theme_mod( $key, $value );
			}
		}
	}
}


/**
 * Enqueue the needed assets for the theme customize
 * 
 * @return  void
 */
function royal_customize_enqueue_assets() {
	wp_enqueue_style( 'royal-customize' );
	wp_enqueue_script( 'royal-options' );
	wp_localize_script( 'royal-options', '_royalfonts', royal_google_fonts() );
	wp_localize_script( 'royal-options', '_royalicons', royal_icons() );
}

function royal_customize_register( $wp_customize ) {
	royal_customize_containers( $wp_customize );
	royal_customize_settings( $wp_customize );
	royal_customize_controls( $wp_customize );
}


/**
 * Register the theme customize panels
 * 
 * @param   WP_Customize_Manager  $wp_customize  The theme customize manager object
 * @return  void
 */
function royal_customize_containers( $wp_customize ) {
	require_once ROYAL_PATH . 'inc/customize/class-customize-panel.php';
	require_once ROYAL_PATH . 'inc/customize/class-customize-section.php';

	$containers = apply_filters( 'royal_customize_containers', array() );
	$container_classes = array(
		'panel'   => 'Royal_Customize_Panel',
		'section' => 'Royal_Customize_Section'
	);

	$wp_customize->register_panel_type( 'Royal_Customize_Panel' );
	$wp_customize->register_section_type( 'Royal_Customize_Section' );

	$count = 1;

	foreach ( $containers as $id => $params ) {
		if ( isset( $params['type'] ) && isset( $container_classes[ $params['type'] ] ) ) {
			$class = $container_classes[ $params['type'] ];
			$type  = $params['type'];
			$params['priority'] = $count++;

			unset( $params['type'] );
			$wp_customize->{"add_{$type}"}( new $class( $wp_customize, $id, $params ) );
		}
	}
}


/**
 * This action will retrieve all settings of the theme
 * and register it into the theme customize
 * 
 * @param   WP_Customize_Manager  $wp_customize  Theme customize object
 * @return  void
 */
function royal_customize_settings( $wp_customize ) {
	// Apply the filter to retrieving the customize
	// settings
	$settings = apply_filters( 'royal_customize_settings', array() );

	// Walking through each setting and register it
	// into the theme customize manager
	foreach ( $settings as $index => $setting ) {
		$wp_customize->add_setting( $index, array_merge( array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'royal_customize_setting_sanitize' 
		), $setting ) );
	}
}


function royal_customize_setting_sanitize( $data ) {
	return $data;
}


/**
 * This action will retrieve all options definition of the theme
 * and register it into the theme customize
 * 
 * @param   WP_Customize_Manager  $wp_customize  Theme customize object
 * @return  void
 */
function royal_customize_controls( $wp_customize ) {
	require_once ROYAL_PATH . 'inc/customize/class-customize-control.php';
	require_once ROYAL_PATH . 'inc/customize/functions-customize-helpers.php';

	$controls = apply_filters( 'royal_customize_controls', array() );
	$count = 0;

	foreach ( $controls as $id => $params ) {
		$default = '';
		$params['priority'] = $count++;

		if ( isset( $params['default'] ) )    $default = $params['default'];
		if ( !isset( $params['settings'] ) )  $params['settings'] = $id;
		if ( !isset( $params['transport'] ) ) $params['transport'] = 'refresh';

		$classname = explode( '-', $params['type'] );
		$classname = array_map( 'ucfirst', $classname );
		$params['classname'] = sprintf( 'Royal_Options_%s', join( '', $classname ) );
		unset( $params['type'] );

		if ( class_exists( $params['classname'] ) ) {
			if ( $wp_customize->get_setting( $params['settings'] ) == null ) {
				// Register setting for this control
				$wp_customize->add_setting( $params['settings'], array(
					'default'           => $default,
					'transport'         => $params['transport'],
					'sanitize_callback' => 'royal_customize_setting_sanitize'
				) );
			}

			$wp_customize->add_control( new Royal_Customize_Control( $wp_customize, $id, $params ) );
		}
	}
}

require_once ROYAL_PATH . 'inc/customize/functions-customize-helpers.php';
require_once ROYAL_PATH . 'inc/customize/functions-customize-global.php';
require_once ROYAL_PATH . 'inc/customize/functions-customize-header.php';
require_once ROYAL_PATH . 'inc/customize/functions-customize-footer.php';
require_once ROYAL_PATH . 'inc/customize/functions-customize-blog.php';
require_once ROYAL_PATH . 'inc/customize/functions-customize-projects.php';
require_once ROYAL_PATH . 'inc/customize/functions-customize-shop.php';
require_once ROYAL_PATH . 'inc/customize/functions-customize-elements.php';
