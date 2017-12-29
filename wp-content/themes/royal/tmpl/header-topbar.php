<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

$topbar_text  = royal_option( 'header__topbar__text' );
$topbar_menu_args = array(
	'theme_location' => 'top',
	'menu_class'     => 'menu menu-top',
	'container'       => false,
	'fallback_cb'     => false,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0
);
?>

	<div id="site-topbar" class="site-topbar">
		<div class="site-topbar-inner wrap">
			
			<?php if ( ! empty( $topbar_text ) ): ?>
				<div class="topbar-text">
					<div class="topbar-text-inner">
						<?php echo wp_kses_post( $topbar_text ) ?>
					</div>
				</div>
				<!-- /.topbar-text -->
			<?php endif ?>

			<?php royal_social_icons( array( 'location' => 'top' ) ) ?>

			<?php if ( has_nav_menu( 'top' ) ): ?>
				<div class="topbar-menu">
					<div class="topbar-menu-inner">
						<?php wp_nav_menu( $topbar_menu_args ) ?>
					</div>
				</div>
				<!-- /.topbar-menu -->
			<?php endif ?>
		</div>
	</div>
