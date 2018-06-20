<?php
/**
 * Class for handle ajax request
 */
if ( ! class_exists( 'IPShortcode_Ajax' )) {

    class IPShortcode_Ajax
    {
        /**
         * Take ajax action name
         *
         * @var string
         */
        protected $_action;
        
        /**
         * Take ajax action handlers
         *
         * @var array
         */
        protected $_handlers = array(
            
            'isc_setting'   => 'settingHandler',
        );
        
        /**
         * Take ajax action handlers
         *
         * @var array
         */
        protected $_settingHandlers = array(
            
            'isc_headline'  => 'headlineSetting',
            'isc_heading'   => 'headingSetting',
            'isc_frame'     => 'frameSetting',
            'isc_tabs'      => 'tabsSetting',
            'isc_accordion' => 'accordionSetting',
            'isc_spoiler'   => 'spoilerSetting',
            'isc_service'   => 'serviceSetting',
            'isc_box'       => 'boxSetting',
            'isc_button'    => 'buttonSetting',
            'isc_divider'   => 'dividerSetting',
            'isc_spacer'    => 'spacerSetting',
            'isc_quote'     => 'quoteSetting',
            'isc_pullquote' => 'pullquoteSetting',
            'isc_testimony' => 'testimonySetting',
            'isc_highlight' => 'highlightSetting',
            'isc_label'     => 'labelSetting',
            'isc_fancylink' => 'fancyLinkSetting',
            'isc_note'      => 'noteSetting',
            'isc_message'   => 'messageSetting',
            'isc_dropcap'   => 'dropcapSetting',
            'isc_list'      => 'listSetting',
            'isc_dlist'     => 'dlistSetting',
            'isc_column'    => 'columnSetting',
            'isc_youtube'   => 'youtubeSetting',
            'isc_gmap'      => 'gmapSetting',
            'isc_tweets'    => 'tweetsSetting',
            'isc_slider'    => 'sliderSetting',
        );
        
        /**
         * Class constructor
         *
         * @return void
         */
        public function __construct()
        {
        }
        
        /**
         * Get action name
         *
         * @return string
         */
        public function getAction()
        {
            return $this->_action;
        }
        
        /**
         * Set action
         *
         * @param  string $action
         * @return IPShortcode_Ajax
         */
        public function setAction( $action )
        {
            $this->_action = sanitize_title( $action );
        }
        
        /**
         * Execute request
         *
         * @param  string $action
         * @return IPShortcode_Ajax
         */
        public function exec()
        {
            $data = array_merge( $_GET, $_POST );
            if ( empty( $data['doajax'] ) || empty( $data['ipshortcode'] ) || empty( $data['action'] ) ) {
                return true;
            }
            $this->setAction( $data['action'] );
            
            $action   = $this->getAction();
            $handlers = (array)$this->_handlers;
            if ( array_key_exists( $action, $handlers )) {
                $handler = $handlers[$action];
                if ( method_exists( $this, $handler )) {
                    $this->$handler();
                }
            }
            return true;
        }
        
        /**
         * Get setting content
         *
         * @return void
         */
        public function settingHandler()
        {
            $data = array_merge( $_GET, $_POST );
            if ( ! empty( $data['type'] )) {
                $type     = trim( $data['type'] );
                $handlers = (array)$this->_settingHandlers;
                if ( array_key_exists( $type, $handlers )) {
                    $handler = $handlers[$type];
                    $display = new IPShortcode_Admin();
                    if ( method_exists( $display, $handler )) {
                        $display->$handler();
                    }
                }
            }
            die();
        }
    }
    
}
?>