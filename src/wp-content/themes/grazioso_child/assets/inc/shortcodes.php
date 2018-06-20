<?php 
 /**
  * @package TRIAD Inc.
  * @since 1.0
 */
 
	/**
	 * Create theme shortcodes
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	// Colors
	
	function shortcode_red( $atts, $content = null ) {
		return '<div class="shortcode_red">' . $content . '</div>';
	}
	add_shortcode('red', 'shortcode_red');	
	
	function shortcode_blue( $atts, $content = null ) {
		return '<div class="shortcode_blue">' . $content . '</div>';
	}
	add_shortcode('blue', 'shortcode_blue');
	
	function shortcode_green( $atts, $content = null ) {
		return '<div class="shortcode_green">' . $content . '</div>';
	}
	add_shortcode('green', 'shortcode_green');
	
	function shortcode_orange( $atts, $content = null ) {
		return '<div class="shortcode_orange">' . $content . '</div>';
	}
	add_shortcode('orange', 'shortcode_orange');
	
	function shortcode_purple( $atts, $content = null ) {
		return '<div class="shortcode_purple">' . $content . '</div>';
	}
	add_shortcode('purple', 'shortcode_purple');		

	function leftfloat_shortcode( $atts, $content = null ) {
		return '<div class="leftfloat">' . $content . '</div>';
	}
	add_shortcode('leftfloat', 'leftfloat_shortcode');
	
	function rightfloat_shortcode( $atts, $content = null ) {
		return '<div class="rightfloat">' . $content . '</div>';
	}
	add_shortcode('rightfloat', 'rightfloat_shortcode');
	
	
	
	
	
	// FontAwesome: Caret
	
	function shortcode_caret_right( $atts, $content = null ) {
		return '<i class="fa fa-caret-right"></i>' . $content . '';
	}
	add_shortcode('caret-right', 'shortcode_caret_right');
	
	function shortcode_caret_right_large( $atts, $content = null ) {
		return '<i class="fa fa-caret-right fa-lg"></i>' . $content . '';
	}
	add_shortcode('caret-right-lg', 'shortcode_caret_right_large');
	
	function shortcode_caret_right_2x( $atts, $content = null ) {
		return '<i class="fa fa-caret-right fa-2x"></i>' . $content . '';
	}
	add_shortcode('caret-right-2x', 'shortcode_caret_right_2x');
	
	function shortcode_caret_right_3x( $atts, $content = null ) {
		return '<i class="fa fa-caret-right fa-3x"></i>' . $content . '';
	}
	add_shortcode('caret-right-3x', 'shortcode_caret_right_3x');
	
	function shortcode_caret_right_4x( $atts, $content = null ) {
		return '<i class="fa fa-caret-right fa-4x"></i>' . $content . '';
	}
	add_shortcode('caret-right-4x', 'shortcode_caret_right_4x');
	
	function shortcode_caret_right_5x( $atts, $content = null ) {
		return '<i class="fa fa-caret-right fa-5x"></i>' . $content . '';
	}
	add_shortcode('caret-right-5x', 'shortcode_caret_right_5x');
	
	function shortcode_caret_left( $atts, $content = null ) {
		return '<i class="fa fa-caret-left"></i>' . $content . '';
	}
	add_shortcode('caret-left', 'shortcode_caret_left');
	
	function shortcode_caret_left_large( $atts, $content = null ) {
		return '<i class="fa fa-caret-left fa-lg"></i>' . $content . '';
	}
	add_shortcode('caret-left-lg', 'shortcode_caret_left_large');
	
	function shortcode_caret_left_2x( $atts, $content = null ) {
		return '<i class="fa fa-caret-left fa-2x"></i>' . $content . '';
	}
	add_shortcode('caret-left-2x', 'shortcode_caret_left_2x');
	
	function shortcode_caret_left_3x( $atts, $content = null ) {
		return '<i class="fa fa-caret-left fa-3x"></i>' . $content . '';
	}
	add_shortcode('caret-left-3x', 'shortcode_caret_left_3x');
	
	function shortcode_caret_left_4x( $atts, $content = null ) {
		return '<i class="fa fa-caret-left fa-4x"></i>' . $content . '';
	}
	add_shortcode('caret-left-4x', 'shortcode_caret_left_4x');
	
	function shortcode_caret_left_5x( $atts, $content = null ) {
		return '<i class="fa fa-caret-left fa-5x"></i>' . $content . '';
	}
	add_shortcode('caret-left-5x', 'shortcode_caret_left_5x');
	
	
	// FontAwesome: Toggle
	
	function shortcode_toggle_right( $atts, $content = null ) {
		return '<i class="fa fa-toggle-right"></i>' . $content . '';
	}
	add_shortcode('toggle-right', 'shortcode_toggle_right');
	
	function shortcode_toggle_right_large( $atts, $content = null ) {
		return '<i class="fa fa-toggle-right fa-lg"></i>' . $content . '';
	}
	add_shortcode('toggle-right-lg', 'shortcode_toggle_right_large');
	
	function shortcode_toggle_right_2x( $atts, $content = null ) {
		return '<i class="fa fa-toggle-right fa-2x"></i>' . $content . '';
	}
	add_shortcode('toggle-right-2x', 'shortcode_toggle_right_2x');
	
	function shortcode_toggle_right_3x( $atts, $content = null ) {
		return '<i class="fa fa-toggle-right fa-3x"></i>' . $content . '';
	}
	add_shortcode('toggle-right-3x', 'shortcode_toggle_right_3x');
	
	function shortcode_toggle_right_4x( $atts, $content = null ) {
		return '<i class="fa fa-toggle-right fa-4x"></i>' . $content . '';
	}
	add_shortcode('toggle-right-4x', 'shortcode_toggle_right_4x');
	
	function shortcode_toggle_right_5x( $atts, $content = null ) {
		return '<i class="fa fa-toggle-right fa-5x"></i>' . $content . '';
	}
	add_shortcode('toggle-right-5x', 'shortcode_toggle_right_5x');
	
	function shortcode_toggle_left( $atts, $content = null ) {
		return '<i class="fa fa-toggle-left"></i>' . $content . '';
	}
	add_shortcode('toggle-left', 'shortcode_toggle_left');
	
	function shortcode_toggle_left_large( $atts, $content = null ) {
		return '<i class="fa fa-toggle-left fa-lg"></i>' . $content . '';
	}
	add_shortcode('toggle-left-lg', 'shortcode_toggle_left_large');
	
	function shortcode_toggle_left_2x( $atts, $content = null ) {
		return '<i class="fa fa-toggle-left fa-2x"></i>' . $content . '';
	}
	add_shortcode('toggle-left-2x', 'shortcode_toggle_left_2x');
	
	function shortcode_toggle_left_3x( $atts, $content = null ) {
		return '<i class="fa fa-toggle-left fa-3x"></i>' . $content . '';
	}
	add_shortcode('toggle-left-3x', 'shortcode_toggle_left_3x');
	
	function shortcode_toggle_left_4x( $atts, $content = null ) {
		return '<i class="fa fa-toggle-left fa-4x"></i>' . $content . '';
	}
	add_shortcode('toggle-left-4x', 'shortcode_toggle_left_4x');
	
	function shortcode_toggle_left_5x( $atts, $content = null ) {
		return '<i class="fa fa-toggle-left fa-5x"></i>' . $content . '';
	}
	add_shortcode('toggle-left-5x', 'shortcode_toggle_left_5x');
	
	
	// FontAwesome: Hand O
	
	function shortcode_hand_right( $atts, $content = null ) {
		return '<i class="fa fa-hand-o-right"></i>' . $content . '';
	}
	add_shortcode('hand-right', 'shortcode_hand_right');
	
	function shortcode_hand_right_large( $atts, $content = null ) {
		return '<i class="fa fa-hand-o-right fa-lg"></i>' . $content . '';
	}
	add_shortcode('hand-right-lg', 'shortcode_hand_right_large');
	
	function shortcode_hand_right_2x( $atts, $content = null ) {
		return '<i class="fa fa-hand-o-right fa-2x"></i>' . $content . '';
	}
	add_shortcode('hand-right-2x', 'shortcode_hand_right_2x');
	
	function shortcode_hand_right_3x( $atts, $content = null ) {
		return '<i class="fa fa-hand-o-right fa-3x"></i>' . $content . '';
	}
	add_shortcode('hand-right-3x', 'shortcode_hand_right_3x');
	
	function shortcode_hand_right_4x( $atts, $content = null ) {
		return '<i class="fa fa-hand-o-right fa-4x"></i>' . $content . '';
	}
	add_shortcode('hand-right-4x', 'shortcode_hand_right_4x');
	
	function shortcode_hand_right_5x( $atts, $content = null ) {
		return '<i class="fa fa-hand-o-right fa-5x"></i>' . $content . '';
	}
	add_shortcode('hand-right-5x', 'shortcode_hand_right_5x');
	
	function shortcode_hand_left( $atts, $content = null ) {
		return '<i class="fa fa-hand-o-left"></i>' . $content . '';
	}
	add_shortcode('hand-left', 'shortcode_hand_left');
	
	function shortcode_hand_left_large( $atts, $content = null ) {
		return '<i class="fa fa-hand-o-left fa-lg"></i>' . $content . '';
	}
	add_shortcode('hand-left-lg', 'shortcode_hand_left_large');
	
	function shortcode_hand_left_2x( $atts, $content = null ) {
		return '<i class="fa fa-hand-o-left fa-2x"></i>' . $content . '';
	}
	add_shortcode('hand-left-2x', 'shortcode_hand_left_2x');
	
	function shortcode_hand_left_3x( $atts, $content = null ) {
		return '<i class="fa fa-hand-o-left fa-3x"></i>' . $content . '';
	}
	add_shortcode('hand-left-3x', 'shortcode_hand_left_3x');
	
	function shortcode_hand_left_4x( $atts, $content = null ) {
		return '<i class="fa fa-hand-o-left fa-4x"></i>' . $content . '';
	}
	add_shortcode('hand-left-4x', 'shortcode_hand_left_4x');
	
	function shortcode_hand_left_5x( $atts, $content = null ) {
		return '<i class="fa fa-hand-o-left fa-5x"></i>' . $content . '';
	}
	add_shortcode('hand-left-5x', 'shortcode_hand_left_5x');
	
	
	// FontAwesome: Arrow	
	
	function shortcode_arrow_right( $atts, $content = null ) {
		return '<i class="fa fa-arrow-right"></i>' . $content . '';
	}
	add_shortcode('arrow-right', 'shortcode_arrow_right');
	
	function shortcode_arrow_right_large( $atts, $content = null ) {
		return '<i class="fa fa-arrow-right fa-lg"></i>' . $content . '';
	}
	add_shortcode('arrow-right-lg', 'shortcode_arrow_right_large');
	
	function shortcode_arrow_right_2x( $atts, $content = null ) {
		return '<i class="fa fa-arrow-right fa-2x"></i>' . $content . '';
	}
	add_shortcode('arrow-right-2x', 'shortcode_arrow_right_2x');
	
	function shortcode_arrow_right_3x( $atts, $content = null ) {
		return '<i class="fa fa-arrow-right fa-3x"></i>' . $content . '';
	}
	add_shortcode('arrow-right-3x', 'shortcode_arrow_right_3x');
	
	function shortcode_arrow_right_4x( $atts, $content = null ) {
		return '<i class="fa fa-arrow-right fa-4x"></i>' . $content . '';
	}
	add_shortcode('arrow-right-4x', 'shortcode_arrow_right_4x');
	
	function shortcode_arrow_right_5x( $atts, $content = null ) {
		return '<i class="fa fa-arrow-right fa-5x"></i>' . $content . '';
	}
	add_shortcode('arrow-right-5x', 'shortcode_arrow_right_5x');
	
	function shortcode_arrow_left( $atts, $content = null ) {
		return '<i class="fa fa-arrow-left"></i>' . $content . '';
	}
	add_shortcode('arrow-left', 'shortcode_arrow_left');
	
	function shortcode_arrow_left_large( $atts, $content = null ) {
		return '<i class="fa fa-arrow-left fa-lg"></i>' . $content . '';
	}
	add_shortcode('arrow-left-lg', 'shortcode_arrow_left_large');
	
	function shortcode_arrow_left_2x( $atts, $content = null ) {
		return '<i class="fa fa-arrow-left fa-2x"></i>' . $content . '';
	}
	add_shortcode('arrow-left-2x', 'shortcode_arrow_left_2x');
	
	function shortcode_arrow_left_3x( $atts, $content = null ) {
		return '<i class="fa fa-arrow-left fa-3x"></i>' . $content . '';
	}
	add_shortcode('arrow-left-3x', 'shortcode_arrow_left_3x');
	
	function shortcode_arrow_left_4x( $atts, $content = null ) {
		return '<i class="fa fa-arrow-left fa-4x"></i>' . $content . '';
	}
	add_shortcode('arrow-left-4x', 'shortcode_arrow_left_4x');
	
	function shortcode_arrow_left_5x( $atts, $content = null ) {
		return '<i class="fa fa-arrow-left fa-5x"></i>' . $content . '';
	}
	add_shortcode('arrow-left-5x', 'shortcode_arrow_left_5x');
	
	
	// FontAwesome: Chevron

	function shortcode_chevron_right( $atts, $content = null ) {
		return '<i class="fa fa-chevron-right"></i>' . $content . '';
	}
	add_shortcode('chevron-right', 'shortcode_chevron_right');
	
	function shortcode_chevron_right_large( $atts, $content = null ) {
		return '<i class="fa fa-chevron-right fa-lg"></i>' . $content . '';
	}
	add_shortcode('chevron-right-lg', 'shortcode_chevron_right_large');
	
	function shortcode_chevron_right_2x( $atts, $content = null ) {
		return '<i class="fa fa-chevron-right fa-2x"></i>' . $content . '';
	}
	add_shortcode('chevron-right-2x', 'shortcode_chevron_right_2x');
	
	function shortcode_chevron_right_3x( $atts, $content = null ) {
		return '<i class="fa fa-chevron-right fa-3x"></i>' . $content . '';
	}
	add_shortcode('chevron-right-3x', 'shortcode_chevron_right_3x');
	
	function shortcode_chevron_right_4x( $atts, $content = null ) {
		return '<i class="fa fa-chevron-right fa-4x"></i>' . $content . '';
	}
	add_shortcode('chevron-right-4x', 'shortcode_chevron_right_4x');
	
	function shortcode_chevron_right_5x( $atts, $content = null ) {
		return '<i class="fa fa-chevron-right fa-5x"></i>' . $content . '';
	}
	add_shortcode('chevron-right-5x', 'shortcode_chevron_right_5x');

	function shortcode_chevron_left( $atts, $content = null ) {
		return '<i class="fa fa-chevron-left"></i>' . $content . '';
	}
	add_shortcode('chevron-left', 'shortcode_chevron_left');
	
	function shortcode_chevron_left_large( $atts, $content = null ) {
		return '<i class="fa fa-chevron-left fa-lg"></i>' . $content . '';
	}
	add_shortcode('chevron-left-lg', 'shortcode_chevron_left_large');
	
	function shortcode_chevron_left_2x( $atts, $content = null ) {
		return '<i class="fa fa-chevron-left fa-2x"></i>' . $content . '';
	}
	add_shortcode('chevron-left-2x', 'shortcode_chevron_left_2x');
	
	function shortcode_chevron_left_3x( $atts, $content = null ) {
		return '<i class="fa fa-chevron-left fa-3x"></i>' . $content . '';
	}
	add_shortcode('chevron-left-3x', 'shortcode_chevron_left_3x');
	
	function shortcode_chevron_left_4x( $atts, $content = null ) {
		return '<i class="fa fa-chevron-left fa-4x"></i>' . $content . '';
	}
	add_shortcode('chevron-left-4x', 'shortcode_chevron_left_4x');
	
	function shortcode_chevron_left_5x( $atts, $content = null ) {
		return '<i class="fa fa-chevron-left fa-5x"></i>' . $content . '';
	}
	add_shortcode('chevron-left-5x', 'shortcode_chevron_left_5x');
	
	
	// FontAwesome: Angle
	
	function shortcode_angle_right( $atts, $content = null ) {
		return '<i class="fa fa-angle-right"></i>' . $content . '';
	}
	add_shortcode('angle-right', 'shortcode_angle_right');
	
	function shortcode_angle_right_large( $atts, $content = null ) {
		return '<i class="fa fa-angle-right fa-lg"></i>' . $content . '';
	}
	add_shortcode('angle-right-lg', 'shortcode_angle_right_large');
	
	function shortcode_angle_right_2x( $atts, $content = null ) {
		return '<i class="fa fa-angle-right fa-2x"></i>' . $content . '';
	}
	add_shortcode('angle-right-2x', 'shortcode_angle_right_2x');
	
	function shortcode_angle_right_3x( $atts, $content = null ) {
		return '<i class="fa fa-angle-right fa-3x"></i>' . $content . '';
	}
	add_shortcode('angle-right-3x', 'shortcode_angle_right_3x');
	
	function shortcode_angle_right_4x( $atts, $content = null ) {
		return '<i class="fa fa-angle-right fa-4x"></i>' . $content . '';
	}
	add_shortcode('angle-right-4x', 'shortcode_angle_right_4x');
	
	function shortcode_angle_right_5x( $atts, $content = null ) {
		return '<i class="fa fa-angle-right fa-5x"></i>' . $content . '';
	}
	add_shortcode('angle-right-5x', 'shortcode_angle_right_5x');
	
	function shortcode_angle_left( $atts, $content = null ) {
		return '<i class="fa fa-angle-left"></i>' . $content . '';
	}
	add_shortcode('angle-left', 'shortcode_angle_left');
	
	function shortcode_angle_left_large( $atts, $content = null ) {
		return '<i class="fa fa-angle-left fa-lg"></i>' . $content . '';
	}
	add_shortcode('angle-left-lg', 'shortcode_angle_left_large');
	
	function shortcode_angle_left_2x( $atts, $content = null ) {
		return '<i class="fa fa-angle-left fa-2x"></i>' . $content . '';
	}
	add_shortcode('angle-left-2x', 'shortcode_angle_left_2x');
	
	function shortcode_angle_left_3x( $atts, $content = null ) {
		return '<i class="fa fa-angle-left fa-3x"></i>' . $content . '';
	}
	add_shortcode('angle-left-3x', 'shortcode_angle_left_3x');
	
	function shortcode_angle_left_4x( $atts, $content = null ) {
		return '<i class="fa fa-angle-left fa-4x"></i>' . $content . '';
	}
	add_shortcode('angle-left-4x', 'shortcode_angle_left_4x');
	
	function shortcode_angle_left_5x( $atts, $content = null ) {
		return '<i class="fa fa-angle-left fa-5x"></i>' . $content . '';
	}
	add_shortcode('angle-left-5x', 'shortcode_angle_left_5x');
	
	
	// FontAwesome: Android
	
	function shortcode_android( $atts, $content = null ) {
		return '<i class="fa fa-android"></i>' . $content . '';
	}
	add_shortcode('android', 'shortcode_android');
	
	function shortcode_android_large( $atts, $content = null ) {
		return '<i class="fa fa-android fa-lg"></i>' . $content . '';
	}
	add_shortcode('android-lg', 'shortcode_android_large');
	
	function shortcode_android_2x( $atts, $content = null ) {
		return '<i class="fa fa-android fa-2x"></i>' . $content . '';
	}
	add_shortcode('android-2x', 'shortcode_android_2x');
	
	function shortcode_android_3x( $atts, $content = null ) {
		return '<i class="fa fa-android fa-3x"></i>' . $content . '';
	}
	add_shortcode('android-3x', 'shortcode_android_3x');
	
	function shortcode_android_4x( $atts, $content = null ) {
		return '<i class="fa fa-android fa-4x"></i>' . $content . '';
	}
	add_shortcode('android-4x', 'shortcode_android_4x');
	
	function shortcode_android_5x( $atts, $content = null ) {
		return '<i class="fa fa-android fa-5x"></i>' . $content . '';
	}
	add_shortcode('android-5x', 'shortcode_android_5x');

	
	// FontAwesome: Apple
	
	function shortcode_apple( $atts, $content = null ) {
		return '<i class="fa fa-apple"></i>' . $content . '';
	}
	add_shortcode('apple', 'shortcode_apple');
	
	function shortcode_apple_large( $atts, $content = null ) {
		return '<i class="fa fa-apple fa-lg"></i>' . $content . '';
	}
	add_shortcode('apple-lg', 'shortcode_apple_large');
	
	function shortcode_apple_2x( $atts, $content = null ) {
		return '<i class="fa fa-apple fa-2x"></i>' . $content . '';
	}
	add_shortcode('apple-2x', 'shortcode_apple_2x');
	
	function shortcode_apple_3x( $atts, $content = null ) {
		return '<i class="fa fa-apple fa-3x"></i>' . $content . '';
	}
	add_shortcode('apple-3x', 'shortcode_apple_3x');
	
	function shortcode_apple_4x( $atts, $content = null ) {
		return '<i class="fa fa-apple fa-4x"></i>' . $content . '';
	}
	add_shortcode('apple-4x', 'shortcode_apple_4x');
	
	function shortcode_apple_5x( $atts, $content = null ) {
		return '<i class="fa fa-apple fa-5x"></i>' . $content . '';
	}
	add_shortcode('apple-5x', 'shortcode_apple_5x');
	
	
	// FontAwesome: BitBucket
	
	function shortcode_bitbucket( $atts, $content = null ) {
		return '<i class="fa fa-bitbucket"></i>' . $content . '';
	}
	add_shortcode('bitbucket', 'shortcode_bitbucket');
	
	function shortcode_bitbucket_large( $atts, $content = null ) {
		return '<i class="fa fa-bitbucket fa-lg"></i>' . $content . '';
	}
	add_shortcode('bitbucket-lg', 'shortcode_bitbucket_large');
	
	function shortcode_bitbucket_2x( $atts, $content = null ) {
		return '<i class="fa fa-bitbucket fa-2x"></i>' . $content . '';
	}
	add_shortcode('bitbucket-2x', 'shortcode_bitbucket_2x');
	
	function shortcode_bitbucket_3x( $atts, $content = null ) {
		return '<i class="fa fa-bitbucket fa-3x"></i>' . $content . '';
	}
	add_shortcode('bitbucket-3x', 'shortcode_bitbucket_3x');
	
	function shortcode_bitbucket_4x( $atts, $content = null ) {
		return '<i class="fa fa-bitbucket fa-4x"></i>' . $content . '';
	}
	add_shortcode('bitbucket-4x', 'shortcode_bitbucket_4x');
	
	function shortcode_bitbucket_5x( $atts, $content = null ) {
		return '<i class="fa fa-bitbucket fa-5x"></i>' . $content . '';
	}
	add_shortcode('bitbucket-5x', 'shortcode_bitbucket_5x');
	

	// FontAwesome: CSS3
	
	function shortcode_css3( $atts, $content = null ) {
		return '<i class="fa fa-css3"></i>' . $content . '';
	}
	add_shortcode('css3', 'shortcode_css3');
	
	function shortcode_css3_large( $atts, $content = null ) {
		return '<i class="fa fa-css3 fa-lg"></i>' . $content . '';
	}
	add_shortcode('css3-lg', 'shortcode_css3_large');
	
	function shortcode_css3_2x( $atts, $content = null ) {
		return '<i class="fa fa-css3 fa-2x"></i>' . $content . '';
	}
	add_shortcode('css3-2x', 'shortcode_css3_2x');
	
	function shortcode_css3_3x( $atts, $content = null ) {
		return '<i class="fa fa-css3 fa-3x"></i>' . $content . '';
	}
	add_shortcode('css3-3x', 'shortcode_css3_3x');
	
	function shortcode_css3_4x( $atts, $content = null ) {
		return '<i class="fa fa-css3 fa-4x"></i>' . $content . '';
	}
	add_shortcode('css3-4x', 'shortcode_css3_4x');
	
	function shortcode_css3_5x( $atts, $content = null ) {
		return '<i class="fa fa-css3 fa-5x"></i>' . $content . '';
	}
	add_shortcode('css3-5x', 'shortcode_css3_5x');
	

	// FontAwesome: Dribbble
	
	function shortcode_dribbble( $atts, $content = null ) {
		return '<i class="fa fa-dribbble"></i>' . $content . '';
	}
	add_shortcode('dribbble', 'shortcode_dribbble');
	
	function shortcode_dribbble_large( $atts, $content = null ) {
		return '<i class="fa fa-dribbble fa-lg"></i>' . $content . '';
	}
	add_shortcode('dribbble-lg', 'shortcode_dribbble_large');
	
	function shortcode_dribbble_2x( $atts, $content = null ) {
		return '<i class="fa fa-dribbble fa-2x"></i>' . $content . '';
	}
	add_shortcode('dribbble-2x', 'shortcode_dribbble_2x');
	
	function shortcode_dribbble_3x( $atts, $content = null ) {
		return '<i class="fa fa-dribbble fa-3x"></i>' . $content . '';
	}
	add_shortcode('dribbble-3x', 'shortcode_dribbble_3x');
	
	function shortcode_dribbble_4x( $atts, $content = null ) {
		return '<i class="fa fa-dribbble fa-4x"></i>' . $content . '';
	}
	add_shortcode('dribbble-4x', 'shortcode_dribbble_4x');
	
	function shortcode_dribbble_5x( $atts, $content = null ) {
		return '<i class="fa fa-dribbble fa-5x"></i>' . $content . '';
	}
	add_shortcode('dribbble-5x', 'shortcode_dribbble_5x');
	

	// FontAwesome: Facebook
	
	function shortcode_facebook( $atts, $content = null ) {
		return '<i class="fa fa-facebook"></i>' . $content . '';
	}
	add_shortcode('facebook', 'shortcode_facebook');
	
	function shortcode_facebook_large( $atts, $content = null ) {
		return '<i class="fa fa-facebook fa-lg"></i>' . $content . '';
	}
	add_shortcode('facebook-lg', 'shortcode_facebook_large');
	
	function shortcode_facebook_2x( $atts, $content = null ) {
		return '<i class="fa fa-facebook fa-2x"></i>' . $content . '';
	}
	add_shortcode('facebook-2x', 'shortcode_facebook_2x');
	
	function shortcode_facebook_3x( $atts, $content = null ) {
		return '<i class="fa fa-facebook fa-3x"></i>' . $content . '';
	}
	add_shortcode('facebook-3x', 'shortcode_facebook_3x');
	
	function shortcode_facebook_4x( $atts, $content = null ) {
		return '<i class="fa fa-facebook fa-4x"></i>' . $content . '';
	}
	add_shortcode('facebook-4x', 'shortcode_facebook_4x');
	
	function shortcode_facebook_5x( $atts, $content = null ) {
		return '<i class="fa fa-facebook fa-5x"></i>' . $content . '';
	}
	add_shortcode('facebook-5x', 'shortcode_facebook_5x');
	

	// FontAwesome: Flickr
	
	function shortcode_flickr( $atts, $content = null ) {
		return '<i class="fa fa-flickr"></i>' . $content . '';
	}
	add_shortcode('flickr', 'shortcode_flickr');
	
	function shortcode_flickr_large( $atts, $content = null ) {
		return '<i class="fa fa-flickr fa-lg"></i>' . $content . '';
	}
	add_shortcode('flickr-lg', 'shortcode_flickr_large');
	
	function shortcode_flickr_2x( $atts, $content = null ) {
		return '<i class="fa fa-flickr fa-2x"></i>' . $content . '';
	}
	add_shortcode('flickr-2x', 'shortcode_flickr_2x');
	
	function shortcode_flickr_3x( $atts, $content = null ) {
		return '<i class="fa fa-flickr fa-3x"></i>' . $content . '';
	}
	add_shortcode('flickr-3x', 'shortcode_flickr_3x');
	
	function shortcode_flickr_4x( $atts, $content = null ) {
		return '<i class="fa fa-flickr fa-4x"></i>' . $content . '';
	}
	add_shortcode('flickr-4x', 'shortcode_flickr_4x');
	
	function shortcode_flickr_5x( $atts, $content = null ) {
		return '<i class="fa fa-flickr fa-5x"></i>' . $content . '';
	}
	add_shortcode('flickr-5x', 'shortcode_flickr_5x');
	
	
	// FontAwesome: GitHub
	
	function shortcode_github( $atts, $content = null ) {
		return '<i class="fa fa-github"></i>' . $content . '';
	}
	add_shortcode('github', 'shortcode_github');
	
	function shortcode_github_large( $atts, $content = null ) {
		return '<i class="fa fa-github fa-lg"></i>' . $content . '';
	}
	add_shortcode('github-lg', 'shortcode_github_large');
	
	function shortcode_github_2x( $atts, $content = null ) {
		return '<i class="fa fa-github fa-2x"></i>' . $content . '';
	}
	add_shortcode('github-2x', 'shortcode_github_2x');
	
	function shortcode_github_3x( $atts, $content = null ) {
		return '<i class="fa fa-github fa-3x"></i>' . $content . '';
	}
	add_shortcode('github-3x', 'shortcode_github_3x');
	
	function shortcode_github_4x( $atts, $content = null ) {
		return '<i class="fa fa-github fa-4x"></i>' . $content . '';
	}
	add_shortcode('github-4x', 'shortcode_github_4x');
	
	function shortcode_github_5x( $atts, $content = null ) {
		return '<i class="fa fa-github fa-5x"></i>' . $content . '';
	}
	add_shortcode('github-5x', 'shortcode_github_5x');
	

	// FontAwesome: Google PLus
	
	function shortcode_google_plus( $atts, $content = null ) {
		return '<i class="fa fa-google-plus"></i>' . $content . '';
	}
	add_shortcode('google-plus', 'shortcode_google_plus');
	
	function shortcode_google_plus_large( $atts, $content = null ) {
		return '<i class="fa fa-google-plus fa-lg"></i>' . $content . '';
	}
	add_shortcode('google-plus-lg', 'shortcode_google_plus_large');
	
	function shortcode_google_plus_2x( $atts, $content = null ) {
		return '<i class="fa fa-google-plus fa-2x"></i>' . $content . '';
	}
	add_shortcode('google-plus-2x', 'shortcode_google_plus_2x');
	
	function shortcode_google_plus_3x( $atts, $content = null ) {
		return '<i class="fa fa-google-plus fa-3x"></i>' . $content . '';
	}
	add_shortcode('google-plus-3x', 'shortcode_google_plus_3x');
	
	function shortcode_google_plus_4x( $atts, $content = null ) {
		return '<i class="fa fa-google-plus fa-4x"></i>' . $content . '';
	}
	add_shortcode('google-plus-4x', 'shortcode_google_plus_4x');
	
	function shortcode_google_plus_5x( $atts, $content = null ) {
		return '<i class="fa fa-google-plus fa-5x"></i>' . $content . '';
	}
	add_shortcode('google-plus-5x', 'shortcode_google_plus_5x');
	

	// FontAwesome: HTML5
	
	function shortcode_html5( $atts, $content = null ) {
		return '<i class="fa fa-html5"></i>' . $content . '';
	}
	add_shortcode('html5', 'shortcode_html5');
	
	function shortcode_html5_large( $atts, $content = null ) {
		return '<i class="fa fa-html5 fa-lg"></i>' . $content . '';
	}
	add_shortcode('html5-lg', 'shortcode_html5_large');
	
	function shortcode_html5_2x( $atts, $content = null ) {
		return '<i class="fa fa-html5 fa-2x"></i>' . $content . '';
	}
	add_shortcode('html5-2x', 'shortcode_html5_2x');
	
	function shortcode_html5_3x( $atts, $content = null ) {
		return '<i class="fa fa-html5 fa-3x"></i>' . $content . '';
	}
	add_shortcode('html5-3x', 'shortcode_html5_3x');
	
	function shortcode_html5_4x( $atts, $content = null ) {
		return '<i class="fa fa-html5 fa-4x"></i>' . $content . '';
	}
	add_shortcode('html5-4x', 'shortcode_html5_4x');
	
	function shortcode_html5_5x( $atts, $content = null ) {
		return '<i class="fa fa-html5 fa-5x"></i>' . $content . '';
	}
	add_shortcode('html5-5x', 'shortcode_html5_5x');
	

	// FontAwesome: Instagram
	
	function shortcode_instagram( $atts, $content = null ) {
		return '<i class="fa fa-instagram"></i>' . $content . '';
	}
	add_shortcode('instagram', 'shortcode_instagram');
	
	function shortcode_instagram_large( $atts, $content = null ) {
		return '<i class="fa fa-instagram fa-lg"></i>' . $content . '';
	}
	add_shortcode('instagram-lg', 'shortcode_instagram_large');
	
	function shortcode_instagram_2x( $atts, $content = null ) {
		return '<i class="fa fa-instagram fa-2x"></i>' . $content . '';
	}
	add_shortcode('instagram-2x', 'shortcode_instagram_2x');
	
	function shortcode_instagram_3x( $atts, $content = null ) {
		return '<i class="fa fa-instagram fa-3x"></i>' . $content . '';
	}
	add_shortcode('instagram-3x', 'shortcode_instagram_3x');
	
	function shortcode_instagram_4x( $atts, $content = null ) {
		return '<i class="fa fa-instagram fa-4x"></i>' . $content . '';
	}
	add_shortcode('instagram-4x', 'shortcode_instagram_4x');
	
	function shortcode_instagram_5x( $atts, $content = null ) {
		return '<i class="fa fa-instagram fa-5x"></i>' . $content . '';
	}
	add_shortcode('instagram-5x', 'shortcode_instagram_5x');
	

	// FontAwesome: LinkedIn
	
	function shortcode_linkedin( $atts, $content = null ) {
		return '<i class="fa fa-linkedin"></i>' . $content . '';
	}
	add_shortcode('linkedin', 'shortcode_linkedin');
	
	function shortcode_linkedin_large( $atts, $content = null ) {
		return '<i class="fa fa-linkedin fa-lg"></i>' . $content . '';
	}
	add_shortcode('linkedin-lg', 'shortcode_linkedin_large');
	
	function shortcode_linkedin_2x( $atts, $content = null ) {
		return '<i class="fa fa-linkedin fa-2x"></i>' . $content . '';
	}
	add_shortcode('linkedin-2x', 'shortcode_linkedin_2x');
	
	function shortcode_linkedin_3x( $atts, $content = null ) {
		return '<i class="fa fa-linkedin fa-3x"></i>' . $content . '';
	}
	add_shortcode('linkedin-3x', 'shortcode_linkedin_3x');
	
	function shortcode_linkedin_4x( $atts, $content = null ) {
		return '<i class="fa fa-linkedin fa-4x"></i>' . $content . '';
	}
	add_shortcode('linkedin-4x', 'shortcode_linkedin_4x');
	
	function shortcode_linkedin_5x( $atts, $content = null ) {
		return '<i class="fa fa-linkedin fa-5x"></i>' . $content . '';
	}
	add_shortcode('linkedin-5x', 'shortcode_linkedin_5x');
	

	// FontAwesome: Linux
	
	function shortcode_linux( $atts, $content = null ) {
		return '<i class="fa fa-linux"></i>' . $content . '';
	}
	add_shortcode('linux', 'shortcode_linux');
	
	function shortcode_linux_large( $atts, $content = null ) {
		return '<i class="fa fa-linux fa-lg"></i>' . $content . '';
	}
	add_shortcode('linux-lg', 'shortcode_linux_large');
	
	function shortcode_linux_2x( $atts, $content = null ) {
		return '<i class="fa fa-linux fa-2x"></i>' . $content . '';
	}
	add_shortcode('linux-2x', 'shortcode_linux_2x');
	
	function shortcode_linux_3x( $atts, $content = null ) {
		return '<i class="fa fa-linux fa-3x"></i>' . $content . '';
	}
	add_shortcode('linux-3x', 'shortcode_linux_3x');
	
	function shortcode_linux_4x( $atts, $content = null ) {
		return '<i class="fa fa-linux fa-4x"></i>' . $content . '';
	}
	add_shortcode('linux-4x', 'shortcode_linux_4x');
	
	function shortcode_linux_5x( $atts, $content = null ) {
		return '<i class="fa fa-linux fa-5x"></i>' . $content . '';
	}
	add_shortcode('linux-5x', 'shortcode_linux_5x');
	

	// FontAwesome: MaxCDN
	
	function shortcode_maxcdn( $atts, $content = null ) {
		return '<i class="fa fa-maxcdn"></i>' . $content . '';
	}
	add_shortcode('maxcdn', 'shortcode_maxcdn');
	
	function shortcode_maxcdn_large( $atts, $content = null ) {
		return '<i class="fa fa-maxcdn fa-lg"></i>' . $content . '';
	}
	add_shortcode('maxcdn-lg', 'shortcode_maxcdn_large');
	
	function shortcode_maxcdn_2x( $atts, $content = null ) {
		return '<i class="fa fa-maxcdn fa-2x"></i>' . $content . '';
	}
	add_shortcode('maxcdn-2x', 'shortcode_maxcdn_2x');
	
	function shortcode_maxcdn_3x( $atts, $content = null ) {
		return '<i class="fa fa-maxcdn fa-3x"></i>' . $content . '';
	}
	add_shortcode('maxcdn-3x', 'shortcode_maxcdn_3x');
	
	function shortcode_maxcdn_4x( $atts, $content = null ) {
		return '<i class="fa fa-maxcdn fa-4x"></i>' . $content . '';
	}
	add_shortcode('maxcdn-4x', 'shortcode_maxcdn_4x');
	
	function shortcode_maxcdn_5x( $atts, $content = null ) {
		return '<i class="fa fa-maxcdn fa-5x"></i>' . $content . '';
	}
	add_shortcode('maxcdn-5x', 'shortcode_maxcdn_5x');
	

	// FontAwesome: Pinterest
	
	function shortcode_pinterest( $atts, $content = null ) {
		return '<i class="fa fa-pinterest"></i>' . $content . '';
	}
	add_shortcode('pinterest', 'shortcode_pinterest');
	
	function shortcode_pinterest_large( $atts, $content = null ) {
		return '<i class="fa fa-pinterest fa-lg"></i>' . $content . '';
	}
	add_shortcode('pinterest-lg', 'shortcode_pinterest_large');
	
	function shortcode_pinterest_2x( $atts, $content = null ) {
		return '<i class="fa fa-pinterest fa-2x"></i>' . $content . '';
	}
	add_shortcode('pinterest-2x', 'shortcode_pinterest_2x');
	
	function shortcode_pinterest_3x( $atts, $content = null ) {
		return '<i class="fa fa-pinterest fa-3x"></i>' . $content . '';
	}
	add_shortcode('pinterest-3x', 'shortcode_pinterest_3x');
	
	function shortcode_pinterest_4x( $atts, $content = null ) {
		return '<i class="fa fa-pinterest fa-4x"></i>' . $content . '';
	}
	add_shortcode('pinterest-4x', 'shortcode_pinterest_4x');
	
	function shortcode_pinterest_5x( $atts, $content = null ) {
		return '<i class="fa fa-pinterest fa-5x"></i>' . $content . '';
	}
	add_shortcode('pinterest-5x', 'shortcode_pinterest_5x');
	

	// FontAwesome: Skype
	
	function shortcode_skype( $atts, $content = null ) {
		return '<i class="fa fa-skype"></i>' . $content . '';
	}
	add_shortcode('skype', 'shortcode_skype');
	
	function shortcode_skype_large( $atts, $content = null ) {
		return '<i class="fa fa-skype fa-lg"></i>' . $content . '';
	}
	add_shortcode('skype-lg', 'shortcode_skype_large');
	
	function shortcode_skype_2x( $atts, $content = null ) {
		return '<i class="fa fa-skype fa-2x"></i>' . $content . '';
	}
	add_shortcode('skype-2x', 'shortcode_skype_2x');
	
	function shortcode_skype_3x( $atts, $content = null ) {
		return '<i class="fa fa-skype fa-3x"></i>' . $content . '';
	}
	add_shortcode('skype-3x', 'shortcode_skype_3x');
	
	function shortcode_skype_4x( $atts, $content = null ) {
		return '<i class="fa fa-skype fa-4x"></i>' . $content . '';
	}
	add_shortcode('skype-4x', 'shortcode_skype_4x');
	
	function shortcode_skype_5x( $atts, $content = null ) {
		return '<i class="fa fa-skype fa-5x"></i>' . $content . '';
	}
	add_shortcode('skype-5x', 'shortcode_skype_5x');
	

	// FontAwesome: Tumblr
	
	function shortcode_tumblr( $atts, $content = null ) {
		return '<i class="fa fa-tumblr"></i>' . $content . '';
	}
	add_shortcode('tumblr', 'shortcode_tumblr');
	
	function shortcode_tumblr_large( $atts, $content = null ) {
		return '<i class="fa fa-tumblr fa-lg"></i>' . $content . '';
	}
	add_shortcode('tumblr-lg', 'shortcode_tumblr_large');
	
	function shortcode_tumblr_2x( $atts, $content = null ) {
		return '<i class="fa fa-tumblr fa-2x"></i>' . $content . '';
	}
	add_shortcode('tumblr-2x', 'shortcode_tumblr_2x');
	
	function shortcode_tumblr_3x( $atts, $content = null ) {
		return '<i class="fa fa-tumblr fa-3x"></i>' . $content . '';
	}
	add_shortcode('tumblr-3x', 'shortcode_tumblr_3x');
	
	function shortcode_tumblr_4x( $atts, $content = null ) {
		return '<i class="fa fa-tumblr fa-4x"></i>' . $content . '';
	}
	add_shortcode('tumblr-4x', 'shortcode_tumblr_4x');
	
	function shortcode_tumblr_5x( $atts, $content = null ) {
		return '<i class="fa fa-tumblr fa-5x"></i>' . $content . '';
	}
	add_shortcode('tumblr-5x', 'shortcode_tumblr_5x');
	

	// FontAwesome: Twitter
	
	function shortcode_twitter( $atts, $content = null ) {
		return '<i class="fa fa-twitter"></i>' . $content . '';
	}
	add_shortcode('twitter', 'shortcode_twitter');
	
	function shortcode_twitter_large( $atts, $content = null ) {
		return '<i class="fa fa-twitter fa-lg"></i>' . $content . '';
	}
	add_shortcode('twitter-lg', 'shortcode_twitter_large');
	
	function shortcode_twitter_2x( $atts, $content = null ) {
		return '<i class="fa fa-twitter fa-2x"></i>' . $content . '';
	}
	add_shortcode('twitter-2x', 'shortcode_twitter_2x');
	
	function shortcode_twitter_3x( $atts, $content = null ) {
		return '<i class="fa fa-twitter fa-3x"></i>' . $content . '';
	}
	add_shortcode('twitter-3x', 'shortcode_twitter_3x');
	
	function shortcode_twitter_4x( $atts, $content = null ) {
		return '<i class="fa fa-twitter fa-4x"></i>' . $content . '';
	}
	add_shortcode('twitter-4x', 'shortcode_twitter_4x');
	
	function shortcode_twitter_5x( $atts, $content = null ) {
		return '<i class="fa fa-twitter fa-5x"></i>' . $content . '';
	}
	add_shortcode('twitter-5x', 'shortcode_twitter_5x');
	

	// FontAwesome: Windows
	
	function shortcode_windows( $atts, $content = null ) {
		return '<i class="fa fa-windows"></i>' . $content . '';
	}
	add_shortcode('windows', 'shortcode_windows');
	
	function shortcode_windows_large( $atts, $content = null ) {
		return '<i class="fa fa-windows fa-lg"></i>' . $content . '';
	}
	add_shortcode('windows-lg', 'shortcode_windows_large');
	
	function shortcode_windows_2x( $atts, $content = null ) {
		return '<i class="fa fa-windows fa-2x"></i>' . $content . '';
	}
	add_shortcode('windows-2x', 'shortcode_windows_2x');
	
	function shortcode_windows_3x( $atts, $content = null ) {
		return '<i class="fa fa-windows fa-3x"></i>' . $content . '';
	}
	add_shortcode('windows-3x', 'shortcode_windows_3x');
	
	function shortcode_windows_4x( $atts, $content = null ) {
		return '<i class="fa fa-windows fa-4x"></i>' . $content . '';
	}
	add_shortcode('windows-4x', 'shortcode_windows_4x');
	
	function shortcode_windows_5x( $atts, $content = null ) {
		return '<i class="fa fa-windows fa-5x"></i>' . $content . '';
	}
	add_shortcode('windows-5x', 'shortcode_windows_5x');
	

	// FontAwesome: YouTube
	
	function shortcode_youtube( $atts, $content = null ) {
		return '<i class="fa fa-youtube"></i>' . $content . '';
	}
	add_shortcode('youtube', 'shortcode_youtube');
	
	function shortcode_youtube_large( $atts, $content = null ) {
		return '<i class="fa fa-youtube fa-lg"></i>' . $content . '';
	}
	add_shortcode('youtube-lg', 'shortcode_youtube_large');
	
	function shortcode_youtube_2x( $atts, $content = null ) {
		return '<i class="fa fa-youtube fa-2x"></i>' . $content . '';
	}
	add_shortcode('youtube-2x', 'shortcode_youtube_2x');
	
	function shortcode_youtube_3x( $atts, $content = null ) {
		return '<i class="fa fa-youtube fa-3x"></i>' . $content . '';
	}
	add_shortcode('youtube-3x', 'shortcode_youtube_3x');
	
	function shortcode_youtube_4x( $atts, $content = null ) {
		return '<i class="fa fa-youtube fa-4x"></i>' . $content . '';
	}
	add_shortcode('youtube-4x', 'shortcode_youtube_4x');
	
	function shortcode_youtube_5x( $atts, $content = null ) {
		return '<i class="fa fa-youtube fa-5x"></i>' . $content . '';
	}
	add_shortcode('youtube-5x', 'shortcode_youtube_5x');
	

?>