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
<style>
    .published-date {
      display:inline;
    }
    .category {
      margin-left: 5px;
      background-color: #2996cc;
      color: #ffffff;
      padding: 1px 10px;
      border-radius: 2px;
    }
    .post-info {
/*             margin: 0px 0px 20px 20px;*/
             margin: 1px;
     }
     .main-image-wrapper {
        text-align: center;
        padding: 20px 20px 20px 20px;
     } 
     .content {
         border-top: 1px solid #7f7f7f;
         padding-top: 20px;
         margin-top: 20px;
     }
     .sns-area {
          color: #7f7f7f;
     }
     .sns-area span {
          margin: 10px;
      }
</style>
<div class="post-info">
                                                        <h4 class="published-date">
								<time><?php the_time('Y年m月d日'); ?></time>
&nbsp;
<?php
                      $terms = get_the_terms($post->ID,'news_category');
                      foreach($terms as $term1) :
                      echo $term1->name;
                      if ($term1 !== end($terms)) {
                          echo ', ';
                      }
                      endforeach;
                      ?>
							</h4>
<div class="sns-area">
<span class="share-on">
Share On
</span>
<iframe src="https://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink()); ?>&width=72&layout=button&action=like&size=small&show_faces=false&share=false&height=65&appId=720538701346372" width="72" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</div>
<?php if (has_post_thumbnail()) : ?>
                                                        <div class="main-image-wrapper">
                                                          <?php the_post_thumbnail('large'); ?>
                                                        </div>
    <?php endif ; ?>
<div class="content">
								<?php the_content(); // POST CONTENTS ?>
</div>
                                <a class="back-to-list" href="/<?php echo get_post_type( $post ); ?>"><i class="fa fa-caret-left" style="font-size:24px"></i>&nbsp;一覧へ戻る</a>
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