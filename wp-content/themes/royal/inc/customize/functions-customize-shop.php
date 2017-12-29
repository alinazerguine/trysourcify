<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

add_filter( 'royal_customize_containers', 'royal_customize_shop_containers' );
add_filter( 'royal_customize_controls', 'royal_customize_shop_controls' );
// add_filter( 'royal_customize_controls', 'royal_customize_single_product_controls' );
add_filter( 'royal_customize_settings', 'royal_customize_shop_settings' );


function royal_customize_shop_containers( $containers ) {
	$containers['shop'] = array(
		'type'            => 'section',
		'title'           => esc_html__( 'WooCommerce', 'royal' ),
		'description'     => '',
		'active_callback' => function() {
			return class_exists( 'WooCommerce' );
		}
	);

	return $containers;
}


function royal_customize_shop_controls( $controls ) {
	$controls['shop__imageSizeHeading'] = array(
		'type'        => 'heading',
		'section'     => 'shop',
		'label'       => esc_html__( 'Product images', 'royal' ),
		'description' => esc_html__( 'These settings affect the display and dimensions of images in your catalog - the display on the front-end will still be affected by CSS styles.', 'royal' ),
	);
	$controls['shop__productImageSize'] = array(
		'type'        => 'textfield',
		'section'     => 'shop',
		'label'       => esc_html__( 'Catalog images', 'royal' ),
		'description' => esc_html__( 'Enter image size in pixels: 200x100 (Width x Height).', 'royal' )
	);
	$controls['shop__productImageSizeCrop'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'shop',
		'choices'     => array(
			'crop' => __('Hard Crop', 'royal'),
			'none' => __('None', 'royal')
		)
	);
	$controls['product__imageSize'] = array(
		'type'        => 'textfield',
		'section'     => 'shop',
		'label'       => esc_html__( 'Single Product Image', 'royal' ),
		'description' => esc_html__( 'Enter image size in pixels: 200x100 (Width x Height).', 'royal' )
	);
	$controls['product__imageSizeCrop'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'shop',
		'choices'     => array(
			'crop' => __('Hard Crop', 'royal'),
			'none' => __('None', 'royal')
		)
	);
	$controls['product__thumbnailSize'] = array(
		'type'        => 'textfield',
		'section'     => 'shop',
		'label'       => esc_html__( 'Product Thumbnails', 'royal' ),
		'description' => esc_html__( 'Enter image size in pixels: 200x100 (Width x Height).', 'royal' )
	);
	$controls['product__thumbnailSizeCrop'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'shop',
		'choices'     => array(
			'crop' => __('Hard Crop', 'royal'),
			'none' => __('None', 'royal')
		)
	);


	$controls['shop__heading'] = array(
		'type'        => 'heading',
		'section'     => 'shop',
		'label'       => esc_html__( 'Shop Settings', 'royal' ),
		'description' => esc_html__( 'This section is designed for only Woocommerce, it will be applied for page that listing all products.', 'royal' ),
	);

	$controls['shop__gridColumns'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'shop',
		'label'       => esc_html__( 'Grid Columns', 'royal' ),
		'choices'     => array(
			2 => 2,
			3 => 3,
			4 => 4,
			5 => 5
		)
	);
	$controls['shop__gridGutter'] = array(
		'type'        => 'textfield',
		'section'     => 'shop',
		'label'       => esc_html__( 'Grid Columns Spacing (px)', 'royal' )
	);
	$controls['shop__paginate'] = array(
		'type'        => 'textfield',
		'section'     => 'shop',
		'label'       => esc_html__( 'Products Per Page', 'royal' )
	);

	$controls['shop__sidebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'shop',
		'label'       => esc_html__( 'Sidebar', 'royal' ),
		'choices'     => 'royal_customize_dropdown_sidebars'
	);
	$controls['shop__sidebarPosition'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'shop',
		'label'       => esc_html__( 'Sidebar Position', 'royal' ),
		'choices'     => array(
			'none'  => esc_html__( 'No Sidebar', 'royal' ),
			'left'  => esc_html__( 'Left', 'royal' ),
			'right' => esc_html__( 'Right', 'royal' )
		)
	);



	/**
	 * Product Settigns
	 */
	$controls['product__heading'] = array(
		'type'        => 'heading',
		'section'     => 'shop',
		'label'       => esc_html__( 'Product Settings', 'royal' ),
		'description' => esc_html__( 'Like "Blog Single" section, you can change style for product details page.', 'royal' ),
	);

	$controls['product__sidebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'shop',
		'label'       => esc_html__( 'Sidebar', 'royal' ),
		'choices'     => 'royal_customize_dropdown_sidebars'
	);
	$controls['product__sidebarPosition'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'shop',
		'label'       => esc_html__( 'Sidebar Position', 'royal' ),
		'choices'     => array(
			'none'  => esc_html__( 'No Sidebar', 'royal' ),
			'left'  => esc_html__( 'Left', 'royal' ),
			'right' => esc_html__( 'Right', 'royal' )
		)
	);

	return $controls;
}


function royal_customize_shop_settings( $settings ) {
	$settings['shop__productImageSizeCrop'] = array( 'default' => 'crop' );
	$settings['product__imageSizeCrop']     = array( 'default' => 'crop' );
	$settings['product__thumbnailSizeCrop'] = array( 'default' => 'crop' );
	$settings['shop__gridColumns']        = array( 'default' => 3 );
	$settings['shop__gridGutter']         = array( 'default' => 20 );
	$settings['shop__paginate']           = array( 'default' => 12 );
	$settings['shop__productImageSize']   = array( 'default' => 'full' );
	$settings['shop__sidebar']            = array( 'default' => 'primary' );
	$settings['shop__sidebarPosition']    = array( 'default' => 'left' );
	$settings['product__imageSize']       = array( 'default' => 'full' );
	$settings['product__thumbnailSize']   = array( 'default' => '200x150' );
	$settings['product__sidebar']         = array( 'default' => 'primary' );
	$settings['product__sidebarPosition'] = array( 'default' => 'left' );

	return $settings;
}


