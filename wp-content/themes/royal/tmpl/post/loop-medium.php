<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();
?>
	
	<div class="content" role="main" itemprop="mainContentOfPage">
		<?php if ( have_posts() ): ?>
			<div class="posts">
				<?php while ( have_posts() ): the_post(); ?>
					<?php get_template_part( 'tmpl/post/content', 'alt' ) ?>
				<?php endwhile ?>
			</div>
			<!-- /.content-inner -->

			<?php royal_pagination() ?>
		<?php else: ?>
			<?php get_template_part( 'tmpl/post/content-none' ) ?>
		<?php endif ?>
	</div>
	<!-- /.content -->
