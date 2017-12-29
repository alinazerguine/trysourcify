<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

$featured_background_types = (array) royal_option( 'header__titlebar__backgroundFeatured' );
$current_post_type         = royal_current_post_type();
$show_featured_image       = ! in_array( $current_post_type, $featured_background_types ) && has_post_thumbnail();

add_filter( 'royal_body_class', 'royal_single_project_body_classes' );
add_filter( 'royal_sidebar_id', 'royal_single_project_sidebar' );
add_filter( 'royal_sidebar_position', 'royal_single_project_sidebar_position' );
?>
	<?php get_header() ?>
		<?php if ( have_posts() ): the_post(); ?>

			<div class="content">
				<div class="content-inner">
					<?php if ( $show_featured_image ): ?>
						<h2 class="post-title" itemprop="headline">
							<?php the_title(); ?>
						</h2>
					<?php endif ?>
					
					<?php if ( in_array( royal_option( 'project__galleryPosition' ), array( 'top', 'left' ) ) ): ?>
						<?php get_template_part( 'tmpl/project/gallery', royal_option( 'project__galerryMode' ) ) ?>
					<?php endif ?>

					<div class="project-content">
						<div class="project-content-inner">
							<?php the_content() ?>
						</div>
					</div>

					<?php if ( in_array( royal_option( 'project__galleryPosition' ), array( 'bottom', 'right' ) ) ): ?>
						<?php get_template_part( 'tmpl/project/gallery', royal_option( 'project__galerryMode' ) ) ?>
					<?php endif ?>

					<?php if ( royal_option( 'project__author' ) == 'on' ): ?>
						<?php get_template_part( 'tmpl/post/content-author' ) ?>
					<?php endif ?>

					<?php if ( royal_option( 'project__pagination' ) == 'on' ): ?>
						<?php get_template_part( 'tmpl/post/content-navigator' ) ?>
					<?php endif ?>

					<?php if ( royal_option( 'project__related' ) == 'on' ): ?>
						<?php get_template_part( 'tmpl/project/related' ) ?>
					<?php endif ?>
				</div>
			</div>
		<?php endif ?>
	<?php get_footer() ?>
