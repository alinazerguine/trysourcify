<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

add_filter( 'royal_body_class', 'royal_woocommerce_body_class' );
add_filter( 'royal_sidebar_id', 'royal_woocommerce_sidebar' );
add_filter( 'royal_sidebar_position', 'royal_woocommerce_sidebar_position' );
?>

	<?php get_header() ?>
		<div class="content">
			<?php woocommerce_content() ?>
		</div>
	<?php get_footer() ?>
