<?php

// 「ウィジェット背景設定」初期設定
add_action('admin_menu', 'wigdet_bg_menu');
function wigdet_bg_menu(){

	// メニューの追加
	add_submenu_page('themes.php', 'ウィジェット背景設定', 'ウィジェット背景設定', 'edit_theme_options', 'widget-bg.php', 'wigdet_bg');

	// メニューの位置調整（「ウィジェット」の下にくるように）
	global $submenu;
	if(isset($submenu['themes.php'])){
		foreach($submenu['themes.php'] as $key=>$value) {
			if($submenu['themes.php'][$key][0] == 'ウィジェット背景設定') { $widget_bg_pos = $key; }
		}
		foreach($submenu['themes.php'] as $key=>$value) {
			if($submenu['themes.php'][$key][0] != 'ウィジェット背景設定') {
			$new_submenu[] = $submenu['themes.php'][$key];
			}
			if($submenu['themes.php'][$key][0] == 'ウィジェット') {
				$new_submenu[] = $submenu['themes.php'][$widget_bg_pos];
			}
		}
		$submenu['themes.php'] = $new_submenu;

		// メディアアップローダとカラーピッカーのロード
		add_action('admin_print_scripts', 'wigdet_bg_scripts');
		add_action('admin_print_styles', 'wigdet_bg_styles');
	}
}

// 「ウィジェット背景設定」登録本体
function wigdet_bg(){
	include('modify.php');
}

// スタイル読み込み
function wigdet_bg_styles() {
	wp_enqueue_style('thickbox');
	wp_enqueue_style('wp-color-picker');
}

// スクリプト読み込み
function wigdet_bg_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery');
	wp_enqueue_script('wp-color-picker');
}

// 公開画面のCSS追加
add_action('wp_enqueue_scripts', 'wigdet_bg_public_styles');
function wigdet_bg_public_styles() {
	wp_enqueue_style('widget-bg', get_template_directory_uri().'/widget-bg/css.php');
        
        wp_enqueue_script('widget-bg', get_template_directory_uri().'/widget-bg/videobg.php');
}

// ウィジェット一覧を返す関数（背景情報も込み）
function get_wigdet_bg_list(){

	// ウィジェットIDからクラス名を変換するためのテーブル
	$id2class['siteorigin-panels-builder']      = 'SiteOrigin_Panels_Widgets_Layout';
	$id2class['siteorigin-panels-post-content'] = 'SiteOrigin_Panels_Widgets_PostContent';
	$id2class['siteorigin-panels-postloop']     = 'SiteOrigin_Panels_Widgets_PostLoop';
	$id2class['rss']                            = 'WP_Widget_RSS';
	$id2class['archives']                       = 'WP_Widget_Archives';
	$id2class['nav_menu']                       = 'WP_Nav_Menu_Widget';
	$id2class['categories']                     = 'WP_Widget_Categories';
	$id2class['calendar']                       = 'WP_Widget_Calendar';
	$id2class['tag_cloud']                      = 'WP_Widget_Tag_Cloud';
	$id2class['text']                           = 'WP_Widget_Text';
	$id2class['black-studio-tinymce']           = 'WP_Widget_Black_Studio_TinyMCE';
	$id2class['meta']                           = 'WP_Widget_Meta';
	$id2class['pages']                          = 'WP_Widget_Pages';
	$id2class['recent-comments']                = 'WP_Widget_Recent_Comments';
	$id2class['recent-posts']                   = 'WP_Widget_Recent_Posts';
	$id2class['search']                         = 'WP_Widget_Search';
	// 以下はそのままなので設定不要
	// $id2class['wp_youtube']                     = 'wp_youtube';
	// $id2class['wp_action']                      = 'wp_action';
	// $id2class['wp_announce']                    = 'wp_announce';
	// $id2class['wp_announce2']                   = 'wp_announce2';
	// $id2class['wp_widg1']                       = 'wp_widg1';
	// $id2class['wp_widg2']                       = 'wp_widg2';
	// $id2class['wp_widg3']                       = 'wp_widg3';
	// $id2class['wp_gallery']                     = 'wp_gallery';
	// $id2class['wp_social']                      = 'wp_social';
	// $id2class['wp_team']                        = 'wp_team';
	// $id2class['wp_grid']                        = 'wp_grid';
	// $id2class['wp_typing']                      = 'wp_typing';
	// $id2class['wp_blog']                        = 'wp_blog';
	// $id2class['wp_table']                       = 'wp_table';

	// 一覧の作成
	$widgets = wp_get_sidebars_widgets();
	foreach(array('sidebar-1', 'sidebar-2') as $type) {
		foreach($widgets[$type] as $widget_id_base ) {

			// 保存されたウィジェットIDからクラス名を生成
			$widget_id = preg_replace('/-(\d+)$/', '', $widget_id_base);
			$class_name = @$id2class[$widget_id] ? @$id2class[$widget_id] : $widget_id;

			// ウィジェットオブジェクトの生成
			$widget = new $class_name;

			// IDのセット
			$widget->id = $widget_id_base;

			// 保存値の呼び出し
                        $widget->bgvideo_url = get_option('widget_bgvideo_url_'.$widget_id_base);
			$widget->bg_url = get_option('widget_bg_url_'.$widget_id_base);
			$widget->bg_fixed = get_option('widget_bg_fixed_'.$widget_id_base);
			$widget->bg_color = get_option('widget_bg_color_'.$widget_id_base);

			// リストにセット
			$widget_list[$type][] = $widget;
		}
	}

	return $widget_list;
}

// 閲覧ブラウザがモバイルかどうか（iPhone, iPod, iPad, Android）
function is_mobile() {
	return (
		(strpos($_SERVER['HTTP_USER_AGENT'],'iPhone' )!==false) ||
		(strpos($_SERVER['HTTP_USER_AGENT'],'iPod'   )!==false) ||
		(strpos($_SERVER['HTTP_USER_AGENT'],'iPad'   )!==false) ||
		(strpos($_SERVER['HTTP_USER_AGENT'],'Android')!==false)
	);
}
