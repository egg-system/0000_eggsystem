<?php 
 /**
  * @package TRIAD Inc.
  * @since 1.0
 */
	
	
	 
 
 	/**
	 * Include all required asset files
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	get_template_part( 'options/options' ); 
	get_template_part( 'options/css' ); 
	get_template_part( 'assets/includes' ); 
	get_template_part( 'assets/inc/trim' ); 
	get_template_part( 'assets/inc/menus' ); 
	get_template_part( 'assets/inc/social' ); 
	get_template_part( 'assets/inc/logo' ); 
	get_template_part( 'assets/inc/shortcodes' );
	get_template_part( 'assets/inc/bringfeed' );
	get_template_part( 'assets/inc/widgets' ); 
	




	/**
	 * Load JS files as needed
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	function script_init() {
		
		wp_enqueue_script('jquery');
		
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		
		if ( mytheme_option( 'select_nicescroll' ) && mytheme_option( 'select_nicescroll' ) == 'choice2' ) {
		} else { 
			$nicescroll= get_template_directory_uri() . "/js/jquery.nicescroll.min.js";
			wp_register_script( 'nicescroll', $nicescroll);
			wp_enqueue_script( 'nicescroll');
			
			$scrollspeed= get_template_directory_uri() . "/js/scrollspeed.js";
			wp_register_script( 'scrollspeed', $scrollspeed);
			wp_enqueue_script( 'scrollspeed');
		}					

		if ( mytheme_option( 'appearance_animation' ) && mytheme_option( 'appearance_animation' ) == 'choice1' ) {
			@$wow= get_template_directory_uri() . "/js/wow.js";
			wp_register_script( 'wow', @$wow);
			wp_enqueue_script( 'wow');
	
			@$wowstart= get_template_directory_uri() . "/js/wowstart.js";
			wp_register_script( 'wowstart', @$wowstart );
			wp_enqueue_script( 'wowstart');
		} else { 
			wp_deregister_script( 'wow', @$wow );
			wp_deregister_script( 'wowstart', @$wowstart );
		}
		
		
		if ( mytheme_option( 'select_backtop' ) && mytheme_option( 'select_backtop' ) == 'choice10' ) {
		} else { 
			$backtop= get_template_directory_uri() . "/js/backtop.js";
			wp_register_script( 'backtop', $backtop);
			wp_enqueue_script( 'backtop');
		}	
		
		$lightbox= get_template_directory_uri() . "/js/lightbox.min.js";
		wp_register_script( 'lightbox', $lightbox);
		wp_enqueue_script( 'lightbox');	
		
		$respond= get_template_directory_uri() . "/js/respond.src.js";
		wp_register_script( 'respond', $respond);
		wp_enqueue_script( 'respond');		
		
		if ( mytheme_option( 'select_tooltips' ) && mytheme_option( 'select_tooltips' ) == 'choice2' ) {
		} else { 
			$jqueryui= get_template_directory_uri() . "/js/jquery-ui-1.10.2.js";
			wp_register_script( 'jqueryui', $jqueryui);
			wp_enqueue_script( 'jqueryui');	
		}	
		
		$typer= get_template_directory_uri() . "/js/jquery.typer.js";
		wp_register_script( 'typer', $typer);
		wp_enqueue_script( 'typer');
		
		$logo= get_template_directory_uri() . "/js/logo.js";
		wp_register_script( 'logo', $logo);
		wp_enqueue_script( 'logo');
		
		$calls= get_template_directory_uri() . "/js/calls.js";
		wp_register_script( 'calls', $calls);
		wp_enqueue_script( 'calls');	
		
		$retina= get_template_directory_uri() . "/js/retina.min.js";
		wp_register_script( 'retina', $retina);
		wp_enqueue_script( 'retina');
	
		$selectivizr= get_template_directory_uri() . "/js/selectivizr-min.js";
		wp_register_script( 'selectivizr', $selectivizr);
		wp_enqueue_script( 'selectivizr');
		
		$modernizr= get_template_directory_uri() . "/js/modernizr-2.5.3-min.js";
		wp_register_script( 'modernizr', $modernizr);
		wp_enqueue_script( 'modernizr');
		
		
		
	
	}
	add_action('wp_enqueue_scripts', 'script_init');

	
	
	

	/**
	 * Load logo uploader javascript files (only when needed)
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
		
	function customlogo_options_enqueue_scripts() {

	wp_register_script( 'customlogo-upload', get_template_directory_uri() .'/js/logo.js', array('jquery','media-upload','thickbox') );	

		if ( 'appearance_page_customlogo-settings' == get_current_screen() -> id ) {
			wp_enqueue_script('jquery');
			wp_enqueue_script('thickbox');
			wp_enqueue_style('thickbox');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('customlogo-upload');
		}
	}
	add_action('admin_enqueue_scripts', 'customlogo_options_enqueue_scripts');
	
	
	
	
		
	/**
	 * Load theme options JS files (when required)
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
		
	function theme_options_enqueue_scripts() {
		if ( 'appearance_page_mytheme-options' == get_current_screen() -> id ) {
			$jscolor= get_template_directory_uri() . "/js/jscolor/jscolor.js";
			wp_register_script( 'jscolor', $jscolor);
			wp_enqueue_script( 'jscolor');
			
			wp_register_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '', 'all' );
			wp_enqueue_style( 'fontawesome' );
		}
	}
	add_action('admin_enqueue_scripts', 'theme_options_enqueue_scripts');
	
	
	
	
	
	/**
	 * Queue up the global CSS & LESS stylesheet
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

	function style_global()
	{
		wp_register_style( 'default', get_template_directory_uri() . '/style.css', array(), '', 'all' );
		wp_register_style( 'html5reset', get_template_directory_uri() . '/css/html5reset.css', array(), '', 'all' );
		wp_register_style( 'setup', get_template_directory_uri() . '/css/setup.css', array(), '', 'all' );
		wp_register_style( 'core', get_template_directory_uri() . '/css/core.css', array(), '', 'all' );
		wp_register_style( 'queries', get_template_directory_uri() . '/css/queries.css', array(), '', 'all' );
		wp_register_style( 'lightbox', get_template_directory_uri() . '/css/lightbox.css', array(), '', 'all' );

		wp_enqueue_style( 'default' );
		wp_enqueue_style( 'html5reset' );
		wp_enqueue_style( 'setup' );
		wp_enqueue_style( 'core' );
		wp_enqueue_style( 'queries' );
		wp_enqueue_style( 'lightbox' );
		
	}
	add_action( 'wp_enqueue_scripts', 'style_global' );

	
	
	
	
	
	/**
	 * Queue up Animate.css stylesheet
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

	function style_animate()
	{
		if ( mytheme_option( 'appearance_animation' ) && mytheme_option( 'appearance_animation' ) == 'choice3' ) {
		} else { 
			wp_register_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', array(), '', 'all' );
			wp_enqueue_style( 'animate' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'style_animate' );





	/**
	 * Register Googlefonts and FontAwesome
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	function themefonts()
	{
		
		wp_register_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '', 'all' );
		wp_enqueue_style( 'fontawesome' );
		
		wp_register_style( 'googlefonts', 'https://fonts.googleapis.com/css?family=Lato:100|Open+Sans:300,400,700,800', array(), '', 'all' );
		wp_enqueue_style( 'googlefonts' );
	}
	add_action( 'wp_enqueue_scripts', 'themefonts' );
	
	
	
	
	

	/**
	 * Set content maximum width
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	if ( ! isset( $content_width ) ) $content_width = 1200;
	
	
	
	
	
	/**
	 * Add support for Wordpress features
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	add_editor_style('editor.css');
	add_theme_support( 'automatic-feed-links' );
	// add_theme_support( 'custom-background' );
	// add_theme_support( 'custom-header' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
	
	



	/**
	 * Add featured image dimensions
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	add_image_size( 'img_standard', 1200, 900, true );





	/**
	 * Add multilingual/translation text domain
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	add_action('after_setup_theme', 'int_setup');
	function int_setup(){
		load_theme_textdomain('lang', get_template_directory() . '/lang');
	}
?>