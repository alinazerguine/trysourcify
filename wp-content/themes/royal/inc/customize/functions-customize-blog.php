<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

add_filter( 'royal_customize_containers', 'royal_customize_blog_containers' );
add_filter( 'royal_customize_settings', 'royal_customize_blog_settings' );

add_filter( 'royal_customize_controls', 'royal_customize_blog_archive' );
add_filter( 'royal_customize_controls', 'royal_customize_blog_single' );
add_filter( 'royal_customize_controls', 'royal_customize_blog_author' );
add_filter( 'royal_customize_controls', 'royal_customize_blog_related' );


function royal_customize_blog_containers( $containers ) {
	$containers['blog'] = array(
		'type'            => 'panel',
		'title'           => __( 'Blog & Post', 'royal' )
	);
	$containers['blogArchive'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => __( 'Blog Settings', 'royal' ),
		'description' => __( 'Select the style of blog posts that will appearing on the archive page', 'royal' )
	);
	$containers['blogSingle'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => __( 'Post Settings', 'royal' )
	);
	$containers['blogAuthor'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => __( 'Author Box', 'royal' ),
	);
	$containers['blogRelated'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => __( 'Related Posts', 'royal' ),
	);

	return $containers;
}


function royal_customize_blog_settings( $settings ) {
	$settings['blog__archive__style']           = array( 'default' => 'large' );
	$settings['blog__archive__columns']         = array( 'default' => 3 );
	$settings['blog__archive__gridGutter']      = array( 'default' => 60 );
	$settings['blog__archive__imagesize']       = array( 'default' => 'full' );
	$settings['blog__archive__imagesizeCrop']   = array( 'default' => 'crop' );
	$settings['blog__archive__autoExcerpt']     = array( 'default' => 'off' );
	$settings['blog__archive__excerptLength']   = array( 'default' => '40' );
	$settings['blog__archive__postMeta']        = array( 'default' => 'on' );
	$settings['blog__archive__readmore']        = array( 'default' => 'on' );
	$settings['blog__archive__sidebar']         = array( 'default' => 'primary' );
	$settings['blog__archive__sidebarPosition'] = array( 'default' => 'left' );
	
	$settings['blog__single__postMeta']        = array( 'default' => 'on' );
	$settings['blog__single__postTags']        = array( 'default' => 'on' );
	$settings['blog__single__postNav']         = array( 'default' => 'on' );
	$settings['blog__single__postAuthor']      = array( 'default' => 'on' );
	$settings['blog__single__relatedPosts']    = array( 'default' => 'on' );
	$settings['blog__single__sidebar']         = array( 'default' => 'primary' );
	$settings['blog__single__sidebarPosition'] = array( 'default' => 'left' );
	
	$settings['blog__author__background'] = array( 'default' => array() );
	$settings['blog__related__title']     = array( 'default' => 'Related Posts' );
	$settings['blog__related__type']      = array( 'default' => 'category' );
	$settings['blog__related__count']     = array( 'default' => '3' );

	return $settings;
}


function royal_customize_blog_archive( $controls ) {
	$controls['blog__archive__style'] = array(
		'type' => 'radio-buttons',
		'section' => 'blogArchive',
		'default' => 'grid',
		'choices' => array(
			'grid'   => __( 'Grid', 'royal' ),
			'masonry'   => __( 'Masonry', 'royal' ),
			'medium' => __( 'Medium', 'royal' ),
			'large'  => __( 'Large', 'royal' )
		)
	);
	$controls['blog__archive__columns'] = array(
		'type' => 'radio-buttons',
		'label'   => __( 'Grid Columns', 'royal' ),
		'section' => 'blogArchive',
		'choices' => array(
			2 => 2,
			3 => 3,
			4 => 4,
			5 => 5
		)
	);
	$controls['blog__archive__gridGutter'] = array(
		'type'        => 'textfield',
		'section'     => 'blogArchive',
		'label'       => esc_html__( 'Grid Column Spacing (px)', 'royal' ),
	);
	$controls['blog__archive__imagesize'] = array(
		'type'        => 'textfield',
		'section'     => 'blogArchive',
		'label' => esc_html__( 'Image Size', 'royal' ),
		'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'royal' )
	);
	$controls['blog__archive__imagesizeCrop'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'blogArchive',
		'choices'     => array(
			'crop' => __('Hard Crop', 'royal'),
			'none' => __('None', 'royal')
		)
	);
	$controls['blog__archive__postMeta'] = array(
		'type'    => 'radio-onoff',
		'label'   => __( 'Show Post Meta', 'royal' ),
		'section' => 'blogArchive',
		'default' => 'on'
	);
	$controls['blog__archive__readmore'] = array(
		'type'    => 'radio-onoff',
		'label'   => __( 'Show Read More', 'royal' ),
		'section' => 'blogArchive',
		'default' => 'on'
	);
	$controls['blog__archive__autoExcerpt'] = array(
		'type'    => 'radio-onoff',
		'label'   => __( 'Auto Post Excerpt', 'royal' ),
		'section' => 'blogArchive',
		'default' => 'off'
	);

	$controls['blog__archive__excerptLength'] = array(
		'type'    => 'textfield',
		'label'   => __( 'Post Excerpt Length', 'royal' ),
		'section' => 'blogArchive',
		'default' => 40
	);

	/**
	 * Sidebar settings
	 */
	$controls['blog__archive__sidebar'] = array(
		'type'    => 'dropdown',
		'section' => 'blogArchive',
		'label'   => __( 'Sidebar', 'royal' ),
		'choices' => 'royal_customize_dropdown_sidebars'
	);
	$controls['blog__archive__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'blogArchive',
		'label'   => __( 'Sidebar Position', 'royal' ),
		'choices' => array(
			'none' => __( 'No Sidebar', 'royal' ),
			'left'       => __( 'Left', 'royal' ),
			'right'      => __( 'Right', 'royal' )
		)
	);
	
	
	return $controls;
}


function royal_customize_blog_single( $controls ) {
	$controls['blog__single__postMeta'] = array(
		'type'    => 'radio-onoff',
		'label'   => __( 'Show Post Meta', 'royal' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__postTags'] = array(
		'type'    => 'radio-onoff',
		'label'   => __( 'Show Post Tags', 'royal' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__postNav'] = array(
		'type'    => 'radio-onoff',
		'label'   => __( 'Show Post Navigator', 'royal' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__postAuthor'] = array(
		'type'    => 'radio-onoff',
		'label'   => __( 'Show Post Author', 'royal' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__relatedPosts'] = array(
		'type'    => 'radio-onoff',
		'label'   => __( 'Show Related Posts', 'royal' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);

	/**
	 * Sidebar settings
	 */
	$controls['blog__single__sidebar'] = array(
		'type'    => 'dropdown',
		'section' => 'blogSingle',
		'label'   => __( 'Sidebar', 'royal' ),
		'choices' => 'royal_customize_dropdown_sidebars'
	);
	$controls['blog__single__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'blogSingle',
		'label'   => __( 'Sidebar Position', 'royal' ),
		'choices' => array(
			'none'    => __( 'No Sidebar', 'royal' ),
			'left'  => __( 'Left', 'royal' ),
			'right' => __( 'Right', 'royal' )
		)
	);
	
	
	return $controls;
}


function royal_customize_blog_author( $controls ) {
	$controls['blog__author__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'blogAuthor',
		'title'       => __( 'Background', 'royal' ),
		'description' => __( 'Custom background option for the author box', 'royal' ),
		'class'       => 'no-border'
	);
	$controls['blog__author__background'] = array(
		'type'    => 'background',
		'section' => 'blogAuthor',
		'default' => ''
	);

	return $controls;
}


function royal_customize_blog_related( $controls ) {
	$controls['blog__related__title'] = array(
		'type'    => 'textfield',
		'label'   => __( 'Widget Title', 'royal' ),
		'section' => 'blogRelated',
		'default' => __( 'Related Posts', 'royal' )
	);

	$controls['blog__related__type'] = array(
		'type' => 'dropdown',
		'section' => 'blogRelated',
		'label' => __( 'Show Related Posts Based On', 'royal' ),
		'default' => 'tag',
		'choices' => array(
			'tag'      => __( 'Tag', 'royal' ),
			'category' => __( 'Category', 'royal' ),
			'random'   => __( 'Random', 'royal' ),
			'recent'   => __( 'Recent', 'royal' )
		)
	);

	$controls['blog__related__count'] = array(
		'type'    => 'spinner',
		'section' => 'blogRelated',
		'label'   => __( 'Number Of Related Posts', 'royal' ),
		'min'     => 1,
		'default' => 4
	);

	return $controls;
}
