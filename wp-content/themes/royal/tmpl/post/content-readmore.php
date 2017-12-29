<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

$post_permalink = get_permalink();
$post_target    = '_self';

if ( get_post_format() == 'link' ) {
	$post_permalink = get_post_meta( get_the_ID(), '_post_link', true );
	$post_target    = get_post_meta( get_the_ID(), '_post_link_target', true );
}
?>

	<div class="read-more">
		<a href="<?php echo esc_url( $post_permalink ) ?>" target="<?php echo esc_attr( $post_target ) ?>">
			<span></span>
			<?php echo __( 'Continue Reading', 'royal' ) ?>
		</a>
	</div>
