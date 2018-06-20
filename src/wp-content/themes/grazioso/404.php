<?php //ページが存在しない場合 404 Not Found
get_header(); ?>
		<div id="post">
			<section class="group"><!-- section -->
				<div class="container-innerlead"><!-- container -->
					<div class="content-innerlead"><!-- content -->
						<div class="row col-3-3 centered"><!-- col -->
							<h1>
								<?php _e( 'ページが見つかりませんでした。', 'lang' ); ?>
							</h1>
							<h4>
								<?php _e( '404 Not Found', 'lang' ); ?>
							</h4>
						</div><!-- /col -->
					</div><!-- /content -->
				</div><!-- /container -->
			</section><!-- /section -->
			<section class="group"><!-- section -->
				<div class="container-innercontent"><!-- container -->
					<div class="content-innercontent"><!-- content -->
						<div class="row col-3-3 contentstyle"><!-- col -->
							<div class="pad_post wow animated fadeInDown" data-wow-delay=".75s">
								<p><?php _e( 'お探しのページは存在しません。ページの情報が変更になった可能性がありますので、検索で探してみてください。', 'lang' ); ?></p>
						<p><?php get_search_form(); ?></p>
							</div>
						</div><!-- /col -->
					</div><!-- /content -->
				</div><!-- /container -->
			</section><!-- /section -->
		</div>
<?php get_footer(); ?>