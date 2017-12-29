<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

$next_post = get_next_post();
$prev_post = get_previous_post();
$post_type = get_post_type_object( get_post()->post_type );

if ( ! $next_post && ! $prev_post ) {
	return;
}
?>

<nav class="navigation post-navigation" role="navigation">
	<ul class="nav-links">
		<?php if ( is_attachment() ): ?>
			<?php previous_post_link( '<li>%link</li>', sprintf( '<span class="meta-nav">%s</span> %%title', esc_html__( 'Published In', 'royal' ) ) ); ?>
		<?php else: ?>

			<?php if ( $prev_post ): ?>
				<li class="prev-post">
					<h6>
						<a href="<?php echo get_permalink( $prev_post ) ?>">
							<div class="link-inner">
								<span class="post-title"><?php echo wp_kses_post( $prev_post->post_title ) ?></span>
							</div>
						</a>
					</h6>
				</li>
			<?php else: ?>
				<li class="prev-post disabled">
					<h6>
						<span class="meta-nav"><?php echo sprintf( esc_html__( 'Previous %s', 'royal' ), $post_type->labels->singular_name ) ?></span>
					</h6>
				</li>
			<?php endif ?>

			<li class="go-back">
				<a href="<?php echo get_post_type_archive_link( get_post()->post_type ) ?>">
					<i class="sl-options"></i>
				</a>
			</li>

			<?php if ( $next_post ): ?>
				<li class="next-post">
					<h6>
						<a href="<?php echo get_permalink( $next_post ) ?>">
							<div class="link-inner">
								<span class="post-title"><?php echo wp_kses_post( $next_post->post_title ) ?></span>
							</div>
						</a>
					</h6>
				</li>
			<?php else: ?>
				<li class="next-post disabled">
					<h6>
						<span class="meta-nav"><?php echo sprintf( esc_html__( 'Next %s', 'royal' ), $post_type->labels->singular_name ) ?></span>
					</h6>
				</li>
			<?php endif ?>

		<?php endif; ?>
	</ul><!-- .nav-links -->
</nav><!-- .navigation -->