<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

add_filter( 'royal_body_class', 'royal_blog_body_class' );
add_filter( 'royal_sidebar_id', 'royal_blog_sidebar' );
add_filter( 'royal_sidebar_position', 'royal_blog_sidebar_position' );
?>

	<?php get_header() ?>
		<?php if ( have_posts() ): ?>
			<?php get_template_part( 'tmpl/post/loop', royal_option( 'blog__archive__style' ) ) ?>
		<?php else: ?>
			<div class="content">
				<?php get_template_part( 'tmpl/post/content', 'none' ) ?>
			</div>
		<?php endif ?>
	<?php get_footer(); ?>
