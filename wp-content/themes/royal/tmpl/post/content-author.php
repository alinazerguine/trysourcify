<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

if ( ! ( $author_id = get_the_author_meta( 'ID' ) ) ) {
	$author_id = get_query_var( 'author' );
}

$author_description = get_the_author_meta( 'description', $author_id );
?>

	<?php if ( ! empty( $author_description ) ): ?>
		<div class="post-author-box" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
			<?php if ( get_option( 'show_avatars' ) ): ?>
				<div class="author-avatar">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?>
				</div>
			<?php endif ?>
			
			<div class="author-box-content">
				<h3 class="author-box-title">
					<?php the_author_posts_link() ?>
				</h3>

				<div class="author-description">
					<?php echo wp_kses_post( $author_description ) ?>
				</div>
			</div>
		</div>
	<?php endif ?>
