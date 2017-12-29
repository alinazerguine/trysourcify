<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();
?>

	<?php get_header() ?>
		<div class="content">
			<div class="heading-404">
				<span><?php _ex( '404', 'frontend', 'royal' ) ?></span>
				<h3><?php _ex( 'Looks Like Something Went Wrong!', 'frontend', 'royal' ) ?></h3>
				<p><?php _ex( 'The page you were looking for is not here. Maybe you want to perform a search?', 'frontend', 'royal' ); ?></p>
			</div>
			<div class="content-404">
				<?php get_search_form(); ?>
			</div>
		</div>
		<!-- /.content-inner -->
	<?php get_footer() ?>
