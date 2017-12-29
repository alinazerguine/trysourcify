<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();


add_filter( 'nprojects/shortcode_template', 'royal_project_shortcode_template' );
add_filter( 'nprojects/shortcode_parameters', 'royal_project_shortcode_params' );
add_filter( 'line-shortcode-unsupported', 'royal_project_disable_justify_shortcode' );
add_filter( 'the_excerpt', 'royal_project_auto_excerpt', 99 );

function royal_project_auto_excerpt( $excerpt ) {
	if ( royal_current_post_type() == 'nproject' && mb_strlen( $excerpt ) > royal_option( 'projects__autoExcerptLength' ) ) {
		$excerpt = mb_substr( $excerpt, 0, royal_option( 'projects__autoExcerptLength' ) );
	}

	return $excerpt;
}

function royal_project_disable_justify_shortcode( $unsupported ) {
	$unsupported[] = 'projects_justify';
	return $unsupported;
}


function royal_projects_body_class( $classes ) {
	$classes[] = sprintf( 'projects projects-%s', royal_option( 'projects__displayMode' ) );

	return $classes;
}

function royal_projects_sidebar() {
	return royal_option( 'projects__sidebar' );
}

function royal_projects_sidebar_position() {
	return royal_option( 'projects__sidebarPosition' );
}


function royal_single_project_body_classes( $classes ) {
	$classes[] = sprintf( 'project-gallery-%s', royal_option( 'project__galleryPosition' ) );
	
	return $classes;
}

function royal_single_project_sidebar() {
	return royal_option( 'project__sidebar' );
}

function royal_single_project_sidebar_position() {
	return royal_option( 'project__sidebarPosition' );
}


function royal_project_media_item( $item ) {
	$attachment_image = wp_get_attachment_image_src( $item['id'], 'full' );
	$attachment_image_src = $attachment_image[0];

	if ( royal_option( 'project__lightbox' ) ) {
		printf( '<a href="%s" rel="prettyPhoto[gallery]">%s</a>',
			esc_url( $attachment_image_src ),
			wp_get_attachment_image( $item['id'], 'full' ) 
		);
	}
	else {
		echo wp_get_attachment_image( $item['id'], 'full' );
	}
}



function royal_project_shortcode_params( $params ) {
	// General tab
	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Widget Title', 'royal' ),
		'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'royal' ),
		'param_name'  => 'widget_title'
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Categories', 'royal' ),
		'description' => esc_html__( 'If you want to narrow output, enter category names here. Note: Only listed categories will be included.', 'royal' ),
		'param_name'  => 'categories'
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Tags', 'royal' ),
		'description' => esc_html__( 'If you want to narrow output, enter tag names here. Note: Only listed tags will be included.', 'royal' ),
		'param_name'  => 'tags'
	);

	$params[] = array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Display Mode', 'royal' ),
		'param_name' => 'mode',
		'std'        => 3,
		'value'      => array(
			esc_html__( 'Grid Classic', 'royal' )   => 'grid',
			esc_html__( 'Grid Masonry', 'royal' )   => 'masonry',
			esc_html__( 'Grid Alt', 'royal' ) => 'grid-alt'
		)
	);

	$params[] = array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Columns', 'royal' ),
		'description' => esc_html__( 'The number of columns will be shown', 'royal' ),
		'param_name'  => 'columns',
		'std'         => 3,
		'value'       => array(
			esc_html__( '1 Column', 'royal' )  => 1,
			esc_html__( '2 Columns', 'royal' ) => 2,
			esc_html__( '3 Columns', 'royal' ) => 3,
			esc_html__( '4 Columns', 'royal' ) => 4,
			esc_html__( '5 Columns', 'royal' ) => 5,
		)
	);

	$params[] = array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Show Items Filter', 'royal' ),
		'param_name' => 'filter',
		'std'        => 'yes',
		'value'      => array(
			esc_html__( 'Yes', 'royal' ) => 'yes',
			esc_html__( 'No', 'royal' )  => 'no'
		)
	);

	$params[] = array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Filter By', 'royal' ),
		'param_name' => 'filter_by',
		'std'        => 'category',
		'value'      => array(
			esc_html__( 'Categories', 'royal' ) => 'category',
			esc_html__( 'Tags', 'royal' )       => 'tag'
		)
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Limit', 'royal' ),
		'description' => esc_html__( 'The number of posts will be shown', 'royal' ),
		'param_name'  => 'limit',
		'value'       => 9
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Offset', 'royal' ),
		'description' => esc_html__( 'The number of posts to pass over', 'royal' ),
		'param_name'  => 'offset',
		'value'       => 0
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Thumbnail Size', 'royal' ),
		'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'royal' ),
		'param_name'  => 'thumbnail_size'
	);

	$params[] = array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Show Read More', 'royal' ),
		'param_name' => 'readmore',
		'std'        => 'yes',
		'value'      => array(
			esc_html__( 'Yes', 'royal' ) => 'yes',
			esc_html__( 'No', 'royal' )  => 'no'
		)
	);
	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Readmore Text', 'royal' ),
		'param_name'  => 'readmore_text'
	);

	$params[] = array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Order By', 'royal' ),
		'description' => esc_html__( 'Select how to sort retrieved posts.', 'royal' ),
		'param_name'  => 'order',
		'std'         => 'date',
		'value'       => array(
			esc_html__( 'Date', 'royal' )          => 'date',
			esc_html__( 'ID', 'royal' )            => 'ID',
			esc_html__( 'Author', 'royal' )        => 'author',
			esc_html__( 'Title', 'royal' )         => 'title',
			esc_html__( 'Modified', 'royal' )      => 'modified',
			esc_html__( 'Random', 'royal' )        => 'rand',
			esc_html__( 'Comment count', 'royal' ) => 'comment_count',
			esc_html__( 'Menu order', 'royal' )    => 'menu_order'
		)
	);

	$params[] = array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Order Direction', 'royal' ),
		'description' => esc_html__( 'Designates the ascending or descending order.', 'royal' ),
		'param_name'  => 'direction',
		'std'         => 'DESC',
		'value'       => array(
			esc_html__( 'Ascending', 'royal' )          => 'ASC',
			esc_html__( 'Descending', 'royal' )            => 'DESC'
		)
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'royal' ),
		'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'royal' ),
		'param_name'  => 'class'
	);

	$params[] = array(
		'type' => 'css_editor',
		'param_name' => 'css',
		'group' => esc_html__( 'Design Options', 'royal' )
	);

	return $params;
}



function royal_project_shortcode_template() {
	return 'tmpl/shortcodes/projects.php';
}
