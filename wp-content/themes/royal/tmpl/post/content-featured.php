<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

$post_permalink = get_permalink();
$post_target    = '_self';
$post_image     = royal_get_image_resized( array(
	'post_id' => get_the_ID(),
	'size'    => royal_option( 'blog__archive__imagesize' ),
	'crop'    => royal_option( 'blog__archive__imagesizeCrop' ) == 'crop'
) );

if ( get_post_format() == 'link' ) {
	$post_permalink = get_post_meta( get_the_ID(), '_post_link', true );
	$post_target    = get_post_meta( get_the_ID(), '_post_link_target', true );
}
?>
	
	<div class="post-image">		
		<?php if ( has_post_thumbnail() ): ?>
			<?php get_template_part( 'tmpl/post/content-meta' ) ?>
			<a class="featured-image" href="<?php echo esc_url( $post_permalink ) ?>" target="<?php echo esc_attr( $post_target ) ?>">
				<?php echo wp_kses_post( $post_image['thumbnail'] ); ?>
			</a>
		<?php endif ?>
	</div>
