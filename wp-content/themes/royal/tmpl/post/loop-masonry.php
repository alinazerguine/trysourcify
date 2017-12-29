<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

$options = array( 'itemSelector' => '.post' );
?>
	
	<div class="content" role="main" itemprop="mainContentOfPage">
		<?php if ( have_posts() ): ?>
			<div class="content-inner" data-grid="<?php echo esc_attr( json_encode( $options ) ) ?>" data-columns="<?php echo esc_attr( royal_option( 'blog__archive__columns' ) ) ?>">
				<?php while ( have_posts() ): the_post(); ?>
					<?php get_template_part( 'tmpl/post/content', 'alt' ) ?>
				<?php endwhile ?>
			</div>

			<?php royal_pagination() ?>
		<?php else: ?>
			<?php get_template_part( 'tmpl/post/content-none' ) ?>
		<?php endif ?>
	</div>
	<!-- /.content -->

