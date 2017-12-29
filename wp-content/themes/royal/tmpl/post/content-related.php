<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

// Query args
$args = array(
	'post_type'           => 'post',
	'posts_per_page'      => royal_option( 'blog__related__count', 5 ),
	'post__not_in'        => array( get_the_ID() ),
	'ignore_sticky_posts' => true
);

$related_item_type = royal_option( 'blog__related__type', 'category' );

// Filter by tags
if ( 'tag' == $related_item_type ) {
	if ( ! ( $terms = get_the_tags() ) )
		return;

	$args['tag__in'] = wp_list_pluck( $terms, 'term_id' );
}
// Filter by categories
elseif ( 'category' == $related_item_type ) {
	if ( ! ( $terms = get_the_category() ) )
		return;

	$args['category__in'] = wp_list_pluck( $terms, 'term_id' );
}
// Show random items
elseif ( 'random' == $related_item_type ) {
	$args['orderby'] = 'rand';
}
// Show latest items
elseif ( 'recent' == $related_item_type ) {
	$args['order'] = 'DESC';
	$args['orderby'] = 'date';
}

// Create the query instance
$query = new WP_Query( $args );
$widget_title   = royal_option( 'blog__related__title' );

if ( $query->have_posts() ):
?>

	<?php if ( royal_option( 'blog__single__relatedPosts' ) == 'on' ): ?>
		<div id="related-posts" class="related-posts blog-grid">
			<div class="related-posts-inner">
				<?php if ( ! empty( $widget_title ) ): ?>

					<h3 class="related-posts-title">
						<?php echo esc_html( $widget_title ) ?>
					</h3>

				<?php endif ?>

					<div class="content-inner" data-grid-normal data-columns="<?php echo esc_attr( royal_option( 'blog__archive__columns' ) ) ?>">
						<?php while ( $query->have_posts() ): $query->the_post(); ?>

							<div <?php post_class() ?> >
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

						<?php endwhile ?>
				    </div>
				<?php wp_reset_postdata() ?>
			</div>
		</div>

	<?php endif ?>
<?php endif ?>
