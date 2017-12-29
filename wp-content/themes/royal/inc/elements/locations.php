<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

// Map the shortcode paramters
vc_lean_map( 'locations', null, get_theme_file_path( 'inc/elements/locations-params.php' ) );

class WPBakeryShortCode_Locations extends WPBakeryShortCode
{
	protected function content( $atts, $content = '' ) {
		if ( isset( $atts['locations'] ) ) {
			$locations = json_decode( urldecode( $atts['locations'] ), true );

			foreach ($locations as $index => $location) {
				if ( is_numeric( $location['marker'] ) ) {
					$image = wp_get_attachment_image_src( $location['marker'] );
					$locations[ $index ]['marker'] = $image[0];
					$locations[ $index ]['content'] = wpautop( $location['content'] );
				}
			}

			$atts['locations'] = json_encode( $locations );
		}

		wp_enqueue_script( 'line-shortcode-maps-api' );
		printf( '<div class="elm-google-maps" data-options="%s" style="height: %dpx"></div>',
			esc_attr( json_encode( $atts ) ),
			esc_attr( $atts['height'] )
		);
	}
}
