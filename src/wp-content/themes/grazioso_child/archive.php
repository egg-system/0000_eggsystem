<style>
    .section-archive {
        display: flex;
        flex-wrap: wrap;
    }
    .section-archive article { 
      width: 100%;
    margin: auto;
      background-color: #1F55A5;
      margin-bottom: 30px;
      height: 295px;
    }
    .section-archive article .title,.section-archive article .published-date{
         color: #ffffff !important;
     } 
    .section-archive article .published-date{
         font-size: 110%;
     } 
.section-archive article .title {
        display: block;
        height: 38px;
        overflow: hidden;
    }
    .section-archive article .article-attributes{ 
      padding-top: 5px;
      padding-bottom: 5px;
		padding-left:10px;
      text-align: left;
    }
    .section-archive article img{ 
      /*width: 100%;*/
          background-color: #000000;
          width: 100%;
          height: 200px;
          object-fit: contain;
    }
    .section-archive .category {
       padding: 0 10px;
       margin: 0 2px;
    }
    .content-innercontent .row {
        float: none;
     }
     .article-image-wrapper {
        text-align: center;
     }
</style>
<link rel="stylesheet" href="/wp-content/themes/grazioso_child/bootstrap.min.css" type="text/css" />
<?php
/**
Template Name: Archives
  * @package TRIAD Inc.
  * @since 1.0
 */

get_header(); // HEADER ?>

			<section class="group"><!-- section -->
				<div class="container-innerlead"><!-- container -->
					<div class="content-innerlead"><!-- content -->
						<div class="row col-3-3 centered"><!-- col -->
							<h1 class="wow animated fadeInDown" data-wow-delay=".25s">
								コラム
							</h1>
						</div><!-- /col -->
					</div><!-- /content -->
				</div><!-- /container -->
			</section><!-- /section -->
			<section class="group"><!-- section -->

<div class="content-innercontent">
<div class="row">
<?php if (get_query_var( 'tag_id', false ))  { ?>
                <div class="col-xs-12">
                     <h2>タグ：<?php 
$tagData = get_term_by('id', get_query_var( 'tag_id', false ),  'post_tag');//タグのデータ
echo esc_html($tagData->name); 
?></h2>
                </div>
<?php } ?>
<?php if (get_query_var( 'cat', false ))  { ?>
                <div class="col-xs-12">
                     <h2>カテゴリー：<?php 
$categoryData = get_term_by('id', get_query_var( 'cat', false ),  'category');//タグのデータ
echo esc_html($categoryData->name); 
?></h2>
                </div>
<?php } ?>

		<section class="section-archive">
<?php if (!get_query_var( 'paged', false ) && !get_query_var( 'cat', false ) && !get_query_var( 'tag_id', false ))  { ?>
<?php query_posts('post_type=post&paged='.$paged); ?>
<?php } ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); // BEGIN LOOP ?>
						<div class="col-sm-4 col-xs-12"><!-- col -->
<a href="<?php the_permalink(); ?>">
					<article>
<?php if (has_post_thumbnail()) : ?>
                                                        <div class="article-image-wrapper">
                                                          <?php the_post_thumbnail('medium'); ?>
                                                        </div>
    <?php endif ; ?>
						<div class="article-attributes">
							<div class="published-date">
								<time><?php the_time('Y年m月d日'); ?></time>
							</div>

							<?php
                      $terms = get_the_terms($post->ID,'category');
                      foreach($terms as $term1) :
                      echo '<span class="category">';
                      echo $term1->name;
                      echo '</span>';
                      endforeach;
                      ?>					
                                             </div>		
							<span class="title">
								<?php the_title(); // POST TITLE ?>
							</span>
					</article>
</a>
						</div><!-- /col -->
	<?php endwhile; else: // IF NO POST ?>
		<?php get_template_part( '404' ); // ERROR 404 ?>
	<?php endif; // END LOOP ?>
		</section>

<section class="pager">
<?php
    $big = 9999999999;
    $arg = array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'current' => max( 1, get_query_var('paged') ),
        'total'   => $wp_query->max_num_pages
    );
    echo paginate_links($arg);
?>
</section>
</div>
</div>
</section>
<?php get_footer(); // FOOTER ?>