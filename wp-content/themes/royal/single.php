<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

add_filter( 'royal_sidebar_id', 'royal_single_sidebar' );
add_filter( 'royal_sidebar_position', 'royal_single_sidebar_position' );
?>
	<?php get_header() ?>
		<?php if ( have_posts() ): ?>
			<div class="content">
				<?php while ( have_posts() ): the_post(); ?>
					<?php get_template_part( 'tmpl/post/content', 'single' ) ?>
				<?php endwhile ?>
			</div>

			<?php if ( royal_option( 'blog__single__postNav' ) == 'on' ): ?>
				<?php get_template_part( 'tmpl/post/content-navigator' ) ?>
			<?php endif ?>
			
			<?php royal_related_posts() ?>
			<?php royal_comments_list() ?>
			
		<?php endif ?>
	<?php get_footer() ?>
