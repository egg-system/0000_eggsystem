<?php 
 /**
  * @package TRIAD Inc.
  * @since 1.0
 */
 
 
 
	/**
	 * Display various social networking icons
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	function socialicons() { ?>
	
		<?php if ( mytheme_option( 'social_fb' ) && mytheme_option( 'social_fb' ) != '' ) { ?>
            <a href="<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['social_fb']; echo stripslashes($echo_options); ?>" target="_blank"><i class="fa fa-facebook gap_sides fa-2x"></i></a>
        <?php } else { ?>
        <?php } ?>        
        <?php if ( mytheme_option( 'social_tw' ) && mytheme_option( 'social_tw' ) != '' ) { ?>
            <a href="<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['social_tw']; echo stripslashes($echo_options); ?>" target="_blank">
                <i class="fa fa-twitter gap_sides fa-2x"></i>
            </a>
        <?php } else { ?>
        <?php } ?>        
        <?php if ( mytheme_option( 'social_yt' ) && mytheme_option( 'social_yt' ) != '' ) { ?>
            <a href="<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['social_yt']; echo stripslashes($echo_options); ?>" target="_blank">
                <i class="fa fa-youtube gap_sides fa-2x"></i>
            </a>
        <?php } else { ?>
        <?php } ?>
		<?php if ( mytheme_option( 'social_ig' ) && mytheme_option( 'social_ig' ) != '' ) { ?>
            <a href="<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['social_ig']; echo stripslashes($echo_options); ?>" target="_blank">
                <i class="fa fa-instagram gap_sides fa-2x"></i>
            </a>
        <?php } else { ?>
        <?php } ?>
        <?php if ( mytheme_option( 'social_dr' ) && mytheme_option( 'social_dr' ) != '' ) { ?>
            <a href="<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['social_dr']; echo stripslashes($echo_options); ?>" target="_blank">
                <i class="fa fa-dribbble gap_sides fa-2x"></i>
            </a>
        <?php } else { ?>
        <?php } ?>
        <?php if ( mytheme_option( 'social_pi' ) && mytheme_option( 'social_pi' ) != '' ) { ?>
            <a href="<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['social_pi']; echo stripslashes($echo_options); ?>" target="_blank">
                <i class="fa fa-pinterest gap_sides fa-2x"></i>
            </a>
        <?php } else { ?>
        <?php } ?>
	<?php }
	
	
	
	


	/**
	 * Facebook API Connection
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
		
	function getFacebookFans(){
	    $options = get_option( 'mytheme_options' ); 
	    $opt_fb_pageid = $options['api_fb_page_id'];
	    $opt_fb_accesstoken = $options['api_fb_access_token'];
//	    $urlForLikes = 'https://graph.facebook.com/'
//                        . $opt_fb_pageid  . '/insights/page_fans/lifetime?access_token='
//                        . $opt_fb_accesstoken . '&until=now';
	    
	    date_default_timezone_set('Asia/Tokyo');
	    $since = date('Y-m-d');
	    $until = date('Y-m-d', strtotime('+2 day'));
	    $urlForLikes = 'https://graph.facebook.com/v2.8/'
		. $opt_fb_pageid
		. '/insights?access_token='
		. $opt_fb_accesstoken
		. '&pretty=1'
		. '&until='.$until
		. '&metric=page_fans&period=lifetime'
		. '&since='.$since;
	    
	    
	    $resultsLikes = json_decode(file_get_contents($urlForLikes));
	    $arrlikes = $resultsLikes->data[0]->values;
	    $likes = 0;
	    if(count($arrlikes)>0) {
		$likes = $arrlikes[count($arrlikes)-1]->value;
	    }
	    return $likes;
	    
	    /* old */
//	    $options = get_option( 'mytheme_options' ); 
//	    $opt_fb_share_url = $options['api_fb_share_url'];
//	    $fb_share = get_transient( 'fb_share' );
//	    if ( empty( $fb_share ) ){
//		$file = file_get_contents('http://graph.facebook.com/?id=' . $opt_fb_share_url);
//		$jd = json_decode($file);
//		$fb_share = number_format($jd->{'shares'});
//		set_transient('fb_share', $fb_share, 1 * HOUR_IN_SECONDS );
//		return $fb_share;
//	    } else {
//		return $fb_share;
//	    }
	}
	
	
	
	
	
	/**
	 * Twitter API Connection
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
		
	function getTwitterFollowerss() {
		$options = get_option( 'mytheme_options' ); 
		$opt_tw_name = $options['api_tw_name'];
		$opt_tw_key = $options['api_tw_key'];
		$opt_tw_secret = $options['api_tw_secret'];
		$screenName = $opt_tw_name;
		$consumerKey = $opt_tw_key;
		$consumerSecret = $opt_tw_secret;
		$token = get_option('cfTwitterToken');
		$numberOfFollowerss = get_transient('cfTwitterFollowerss');
		if (false === $numberOfFollowerss) {
			if(!$token) {
				$credentials = $consumerKey . ':' . $consumerSecret;
				$toSend = base64_encode($credentials);
				$args = array(
					'method' => 'POST',
					'httpversion' => '1.1',
					'blocking' => true,
					'headers' => array(
						'Authorization' => 'Basic ' . $toSend,
						'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
					),
					'body' => array( 'grant_type' => 'client_credentials' )
				);
				add_filter('https_ssl_verify', '__return_false');
				$response = wp_remote_post('https://api.twitter.com/oauth2/token', $args);
				$keys = json_decode(wp_remote_retrieve_body($response));
				if($keys) {
					update_option('cfTwitterToken', $keys->access_token);
					$token = $keys->access_token;
				}
			}
			$args = array(
				'httpversion' => '1.1',
				'blocking' => true,
				'headers' => array(
					'Authorization' => "Bearer $token"
				)
			); 
			add_filter('https_ssl_verify', '__return_false');
			$api_url = "https://api.twitter.com/1.1/users/show.json?screen_name=$screenName";
			$response = wp_remote_get($api_url, $args);
			if (!is_wp_error($response)) {
				$followers = json_decode(wp_remote_retrieve_body($response));
				$numberOfFollowerss = $followers->followers_count;
			} else {
				$numberOfFollowerss = get_option('cfNumberOfFollowerss');
			}
			set_transient('cfTwitterFollowerss', $numberOfFollowerss, 60);
			update_option('cfNumberOfFollowerss', $numberOfFollowerss);
		}
		return $numberOfFollowerss;
	}
?>