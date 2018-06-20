<?php
 /**
  * @package TRIAD Inc.
  * @since 1.0
 */



	/**
	 * Include the initialization file
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
require 'theme_update_check.php';
$MyUpdateChecker = new ThemeUpdateChecker(
    'grazioso',
    'https://kernl.us/api/v1/theme-updates/570a3a7a35565d2a57b83cfd/'
);	

	require( get_template_directory() . '/assets/init.php' );
	require_once locate_template('/inc/lib/plugins.php');


    function jp_date_wp_title( $title, $sep, $seplocation ) {
        if ( is_date() ) {
            $m = get_query_var('m');
            if ( $m ) {
                $year = substr($m, 0, 4);
                $month = intval(substr($m, 4, 2));
                $day = intval(substr($m, 6, 2));
            } else {
                $year = get_query_var('year');
                $month = get_query_var('monthnum');
                $day = get_query_var('day');
            }
            
            $title = ($seplocation != 'right' ? " $sep " : '') .
            ($year ? $year . '年' : '') .
            ($month ? $month . '月' : '') .
            ($day ? $day . '日' : '') .
            ($seplocation == 'right' ? " $sep " : '');
        }
        return $title;
    }
    add_filter( 'wp_title', 'jp_date_wp_title', 10, 3 );


/**
 * Youtube channel name to id converter
 * ------------------------------------
 */
function channel2id($channel_name) {
	preg_match(
		'/https\:\/\/www\.youtube\.com\/feeds\/videos\.xml\?channel_id\=([^\"]+)/s',
		file_get_contents("https://www.youtube.com/user/$channel_name"),
		$channel_id
       );
	return @$channel_id[1];
}

//記事別にhead内に追加
add_action('admin_menu', 'add_head_hooks');
add_action('save_post', 'save_add_head');
add_action('wp_head','insert_add_head');
function add_head_hooks() {
	add_meta_box('add_head', 'このページのヘッダーに任意のタグを追加', 'add_head_input', 'post', 'normal', 'high');
	add_meta_box('add_head', 'このページのヘッダーに任意のタグを追加', 'add_head_input', 'page', 'normal', 'high');
}
function add_head_input() {
	global $post;
	echo '<input type="hidden" name="add_head_noncename" id="add_head_noncename" value="'.wp_create_nonce('add-head').'" />';
	echo '<textarea name="add_head" id="add_head" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_add_head',true).'</textarea>';
}
function save_add_head($post_id) {
	if (!wp_verify_nonce(@$_POST['add_head_noncename'], 'add-head')) return $post_id;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
	$add_head = $_POST['add_head'];
	update_post_meta($post_id, '_add_head', $add_head);
}
function insert_add_head() {
	if (is_page() || is_single()) {
		if (have_posts()) : while (have_posts()) : the_post();
     echo get_post_meta(get_the_ID(), '_add_head', true);
     endwhile; endif;
     rewind_posts();
 }
}

// パンくずリスト
function breadcrumb(){
    global $post;
    $str ='';
    if(!is_home()&&!is_admin()){
        $str.= '<span id="breadcrumb" class="cf"><span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
        $str.= '<a href="'. home_url() .'" itemprop="url"><span itemprop="title">ホーム</span></a> &gt; </span>';
        
        if(is_category()) {
            $cat = get_queried_object();
            if($cat -> parent != 0){
                $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
                foreach($ancestors as $ancestor){
                    $str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($ancestor) .'" itemprop="url"><span itemprop="title">'. get_cat_name($ancestor) .'</span></a> &gt; </span>';
                }
            }
            $str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($cat -> term_id). '" itemprop="url"><span itemprop="title">'. $cat-> cat_name . '</span></a></span>';
        } elseif(is_page()){
            if($post -> post_parent != 0 ){
                $ancestors = array_reverse(get_post_ancestors( $post->ID ));
                foreach($ancestors as $ancestor){
                    $str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_permalink($ancestor).'" itemprop="url"><span itemprop="title">'. get_the_title($ancestor) .'</span></a></span>';
                }
            }
        } elseif(is_single()){
            $categories = get_the_category($post->ID);
            $cat = $categories[0];
            if($cat -> parent != 0){
                $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
                foreach($ancestors as $ancestor){
                    $str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($ancestor).'" itemprop="url"><span itemprop="title">'. get_cat_name($ancestor). '</span></a> &gt; </span>';
                }
            }
            $str.='<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'. get_category_link($cat -> term_id). '" itemprop="url"><span itemprop="title">'. $cat-> cat_name . '</span></a></span>';
        } else{
            $str.='<span>'. wp_title('', false) .'</span>';
        }
        $str.='</span>';
    }
    echo $str;
}

//カテゴリーメタディスクリプション用の説明文を取得
function get_meta_description_from_category(){
  $cate_desc = trim( strip_tags( category_description() ) );
  if ( $cate_desc ) {//カテゴリ設定に説明がある場合はそれを返す
    return $cate_desc;
}
$cate_desc = '「' . single_cat_title('', false) . '」の記事一覧です。' . get_bloginfo('description');
return $cate_desc;
}

//カテゴリメタキーワード用のキーワードを取得
function get_meta_keyword_from_category(){
  return single_cat_title('', false) . ',ブログ,記事一覧';
}

// 「ウィジェット背景設定」登録
include 'widget-bg/init.php';

?>
