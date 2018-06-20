<?php 
 /**
  * @package TRIAD Inc.
  * @since 1.0
 */
 
class My_Theme_Options {
	
	private $sections;
	private $checkboxes;
	private $settings;
	
	/**
	 * Construct Theme Options
	 *
	 * @since 1.0
	 */
	public function __construct() {

		$this->checkboxes = array();
		$this->settings = array();
		$this->get_option();
		
		$this->sections['general']      = __( '一般設定', 'lang' );
		$this->sections['appearance']   = __( '外観設定', 'lang' );
		$this->sections['comments']   = __( 'コメント設定', 'lang' );
		$this->sections['api']   = __( 'API設定', 'lang' );
		$this->sections['miscellaneous']   = __( 'その他', 'lang' );
		
		add_action( 'admin_menu', array( &$this, 'add_pages' ) );
		add_action( 'admin_init', array( &$this, 'register_settings' ) );
		
		if ( ! get_option( 'mytheme_options' ) )
			$this->initialize_settings();
		
	}
	
	/**
	 * Add options page
	 *
	 * @since 1.0
	 */
	public function add_pages() {
		
		$admin_page = add_theme_page( __( 'テーマオプション', 'lang' ), __( 'テーマオプション', 'lang' ), 'manage_options', 'mytheme-options', array( &$this, 'display_page' ) );
		
		add_action( 'admin_print_scripts-' . $admin_page, array( &$this, 'scripts' ) );
		add_action( 'admin_print_styles-' . $admin_page, array( &$this, 'styles' ) );
		
	}
	
	/**
	 * Create settings field
	 *
	 * @since 1.0
	 */
	public function create_setting( $args = array() ) {
		
		$defaults = array(
			'id'      => 'default_field',
			'title'   => __( 'デフォルトの領域', 'lang' ),
			'desc'    => __( 'これはデフォルトの説明です。', 'lang' ),
			'std'     => '',
			'type'    => 'text',
			'section' => 'general',
			'choices' => array(),
			'class'   => ''
		);
			
		extract( wp_parse_args( $args, $defaults ) );
		
		$field_args = array(
			'type'      => $type,
			'id'        => $id,
			'desc'      => $desc,
			'std'       => $std,
			'choices'   => $choices,
			'label_for' => $id,
			'class'     => $class
		);
		
		if ( $type == 'checkbox' )
			$this->checkboxes[] = $id;
		
		add_settings_field( $id, $title, array( $this, 'display_setting' ), 'mytheme-options', $section, $field_args );
	}
	
	/**
	 * Display options page
	 *
	 * @since 1.0
	 */
	public function display_page() {
		
		echo '<div class="wrap">';
	
		if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true )
			echo '<div class="updated fade"><p>' . __( 'テーマオプションを更新しました。', 'lang' ) . '</p></div>';
		
		echo '<form action="options.php" method="post">';
	
		settings_fields( 'mytheme_options' );
		echo '<div class="ui-tabs">
		
		<h2 class="options_title">' . __( 'テーマオプション', 'lang' ) . '</h2>
		
			<ul class="ui-tabs-nav">';
		
		foreach ( $this->sections as $section_slug => $section )
			echo '<li><a href="#' . $section_slug . '">' . $section . '</a></li>';
		
		echo '</ul>';
		do_settings_sections( $_GET['page'] );
		
		echo '</div>
		<p class="submit"><input name="Submit" type="submit" class="button-primary" value="' . __( '変更を保存', 'lang' ) . '" /></p>
		
	</form>';
	
	echo '<script type="text/javascript">
		jQuery(document).ready(function($) {
			var sections = [];';
			
			foreach ( $this->sections as $section_slug => $section )
				echo "sections['$section'] = '$section_slug';";
			
			echo 'var wrapped = $(".wrap h3").wrap("<div class=\"ui-tabs-panel\">");
			wrapped.each(function() {
				$(this).parent().append($(this).parent().nextUntil("div.ui-tabs-panel"));
			});
			$(".ui-tabs-panel").each(function(index) {
				$(this).attr("id", sections[$(this).children("h3").text()]);
				if (index > 0)
					$(this).addClass("ui-tabs-hide");
			});
			$(".ui-tabs").tabs({
				fx: { opacity: "toggle", duration: "fast" }
			});
			
			$("input[type=text], textarea").each(function() {
				if ($(this).val() == $(this).attr("placeholder") || $(this).val() == "")
					$(this).css("color", "#999");
			});
			
			$("input[type=text], textarea").focus(function() {
				if ($(this).val() == $(this).attr("placeholder") || $(this).val() == "") {
					$(this).val("");
					$(this).css("color", "#000");
				}
			}).blur(function() {
				if ($(this).val() == "" || $(this).val() == $(this).attr("placeholder")) {
					$(this).val($(this).attr("placeholder"));
					$(this).css("color", "#999");
				}
			});
			
			$(".wrap h3, .wrap table").show();
			
			// This will make the "warning" checkbox class really stand out when checked.
			// I use it here for the Reset checkbox.
			$(".warning").change(function() {
				if ($(this).is(":checked"))
					$(this).parent().css("background", "#e74c3c").css("color", "#fff").css("fontWeight", "bold");
				else
					$(this).parent().css("background", "none").css("color", "inherit").css("fontWeight", "normal");
			});
			
			// Browser compatibility
			if ($.browser.mozilla) 
			         $("form").attr("autocomplete", "off");
		});
	</script>
</div>';
		
	}
	
	/**
	 * Description for section
	 *
	 * @since 1.0
	 */
	public function display_section() {
		// code
	}
	
	/**
	 * Description for About section
	 *
	 * @since 1.0
	 */
	public function display_about_section() {
		
		// This displays on the "About" tab. Echo regular HTML here, like so:
		// echo '<p>Copyright 2014 me@example.com</p>';
		
	}
	
	/**
	 * HTML output for text field
	 *
	 * @since 1.0
	 */
	public function display_setting( $args = array() ) {
		
		extract( $args );
		
		$options = get_option( 'mytheme_options' );
		
		if ( ! isset( $options[$id] ) && $type != 'checkbox' )
			$options[$id] = $std;
		elseif ( ! isset( $options[$id] ) )
			$options[$id] = 0;
		
		$field_class = '';
		if ( $class != '' )
			$field_class = ' ' . $class;
		
		switch ( $type ) {
			
			case 'heading':
				echo '</td></tr><tr valign="top"><td colspan="2"><h4>' . $desc . '</h4>';
				break;
			
			case 'checkbox':
				
				echo '<input class="checkbox' . $field_class . '" type="checkbox" id="' . $id . '" name="mytheme_options[' . $id . ']" value="1" ' . checked( $options[$id], 1, false ) . ' /> <label for="' . $id . '">' . $desc . '</label>';
				
				break;
			
			case 'select':
				echo '<select class="select' . $field_class . '" name="mytheme_options[' . $id . ']">';
				
				foreach ( $choices as $value => $label )
					echo '<option value="' . esc_attr( $value ) . '"' . selected( $options[$id], $value, false ) . '>' . $label . '</option>';
				
				echo '</select>';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'radio':
				$i = 0;
				foreach ( $choices as $value => $label ) {
					echo '<input class="radio' . $field_class . '" type="radio" name="mytheme_options[' . $id . ']" id="' . $id . $i . '" value="' . esc_attr( $value ) . '" ' . checked( $options[$id], $value, false ) . '> <label for="' . $id . $i . '">' . $label . '</label>';
					if ( $i < count( $options ) - 1 )
						echo '<br />';
					$i++;
				}
				
				if ( $desc != '' )
					echo '<span class="description">' . $desc . '</span>';
				
				break;
			
			case 'textarea':
				echo '<textarea class="' . $field_class . '" id="' . $id . '" name="mytheme_options[' . $id . ']" placeholder="' . $std . '" rows="5" cols="30">' . wp_htmledit_pre( $options[$id] ) . '</textarea>';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'password':
				echo '<input class="regular-text' . $field_class . '" type="password" id="' . $id . '" name="mytheme_options[' . $id . ']" value="' . esc_attr( $options[$id] ) . '" />';
				
				if ( $desc != '' )
					echo '<br /><span class="description">' . $desc . '</span>';
				
				break;
			
			case 'text':
			default:
		 		echo '<input class="regular-text' . $field_class . '" type="text" id="' . $id . '" name="mytheme_options[' . $id . ']" placeholder="' . $std . '" value="' . esc_attr( $options[$id] ) . '" />';
		 		
		 		if ( $desc != '' )
		 			echo '<br /><span class="description">' . $desc . '</span>';
		 		
		 		break;
		 	
		}
		
	}
	
	/**
	 * Settings and defaults
	 * 
	 * @since 1.0
	 */
	public function get_option() {
		
		/* General Settings
		===========================================*/
		

		

		$this->settings['title_header'] = array(
			'section' => 'general',
			'title'   => '', // Not used for headings.
			'desc'    => 'ヘッダー',
			'type'    => 'heading'
		);
		
		$this->settings['site_name'] = array(
			'title'   => __( 'サイト名', 'lang' ),
			'desc'    => __( 'お好みのサイト名を入力します (ロゴがアップロードされた場合には表示されません).', 'lang' ),
			'std'     => '',
			'type'    => 'text',
			'section' => 'general',
			'class' => ''
		);
		
		$this->settings['responsive_sticky'] = array(
			'section' => 'general',
			'title'   => __( '固定ヘッダー', 'lang' ),
			'desc'    => __( '固定ヘッダーを使用するか、しないかを選択します。', 'lang' ),
			'type'    => 'select',
			'std'     => 'choice1',
			'choices' => array(
				'choice1' => 'スクロール可能',
				'choice2' => '固定化'
			)
		);
		
		$this->settings['responsive_select'] = array(
			'section' => 'general',
			'title'   => __( 'レスポンシブ時の設定', 'lang' ),
			// 'desc'    => __( 'レスポンシブ時のヘッダーの位置を選択します。', 'lang' ),
                        'desc'    => __( 'レスポンシブ時のメニューボタンの位置を選択します。', 'lang' ),
			'type'    => 'select',
			'std'     => 'choice1',
			'choices' => array(
				// 'choice1' => '中央',
				'choice2' => '右側',
				'choice3' => '左側'
			)
		);
		


		
		
		
		$this->settings['title_posts'] = array(
			'section' => 'general',
			'title'   => '', // Not used for headings.
			'desc'    => '投稿',
			'type'    => 'heading'
		);
		

		$this->settings['date_format'] = array(
			'section' => 'general',
			'title'   => __( '日付の形式', 'lang' ),
			'desc'    => __( '日付の形式を選択し全体的に適用するか、<a href="http://wordpress.org/plugins/wp-days-ago/" target="_blank">DaysAgo</a> プラグインをインストールして使用してください.', 'lang' ),
			'type'    => 'select',
			'std'     => 'choice1',
			'choices' => array(
				'choice1' => '月 日 年',
				'choice2' => '日 月 年',
				'choice3' => '年 月 日',
				'choice4' => '年 日 月'
			)
		);
		

		$this->settings['title_gallery_widget'] = array(
			'section' => 'general',
			'title'   => '', // Not used for headings.
			'desc'    => 'ウィジェット',
			'type'    => 'heading'
		);

		

		$this->settings['widget_gallery_select'] = array(
			'section' => 'general',
			'title'   => __( 'ギャラリーウィジェット', 'lang' ),
			'desc'    => __( 'ギャラリーウィジェットを使用して表示させる画像の行を選択します。', 'lang' ),
			'type'    => 'select',
			'std'     => 'choice1',
			'choices' => array(
				'choice1' => '1',
				'choice2' => '2'
			)
		);	
		
		$this->settings['widget_team_select'] = array(
			'section' => 'general',
			'title'   => __( 'チームメンバーズウィジェット', 'lang' ),
			'desc'    => __( 'このウィジェットを使用して表示するレイアウトを選択します。', 'lang' ),
			'type'    => 'select',
			'std'     => 'choice1',
			'choices' => array(
				'choice1' => 'スタンダード',
				'choice2' => '拡張タイプ'
			)
		);	
		
		
	
	
		
		$this->settings['title_footersocial'] = array(
			'section' => 'general',
			'title'   => '', // Not used for headings.
			'desc'    => 'フッター ソーシャルアイコン',
			'type'    => 'heading'
		);
		
		$this->settings['social_fb'] = array(
			'title'   => __( '<i class="fa fa-facebook fa-2x"></i>', 'lang' ),
			'desc'    => __( 'あなたのFacebookページのURLを入力します。', 'lang' ),
			'std'     => '',
			'type'    => 'text',
			'section' => 'general',
			'class' => 'code'
		);
		
		$this->settings['social_tw'] = array(
			'title'   => __( '<i class="fa fa-twitter fa-2x"></i>', 'lang' ),
			'desc'    => __( 'あなたのTwitterページのURLを入力します。', 'lang' ),
			'std'     => '',
			'type'    => 'text',
			'section' => 'general',
			'class' => 'code'
		);
		
		$this->settings['social_yt'] = array(
			'title'   => __( '<i class="fa fa-youtube fa-2x"></i>', 'lang' ),
			'desc'    => __( 'あなたのYouTubeチャンネルのURLを入力します。', 'lang' ),
			'std'     => '',
			'type'    => 'text',
			'section' => 'general',
			'class' => 'code'
		);
		
		$this->settings['social_ig'] = array(
			'title'   => __( '<i class="fa fa-instagram fa-2x"></i>', 'lang' ),
			'desc'    => __( 'あなたのInstagramページのURLを入力します。', 'lang' ),
			'std'     => '',
			'type'    => 'text',
			'section' => 'general',
			'class' => 'code'
		);
		
		$this->settings['social_dr'] = array(
			'title'   => __( '<i class="fa fa-dribbble fa-2x"></i>', 'lang' ),
			'desc'    => __( 'あなたのDribbbleページのURLを入力します。', 'lang' ),
			'std'     => '',
			'type'    => 'text',
			'section' => 'general',
			'class' => 'code'
		);
		
		$this->settings['social_pi'] = array(
			'title'   => __( '<i class="fa fa-pinterest fa-2x"></i>', 'lang' ),
			'desc'    => __( 'あなたのPinterestページのURLを入力します。', 'lang' ),
			'std'     => '',
			'type'    => 'text',
			'section' => 'general',
			'class' => 'code'
		);
	
	
		
		$this->settings['title_footer'] = array(
			'section' => 'general',
			'title'   => '', // Not used for headings.
			'desc'    => 'フッター',
			'type'    => 'heading'
		);


		$this->settings['copyright'] = array(
			'title'   => __( 'コピーライトテキスト', 'lang' ),
			'desc'    => __( 'フッターに表示するコピーライト表示をここで変更できます。（基本的なHTMLタグが使用できます）.', 'lang' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'general',
			'class'   => 'code'
		);
		


		/* Appearance
		===========================================*/

		
		$this->settings['title_appearance_header'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'ヘッダー',
			'type'    => 'heading'
		);
		
		$this->settings['header_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['header_bgalpha'] = array(
			'section' => 'appearance',
			'title' => __( '背景透過', 'lang' ),
			'desc' => __( '任意の透過度を選択してください （デフォルト値は透過なし）', 'lang' ),
			'class' => "",
			'type' => 'text',
			'std' => '100'
		);
		
		$this->settings['header_sepcolor'] = array(
			'section' => 'appearance',
			'title' => __( '枠線の色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'e3e3e3'
		);
		
		$this->settings['title_appearance_sitename'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'サイト名',
			'type'    => 'heading'
		);
		
		$this->settings['sitename_color'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		/* --- Modify kazaoki.lab / 2015.6.29 --- */
		$this->settings['title_under_page'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => '下層ページタイトル部分',
			'type'    => 'heading'
		);
		
		$this->settings['under_page_post_title_bg_color'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#19bb9b',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);

		$this->settings['under_page_post_title_color'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#ffffff',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		/* - - - - - - - - - - */

		$this->settings['title_appearance_dropmenu'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'ドロップメニュー',
			'type'    => 'heading'
		);
		
		$this->settings['menu_drop_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'ボタンの背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['menu_drop_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'ボタンの文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '8a8a8a'
		);
		
		$this->settings['menu_drop_hover_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'ボタンのホバー時の背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'f5f5f5'
		);
		
		$this->settings['menu_drop_hover_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'ボタンのホバー時の文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '8a8a8a'
		);
		
		$this->settings['menu_drop_active_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'ボタンがアクティブ時の背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['menu_drop_active_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'ボタンがアクティブ時の文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['title_appearance_mobmenu'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'モバイルメニュー',
			'type'    => 'heading'
		);
		
		$this->settings['menu_resp_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'ボタンの背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'f5f5f5'
		);
		
		$this->settings['menu_resp_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'ボタンの文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '8a8a8a'
		);
		
		$this->settings['menu_resp_alt_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'サブメニューの背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'f0f0f0'
		);
		
		$this->settings['menu_resp_hover_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'ホバー時の背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['menu_resp_hover_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'ホバー時の文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['title_jetpack'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'Jetpack',
			'type'    => 'heading'
		);
		
		$this->settings['jetpack_hicolor'] = array(
			'section' => 'appearance',
			'title' => __( 'ハイライト表示色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['title_pagination'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'ページネーション',
			'type'    => 'heading'
		);
		
		$this->settings['pagination_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '36363c'
		);
		
		$this->settings['pagination_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['pagination_hicolor'] = array(
			'section' => 'appearance',
			'title' => __( 'ハイライト表示色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['title_tooltip'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'ツールチップ',
			'type'    => 'heading'
		);
		
		$this->settings['tooltip_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'F47723'
		);
		
		$this->settings['tooltip_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['title_bttb'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => '”トップに戻る”ボタン',
			'type'    => 'heading'
		);
		
		$this->settings['bttb_color'] = array(
			'section' => 'appearance',
			'title' => __( 'ボタンの色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['title_appearance_widget'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'ウィジェット基本設定',
			'type'    => 'heading'
		);
		
		$this->settings['widget_widget_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['widget_widget_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['widget_widget_list_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'リストの背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['widget_widget_list_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'リストの文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['widget_widget_list_hover_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'リスト ホバー時の背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['widget_widget_list_hover_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'リスト ホバー時の文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['title_appearance_widget1'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'カスタムコードウィジェット #1',
			'type'    => 'heading'
		);
		
		$this->settings['widget1_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['widget1_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['title_appearance_widget2'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'カスタムコードウィジェット #2',
			'type'    => 'heading'
		);
		
		$this->settings['widget2_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['widget2_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['title_appearance_widget3'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'カスタムコードウィジェット #3',
			'type'    => 'heading'
		);
		
		$this->settings['widget3_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['widget3_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
				
		$this->settings['title_appearance_typer'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'テキストタイパーウィジェット',
			'type'    => 'heading'
		);
		
		$this->settings['widget_typer_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['widget_typer_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '8a8a8a'
		);
		
		$this->settings['widget_typer_spancolor'] = array(
			'section' => 'appearance',
			'title' => __( 'スパンカラー', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['title_appearance_announce'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'インフォメーションウィジェット',
			'type'    => 'heading'
		);
		
		$this->settings['widget_announce_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['widget_announce_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['title_appearance_announce2'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'インフォメーションウィジェット2',
			'type'    => 'heading'
		);
		
		$this->settings['widget_announce2_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['widget_announce2_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['title_appearance_blog'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'ブログ記事ウィジェット',
			'type'    => 'heading'
		);
		
		$this->settings['widget_blog_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'f5f5f5'
		);
		
		$this->settings['widget_blog_altcolor'] = array(
			'section' => 'appearance',
			'title' => __( '代替色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);	
		
		$this->settings['widget_blog_highlightcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'ハイライト表示色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);	
		
		$this->settings['widget_blog_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '8a8a8a'
		);			

		$this->settings['title_appearance_youtube'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'YouTubeウィジェット',
			'type'    => 'heading'
		);
		
		$this->settings['widget_youtube_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['title_appearance_action'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'アクションフォームウィジェット',
			'type'    => 'heading'
		);
		
		$this->settings['widget_action_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'f5f5f5'
		);
		
		$this->settings['widget_action_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '8a8a8a'
		);
		
		$this->settings['widget_action_formcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'フォームの色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['widget_action_pformcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'フォームの文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['title_appearance_team'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'チームメンバーズウィジェット',
			'type'    => 'heading'
		);
		
		$this->settings['widget_team_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['widget_team_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '8a8a8a'
		);
		
		$this->settings['widget_team_overlaycolor'] = array(
			'section' => 'appearance',
			'title' => __( 'オーバーレイの色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['title_appearance_gallery'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'ギャラリーウィジェット',
			'type'    => 'heading'
		);
		
		$this->settings['widget_gallery_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'f5f5f5'
		);
		
		$this->settings['widget_gallery_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '8a8a8a'
		);
		
		$this->settings['widget_gallery_overlaycolor'] = array(
			'section' => 'appearance',
			'title' => __( 'オーバーレイの色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['title_grid_action'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'テキストグリッドウィジェット',
			'type'    => 'heading'
		);
		
		$this->settings['widget_grid_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['widget_grid_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['title_appearance_table'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'プライシングテーブルウィジェット',
			'type'    => 'heading'
		);
		
		$this->settings['widget_table_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['widget_table_tablecolor'] = array(
			'section' => 'appearance',
			'title' => __( '価格表の色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '36363c'
		);
		
		$this->settings['widget_table_sepcolor'] = array(
			'section' => 'appearance',
			'title' => __( '仕切り線の色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '000000'
		);
		
		$this->settings['widget_table_titlecolor'] = array(
			'section' => 'appearance',
			'title' => __( 'タイトル文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['widget_table_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '8a8a8a'
		);
		
		$this->settings['widget_table_listbgcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'リストの背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'f5f5f5'
		);
		
		$this->settings['widget_table_listpcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'リストの文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '8a8a8a'
		);
		
		$this->settings['widget_table_listsepcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'リストの仕切り線の色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'cdcdcd'
		);
		
		$this->settings['widget_table_buttonbgcolor'] = array(
			'section' => 'appearance',
			'title' => __( 'ボタンの色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['widget_table_buttonhovercolor'] = array(
			'section' => 'appearance',
			'title' => __( 'ホバー時のボタンの色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['title_appearance_footer'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'フッター',
			'type'    => 'heading'
		);
		
		$this->settings['footer_bgcolor'] = array(
			'section' => 'appearance',
			'title' => __( '背景色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '36363c'
		);
		
		$this->settings['footer_pcolor'] = array(
			'section' => 'appearance',
			'title' => __( '文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		$this->settings['footer_link_color'] = array(
			'section' => 'appearance',
			'title' => __( 'リンクの色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '8a8a8a'
		);
		
		$this->settings['footer_link_hover_color'] = array(
			'section' => 'appearance',
			'title' => __( 'ホバー時のリンク色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#333333',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => 'ffffff'
		);
		
		/* --- Modify kazaoki.lab / 2015.6.22 --- */
		$this->settings['title_archive'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'アーカイブページ',
			'type'    => 'heading'
		);
		
		$this->settings['archive_post_title_color'] = array(
			'section' => 'appearance',
			'title' => __( '記事タイトル文字色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HVS',pickerFaceColor:'#19bb9b',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		
		$this->settings['archive_next_button_color'] = array(
			'section' => 'appearance',
			'title' => __( '「続きを読む」ボタンの色', 'lang' ),
			'desc' => __( '任意の色を選択してください （デフォルト値は空白のまま）', 'lang' ),
			'class' => "color {pickerMode:'HSV',pickerFaceColor:'#19bb9b',pickerBorder: 0}", // Custom class for CSS
			'type' => 'text',
			'std' => '19bb9b'
		);
		/* - - - - - - - - - - */
		
		$this->settings['title_styling'] = array(
			'section' => 'appearance',
			'title'   => '', // Not used for headings.
			'desc'    => 'スタイリング',
			'type'    => 'heading'
		);
		
		$this->settings['custom_css'] = array(
			'title'   => __( 'カスタム CSS', 'lang' ),
			'desc'    => __( '任意のカスタムcssを入力することでテーマに反映させることができます。', 'lang' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'appearance',
			'class'   => 'code'
		);
		
	

		/* API
		===========================================*/


		$this->settings['title_api'] = array(
			'section' => 'api',
			'title'   => '', // Not used for headings.
			'desc'    => 'APIの選択',
			'type'    => 'heading'
		);

		

		$this->settings['api_select'] = array(
			'section' => 'api',
			'title'   => __( 'APIの有効化', 'lang' ),
			'desc'    => __( 'どのAPIに接続するかを選択します。', 'lang' ),
			'type'    => 'select',
			'std'     => 'choice1',
			'choices' => array(
				'choice1' => 'Facebook & Twitter',
				'choice2' => 'Facebook',
				'choice3' => 'Twitter'
			)
		);
		
		$this->settings['title_api_fb'] = array(
			'section' => 'api',
			'title'   => '', // Not used for headings.
			'desc'    => 'Facebook',
			'type'    => 'heading'
		);
		
		$this->settings['api_fb_share_url'] = array(
			'title'   => __( 'FACEBOOKシェア数を取得したいURL', 'lang' ),
			'desc'    => __( '※FACEBOOKのページなど、取得できないURLもありますのでご了承ください。<br>※取得したシェア数は最大1時間キャッシュされます。', 'lang' ),
			'std'     => 'http',
			'type'    => 'text',
			'section' => 'api',
			'class' => 'code'
		);
		
		$this->settings['title_api_tw'] = array(
			'section' => 'api',
			'title'   => '', // Not used for headings.
			'desc'    => 'Twitter',
			'type'    => 'heading'
		);
		
		$this->settings['api_tw_name'] = array(
			'title'   => __( 'Twitterユーザーネーム', 'lang' ),
			'desc'    => __( 'あなたのTwitterのアカウント名を入力します。', 'lang' ),
			'std'     => '',
			'type'    => 'text',
			'section' => 'api',
			'class' => 'code'
		);
		
		$this->settings['api_tw_key'] = array(
			'title'   => __( 'APIキー', 'lang' ),
			'desc'    => __( 'あなたのTwitterのAPIキーを入力します。(Twitter APIキーの取得は <a href="https://apps.twitter.com/" target="_blank">こちらから</a>).', 'lang' ),
			'std'     => '',
			'type'    => 'text',
			'section' => 'api',
			'class' => 'code'
		);
		
		$this->settings['api_tw_secret'] = array(
			'title'   => __( 'APIシークレットキー', 'lang' ),
			'desc'    => __( 'あなたのTwitterのAPIシークレットキーを入力します。', 'lang' ),
			'std'     => '',
			'type'    => 'text',
			'section' => 'api',
			'class' => 'code'
		);
		
		$this->settings['title_social_note'] = array(
			'section' => 'api',
			'title'   => '', // Not used for headings.
			'desc'    => '注: フェイスブックやツイッターのAPI設定で頻繁に更新するとあなたのサイトがAPIの「ブラックリスト」に登録される可能性がありますので、APIによる更新頻度は「24時間毎に1回」で設定して頂くことを推奨します。',
			'type'    => 'heading'
		);
		
		
		/* Comments Settings
		===========================================*/

		$this->settings['title_commenting'] = array(
			'section' => 'comments',
			'title'   => '', // Not used for headings.
			'desc'    => 'コメント',
			'type'    => 'heading'
		);

		$this->settings['comments_selector'] = array(
			'section' => 'comments',
			'title'   => __( 'コメントシステム', 'lang' ),
			'desc'    => __( 'コメントで使用するシステムを選択してください。<br />必要に応じて下記のフォームに情報を記入します。', 'lang' ),
			'type'    => 'select',
			'std'     => 'choice6',
			'choices' => array(
				'choice1' => 'Disqus.com',
				'choice2' => 'Wordpress &amp; Gravatars',
				'choice3' => 'JetPack',
				'choice4' => 'Facebook',
				'choice5' => 'LiveFyre',
				'choice6' => 'None'
			)
		);
		
		
		$this->settings['comments_disqus'] = array(
			'title'   => __( 'Disqus', 'lang' ),
			'desc'    => __( '<a href="http://disqus.com/" target="_blank">Disqus</a>のコメント機能を有効化するためにユニバーサルコードを追加します。', 'lang' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'comments',
			'class' => 'code'
		);
		
		$this->settings['comments_livefyre'] = array(
			'title'   => __( 'LiveFyre', 'lang' ),
			'desc'    => __( '<a href="http://livefyre.com/" target="_blank">LiveFyre</a>のコメント機能を有効化するためにコメントコードを追加します。', 'lang' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'comments',
			'class' => 'code'
		);
		
		$this->settings['comments_facebook_sdk'] = array(
			'title'   => __( 'Facebook SDK', 'lang' ),
			'desc'    => __( '<a href="https://developers.facebook.com/docs/plugins/comments/" target="_blank">Facebook</a>のコメント機能を有効化するためにFacebook SDKのJavaScriptコード を追加します。', 'lang' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'comments',
			'class' => 'code'
		);
		
		$this->settings['comments_facebook'] = array(
			'title'   => __( 'Facebookプラグイン', 'lang' ),
			'desc'    => __( '<a href="https://developers.facebook.com/docs/plugins/comments/" target="_blank">Facebookプラグイン</a>で使用するコードを追加します。', 'lang' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'comments',
			'class' => 'code'
		);
		
	
		
		/* Miscellaneous Settings
		===========================================*/


		$this->settings['title_appearance_jquery'] = array(
			'section' => 'miscellaneous',
			'title'   => '', // Not used for headings.
			'desc'    => 'jQueryの効果',
			'type'    => 'heading'
		);
		
		$this->settings['appearance_animation'] = array(
			'section' => 'miscellaneous',
			'title'   => __( 'アニメーションのレベル', 'lang' ),
			'desc'    => __( 'お好みのアニメーションレベルを選択します。', 'lang' ),
			'type'    => 'select',
			'std'     => 'choice3',
			'choices' => array(
				'choice1' => 'Maximum',
				'choice2' => 'Moderate',
				'choice3' => 'Minimum'
			)
		);
		
		$this->settings['select_nicescroll'] = array(
			'section' => 'miscellaneous',
			'title'   => __( 'スムーズスクロール', 'lang' ),
			'desc'    => __( 'ブラウザ上でのスムーズなスクロール効果を追加します。', 'lang' ),
			'type'    => 'radio',
			'std'     => 'choice2',
			'choices' => array(
				'choice1' => '使用する',
				'choice2' => '使用しない'
			)
		);
		
		$this->settings['select_backtop'] = array(
			'section' => 'miscellaneous',
			'title'   => __( '”トップへ戻る”ボタン', 'lang' ),
			'desc'    => __( '”トップへ戻る”ボタンのスタイルをお好みで変更することができます。', 'lang' ),
			'type'    => 'select',
			'std'     => 'choice1',
			'choices' => array(
				'choice1' => 'Chevron',
				'choice2' => 'Chevron Circle',
				'choice3' => 'Angle',
				'choice4' => 'Angle Double',
				'choice5' => 'Circle Clear',
				'choice6' => 'Circle Solid',
				'choice7' => 'Arrow',
				'choice8' => 'Caret',
				'choice9' => 'Caret Square',
				'choice10' => 'None'
			)
		);
		
		$this->settings['bttb_shadow'] = array(
			'section' => 'miscellaneous',
			'title'   => __( 'ボタンにシャドウを追加', 'lang' ),
			'desc'    => __( '”トップへ戻る”ボタンにシャドウ効果を追加できます。', 'lang' ),
			'type'    => 'radio',
			'std'     => 'choice2',
			'choices' => array(
				'choice1' => 'Flat',
				'choice2' => 'Shadowed'
			)
		);
		
		$this->settings['select_tooltips'] = array(
			'section' => 'miscellaneous',
			'title'   => __( '不具合防止設定', 'lang' ),
			'desc'    => __( 'プラグイン機能とテーマ機能の干渉による不具合を防止するため、現在のご利用状況に合わせて正しく設定して下さい。', 'lang' ),
			'type'    => 'radio',
			'std'     => 'choice2',
			'choices' => array(
				'choice1' => 'Smart Shortcodeプラグインは有効化していない',
				'choice2' => 'Smart Shortcodeプラグインを有効化している'
			)
		);

		
		$this->settings['title_seo'] = array(
			'section' => 'miscellaneous',
			'title'   => '', // Not used for headings.
			'desc'    => 'トップページ用のSEO設定',
			'type'    => 'heading'
		);
		
		$this->settings['misc_metadesc'] = array(
			'title'   => __( 'メタディスクリプション', 'lang' ),
			'desc'    => __( 'お好みでサイトの説明文を追加できます。 (オプション)', 'lang' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'miscellaneous',
			'class'   => 'code'
		);
		
		$this->settings['misc_metakeywords'] = array(
			'title'   => __( 'メタキーワード', 'lang' ),
			'desc'    => __( 'サイトに関するキーワードをカンマ区切りで追加できます(オプション)', 'lang' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'miscellaneous',
			'class'   => 'code'
		);

		
		$this->settings['title_analytics'] = array(
			'section' => 'miscellaneous',
			'title'   => '', // Not used for headings.
			'desc'    => 'アクセス解析(フッターに適用)',
			'type'    => 'heading'
		);
		
		$this->settings['misc_analytics'] = array(
			'title'   => __( 'トラッキングコード', 'lang' ),
			'desc'    => __( 'お使いのアクセス解析のトラッキングコードを入力します。 (オプション)', 'lang' ),
			'std'     => '',
			'type'    => 'textarea',
			'section' => 'miscellaneous',
			'class'   => 'code'
		);
		


		
	}
	
	/**
	 * Initialize settings to their default values
	 * 
	 * @since 1.0
	 */
	public function initialize_settings() {
		
		$default_settings = array();
		foreach ( $this->settings as $id => $setting ) {
			if ( $setting['type'] != 'heading' )
				$default_settings[$id] = $setting['std'];
		}
		
		update_option( 'mytheme_options', $default_settings );
		
	}
	
	/**
	* Register settings
	*
	* @since 1.0
	*/
	public function register_settings() {
		
		register_setting( 'mytheme_options', 'mytheme_options', array ( &$this, 'validate_settings' ) );
		
		foreach ( $this->sections as $slug => $title ) {
			if ( $slug == 'about' )
				add_settings_section( $slug, $title, array( &$this, 'display_about_section' ), 'mytheme-options' );
			else
				add_settings_section( $slug, $title, array( &$this, 'display_section' ), 'mytheme-options' );
		}
		
		$this->get_option();
		
		foreach ( $this->settings as $id => $setting ) {
			$setting['id'] = $id;
			$this->create_setting( $setting );
		}
		
	}
	
	/**
	* jQuery Tabs
	*
	* @since 1.0
	*/
	public function scripts() {
		
		wp_print_scripts( 'jquery-ui-tabs' );
		
	}
	
	/**
	* Styling for the theme options page
	*
	* @since 1.0
	*/
	public function styles() {
		
		wp_register_style( 'mytheme-admin', get_template_directory_uri() . '/options/options.css' );
		wp_enqueue_style( 'mytheme-admin' );
		
	}
	
	/**
	* Validate settings
	*
	* @since 1.0
	*/
	public function validate_settings( $input ) {
		
		if ( ! isset( $input['reset_theme'] ) ) {
			$options = get_option( 'mytheme_options' );
			
			foreach ( $this->checkboxes as $id ) {
				if ( isset( $options[$id] ) && ! isset( $input[$id] ) )
					unset( $options[$id] );
			}
			
			return $input;
		}
		return false;
		
	}
	
}

$theme_options = new My_Theme_Options();

function mytheme_option( $option ) {
	$options = get_option( 'mytheme_options' );
	if ( isset( $options[$option] ) )
		return $options[$option];
	else
		return false;
}
?>