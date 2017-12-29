<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();

$post = get_post();

$project_media_items = get_post_meta( $post->ID, '_project_media', true );
$project_media_items = is_array( $project_media_items ) ? $project_media_items : array();
?>

	<div class="project-gallery project-media-list">
		<div class="project-media-inner">
			<?php foreach ( $project_media_items as $item ): ?>
				
				<div class="project-media-item">
					<?php royal_project_media_item( $item ) ?>
				</div>

			<?php endforeach ?>
		</div>
	</div>
