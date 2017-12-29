<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();
?>
							</div>
							<!-- /.main-content-inner -->
						</main>
						<!-- /.main-content -->

						<?php get_sidebar() ?>
					</div>
					<!-- /.content-body-inner -->
				</div>
				<!-- /.content-body -->
				<?php get_template_part( 'tmpl/footer-content' ) ?>				
			</div>
			<!-- /.site-content -->

			<div id="site-footer" class="site-footer">
				<?php if ( royal_option( 'global__misc__gotop' ) == 'on' ): ?>
					<div class="go-to-top wrap">
						<a href="javascript:;"><span><?php echo __( 'Go to Top', 'royal' ) ?></span></a>
					</div>
				<?php endif ?>

				<?php get_template_part( 'tmpl/footer-widgets' ) ?>
				<?php get_template_part( 'tmpl/footer-copyright' ) ?>
			</div>
			<!-- /#site-footer -->
		</div>
		<!-- /.site-wrapper -->

		<?php get_template_part( 'tmpl/off-canvas' ) ?>

		<div id="frame">
			<span class="frame_top"></span>
			<span class="frame_right"></span>
			<span class="frame_bottom"></span>
			<span class="frame_left"></span>
		</div>
		
		<?php wp_footer() ?>
	</body>
</html>
