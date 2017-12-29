<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

add_filter( 'royal_customize_containers', 'royal_customize_projects_containers' );
add_filter( 'royal_customize_controls', 'royal_customize_projects_controls' );
add_filter( 'royal_customize_controls', 'royal_customize_single_project_controls' );
add_filter( 'royal_customize_controls', 'royal_customize_project_related' );
add_filter( 'royal_customize_settings', 'royal_customize_projects_settings' );


function royal_customize_projects_containers( $containers ) {
	$containers['projects'] = array(
		'type'        => 'panel',
		'title'       => esc_html__( 'Projects', 'royal' ),
		'description' => ''
	);

	$containers[ 'projectsList' ] = array(
		'type'  => 'section',
		'title'       => esc_html__( 'Project Archive', 'royal' ),
		'description' => '',
		'panel'       => 'projects'
	);

	$containers[ 'projectsSingle' ] = array(
		'type'  => 'section',
		'title'       => esc_html__( 'Project Single', 'royal' ),
		'description' => '',
		'panel'       => 'projects'
	);

	$containers[ 'projectsRelated' ] = array(
		'type'  => 'section',
		'title'       => esc_html__( 'Related Projects', 'royal' ),
		'description' => '',
		'panel'       => 'projects'
	);

	return $containers;
}


function royal_customize_projects_controls( $controls ) {
	$controls['projects__displayMode'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'description' => esc_html__( 'Controls the layout for the projects pages.', 'royal' ),
		'choices'     => array(
			'grid-alt'  => esc_html__( 'Grid Titte', 'royal' ),
			'grid'      => esc_html__( 'Grid', 'royal' ),
			'masonry'   => esc_html__( 'Masonry', 'royal' )
		)
	);

	$controls['projects__gridColumns'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Grid Columns', 'royal' ),
		'choices'     => array( 2 => 2, 3 => 3, 4 => 4, 5 => 5 )
	);
	$controls['projects__gridGutter'] = array(
		'type'        => 'textfield',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Grid Column Spacing (px)', 'royal' ),
	);
	$controls['projects__imagesize'] = array(
		'type'        => 'textfield',
		'section'     => 'projectsList',
		'label' => esc_html__( 'Image Size', 'royal' ),
		'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'royal' )
	);
	$controls['projects__imagesizeCrop'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'choices'     => array(
			'crop' => __('Hard Crop', 'royal'),
			'none' => __('None', 'royal')
		)
	);

	$controls['projects__filterable'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Enable Projects Filterable', 'royal' ),
	);
	$controls['projects__filterableType'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Filterable Type', 'royal' ),
		'choices'     => array(
			'nproject-tag'      => esc_html__( 'Tag', 'royal' ),
			'nproject-category' => esc_html__( 'Category', 'royal' )
		)
	);
	$controls['projects__filterableAlign'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'label'       => _x( 'Filterable Alignment', 'customize', 'royal' ),
		'description' => _x( '', 'customize', 'royal' ),
		'choices'     => array(
			'left'    => _x( 'Left', 'customize', 'royal' ),
			'center'  => _x( 'Center', 'customize', 'royal' ),
			'right'   => _x( 'Right', 'customize', 'royal' )
		)
	);

	$controls['projects__excerpt'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Show Summary Text', 'royal' ),
	);
	$controls['projects__autoExcerptLength'] = array(
		'type'        => 'textfield',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Summary Text Length', 'royal' ),
	);

	$controls['projects__readmore'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Show Readmore Button', 'royal' ),
	);


	// Sidebar section
	$controls['projects__sidebarHeading'] = array(
		'type'        => 'heading',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Sidebar', 'royal' ),
	);
	$controls['projects__sidebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'projectsList',
		'choices'     => 'royal_customize_dropdown_sidebars'
	);

	$controls['projects__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'projectsList',
		'label'   => esc_html__( 'Sidebar Position', 'royal' ),
		'choices' => array(
			'none'  => esc_html__( 'No Sidebar', 'royal' ),
			'left'  => esc_html__( 'Left', 'royal' ),
			'right' => esc_html__( 'Right', 'royal' )
		)
	);

	return $controls;
}


function royal_customize_single_project_controls( $controls ) {
	$controls['project__pagination'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsSingle',
		'label'       => __( 'Show Post Navigator', 'royal' ),
	);
	$controls['project__author'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsSingle',
		'label'       => __( 'Show Post Author', 'royal' ),
	);
	$controls['project__tags'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsSingle',
		'label'       => __( 'Show Project Tags', 'royal' ),
	);
	$controls['project__related'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsSingle',
		'label'       => __( 'Show Related Posts', 'royal' ),
	);
	$controls['project__galerryMode'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsSingle',
		'label'       => __( 'Gallery Styles', 'royal' ),
		'choices'     => array(
			'list'   => __( 'List', 'royal' ),
			'slider' => __( 'Slider', 'royal' ),
			'grid'   => __( 'Grid', 'royal' )
		)
	);

	$controls['project__galleryColumns'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsSingle',
		'label'       => __( 'Gallery Columns', 'royal' ),
		'choices'     => array(
			2 => 2,
			3 => 3,
			4 => 4,
			5 => 5,
		)
	);
	$controls['project__galleryPosition'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsSingle',
		'label'       => __( 'Gallery Position', 'royal' ),
		'choices'     => array(
			'top'    => __( 'Top', 'royal' ),
			'right'  => __( 'Right', 'royal' ),
			'bottom' => __( 'Bottom', 'royal' ),
			'left'   => __( 'Left', 'royal' )
		)
	);

	// Sidebar section
	$controls['project__sidebarHeading'] = array(
		'type'        => 'heading',
		'section'     => 'projectsSingle',
		'label'       => __( 'Sidebar', 'royal' ),
	);
	$controls['project__sidebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'projectsSingle',
		'choices'     => 'royal_customize_dropdown_sidebars'
	);

	$controls['project__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'projectsSingle',
		'label'   => __( 'Sidebar Position', 'royal' ),
		'choices' => array(
			'none'  => __( 'No Sidebar', 'royal' ),
			'left'  => __( 'Left', 'royal' ),
			'right' => __( 'Right', 'royal' )
		)
	);

	return $controls;
}


function royal_customize_projects_settings( $settings ) {
	$settings['projects__displayMode']     = array( 'default' => 'grid' );
	$settings['projects__gridColumns']     = array( 'default' => 3 );
	$settings['projects__gridGutter']      = array( 'default' => 20 );
	$settings['projects__imagesize']       = array( 'default' => 'full' );
	$settings['projects__imagesizeCrop']   = array( 'default' => 'crop' );
	
	$settings['projects__filterable']        = array( 'default' => 'on' );
	$settings['projects__filterableAlign']   = array( 'default' => 'left' );
	$settings['projects__filterableType']    = array( 'default' => 'nproject-tag' );
	$settings['projects__excerpt']           = array( 'default' => 'on' );
	$settings['projects__autoExcerpt']       = array( 'default' => 'on' );
	$settings['projects__autoExcerptLength'] = array( 'default' => '12' );
	$settings['projects__readmore']          = array( 'default' => 'on' );
	$settings['projects__sidebar']           = array( 'default' => 'primary' );
	$settings['projects__sidebarPosition']   = array( 'default' => 'right' );

	$settings['project__pagination']      = array( 'default' => 'on' );
	$settings['project__author']          = array( 'default' => 'on' );
	$settings['project__related']         = array( 'default' => 'on' );
	$settings['project__galerryMode']     = array( 'default' => 'grid' );
	$settings['project__galleryColumns']  = array( 'default' => 3 );
	$settings['project__galleryPosition'] = array( 'default' => 'top' );
	$settings['project__sidebar']         = array( 'default' => 'primary' );
	$settings['project__sidebarPosition'] = array( 'default' => 'left' );
	$settings['project__tags']            = array( 'default' => 'on' );

	$settings['project__related__title']            = array( 'default' => 'Related Posts' );
	$settings['project__related__count']            = array( 'default' => '4' );
	$settings['projects__related__gridColumns']     = array( 'default' => 4 );
	$settings['project__related__type']             = array( 'default' => 'category' );

	return $settings;
}

function royal_customize_project_related( $controls ) {
	$controls['project__related__title'] = array(
		'type'    => 'textfield',
		'label'   => __( 'Widget Title', 'royal' ),
		'section' => 'projectsRelated',
		'default' => __( 'Related Projects', 'royal' )
	);

	$controls['project__related__count'] = array(
		'type'    => 'textfield',
		'label'   => __( 'Number of Related Projects', 'royal' ),
		'section' => 'projectsRelated',
		'default' => __( '4', 'royal' )
	);

	$controls['projects__related__gridColumns'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsRelated',
		'label'       => esc_html__( 'Grid Columns', 'royal' ),
		'choices'     => array( 2 => 2, 3 => 3, 4 => 4, 5 => 5 )
	);

	$controls['project__related__type'] = array(
		'type' => 'dropdown',
		'section' => 'projectsRelated',
		'label' => __( 'Show Related Projects Based On', 'royal' ),
		'default' => 'tag',
		'choices' => array(
			'tag'      => __( 'Tag', 'royal' ),
			'category' => __( 'Category', 'royal' ),
			'random'   => __( 'Random', 'royal' ),
			'recent'   => __( 'Recent', 'royal' )
		)
	);

	return $controls;
}
