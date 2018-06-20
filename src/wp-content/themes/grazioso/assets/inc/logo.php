<?php 
 /**
  * @package TRIAD Inc.
  * @since 1.0
 */
 
 
 
	/**
	 * Build integrated image logo uploader
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	 
	function customlogo_get_default_options() {
		$options = array(
			'logo' => ''
		);
		return $options;
	}
	
	function customlogo_sp_get_default_options() {
		$options = array(
			'logo' => ''
		);
		return $options;
	}
	
	function customlogo_options_init() {
		$customlogo_options = get_option( 'theme_customlogo_options' );
		if ( false === $customlogo_options ) {
			$customlogo_options = customlogo_get_default_options();
			add_option( 'theme_customlogo_options', $customlogo_options );
		}
	}
	add_action( 'after_setup_theme', 'customlogo_options_init' );
	
	function customlogo_sp_options_init() {
		$customlogo_options = get_option( 'theme_customlogo_sp_options' );
		if ( false === $customlogo_options ) {
			$customlogo_options = customlogo_get_default_options();
			add_option( 'theme_customlogo_sp_options', $customlogo_options );
		}
	}
	add_action( 'after_setup_theme', 'customlogo_sp_options_init' );
	
	function customlogo_options_setup() {
		global $pagenow;
		if ('media-upload.php' == $pagenow || 'async-upload.php' == $pagenow) {
			add_filter( 'gettext', 'replace_thickbox_text' , 1, 2 );
		}
	}
	add_action( 'admin_init', 'customlogo_options_setup' );
	
	function customlogo_sp_options_setup() {
		global $pagenow;
		if ('media-upload.php' == $pagenow || 'async-upload.php' == $pagenow) {
			add_filter( 'gettext', 'replace_thickbox_text' , 1, 2 );
		}
	}
	add_action( 'admin_init', 'customlogo_sp_options_setup' );
	
	function replace_thickbox_text($translated_text, $text ) {	
		if ( 'Insert into Post' == $text ) {
			$referer = strpos( wp_get_referer(), 'customlogo-settings' );
			if ( $referer != '' ) {
				return __('Use as Logo', 'customlogo' );
			} else {
			    $referer = strpos( wp_get_referer(), 'customlogo_sp-settings' );
			    if ( $referer != '' ) {
				return __('Use as Logo', 'customlogo_sp' );
			    }
			}
		}
		return $translated_text;
	}
	
	function customlogo_menu_options() {
		add_theme_page('ロゴの設定', 'ロゴの設定', 'edit_theme_options', 'customlogo-settings', 'customlogo_admin_options_page');
	}
	add_action('admin_menu', 'customlogo_menu_options');
	
	
	
	function customlogo_admin_options_page() {
	?>
	<div class="wrap">
        <div id="icon-themes" class="icon32"><br /></div>
        <h2><?php _e( 'ロゴの設定', 'lang' ); ?></h2>
        <?php settings_errors( 'customlogo-settings-errors' ); ?>
        <form id="form-customlogo-options" action="options.php" method="post" enctype="multipart/form-data">
            <?php
                settings_fields('theme_customlogo_options');
                do_settings_sections('customlogo');
            ?>
            <p class="submit">
                <input name="theme_customlogo_options[submit]" id="submit_options_logo_form" type="submit" class="button-primary" value="<?php esc_attr_e('設定を保存', 'lang'); ?>" />
                <input name="theme_customlogo_options[reset]" type="submit" class="button-secondary" value="<?php esc_attr_e('デフォルトに戻す', 'lang'); ?>" />		
            </p>
        </form>
	
	<!-- theme_customlogo_options -->
<!--	<h2><?php _e( 'スマートフォン用ロゴの設定', 'lang' ); ?></h2>-->
        <?php settings_errors( 'customlogo_sp-settings-errors' ); ?>
        <form id="form-customlogo_sp-options" action="options.php" method="post" enctype="multipart/form-data">
            <?php
                settings_fields('theme_customlogo_sp_options');
                do_settings_sections('customlogo_sp');
            ?>
            <p class="submit">
                <input name="theme_customlogo_sp_options[submit]" id="submit_options_logo_sp_form" type="submit" class="button-primary" value="<?php esc_attr_e('設定を保存', 'lang'); ?>" />
                <input name="theme_customlogo_sp_options[reset]" type="submit" class="button-secondary" value="<?php esc_attr_e('デフォルトに戻す', 'lang'); ?>" />		
            </p>
        </form>
	
    </div>
	<?php
	}
	
	function customlogo_options_validate( $input ) {
		$default_options = customlogo_get_default_options();
		$valid_input = $default_options;
		$customlogo_options = get_option('theme_customlogo_options');
		$submit = ! empty($input['submit']) ? true : false;
		$reset = ! empty($input['reset']) ? true : false;
		$delete_logo = ! empty($input['delete_logo']) ? true : false;
		if ( $submit ) {
			if ( $customlogo_options['logo'] != $input['logo']  && $customlogo_options['logo'] != '' )
				delete_image( $customlogo_options['logo'] );
			$valid_input['logo'] = $input['logo'];
			}
		elseif ( $reset ) {
			delete_image( $customlogo_options['logo'] );
			$valid_input['logo'] = $default_options['logo'];
		}
		elseif ( $delete_logo ) {
			delete_image( $customlogo_options['logo'] );
		$valid_input['logo'] = '';
		}
		return $valid_input;
	}
        
        function customlogo_sp_options_validate( $input ) {
		$default_options = customlogo_sp_get_default_options();
		$valid_input = $default_options;
		$customlogo_options = get_option('theme_customlogo_sp_options');
		$submit = ! empty($input['submit']) ? true : false;
		$reset = ! empty($input['reset']) ? true : false;
		$delete_logo = ! empty($input['delete_logo']) ? true : false;
		if ( $submit ) {
			if ( $customlogo_options['logo'] != $input['logo']  && $customlogo_options['logo'] != '' )
				delete_image( $customlogo_options['logo'] );
			$valid_input['logo'] = $input['logo'];
			}
		elseif ( $reset ) {
			delete_image( $customlogo_options['logo'] );
			$valid_input['logo'] = $default_options['logo'];
		}
		elseif ( $delete_logo ) {
			delete_image( $customlogo_options['logo'] );
		$valid_input['logo'] = '';
		}
		return $valid_input;
	}
        
	function delete_image( $image_url ) {
		global $wpdb;
		$query = "SELECT ID FROM wp_posts where guid = '" . esc_url($image_url) . "' AND post_type = 'attachment'";  
		$results = $wpdb -> get_results($query);
		foreach ( $results as $row ) {
			wp_delete_attachment( $row -> ID );
		}	
	}
	
	function customlogo_options_settings_init() {
				register_setting( 'theme_customlogo_options', 'theme_customlogo_options', 'customlogo_options_validate' );
		add_settings_section('customlogo_settings_header', __( 'ロゴ画像アップロード', 'lang' ), 'customlogo_settings_header_text', 'customlogo');
		add_settings_field('customlogo_setting_logo',  __( 'ロゴ画像', 'lang' ), 'customlogo_setting_logo', 'customlogo', 'customlogo_settings_header');
		add_settings_field('customlogo_setting_logo_preview',  __( 'ロゴのプレビュー', 'lang' ), 'customlogo_setting_logo_preview', 'customlogo', 'customlogo_settings_header');
		
		
		register_setting( 'theme_customlogo_sp_options', 'theme_customlogo_sp_options', 'customlogo_sp_options_validate' );
		add_settings_section('customlogo_sp_settings_header', __( '', 'lang' ), 'customlogo_sp_settings_header_text', 'customlogo_sp');
		add_settings_field('customlogo_sp_setting_logo',  __( 'SP用ロゴ画像', 'lang' ), 'customlogo_sp_setting_logo', 'customlogo_sp', 'customlogo_sp_settings_header');
		add_settings_field('customlogo_sp_setting_logo_preview',  __( 'SP用ロゴのプレビュー', 'lang' ), 'customlogo_sp_setting_logo_preview', 'customlogo_sp', 'customlogo_sp_settings_header');
	}
	add_action( 'admin_init', 'customlogo_options_settings_init' );
	
	function customlogo_setting_logo_preview() {
		$customlogo_options = get_option( 'theme_customlogo_options' );  ?>
		<div id="upload_logo_preview" style="min-height: 100px;">
			<img style="max-width:100%;" src="<?php echo esc_url( $customlogo_options['logo'] ); ?>" />
		</div>
	<?php
	}
	
	function customlogo_settings_header_text() {
	?>
		<p><?php _e( 'ロゴとして使用する任意の画像をアップロードすることができます。', 'lang' ); ?></p>
		<p><b><?php _e( 'アップロードする画像は長方形のものを選択されることをお勧めします。', 'lang' ); ?></b></p>
	<?php
	}
	
	function customlogo_sp_settings_header_text() {
	?>
	<?php
	}
	
	function customlogo_setting_logo() {
		$customlogo_options = get_option( 'theme_customlogo_options' );
	?>
		<input type="hidden" id="logo_url" name="theme_customlogo_options[logo]" value="<?php echo esc_url( $customlogo_options['logo'] ); ?>" />
		<input id="upload_logo_button" type="button" class="button" value="<?php _e( 'ロゴをアップロード', 'lang' ); ?>" />
			<?php if ( '' != $customlogo_options['logo'] ): ?>
				<input id="delete_logo_button" name="theme_customlogo_options[delete_logo]" type="submit" class="button" value="<?php _e( 'ロゴを削除', 'lang' ); ?>" />
			<?php endif; ?>
		<?php
	}
	
	
	function customlogo_sp_setting_logo_preview() {
		$customlogo_options = get_option( 'theme_customlogo_sp_options' );  ?>
		<div id="upload_logo_sp_preview" style="min-height: 100px;">
			<img style="max-width:100%;" src="<?php echo esc_url( $customlogo_options['logo'] ); ?>" />
		</div>
	<?php
	}
	function customlogo_sp_setting_logo() {
		$customlogo_options = get_option( 'theme_customlogo_sp_options' );
	?>
		<input type="hidden" id="logo_sp_url" name="theme_customlogo_sp_options[logo]" value="<?php echo esc_url( $customlogo_options['logo'] ); ?>" />
		<input id="upload_logo_sp_button" type="button" class="button" value="<?php _e( 'SP用ロゴをアップロード', 'lang' ); ?>" />
			<?php if ( '' != $customlogo_options['logo'] ): ?>
				<input id="delete_logo_button" name="theme_customlogo_sp_options[delete_logo]" type="submit" class="button" value="<?php _e( 'SP用ロゴを削除', 'lang' ); ?>" />
			<?php endif; ?>
		<?php
	}
	/**
	 * Display custom logo or sitename & description text
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
		
	function sitename () { ?>
		<?php $customlogo_options = get_option('theme_customlogo_options'); ?>
                <?php $customlogosp_options = get_option('theme_customlogo_sp_options'); ?>
            <?php if ( $customlogosp_options['logo'] != '' ) { ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            	<img src="<?php echo $customlogosp_options['logo']; ?>" id="sitelogo_sp" alt="sitelogo" class="img" />
            </a>
            <?php } else { ?>
			<?php if ( mytheme_option( 'site_name' ) && mytheme_option( 'site_name' ) != '' ) { ?>
				<h1 id="sitename_sp" class="sitename">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['site_name']; echo stripslashes($echo_options); ?>
					</a>
				</h1>
			<?php } else { ?>
				<h1 id="sitename_sp" class="sitename">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php echo get_bloginfo('name'); ?>
					</a>
				</h1>
			<?php } ?>
		<?php } ?>
                                
		<?php if ( $customlogo_options['logo'] != '' ) { ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            	<img src="<?php echo $customlogo_options['logo']; ?>" id="sitelogo" alt="sitelogo" class="img" />
            </a>
		<?php } else { ?>
			<?php if ( mytheme_option( 'site_name' ) && mytheme_option( 'site_name' ) != '' ) { ?>
				<h1 id="sitename" class="sitename">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['site_name']; echo stripslashes($echo_options); ?>
					</a>
				</h1>
			<?php } else { ?>
				<h1 id="sitename" class="sitename">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php echo get_bloginfo('name'); ?>
					</a>
				</h1>
			<?php } ?>
		<?php } ?>
	<?php }


?>