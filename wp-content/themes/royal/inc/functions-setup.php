<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();


// Setup the theme navigation
add_action( 'after_setup_theme', 'royal_navigation' );

// Setup images dimensions
add_action( 'after_setup_theme', 'royal_images_dimensions' );

// Setup theme supports
add_action( 'after_setup_theme', 'royal_supports' );

// Setup theme sidebars
add_action( 'widgets_init', 'royal_sidebars' );

// Add action to register the needed scripts and styles
// for the theme
add_action( 'init', 'royal_register_assets', 5 );

// We need enqueue the scripts and styles before showing
// the content
add_action( 'wp_enqueue_scripts', 'royal_enqueue_assets', 5 );

// Adding SVG support in the media library
add_filter( 'upload_mimes', 'royal_upload_mimes' );

// Adding filter to change the shortcodes path
add_filter( 'line-shortcode-path', 'royal_shortcodes_path' );

add_filter( 'vc_before_init', 'royal_shortcodes_init' );


if ( ! isset( $content_width ) ) {
	$content_width = 900;
}


/**
 * Register the theme menu locations
 * 
 * @return  void
 * @since   1.0.0
 */
function royal_navigation() {
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'royal' ),
		'secondary' => __( 'Secondary Menu', 'royal' ),
		'sliding'   => __( 'Sliding Menu', 'royal' ),
		'top'       => __( 'Top Menu', 'royal' )
	) );
}


/**
 * Register images dimensions that will be used
 * by the theme
 * 
 * @return  void
 * @since   1.0.0
 */
function royal_images_dimensions() {
	add_image_size( 'small', 50, 50, true );

	add_image_size( 'xmedium', 100, 0, false );
	add_image_size( 'xmedium-crop', 100, 75,true );

	add_image_size( 'medium', 585, 0, false );
	add_image_size( 'medium-crop', 585, 385, true );

	add_image_size( 'large', 1200, 0, false );
	add_image_size( 'large-crop', 1200, 790, true );

	add_image_size( 'slider', 760, 500, true );
}


/**
 * Register the theme features support
 * 
 * @return  void
 */
function royal_supports() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'status', 'video', 'audio' ) );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', 'gallery', 'caption' ) );
	add_theme_support( 'post-thumbnails' );
}


function royal_sidebars() {
	register_sidebar( array(
		'name'          => __( 'Primary Widgets Area', 'royal' ),
		'id'            => 'primary',
		'description'   => __( 'Add widgets here to appear in your sidebar', 'royal' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sliding Content - Left', 'royal' ),
		'id'            => 'off-canvas-left',
		'description'   => __( 'Add widgets here to appear in your sidebar', 'royal' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sliding Content - Right', 'royal' ),
		'id'            => 'off-canvas-right',
		'description'   => __( 'Add widgets here to appear in your sidebar', 'royal' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/**
	 * Content bottom sidebars
	 */
	register_sidebar( array(
		'name'          => __( 'Content Bottom #1', 'royal' ),
		'id'            => 'content-bottom-1',
		'description'   => __( 'Add widgets here to appear in your Content Bottom #1 area', 'royal' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom #2', 'royal' ),
		'id'            => 'content-bottom-2',
		'description'   => __( 'Add widgets here to appear in your Content Bottom #2 area', 'royal' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom #3', 'royal' ),
		'id'            => 'content-bottom-3',
		'description'   => __( 'Add widgets here to appear in your Content Bottom #3 area', 'royal' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom #4', 'royal' ),
		'id'            => 'content-bottom-4',
		'description'   => __( 'Add widgets here to appear in your Content Bottom #4 area', 'royal' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/**
	 * Footer sidebars
	 */
	register_sidebar( array(
		'name'          => __( 'Footer #1', 'royal' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your Footer #1 area', 'royal' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer #2', 'royal' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your Footer #2 area', 'royal' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer #3', 'royal' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your Footer #3 area', 'royal' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer #4', 'royal' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your Footer #4 area', 'royal' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}


function royal_register_assets() {
	// Theme's styles
	wp_register_style( 'theme-components', get_template_directory_uri() . '/assets/css/components.css', array(), ROYAL_VERSION, 'all' );
	wp_register_style( 'theme', get_template_directory_uri() . '/assets/css/style.css', array( 'theme-components' ), ROYAL_VERSION, 'all' );

	// Theme's scripts
	wp_register_script( 'theme-components', get_template_directory_uri() . '/assets/js/components.js', array( 'jquery' ), ROYAL_VERSION, true );
	wp_register_script( 'theme', get_template_directory_uri() . '/assets/js/theme.js', array( 'theme-components' ), ROYAL_VERSION, true );
	

	if ( $settings = get_option( 'line_settings' ) ) {
		wp_register_script( 'line-shortcode-maps-api', 'https://maps.google.com/maps/api/js?v=3&key=' . $settings['maps_api'], array(), false, true );
	}
}


function royal_enqueue_google_fonts() {
	global $_required_google_fonts;

	if ( ! empty( $_required_google_fonts ) && is_array( $_required_google_fonts ) ) {
		$fonts = array();
		$subsets = array();

		foreach ( $_required_google_fonts as $font ) {
			$fonts[] = sprintf( '%s:%s', urlencode( $font['family'] ), urlencode( $font['variants'] ) );
			$subsets = array_merge( $subsets, $font['subsets'] );
		}

		if ( ! empty( $fonts ) ) {
			$scheme = parse_url( get_site_url(), PHP_URL_SCHEME );
			$fonts_url = add_query_arg( array(
				'family' => implode( '|', array_unique( $fonts ) ),
				'subset' => implode( ',', array_unique( $subsets ) )
				), sprintf( '%s://fonts.googleapis.com/css', $scheme ) );

			wp_enqueue_style( 'theme-fonts', $fonts_url );
		}
	}
}


function royal_enqueue_assets() {
	// The dynamic styles
	if ( locate_template( 'dynamic-styles.php' ) ) {
		// Load the script that generate the dynamic
		// stylesheets
		get_template_part( 'dynamic-styles' );
	}

	royal_enqueue_google_fonts();

	// Enqueue the main styles
	wp_enqueue_style( 'theme' );

	// Enqueue the inline stylesheet
	wp_add_inline_style( 'theme', royal_styles() );
	wp_add_inline_style( 'theme', royal_scheme_styles() );

	// Enqueue the main script
	wp_enqueue_script( 'theme' );

	// Comment script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


/**
 * Register custom mime types for the theme
 * 
 * @param   array  $mimes  List of mime types
 * @return  array
 */
function royal_upload_mimes( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	$mimes['ico'] = 'image/x-icon';
	$mimes['dat'] = 'application/octet-stream';
	$mimes['txt'] = 'text/plain';

	return $mimes;
}


/**
 * Return the string that indicated the folder which contains
 * all shortcode templates
 * 
 * @param   string  $path  The original path
 * @return  string
 */
function royal_shortcodes_path( $path ) {
	return 'tmpl/shortcodes/';
}


/**
 * Initial the additional shortcodes for the theme
 * 
 * @return  void
 */
function royal_shortcodes_init() {
	require_once get_theme_file_path( 'inc/elements/locations.php' );
}

