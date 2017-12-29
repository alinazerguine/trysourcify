<?php

function royal_setup_metaboxes() {
	global $wp_registered_sidebars;

	if ( function_exists( 'acf_add_local_field_group' ) ) {
		$custom_sidebars = (array) get_option( wp_get_theme()->Template . '_sidebars' );
		$custom_sidebars = array_merge($wp_registered_sidebars, $custom_sidebars);
		$custom_sidebars_options = array();
		$custom_sidebars_options['default'] = __( 'Use Theme Default', 'royal' );

		foreach ($custom_sidebars as $id => $sidebar) {
			$custom_sidebars_options[$id] = $sidebar['name'];
		}


		acf_add_local_field_group(array(
			'key'    => 'page_options',
			'title'  => 'Page Options',
			'fields' => array(
				array(
					'placement'         => 'top',
					'endpoint'          => 0,
					'key'               => 'tab_titlebar',
					'label'             => 'Title Bar',
					'name'              => '',
					'type'              => 'tab',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
				),
				array(
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'key' => 'field_58818775e6ea3',
					'label' => 'Title',
					'name' => 'title',
					'type' => 'text',
					'instructions' => 'Enter the custom title you want to show on the title bar.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
				),
				array(
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'key' => 'field_5881883f23376',
					'label' => 'Subtitle',
					'name' => 'subtitle',
					'type' => 'text',
					'instructions' => 'Enter the custom title you want to show on the title bar.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
				),
				array(
					'placement'         => 'top',
					'endpoint'          => 0,
					'key'               => 'tab_layout',
					'label'             => 'Layout',
					'name'              => '',
					'type'              => 'tab',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
				),
				array (
					'key'               => 'field_58d3e98acc8f9',
					'label'             => 'Sidebar Position',
					'name'              => 'sidebarPosition',
					'type'              => 'radio',
					'instructions'      => 'Select the position of the primary sidebar for the current page/post.',
					'choices'           => array (
						'default' => 'Use Theme Settings',
						'none'    => 'No Sidebar',
						'left'    => 'Left',
						'right'   => 'Right'
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'default',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array (
					'key' => 'field_58d3ec0ecc8fa',
					'label' => 'Custom Widgets Area',
					'name' => 'sidebar',
					'type' => 'select',
					'instructions' => 'Select the custom widgets area that will replace the primary sidebar area for this page/post.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices'       => $custom_sidebars_options,
					'default_value' => array('default'),
					'allow_null'    => 0,
					'multiple'      => 0,
					'ui'            => 0,
					'ajax'          => 0,
					'return_format' => 'value',
					'placeholder'   => '',
				)
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'post',
					),
				),
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'page',
					),
				),
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'wpcf7_contact_form',
					),
				),
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'nproject',
					),
				),
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'nproject',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => 1,
			'description'           => '',
		));
	}
}
add_action( 'init', 'royal_setup_metaboxes' );


function royal_override_sidebar_position( $position ) {
	$object = get_post();

	if ( is_singular() && isset( $object->ID ) && function_exists( 'get_field' ) ) {
		$sidebar_position = get_field('sidebarPosition', $object->ID);

		if ( ! empty( $sidebar_position ) && $sidebar_position != 'default' ) {
			$position = $sidebar_position;
		}
	}

	return $position;
}
add_filter( 'royal_sidebar_position', 'royal_override_sidebar_position', 99 );


function royal_override_sidebar_id( $id ) {
	$object = get_queried_object();

	if ( isset( $object->ID ) && function_exists( 'get_field' ) ) {
		$sidebar = get_field('sidebar', $object->ID);
		
		if ( ! empty( $sidebar ) && $sidebar != 'default' ) {
			$id = $sidebar;
		}
	}

	return $id;
}
add_filter( 'royal_sidebar_id', 'royal_override_sidebar_id', 99 );
