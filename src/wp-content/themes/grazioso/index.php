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
				<div class="container-innercontent"><!-- container -->
					<div class="content-innercontent"><!-- content -->
						<div class="row col-3-3 contentstyle"><!-- col -->
							<div class="pad_post wow animated fadeInDown" data-wow-delay=".75s">
								<div class="postimg">
									<div class="overlay-wrapper">
										<div class="overlay-image">
											<div class="overlay">
												<div class="circular">
													<?php the_post_thumbnail( 'img_standard', array( 'class' => 'img img_circle', 'title' => '' ) ); // POST IMAGE ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php the_content(); // POST CONTENTS ?>
								<p><?php _e( 'By', 'lang'); ?> <?php the_author_posts_link(); ?></p>

							</div>
						</div><!-- /col -->
					</div><!-- /content -->
				</div><!-- /container -->
			</section><!-- /section -->
		</div>
	<?php endwhile; else: // IF NO POST ?>
		<?php get_template_part( '404' ); // ERROR 404 ?>
	<?php endif; // END LOOP ?>
	<?php if ( mytheme_option( 'comments_selector' ) && mytheme_option( 'comments_selector' ) == 'choice6' ) { // IF NO COMMENTS ?>
	<?php } else { // IF COMMENTS ?>
		<section class="group"><!-- section -->
			<div id="container-comments"><!-- container -->
				<div id="content-comments"><!-- content -->
					<div class="row col-2-6 leftalign wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".25s"><!-- col -->
						<?php if(get_the_tag_list()) { // POST TAGS ?>
							<div class="posttags">
								<h3><?php _e( 'Tagged With', 'lang'); ?></h3>
								<?php echo get_the_tag_list(''); // POST TAGS LIST ?>
							</div>
						<?php } ?>
					</div><!-- /col -->
					<div class="row col-2-6"><!-- col -->
						<?php comments_toggle(); // COMMENTS BUTTON ?>
					</div><!-- /col -->
					<div class="row col-2-6 leftalign wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".75s"><!-- col -->
						<div class="posttags">
							<h3><?php _e( 'Filed Under', 'lang'); ?></h3>
							<?php the_category('') // CATEGORY LIST ?>
						</div>
					</div><!-- /col -->
				</div><!-- /content -->
			</div><!-- /container -->
		</section><!-- /section -->
		<section class="group"><!-- section -->
			<div id="container-expand-comments"><!-- container -->
				<div id="content-expand-comments"><!-- content -->
					<div class="row col-6-6 centered"><!-- col -->
						<div class="pad_post">
							<?php comments_display(); // COMMENTS SYSTEM ?>
						</div>
					</div><!-- /col -->
				</div><!-- /content -->
			</div><!-- /container -->
		</section><!-- /section -->
	<?php } // END IF ?>
<?php get_footer(); // FOOTER ?>