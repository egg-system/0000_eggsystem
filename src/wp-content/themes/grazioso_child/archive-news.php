<?php
/**
  * @package TRIAD Inc.
  * @since 1.0
 */

get_header(); // HEADER?>

			<section class="group"><!-- section -->
				<div class="container-innerlead"><!-- container -->
					<div class="content-innerlead"><!-- content -->
						<div class="row col-3-3 centered"><!-- col -->
							<h1 class="wow animated fadeInDown" data-wow-delay=".25s">
								ニュース
							</h1>
						</div><!-- /col -->
					</div><!-- /content -->
				</div><!-- /container -->
			</section><!-- /section -->
			<section class="group"><!-- section -->

<div class="content-innercontent NewsList">
		<section class="section-archive">
			<ul>
	<?php if (have_posts()) : while (have_posts()) : the_post(); // BEGIN LOOP?>


  <li>
  <div id="topNewsList">
    <div id="topNewsListDate">
      <?php the_time('Y/m/d'); ?>
    </div>
    <?php 
             $terms = get_the_terms($post->ID,'news_category');
             if ($terms) {
     ?>
    <div id="topNewsListTerm">
      <?php
             foreach($terms as $term1) :
               echo $term1->name;
               if ($term1 !== end($terms)) {
                   echo ', ';
               }
               endforeach;
      ?>
    </div>
    <?php
         }
    ?>
    <div id="topNewsListTitle">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </div>
  </div>
  </li>
  <hr class="topNewsListLine">
  <?php endwhile; endif; ?>
</ul>
		</section>

<section class="pager">
<?php
    $big = 9999999999;
    $arg = array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'current' => max(1, get_query_var('paged')),
        'total'   => $wp_query->max_num_pages
    );
    echo paginate_links($arg);
?>
</section>
</div>
<?php get_footer(); // FOOTER?>