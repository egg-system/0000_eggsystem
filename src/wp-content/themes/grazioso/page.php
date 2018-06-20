<?php
/**
  * @package TRIAD Inc.
  * @since 1.0
 */

get_header(); // HEADER ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); // BEGIN LOOP ?>
		<div id="post">
			<section class="group"><!-- section -->
				<div class="container-innerlead"><!-- container -->
					<div class="content-innerlead"><!-- content -->
						<div class="row col-3-3 centered"><!-- col -->
							<h1 class="wow animated fadeInDown" data-wow-delay=".25s">
								<?php the_title(); // POST TITLE ?>
							</h1>
							<?php if ( get_post_meta($post->ID, 'subtitle', true) ) { // IF SUBTITLE ?>
								<h4 class="wow animated fadeInDown" data-wow-delay=".5s">
									<?php echo get_post_meta($post->ID, 'subtitle', true); // POST SUBTITLE ?>
								</h4>
							<?php } // END IF ?>
						<p class="wow animated fadeInDown" data-wow-delay=".5s"><?php breadcrumb(); ?></p>
						</div><!-- /col -->
					</div><!-- /content -->
				</div><!-- /container -->
			</section><!-- /section -->
			<section class="group"><!-- section -->
				<div class="container-innerpage"><!-- container -->
					<div class="content-innercontent"><!-- content -->
						<div class="row col-3-3 contentstyle"><!-- col -->
							<div class="pad_post wow animated fadeInDown" data-wow-delay=".75s">
								<?php the_content(); // POST CONTENTS ?>
							</div>
						</div><!-- /col -->
					</div><!-- /content -->
				</div><!-- /container -->
			</section><!-- /section -->
		</div>
	<?php endwhile; else: // IF NO POST ?>
		<?php get_template_part( '404' ); // ERROR 404 ?>
	<?php endif; // END LOOP ?>
<?php get_footer(); // FOOTER ?>