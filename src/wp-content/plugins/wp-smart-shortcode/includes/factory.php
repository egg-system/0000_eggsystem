<?php
/**
 * Class for build content shortcode
 */
if ( ! class_exists( 'IPShortcode_Factory' )) {

    class IPShortcode_Factory
    {
        /**
         * Take shortcode handlers
         *
         * @var array
         */
        protected static $_handlers = array(
            
            'headline'  => 'getHeadline',
            'heading'   => 'getHeading',
            'frame'     => 'getFrame',
            'tabs'      => 'getTabs',
            'accordion' => 'getAccordion',
            'spoiler'   => 'getSpoiler',
            'service'   => 'getService',
            'box'       => 'getBox',
            'button'    => 'getButton',
            'divider'   => 'getDivider',
            'spacer'    => 'getSpacer',
            'quote'     => 'getQuote',
            'pullquote' => 'getPullquote',
            'testimony' => 'getTestimony',
            'highlight' => 'getHighlight',
            'label'     => 'getLabel',
            'fancylink' => 'getFancyLink',
            'note'      => 'getNote',
            'message'   => 'getMessage',
            'dropcap'   => 'getDropcap',
            'list'      => 'getList',
            'dlist'     => 'getDlist',
            'column'    => 'getColumn',
            'youtube'   => 'getYoutube',
            'gmap'      => 'getGmap',
            'tweets'    => 'getTweets',
            'slider'    => 'getSlider',
        );
        
        /**
         * Get shortcode content
         *
         * @param  array  $atts
         * @param  string $content
         * @return string
         */
        public function get( $atts, $content = '')
        {
            $result = $content;
            if ( ! empty( $atts['type'] ) ) {
                $type = $atts['type'];
                if ( isset( self::$_handlers[$type] )) {
                    $handler = self::$_handlers[$type];
                    if ( method_exists( 'IPShortcode_Factory', $handler )) {
                        $result  = self::$handler( $atts, $content );
                    }
                }
            }
            return $result;
        }
        
        /**
         * Get shortcode headline
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getHeadline( $atts, $content )
        {
            $plgurl = plugin_dir_url( dirname(__FILE__) );
            $imgurl = $plgurl . 'img/bghl/';
            
            $color = '#ffffff';
            if ( ! empty( $atts['color'] )) {
                $color = $atts['color'];
            }
            $font = '24';
            if ( ! empty( $atts['font'] )) {
                $font = $atts['font'];
            }
            $family = 'Arial';
            if ( ! empty( $atts['fontfamily'] )) {
                $family = $atts['fontfamily'];
            }
            $family = str_replace( '_', ' ', $family );
            $bg = 'bghl1-blue';
            if ( ! empty( $atts['bg'] )) {
                $bg = $atts['bg'];
            }
            $bgfont = array(
                14 => 's',
                16 => 's',
                18 => 's',
                20 => 's',
                22 => 'm',
                24 => 'm',
                28 => 'm',
                32 => 'm',
                36 => 'l',
                42 => 'l',
                48 => 'l',
                52 => 'l',
            );
            if ( array_key_exists( $font, $bgfont )) {
                $bgf = $bgfont[$font];
            } else {
                $bgf = 's';
            }
            $cbgf = 'bgsize-' . $bgf;
            
            $style   = 'style="color:' . $color . '; font-size:' . $font . 'px; font-family:' . $family . ';';
            $style  .= "background-image: url( '$imgurl" . $bg . '-' . $bgf . "-right.png');";
            $style  .= ';"';
            
            $bgl = 'style="' . "background-image: url( '$imgurl" . $bg . '-' . $bgf . "-left.png');" . '"';
            $bgc = 'style="' . "background-image: url( '$imgurl" . $bg . '-' . $bgf . ".png');" . '"';
            
            $result  = '<div class="isc-item isc-headline ' . $bg . ' ' . $cbgf . '">';
            $result .= '<div ' . $bgl . ' class="isc-headline-deco">';
            $result .= '<p ' . $style . '><strong ' . $bgc . '>' . $content . '</strong></p>';
            $result .= '</div>';
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode heading
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getHeading( $atts, $content )
        {
            $style = 1;
            if ( ! empty( $atts['style'] )) {
                $style = $atts['style'];
            }
            $tag  = 'h3';
            $tags = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' );
            if ( ! empty( $atts['tag'] ) && in_array( $atts['tag'], $tags )) {
                $tag = $atts['tag'];
            }
            $align  = 'none';
            $aligns = array( 'none', 'left', 'right', 'center' );
            if ( ! empty( $atts['align'] ) && in_array( $atts['align'], $aligns )) {
                $align = $atts['align'];
            }
            $result  = '<div class="isc-item isc-heading isc-style-' . $style . ' isc-align-' . $align . '">';
            $result .= '<div class="isc-heading-deco">';
            $result .= '<' . $tag . '>' . $content . '</' . $tag . '>';
            $result .= '</div>';
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode frame
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getFrame( $atts, $content )
        {
            $style = 1;
            if ( ! empty( $atts['style'] )) {
                $style = $atts['style'];
            }
            $align  = 'none';
            $aligns = array( 'none', 'left', 'right', 'center' );
            if ( ! empty( $atts['align'] ) && in_array( $atts['align'], $aligns )) {
                $align = $atts['align'];
            }
            $result  = '<div class="isc-item isc-frame isc-style-' . $style . ' isc-align-' . $align . '">';
            $result .= '<div class="isc-frame-deco">';
            $result .= $content;
            $result .= '</div>';
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode tabs
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getTabs( $atts, $content )
        {
            $style = 1;
            if ( ! empty( $atts['style'] )) {
                $style = $atts['style'];
            }
            $result  = '<div class="isc-item isc-tabs isc-style-' . $style . '">';
            $result .= '<div class="isc-tabs-deco">';
            $result .= $content;
            $result .= '</div>';
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode accordion
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getAccordion( $atts, $content )
        {
            $style = 1;
            if ( ! empty( $atts['style'] )) {
                $style = $atts['style'];
            }
            $result  = '<div class="isc-item isc-accordion isc-style-' . $style . '">';
            $result .= '<div class="isc-accordion-deco">';
            $result .= $content;
            $result .= '</div>';
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode spoiler
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getSpoiler( $atts, $content )
        {
            $style = 1;
            if ( ! empty( $atts['style'] )) {
                $style = $atts['style'];
            }
            $title = '';
            if ( ! empty( $atts['title'] )) {
                $title = $atts['title'];
            }
            $show = ' close';
            if ( ! empty( $atts['open'] ) && $atts['open'] == 1 ) {
                $show = ' open';
            }
            $result  = '<div class="isc-item isc-spoiler isc-style-' . $style . ' ' . $show . '">';
            $result .= '<div class="isc-spoiler-deco">';
            $result .= '<div class="isc-spoiler-title">';
            $result .= '<div class="isc-spoiler-title-inner">';
            $result .= '<h3>' . $title . '</h3>';
            $result .= '<div class="isc-toggle"></div>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '<div class="isc-spoiler-content">';
            $result .= '<p>' . $content . '</p>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode service
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getService( $atts, $content )
        {
            $title = '';
            if ( ! empty( $atts['title'] )) {
                $title = $atts['title'];
            }
            $result  = '<div class="isc-item isc-service">';
            $result .= '<div class="isc-service-deco">';
            
            if ( ! empty( $atts['icon'] )) {
                $result .= '<div class="isc-service-icon">';
                $result .= '<img src="' . $atts['icon'] . '" alt=""/>';
                $result .= '</div>';
            }
            $result .= '<div class="isc-service-main">';
            
            $result .= '<div class="isc-service-title">';
            $result .= '<h3>' . $title . '</h3>';
            $result .= '</div>';
            
            $result .= '<div class="isc-service-content">';
            $result .= '<p>' . $content . '</p>';
            $result .= '</div>';
            
            $result .= '</div>';
            
            $result .= '</div>';
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode box
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getBox( $atts, $content )
        {
            $title = '';
            if ( ! empty( $atts['title'] )) {
                $title = $atts['title'];
            }
            $style = 1;
            if ( ! empty( $atts['style'] )) {
                $style = $atts['style'];
            }
            $color = '#000000';
            if ( ! empty( $atts['color'] )) {
                $color = $atts['color'];
            }
            $bgcolor   = self::_hexShift( $color, 'lighter', 20 );
            $brdcolor  = self::_hexShift( $color, 'darker', 20 );
            
            $result  = '<div class="isc-item isc-box isc-style-' . $style . '" style="background-color: ' . $bgcolor . '; border: 1px solid ' . $brdcolor . '">';
            $result .= '<div class="isc-box-deco">';
            
            $result .= '<div class="isc-box-title">';
            $result .= '<h3>' . $title . '</h3>';
            $result .= '</div>';
            
            $result .= '<div class="isc-box-content">';
            $result .= '<p>' . $content . '</p>';
            $result .= '</div>';
            
            $result .= '</div>';
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode button
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getButton( $atts, $content )
        {
            $url = '';
            if ( ! empty( $atts['url'] )) {
                $url = $atts['url'];
            }
            $size  = 'medium';
            $sizes = array( 'mini', 'small', 'medium', 'large', 'verylarge' );
            if ( ! empty( $atts['size'] ) && in_array( $atts['size'], $sizes )) {
                $size = $atts['size'];
            }
            $style  = 'default';
            $styles = array( 'default', 'red', 'blue', 'aqua', 'orange', 'green', 'dark' );
            if ( ! empty( $atts['style'] ) && in_array( $atts['style'], $styles )) {
                $style = $atts['style'];
            }
            $radius = 0;
            $rads   = array( 0, 5, 10, 15, 20 );
            if ( ! empty( $atts['radius'] ) && in_array( $atts['radius'], $rads )) {
                $radius = $atts['radius'];
            }
            $color = '#000000';
            if ( ! empty( $atts['color'] )) {
                $color = $atts['color'];
            }
            $target  = '';
            if ( ! empty( $atts['target'] ) && $atts['target'] == 'blank' ) {
                $target = ' target="_blank"';
            }
            
            $icon = '';
            if ( ! empty( $atts['icon'] ) && $atts['icon'] != 'none' ) {
                $icon = '<i class="fa fa-' . $atts['icon'] . '"></i>';
            }
            $iconpos = 'before';
            if ( ! empty( $atts['iconpos'] ) ) {
                $iconpos = $atts['iconpos'];
            }
            
            $class   = 'isc-style-' . $style . ' isc-size-' . $size . ' isc-radius-' . $radius . ' isc-icon-' . $iconpos;
            $result  = '<div class="isc-item isc-button">';
            $result .= '<a class="' .$class . '" href="' . $url . '" title=""' . $target . '>';
            if ( ! empty( $icon ) && $iconpos == 'before' ) {
                $result .= $icon;
            }
            $result .= $content ;
            if ( ! empty( $icon ) && $iconpos == 'after' ) {
                $result .= $icon;
            }
            $result .= '</a></div>';
            return $result;
        }
        
        /**
         * Get shortcode divider
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getDivider( $atts, $content )
        {
            $style = 1;
            if ( ! empty( $atts['style'] )) {
                $style = $atts['style'];
            }
            $result  = '<div class="isc-item isc-divider isc-style-' . $style . '">';
            if ( ! empty( $atts['toplink'] )) {
                $result .= '<a class="isc-divider-top" href="#">Top</a>';
            }
            $result .= '<hr/>';
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode spacer
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getSpacer( $atts, $content )
        {
            $height = 10;
            if ( ! empty( $atts['height'] )) {
                $height = $atts['height'];
            }
            $result  = '<div class="isc-item isc-spacer" style="margin-top: ' . $height . 'px">';
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode quote
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getQuote( $atts, $content )
        {
            $style = 1;
            if ( ! empty( $atts['style'] )) {
                $style = $atts['style'];
            }
            $result  = '<div class="isc-item isc-quote isc-style-' . $style . '">';
            $result .= '<blockquote>';
            $result .= '<p>' . $content . '</p>';
            $result .= '</blockquote>';
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode pullquote
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getPullquote( $atts, $content )
        {
            $style = 1;
            if ( ! empty( $atts['style'] )) {
                $style = $atts['style'];
            }
            $align  = 'none';
            $aligns = array( 'none', 'left', 'right', 'center' );
            if ( ! empty( $atts['align'] ) && in_array( $atts['align'], $aligns )) {
                $align = $atts['align'];
            }
            $result  = '<div class="isc-item isc-pullquote isc-style-' . $style . ' isc-align-' . $align . '">';
            $result .= '<blockquote>';
            $result .= '<p>' . $content . '</p>';
            $result .= '</blockquote>';
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode testimony
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getTestimony( $atts, $content )
        {
            $style = 1;
            if ( ! empty( $atts['style'] )) {
                $style = $atts['style'];
            }
            $author = 1;
            if ( ! empty( $atts['author'] )) {
                $author = $atts['author'];
            }
            $result  = '<div class="isc-item isc-testimony isc-style-' . $style . '">';
            $result .= '<div class="isc-testimony-deco">';
            
            if ( $style == 1 || $style == 3 ) {
                $result .= '<div class="isc-testimony-author">';
                $result .= '<strong>' . $author . '</strong>';
                $result .= '</div>';
            }
            $result .= '<div class="isc-testimony-content">';
            $result .= '<blockquote>';
            $result .= '<p>' . $content . '</p>';
            $result .= '</blockquote>';
            $result .= '</div>';
            
            if ( $style == 2 || $style == 4 ) {
                $result .= '<div class="isc-testimony-author">';
                $result .= '<strong>' . $author . '</strong>';
                $result .= '</div>';
            }
            $result .= '</div>';
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode highlight
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getHighlight( $atts, $content )
        {
            $color = '#ffffff';
            if ( ! empty( $atts['color'] )) {
                $color = $atts['color'];
            }
            $bgcolor = '#000000';
            if ( ! empty( $atts['bgcolor'] )) {
                $bgcolor = $atts['bgcolor'];
            }
            $css     = ' style="background-color: ' . $bgcolor . '; color: ' . $color . ';"';
            $result  = '<span class="isc-item isc-highlight"' . $css . '>';
            $result .= '<strong>' . $content . '</strong>';
            $result .= '</span>';
            return $result;
        }
        
        /**
         * Get shortcode label
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getLabel( $atts, $content )
        {
            $style  = 'default';
            $styles = array( 'default', 'info', 'warning', 'success', 'error', 'inverse' );
            if ( ! empty( $atts['style'] ) && in_array( $atts['style'], $styles )) {
                $style = $atts['style'];
            }
            $result  = '<span class="isc-item isc-label isc-style-' . $style . '">';
            $result .= '<strong>' . $content . '</strong>';
            $result .= '</span>';
            return $result;
        }
        
        /**
         * Get shortcode fancy link
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getFancylink( $atts, $content )
        {
            $style = 1;
            if ( ! empty( $atts['style'] )) {
                $style = $atts['style'];
            }
            $color = '#ffffff';
            if ( ! empty( $atts['color'] )) {
                $color = $atts['color'];
            }
            $url = '';
            if ( ! empty( $atts['url'] )) {
                $url = $atts['url'];
            }
            
            $css = '';
            if ( $style == 3 ) {
                $bgcolor = self::_hexShift( $color, 'lighter', 80 );
                $css     = ' style="background-color: ' . $bgcolor . ';"';
            }
            
            $result  = '<span' . $css . ' class="isc-item isc-fancylink isc-style-' . $style . '">';
            $result .= '<a href="' . $url . '" style="color: ' . $color . '">' . $content . '</a>';
            $result .= '</span>';
            return $result;
        }
        
        /**
         * Get shortcode dropcap
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getDropcap( $atts, $content )
        {
            $style = 1;
            if ( ! empty( $atts['style'] )) {
                $style = $atts['style'];
            }
            $size  = 'medium';
            $sizes = array( 'small', 'medium', 'large' );
            if ( ! empty( $atts['size'] ) && in_array( $atts['size'], $sizes )) {
                $size = $atts['size'];
            }
            $result  = '<strong class="isc-item isc-dropcap isc-style-' . $style . ' isc-size-' . $size . '">';
            $result .= '<span>' . $content . '</span>';
            $result .= '</strong>';
            return $result;
        }
        
        /**
         * Get shortcode note
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getNote( $atts, $content )
        {
            $color = '#ffffff';
            if ( ! empty( $atts['color'] )) {
                $color = $atts['color'];
            }
            $bgcolor   = self::_hexShift( $color, 'lighter', 20 );
            $brdcolor  = self::_hexShift( $color, 'darker', 10 );
            $textcolor = self::_hexShift( $color, 'darker', 70 );
            $css       = ' style="background-color: ' . $bgcolor . '; color: ' . $textcolor . '; border: 1px solid ' . $brdcolor . ';"';
            $result  = '<div class="isc-item isc-note">';
            $result .= '<div class="isc-note-deco"' . $css . '>';
            $result .= '<p>' . $content . '</p>';
            $result .= '</div>';
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode message
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getMessage( $atts, $content )
        {
            $style  = 'info';
            $styles = array( 'info', 'warning', 'success', 'error' );
            if ( ! empty( $atts['style'] ) && in_array( $atts['style'], $styles )) {
                $style = $atts['style'];
            }
            $result  = '<div class="isc-item isc-message isc-style-' . $style . '">';
            $result .= '<div class="isc-message-deco">';
            $result .= '<p>' . $content . '</p>';
            $result .= '</div>';
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode list
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getList( $atts, $content )
        {
            if ( ! empty( $atts['icon'] )) {
                $icon = $atts['icon'];
            }
            $result  = '<div class="isc-item isc-list" data-icon="' . $icon . '">';
            $result .= $content;
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode definition list
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getDlist( $atts, $content )
        {
            $style = 1;
            if ( ! empty( $atts['style'] )) {
                $style = $atts['style'];
            }
            $result  = '<div class="isc-item isc-dlist isc-style-' . $style . '">';
            $result .= $content;
            $result .= '</div>';
            return $result;
        }
        
        /**
         * Get shortcode youtube
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getYoutube( $atts, $content )
        {
            $autostart = 0;
            if ( ! empty( $atts['autostart'] )) {
                $autostart = $atts['autostart'];
            }
            $url = '';
            if ( ! empty( $atts['url'] )) {
                $url = self:: _fixYoutubeUrl( $atts['url'], $autostart );
            }
            $width = 450;
            if ( ! empty( $atts['width'] )) {
                $width = $atts['width'];
            }
            $height = 300;
            if ( ! empty( $atts['height'] )) {
                $height = $atts['height'];
            }
            $result  = '<div class="isc-item isc-youtube">
                            <iframe width="' . $width .'" height="' . $height . '" src="' . $url .'" frameborder="0" allowfullscreen></iframe>
                        </div>';
            return $result;
        }
        
        /**
         * Get shortcode slider
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getSlider( $atts, $content )
        {
            $width  = 500;
            $height = 240;
            if ( ! empty( $atts['size'] )) {
                $sizes  = explode( 'x', $atts['size'] );
                if ( ! empty( $sizes )) {
                    $width  = array_shift( $sizes );
                }
                if ( ! empty( $sizes )) {
                    $height = array_shift( $sizes );
                }
            }
            $count = 0;
            if ( ! empty( $atts['count'] )) {
                $count = $atts['count'];
            }
            $speed = 2;
            if ( ! empty( $atts['speed'] )) {
                $speed = $atts['speed'];
            }
            $delay = 1;
            if ( ! empty( $atts['delay'] )) {
                $delay = $atts['delay'];
            }
            $postId  = 0;
            if ( ! empty( $atts['source'] ) && $atts['source'] == 'post' && ! empty( $atts['id'] ) ) {
                $postId = absint( $atts['id'] );
            } else {
                global $id;
                $postId = $id;
            }
            $images = get_posts(array(
                'post_parent'    => $postId,
                'post_type'      => 'attachment',
                'numberposts'    => -1,
                'post_mime_type' => 'image'));
            
            $result  = '<div class="isc-item isc-slider">
                            <div class="isc-slider-deco">';
            
            $style = ' style="width:' . $width . 'px; height:' . $height . 'px;"';
            if ( ! empty( $images )) {
                $result .= '<div' . $style . ' class="flexslider" data-speed="' . $speed . '" data-delay="' . $delay . '"><ul class="slides">';
                $currentCount = 0;
                foreach( $images as $image ) 
                {
                    if ( ! empty( $count ) && $currentCount >= $count ) {
                        break;
                    }
                    $src = plugin_dir_url( __FILE__ ) . 'timthumb.php?src=' . $image->guid . '&amp;w=' . $width . '&amp;h=' . $height . '&amp;zc=1&amp;q=100';
                    
                    if ( ! empty( $atts['link'] ) && $atts['link'] == 'image' ) {
                        $url = wp_get_attachment_image_src( $image->ID, 'full' );
                        $url = $url[0];
                    } else {
                        $url = get_attachment_link($image->ID);
                    }
                    $result .= '<li' . $style . '><a href="' . $url . '"><img src="' . $src . '"></a></li>';
                    $currentCount++;
                }
                $result .= '</ul></div>';
            }
            $result .=     '</div>
                       </div>';
            return $result;
        }
        
        /**
         * Get shortcode tweets
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getTweets( $atts, $content )
        {
            $username = '';
            if ( ! empty( $atts['username'] )) {
                $username = $atts['username'];
            }
            $count = 5;
            if ( ! empty( $atts['count'] )) {
                $count = $atts['count'];
            }
            $style = 'light';
            if ( ! empty( $atts['style'] )) {
                $style = $atts['style'];
            }
            $result  = '<div class="isc-item isc-tweets">
                            <div class="isc-tweets-deco">';
            
            $result .= '<a class="twitter-timeline" href="https://twitter.com/' . $username . '" data-widget-id="356419509827010560" data-screen-name="' . $username . '" data-tweet-limit="' . $count . '" data-theme="' . $style . '">Tweets by @' . $username . '</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';

            
            $result .=     '</div>
                       </div>';
            return $result;
        }
        
        /**
         * Get shortcode google map
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getGmap( $atts, $content )
        {
            $latitude = '';
            if ( ! empty( $atts['latitude'] )) {
                $latitude = $atts['latitude'];
            }
            $longitude = '';
            if ( ! empty( $atts['longitude'] )) {
                $longitude = $atts['longitude'];
            }
            $width = 450;
            if ( ! empty( $atts['width'] )) {
                $width = $atts['width'];
            }
            $height = 300;
            if ( ! empty( $atts['height'] )) {
                $height = $atts['height'];
            }
            $style  = ' style="height: ' . $height . 'px; width: ' . $width . 'px;"';
            $result = '<div' . $style . ' class="isc-item isc-gmap">
                            <div class="isc-gmap-value" data-latitude="' . $latitude . '" data-longitude="' . $longitude . '">
                            </div>
                       </div>';
            return $result;
        }
        
        /**
         * Get shortcode column
         *
         * @param  array $atts
         * @param  string $content
         * @return string
         */
        public function getColumn( $atts, $content )
        {
            $span = '1/2';
            if ( ! empty( $atts['size'] )) {
                $span = $atts['size'];
            }
            $last = false;
            if ( isset( $atts['last'] )) {
                $last = true;
            }
            if ( $span == '1/2' ) {
                $class = 'isc-span12';
            } elseif ( $span == '1/3' ) {
                $class = 'isc-span13';
            } elseif ( $span == '1/4' ) {
                $class = 'isc-span14';
            } elseif ( $span == '1/5' ) {
                $class = 'isc-span15';
            } elseif ( $span == '2/3' ) {
                $class = 'isc-span23';
            } elseif ( $span == '3/4' ) {
                $class = 'isc-span34';
            } elseif ( $span == '2/5' ) {
                $class = 'isc-span25';
            } elseif ( $span == '3/5' ) {
                $class = 'isc-span35';
            } elseif ( $span == '4/5' ) {
                $class = 'isc-span45';
            }
            if ( $last ) {
                $class .= ' isc-last';
            }
            $result = '<div class="isc-item isc-column ' . $class . '">
                            ' . $content . '
                       </div>';
            return $result;
        }
        
        /**
         * Fix youtube url
         *
         * @param  string $url
         * @param  int    $autostart
         * @return string
         */
        protected static function _fixYoutubeUrl( $url, $autostart )
        {
            if ( strpos( $url, 'embed' ) === false ) {
                if ( strpos( $url, 'watch' ) !== false ) {
                    $id     = '';
                    $parsed = parse_url( $url );
                    if ( ! empty( $parsed['query'] )) {
                        parse_str( $parsed['query'], $args );
                        if ( ! empty( $args['v'] )) {
                            $id = $args['v'];
                        }
                    }
                    $url = 'http://youtube.com/embed/' . $id;
                
                } elseif ( strpos( $url, 'youtu.be' ) !== false ) {
                    $id     = '';
                    $parsed = parse_url( $url );
                    if ( ! empty( $parsed['path'] )) {
                        $id = trim( $parsed['path'], '/' );
                    }
                    $url = 'http://youtube.com/embed/' . $id;
                
                }
            }
            $url .= '?autoplay=' . $autostart . '&rel=0';
            return $url;
        }

        /**
         * Color shift a hex value by a specific percentage factor
         *
         * @param string $supplied_hex Any valid hex value. Short forms e.g. #333 accepted.
         * @param string $shift_method How to shift the value e.g( +,up,lighter,>)
         * @param integer $percentage Percentage in range of [0-100] to shift provided hex value by
         * @return string shifted hex value
         */
        protected static function _hexShift( $supplied_hex, $shift_method, $percentage = 50 ) 
        {
            $shifted_hex_value = null;
            $valid_shift_option = FALSE;
            $current_set = 1;
            $RGB_values = array( );
            $valid_shift_up_args = array( 'up', '+', 'lighter', '>' );
            $valid_shift_down_args = array( 'down', '-', 'darker', '<' );
            $shift_method = strtolower( trim( $shift_method ) );

            // Check Factor
            if ( !is_numeric( $percentage ) || ($percentage = ( int ) $percentage) < 0 || $percentage > 100 ) {
                trigger_error( "Invalid factor", E_USER_ERROR );
            }

            // Check shift method
            foreach ( array( $valid_shift_down_args, $valid_shift_up_args ) as $options ) {
                foreach ( $options as $method ) {
                    if ( $method == $shift_method ) {
                        $valid_shift_option = !$valid_shift_option;
                        $shift_method = ( $current_set === 1 ) ? '+' : '-';
                        break 2;
                    }
                }
                ++$current_set;
            }

            if ( !$valid_shift_option ) {
                trigger_error( "Invalid shift method", E_USER_ERROR );
            }

            // Check Hex string
            switch ( strlen( $supplied_hex = ( str_replace( '#', '', trim( $supplied_hex ) ) ) ) ) {
                case 3:
                    if ( preg_match( '/^([0-9a-f])([0-9a-f])([0-9a-f])/i', $supplied_hex ) ) {
                        $supplied_hex = preg_replace( '/^([0-9a-f])([0-9a-f])([0-9a-f])/i', '\\1\\1\\2\\2\\3\\3', $supplied_hex );
                    } else {
                        trigger_error( "Invalid hex color value", E_USER_ERROR );
                    }
                    break;
                case 6:
                    if ( !preg_match( '/^[0-9a-f]{2}[0-9a-f]{2}[0-9a-f]{2}$/i', $supplied_hex ) ) {
                        trigger_error( "Invalid hex color value", E_USER_ERROR );
                    }
                    break;
                default:
                    trigger_error( "Invalid hex color length", E_USER_ERROR );
            }

            // Start shifting
            $RGB_values['R'] = hexdec( $supplied_hex{0} . $supplied_hex{1} );
            $RGB_values['G'] = hexdec( $supplied_hex{2} . $supplied_hex{3} );
            $RGB_values['B'] = hexdec( $supplied_hex{4} . $supplied_hex{5} );

            foreach ( $RGB_values as $c => $v ) {
                switch ( $shift_method ) {
                    case '-':
                        $amount = round( ((255 - $v) / 100) * $percentage ) + $v;
                        break;
                    case '+':
                        $amount = $v - round( ($v / 100) * $percentage );
                        break;
                    default:
                        trigger_error( "Oops. Unexpected shift method", E_USER_ERROR );
                }

                $shifted_hex_value .= $current_value = (
                    strlen( $decimal_to_hex = dechex( $amount ) ) < 2
                    ) ? '0' . $decimal_to_hex : $decimal_to_hex;
            }

            return '#' . $shifted_hex_value;
        }
    
    }
    
}
?>