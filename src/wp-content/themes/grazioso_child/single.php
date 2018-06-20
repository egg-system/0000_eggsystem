<link rel="stylesheet" href="/wp-content/themes/grazioso_child/bootstrap.min.css" type="text/css" />
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

<div class="row">
<div class="col-sm-8 main">
						<div class="row col-3-3 contentstyle"><!-- col -->
							<div class="pad_post wow animated fadeInDown" data-wow-delay=".75s">
<style>
    body{counter-reset:wpp-ranking;}
    .published-date {
      display:inline;
    }
    .category {
      margin-left: 5px;
      background-color: #1F56A5;
      color: #ffffff;
      padding: 1px 10px;
      border-radius: 2px;
    }
    .post-info {
             margin: 0px 0px 20px 20px;
     }
     .main-image-wrapper {
        text-align: center;
        padding: 0px 20px 20px 20px;
     } 
     ul.taxonomy li {
        background-color: #2996cc;
        display: inline-block;
        padding: 0 0.5em;
        border-radius: 2px;
     }
     .popular-title {
        background-color: #1F55A5;
        padding: 5px;
     }
     .wpp-list ul {
        text-align: center;
        padding: 0;
     }
     .wpp-list li {
        position: relative;
        max-width: 280px;
        margin: auto;
        margin-bottom: 20px;
        padding: 0;
        padding-bottom: 5px;
        border-bottom: 1px solid rgba(119, 119, 119, 0.2);
      }
     .wpp-list img {
        width: 75px;
     }
     .widget ul li.cat-item {
        display: block;
        padding-left: 0;
        border-bottom: 1px solid rgba(119, 119, 119, 0.1);
        text-align: left;
     }
     .widget ul li.cat-item a,.wpp-list a{
        color: #606060 !important;
     }
     .main {
        padding-bottom: 50px;
        overflow:hidden; 
     }
     .sidebar .widget, .sidebar section {
         padding-bottom: 40px;
         max-width: 300px;
         margin: auto;
         text-align: center;
     }
     .cat-item {
        font-size: 18px;
     }
.single-format-standard h3 {
    border-bottom: 2px solid #1F55A5;
    background-color: #FFFFFF !important;
    color: #000 !important;
    position: relative;
    padding-bottom: 5px;
    text-align: left;
    margin-bottom: 0.5em !important;
    border-radius: 0px;
}
.content-innercontent h3 {
    font-size: 24px;
    font-weight: 400;
}
.single-format-standard h3:after {
    border-bottom: 2px solid #efefef;
    content: "";
    position: absolute;
    display: block;
    bottom: -2px;
    right: 0;
    width: 73%;
}
.yuzo_related_post a.link-list {
    color: #606060;
    font-weight: bold;
}
.wpp-list li:before {
    content: counter(wpp-ranking, decimal);
    counter-increment: wpp-ranking;
    background: rgba(31,85,165, 0.6);
    color: #fff;
    font-size: 12px;
    line-height: 1;
    padding: 4px 8px;
    position: absolute;
    left: 5px;
    top: 6px;
    z-index: 1;
}

</style>
<div class="post-info">
                                                        <h4 class="published-date">
								<time><?php the_time('Y年m月d日'); ?></time>
							</h4>
<?php
                      $terms = get_the_terms($post->ID,'category');
                      foreach($terms as $term1) :
                      $link = get_category_link( $term1->term_id);
                      echo "<a href='${link}'><span class='category'><span>";
                      echo $term1->name;
                      echo '</span></span></a>';
                      endforeach;
                      ?>
							</span></span>
<div class="sns-area">
<span class="share-on">
Share On
</span>
<iframe src="https://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink()); ?>&width=72&layout=button&action=like&size=small&show_faces=false&share=false&height=65&appId=720538701346372" width="72" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</div>
</div>

<?php if (has_post_thumbnail()) : ?>
                                                        <div class="main-image-wrapper">
                                                          <?php the_post_thumbnail('large'); ?>
                                                        </div>
    <?php endif ; ?>

								<?php the_content(); // POST CONTENTS ?>
                                <a class="back-to-list" href="/column"><i class="fa fa-caret-left" style="font-size:24px"></i>&nbsp;一覧へ戻る</a>
							</div>
						</div><!-- /col -->

</div>
<div class="col-sm-4 sidebar">
<div class="container-innerpage"><!-- container -->
<div class="content-innercontent"><!-- content -->
<section class="widget-section">
<?php dynamic_sidebar('single-sidebar'); ?>
</section>

</div>
</div>
</div>
</div>
					</div><!-- /content -->
				</div><!-- /container -->
			</section><!-- /section -->
		</div>

	<?php endwhile; else: // IF NO POST ?>
		<?php get_template_part( '404' ); // ERROR 404 ?>
	<?php endif; // END LOOP ?>
<?php get_footer(); // FOOTER ?>