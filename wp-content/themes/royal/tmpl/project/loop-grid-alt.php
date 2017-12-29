<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

$options          = array( 'itemSelector' => '.project' );
$meta_information = (array)royal_option( 'projects__meta' );
?>

	<?php if ( have_posts() ): ?>
		<div class="content" role="main" itemprop="mainContentOfPage">
			<?php get_template_part( 'tmpl/project/filter' ) ?>
			
			<div class="content-inner" data-grid="<?php echo esc_attr( json_encode( $options ) ) ?>" data-columns="<?php echo esc_attr( royal_option( 'projects__gridColumns' ) ) ?>">
				<?php while ( have_posts() ): the_post(); ?>

					<div <?php post_class( 'project' ) ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
						<div class="project-inner">
							<figure class="project-thumbnail">
								<?php if ( royal_option( 'projects__readmore' ) == 'on' ): ?>
									<div class="project-readmore">
										<a class="button" href="<?php the_permalink() ?>"><?php _e( 'View Detail', 'royal' ) ?></a>
									</div>
								<?php endif ?>

								<a href="<?php the_permalink() ?>">
									<?php
										$image = royal_get_image_resized( array(
											'post_id' => get_the_ID(),
											'size'    => royal_option( 'projects__imagesize' ),
											'crop'    => royal_option( 'projects__imagesizeCrop' ) == true
										) );

										echo wp_kses_post( $image['thumbnail'] );
									?>
								</a>
							</figure>

							<div class="project-info">
								<div class="project-info-inner">
									<h3 class="project-title" itemprop="name headline">
										<a href="<?php the_permalink() ?>">
											<?php the_title() ?>
										</a>
									</h3>
									
									<h6 class="project-meta">
										<?php echo get_the_term_list( get_the_ID(), 'nproject-category' ) ?>
									</h6>

									<?php if ( royal_option( 'projects__excerpt' ) == 'on' ): ?>
										<div class="project-summary">
											<?php the_excerpt() ?>
										</div>
									<?php endif ?>
								</div>
							</div>
						</div>
					</div>

				<?php endwhile ?>
			</div>
		</div>

		<?php royal_pagination() ?>
	<?php else: ?>
		<!-- Show empty message -->
	<?php endif ?>
