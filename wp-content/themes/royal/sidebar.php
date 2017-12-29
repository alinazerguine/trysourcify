<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();
?>
	
	<?php if ( royal_has_sidebar() && is_active_sidebar( royal_sidebar_id() ) ): ?>
		<aside class="main-sidebar">
			<div class="main-sidebar-inner">
				<?php dynamic_sidebar( royal_sidebar_id() ) ?>
			</div>
		</aside>
		<!-- /.sidebar -->
	<?php endif ?>
