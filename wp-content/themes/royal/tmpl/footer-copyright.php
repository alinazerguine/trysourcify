<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

$classes = array( 'footer-copyright' );
$classes[] = sprintf( 'footer-copyright-%s', royal_option( 'footer__copyright__align' ) );

if ( royal_option( 'footer__copyright__full' ) == 'on' ) {
	$classes[] = 'footer-copyright-full';
}
?>

	<?php if ( royal_option( 'footer__copyright' ) == 'on' ): ?>
		<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
			<div class="footer-copyright-inner wrap">
				<?php royal_social_icons( array( 'location' => 'footer' ) ) ?>
				<?php echo wp_kses_post( royal_option( 'footer__copyright__content' ) ) ?>
			</div>
		</div>
	<?php endif ?>