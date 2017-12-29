<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

add_action( 'after_setup_theme', 'royal_woocommerce_supports' );
add_action( 'woocommerce_before_shop_loop_item_title', 'royal_woocommerce_template_loop_product_thumbnail', 10 );

// A filter that return an empty array
// to prevent woocommerce styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
add_filter( 'loop_shop_per_page', 'royal_woocommerce_products_per_page' );
add_filter( 'woocommerce_show_page_title', '__return_false' );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

function royal_woocommerce_supports() {
	add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

/**
 * Register custom image sizes for WooCommerce
 */
if ( ! function_exists( 'royal_woocommerce_thumbnail_size' ) ) {
	function royal_woocommerce_thumbnail_size( $args ) {
		$sizes = royal_get_image_sizes();
		$size  = royal_option( 'product__thumbnailSize' );
		$crop  = royal_option( 'product__thumbnailSizeCrop' ) == 'crop';

		if ( preg_match( '/^([0-9]+)x([0-9]+)$/', $size, $matches ) ) {
			return array(
				'width'  => $matches[1],
				'height' => $matches[2],
				'crop'   => $crop
			);
		}
		elseif ( isset( $sizes[ $size ] ) ) {
			return array_merge( $sizes[ $size ], array(
				'crop' => $crop
			) );
		}

		return $args;
	}
}
add_filter( 'woocommerce_get_image_size_shop_thumbnail', 'royal_woocommerce_thumbnail_size' );



if ( ! function_exists( 'royal_woocommerce_catalog_size' ) ) {
	function royal_woocommerce_catalog_size( $args ) {
		$sizes = royal_get_image_sizes();
		$size  = royal_option( 'shop__productImageSize' );
		$crop  = royal_option( 'shop__productImageSizeCrop' ) == 'crop';

		if ( preg_match( '/^([0-9]+)x([0-9]+)$/', $size, $matches ) ) {
			return array(
				'width'  => $matches[1],
				'height' => $matches[2],
				'crop'   => $crop
			);
		}
		elseif ( isset( $sizes[ $size ] ) ) {
			return array_merge( $sizes[ $size ], array(
				'crop' => $crop
			) );
		}

		return $args;
	}
}
add_filter( 'woocommerce_get_image_size_shop_catalog', 'royal_woocommerce_catalog_size' );



if ( ! function_exists( 'royal_woocommerce_single_size' ) ) {
	function royal_woocommerce_single_size( $args ) {
		$sizes = royal_get_image_sizes();
		$size  = royal_option( 'product__imageSize' );
		$crop  = royal_option( 'product__imageSizeCrop' ) == 'crop';

		if ( preg_match( '/^([0-9]+)x([0-9]+)$/', $size, $matches ) ) {
			$args = array(
				'width'  => $matches[1],
				'height' => $matches[2],
				'crop'   => $crop
			);
		}
		elseif ( isset( $sizes[ $size ] ) ) {
			$args = array_merge( $sizes[ $size ], array(
				'crop' => $crop
			) );
		}

		return $args;
	}
}
add_filter( 'woocommerce_get_image_size_shop_single', 'royal_woocommerce_single_size' );

function royal_woocommerce_body_class( $classes ) {
	return $classes;
}

function royal_woocommerce_sidebar() {
	return is_shop()
		? royal_option( 'shop__sidebar' )
		: royal_option( 'product__sidebar' );
}

function royal_woocommerce_sidebar_position() {
	return is_shop()
		? royal_option( 'shop__sidebarPosition' )
		: royal_option( 'product__sidebarPosition' );
}

function royal_woocommerce_products_per_page() {
	return abs( (int) royal_option( 'shop__paginate' ) );
}

function royal_woocommerce_template_loop_product_thumbnail() {
	global $post;

	if ( has_post_thumbnail() ) {
		$props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
		$images = royal_get_image_resized( array(
			'image_id' => get_post_thumbnail_id(),
			'size'     => royal_option( 'shop__productImageSize' ),
			'crop'     => royal_option( 'shop__productImageSizeCrop' ),
			'atts'     => array(
				'title'	 => $props['title'],
				'alt'    => $props['alt'],
			)
		) );

		echo wp_kses_post( $images['thumbnail'] );
	} elseif ( wc_placeholder_img_src() ) {
		echo wc_placeholder_img( $image_size );
	}
}
