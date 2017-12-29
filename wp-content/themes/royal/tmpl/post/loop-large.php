<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();
?>
	
	<div class="content" role="main" itemprop="mainContentOfPage">
		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ): the_post(); ?>
				<div id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
					<div class="post-inner">
						<div class="post-header">
							<?php get_template_part( 'tmpl/post/content-title' ) ?>
							<h6>
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
								<div class="post-date">
									<span class="post-month"><?php echo esc_html( get_the_date( 'M' ) ) ?></span>
									<span class="post-day"><?php echo esc_html( get_the_date( 'd' ) ) ?></span>
								    <span class="post-year"><?php echo esc_html( get_the_date( 'Y' ) ) ?></span>
								</div>
								<div class="post-author">
									<span><?php esc_html_e( 'By', 'royal' ); ?></span>
									<span><?php the_author_posts_link() ?></span>
								</div>
							</h6>
						</div>
						<?php get_template_part( 'tmpl/post/content-featured', get_post_format() ) ?>
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
					</div>
				</div>
			<?php endwhile ?>

			<?php royal_pagination() ?>
		<?php else: ?>
			<?php get_template_part( 'tmpl/post/content-none' ) ?>
		<?php endif ?>
	</div>
	<!-- /.content -->
			