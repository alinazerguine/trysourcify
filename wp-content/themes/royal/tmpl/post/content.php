<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();
?>

<style>
	.site-header-classic.header-transparent{
		position: relative!important;
		background-image: url(http://localhost/wordpress/wp-content/uploads/2017/12/bg.png?id=545) !important;
		background-position: center !important;
		background-repeat: no-repeat !important;
		background-size: cover !important;
		margin-bottom: 100px;
	}
	.post-custom{
		margin-top: 50px;
	}
</style>
	<div id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
		<div class="post-inner">
			<?php get_template_part( 'tmpl/post/content-featured', get_post_format() ) ?>
			<div class="post-boxed">
				<div class="post-header">
					<h6 class="post-date">
						<span class="post-month"><?php echo esc_html( get_the_date( 'M' ) ) ?></span>
						<span class="post-day"><?php echo esc_html( get_the_date( 'd' ) ) ?></span>
						<!--<span class="post-year"><?php echo esc_html( get_the_date( 'Y' ) ) ?></span>-->
					</h6>
					<?php get_template_part( 'tmpl/post/content-title' ) ?>
				</div>
				 
				<div class="post-content">
					<?php
						royal_the_content( false );
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'royal' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
					?>

					<?php if ( royal_option( 'blog__archive__readmore' ) === 'on' ): ?>
						<?php get_template_part( 'tmpl/post/content-readmore' ) ?>
					<?php endif ?>
				</div>

				<div class="post-footer">
					<h6 class="post-author">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
						<span><?php esc_html_e( 'By', 'royal' ); ?></span>
						<span><?php the_author_posts_link() ?></span>
					</h6>
				</div>
			</div>
		</div>
	</div>
