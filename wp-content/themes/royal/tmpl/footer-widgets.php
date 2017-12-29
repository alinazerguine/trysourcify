<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

$classes = array( 'footer-widgets' );

if ( royal_option( 'footer__widgets__full' ) == 'on' ) {
	$classes[] = 'footer-widgets-full';
}

$layout = royal_option( 'footer__widgets__layout' );
$columns = $layout['columns'];
$columnsLayout = $layout['layout'][$columns];
?>

	<?php if ( royal_option( 'footer__widgets' ) == 'on' ): ?>
		<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
			<div class="footer-widgets-inner wrap">
				<div class="footer-aside-wrap">
					<?php foreach( range( 0, $columns - 1 ) as $index ): ?>
					<aside data-width="<?php echo esc_attr( $columnsLayout[$index] ) ?>">
						<?php dynamic_sidebar( sprintf( 'footer-%d', $index + 1 ) ) ?>
					</aside>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	<?php endif ?>