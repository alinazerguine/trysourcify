<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

function royal_blog_body_class( $classes ) {
	$classes[] = sprintf( 'blog-%s', royal_option( 'blog__archive__style' ) );

	return $classes;
}

function royal_blog_sidebar() {
	return royal_option( 'blog__archive__sidebar' );
}

function royal_blog_sidebar_position() {
	return royal_option( 'blog__archive__sidebarPosition' );
}

function royal_single_sidebar() {
	return royal_option( 'blog__single__sidebar' );
}

function royal_single_sidebar_position() {
	return royal_option( 'blog__single__sidebarPosition' );
}

