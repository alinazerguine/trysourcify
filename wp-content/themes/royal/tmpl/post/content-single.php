<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

$featured_background_types = (array) royal_option( 'header__titlebar__backgroundFeatured' );
$current_post_type         = royal_current_post_type();
$show_featured_image       = ! in_array( $current_post_type, $featured_background_types ) && has_post_thumbnail();
?>
<style>
	.site-header-classic.header-transparent{
		position: relative!important;
		background-image: url(http://localhost/wordpress/wp-content/uploads/2017/12/bg.png?id=545) !important;
		background-position: center !important;
		background-repeat: no-repeat !important;
		background-size: cover !important;
	}
	.post-custom{
		margin-top: 50px;
	}
</style>
	<div id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
		<div class="post-inner post-custom">
			<?php //if ( $show_featured_image ): ?>
				<div class="post-thumbnail">
					<?php the_post_thumbnail( 'post-thumbnail' ) ?>
				</div>
				<!-- /.post-thumbnail -->
			<?php //endif ?>

			<div class="post-header">
				<div class="post-avatar">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?>
				</div>
				<h6 class="post-date-author">
					<span class="post-month"><?php echo esc_html( get_the_date( 'M' ) ) ?></span>
					<span class="post-day"><?php echo esc_html( get_the_date( 'd' ) ) ?></span>
					<span class="post-year"><?php echo esc_html( get_the_date( 'Y' ) ) ?></span>
					<span><?php esc_html_e( 'By', 'royal' ); ?></span>
					<span><?php the_author_posts_link() ?></span>
				</h6>

				<?php if ( $show_featured_image ): ?>
					<h2 class="post-title" itemprop="headline">
						<?php the_title(); ?>
					</h2>
				<?php endif ?>

				<?php if ( royal_option( 'blog__single__postMeta' ) == 'on' ): ?>
					<div class="post-meta">
						<h6 class="post-categories">
							<?php the_category( _x( ', ', 'Used between list items, there is a space after the comma.', 'royal' ) ) ?>
						</h6>
					</div>
				<?php endif ?>
			</div>

			<div class="post-content" itemprop="text">

				<div class="post-content-inner">
					<?php the_content() ?>
				</div>
				<!-- /.post-content-inner -->

				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'royal' ),
						'after'  => '</div>',
					) );
				?>

				<?php if ( royal_option( 'blog__single__postTags' ) == 'on' ): ?>
					<div class="post-tags">
						<?php the_tags( '', ' ' ); ?>
					</div>
				<?php endif ?>

				<?php if ( royal_option( 'blog__single__postAuthor' ) == 'on' ): ?>
					<?php get_template_part( 'tmpl/post/content-author' ) ?>
				<?php endif ?>

			</div>
			<!-- /.post-content -->

		</div>
		<!-- /.post-inner -->
	</div>
	<!-- /#post-<?php echo get_the_ID() ?> -->
