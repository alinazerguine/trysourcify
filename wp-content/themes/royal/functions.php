<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or exit;

// Theme constants
define( 'ROYAL_PATH', trailingslashit( get_template_directory() ) );
define( 'ROYAL_URI', trailingslashit( get_template_directory_uri() ) );
define( 'ROYAL_VERSION', '1.0.0' );
define( 'ROYAL_ID', 'royal' );


// Action to load the theme translation
add_action( 'after_setup_theme', 'royal_translation_import', 5 );

/**
 * Load the translation files into the theme textdomain
 * 
 * @return  void
 */
function royal_translation_import() {
	load_theme_textdomain( 'royal', get_template_directory() . '/languages' );
}


/**
 * We must check PHP version to ensure the theme can
 * be worked fine
 */
if ( version_compare( PHP_VERSION, '5.3', '<' ) ) {
	// Register action to checking theme requirements
	add_action( 'after_switch_theme', 'royal_requirement_check', 10, 2 );

	// Action to sending a notice while hosting does
	// not meet the minimum requires
	add_action( 'admin_notices', 'royal_requirement_notice' );

	/**
	 * Check the theme requirements
	 *
	 * @param   string  $name   Theme's name
	 * @param   object  $theme  The theme object
	 *
	 * @return  void
	 */
	function royal_requirement_check( $name, $theme ) {
		// Switch back to previous theme
		switch_theme( $theme->stylesheet );
	}

	/**
	 * Show the warning message when hosting environment doesn't
	 * meet the theme minimum requires.
	 * 
	 * @return  void
	 */
	function royal_requirement_notice() {
		printf( '<div class="error"><p>%s</p></div>',
			__( 'Sorry! Your server does not meet the minimum requirements, please upgrade PHP version to 5.3 or higher', 'royal' ) );
	}

	return;
}


// The base classes
require_once ROYAL_PATH . 'inc/options/class-options-container.php';
require_once ROYAL_PATH . 'inc/options/class-options-control.php';
require_once ROYAL_PATH . 'inc/options/class-options-section.php';

require_once ROYAL_PATH . 'inc/functions-helpers.php';
require_once ROYAL_PATH . 'inc/functions-helpers-styles.php';

// Theme customize setup
require_once ROYAL_PATH . 'inc/customize/functions-customize.php';

// Theme setup
require_once ROYAL_PATH . 'inc/functions-setup.php';
require_once ROYAL_PATH . 'inc/functions-template.php';
require_once ROYAL_PATH . 'inc/functions-custom-icons.php';
require_once ROYAL_PATH . 'inc/functions-metaboxes.php';
require_once ROYAL_PATH . 'inc/class-custom-sidebars.php';

if ( is_admin() ) {
	require_once ROYAL_PATH . 'admin/functions-setup.php';
	require_once ROYAL_PATH . 'admin/functions-plugins.php';
}

// Custom filters & actions
require_once ROYAL_PATH . 'inc/functions-filters.php';
require_once ROYAL_PATH . 'inc/functions-blog.php';
require_once ROYAL_PATH . 'inc/functions-woocommerce.php';
require_once ROYAL_PATH . 'inc/functions-projects.php';


//Alina Customize
// add_action( 'wp_ajax_ajaxlogin', 'wp_ajax_ajaxlogin' );
function wp_ajax_ajaxlogin(){
	global $wpdb;

	$return = array();
	$username = $wpdb->escape($_REQUEST['username']);  
    $password = $wpdb->escape($_REQUEST['password']);  
	$remember = "true";
	
	$login_data = array();  
    $login_data['user_login'] = $username;  
    $login_data['user_password'] = $password;  
    $login_data['remember'] = $remember;  
   
    $user_verify = wp_signon( $login_data, false );   
   
    if ( is_wp_error($user_verify) )   
    {  
		$return['login'] = false;
		$return['error'] = "Invalid login details";  
       // Note, I have created a page called "Error" that is a child of the login page to handle errors. This can be anything, but it seemed a good way to me to handle errors.  
	} else
    {    
		$return['login'] = true;
     }  
	
	echo json_encode($return);
	die();
}

function wp_ajax_ajaxsignup(){
	global $wpdb;

	$return = array();
	$fname = $wpdb->escape($_REQUEST['firstname']);  
	$lname = $wpdb->escape($_REQUEST['lastname']);  
	$username = $wpdb->escape($_REQUEST['username']);  
    $password = $wpdb->escape($_REQUEST['password']);  
	$records = explode("@",$username);
	$user_login = $records[0];
	
	$info = array();  
	$info['user_nicename'] = $user_login;
	$info['nickname'] = $user_login;
	$info['display_name'] = $user_login;
	$info['first_name'] = $fname;
	$info['last_name'] = $lname;
	$info['user_login'] = $user_login;
    $info['user_pass'] = $password;
	$info['user_email'] = $username;

	// Register the user
	$user_register = wp_insert_user($info);
	if ( is_wp_error($user_register) ){	
		$error  = $user_register->get_error_codes()	;
		
		if(in_array('empty_user_login', $error))
			echo json_encode(array('loggedin'=>false, 'message'=>__($user_register->get_error_message('empty_user_login'))));
		elseif(in_array('existing_user_login',$error))
			echo json_encode(array('loggedin'=>false, 'message'=>__('This username is already registered.')));
		elseif(in_array('existing_user_email',$error))
			echo json_encode(array('loggedin'=>false, 'message'=>__('This email address is already registered.')));
	} else {
		// auth_user_login($info['nickname'], $info['user_pass'], 'Registration');
		echo json_encode(array('loggedin'=>true));
	}

	die();
}