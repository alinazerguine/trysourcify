<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();


// A filter for adding custom classes
// into the body element
add_filter( 'royal_body_class', 'royal_body_classes', 5 );


// A filter to generate the post excerpt
// automatically
add_filter( 'royal_the_content', 'royal_auto_excerpt', 5 );


add_filter( 'line-shortcodes/posts-params', 'royal_custom_posts_shortcode_params' );


/**
 * Return the classes name for the body tag
 * in array format
 * 
 * @param   array  $classes  An existing classes
 * @return  array
 * @since   1.0.0
 */
function royal_body_classes( $classes ) {
	$classes[] = sprintf( 'layout-%s', royal_option( 'global__layout__mode' ) );
	$classes[] = sprintf( 'sidebar-%s', royal_sidebar_position() );

	return $classes;
}


function royal_auto_excerpt( $content ) {
	if ( royal_option( 'blog__archive__autoExcerpt' ) === 'on' ) {
		$length = (int) royal_option( 'blog__archive__excerptLength' );
		$post   = get_post();

		if ( ! preg_match( '/<!--more(.*?)?-->/', $post->post_content ) ) {
			$content = strip_tags( strip_shortcodes( $content ) );
			$content = trim( $content );

			if ( strlen( $content ) > $length ) {
				$content = mb_substr( $content, 0, $length );
				$content.= '...';
			}

			return sprintf( '<p>%s</p>', $content );
		}
	}

	return $content;
}


function royal_custom_posts_shortcode_params( $args ) {
	$args['params'] = array(
		array(
			'type'        => 'textfield',
			'heading'     => __( 'Widget Title', 'royal' ),
			'param_name'  => 'title',
			'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'royal' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => __( 'Category', 'royal' ),
			'param_name'  => 'category',
			'description' => __( 'Enter the category\'s slug that will be used to filter posts', 'royal' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => __( 'Tag', 'royal' ),
			'param_name'  => 'tag',
			'description' => __( 'Enter the tag\'s slug that will be used to filter posts', 'royal' )
		),
		array(
			'type'       => 'dropdown',
			'heading'    => __( 'Layout', 'royal' ),
			'param_name' => 'layout',
			'value'      => array(
				__( 'Grid', 'royal' ) => 'grid',
				__( 'List', 'royal' ) => 'list'
			)
		),
		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Grid Columns', 'royal' ),
			'param_name'  => 'grid_columns',
			'description' => __( 'The number of columns for grid and grid masonry layout', 'royal' ),
			'value'       => array(
				__( '2 Columns', 'royal' ) => 2,
				__( '3 Columns', 'royal' ) => 3,
				__( '4 Columns', 'royal' ) => 4
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Thumbnail Size', 'royal' ),
			'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'royal' ),
			'param_name'  => 'thumbnail_size'
		),
		array(
			'type'        => 'textfield',
			'heading'     => __( 'Limit', 'royal' ),
			'param_name'  => 'limit',
			'description' => __( 'The number of posts will be shown', 'royal' ),
			'value'       => 9
		),
		array(
			'type'        => 'textfield',
			'heading'     => __( 'Offset', 'royal' ),
			'param_name'  => 'offset',
			'description' => __( 'The number of posts to pass over', 'royal' ),
			'value'       => 0
		),
		array(
			'type'       => 'dropdown',
			'heading'    => __( 'Icon For Posts', 'royal' ),
			'param_name' => 'icon',
			'value'      => array(
				__( 'Post Thumbnail', 'royal' ) => 'post-thumbnail',
				__( 'Post Date', 'royal' ) => 'post-date'
			)
		),
		array(
			'type'       => 'checkbox',
			'heading'    => __( 'Hide Post Content', 'royal' ),
			'param_name' => 'hide_content',
			'value'      => array(
				__( 'Yes, please', 'royal' ) => 'yes'
			)
		),
		array(
			'type'       => 'textfield',
			'heading'    => __( 'Post Content Length', 'royal' ),
			'param_name' => 'content_length',
			'value'      => 40
		),
		array(
			'type'       => 'checkbox',
			'heading'    => __( 'Hide Read More', 'royal' ),
			'param_name' => 'hide_readmore',
			'value'      => array(
				__( 'Yes, please', 'royal' ) => 'yes'
			)
		),
		array(
			'type'       => 'textfield',
			'heading'    => __( 'Read More Text', 'royal' ),
			'param_name' => 'readmore_text',
			'value'      => __( 'Continue &rarr;', 'royal' )
		),

		array(
			'type'        => 'textfield',
			'heading'     => __( 'Extra class name', 'royal' ),
			'param_name'  => 'class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'royal' )
		),

		array(
			'type'       => 'css_editor',
			'param_name' => 'css',
			'group'      => __( 'Design Options', 'royal' )
		)
	);

	return $args;
}