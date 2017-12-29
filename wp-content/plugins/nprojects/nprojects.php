<?php
/**
 * WARNING: This file is part of the Projects plugin. DO NOT edit
 * this file under any circumstances.
 */

/**
 * Plugin Name: nProjects by LineThemes
 * Plugin URI:  http://linethemes.com/
 * Description: 
 * Author:      LineThemes
 * Version:     1.0.6
 * Author URI: http://linethemes.com/
 */
defined( 'ABSPATH' ) or die();

// Load classes
require_once plugin_dir_path( __FILE__ ) . 'classes/nprojects-base.php';
require_once plugin_dir_path( __FILE__ ) . 'classes/nprojects-helper.php';
require_once plugin_dir_path( __FILE__ ) . 'classes/nprojects-shortcode.php';
require_once plugin_dir_path( __FILE__ ) . 'classes/nprojects.php';

/**
 * Register action to initialize the plugin
 */
add_action( 'plugins_loaded',
	array( 'nProjects', 'instance' ) );

/**
 * Register action to initialize plugin shortcode
 */
add_action( 'plugins_loaded',
	array( 'nProjects_Shortcode', 'instance' ) );

/**
 * Load the specific phase for the plugin
 */
if ( is_admin() ) {
	// Load the admin class
	require_once plugin_dir_path( __FILE__ ) . 'classes/nprojects-admin.php';

	// Register action to initialize the plugin admin
	add_action( 'plugins_loaded',
		array( 'nProjects_Admin', 'instance' ) );
}

/**
 * Load the frontend phase
 */
else {
	// Load the frontend class
	require_once plugin_dir_path( __FILE__ ) . 'classes/nprojects-front.php';

	// Register action to initialize the plugin frontend
	add_action( 'plugins_loaded',
		array( 'nProjects_Front', 'instance' ) );
}
