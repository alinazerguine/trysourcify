<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

// The menu settings
$primary_menu_args = array(
	'theme_location'  => 'primary',
	'container'       => false,
	'menu_class'      => 'menu menu-primary',
	'fallback_cb'     => false,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0
);

$secondary_menu_args = array_merge( $primary_menu_args, array(
	'theme_location' => 'secondary',
	'menu_class'     => 'menu menu-secondary'
) );

$header_nav_extras = royal_option( 'header__nav__extras' );

$header_classes = array( 'site-header site-header-classic' );
$header_classes[] = sprintf( 'header-brand-%s', royal_option( 'header__logoAlign' ) );

if ( royal_option( 'header__width' ) === 'on' ) {
	$header_classes[] = 'header-full';
}

if ( royal_option( 'header__shadow' ) === 'on' ) {
	$header_classes[] = 'header-shadow';
}

if ( royal_option( 'header__transparent' ) === 'on' ) {
	$header_classes[] = 'header-transparent';
}
?>

	<?php if ( royal_option( 'header__topbar' ) === 'on' ): ?>
		<?php get_template_part( 'tmpl/header-topbar' ); ?>
	<?php endif ?>

	<div id="site-header" class="<?php echo esc_attr( join( ' ', $header_classes ) ) ?>">
		<div class="site-header-inner wrap">
			<?php if ( is_active_sidebar( 'off-canvas-left' ) ): ?>
				<a href="javascript:;" data-target="off-canvas-left" class="off-canvas-toggle">
					<span></span>
				</a>
			<?php endif; ?>

			<div class="header-brand">
				<a href="<?php echo esc_attr( site_url() ) ?>" alt="<?php bloginfo( 'site_name' ) ?>">
					<?php royal_logo( royal_option( 'header__logo' ) ) ?>
				</a>
			</div>

			<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'secondary' ) || ! empty( $header_nav_extras ) ): ?>
				<nav class="navigator" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<?php wp_nav_menu( $primary_menu_args ) ?>
					<?php get_template_part( 'tmpl/header-sliding-toggle' ) ?>
					
					<?php if ( ! empty( $header_nav_extras ) ): ?>
						<ul class="menu menu-extras">
							<?php foreach ( $header_nav_extras as $type ): ?>
								<?php get_template_part( 'tmpl/header-icon', $type ); ?>
							<?php endforeach ?>
						</ul>
					<?php endif ?>

					<?php royal_social_icons( array( 'location' => 'nav' ) ) ?>
					
					<?php wp_nav_menu( $secondary_menu_args ) ?>
				</nav>
			<?php endif ?>

		</div>
		<!-- /.site-header-inner -->
	</div>
	<!-- /.site-header -->

	<?php if ( royal_option( 'header__sticky' ) === 'on' ): ?>
		<?php get_template_part( 'tmpl/header-sticky' ); ?>
	<?php endif ?>