<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();
?>
	
	<div class="post-video">
		<?php if ( ! is_single() ): ?>
			<div class="post-video-thumbnail">
				<?php if ( has_post_thumbnail() ): ?>
					<a href="<?php echo esc_url( get_permalink() ) ?>">
						<?php
							$image = royal_get_image_resized( array( 'post_id' => get_the_ID(), 'size' => royal_option( 'blog__archive__imagesize' ) ) );
							echo wp_kses_post( $image['thumbnail'] );
						?>
					</a>
				<?php else: ?>
					<a href="<?php echo esc_url( get_permalink() ) ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/blank-image.png' ) ?>" />
					</a>
				<?php endif ?>
			</div>
		<?php else: ?>
			<div class="post-video-player">
				<?php echo wp_oembed_get( get_post_meta( get_the_ID(), '_post_video_oembed', true ), array( 'width' => '760' ) ); ?>
			</div>
		<?php endif ?>

		<div class="post-date">
			<span class="post-month"><?php echo esc_html( get_the_date( 'M' ) ) ?></span>
			<span class="post-day"><?php echo esc_html( get_the_date( 'd' ) ) ?></span>
			<span class="post-year"><?php echo esc_html( get_the_date( 'Y' ) ) ?></span>
		</div>
	</div>
