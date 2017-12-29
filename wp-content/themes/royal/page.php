<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();
?>

	<?php get_header() ?>
		<?php if ( have_posts() ): the_post(); ?>
			<div class="content">
				<?php the_content() ?>
			</div>
			<!-- /.content -->

			<?php royal_comments_list() ?>
		<?php endif ?>
	<?php get_footer() ?>
