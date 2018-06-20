<?php 
/**
  * @package TRIAD Inc.
  * @since 1.0
 */
			
			widget_global(); // GLOBAL WIDGETS ?>
			<div id="container-footer"><!-- container -->
				<footer class="group centered"><!-- section -->
					<div class="row col-6-6"><!-- col -->
						<?php menu_foot(); // FOOTER MENU ?>
						<?php socialicons(); // SOCIAL ICONS ?>
						<?php copyrighttext(); // COPYRIGHT INFO ?>
					</div><!-- /col -->
				</footer><!-- /section -->
			</div><!-- /container -->
		</div><!-- /wrapper -->
		<?php wp_footer(); // WP_FOOTER ?>
		<?php analytics(); // ANALYTICS ?>
		<?php backtotop(); // BACK TO TOP ?>
	</body>
</html>