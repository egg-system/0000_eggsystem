<?php
/**
 * Class for handling administrator page
 */
if ( ! class_exists( 'IPShortcode_Admin' )) {

    class IPShortcode_Admin
    {
        /**
         * Show content admin home
         *
         * @return void
         */
        public function popup()
        {
            wp_enqueue_script('wp-color-picker');
            wp_enqueue_style('wp-color-picker');
        ?>
            <div id="isc-shortcode-popup" style="display: none;">
                <div class="isc-inner">
                    <div class="isc-top">
                        <div class="isc-menu isc-shortcode-menu">
                            <div class="isc-selected">
                                <div class="isc-selected-box">
                                    <h3><?php _e( 'ヘッドライン' ); ?></h3>
                                    <p><em><?php _e( 'Add headline image to your page' ); ?></em></p>
                                </div>
                                <span class="toggle"></span>
                            </div>
                            <div class="isc-select" style="display: none;">
                                <div class="isc-select-content">
                                    <ul class="isc-clear">
                                        <li>
                                            <a href="#isc_headline">
                                                <h3><?php _e( 'ヘッドライン' ); ?></h3>
                                                <p><em><?php _e( 'Add headline image to your page' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_heading">
                                                <h3><?php _e( '見出し' ); ?></h3>
                                                <p><em><?php _e( 'Styled heading' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_frame">
                                                <h3><?php _e( '画像＆背景枠' ); ?></h3>
                                                <p><em><?php _e( 'Styled image frame' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_service">
                                                <h3><?php _e( '説明ボックス' ); ?></h3>
                                                <p><em><?php _e( 'Service box with title' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_box">
                                                <h3><?php _e( 'カラーボックス' ); ?></h3>
                                                <p><em><?php _e( 'Colored box with caption' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_button">
                                                <h3><?php _e( 'ボタン' ); ?></h3>
                                                <p><em><?php _e( 'Styled button' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_divider">
                                                <h3><?php _e( 'Divider' ); ?></h3>
                                                <p><em><?php _e( 'Content divider' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_spacer">
                                                <h3><?php _e( 'Spacer' ); ?></h3>
                                                <p><em><?php _e( 'Empty space' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_quote">
                                                <h3><?php _e( 'Quote' ); ?></h3>
                                                <p><em><?php _e( 'Blockquote alternative' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_pullquote">
                                                <h3><?php _e( 'Pullquote' ); ?></h3>
                                                <p><em><?php _e( 'Pullquote' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_testimony">
                                                <h3><?php _e( 'ボックスコメント' ); ?></h3>
                                                <p><em><?php _e( 'Box comment' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_highlight">
                                                <h3><?php _e( 'ハイライト' ); ?></h3>
                                                <p><em><?php _e( 'Highlighted text' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_label">
                                                <h3><?php _e( 'ラベル' ); ?></h3>
                                                <p><em><?php _e( 'Styled label' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_fancylink">
                                                <h3><?php _e( 'ファンシーリンク' ); ?></h3>
                                                <p><em><?php _e( 'Fancy link' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_note">
                                                <h3><?php _e( 'ノート' ); ?></h3>
                                                <p><em><?php _e( 'Colored Box' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_message">
                                                <h3><?php _e( 'メッセージ' ); ?></h3>
                                                <p><em><?php _e( 'Colored box for message' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_column">
                                                <h3><?php _e( 'Column' ); ?></h3>
                                                <p><em><?php _e( 'Flexible columns' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_youtube">
                                                <h3><?php _e( 'Youtube' ); ?></h3>
                                                <p><em><?php _e( 'Insert video from Youtube' ); ?></em></p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#isc_tweets">
                                                <h3><?php _e( 'Tweets' ); ?></h3>
                                                <p><em><?php _e( 'Recent tweets' ); ?></em></p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="isccontent" class="isc-main">
                        <div class="isc-inner">
                            <?php
                            $this->headlineSetting();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        
        /**
         * Show content for setting headline
         *
         * @return void
         */
        public function headlineSetting()
        {
            $plgurl = plugin_dir_url( dirname(__FILE__) );
            $bgurl  = $plgurl . 'img/bg/';
        ?>
            <div class="isc-main-title">
                <h3>Headline Setting</h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content"></textarea>
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-font"><?php _e( 'Font Size' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_font" id="isc-input-font">
                                        <option value="14">14px</option>
                                        <option value="16">16px</option>
                                        <option value="18">18px</option>
                                        <option value="22">22px</option>
                                        <option value="24">24px</option>
                                        <option value="28">28px</option>
                                        <option value="32">32px</option>
                                        <option value="36">36px</option>
                                        <option value="42">42px</option>
                                        <option value="48">48px</option>
                                        <option value="52">52px</option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-ffamily"><?php _e( 'Font Family' ); ?></label>
                                </th>
                                <td>
                                    <div class="isc-menu isc-gen-menu isc-font-menu">
                                        <div class="isc-selected">
                                            <div class="isc-selected-box">
                                                Arial
                                            </div>
                                            <span class="toggle"></span>
                                        </div>
                                        <div class="isc-select" style="display: none;">
                                            <div class="isc-select-content">
                                                <ul class="clearfix">
                                                    <li data-font="Arial">Arial</li>
                                                    <li data-font="Arial_Black">Arial Black</li>
                                                    <li data-font="Bauhaus93">Bauhaus93</li>
                                                    <li data-font="Cooper_Black">Cooper Black</li>
                                                    <li data-font="Georgia">Georgia</li>
                                                    <li data-font="Impact">Impact</li>
                                                    <li data-font="Times_New_Roman">Times New Roman</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="isc_ffamily" id="isc-input-ffamily" value="Arial" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-bg-1"><?php _e( 'Background' ); ?></label>
                                </th>
                                <td>
                                    <div class="isc-bgoptions">
                                        <ul class="isc-clear">
                                            <li>
                                                <label>
                                                    <input type="radio" name="isc_bg" class="isc-input-bg" value="bghl1-grey" />
                                                    <img src="<?php echo $bgurl; ?>style1-grey.gif">
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="isc_bg" class="isc-input-bg" value="bghl1-red" />
                                                    <img src="<?php echo $bgurl; ?>style1-red.gif">
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="isc_bg" class="isc-input-bg" value="bghl1-yellow" />
                                                    <img src="<?php echo $bgurl; ?>style1-yellow.gif">
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="isc_bg" class="isc-input-bg" value="bghl1-blue" />
                                                    <img src="<?php echo $bgurl; ?>style1-blue.gif">
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="isc_bg" class="isc-input-bg" value="bghl1-green" />
                                                    <img src="<?php echo $bgurl; ?>style1-green.gif">
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="isc_bg" class="isc-input-bg" value="bghl1-pink" />
                                                    <img src="<?php echo $bgurl; ?>style1-pink.gif">
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="isc_bg" class="isc-input-bg" value="no-bg" />
                                                    <img src="<?php echo $bgurl; ?>no-bg.gif">
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'headline' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting headline
         *
         * @return void
         */
        public function headingSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3>Heading Setting</h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-title"><?php _e( 'Title' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-title" name="isc_title" value="" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-style"><?php _e( 'Style' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_style" id="isc-input-style">
                                        <option value="1"><?php _e( 'Style 1' ); ?></option>
                                        <option value="2"><?php _e( 'Style 2' ); ?></option>
                                        <option value="3"><?php _e( 'Style 3' ); ?></option>
                                        <option value="4"><?php _e( 'Style 4' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-tag"><?php _e( 'HTML Tag' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_tag" id="isc-input-tag">
                                        <option value="h1">h1</option>
                                        <option value="h2">h2</option>
                                        <option value="h3">h3</option>
                                        <option value="h4">h4</option>
                                        <option value="h5">h5</option>
                                        <option value="h6">h6</option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-align"><?php _e( 'Text Align' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_align" id="isc-input-align">
                                        <option value="left"><?php _e( 'Left' ); ?></option>
                                        <option value="right"><?php _e( 'Right' ); ?></option>
                                        <option value="center"><?php _e( 'Center' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'heading' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting frame
         *
         * @return void
         */
        public function frameSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3>Frame Setting</h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-image"><?php _e( 'Image Tag' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-image" name="isc_image" placeholder="この部分に画像リンク用のHTMLタグを入力、またはビジュアルエディタで任意の画像を設置してください。画像の背景スタイル2,3を選択した場合は、ショートコード内の画像の前後に改行を加えて任意の背景サイズに調整してください。"></textarea>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-align"><?php _e( 'Frame Align' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_align" id="isc-input-align">
                                        <option value="none"><?php _e( 'None' ); ?></option>
                                        <option value="left"><?php _e( 'Left' ); ?></option>
                                        <option value="right"><?php _e( 'Right' ); ?></option>
                                        <option value="center"><?php _e( 'Center' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-style"><?php _e( 'Style' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_style" id="isc-input-style">
                                        <option value="1"><?php _e( 'Style 1' ); ?></option>
                                        <option value="2"><?php _e( 'Style 2' ); ?></option>
                                        <option value="3"><?php _e( 'Style 3' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'frame' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting pullquote
         *
         * @return void
         */
        public function pullquoteSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3>Pullquote Setting</h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content"></textarea>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-align"><?php _e( 'Pullquote Alignment' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_align" id="isc-input-align">
                                        <option value="none"><?php _e( 'None' ); ?></option>
                                        <option value="left"><?php _e( 'Left' ); ?></option>
                                        <option value="right"><?php _e( 'Right' ); ?></option>
                                        <option value="center"><?php _e( 'Center' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'pullquote' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting testimony
         *
         * @return void
         */
        public function testimonySetting()
        {
        ?>
            <div class="isc-main-title">
                <h3>Testimony Setting</h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-author"><?php _e( 'Author' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-author" name="isc_author" value="" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content"></textarea>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-style"><?php _e( 'Style' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_style" id="isc-input-style">
                                        <option value="1"><?php _e( 'Style 1' ); ?></option>
                                        <option value="2"><?php _e( 'Style 2' ); ?></option>
                                        <option value="3"><?php _e( 'Style 3' ); ?></option>
                                        <option value="4"><?php _e( 'Style 4' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'testimony' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting quote
         *
         * @return void
         */
        public function quoteSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3>Quote Setting</h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'quote' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting divider
         *
         * @return void
         */
        public function dividerSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3>Divider Setting</h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-toplink"><?php _e( 'Show Top Link' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_toplink" id="isc-input-toplink">
                                        <option value="0"><?php _e( 'Hide' ); ?></option>
                                        <option value="1"><?php _e( 'Show' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-style"><?php _e( 'Style' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_style" id="isc-input-style">
                                        <option value="1"><?php _e( 'Style 1' ); ?></option>
                                        <option value="2"><?php _e( 'Style 2' ); ?></option>
                                        <option value="3"><?php _e( 'Style 3' ); ?></option>
                                        <option value="4"><?php _e( 'Style 4' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'divider' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting spacer
         *
         * @return void
         */
        public function spacerSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3>Spacer Setting</h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-height"><?php _e( 'Spacer height in pixels' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-height" name="isc_height" value="" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'spacer' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting highlight
         *
         * @return void
         */
        public function highlightSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3><?php _e( 'Highlight Setting' ); ?></h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-bgcolor"><?php _e( 'Background Color' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" class="isc-color-picker" name="isc_bgcolor" id="isc-input-bgcolor" value="#000000" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-color"><?php _e( 'Text Color' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" class="isc-color-picker" name="isc_color" id="isc-input-color" value="#ffffff" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'highlight' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting label
         *
         * @return void
         */
        public function labelSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3>Label Setting</h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-style"><?php _e( 'Style' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_style" id="isc-input-style">
                                        <option value="default"><?php _e( 'Default' ); ?></option>
                                        <option value="info"><?php _e( 'Info' ); ?></option>
                                        <option value="success"><?php _e( 'Success' ); ?></option>
                                        <option value="warning"><?php _e( 'Warning' ); ?></option>
                                        <option value="error"><?php _e( 'Error' ); ?></option>
                                        <option value="inverse"><?php _e( 'Inverse' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'label' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting message
         *
         * @return void
         */
        public function messageSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3>Message Setting</h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-style"><?php _e( 'Style' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_style" id="isc-input-style">
                                        <option value="info"><?php _e( 'Info' ); ?></option>
                                        <option value="success"><?php _e( 'Success' ); ?></option>
                                        <option value="warning"><?php _e( 'Warning' ); ?></option>
                                        <option value="error"><?php _e( 'Error' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'message' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting list
         *
         * @return void
         */
        public function listSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3>List Setting</h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-icon"><?php _e( 'Icon' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_icon" id="isc-input-icon">
                                        <option value="star-o"><?php _e( 'Star' ); ?></option>
                                        <option value="asterisk"><?php _e( 'Asterisk' ); ?></option>
                                        <option value="check-square-o"><?php _e( 'Check' ); ?></option>
                                        <option value="plus"><?php _e( 'Plus' ); ?></option>
                                        <option value="question"><?php _e( 'Question' ); ?></option>
                                        <option value="long-arrow-right"><?php _e( 'Arrow' ); ?></option>
                                        <option value="arrow-circle-o-right"><?php _e( 'Circle Arrow' ); ?></option>
                                        <option value="play-circle"><?php _e( 'Play Circle' ); ?></option>
                                        <option value="chevron-right"><?php _e( 'Chevron' ); ?></option>
                                        <option value="caret-right"><?php _e( 'Caret' ); ?></option>
                                        <option value="angle-right"><?php _e( 'Angle' ); ?></option>
                                        <option value="angle-double-right"><?php _e( 'Double Angle' ); ?></option>
                                        <option value="circle"><?php _e( 'Circle' ); ?></option>
                                        <option value="cog"><?php _e( 'Options' ); ?></option>
                                        <option value="exclamation-circle"><?php _e( 'Exclamation' ); ?></option>
                                        <option value="comment-o"><?php _e( 'Comment' ); ?></option>
                                        <option value="folder-open"><?php _e( 'Folder' ); ?></option>
                                        <option value="envelope"><?php _e( 'Envelope' ); ?></option>
                                        <option value="phone"><?php _e( 'Phone' ); ?></option>
                                        <option value="clock-o"><?php _e( 'Time' ); ?></option>
                                        <option value="search"><?php _e( 'Search' ); ?></option>
                                        <option value="shopping-cart"><?php _e( 'Shopping Cart' ); ?></option>
                                        <option value="user"><?php _e( 'User' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content" placeholder="Example: <ul><li>List item </li></ul>"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'list' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting definiton list
         *
         * @return void
         */
        public function dlistSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3><?php _e( 'Definition List Setting' ); ?></h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-style"><?php _e( 'Style' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_style" id="isc-input-style">
                                        <option value="1"><?php _e( 'Style 1' ); ?></option>
                                        <option value="2"><?php _e( 'Style 2' ); ?></option>
                                        <option value="3"><?php _e( 'Style 3' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content" placeholder="Example: <dl><dt>List title </dt><dd>List Content</dd></dl>"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'dlist' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting note
         *
         * @return void
         */
        public function noteSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3><?php _e( 'Note Setting' ); ?></h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-color"><?php _e( 'Color' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" class="isc-color-picker" name="isc_color" id="isc-input-color" value="#ffffff" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'note' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting fancy link
         *
         * @return void
         */
        public function fancylinkSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3><?php _e( 'Fancy Link Setting' ); ?></h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-color"><?php _e( 'Link Color' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" class="isc-color-picker" name="isc_color" id="isc-input-color" value="#ffffff" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-style"><?php _e( 'Style' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_style" id="isc-input-style">
                                        <option value="1"><?php _e( 'Style 1' ); ?></option>
                                        <option value="2"><?php _e( 'Style 2' ); ?></option>
                                        <option value="3"><?php _e( 'Style 3' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-url"><?php _e( 'URL' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-url" name="isc_url" value="" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'fancylink' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting box
         *
         * @return void
         */
        public function boxSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3><?php _e( 'Box Setting' ); ?></h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-color"><?php _e( 'Box Color' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" class="isc-color-picker" name="isc_color" id="isc-input-color" value="#000000" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-title"><?php _e( 'Title' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-title" name="isc_title" value="" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'box' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting column
         *
         * @return void
         */
        public function columnSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3><?php _e( 'Column Setting' ); ?></h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-size"><?php _e( 'Column Size' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_size" id="isc-input-size">
                                        <option value="1/2">1/2</option>
                                        <option value="1/3">1/3</option>
                                        <option value="1/4">1/4</option>
                                        <option value="1/5">1/5</option>
                                        <option value="2/3">2/3</option>
                                        <option value="3/4">3/4</option>
                                        <option value="2/5">2/5</option>
                                        <option value="3/5">3/5</option>
                                        <option value="4/5">4/5</option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                </th>
                                <td>
                                    <label for="isc-input-last">
                                        <input type="checkbox" id="isc-input-last" name="isc_last" value="1" />
                                        <?php _e( 'Last Column' ); ?>
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'column' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting spoiler
         *
         * @return void
         */
        public function spoilerSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3><?php _e( 'Spoiler Setting' ); ?></h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-title"><?php _e( 'Title' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-title" name="isc_title" value="" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content"></textarea>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                </th>
                                <td>
                                    <label for="isc-input-open">
                                        <input type="checkbox" id="isc-input-open" name="isc_open" value="1" />
                                        <?php _e( 'Is spoiler open?' ); ?>
                                    </label>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-style"><?php _e( 'Style' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_style" id="isc-input-style">
                                        <option value="1"><?php _e( 'Style 1' ); ?></option>
                                        <option value="2"><?php _e( 'Style 2' ); ?></option>
                                        <option value="3"><?php _e( 'Style 3' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'spoiler' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting button
         *
         * @return void
         */
        public function buttonSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3><?php _e( 'Button Setting' ); ?></h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-label"><?php _e( 'Button Label' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-label" name="isc_label" value="" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-url"><?php _e( 'Button URL' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-url" name="isc_url" value="" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-style"><?php _e( 'Style' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_style" id="isc-input-style">
                                        <option value="default"><?php _e( 'Default' ); ?></option>
                                        <option value="red"><?php _e( 'Red' ); ?></option>
                                        <option value="blue"><?php _e( 'Blue' ); ?></option>
                                        <option value="aqua"><?php _e( 'Aqua' ); ?></option>
                                        <option value="orange"><?php _e( 'Orange' ); ?></option>
                                        <option value="green"><?php _e( 'Green' ); ?></option>
                                        <option value="dark"><?php _e( 'Dark' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-size"><?php _e( 'Button Size' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_size" id="isc-input-size">
                                        <option value="mini"><?php _e( 'Mini' ); ?></option>
                                        <option value="small"><?php _e( 'Small' ); ?></option>
                                        <option value="medium"><?php _e( 'Medium' ); ?></option>
                                        <option value="large"><?php _e( 'Large' ); ?></option>
                                        <option value="verylarge"><?php _e( 'Very Large' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-radius"><?php _e( 'Corner Radius' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_radius" id="isc-input-radius">
                                        <option value="0"><?php _e( 'None' ); ?></option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-icon"><?php _e( 'Button Icon' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_icon" id="isc-input-icon">
                                        <option value="none"><?php _e( 'None' ); ?></option>
                                        <option value="star-o"><?php _e( 'Star' ); ?></option>
                                        <option value="asterisk"><?php _e( 'Asterisk' ); ?></option>
                                        <option value="check-square-o"><?php _e( 'Check' ); ?></option>
                                        <option value="plus"><?php _e( 'Plus' ); ?></option>
                                        <option value="question"><?php _e( 'Question' ); ?></option>
                                        <option value="long-arrow-right"><?php _e( 'Arrow' ); ?></option>
                                        <option value="arrow-circle-o-right"><?php _e( 'Circle Arrow' ); ?></option>
                                        <option value="play-circle"><?php _e( 'Play Circle' ); ?></option>
                                        <option value="chevron-right"><?php _e( 'Chevron' ); ?></option>
                                        <option value="caret-right"><?php _e( 'Caret' ); ?></option>
                                        <option value="angle-right"><?php _e( 'Angle' ); ?></option>
                                        <option value="angle-double-right"><?php _e( 'Double Angle' ); ?></option>
                                        <option value="circle"><?php _e( 'Circle' ); ?></option>
                                        <option value="cog"><?php _e( 'Options' ); ?></option>
                                        <option value="exclamation-circle"><?php _e( 'Exclamation' ); ?></option>
                                        <option value="comment-o"><?php _e( 'Comment' ); ?></option>
                                        <option value="folder-open"><?php _e( 'Folder' ); ?></option>
                                        <option value="envelope"><?php _e( 'Envelope' ); ?></option>
                                        <option value="phone"><?php _e( 'Phone' ); ?></option>
                                        <option value="clock-o"><?php _e( 'Time' ); ?></option>
                                        <option value="search"><?php _e( 'Search' ); ?></option>
                                        <option value="shopping-cart"><?php _e( 'Shopping Cart' ); ?></option>
                                        <option value="user"><?php _e( 'User' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-icon-pos"><?php _e( 'Icon Position' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_icon_pos" id="isc-input-icon-pos">
                                        <option value="before"><?php _e( 'Before Text' ); ?></option>
                                        <option value="after"><?php _e( 'After Text' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-target"><?php _e( 'Link Target' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_target" id="isc-input-target">
                                        <option value="self"><?php _e( 'Self' ); ?></option>
                                        <option value="blank"><?php _e( 'Blank' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'button' );
                    ?>
                </form>
            </div>
        <?php
        }
        

        /**
         * Show content for setting youtube video
         *
         * @return void
         */
        public function youtubeSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3><?php _e( 'Youtube Setting' ); ?></h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-url"><?php _e( 'Video URL' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-url" name="isc_url" value="" /><input type="hidden" id="isc-input-autostart" name="isc_autostart" value="0" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-width"><?php _e( 'Width' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-width" name="isc_width" value="" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-height"><?php _e( 'Height' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-height" name="isc_height" value="" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'youtube' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting google map
         *
         * @return void
         */
        public function gmapSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3><?php _e( 'Google Map Setting' ); ?></h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-latitude"><?php _e( 'Map Latitude' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-latitude" name="isc_latitude" value="" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-longitude"><?php _e( 'Map Longitude' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-longitude" name="isc_longitude" value="" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-width"><?php _e( 'Width' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-width" name="isc_width" value="" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-height"><?php _e( 'Height' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-height" name="isc_height" value="" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'gmap' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting service
         *
         * @return void
         */
        public function serviceSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3><?php _e( 'Service Setting' ); ?></h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-title"><?php _e( 'Title' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-title" name="isc_title" value="" placeholder="Service title" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-icon"><?php _e( 'Icon URL' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-icon" name="isc_icon" value="" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content" placeholder="Service description"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'service' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting tweets
         *
         * @return void
         */
        public function tweetsSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3><?php _e( 'Tweets Setting' ); ?></h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-username"><?php _e( 'Twitter Username' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-username" name="isc_username" value="" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-count"><?php _e( 'Number of tweets to show' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-count" name="isc_count" value="" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-style"><?php _e( 'Tweets Style' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_style" id="isc-input-style">
                                        <option value="light"><?php _e( 'Light' ); ?></option>
                                        <option value="dark"><?php _e( 'Dark' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'tweets' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting slider
         *
         * @return void
         */
        public function sliderSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3><?php _e( 'Tweets Setting' ); ?></h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-source"><?php _e( 'Source of Images' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_source" id="isc-input-source">
                                        <option value="current"><?php _e( 'Current' ); ?></option>
                                        <option value="post"><?php _e( 'Post' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="isc-slider-post-id" valign="top" style="display: none;">
                                <th scope="row">
                                    <label for="isc-input-post-id"><?php _e( 'Post' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_id" id="isc-input-post-id">
                                        <?php
                                        $posts = get_posts( array( 'numberposts' => 0 ) );
                                        foreach( $posts as $post ) {
                                            echo '<option value="' . $post->ID . '">' . $post->post_title . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-link"><?php _e( 'Image Link' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_link" id="isc-input-link">
                                        <option value="image"><?php _e( 'Image' ); ?></option>
                                        <option value="permalink"><?php _e( 'Permalink' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-size"><?php _e( 'Slider size' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_size" id="isc-input-size">
                                        <option value="100x100">100 x 100</option>
                                        <option value="150x150">150 x 150</option>
                                        <option value="200x200">200 x 200</option>
                                        <option value="300x200">300 x 200</option>
                                        <option value="500x300">500 x 300</option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-count"><?php _e( 'Number of slides' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_count" id="isc-input-count">
                                        <option value="3">3</option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-speed"><?php _e( 'Animation speed (1000 = 1 second)' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-speed" name="isc_speed" value="" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-delay"><?php _e( 'Animation delay (1000 = 1 second)' ); ?></label>
                                </th>
                                <td>
                                    <input type="text" id="isc-input-delay" name="isc_delay" value="" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'slider' );
                    ?>
                </form>
            </div>
            <script type="text/javascript">
                
            </script>
        <?php
        }
        
        /**
         * Show content for setting tabs
         *
         * @return void
         */
        public function tabsSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3><?php _e( 'Tabs Setting' ); ?></h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-style"><?php _e( 'Style' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_style" id="isc-input-style">
                                        <option value="1"><?php _e( 'Style 1' ); ?></option>
                                        <option value="2"><?php _e( 'Style 2' ); ?></option>
                                        <option value="3"><?php _e( 'Style 3' ); ?></option>
                                        <option value="4"><?php _e( 'Style 4' ); ?></option>
                                        <option value="5"><?php _e( 'Style 5' ); ?></option>
                                        <option value="6"><?php _e( 'Style 6' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content"></textarea>
    <pre class="info">
    For the contents of the tabs you must specify within html tag definition list, like the following example:
        &lt;dl&gt;
            &lt;dt&gt;Tab Menu 1&lt;/dt&gt;
            &lt;dd&gt;Tab Content 1&lt;/dd&gt;
            &lt;dt&gt;Tab Menu 2&lt;/dt&gt;
            &lt;dd&gt;Tab Content 2&lt;/dd&gt;
        &lt;/dl&gt;
    </pre>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'tabs' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show content for setting accordion
         *
         * @return void
         */
        public function accordionSetting()
        {
        ?>
            <div class="isc-main-title">
                <h3><?php _e( 'Accordion Setting' ); ?></h3>
            </div>
            <div class="isc-main-content">
                <form class="isc-form" action="" method="post">
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-style"><?php _e( 'Style' ); ?></label>
                                </th>
                                <td>
                                    <select name="isc_style" id="isc-input-style">
                                        <option value="1"><?php _e( 'Style 1' ); ?></option>
                                        <option value="2"><?php _e( 'Style 2' ); ?></option>
                                        <option value="3"><?php _e( 'Style 3' ); ?></option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row">
                                    <label for="isc-input-content"><?php _e( 'Content' ); ?></label>
                                </th>
                                <td>
                                    <textarea id="isc-input-content" name="isc_content"></textarea>
    <pre class="info">
    For the contents of the accordions you must specify within html tag definition list, like the following example:
        &lt;dl&gt;
            &lt;dt&gt;Tab Menu 1&lt;/dt&gt;
            &lt;dd&gt;Tab Content 1&lt;/dd&gt;
            &lt;dt&gt;Tab Menu 2&lt;/dt&gt;
            &lt;dd&gt;Tab Content 2&lt;/dd&gt;
        &lt;/dl&gt;
    </pre>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                    $this->buttonInsert( 'accordion' );
                    ?>
                </form>
            </div>
        <?php
        }
        
        /**
         * Show button insert
         *
         * @return void
         */
        public function buttonInsert( $name )
        {
        ?>
            <div class="buttons isc-clear">
                <input type="submit" class="button button-primary button-large isc-button-insert" id="isc-add-<?php echo $name; ?>" name="isc_add_<?php echo $name; ?>" value="<?php _e( 'Insert' ); ?>" />
                <input type="hidden" id="type-shortcode" value="<?php echo $name; ?>" name="__type">
            </div>
        <?php
        }
    }
    
}