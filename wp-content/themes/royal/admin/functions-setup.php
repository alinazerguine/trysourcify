<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

// The third-party libraries
require_once ROYAL_PATH . 'vendor/class-tgm-plugin-activation.php';

// Classes
require_once ROYAL_PATH . 'admin/inc/class-plugins-activation.php';
require_once ROYAL_PATH . 'admin/inc/class-sample-data-worker.php';
require_once ROYAL_PATH . 'admin/inc/class-sample-data.php';

// Register theme's assets
add_action( 'init', 'royal_setup_admin_assets' );

// Initialize sample data installer
add_action( 'init', 'royal_setup_sample_data_installer' );


if ( ! function_exists( 'royal_setup_admin_assets' ) ):
/**
 * Register scripts and styles for the theme
 * 
 * @return  void
 */
function royal_setup_admin_assets() {
	// Font Awesome
	wp_register_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0' );
	
	// Chosen
	wp_register_style( 'royal-chosen', get_theme_file_uri( 'admin/js/vendor/chosen/chosen.min.css' ), array(), ROYAL_VERSION );
	wp_register_script( 'royal-chosen', get_theme_file_uri( 'admin/js/vendor/chosen/chosen.jquery.min.js' ), array( 'jquery' ), ROYAL_VERSION, true );
	
	// Spectrum
	wp_register_style( 'royal-spectrum', get_theme_file_uri( 'admin/js/vendor/spectrum/spectrum.css' ), array(), ROYAL_VERSION );
	wp_register_script( 'royal-spectrum', get_theme_file_uri( 'admin/js/vendor/spectrum/spectrum.js' ), array( 'jquery' ), ROYAL_VERSION, true );

	// Spectrum
	wp_register_style( 'royal-iconpicker', get_theme_file_uri( 'admin/js/vendor/iconpicker/css/jquery.fonticonpicker.css' ), array(), ROYAL_VERSION );
	wp_register_script( 'royal-iconpicker', get_theme_file_uri( 'admin/js/vendor/iconpicker/fonticonpicker.js' ), array( 'jquery' ), ROYAL_VERSION, true );

	// VueJS library
	wp_register_script( 'vuejs', get_theme_file_uri( 'admin/js/vendor/vue.js' ), array(), ROYAL_VERSION, true );

	// Sample data installer
	wp_register_style( 'sample-data', get_theme_file_uri( 'admin/css/sample-data.css' ) );
	wp_register_script( 'sample-data', get_theme_file_uri( 'admin/js/sample-data.js' ), array( 'vuejs', 'jquery' ) );

	/**
	 * Core scripts
	 */
	wp_register_script( 'royal-options', get_theme_file_uri( 'admin/js/options.js' ), array(
		'vuejs',
		'royal-spectrum',
		'royal-chosen',
		'wp-plupload',
		'jquery-ui-resizable',
		'jquery-ui-sortable',
		'royal-iconpicker'
	), ROYAL_VERSION, true );

	wp_register_style( 'royal-options', get_theme_file_uri( 'admin/css/options.css' ), array(
		'font-awesome',
		'royal-chosen',
		'royal-spectrum',
		'royal-iconpicker'
	), ROYAL_VERSION );
	
	wp_register_style( 'royal-customize', get_theme_file_uri( 'admin/css/customize.css' ), array( 'royal-options' ), ROYAL_VERSION );
}
endif;



if ( ! function_exists( 'royal_setup_sample_data_installer' ) ):
function royal_setup_sample_data_installer() {
	new Cls__Sample_Data();
}
endif;

function royal_sample_data_files() {
	return array(
		array(
			'title'   => 'Demo #1',
			'file'    => 'demo-01.zip',
			'preview' => get_theme_file_uri( 'demo/screenshot-01.jpg' )
		),

		array(
			'title'   => 'Demo #2',
			'file'    => 'demo-02.zip',
			'preview' => get_theme_file_uri( 'demo/screenshot-02.jpg' )
		),

		array(
			'title'   => 'Demo #3',
			'file'    => 'demo-03.zip',
			'preview' => get_theme_file_uri( 'demo/screenshot-03.jpg' )
		),

		array(
			'title'   => 'Demo #4',
			'file'    => 'demo-04.zip',
			'preview' => get_theme_file_uri( 'demo/screenshot-04.jpg' )
		),

		array(
			'title'   => 'Demo #5',
			'file'    => 'demo-05.zip',
			'preview' => get_theme_file_uri( 'demo/screenshot-05.jpg' )
		)
	);
}
add_filter( 'royal/sample-datas', 'royal_sample_data_files' );


add_filter('acf/settings/save_json', function() {
	return get_theme_file_path( 'admin/json/' );
} );

add_filter('acf/settings/load_json', function( $paths ) {
    return array( get_theme_file_path( 'admin/json/' ) );
} );
