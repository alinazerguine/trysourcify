<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();
?>
	
	<?php if ( royal_option( 'blog__archive__postMeta' ) == 'on' ): ?>
		<div class="post-meta">
			

			<h6 class="post-categories">
				<?php the_category( _x( ', ', 'Used between list items, there is a space after the comma.', 'royal' ) ) ?>
			</h6>
			
			<!--
			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ): ?>
				<span class="post-comments">
					<?php comments_popup_link( __( '0 comment', 'royal' ), __( '1 Comment', 'royal' ), __( '% Comments', 'royal' ) ); ?>
				</span>
			<?php endif ?>


			<span class="post-author">
				<span><?php _e( 'By', 'royal' ) ?></span>
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>" itemprop="url" rel="author">
					<span itemprop="name"><?php the_author() ?></span>
				</a>
			</span>
			-->
		</div>
	<?php endif ?>
