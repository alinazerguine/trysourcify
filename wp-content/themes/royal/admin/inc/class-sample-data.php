<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();


/**
 * Sample data installer class
 */
class Cls__Sample_Data
{
	private $data_tables = array();
	private $truncated_tables = array();
	private $table_prefix;
	private $menu;

	/**
	 * Class constructor
	 */
	public function __construct() {
		new Cls__Sample_Data_Worker();

		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	/**
	 * Register the custom menu for the sample data
	 * installer page
	 * 
	 * @return  void
	 */
	public function admin_menu() {
		$page_title = __( 'Sample Data Installation', 'royal' );
		$menu_title = __( 'Sample Data', 'royal' );
		$capability = 'edit_theme_options';
		$page_slug  = 'sample-data';
		$page_callback = array( $this, 'admin_page' );

		$this->menu = add_theme_page(
			$page_title,
			$menu_title,
			$capability, 
			$page_slug,
			$page_callback
		);
	}

	/**
	 * Output the based markup for the admin page
	 * 
	 * @return  void
	 */
	public function admin_page() {
		include get_theme_file_path( 'admin/inc/views/sample-data-view.php' );
	}

	/**
	 * Enqueue script for sample data installation page
	 * 
	 * @return  void
	 */
	public function enqueue( $page ) {
		if ( $page == $this->menu ) {
			wp_enqueue_style( 'sample-data' );
			wp_enqueue_script( 'sample-data' );

			wp_localize_script( 'sample-data', '_sampleDataI18n', array(
				'confirmInstallation' => __( 'Attention!!! Your existing data will be removed when install sample data. Are you sure you want to install sample data?', 'royal' )
			) );

			wp_localize_script( 'sample-data', '_sampleDataInfo', array(
				'nonce'    => wp_create_nonce( 'sample_data_installation' ),
				'packages' => apply_filters( 'royal/sample-datas', array() ),
				'themeURI' => get_theme_file_uri('/'),
				'tempURI'  => get_theme_file_uri('_temp/')
			) );

			wp_localize_script( 'sample-data', '_sampleDataInstalled',
				get_option( get_template() . '_demo', false )
			);
		}
	}
}
