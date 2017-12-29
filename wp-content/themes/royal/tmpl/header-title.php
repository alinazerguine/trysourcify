<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

$classes = array( 'content-header' );
$classes[] = sprintf( 'content-header-%s', royal_option( 'header__titlebar__align' ) );

if ( royal_option( 'header__titlebar__full' ) === 'on' ) {
	$classes[] = 'content-header-full';
}

if ( royal_option( 'header__titlebar__shadow' ) === 'on' ) {
	$classes[] = 'content-header-shadow';
}

$featured_background_types = (array) royal_option( 'header__titlebar__backgroundFeatured' );
$current_post_type         = royal_current_post_type();

if ( in_array( $current_post_type, $featured_background_types ) ) {
	$classes[] = 'content-header-featured';
}
?>

	<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?> wrap">
		<div class="content-header-inner wrap">
			<div class="wrap-inner">
				<?php if ( in_array( royal_option( 'header__titlebar' ), array( 'both', 'title' ) ) ): ?>
					<div class="page-title">
						<?php royal_header_page_title() ?>
					</div>
				<?php endif ?>

				<?php if ( function_exists( 'bcn_display' ) && in_array( royal_option( 'header__titlebar' ), array( 'both', 'breadcrumbs' ) ) ): ?>
					<div class="breadcrumbs">
						<div class="breadcrumbs-inner">
							<?php bcn_display() ?>
						</div>
					</div>
				<?php endif ?>
			</div>
		</div>

		<div class="down-arrow">
			<a href="javascript:;"><span><?php echo __( 'Scroll Down', 'royal' ) ?></span></a>
		</div>
	</div>
