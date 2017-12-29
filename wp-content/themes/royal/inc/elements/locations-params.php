<?php
return array(
	'name'     => __('LineThemes: Locations', 'royal'),
	'base'     => 'locations',
	'category' => 'LineThemes',
	'params'   => array(
		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Maps Type', 'royal' ),
			'description' => __( 'Select the Maps type', 'royal' ),
			'group'       => __( 'Maps Settings', 'royal' ),
			'param_name'  => 'type',
			'std'         => 'roadmap',
			'value'       => array(
				'ROADMAP'   => 'roadmap',
				'SATELLITE' => 'satellite',
				'HYBRID'    => 'hybrid',
				'TERRAIN'   => 'terrain'
			)
		),

		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Maps Style', 'royal' ),
			'description' => __( 'Select style for the Maps', 'royal' ),
			'group'       => __( 'Maps Settings', 'royal' ),
			'param_name'  => 'style',
			'std'         => 'default',
			'value'       => array(
				'Default'          => 'default',
				'Subtle Grayscale' => 'subtle-grayscale',
				'Pale Dawn'        => 'pale-dawn',
				'Blue Water'       => 'blue-warter',
				'Light Monochrome' => 'light-monochrome',
				'Shades of Gray'   => 'shades-of-gray'
			)
		),

		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Zoom Level', 'royal' ),
			'group'       => __( 'Maps Settings', 'royal' ),
			'param_name'  => 'zoomlevel',
			'description' => __( 'Select the default zoom level for the Maps', 'royal' ),
			'value'       => array_combine( range( 1, 24 ), range( 1, 24 ) ),
			'std'         => 15
		),

		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Enable Zoom On Mouse Scroll', 'royal' ),
			'description' => __( 'If select "yes", the maps will zoom in/out when user scroll the mouse', 'royal' ),
			'group'       => __( 'Maps Settings', 'royal' ),
			'param_name'  => 'zoomable',
			'std'         => 'yes',
			'value'       => array(
				__( 'No', 'royal' )  => 'no',
				__( 'Yes', 'royal' ) => 'yes'
			)
		),

		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Enable Draggable', 'royal' ),
			'group'       => __( 'Maps Settings', 'royal' ),
			'param_name'  => 'draggable',
			'std'         => 'yes',
			'value'       => array(
				__( 'No', 'royal' )  => 'no',
				__( 'Yes', 'royal' ) => 'yes'
			)
		),

		array(
			'type'       => 'textfield',
			'heading'    => __( 'Height', 'royal' ),
			'group'      => __( 'Maps Settings', 'royal' ),
			'param_name' => 'height',
			'std'        => 300
		),

		array(
			'description' => __( 'Controls the locations you want to show on the maps.', 'royal' ),
			'group'       => __( 'Locations', 'royal' ),
			'type'        => 'param_group',
			'param_name'  => 'locations',
			'params'      => array(
				array(
					'type'        => 'attach_image',
					'param_name'  => 'marker',
					'heading'     => __( 'Marker Image', 'royal' ),
					'description' => __( 'Select the image you want to show as the maps marker.', 'royal' )
		        ),

		        array(
					'type'        => 'textfield',
					'heading'     => __( 'Address', 'royal' ),
					'param_name'  => 'address',
					'description' => __( 'Enter you address that will show at the center of the Maps', 'royal' ),
					'admin_label' => true
				),

				array(
					'type'        => 'textarea',
					'heading'     => __( 'Information Content', 'royal' ),
					'param_name'  => 'content'
				)
			)
		)
	)
);
