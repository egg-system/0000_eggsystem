<?php
 /**
  * @package TRIAD Inc.
  * @since 1.0
 */

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); // GET AUTHOR NAME
get_header(); // HEADER ?>
	<?php if (have_posts()) : ?>
		<?php $count = 0; ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php $count++; ?>
			<?php if (($count > 0) && ($count <= 1)) : ?>
				<section class="group"><!-- section -->
					<div class="container-innerlead"><!-- container -->
						<div class="content-innerlead"><!-- content -->
							<div class="row col-3-3 centered"><!-- col -->
								<h1 class="wow animated fadeInDown" data-wow-delay=".25s">
									<?php the_search_query(); // SEARCH TERM ?>
								</h1>
								<h4 class="wow animated fadeInDown" data-wow-delay=".5s">
									<?php _e('Search Results', 'lang'); ?>
								</h4>
							</div><!-- /col -->
						</div><!-- /content -->
					</div><!-- /container -->
				</section><!-- /section -->
			<?php else : ?>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php else : ?>
	<?php endif; ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); // BEGIN LOOP ?>
		<div class="prearchive">
			<section class="group"><!-- section -->
				<div class="container-archive"><!-- container -->
					<div class="content-archive"><!-- content -->
						<div class="row col-3-3 contentstyle"><!-- col -->
							<div class="pad_post">
								<div class="postimg">
									<div class="overlay-wrapper">
										<div class="overlay-image">
											<div class="overlay">
												<div class="circular">
													<a href="<?php the_permalink() ?>" rel="bookmark">
														<?php the_post_thumbnail( 'img_standard', array( 'class' => 'img img_circle', 'title' => '' ) ); // POST IMAGE ?>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<h2>
									<a href="<?php the_permalink() ?>" rel="bookmark">
										<?php the_title(); // POST TITLE ?>
									</a>
								</h2>
								<p><?php wpe_excerpt('wpe_excerptlength_longest', 'wpe_excerptmore'); // POST EXCERPT ?></p>
								<span class="rmore">
									<a href="<?php the_permalink() ?>" rel="bookmark">
										<span>
											<?php _e('続きを読む', 'lang'); ?>
										</span>
									</a>
								</span>
							</div>
						</div><!-- /col -->
					</div><!-- /content -->
				</div><!-- /container -->
			</section><!-- /section -->
		</div>
	<?php endwhile; else: ?>
		<?php get_template_part( '404' ); // 404 ?>
	<?php endif; // END LOOP ?>
	<section class="group"><!-- section -->
		<div class="container-innerpagination"><!-- container -->
			<div class="content-innerpagination"><!-- content -->
				<div class="row col-3-3"><!-- col -->
					<div class="pad_post">
						<?php paginationlinks(); // PAGINATION LINKS ?>
					</div>
				</div><!-- /col -->
			</div><!-- /content -->
		</div><!-- /container -->
	</section><!-- /section -->		
<?php get_footer(); // FOOTER ?>