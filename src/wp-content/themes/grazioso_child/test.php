<?php
/**
  * @package TRIAD Inc. 
  * Template Name: サブページ
  * @since 1.0
 */



get_header(); // HEADER ?>

<div id="container">

	<div id="topNewsTitleBox">
		<h1>ニュース</h1>
	</div>
	<div id="topNewsListDisplay">
  <ul>
  <?php
    $wp_query = new WP_Query();
    $param = array(
        'posts_per_page' => '3', //表示件数。-1なら全件表示
        'post_type' => 'news', //カスタム投稿タイプの名称を入れる
        'post_status' => 'publish', //取得するステータス。publishなら一般公開のもののみ
        'orderby' => 'ID', //ID順に並び替え
        'order' => 'DESC'
    );
    $wp_query->query($param);
    if($wp_query->have_posts()): while($wp_query->have_posts()) : $wp_query->the_post();
  ?>
  <li>
  <div id="topNewsList">
    <div id="topNewsListDate">
      <?php the_date(); ?>
    </div>
    <div id="topNewsListTerm">
      <?php
             $terms = get_the_terms($post->ID,'news_category');
             foreach($terms as $term1) :
               echo $term1->name;
               if ($term1 !== end($terms)) {
                   echo ', ';
               }
               endforeach;
      ?>
    </div>
    <div id="topNewsListTitle">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </div>
  </div>
  </li>
  <hr class="topNewsListLine">
  <?php endwhile; endif; ?>
  </ul>
</div>

<div id="topNewsListMore">
  <p><a href="/news">＞＞さらに表示</a></p>
</div>

<?php echo do_shortcode('[contact-form-7 id="6" title="お問合わせ"]'); ?>
</div>
<div id="topFooterMenu">
<div id="topFooterMenuList">
<div class="topFooterMenuBox topFooterMenuWidth">
<ul><strong>会社情報</strong>
 	<li><a href="/company-data/">会社概要</a></li>
 	<li><a href="/vision/">経営理念</a></li>
 	<li><a href="/message/">代表メッセージ</a></li>
</ul>
</div>
<div class="topFooterMenuBox topFooterMenuWidth">
<ul><strong>サービス</strong>
 	<li><a href="https://eggsystem.co.jp/service-info/salon-service.html">サロン開業支援サービス</a></li>
 	<li><a href="#">Web開発・HP制作</a></li>
 	<li><a href="#">システムコンサルティング</a></li>
 	<li><a href="#">システムエンジニア支援サービス</a></li>
</ul>
</div>
<div class="topFooterMenuBox topFooterMenuWidthMin"><a href="/example/"><strong>事例</strong></a></div>
<div class="topFooterMenuBox topFooterMenuWidthMin"><a href="/news/"><strong>ニュース</strong></a></div>
<div class="topFooterMenuBox topFooterMenuWidthMin"><a href="/column/"><strong>コラム</strong></a></div>
<div class="topFooterMenuBox ttopFooterMenuWidthMin"><a href="/contact/"><strong>お問い合わせ</strong></a></div>
</div>
<div class="topFooterMenuUnder">
  <a href="/privacy/"><strong>プライバシーポリシー</strong></a><strong>｜</strong><a href="/hpservice-terms/"><strong>ホームページ月額サービス利用規約</strong>
</div>
</div>
	<?php get_footer(); // FOOTER ?>