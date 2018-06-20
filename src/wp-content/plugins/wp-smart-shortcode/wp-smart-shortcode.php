<?php
/*
Plugin Name: Smart Shortcode
Plugin URI: https://triad-inc.co.jp/
Description: Plugin that works to create a variety of content formats using shortcode
Version: 1.8.0
Author: TRIAD Inc.
Author URI: https://triad-inc.co.jp/
*/

/*  
    LICENSE: This source file to be part of a system developed by TRIAD. 
    All copyrights use this file and the code in it owned by TRIAD. 
    It is strictly forbidden to use, copy, modify or distribute this file and 
    the code in it without the permission of the developer.
*/
require 'plugin_update_check.php';
$MyUpdateChecker = new PluginUpdateChecker_2_0 (
   'https://kernl.us/api/v1/updates/570b3250e94a8b397b441878/',
   __FILE__,
   'wp-smart-shortcode',
   1
);

require_once( plugin_dir_path( __FILE__ ) . "includes/admin.php" );
require_once( plugin_dir_path( __FILE__ ) . "includes/ajax.php" );
require_once( plugin_dir_path( __FILE__ ) . "includes/factory.php" );

/**
 * Class for generate table price
 */
if ( ! class_exists( 'IPShortcode' )) {

    class IPShortcode
    {
        /**
         * Setup Plugin
         */
        public function setup()
        {
             // Add generator button to Upload/Insert buttons
            add_action( 'media_buttons', array( 'IPShortcode', 'addButton' ), 100 );
            
            //Add manage pop up content
            add_action( 'admin_footer', array( 'IPShortcode', 'managePopup' ) );
            
            //Add script & style admin page
            add_action( 'admin_print_styles', array( 'IPShortcode', 'printAdminStyle' ), 1000 );
            add_action( 'admin_print_footer_scripts', array( 'IPShortcode', 'printAdminScript' ), 1000 );
            
            //Ajax handler
            add_action( 'admin_init', array( 'IPShortcode', 'doAjax' ) );
            
            //Register Shortcode
            add_shortcode( 'ip-shortcode', array( 'IPShortcode_Factory', 'get' ) );
            
            //Add front style
            add_action('wp_head', array( 'IPShortcode', 'printStyle' ) );
            
            //Add front script
            add_action('wp_footer', array( 'IPShortcode', 'printScript' ) );
            
            //Add js library
            if ( ! is_admin() ) {
                add_action( "wp_enqueue_scripts", array( 'IPShortcode', 'libScript' ), 11 );
            }

        }
        
        /**
         * Add button to Upload/Insert buttons
         */
        function addButton( $page = null, $target = null ) 
        {
            $href  = '#TB_inline?width=640&height=600&inlineId=isc-shortcode-popup';
            $title = __( 'ビジュアルエディタでショートコードを挿入', 'wp-smart-shortcode' );
            
            echo '<a href="' . $href . '" class="thickbox button isc-button" title="' . $title . '" data-page="' . $page . '" data-target="' . $target . '">
                    <span class="isc-button-icon"></span>
                </a>';
        }
        
        /**
         * Create manage pop up content
         */
        function managePopup() 
        {
            $display = new IPShortcode_Admin();
            $display->popup();
        }
        
        /**
         * Handling ajax request
         */
        function doAjax() 
        {
            $ajax = new IPShortcode_Ajax();
            return $ajax->exec();
        }

        /**
         * Print admin style
         *
         * @return void
         */
        public function printAdminStyle()
        {
            $href = plugin_dir_url( __FILE__ ) . 'css/admin.css';
            echo '<link media="all" type="text/css" href="' . $href . '" rel="stylesheet">';
        }

        /**
         * Print Admin Script
         *
         * @return void
         */
        public function printAdminScript()
        {
            $src1 = plugin_dir_url( __FILE__ ) . 'js/admin.js';
            $src2 = plugin_dir_url( __FILE__ ) . 'js/spin.min.js';
            echo '<script type="text/javascript" src="' . $src2 . '"></script>';
            echo '<script type="text/javascript" src="' . $src1 . '"></script>';
        }

        /**
         * Print style
         *
         * @return void
         */
        public function printStyle()
        {
        ?>

    


        
            <link media="all" type="text/css" href="<?php echo plugin_dir_url( __FILE__ ) ?>css/style.css" rel="stylesheet">
            


            


        <?php
        }

        /**
         * Print script
         *
         * @return void
         */
        public function printScript()
        {
            $src = plugin_dir_url( __FILE__ ) . 'js/script.js';
            echo '<script type="text/javascript" src="' . $src . '"></script>';
        }


        /**
         * Lib script
         *
         * @return void
         */
        public function libScript()
        {

            
            wp_deregister_script('jqueryui');
            wp_register_script('jqueryui', $jqueryui= get_template_directory_uri() . "/js/jquery-ui-1.10.2.js", false, null);
            wp_enqueue_script('jqueryui');
        }

    }

}
//Run plugin
IPShortcode::setup();
?>