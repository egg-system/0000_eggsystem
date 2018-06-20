<?php 
 /**
  * @package TRIAD Inc.
  * @since 1.0
 */




	/**
	 * Customise the tag cloud widget
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
		
	function custom_tag_cloud_widget($args) {
		$args['number'] = 15; 
		$args['largest'] = 1.25; 
		$args['smallest'] = 1.25; 
		$args['unit'] = 'em'; 
		return $args;
	}
	add_filter( 'widget_tag_cloud_args', 'custom_tag_cloud_widget' );




	/**
	 * Register all widgetised sidebars/areas
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

	
	$custom_before_widget = ('<section class="group %1$s"><div class="container-widget"><div class="content-widget"><div class="row col-3-3 centered wow animated fadeInDown" data-wow-offset="100">');

	
	if (function_exists('register_sidebar'))
	{
		register_sidebar(array(
			'description' => 'ホームページに配置するウィジェットをここにドラッグ＆ドロップで設置します。.',
			'before_widget' => $custom_before_widget,
			'after_widget' => '</div></div></div></section>',
			'before_title' => '<h1>',
			'after_title' => '</h1>',
			'id'            => 'sidebar-1',
			'name' => 'Home Widgets'
		));
	}
	if (function_exists('register_sidebar'))
	{
		register_sidebar(array(
			'description' => '各ページのフッター部に配置するウィジェットをここにドラッグ＆ドロップで設置します。',
			'before_widget' => $custom_before_widget,
			'after_widget' => '</div></div></div></section>',
			'before_title' => '<h1>',
			'after_title' => '</h1>',
			'id'            => 'sidebar-2',
			'name' => 'Global Widgets'
		));
	}





	/**
	 * Display all registered widgetised sidebars/areas
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

	function widget_home() { ?>
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Home Widgets') ) : else : ?>
		<?php endif; ?>
	<?php }
	function widget_global() { ?>
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Global Widgets') ) : else : ?>
		<?php endif; ?>
	<?php }






	/**
	 * Typing Widget
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

class wp_typing extends WP_Widget {
	function wp_typing() {
		$widget_ops = array(
			'classname' => 'widget_wp_typing',
			'description' => '任意のテキストをタイピング表示します。'
		);
		parent::__construct(
			'wp_typing',
			'[Grazioso] テキストタイパー',
			$widget_ops
		);
	}
	function widget($args, $instance) {
		global $post;
		$post_old = $post; 
		extract( $args );
	?>
	<section class="group <?php echo $widget_id; ?>"><!-- section -->
		<div class="container-typer"><!-- container -->
			<div class="content-typer"><!-- content -->
				<div class="row col-3-3 centered wow animated fadeInDown" data-wow-offset="100"><!-- col -->
					<h1><?php echo @$instance["pretxt"]; ?><span class="light colored" data-typer-targets="<?php echo @$instance["replacements"]; ?>"><?php echo @$instance["starter"]; ?></span> <?php echo @$instance["posttxt"]; ?></h1>
				</div><!-- /col -->
			</div><!-- /content -->
		</div><!-- /container -->
	</section><!-- /section -->
	<?php
		$post = $post_old; 
	}
	function update($new_instance, $old_instance) {
		return $new_instance;
	}
	function form($instance) {
	?>
<p>
	<label for="<?php echo $this->get_field_id("pretxt"); ?>">
		<?php _e( '冒頭に表示する固定文:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("pretxt"); ?>" name="<?php echo $this->get_field_name("pretxt"); ?>" type="text" value="<?php echo esc_attr(@$instance["pretxt"]); ?>" /></label>
</p>
<p><?php _e( '冒頭に表示する固定文を入力します。', 'lang'); ?></p>
<hr />
<p>
	<label for="<?php echo $this->get_field_id("starter"); ?>">
		<?php _e( '先頭のテキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("starter"); ?>" name="<?php echo $this->get_field_name("starter"); ?>" type="text" value="<?php echo esc_attr(@$instance["starter"]); ?>" /></label>
</p>
<p><?php _e( '先頭で表示するタイピング文字を入力します。', 'lang'); ?></p>
<hr />
<p>
	<label for="<?php echo $this->get_field_id("replacements"); ?>">
		<?php _e( '任意のテキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("replacements"); ?>" name="<?php echo $this->get_field_name("replacements"); ?>" type="text" value="<?php echo esc_attr(@$instance["replacements"]); ?>" /></label>
</p>
<p><?php _e( '先頭のテキストに続く任意のテキストを入力します。 (カンマで区切ることにより複数設定できます)', 'lang'); ?></p>
<hr />
<p>
	<label for="<?php echo $this->get_field_id("posttxt"); ?>">
		<?php _e( '末尾の固定文:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("posttxt"); ?>" name="<?php echo $this->get_field_name("posttxt"); ?>" type="text" value="<?php echo esc_attr(@$instance["posttxt"]); ?>" /></label>
</p>
<p><?php _e( 'タイピング文字の後に表示される固定文を入力します。', 'lang'); ?></p>
<hr />
	<?php
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("wp_typing");') );

	
	
	
	
	/**
	 * Announce Widget
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

class wp_announce extends WP_Widget {
	function wp_announce() {
		$widget_ops = array(
			'classname' => 'widget_wp_announce',
			'description' => 'テキスト &amp; 画像.'
		);
		parent::__construct(
			'wp_announce',
			'[Grazioso] インフォメーション',
			$widget_ops
		);
	}
	function widget($args, $instance) {
		global $post;
		$post_old = $post; 
		extract( $args );
	?>
	<section class="group <?php echo $widget_id; ?>"><!-- section -->
		<div class="container-announce"><!-- container -->
			<div class="content-announce"><!-- content -->
				<div class="row col-3-6 leftalign"><!-- col -->
					<h1 class="wow animated fadeInLeft" data-wow-offset="100">
						<?php echo @$instance["announcetitle"]; ?>
					</h1>
					<p>
						<span class="wow animated fadeInLeft" data-wow-offset="100">
							<?php echo @$instance["announcetxt"]; ?>
						</span>
					</p>
				</div><!-- /col -->
				<div class="row col-3-6 centered"><!-- col -->
					<img src="<?php echo @$instance["imageurl"]; ?>" alt="announceimg" class="img wow animated bounceInLeft" data-wow-offset="100" data-wow-delay=".5s" />
				</div><!-- /col -->
			</div><!-- /content -->
		</div><!-- /container -->
	</section><!-- /section -->
	<?php
		$post = $post_old; 
	}
	function update($new_instance, $old_instance) {
		return $new_instance;
	}
	function form($instance) {
	?>
<p>
	<label for="<?php echo $this->get_field_id("announcetitle"); ?>">
		<?php _e( 'タイトル:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("announcetitle"); ?>" name="<?php echo $this->get_field_name("announcetitle"); ?>" type="text" value="<?php echo esc_attr(@$instance["announcetitle"]); ?>" /></label>
</p>
<p><?php _e( 'タイトルを入力します', 'lang'); ?></p>
<hr />
<p>
	<label for="<?php echo $this->get_field_id("announcetxt"); ?>">
		<?php _e( 'テキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("announcetxt"); ?>" name="<?php echo $this->get_field_name("announcetxt"); ?>" type="text" value="<?php echo esc_attr(@$instance["announcetxt"]); ?>" /></label>
</p>
<p><?php _e( 'お知らせや紹介など任意のテキストを入力します。', 'lang'); ?></p>
<hr />
<p>
	<label for="<?php echo $this->get_field_id("imageurl"); ?>">
		<?php _e( 'Image URL:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("imageurl"); ?>" name="<?php echo $this->get_field_name("imageurl"); ?>" type="text" value="<?php echo esc_attr(@$instance["imageurl"]); ?>" /></label>
</p>
<p><?php _e( '表示させたい画像のURLを入力します。', 'lang'); ?></p>
<hr />
	<?php
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("wp_announce");') );
	
	
	
	
	/**
	 * Announce Widget 2
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

class wp_announce2 extends WP_Widget {
	function wp_announce2() {
		$widget_ops = array(
			'classname' => 'widget_wp_announce2',
			'description' => '画像 &amp; テキスト.'
		);
		parent::__construct(
			'wp_announce2',
			'[Grazioso] インフォメーション2',
			$widget_ops
		);
	}
	function widget($args, $instance) {
		global $post;
		$post_old = $post; 
		extract( $args );
	?>
	<section class="group <?php echo $widget_id; ?>"><!-- section -->
		<div class="container-announce2"><!-- container -->
			<div class="content-announce2"><!-- content -->
				<div class="row2 col-3-6 leftalign"><!-- col -->
					<h1 class="wow animated fadeInRight" data-wow-offset="100">
						<?php echo @$instance["announcetitle"]; ?>
					</h1>
					<p>
						<span class="wow animated fadeInRight" data-wow-offset="100">
							<?php echo @$instance["announcetxt"]; ?>
						</span>
					</p>
				</div><!-- /col -->
				<div class="row2 col-3-6 centered"><!-- col -->
					<img src="<?php echo @$instance["imageurl"]; ?>" alt="announceimg" class="img wow animated bounceInRight" data-wow-offset="100" data-wow-delay=".5s" />
				</div><!-- /col -->
			</div><!-- /content -->
		</div><!-- /container -->
	</section><!-- /section -->
	<?php
		$post = $post_old; 
	}
	function update($new_instance, $old_instance) {
		return $new_instance;
	}
	function form($instance) {
	?>
<p>
	<label for="<?php echo $this->get_field_id("announcetitle"); ?>">
		<?php _e( 'タイトル:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("announcetitle"); ?>" name="<?php echo $this->get_field_name("announcetitle"); ?>" type="text" value="<?php echo esc_attr(@$instance["announcetitle"]); ?>" /></label>
</p>
<p><?php _e( 'タイトルを入力します', 'lang'); ?></p>
<hr />
<p>
	<label for="<?php echo $this->get_field_id("announcetxt"); ?>">
		<?php _e( 'テキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("announcetxt"); ?>" name="<?php echo $this->get_field_name("announcetxt"); ?>" type="text" value="<?php echo esc_attr(@$instance["announcetxt"]); ?>" /></label>
</p>
<p><?php _e( 'お知らせや紹介など任意のテキストを入力します。', 'lang'); ?></p>
<hr />
<p>
	<label for="<?php echo $this->get_field_id("imageurl"); ?>">
		<?php _e( 'Image URL:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("imageurl"); ?>" name="<?php echo $this->get_field_name("imageurl"); ?>" type="text" value="<?php echo esc_attr(@$instance["imageurl"]); ?>" /></label>
</p>
<p><?php _e( '表示させたい画像のURLを入力します。', 'lang'); ?></p>
<hr />
	<?php
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("wp_announce2");') );
	
	
	
	
	
	
	/**
	 * Blog Widget
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

class wp_blog extends WP_Widget {
	function wp_blog() {
		$widget_ops = array(
			'classname' => 'widget_wp_blog',
			'description' => '最新のブログ記事を表示.'
		);
		parent::__construct(
			'wp_blog',
			'[Grazioso] ブログ記事',
			$widget_ops
		);
	}
	function widget($args, $instance) {
		global $post;
		$post_old = $post; 
		extract( $args );
	?>
	<section class="group <?php echo $widget_id; ?>"><!-- section -->
		<?php if (have_posts()) : ?>
			<?php $count = 0; ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php $count++; ?>
				<?php if (($count > 0) && ($count <= 10)) : ?>
					<div class="container-blog"><!-- container -->
						<div class="content-blog"><!-- content -->
							<div class="row col-3-6 leftalign wow animated fadeInLeft" data-wow-offset="100"><!-- col -->
								<h2>
									<a href="<?php the_permalink() ?>">
										<span class="light colored">
											<?php the_title(); // POST TITLE ?>
										</span>
									</a>
								</h2>
								<p>
									<span>
										<?php wpe_excerpt('wpe_excerptlength_longer', 'wpe_excerptmore'); // POST EXCERPT ?>
									</span>
								</p>
							</div><!-- /col -->
							<div class="row col-3-6 centered wow animated fadeInRight" data-wow-offset="100" data-wow-delay=".5s"><!-- col -->
								<?php if ( has_post_thumbnail() ) { ?>
									<div class="overlay-wrapper">
										<div class="overlay-image">
											<div class="overlay">
												<span class="wow animated flipInX" data-wow-offset="100" data-wow-delay="1s">
													<?php dateformat(); // POST DATE ?>
												</span>
												<div class="circular">
													<a href="<?php the_permalink() ?>" rel="bookmark">
														<?php the_post_thumbnail( 'img_standard', array( 'class' => 'img img_circle', 'title' => '' ) ); // POST IMAGE ?>
													</a>
												</div>
											</div>
										</div>
									</div>
								<?php } else { ?>
								<?php } ?>
							</div><!-- /col -->
						</div><!-- /content -->
					</div><!-- /container -->
				<?php else : ?>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php else : ?>
		<?php endif; ?>
	</section><!-- /section -->
	<?php
		$post = $post_old; 
	}
	function update($new_instance, $old_instance) {
		return $new_instance;
	}
	function form($instance) {
	?>
	<p><?php _e( 'このウィジェットにはオプションはありません.', 'lang'); ?></p>
	<hr />
	<?php
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("wp_blog");') );
	
	

	

	/**
	 * Social Counters Widget
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

class wp_social extends WP_Widget {
	function wp_social() {
		$widget_ops = array(
			'classname' => 'widget_wp_social',
			'description' => 'Facebook &amp; Twitterのカウントを表示.'
		);
		parent::__construct(
			'wp_social',
			'[Grazioso] ソーシャルメディア',
			$widget_ops
		);
	}
	function widget($args, $instance) {
		global $post;
		$post_old = $post; 
		extract( $args );
	?>
	<section class="group <?php echo $widget_id; ?>"><!-- section -->
		<div class="container-social"><!-- container -->
		
		
		
			
			<?php if ( mytheme_option( 'api_select' ) && mytheme_option( 'api_select' ) == 'choice2' ) { ?>
			
			<div class="row_alt col-3-3"><!-- col -->
				<div class="socialmedia fb centered wow animated fadeInDown" data-wow-offset="100">
					<a href="<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['social_fb']; echo stripslashes($echo_options); ?>" target="_blank">
						<i class="fa fa-facebook-square"></i> <?php echo getFacebookFans(); ?>
					</a>
				</div>
			</div><!-- /col -->
			
			<?php } elseif ( mytheme_option( 'api_select' ) && mytheme_option( 'api_select' ) == 'choice3' ) { ?>
			
			<div class="row_alt col-3-3"><!-- col -->
				<div class="socialmedia tw centered wow animated fadeInDown" data-wow-offset="100">
					<a href="<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['social_tw']; echo stripslashes($echo_options); ?>" target="_blank">
						<i class="fa fa-twitter-square"></i> <?php $twitter_format = getTwitterFollowerss(); echo number_format(empty($twitter_format) ? '0' : $twitter_format); ?>
					</a>
				</div>
			</div><!-- /col -->
			
			
			<?php } else { ?>
			
			<div class="row_alt col-half"><!-- col -->
				<div class="socialmedia fb centered wow animated fadeInLeft" data-wow-offset="100">
					<a href="<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['social_fb']; echo stripslashes($echo_options); ?>" target="_blank">
						<i class="fa fa-facebook-square"></i> <?php echo getFacebookFans(); ?>
					</a>
				</div>
			</div><!-- /col -->
			<div class="row_alt col-half"><!-- col -->
				<div class="socialmedia tw centered wow animated fadeInRight" data-wow-offset="100">
					<a href="<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['social_tw']; echo stripslashes($echo_options); ?>" target="_blank">
						<i class="fa fa-twitter-square"></i> <?php $twitter_format = getTwitterFollowerss(); echo number_format(empty($twitter_format) ? '0' : $twitter_format); ?>
					</a>
				</div>
			</div><!-- /col -->
			
			
			<?php } ?>
			

		</div><!-- /container -->
	</section><!-- /section -->
	<?php
		$post = $post_old; 
	}
	function update($new_instance, $old_instance) {
		return $new_instance;
	}
	function form($instance) {
	?>
	<p><?php _e( 'このウィジェットは', 'lang'); ?> <a href="<?php echo home_url(); ?>/wp-admin/themes.php?page=mytheme-options#api"><?php _e( 'テーマオプションのAPI設定', 'lang'); ?></a> <?php _e( 'パネルから管理できます。', 'lang'); ?></p>
	<hr />
	<?php
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("wp_social");') );
	
	
	
	
	/**
	 * Gallery Popup Widget
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

class wp_gallery extends WP_Widget {
	function wp_gallery() {
		$widget_ops = array(
			'classname' => 'widget_wp_gallery',
			'description' => 'ギャラリー風に画像を展示しポップアップ表示も可能.'
		);
		parent::__construct(
			'wp_gallery',
			'[Grazioso] ギャラリーポップアップ',
			$widget_ops
		);
	}
	function widget($args, $instance) {
		global $post;
		$post_old = $post; 
		extract( $args );
	?>
	<section class="group <?php echo $widget_id; ?>"><!-- section -->
		<div class="container-gallery"><!-- container -->
		
		<?php if (isset( $instance["gallerytitle"] )) { ?>
			<div class="content-gallery-title"><!-- content -->
				<div class="row col-3-3 centered wow animated fadeInDown" data-wow-offset="100"><!-- col -->
					<h1><?php echo @$instance["gallerytitle"]; ?></h1>
				</div><!-- /col -->
			</div><!-- /content -->
			<?php } else { ?>
			<?php } ?>
			<div class="content-gallery"><!-- content -->
				<div class="row col-3-12 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".25s"><!-- col -->
					<div class="overlay-wrapper">
						<div class="overlay-image">
							<div class="overlay">
								<a href="<?php echo @$instance["img1url"]; ?>" data-lightbox="gallery-set" data-title="<?php echo @$instance["img1cap"]; ?>">
									<img src="<?php echo @$instance["img1url"]; ?>" alt="" class="img img_gallery" />
									<span><i class="fa fa-plus-circle fa-5x"></i></span>
								</a>
							</div>
						</div>
					</div>
				</div><!-- /col -->
				<div class="row col-3-12 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".5s"><!-- col -->
					<div class="overlay-wrapper">
						<div class="overlay-image">
							<div class="overlay">
								<a href="<?php echo @$instance["img2url"]; ?>" data-lightbox="gallery-set" data-title="<?php echo @$instance["img2cap"]; ?>">
									<img src="<?php echo @$instance["img2url"]; ?>" alt="" class="img img_gallery" />
									<span><i class="fa fa-plus-circle fa-5x"></i></span>
								</a>
							</div>
						</div>
					</div>
				</div><!-- /col -->
				<div class="row col-3-12 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".75s"><!-- col -->
					<div class="overlay-wrapper">
						<div class="overlay-image">
							<div class="overlay">
								<a href="<?php echo @$instance["img3url"]; ?>" data-lightbox="gallery-set" data-title="<?php echo @$instance["img3cap"]; ?>">
									<img src="<?php echo @$instance["img3url"]; ?>" alt="" class="img img_gallery" />
									<span><i class="fa fa-plus-circle fa-5x"></i></span>
								</a>
							</div>
						</div>
					</div>
				</div><!-- /col -->
				<div class="row col-3-12 wow animated fadeInDown" data-wow-offset="100" data-wow-delay="1s"><!-- col -->
					<div class="overlay-wrapper">
						<div class="overlay-image">
							<div class="overlay">
								<a href="<?php echo @$instance["img4url"]; ?>" data-lightbox="gallery-set" data-title="<?php echo @$instance["img4cap"]; ?>">
									<img src="<?php echo @$instance["img4url"]; ?>" alt="" class="img img_gallery" />
									<span><i class="fa fa-plus-circle fa-5x"></i></span>
								</a>
							</div>
						</div>
					</div>
				</div><!-- /col -->
			</div><!-- /content -->
			<?php if ( mytheme_option( 'widget_gallery_select' ) && mytheme_option( 'widget_gallery_select' ) != 'choice2' ) { ?>
			<?php } else { ?>
				<div class="content-gallery"><!-- content -->
					<div class="row col-3-12 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".25s"><!-- col -->
						<div class="overlay-wrapper">
							<div class="overlay-image">
								<div class="overlay">
									<a href="<?php echo @$instance["img5url"]; ?>" data-lightbox="gallery-set" data-title="<?php echo @$instance["img5cap"]; ?>">
										<img src="<?php echo @$instance["img5url"]; ?>" alt="" class="img img_gallery" />
										<span><i class="fa fa-plus-circle fa-5x"></i></span>
									</a>
								</div>
							</div>
						</div>
					</div><!-- /col -->
					<div class="row col-3-12 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".5s"><!-- col -->
						<div class="overlay-wrapper">
							<div class="overlay-image">
								<div class="overlay">
									<a href="<?php echo @$instance["img6url"]; ?>" data-lightbox="gallery-set" data-title="<?php echo @$instance["img6cap"]; ?>">
										<img src="<?php echo @$instance["img6url"]; ?>" alt="" class="img img_gallery" />
										<span><i class="fa fa-plus-circle fa-5x"></i></span>
									</a>
								</div>
							</div>
						</div>
					</div><!-- /col -->
					<div class="row col-3-12 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".75s"><!-- col -->
						<div class="overlay-wrapper">
							<div class="overlay-image">
								<div class="overlay">
									<a href="<?php echo @$instance["img7url"]; ?>" data-lightbox="gallery-set" data-title="<?php echo @$instance["img7cap"]; ?>">
										<img src="<?php echo @$instance["img7url"]; ?>" alt="" class="img img_gallery" />
										<span><i class="fa fa-plus-circle fa-5x"></i></span>
									</a>
								</div>
							</div>
						</div>
					</div><!-- /col -->
					<div class="row col-3-12 wow animated fadeInDown" data-wow-offset="100" data-wow-delay="1s"><!-- col -->
						<div class="overlay-wrapper">
							<div class="overlay-image">
								<div class="overlay">
									<a href="<?php echo @$instance["img8url"]; ?>" data-lightbox="gallery-set" data-title="<?php echo @$instance["img8cap"]; ?>">
										<img src="<?php echo @$instance["img8url"]; ?>" alt="" class="img img_gallery" />
										<span><i class="fa fa-plus-circle fa-5x"></i></span>
									</a>
								</div>
							</div>
						</div>
					</div><!-- /col -->
				</div><!-- /content -->
			<?php } ?>
			<?php if (isset( $instance["gallerytitle"] )) { ?>
				<div class="galleryfix"></div>
			<?php } else { ?>
			<?php } ?>
		</div><!-- /container -->
	</section><!-- /section -->
	<?php
		$post = $post_old; 
	}
	function update($new_instance, $old_instance) {
		return $new_instance;
	}
	function form($instance) {
	?>
<p>
	<label for="<?php echo $this->get_field_id("gallerytitle"); ?>">
		<?php _e( 'タイトル:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("gallerytitle"); ?>" name="<?php echo $this->get_field_name("gallerytitle"); ?>" type="text" value="<?php echo esc_attr(@$instance["gallerytitle"]); ?>" /></label>
</p>
<p><?php _e( 'このウィジェットのタイトルを入力します。', 'lang'); ?></p>
<hr />
<p>
	<label for="<?php echo $this->get_field_id("img1url"); ?>">
		<?php _e( '画像 #1 URL:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("img1url"); ?>" name="<?php echo $this->get_field_name("img1url"); ?>" type="text" value="<?php echo esc_attr(@$instance["img1url"]); ?>" /></label>
</p>
<p><?php _e( '表示させたい画像のURLを入力してください。', 'lang'); ?></p>
<hr />

<p>
	<label for="<?php echo $this->get_field_id("img1cap"); ?>">
		<?php _e( '画像 #1 キャプション:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("img1cap"); ?>" name="<?php echo $this->get_field_name("img1cap"); ?>" type="text" value="<?php echo esc_attr(@$instance["img1cap"]); ?>" /></label>
</p>
<p><?php _e( '画像の説明文などを入力してください。', 'lang'); ?></p>
<hr />


<p>
	<label for="<?php echo $this->get_field_id("img2url"); ?>">
		<?php _e( '画像 #2 URL:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("img2url"); ?>" name="<?php echo $this->get_field_name("img2url"); ?>" type="text" value="<?php echo esc_attr(@$instance["img2url"]); ?>" /></label>
</p>
<p><?php _e( '表示させたい画像のURLを入力してください。', 'lang'); ?></p>
<hr />

<p>
	<label for="<?php echo $this->get_field_id("img2cap"); ?>">
		<?php _e( '画像 #2 キャプション:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("img2cap"); ?>" name="<?php echo $this->get_field_name("img2cap"); ?>" type="text" value="<?php echo esc_attr(@$instance["img2cap"]); ?>" /></label>
</p>
<p><?php _e( '画像の説明文などを入力してください。', 'lang'); ?></p>
<hr />


<p>
	<label for="<?php echo $this->get_field_id("img3url"); ?>">
		<?php _e( '画像 #3 URL:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("img3url"); ?>" name="<?php echo $this->get_field_name("img3url"); ?>" type="text" value="<?php echo esc_attr(@$instance["img3url"]); ?>" /></label>
</p>
<p><?php _e( '表示させたい画像のURLを入力してください。', 'lang'); ?></p>
<hr />

<p>
	<label for="<?php echo $this->get_field_id("img3cap"); ?>">
		<?php _e( 'Image #3 キャプション:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("img3cap"); ?>" name="<?php echo $this->get_field_name("img3cap"); ?>" type="text" value="<?php echo esc_attr(@$instance["img3cap"]); ?>" /></label>
</p>
<p><?php _e( '画像の説明文などを入力してください。', 'lang'); ?></p>
<hr />



<p>
	<label for="<?php echo $this->get_field_id("img4url"); ?>">
		<?php _e( '画像 #4 URL:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("img4url"); ?>" name="<?php echo $this->get_field_name("img4url"); ?>" type="text" value="<?php echo esc_attr(@$instance["img4url"]); ?>" /></label>
</p>
<p><?php _e( '表示させたい画像のURLを入力してください。', 'lang'); ?></p>
<hr />

<p>
	<label for="<?php echo $this->get_field_id("img4cap"); ?>">
		<?php _e( '画像 #4 キャプション:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("img4cap"); ?>" name="<?php echo $this->get_field_name("img4cap"); ?>" type="text" value="<?php echo esc_attr(@$instance["img4cap"]); ?>" /></label>
</p>
<p><?php _e( '画像の説明文などを入力してください。', 'lang'); ?></p>
<hr />

<?php if ( mytheme_option( 'widget_gallery_select' ) && mytheme_option( 'widget_gallery_select' ) != 'choice2' ) { ?>
			<?php } else { ?>

<p>
	<label for="<?php echo $this->get_field_id("img5url"); ?>">
		<?php _e( '画像 #5 URL:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("img5url"); ?>" name="<?php echo $this->get_field_name("img5url"); ?>" type="text" value="<?php echo esc_attr(@$instance["img5url"]); ?>" /></label>
</p>
<p><?php _e( '表示させたい画像のURLを入力してください。', 'lang'); ?></p>
<hr />

<p>
	<label for="<?php echo $this->get_field_id("img5cap"); ?>">
		<?php _e( '画像 #5 キャプション:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("img5cap"); ?>" name="<?php echo $this->get_field_name("img5cap"); ?>" type="text" value="<?php echo esc_attr(@$instance["img5cap"]); ?>" /></label>
</p>
<p><?php _e( '画像の説明文などを入力してください。', 'lang'); ?></p>
<hr />


<p>
	<label for="<?php echo $this->get_field_id("img6url"); ?>">
		<?php _e( '画像 #6 URL:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("img6url"); ?>" name="<?php echo $this->get_field_name("img6url"); ?>" type="text" value="<?php echo esc_attr(@$instance["img6url"]); ?>" /></label>
</p>
<p><?php _e( '表示させたい画像のURLを入力してください。', 'lang'); ?></p>
<hr />

<p>
	<label for="<?php echo $this->get_field_id("img6cap"); ?>">
		<?php _e( '画像 #6 キャプション:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("img6cap"); ?>" name="<?php echo $this->get_field_name("img6cap"); ?>" type="text" value="<?php echo esc_attr(@$instance["img6cap"]); ?>" /></label>
</p>
<p><?php _e( '画像の説明文などを入力してください。', 'lang'); ?></p>
<hr />


<p>
	<label for="<?php echo $this->get_field_id("img7url"); ?>">
		<?php _e( '画像 #7 URL:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("img7url"); ?>" name="<?php echo $this->get_field_name("img7url"); ?>" type="text" value="<?php echo esc_attr(@$instance["img7url"]); ?>" /></label>
</p>
<p><?php _e( '表示させたい画像のURLを入力してください。', 'lang'); ?></p>
<hr />

<p>
	<label for="<?php echo $this->get_field_id("img7cap"); ?>">
		<?php _e( '画像 #7 キャプション:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("img7cap"); ?>" name="<?php echo $this->get_field_name("img7cap"); ?>" type="text" value="<?php echo esc_attr(@$instance["img7cap"]); ?>" /></label>
</p>
<p><?php _e( '画像の説明文などを入力してください。', 'lang'); ?></p>
<hr />



<p>
	<label for="<?php echo $this->get_field_id("img8url"); ?>">
		<?php _e( '画像 #8 URL:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("img8url"); ?>" name="<?php echo $this->get_field_name("img8url"); ?>" type="text" value="<?php echo esc_attr(@$instance["img8url"]); ?>" /></label>
</p>
<p><?php _e( '表示させたい画像のURLを入力してください。', 'lang'); ?></p>
<hr />

<p>
	<label for="<?php echo $this->get_field_id("img8cap"); ?>">
		<?php _e( '画像 #8 キャプション:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("img8cap"); ?>" name="<?php echo $this->get_field_name("img8cap"); ?>" type="text" value="<?php echo esc_attr(@$instance["img8cap"]); ?>" /></label>
</p>
<p><?php _e( '画像の説明文などを入力してください。', 'lang'); ?></p>
<hr />		
			<?php } ?>


	<?php
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("wp_gallery");') );
	
	
	
	
	
	
	/**
	 * Team メンバーs Widget
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

class wp_team extends WP_Widget {
	function wp_team() {
		$widget_ops = array(
			'classname' => 'widget_wp_team',
			'description' => 'チームメンバーを画像つきで紹介できます。'
		);
		parent::__construct(
			'wp_team',
			'[Grazioso] チームメンバーズ',
			$widget_ops
		);
	}
	function widget($args, $instance) {
		global $post;
		$post_old = $post; 
		extract( $args );
	?>
	<section class="group <?php echo $widget_id; ?>"><!-- section -->
		<div class="container-team"><!-- container -->
			<?php if (isset( $instance["teamtitle"] )) { ?>
				<div class="content-team-title"><!-- content -->
					<div class="row col-3-3 centered wow animated fadeInDown" data-wow-offset="100"><!-- col -->
						<h1><?php echo @$instance["teamtitle"]; ?></h1>
					</div><!-- /col -->
				</div><!-- /content -->
			<?php } else { ?>
			<?php } ?>
			<div class="content-team"><!-- content -->
				<div class="row col-3-12 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".25s"><!-- col -->
					<div class="overlay-wrapper">
						<div class="overlay-image">
							<div class="overlay">
								<img src="<?php echo @$instance["team1img"]; ?>" alt="" class="img img_team" />
								<span>
									<?php if ( @$instance["team1name"] ) { ?>
										<h4><?php echo @$instance["team1name"]; ?></h4>
									<?php } ?>
									<?php if ( @$instance["team1pos"] ) { ?>
										<p>(<?php echo @$instance["team1pos"]; ?>)</p>
									<?php } ?>
									<?php if ( @$instance["team1fb"] ) { ?>
										<a href="<?php echo @$instance["team1fb"]; ?>" target="_blank">
											<i class="fa fa-facebook fa-3x"></i>
										</a>
									<?php } ?>
									<?php if ( @$instance["team1tw"] ) { ?>
										<a href="<?php echo @$instance["team1tw"]; ?>" target="_blank">
											<i class="fa fa-twitter fa-3x"></i>
										</a>
									<?php } ?>
									<?php if ( @$instance["team1dr"] ) { ?>
										<a href="<?php echo @$instance["team1dr"]; ?>" target="_blank">
											<i class="fa fa-dribbble fa-3x"></i>
										</a>
									<?php } ?>
									<?php if ( @$instance["team1ws"] ) { ?>
										<a href="<?php echo @$instance["team1ws"]; ?>" target="_blank">
											<i class="fa fa-link fa-3x"></i>
										</a>
									<?php } ?>
								</span>
								</span>
							</div>
						</div>
					</div>
				</div><!-- /col -->
				<div class="row col-3-12 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".5s"><!-- col -->
					<div class="overlay-wrapper">
						<div class="overlay-image">
							<div class="overlay">
								<img src="<?php echo @$instance["team2img"]; ?>" alt="" class="img img_team" />
								<span>
									<?php if ( @$instance["team2name"] ) { ?>
										<h4><?php echo @$instance["team2name"]; ?></h4>
									<?php } ?>
									<?php if ( @$instance["team2pos"] ) { ?>
										<p>(<?php echo @$instance["team2pos"]; ?>)</p>
									<?php } ?>
									<?php if ( @$instance["team2fb"] ) { ?>
										<a href="<?php echo @$instance["team2fb"]; ?>" target="_blank">
											<i class="fa fa-facebook fa-3x"></i>
										</a>
									<?php } ?>
									<?php if ( @$instance["team2tw"] ) { ?>
										<a href="<?php echo @$instance["team2tw"]; ?>" target="_blank">
											<i class="fa fa-twitter fa-3x"></i>
										</a>
									<?php } ?>
									<?php if ( @$instance["team2dr"] ) { ?>
										<a href="<?php echo @$instance["team2dr"]; ?>" target="_blank">
											<i class="fa fa-dribbble fa-3x"></i>
										</a>
									<?php } ?>
									<?php if ( @$instance["team2ws"] ) { ?>
										<a href="<?php echo @$instance["team2ws"]; ?>" target="_blank">
											<i class="fa fa-link fa-3x"></i>
										</a>
									<?php } ?>
								</span>
							</div>
						</div>
					</div>
				</div><!-- /col -->
				<div class="row col-3-12 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".75s"><!-- col -->
					<div class="overlay-wrapper">
						<div class="overlay-image">
							<div class="overlay">
								<img src="<?php echo @$instance["team3img"]; ?>" alt="" class="img img_team" />
								<span>
									<?php if ( @$instance["team3name"] ) { ?>
										<h4><?php echo @$instance["team3name"]; ?></h4>
									<?php } ?>
									<?php if ( @$instance["team3pos"] ) { ?>
										<p>(<?php echo @$instance["team3pos"]; ?>)</p>
									<?php } ?>
									<?php if ( @$instance["team3fb"] ) { ?>
										<a href="<?php echo @$instance["team3fb"]; ?>" target="_blank">
											<i class="fa fa-facebook fa-3x"></i>
										</a>
									<?php } ?>
									<?php if ( @$instance["team3tw"] ) { ?>
										<a href="<?php echo @$instance["team3tw"]; ?>" target="_blank">
											<i class="fa fa-twitter fa-3x"></i>
										</a>
									<?php } ?>
									<?php if ( @$instance["team3dr"] ) { ?>
										<a href="<?php echo @$instance["team3dr"]; ?>" target="_blank">
											<i class="fa fa-dribbble fa-3x"></i>
										</a>
									<?php } ?>
									<?php if ( @$instance["team3ws"] ) { ?>
										<a href="<?php echo @$instance["team3ws"]; ?>" target="_blank">
											<i class="fa fa-link fa-3x"></i>
										</a>
									<?php } ?>
								</span>
							</div>
						</div>
					</div>
				</div><!-- /col -->
				<div class="row col-3-12 wow animated fadeInDown" data-wow-offset="100" data-wow-delay="1s"><!-- col -->
					<div class="overlay-wrapper">
						<div class="overlay-image">
							<div class="overlay">
								<img src="<?php echo @$instance["team4img"]; ?>" alt="" class="img img_team" />
								<span>
									<?php if ( @$instance["team4name"] ) { ?>
										<h4><?php echo @$instance["team4name"]; ?></h4>
									<?php } ?>
									<?php if ( @$instance["team4pos"] ) { ?>
										<p>(<?php echo @$instance["team4pos"]; ?>)</p>
									<?php } ?>
									<?php if ( @$instance["team4fb"] ) { ?>
										<a href="<?php echo @$instance["team4fb"]; ?>" target="_blank">
											<i class="fa fa-facebook fa-3x"></i>
										</a>
									<?php } ?>
									<?php if ( @$instance["team4tw"] ) { ?>
										<a href="<?php echo @$instance["team4tw"]; ?>" target="_blank">
											<i class="fa fa-twitter fa-3x"></i>
										</a>
									<?php } ?>
									<?php if ( @$instance["team4dr"] ) { ?>
										<a href="<?php echo @$instance["team4dr"]; ?>" target="_blank">
											<i class="fa fa-dribbble fa-3x"></i>
										</a>
									<?php } ?>
									<?php if ( @$instance["team4ws"] ) { ?>
										<a href="<?php echo @$instance["team4ws"]; ?>" target="_blank">
											<i class="fa fa-link fa-3x"></i>
										</a>
									<?php } ?>
								</span>
							</div>
						</div>
					</div>
				</div><!-- /col -->
			</div><!-- /content -->
			<?php if ( mytheme_option( 'widget_team_select' ) && mytheme_option( 'widget_team_select' ) != 'choice2' ) { ?>
			<?php } else { ?>
				<div class="break"></div>
				<div class="content-team"><!-- content -->
					<div class="row col-3-12 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".25s"><!-- col -->
						<div class="overlay-wrapper">
							<div class="overlay-image">
								<div class="overlay">
									<img src="<?php echo @$instance["team5img"]; ?>" alt="" class="img img_team" />
									<span>
										<?php if ( @$instance["team5name"] ) { ?>
											<h4><?php echo @$instance["team5name"]; ?></h4>
										<?php } ?>
										<?php if ( @$instance["team5pos"] ) { ?>
											<p>(<?php echo @$instance["team5pos"]; ?>)</p>
										<?php } ?>
										<?php if ( @$instance["team5fb"] ) { ?>
											<a href="<?php echo @$instance["team5fb"]; ?>" target="_blank">
												<i class="fa fa-facebook fa-3x"></i>
											</a>
										<?php } ?>
										<?php if ( @$instance["team5tw"] ) { ?>
											<a href="<?php echo @$instance["team5tw"]; ?>" target="_blank">
												<i class="fa fa-twitter fa-3x"></i>
											</a>
										<?php } ?>
										<?php if ( @$instance["team5dr"] ) { ?>
											<a href="<?php echo @$instance["team5dr"]; ?>" target="_blank">
												<i class="fa fa-dribbble fa-3x"></i>
											</a>
										<?php } ?>
										<?php if ( @$instance["team5ws"] ) { ?>
											<a href="<?php echo @$instance["team5ws"]; ?>" target="_blank">
												<i class="fa fa-link fa-3x"></i>
											</a>
										<?php } ?>
									</span>
								</div>
							</div>
						</div>
					</div><!-- /col -->
					<div class="row col-3-12 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".5s"><!-- col -->
						<div class="overlay-wrapper">
							<div class="overlay-image">
								<div class="overlay">
									<img src="<?php echo @$instance["team6img"]; ?>" alt="" class="img img_team" />
									<span>
										<?php if ( @$instance["team6name"] ) { ?>
											<h4><?php echo @$instance["team6name"]; ?></h4>
										<?php } ?>
										<?php if ( @$instance["team6pos"] ) { ?>
											<p>(<?php echo @$instance["team6pos"]; ?>)</p>
										<?php } ?>
										<?php if ( @$instance["team6fb"] ) { ?>
											<a href="<?php echo @$instance["team6fb"]; ?>" target="_blank">
												<i class="fa fa-facebook fa-3x"></i>
											</a>
										<?php } ?>
										<?php if ( @$instance["team6tw"] ) { ?>
											<a href="<?php echo @$instance["team6tw"]; ?>" target="_blank">
												<i class="fa fa-twitter fa-3x"></i>
											</a>
										<?php } ?>
										<?php if ( @$instance["team6dr"] ) { ?>
											<a href="<?php echo @$instance["team6dr"]; ?>" target="_blank">
												<i class="fa fa-dribbble fa-3x"></i>
											</a>
										<?php } ?>
										<?php if ( @$instance["team6ws"] ) { ?>
											<a href="<?php echo @$instance["team6ws"]; ?>" target="_blank">
												<i class="fa fa-link fa-3x"></i>
											</a>
										<?php } ?>
									</span>
								</div>
							</div>
						</div>
					</div><!-- /col -->
					<div class="row col-3-12 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".75s"><!-- col -->
						<div class="overlay-wrapper">
							<div class="overlay-image">
								<div class="overlay">
									<img src="<?php echo @$instance["team7img"]; ?>" alt="" class="img img_team" />
									<span>
										<?php if ( @$instance["team7name"] ) { ?>
											<h4><?php echo @$instance["team7name"]; ?></h4>
										<?php } ?>
										<?php if ( @$instance["team7pos"] ) { ?>
											<p>(<?php echo @$instance["team7pos"]; ?>)</p>
										<?php } ?>
										<?php if ( @$instance["team7fb"] ) { ?>
											<a href="<?php echo @$instance["team7fb"]; ?>" target="_blank">
												<i class="fa fa-facebook fa-3x"></i>
											</a>
										<?php } ?>
										<?php if ( @$instance["team7tw"] ) { ?>
											<a href="<?php echo @$instance["team7tw"]; ?>" target="_blank">
												<i class="fa fa-twitter fa-3x"></i>
											</a>
										<?php } ?>
										<?php if ( @$instance["team7dr"] ) { ?>
											<a href="<?php echo @$instance["team7dr"]; ?>" target="_blank">
												<i class="fa fa-dribbble fa-3x"></i>
											</a>
										<?php } ?>
										<?php if ( @$instance["team7ws"] ) { ?>
											<a href="<?php echo @$instance["team7ws"]; ?>" target="_blank">
												<i class="fa fa-link fa-3x"></i>
											</a>
										<?php } ?>
									</span>
								</div>
							</div>
						</div>
					</div><!-- /col -->
					<div class="row col-3-12 wow animated fadeInDown" data-wow-offset="100" data-wow-delay="1s"><!-- col -->
						<div class="overlay-wrapper">
							<div class="overlay-image">
								<div class="overlay">
									<img src="<?php echo @$instance["team8img"]; ?>" alt="" class="img img_team" />
									<span>
										<?php if ( @$instance["team8name"] ) { ?>
											<h4><?php echo @$instance["team8name"]; ?></h4>
										<?php } ?>
										<?php if ( @$instance["team8pos"] ) { ?>
											<p>(<?php echo @$instance["team8pos"]; ?>)</p>
										<?php } ?>
										<?php if ( @$instance["team8fb"] ) { ?>
											<a href="<?php echo @$instance["team8fb"]; ?>" target="_blank">
												<i class="fa fa-facebook fa-3x"></i>
											</a>
										<?php } ?>
										<?php if ( @$instance["team8tw"] ) { ?>
											<a href="<?php echo @$instance["team8tw"]; ?>" target="_blank">
												<i class="fa fa-twitter fa-3x"></i>
											</a>
										<?php } ?>
										<?php if ( @$instance["team8dr"] ) { ?>
											<a href="<?php echo @$instance["team8dr"]; ?>" target="_blank">
												<i class="fa fa-dribbble fa-3x"></i>
											</a>
										<?php } ?>
										<?php if ( @$instance["team8ws"] ) { ?>
											<a href="<?php echo @$instance["team8ws"]; ?>" target="_blank">
												<i class="fa fa-link fa-3x"></i>
											</a>
										<?php } ?>
									</span>
								</div>
							</div>
						</div>
					</div><!-- /col -->
				</div><!-- /content -->
			<?php } ?>
			<?php if (isset( $instance["teamtitle"] )) { ?>
				<div class="teamfix"></div>
			<?php } else { ?>
			<?php } ?>
		</div><!-- /container -->
	</section><!-- /section -->
	<?php
		$post = $post_old; 
	}
	function update($new_instance, $old_instance) {
		return $new_instance;
	}
	function form($instance) {
	?>
<h3><?php _e( 'Widget Title', 'lang' ); ?></h3>
<p><!-- Widget Title -->
	<label for="<?php echo $this->get_field_id("teamtitle"); ?>">
		<?php _e( 'タイトル:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("teamtitle"); ?>" name="<?php echo $this->get_field_name("teamtitle"); ?>" type="text" value="<?php echo esc_attr(@$instance["teamtitle"]); ?>" /></label>
</p>
<p><?php _e( 'このウィジェットのタイトルを入力します。', 'lang'); ?></p>
<hr />
<h3><?php _e( 'チームメンバー #1', 'lang' ); ?></h3>
<p><!-- メンバー #1 -->
	<label for="<?php echo $this->get_field_id("team1img"); ?>">
		<?php _e( 'メンバー #1 画像:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team1img"); ?>" name="<?php echo $this->get_field_name("team1img"); ?>" type="text" value="<?php echo esc_attr(@$instance["team1img"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの画像のURLを入力します。 (大きめな正方形の画像を推奨)', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team1name"); ?>">
		<?php _e( 'メンバー #1 名前:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team1name"); ?>" name="<?php echo $this->get_field_name("team1name"); ?>" type="text" value="<?php echo esc_attr(@$instance["team1name"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの名前を入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team1pos"); ?>">
		<?php _e( 'メンバー #1 ポジション:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team1pos"); ?>" name="<?php echo $this->get_field_name("team1pos"); ?>" type="text" value="<?php echo esc_attr(@$instance["team1pos"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの役割または役職などを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team1fb"); ?>">
		<?php _e( 'メンバー #1 Facebook:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team1fb"); ?>" name="<?php echo $this->get_field_name("team1fb"); ?>" type="text" value="<?php echo esc_attr(@$instance["team1fb"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのFacebookページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team1tw"); ?>">
		<?php _e( 'メンバー #1 Twitter:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team1tw"); ?>" name="<?php echo $this->get_field_name("team1tw"); ?>" type="text" value="<?php echo esc_attr(@$instance["team1tw"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのTwitterページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team1dr"); ?>">
		<?php _e( 'メンバー #1 Dribbble:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team1dr"); ?>" name="<?php echo $this->get_field_name("team1dr"); ?>" type="text" value="<?php echo esc_attr(@$instance["team1dr"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのDribbbleページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team1ws"); ?>">
		<?php _e( 'メンバー #1 Webサイト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team1ws"); ?>" name="<?php echo $this->get_field_name("team1ws"); ?>" type="text" value="<?php echo esc_attr(@$instance["team1ws"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーが所有するWebサイトのURLを入力します。', 'lang'); ?></p>
<hr />
<h3><?php _e( 'チームメンバー #2', 'lang' ); ?></h3>
<p><!-- メンバー #2 -->
	<label for="<?php echo $this->get_field_id("team2img"); ?>">
		<?php _e( 'メンバー #2 画像:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team2img"); ?>" name="<?php echo $this->get_field_name("team2img"); ?>" type="text" value="<?php echo esc_attr(@$instance["team2img"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの画像のURLを入力します。 (大きめな正方形の画像を推奨)', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team2name"); ?>">
		<?php _e( 'メンバー #2 名前:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team2name"); ?>" name="<?php echo $this->get_field_name("team2name"); ?>" type="text" value="<?php echo esc_attr(@$instance["team2name"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの名前を入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team2pos"); ?>">
		<?php _e( 'メンバー #2 ポジション:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team2pos"); ?>" name="<?php echo $this->get_field_name("team2pos"); ?>" type="text" value="<?php echo esc_attr(@$instance["team2pos"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの役割または役職などを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team2fb"); ?>">
		<?php _e( 'メンバー #2 Facebook:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team2fb"); ?>" name="<?php echo $this->get_field_name("team2fb"); ?>" type="text" value="<?php echo esc_attr(@$instance["team2fb"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのFacebookページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team2tw"); ?>">
		<?php _e( 'メンバー #2 Twitter:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team2tw"); ?>" name="<?php echo $this->get_field_name("team2tw"); ?>" type="text" value="<?php echo esc_attr(@$instance["team2tw"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのTwitterページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team2dr"); ?>">
		<?php _e( 'メンバー #2 Dribbble:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team2dr"); ?>" name="<?php echo $this->get_field_name("team2dr"); ?>" type="text" value="<?php echo esc_attr(@$instance["team2dr"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのDribbbleページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team2ws"); ?>">
		<?php _e( 'メンバー #2 Webサイト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team2ws"); ?>" name="<?php echo $this->get_field_name("team2ws"); ?>" type="text" value="<?php echo esc_attr(@$instance["team2ws"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーが所有するWebサイトのURLを入力します。', 'lang'); ?></p>
<hr />
<h3><?php _e( 'チームメンバー #3', 'lang' ); ?></h3>
<p><!-- メンバー #3 -->
	<label for="<?php echo $this->get_field_id("team3img"); ?>">
		<?php _e( 'メンバー #3 画像:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team3img"); ?>" name="<?php echo $this->get_field_name("team3img"); ?>" type="text" value="<?php echo esc_attr(@$instance["team3img"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの画像のURLを入力します。 (大きめな正方形の画像を推奨)', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team3name"); ?>">
		<?php _e( 'メンバー #3 名前:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team3name"); ?>" name="<?php echo $this->get_field_name("team3name"); ?>" type="text" value="<?php echo esc_attr(@$instance["team3name"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの名前を入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team3pos"); ?>">
		<?php _e( 'メンバー #3 ポジション:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team3pos"); ?>" name="<?php echo $this->get_field_name("team3pos"); ?>" type="text" value="<?php echo esc_attr(@$instance["team3pos"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの役割または役職などを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team3fb"); ?>">
		<?php _e( 'メンバー #3 Facebook:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team3fb"); ?>" name="<?php echo $this->get_field_name("team3fb"); ?>" type="text" value="<?php echo esc_attr(@$instance["team3fb"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのFacebookページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team3tw"); ?>">
		<?php _e( 'メンバー #3 Twitter:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team3tw"); ?>" name="<?php echo $this->get_field_name("team3tw"); ?>" type="text" value="<?php echo esc_attr(@$instance["team3tw"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのTwitterページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team3dr"); ?>">
		<?php _e( 'メンバー #3 Dribbble:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team3dr"); ?>" name="<?php echo $this->get_field_name("team3dr"); ?>" type="text" value="<?php echo esc_attr(@$instance["team3dr"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのDribbbleページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team3ws"); ?>">
		<?php _e( 'メンバー #3 Webサイト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team3ws"); ?>" name="<?php echo $this->get_field_name("team3ws"); ?>" type="text" value="<?php echo esc_attr(@$instance["team3ws"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーが所有するWebサイトのURLを入力します。', 'lang'); ?></p>
<hr />
<h3><?php _e( 'チームメンバー #4', 'lang' ); ?></h3>
<p><!-- メンバー #4 -->
	<label for="<?php echo $this->get_field_id("team4img"); ?>">
		<?php _e( 'メンバー #4 画像:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team4img"); ?>" name="<?php echo $this->get_field_name("team4img"); ?>" type="text" value="<?php echo esc_attr(@$instance["team4img"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの画像のURLを入力します。 (大きめな正方形の画像を推奨)', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team4name"); ?>">
		<?php _e( 'メンバー #4 名前:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team4name"); ?>" name="<?php echo $this->get_field_name("team4name"); ?>" type="text" value="<?php echo esc_attr(@$instance["team4name"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの名前を入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team4pos"); ?>">
		<?php _e( 'メンバー #4 ポジション:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team4pos"); ?>" name="<?php echo $this->get_field_name("team4pos"); ?>" type="text" value="<?php echo esc_attr(@$instance["team4pos"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの役割または役職などを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team4fb"); ?>">
		<?php _e( 'メンバー #4 Facebook:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team4fb"); ?>" name="<?php echo $this->get_field_name("team4fb"); ?>" type="text" value="<?php echo esc_attr(@$instance["team4fb"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのFacebookページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team4tw"); ?>">
		<?php _e( 'メンバー #4 Twitter:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team4tw"); ?>" name="<?php echo $this->get_field_name("team4tw"); ?>" type="text" value="<?php echo esc_attr(@$instance["team4tw"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのTwitterページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team4dr"); ?>">
		<?php _e( 'メンバー #4 Dribbble:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team4dr"); ?>" name="<?php echo $this->get_field_name("team4dr"); ?>" type="text" value="<?php echo esc_attr(@$instance["team4dr"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのDribbbleページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team4ws"); ?>">
		<?php _e( 'メンバー #4 Webサイト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team4ws"); ?>" name="<?php echo $this->get_field_name("team4ws"); ?>" type="text" value="<?php echo esc_attr(@$instance["team4ws"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーが所有するWebサイトのURLを入力します。', 'lang'); ?></p>
<hr />
<?php if ( mytheme_option( 'widget_team_select' ) && mytheme_option( 'widget_team_select' ) != 'choice2' ) { ?>
<?php } else { ?>
<h3><?php _e( 'チームメンバー #5', 'lang' ); ?></h3>
<p><!-- メンバー #5 -->
	<label for="<?php echo $this->get_field_id("team5img"); ?>">
		<?php _e( 'メンバー #5 画像:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team5img"); ?>" name="<?php echo $this->get_field_name("team5img"); ?>" type="text" value="<?php echo esc_attr(@$instance["team5img"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの画像のURLを入力します。 (大きめな正方形の画像を推奨)', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team5name"); ?>">
		<?php _e( 'メンバー #5 名前:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team5name"); ?>" name="<?php echo $this->get_field_name("team5name"); ?>" type="text" value="<?php echo esc_attr(@$instance["team5name"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの名前を入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team5pos"); ?>">
		<?php _e( 'メンバー #5 ポジション:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team5pos"); ?>" name="<?php echo $this->get_field_name("team5pos"); ?>" type="text" value="<?php echo esc_attr(@$instance["team5pos"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの役割または役職などを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team5fb"); ?>">
		<?php _e( 'メンバー #5 Facebook:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team5fb"); ?>" name="<?php echo $this->get_field_name("team5fb"); ?>" type="text" value="<?php echo esc_attr(@$instance["team5fb"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのFacebookページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team5tw"); ?>">
		<?php _e( 'メンバー #5 Twitter:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team5tw"); ?>" name="<?php echo $this->get_field_name("team5tw"); ?>" type="text" value="<?php echo esc_attr(@$instance["team5tw"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのTwitterページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team5dr"); ?>">
		<?php _e( 'メンバー #5 Dribbble:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team5dr"); ?>" name="<?php echo $this->get_field_name("team5dr"); ?>" type="text" value="<?php echo esc_attr(@$instance["team5dr"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのDribbbleページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team5ws"); ?>">
		<?php _e( 'メンバー #5 Webサイト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team5ws"); ?>" name="<?php echo $this->get_field_name("team5ws"); ?>" type="text" value="<?php echo esc_attr(@$instance["team5ws"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーが所有するWebサイトのURLを入力します。', 'lang'); ?></p>
<hr />
<h3><?php _e( 'チームメンバー #6', 'lang' ); ?></h3>
<p><!-- メンバー #6 -->
	<label for="<?php echo $this->get_field_id("team6img"); ?>">
		<?php _e( 'メンバー #6 画像:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team6img"); ?>" name="<?php echo $this->get_field_name("team6img"); ?>" type="text" value="<?php echo esc_attr(@$instance["team6img"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの画像のURLを入力します。 (大きめな正方形の画像を推奨)', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team6name"); ?>">
		<?php _e( 'メンバー #6 名前:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team6name"); ?>" name="<?php echo $this->get_field_name("team6name"); ?>" type="text" value="<?php echo esc_attr(@$instance["team6name"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの名前を入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team6pos"); ?>">
		<?php _e( 'メンバー #6 ポジション:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team6pos"); ?>" name="<?php echo $this->get_field_name("team6pos"); ?>" type="text" value="<?php echo esc_attr(@$instance["team6pos"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの役割または役職などを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team6fb"); ?>">
		<?php _e( 'メンバー #6 Facebook:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team6fb"); ?>" name="<?php echo $this->get_field_name("team6fb"); ?>" type="text" value="<?php echo esc_attr(@$instance["team6fb"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのFacebookページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team6tw"); ?>">
		<?php _e( 'メンバー #6 Twitter:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team6tw"); ?>" name="<?php echo $this->get_field_name("team6tw"); ?>" type="text" value="<?php echo esc_attr(@$instance["team6tw"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのTwitterページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team6dr"); ?>">
		<?php _e( 'メンバー #6 Dribbble:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team6dr"); ?>" name="<?php echo $this->get_field_name("team6dr"); ?>" type="text" value="<?php echo esc_attr(@$instance["team6dr"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのDribbbleページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team6ws"); ?>">
		<?php _e( 'メンバー #6 Webサイト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team6ws"); ?>" name="<?php echo $this->get_field_name("team6ws"); ?>" type="text" value="<?php echo esc_attr(@$instance["team6ws"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーが所有するWebサイトのURLを入力します。', 'lang'); ?></p>
<hr />
<h3><?php _e( 'チームメンバー #7', 'lang' ); ?></h3>
<p><!-- メンバー #7 -->
	<label for="<?php echo $this->get_field_id("team7img"); ?>">
		<?php _e( 'メンバー #7 画像:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team7img"); ?>" name="<?php echo $this->get_field_name("team7img"); ?>" type="text" value="<?php echo esc_attr(@$instance["team7img"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの画像のURLを入力します。 (大きめな正方形の画像を推奨)', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team7name"); ?>">
		<?php _e( 'メンバー #7 名前:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team7name"); ?>" name="<?php echo $this->get_field_name("team7name"); ?>" type="text" value="<?php echo esc_attr(@$instance["team7name"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの名前を入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team7pos"); ?>">
		<?php _e( 'メンバー #7 ポジション:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team7pos"); ?>" name="<?php echo $this->get_field_name("team7pos"); ?>" type="text" value="<?php echo esc_attr(@$instance["team7pos"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの役割または役職などを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team7fb"); ?>">
		<?php _e( 'メンバー #7 Facebook:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team7fb"); ?>" name="<?php echo $this->get_field_name("team7fb"); ?>" type="text" value="<?php echo esc_attr(@$instance["team7fb"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのFacebookページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team7tw"); ?>">
		<?php _e( 'メンバー #7 Twitter:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team7tw"); ?>" name="<?php echo $this->get_field_name("team7tw"); ?>" type="text" value="<?php echo esc_attr(@$instance["team7tw"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのTwitterページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team7dr"); ?>">
		<?php _e( 'メンバー #7 Dribbble:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team7dr"); ?>" name="<?php echo $this->get_field_name("team7dr"); ?>" type="text" value="<?php echo esc_attr(@$instance["team7dr"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのDribbbleページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team7ws"); ?>">
		<?php _e( 'メンバー #7 Webサイト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team7ws"); ?>" name="<?php echo $this->get_field_name("team7ws"); ?>" type="text" value="<?php echo esc_attr(@$instance["team7ws"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーが所有するWebサイトのURLを入力します。', 'lang'); ?></p>
<hr />
<h3><?php _e( 'チームメンバー #8', 'lang' ); ?></h3>
<p><!-- メンバー #8 -->
	<label for="<?php echo $this->get_field_id("team8img"); ?>">
		<?php _e( 'メンバー #8 画像:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team8img"); ?>" name="<?php echo $this->get_field_name("team8img"); ?>" type="text" value="<?php echo esc_attr(@$instance["team8img"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの画像のURLを入力します。 (大きめな正方形の画像を推奨)', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team8name"); ?>">
		<?php _e( 'メンバー #8 名前:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team8name"); ?>" name="<?php echo $this->get_field_name("team8name"); ?>" type="text" value="<?php echo esc_attr(@$instance["team8name"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの名前を入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team8pos"); ?>">
		<?php _e( 'メンバー #8 ポジション:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team8pos"); ?>" name="<?php echo $this->get_field_name("team8pos"); ?>" type="text" value="<?php echo esc_attr(@$instance["team8pos"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーの役割または役職などを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team8fb"); ?>">
		<?php _e( 'メンバー #8 Facebook:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team8fb"); ?>" name="<?php echo $this->get_field_name("team8fb"); ?>" type="text" value="<?php echo esc_attr(@$instance["team8fb"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのFacebookページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team8tw"); ?>">
		<?php _e( 'メンバー #8 Twitter:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team8tw"); ?>" name="<?php echo $this->get_field_name("team8tw"); ?>" type="text" value="<?php echo esc_attr(@$instance["team8tw"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのTwitterページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team8dr"); ?>">
		<?php _e( 'メンバー #8 Dribbble:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team8dr"); ?>" name="<?php echo $this->get_field_name("team8dr"); ?>" type="text" value="<?php echo esc_attr(@$instance["team8dr"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーのDribbbleページのURLを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("team8ws"); ?>">
		<?php _e( 'メンバー #8 Website:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("team8ws"); ?>" name="<?php echo $this->get_field_name("team8ws"); ?>" type="text" value="<?php echo esc_attr(@$instance["team8ws"]); ?>" /></label>
</p>
<p><?php _e( 'このメンバーが所有するWebサイトのURLを入力します。', 'lang'); ?></p>
<hr />
<?php } ?>
	<?php
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("wp_team");') );
	
	
	
	
	

	/**
	 * Text Grid Widget
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

class wp_grid extends WP_Widget {
	function wp_grid() {
		$widget_ops = array(
			'classname' => 'widget_wp_grid',
			'description' => 'テキストグリッド &amp; アイコン.'
		);
		parent::__construct(
			'wp_grid',
			'[Grazioso] テキストグリッド',
			$widget_ops
		);
	}
	function widget($args, $instance) {
		global $post;
		$post_old = $post; 
		extract( $args );
	?>
	<section class="group <?php echo $widget_id; ?>"><!-- section -->
		<div class="container-grid"><!-- container -->
		<?php if (isset( $instance["gridtitle"] )) { ?>
			<div class="content-grid-title"><!-- content -->
				<div class="row col-3-3 centered wow animated fadeInDown" data-wow-offset="100"><!-- col -->
					<h1><?php echo @$instance["gridtitle"]; ?></h1>
				</div><!-- /col -->
			</div><!-- /content -->
			<?php } else { ?>
			<?php } ?>
			<div class="content-grid"><!-- content -->
				<div class="row col-1-3 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".1s"><!-- col -->
					<?php if ( @$instance["grid11title"] ) {; echo '<h3>' . @$instance["grid11title"] . '</h3>'; } ?>
					<?php if ( @$instance["grid11fa"] ) {; echo @$instance["grid11fa"]; } ?>
					<?php if ( @$instance["grid11txt"] ) {; echo '<p>' . @$instance["grid11txt"] . '</p>'; } ?>
				</div><!-- /col -->
				<div class="row col-1-3 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".4s"><!-- col -->
					<?php if ( @$instance["grid12title"] ) {; echo '<h3>' . @$instance["grid12title"] . '</h3>'; } ?>
					<?php if ( @$instance["grid12fa"] ) {; echo @$instance["grid12fa"]; } ?>
					<?php if ( @$instance["grid12txt"] ) {; echo '<p>' . @$instance["grid12txt"] . '</p>'; } ?>
				</div><!-- /col -->
				<div class="row col-1-3 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".7s"><!-- col -->
					<?php if ( @$instance["grid13title"] ) {; echo '<h3>' . @$instance["grid13title"] . '</h3>'; } ?>
					<?php if ( @$instance["grid13fa"] ) {; echo @$instance["grid13fa"]; } ?>
					<?php if ( @$instance["grid13txt"] ) {; echo '<p>' . @$instance["grid13txt"] . '</p>'; } ?>
				</div><!-- /col -->
			</div><!-- /content -->
			<?php if ( @$instance["grid21title"] ) { ; ?>
			<div class="break"></div>
			<div class="content-grid"><!-- content -->
				<div class="row col-1-3 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".2s"><!-- col -->
					<?php if ( @$instance["grid21title"] ) {; echo '<h3>' . @$instance["grid21title"] . '</h3>'; } ?>
					<?php if ( @$instance["grid21fa"] ) {; echo @$instance["grid21fa"]; } ?>
					<?php if ( @$instance["grid21txt"] ) {; echo '<p>' . @$instance["grid21txt"] . '</p>'; } ?>
				</div><!-- /col -->
				<div class="row col-1-3 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".5s"><!-- col -->
					<?php if ( @$instance["grid22title"] ) {; echo '<h3>' . @$instance["grid22title"] . '</h3>'; } ?>
					<?php if ( @$instance["grid22fa"] ) {; echo @$instance["grid22fa"]; } ?>
					<?php if ( @$instance["grid22txt"] ) {; echo '<p>' . @$instance["grid22txt"] . '</p>'; } ?>
				</div><!-- /col -->
				<div class="row col-1-3 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".8s"><!-- col -->
					<?php if ( @$instance["grid23title"] ) {; echo '<h3>' . @$instance["grid23title"] . '</h3>'; } ?>
					<?php if ( @$instance["grid23fa"] ) {; echo @$instance["grid23fa"]; } ?>
					<?php if ( @$instance["grid23txt"] ) {; echo '<p>' . @$instance["grid23txt"] . '</p>'; } ?>
				</div><!-- /col -->
				</div><!-- /content -->
				<?php } ?>
				<?php if ( @$instance["grid31title"] ) { ; ?>
				<div class="break"></div>
				<div class="content-grid"><!-- content -->
				<div class="row col-1-3 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".3s"><!-- col -->
					<?php if ( @$instance["grid31title"] ) {; echo '<h3>' . @$instance["grid31title"] . '</h3>'; } ?>
					<?php if ( @$instance["grid31fa"] ) {; echo @$instance["grid31fa"]; } ?>
					<?php if ( @$instance["grid31txt"] ) {; echo '<p>' . @$instance["grid31txt"] . '</p>'; } ?>
				</div><!-- /col -->
				<div class="row col-1-3 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".6s"><!-- col -->
					<?php if ( @$instance["grid32title"] ) {; echo '<h3>' . @$instance["grid32title"] . '</h3>'; } ?>
					<?php if ( @$instance["grid32fa"] ) {; echo @$instance["grid32fa"]; } ?>
					<?php if ( @$instance["grid32txt"] ) {; echo '<p>' . @$instance["grid32txt"] . '</p>'; } ?>
				</div><!-- /col -->
				<div class="row col-1-3 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".9s"><!-- col -->
					<?php if ( @$instance["grid33title"] ) {; echo '<h3>' . @$instance["grid33title"] . '</h3>'; } ?>
					<?php if ( @$instance["grid33fa"] ) {; echo @$instance["grid33fa"]; } ?>
					<?php if ( @$instance["grid33txt"] ) {; echo '<p>' . @$instance["grid33txt"] . '</p>'; } ?>
				</div><!-- /col -->
			</div><!-- /content -->
			<?php } ?>
		</div><!-- /container -->
	</section><!-- /section -->
	<?php
		$post = $post_old; 
	}
	function update($new_instance, $old_instance) {
		return $new_instance;
	}
	function form($instance) {
	?>
	<h3><?php _e( 'タイトル', 'lang' ); ?></h3>
<p>
	<label for="<?php echo $this->get_field_id("gridtitle"); ?>">
		<?php _e( 'タイトルテキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("gridtitle"); ?>" name="<?php echo $this->get_field_name("gridtitle"); ?>" type="text" value="<?php echo esc_attr(@$instance["gridtitle"]); ?>" /></label>
</p>
<p><?php _e( 'このウィジェットのタイトルを入力します。', 'lang'); ?></p>
<hr />
	<h3><?php _e( 'グリッド 1-1', 'lang' ); ?></h3>
<p>
	<label for="<?php echo $this->get_field_id("grid11fa"); ?>">
		<?php _e( 'FontAwesomeのコード:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid11fa"); ?>" name="<?php echo $this->get_field_name("grid11fa"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid11fa"]); ?>" /></label>
</p>
<p><?php _e( 'FontAwesomeのコードを入力します（最適な結果を得るには、fa-5x classを使用してください）', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid11title"); ?>">
		<?php _e( 'タイトル:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid11title"); ?>" name="<?php echo $this->get_field_name("grid11title"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid11title"]); ?>" /></label>
</p>
<p><?php _e( 'グリッドのタイトルを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid11txt"); ?>">
		<?php _e( 'テキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid11txt"); ?>" name="<?php echo $this->get_field_name("grid11txt"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid11txt"]); ?>" /></label>
</p>
<p><?php _e( 'グリッド内に表示するテキストを入力します。', 'lang'); ?></p>
<hr />
	<h3><?php _e( 'グリッド 1-2', 'lang' ); ?></h3>
<p>
	<label for="<?php echo $this->get_field_id("grid12fa"); ?>">
		<?php _e( 'FontAwesomeのコード:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid12fa"); ?>" name="<?php echo $this->get_field_name("grid12fa"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid12fa"]); ?>" /></label>
</p>
<p><?php _e( 'FontAwesomeのコードを入力します（最適な結果を得るには、fa-5x classを使用してください）', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid12title"); ?>">
		<?php _e( 'タイトルテキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid12title"); ?>" name="<?php echo $this->get_field_name("grid12title"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid12title"]); ?>" /></label>
</p>
<p><?php _e( 'グリッドのタイトルを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid12txt"); ?>">
		<?php _e( 'テキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid12txt"); ?>" name="<?php echo $this->get_field_name("grid12txt"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid12txt"]); ?>" /></label>
</p>
<p><?php _e( 'グリッド内に表示するテキストを入力します。', 'lang'); ?></p>
<hr />
	<h3><?php _e( 'グリッド 1-3', 'lang' ); ?></h3>
<p>
	<label for="<?php echo $this->get_field_id("grid13fa"); ?>">
		<?php _e( 'FontAwesomeのコード:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid13fa"); ?>" name="<?php echo $this->get_field_name("grid13fa"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid13fa"]); ?>" /></label>
</p>
<p><?php _e( 'FontAwesomeのコードを入力します（最適な結果を得るには、fa-5x classを使用してください）', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid13title"); ?>">
		<?php _e( 'タイトル:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid13title"); ?>" name="<?php echo $this->get_field_name("grid13title"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid13title"]); ?>" /></label>
</p>
<p><?php _e( 'グリッドのタイトルを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid13txt"); ?>">
		<?php _e( 'テキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid13txt"); ?>" name="<?php echo $this->get_field_name("grid13txt"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid13txt"]); ?>" /></label>
</p>
<p><?php _e( 'グリッド内に表示するテキストを入力します。', 'lang'); ?></p>
<hr />
	<h3><?php _e( 'グリッド 2-1', 'lang' ); ?></h3>
<p>
	<label for="<?php echo $this->get_field_id("grid21fa"); ?>">
		<?php _e( 'FontAwesomeのコード:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid21fa"); ?>" name="<?php echo $this->get_field_name("grid21fa"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid21fa"]); ?>" /></label>
</p>
<p><?php _e( 'FontAwesomeのコードを入力します（最適な結果を得るには、fa-5x classを使用してください）', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid21title"); ?>">
		<?php _e( 'タイトル:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid21title"); ?>" name="<?php echo $this->get_field_name("grid21title"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid21title"]); ?>" /></label>
</p>
<p><?php _e( 'グリッドのタイトルを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid21txt"); ?>">
		<?php _e( 'テキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid21txt"); ?>" name="<?php echo $this->get_field_name("grid21txt"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid21txt"]); ?>" /></label>
</p>
<p><?php _e( 'グリッド内に表示するテキストを入力します。', 'lang'); ?></p>
<hr />
	<h3><?php _e( 'グリッド 2-2', 'lang' ); ?></h3>
<p>
	<label for="<?php echo $this->get_field_id("grid22fa"); ?>">
		<?php _e( 'FontAwesomeのコード:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid22fa"); ?>" name="<?php echo $this->get_field_name("grid22fa"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid22fa"]); ?>" /></label>
</p>
<p><?php _e( 'FontAwesomeのコードを入力します（最適な結果を得るには、fa-5x classを使用してください）', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid22title"); ?>">
		<?php _e( 'タイトル:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid22title"); ?>" name="<?php echo $this->get_field_name("grid22title"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid22title"]); ?>" /></label>
</p>
<p><?php _e( 'グリッドのタイトルを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid22txt"); ?>">
		<?php _e( 'テキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid22txt"); ?>" name="<?php echo $this->get_field_name("grid22txt"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid22txt"]); ?>" /></label>
</p>
<p><?php _e( 'グリッド内に表示するテキストを入力します。', 'lang'); ?></p>
<hr />
	<h3><?php _e( 'Grid 2-3', 'lang' ); ?></h3>
<p>
	<label for="<?php echo $this->get_field_id("grid23fa"); ?>">
		<?php _e( 'FontAwesomeのコード:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid23fa"); ?>" name="<?php echo $this->get_field_name("grid23fa"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid23fa"]); ?>" /></label>
</p>
<p><?php _e( 'FontAwesomeのコードを入力します（最適な結果を得るには、fa-5x classを使用してください）', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid23title"); ?>">
		<?php _e( 'タイトル:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid23title"); ?>" name="<?php echo $this->get_field_name("grid23title"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid23title"]); ?>" /></label>
</p>
<p><?php _e( 'グリッドのタイトルを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid23txt"); ?>">
		<?php _e( 'テキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid23txt"); ?>" name="<?php echo $this->get_field_name("grid23txt"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid23txt"]); ?>" /></label>
</p>
<p><?php _e( 'グリッド内に表示するテキストを入力します。', 'lang'); ?></p>
<hr />
	<h3><?php _e( 'グリッド 3-1', 'lang' ); ?></h3>
<p>
	<label for="<?php echo $this->get_field_id("grid31fa"); ?>">
		<?php _e( 'FontAwesomeのコード:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid31fa"); ?>" name="<?php echo $this->get_field_name("grid31fa"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid31fa"]); ?>" /></label>
</p>
<p><?php _e( 'FontAwesomeのコードを入力します（最適な結果を得るには、fa-5x classを使用してください）', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid31title"); ?>">
		<?php _e( 'タイトル:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid31title"); ?>" name="<?php echo $this->get_field_name("grid31title"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid31title"]); ?>" /></label>
</p>
<p><?php _e( 'グリッドのタイトルを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid31txt"); ?>">
		<?php _e( 'テキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid31txt"); ?>" name="<?php echo $this->get_field_name("grid31txt"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid31txt"]); ?>" /></label>
</p>
<p><?php _e( 'グリッド内に表示するテキストを入力します。', 'lang'); ?></p>
<hr />
	<h3><?php _e( 'グリッド 3-2', 'lang' ); ?></h3>
<p>
	<label for="<?php echo $this->get_field_id("grid32fa"); ?>">
		<?php _e( 'FontAwesomeのコード:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid32fa"); ?>" name="<?php echo $this->get_field_name("grid32fa"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid32fa"]); ?>" /></label>
</p>
<p><?php _e( 'FontAwesomeのコードを入力します（最適な結果を得るには、fa-5x classを使用してください）', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid32title"); ?>">
		<?php _e( 'タイトル:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid32title"); ?>" name="<?php echo $this->get_field_name("grid32title"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid32title"]); ?>" /></label>
</p>
<p><?php _e( 'グリッドのタイトルを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid32txt"); ?>">
		<?php _e( 'テキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid32txt"); ?>" name="<?php echo $this->get_field_name("grid32txt"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid32txt"]); ?>" /></label>
</p>
<p><?php _e( 'グリッド内に表示するテキストを入力します。', 'lang'); ?></p>
<hr />
	<h3><?php _e( 'グリッド 3-3', 'lang' ); ?></h3>
<p>
	<label for="<?php echo $this->get_field_id("grid33fa"); ?>">
		<?php _e( 'FontAwesome Code:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid33fa"); ?>" name="<?php echo $this->get_field_name("grid33fa"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid33fa"]); ?>" /></label>
</p>
<p><?php _e( 'FontAwesomeのコードを入力します（最適な結果を得るには、fa-5x classを使用してください）', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid33title"); ?>">
		<?php _e( 'タイトル:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid33title"); ?>" name="<?php echo $this->get_field_name("grid33title"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid33title"]); ?>" /></label>
</p>
<p><?php _e( 'グリッドのタイトルを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("grid33txt"); ?>">
		<?php _e( 'テキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("grid33txt"); ?>" name="<?php echo $this->get_field_name("grid33txt"); ?>" type="text" value="<?php echo esc_attr(@$instance["grid33txt"]); ?>" /></label>
</p>
<p><?php _e( 'グリッド内に表示するテキストを入力します。', 'lang'); ?></p>
<hr />

	<?php
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("wp_grid");') );
	
	
	
	

	/**
	 * YouTube Widget
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

class wp_youtube extends WP_Widget {
	function wp_youtube() {
		$widget_ops = array(
			'classname' => 'widget_wp_youtube',
			'description' => 'YouTube動画 &amp; チャンネルフィード.'
		);
		parent::__construct(
			'wp_youtube',
			'[Grazioso] YouTubeプレイヤー',
			$widget_ops
		);
	}
	function widget($args, $instance) {
		global $post;
		$post_old = $post; 
		extract( $args );
	?>
	<section class="group <?php echo $widget_id; ?>"><!-- section -->
		<div class="container-youtube"><!-- container -->
			<div class="content-youtube"><!-- content -->
				<div class="row col-2-3 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".25s"><!-- col -->
					<div class="video-container">
						<iframe seamless width="1200" height="675" src="//www.youtube.com/embed/<?php echo @$instance["ytvideo"]; ?>?rel=0"></iframe>
					</div>
				</div><!-- /col -->
				<div class="row col-1-3 wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".5s"><!-- col -->
					<?php if ( @$instance["youtubetitle"] ) {; echo '<h3><i class="fa fa-youtube-square"></i> ' . @$instance["youtubetitle"] . '</h3>'; } ?>
					<div class="list_container">
						<?php if(@$instance["ytchannel"]) echo bringfeed('https://www.youtube.com/feeds/videos.xml?channel_id=' . channel2id( @$instance["ytchannel"] ), 'bringfeed', 50); // YOUTUBE CHANNEL LIST ?>
					</div>
				</div><!-- /col -->
			</div><!-- /content -->
		</div><!-- /container -->
	</section><!-- /section -->
	<?php
		$post = $post_old; 
	}
	function update($new_instance, $old_instance) {
		return $new_instance;
	}
	function form($instance) {
	?>
<p>
	<label for="<?php echo $this->get_field_id("youtubetitle"); ?>">
		<?php _e( 'タイトル:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("youtubetitle"); ?>" name="<?php echo $this->get_field_name("youtubetitle"); ?>" type="text" value="<?php echo esc_attr(@$instance["youtubetitle"]); ?>" /></label>
</p>
<p><?php _e( 'このウィジェットのタイトルを入力します。', 'lang'); ?></p>
<hr />
<p>
	<label for="<?php echo $this->get_field_id("ytchannel"); ?>">
		<?php _e( 'チャンネル名:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("ytchannel"); ?>" name="<?php echo $this->get_field_name("ytchannel"); ?>" type="text" value="<?php echo esc_attr(@$instance["ytchannel"]); ?>" /></label>
</p>
<p><?php _e( 'あなたのYouTubeアカウント名を入力。 (大文字と小文字を区別する)', 'lang'); ?></p>
<hr />
<p>
	<label for="<?php echo $this->get_field_id("ytvideo"); ?>">
		<?php _e( 'ビデオ ID:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("ytvideo"); ?>" name="<?php echo $this->get_field_name("ytvideo"); ?>" type="text" value="<?php echo esc_attr(@$instance["ytvideo"]); ?>" /></label>
</p>
<p><?php _e( '表示したいYouTube動画の ID を入力。([watch?v=]の後に続く文字列)', 'lang'); ?></p>
<hr />
	<?php
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("wp_youtube");') );
	
	
	
	


	/**
	 * Action Widget
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

class wp_action extends WP_Widget {
	function wp_action() {
		$widget_ops = array(
			'classname' => 'widget_wp_action',
			'description' => 'メールフォーム &amp; テキスト.'
		);
		parent::__construct(
			'wp_action',
			'[Grazioso] アクションフォーム',
			$widget_ops
		);
	}
	function widget($args, $instance) {
		global $post;
		$post_old = $post; 
		extract( $args );
	?>
	<section class="group <?php echo $widget_id; ?>"><!-- section -->
		<div class="container-action"><!-- container -->
			<div class="content-action"><!-- content -->
					<div class="row col-6-6 centered"><!-- col --> 
						<?php if ( @$instance["actiontitle"] ) {; echo '<h1 class="wow animated fadeInDown" data-wow-offset="100">' . @$instance["actiontitle"] . '</h1>'; } ?>
						<?php if ( @$instance["actiontxt"] ) {; echo '<p class="wow animated fadeInDown" data-wow-offset="100">' . @$instance["actiontxt"] . '</p>'; } ?>
						<?php if ( @$instance["actionform"] ) { ?>
						<br />
							<div class="cform centered wow animated fadeInDown" data-wow-offset="100">
								<?php echo do_shortcode(@$instance["actionform"]); ?>
							</div>
						 <?php } ?>
					</div><!-- /col -->
			</div><!-- /content -->
		</div><!-- /container -->
	</section><!-- /section -->
	<section class="group"><!-- section -->
			<?php if ( @$instance["actionmap"] ) {; echo '<div class="container-gmap wow animated fadeInDown" data-wow-offset="100">' . @$instance["actionmap"] . '</div>'; } ?>

	</section><!-- /section -->
	<?php
		$post = $post_old; 
	}
	function update($new_instance, $old_instance) {
		return $new_instance;
	}
	function form($instance) {
	?>
<p>
	<label for="<?php echo $this->get_field_id("actiontitle"); ?>">
		<?php _e( 'タイトル:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("actiontitle"); ?>" name="<?php echo $this->get_field_name("actiontitle"); ?>" type="text" value="<?php echo esc_attr(@$instance["actiontitle"]); ?>" /></label>
</p>
<p><?php _e( 'このウイジェットのタイトルを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("actiontxt"); ?>">
		<?php _e( 'テキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("actiontxt"); ?>" name="<?php echo $this->get_field_name("actiontxt"); ?>" type="text" value="<?php echo esc_attr(@$instance["actiontxt"]); ?>" /></label>
</p>
<p><?php _e( '説明文など表示させたいテキストを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("actionform"); ?>">
		<?php _e( 'CF7 ショートコード:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("actionform"); ?>" name="<?php echo $this->get_field_name("actionform"); ?>" type="text" value="<?php echo esc_attr(@$instance["actionform"]); ?>" /></label>
</p>
<p><?php _e( 'コンタクトフォーム7のショートコードを入力します。', 'lang'); ?></p>
<p>
	<label for="<?php echo $this->get_field_id("actionmap"); ?>">
		<?php _e( 'グーグルマップのコード:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("actionmap"); ?>" name="<?php echo $this->get_field_name("actionmap"); ?>" type="text" value="<?php echo esc_attr(@$instance["actionmap"]); ?>" /></label>
</p>
<p><?php _e( '表示させたいグーグルマップの埋め込みコードを入力します。 (幅100%のみ).', 'lang'); ?></p>
<hr />
	<?php
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("wp_action");') );
	
	
	
	
	
		
	/**
	 * Pricing Tables Widget
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

class wp_table extends WP_Widget {
	function wp_table() {
		$widget_ops = array(
			'classname' => 'widget_wp_table',
			'description' => 'プライシングテーブル（価格表）'
		);
		parent::__construct(
			'wp_table',
			'[Grazioso] プライシングテーブル',
			$widget_ops
		);
	}
	function widget($args, $instance) {
		global $post;
		$post_old = $post; 
		extract( $args );
	?>
	<section class="group <?php echo $widget_id; ?>"><!-- section -->
		<div class="container-table"><!-- container -->
		<?php if (isset( $instance["pricetitle"] )) { ?>
			<div class="content-price-title"><!-- content -->
				<div class="row col-3-3 centered wow animated fadeInDown" data-wow-offset="100"><!-- col -->
					<h1><?php echo @$instance["pricetitle"]; ?></h1>
				</div><!-- /col -->
			</div><!-- /content -->
			<?php } else { ?>
			<?php } ?>
			<div class="content-table"><!-- content -->
				<div class="row col-2-6 centered wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".25s"><!-- col -->
					<div class="pricetable"><!-- pricetable -->
						<div class="table_top"><!-- tabletop -->
							<?php if ( @$instance["table1title"] ) {; echo '<h3>' . @$instance["table1title"] . '</h3>'; } ?>
							<?php if ( @$instance["table1price"] ) {; echo '<span class="price wow animated tada" data-wow-offset="100" data-wow-delay="2s">' . @$instance["table1price"] . '</span>'; } ?>
							<?php if ( @$instance["table1txt"] ) {; echo '<p>' . @$instance["table1txt"] . '</p>'; } ?>
						</div><!-- /tabletop -->
						<div class="table_mid"><!-- tablemid -->
							<ul>
								<?php if ( @$instance["table1list1"] ) {; echo '<li>' . @$instance["table1list1"] . '</li>'; } ?>
								<?php if ( @$instance["table1list2"] ) {; echo '<li>' . @$instance["table1list2"] . '</li>'; } ?>
								<?php if ( @$instance["table1list3"] ) {; echo '<li>' . @$instance["table1list3"] . '</li>'; } ?>
								<?php if ( @$instance["table1list4"] ) {; echo '<li>' . @$instance["table1list4"] . '</li>'; } ?>
								<?php if ( @$instance["table1list5"] ) {; echo '<li>' . @$instance["table1list5"] . '</li>'; } ?>
							</ul>
						</div><!-- /tablemid -->
						<div class="table_bottom"><!-- tablebottom -->
							<h4><a href="<?php echo @$instance["table1url"]; ?>"><span><?php echo @$instance["table1buy"]; ?></span></a></h4>
						</div><!-- /tablebottom -->
					</div><!-- /pricetable -->
				</div><!-- /col -->
				<div class="row col-2-6 centered wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".5s"><!-- col -->
					<div class="pricetable"><!-- pricetable -->
						<div class="table_top"><!-- tabletop -->
							<?php if ( @$instance["table2title"] ) {; echo '<h3>' . @$instance["table2title"] . '</h3>'; } ?>
							<?php if ( @$instance["table2price"] ) {; echo '<span class="price wow animated tada" data-wow-offset="100" data-wow-delay="2.5s">' . @$instance["table2price"] . '</span>'; } ?>
							<?php if ( @$instance["table2txt"] ) {; echo '<p>' . @$instance["table2txt"] . '</p>'; } ?>
						</div><!-- /tabletop -->
						<div class="table_mid"><!-- tablemid -->
							<ul>
								<?php if ( @$instance["table2list1"] ) {; echo '<li>' . @$instance["table2list1"] . '</li>'; } ?>
								<?php if ( @$instance["table2list2"] ) {; echo '<li>' . @$instance["table2list2"] . '</li>'; } ?>
								<?php if ( @$instance["table2list3"] ) {; echo '<li>' . @$instance["table2list3"] . '</li>'; } ?>
								<?php if ( @$instance["table2list4"] ) {; echo '<li>' . @$instance["table2list4"] . '</li>'; } ?>
								<?php if ( @$instance["table2list5"] ) {; echo '<li>' . @$instance["table2list5"] . '</li>'; } ?>
							</ul>
						</div><!-- /tablemid -->
						<div class="table_bottom"><!-- tablebottom -->
							<h4><a href="<?php echo @$instance["table2url"]; ?>"><span><?php echo @$instance["table2buy"]; ?></span></a></h4>
						</div><!-- /tablebottom -->
					</div><!-- /pricetable -->
				</div><!-- /col -->
				<div class="row col-2-6 centered wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".75s"><!-- col -->
					<div class="pricetable"><!-- pricetable -->
						<div class="table_top"><!-- tabletop -->
							<?php if ( @$instance["table3title"] ) {; echo '<h3>' . @$instance["table3title"] . '</h3>'; } ?>
							<?php if ( @$instance["table3price"] ) {; echo '<span class="price wow animated tada" data-wow-offset="100" data-wow-delay="3s">' . @$instance["table3price"] . '</span>'; } ?>
							<?php if ( @$instance["table3txt"] ) {; echo '<p>' . @$instance["table3txt"] . '</p>'; } ?>
						</div><!-- /tabletop -->
						<div class="table_mid"><!-- tablemid -->
							<ul>
								<?php if ( @$instance["table3list1"] ) {; echo '<li>' . @$instance["table3list1"] . '</li>'; } ?>
								<?php if ( @$instance["table3list2"] ) {; echo '<li>' . @$instance["table3list2"] . '</li>'; } ?>
								<?php if ( @$instance["table3list3"] ) {; echo '<li>' . @$instance["table3list3"] . '</li>'; } ?>
								<?php if ( @$instance["table3list4"] ) {; echo '<li>' . @$instance["table3list4"] . '</li>'; } ?>
								<?php if ( @$instance["table3list5"] ) {; echo '<li>' . @$instance["table3list5"] . '</li>'; } ?>
							</ul>
						</div><!-- /tablemid -->
						<div class="table_bottom"><!-- tablebottom -->
							<h4><a href="<?php echo @$instance["table3url"]; ?>"><span><?php echo @$instance["table3buy"]; ?></span></a></h4>
						</div><!-- /tablebottom -->
					</div><!-- /pricetable -->
				</div><!-- /col -->
			</div><!-- /content -->
		</div><!-- /container -->
	</section><!-- /section -->
	<?php
		$post = $post_old; 
	}
	function update($new_instance, $old_instance) {
		return $new_instance;
	}
	function form($instance) {
	?>
	<h3><?php _e( 'タイトル', 'lang' ); ?></h3>
<p>
	<label for="<?php echo $this->get_field_id("pricetitle"); ?>">
		<?php _e( 'タイトル:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("pricetitle"); ?>" name="<?php echo $this->get_field_name("pricetitle"); ?>" type="text" value="<?php echo esc_attr(@$instance["pricetitle"]); ?>" /></label>
</p>
<p><?php _e( 'このウィジェットのタイトルを入力します。', 'lang'); ?></p>
<hr />
<h3><?php _e( 'テーブル #1', 'lang'); ?></h3>
<p>
	<label for="<?php echo $this->get_field_id("table1title"); ?>">
		<?php _e( '商品名:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table1title"); ?>" name="<?php echo $this->get_field_name("table1title"); ?>" type="text" value="<?php echo esc_attr(@$instance["table1title"]); ?>" /></label>
</p>
<p><?php _e( '商品名やサービス名を記入します。', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table1price"); ?>">
		<?php _e( '価格:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table1price"); ?>" name="<?php echo $this->get_field_name("table1price"); ?>" type="text" value="<?php echo esc_attr(@$instance["table1price"]); ?>" /></label>
</p>
<p><?php _e( '商品やサービスの価格を入力します。(下付き文字を使用する場合は &lt;span&gt;タグでテキストを挟みます).', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table1txt"); ?>">
		<?php _e( 'テキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table1txt"); ?>" name="<?php echo $this->get_field_name("table1txt"); ?>" type="text" value="<?php echo esc_attr(@$instance["table1txt"]); ?>" /></label>
</p>
<p><?php _e( '商品のキャッチコピーなどのテキストを入力します。(&lt;span&gt;タグでテキストを挟むと太字になります).', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table1list1"); ?>">
		<?php _e( '商品に関する項目 #1:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table1list1"); ?>" name="<?php echo $this->get_field_name("table1list1"); ?>" type="text" value="<?php echo esc_attr(@$instance["table1list1"]); ?>" /></label>
</p>
<p><?php _e( '商品の概要、キャッチコピー、メリットなどを簡潔に入力します。（全角16文字以内で1行に収まります）', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table1list2"); ?>">
		<?php _e( '商品に関する項目 #2:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table1list2"); ?>" name="<?php echo $this->get_field_name("table1list2"); ?>" type="text" value="<?php echo esc_attr(@$instance["table1list2"]); ?>" /></label>
</p>
<p><?php _e( '商品の概要、キャッチコピー、メリットなどを簡潔に入力します。（全角16文字以内で1行に収まります）', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table1list3"); ?>">
		<?php _e( '商品に関する項目 #3:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table1list3"); ?>" name="<?php echo $this->get_field_name("table1list3"); ?>" type="text" value="<?php echo esc_attr(@$instance["table1list3"]); ?>" /></label>
</p>
<p><?php _e( '商品の概要、キャッチコピー、メリットなどを簡潔に入力します。（全角16文字以内で1行に収まります）', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table1list4"); ?>">
		<?php _e( '商品に関する項目 #4:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table1list4"); ?>" name="<?php echo $this->get_field_name("table1list4"); ?>" type="text" value="<?php echo esc_attr(@$instance["table1list4"]); ?>" /></label>
</p>
<p><?php _e( '商品の概要、キャッチコピー、メリットなどを簡潔に入力します。（全角16文字以内で1行に収まります）', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table1list5"); ?>">
		<?php _e( '商品に関する項目 #5:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table1list5"); ?>" name="<?php echo $this->get_field_name("table1list5"); ?>" type="text" value="<?php echo esc_attr(@$instance["table1list5"]); ?>" /></label>
</p>
<p><?php _e( '商品の概要、キャッチコピー、メリットなどを簡潔に入力します。（全角16文字以内で1行に収まります）', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table1buy"); ?>">
		<?php _e( 'ボタンテキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table1buy"); ?>" name="<?php echo $this->get_field_name("table1buy"); ?>" type="text" value="<?php echo esc_attr(@$instance["table1buy"]); ?>" /></label>
</p>
<p><?php _e( 'ボタンに表示するテキストを入力します。', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table1url"); ?>">
		<?php _e( 'ボタンリンク URL:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table1url"); ?>" name="<?php echo $this->get_field_name("table1url"); ?>" type="text" value="<?php echo esc_attr(@$instance["table1url"]); ?>" /></label>
</p>
<p><?php _e( 'ボタンのリンク先のURLを入力します。', 'lang'); ?></p>

<hr />

<h3><?php _e( 'テーブル #2', 'lang'); ?></h3>
<p>
	<label for="<?php echo $this->get_field_id("table2title"); ?>">
		<?php _e( '商品名:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table2title"); ?>" name="<?php echo $this->get_field_name("table2title"); ?>" type="text" value="<?php echo esc_attr(@$instance["table2title"]); ?>" /></label>
</p>
<p><?php _e( '商品名やサービス名を入力します。', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table2price"); ?>">
		<?php _e( '価格:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table2price"); ?>" name="<?php echo $this->get_field_name("table2price"); ?>" type="text" value="<?php echo esc_attr(@$instance["table2price"]); ?>" /></label>
</p>
<p><?php _e( '商品やサービスの価格を入力します。(下付き文字を使用する場合は &lt;span&gt;タグでテキストを挟みます).', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table2txt"); ?>">
		<?php _e( 'テキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table2txt"); ?>" name="<?php echo $this->get_field_name("table2txt"); ?>" type="text" value="<?php echo esc_attr(@$instance["table2txt"]); ?>" /></label>
</p>
<p><?php _e( '商品のキャッチコピーなどのテキストを入力します。(&lt;span&gt;タグでテキストを挟むと太字になります).', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table2list1"); ?>">
		<?php _e( '商品に関する項目 #1:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table2list1"); ?>" name="<?php echo $this->get_field_name("table2list1"); ?>" type="text" value="<?php echo esc_attr(@$instance["table2list1"]); ?>" /></label>
</p>
<p><?php _e( '商品の概要、キャッチコピー、メリットなどを簡潔に入力します。（全角16文字以内で1行に収まります）', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table2list2"); ?>">
		<?php _e( '商品に関する項目 #2:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table2list2"); ?>" name="<?php echo $this->get_field_name("table2list2"); ?>" type="text" value="<?php echo esc_attr(@$instance["table2list2"]); ?>" /></label>
</p>
<p><?php _e( '商品の概要、キャッチコピー、メリットなどを簡潔に入力します。（全角16文字以内で1行に収まります）', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table2list3"); ?>">
		<?php _e( '商品に関する項目 #3:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table2list3"); ?>" name="<?php echo $this->get_field_name("table2list3"); ?>" type="text" value="<?php echo esc_attr(@$instance["table2list3"]); ?>" /></label>
</p>
<p><?php _e( '商品の概要、キャッチコピー、メリットなどを簡潔に入力します。（全角16文字以内で1行に収まります）', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table2list4"); ?>">
		<?php _e( '商品に関する項目 #4:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table2list4"); ?>" name="<?php echo $this->get_field_name("table2list4"); ?>" type="text" value="<?php echo esc_attr(@$instance["table2list4"]); ?>" /></label>
</p>
<p><?php _e( '商品の概要、キャッチコピー、メリットなどを簡潔に入力します。（全角16文字以内で1行に収まります）', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table2list5"); ?>">
		<?php _e( '商品に関する項目 #5:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table2list5"); ?>" name="<?php echo $this->get_field_name("table2list5"); ?>" type="text" value="<?php echo esc_attr(@$instance["table2list5"]); ?>" /></label>
</p>
<p><?php _e( '商品の概要、キャッチコピー、メリットなどを簡潔に入力します。（全角16文字以内で1行に収まります）', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table2buy"); ?>">
		<?php _e( 'ボタンテキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table2buy"); ?>" name="<?php echo $this->get_field_name("table2buy"); ?>" type="text" value="<?php echo esc_attr(@$instance["table2buy"]); ?>" /></label>
</p>
<p><?php _e( 'ボタンに表示するテキストを入力します。', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table2url"); ?>">
		<?php _e( 'ボタンリンク URL:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table2url"); ?>" name="<?php echo $this->get_field_name("table2url"); ?>" type="text" value="<?php echo esc_attr(@$instance["table2url"]); ?>" /></label>
</p>
<p><?php _e( 'ボタンのリンク先のURLを入力します。', 'lang'); ?></p>

<hr />

<h3><?php _e( 'テーブル #3', 'lang'); ?></h3>
<p>
	<label for="<?php echo $this->get_field_id("table3title"); ?>">
		<?php _e( '商品名:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table3title"); ?>" name="<?php echo $this->get_field_name("table3title"); ?>" type="text" value="<?php echo esc_attr(@$instance["table3title"]); ?>" /></label>
</p>
<p><?php _e( '商品名やサービス名を記入します。', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table3price"); ?>">
		<?php _e( '価格:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table3price"); ?>" name="<?php echo $this->get_field_name("table3price"); ?>" type="text" value="<?php echo esc_attr(@$instance["table3price"]); ?>" /></label>
</p>
<p><?php _e( '商品やサービスの価格を入力します。(下付き文字を使用する場合は &lt;span&gt;タグでテキストを挟みます).', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table3txt"); ?>">
		<?php _e( 'テキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table3txt"); ?>" name="<?php echo $this->get_field_name("table3txt"); ?>" type="text" value="<?php echo esc_attr(@$instance["table3txt"]); ?>" /></label>
</p>
<p><?php _e( '商品のキャッチコピーなどのテキストを入力します。(&lt;span&gt;タグでテキストを挟むと太字になります).', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table3list1"); ?>">
		<?php _e( '商品に関する項目 #1:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table3list1"); ?>" name="<?php echo $this->get_field_name("table3list1"); ?>" type="text" value="<?php echo esc_attr(@$instance["table3list1"]); ?>" /></label>
</p>
<p><?php _e( '商品の概要、キャッチコピー、メリットなどを簡潔に入力します。（全角16文字以内で1行に収まります）', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table3list2"); ?>">
		<?php _e( '商品に関する項目 #2:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table3list2"); ?>" name="<?php echo $this->get_field_name("table3list2"); ?>" type="text" value="<?php echo esc_attr(@$instance["table3list2"]); ?>" /></label>
</p>
<p><?php _e( '商品の概要、キャッチコピー、メリットなどを簡潔に入力します。（全角16文字以内で1行に収まります）', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table3list3"); ?>">
		<?php _e( '商品に関する項目 #3:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table3list3"); ?>" name="<?php echo $this->get_field_name("table3list3"); ?>" type="text" value="<?php echo esc_attr(@$instance["table3list3"]); ?>" /></label>
</p>
<p><?php _e( '商品の概要、キャッチコピー、メリットなどを簡潔に入力します。（全角16文字以内で1行に収まります）', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table3list4"); ?>">
		<?php _e( '商品に関する項目 #4:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table3list4"); ?>" name="<?php echo $this->get_field_name("table3list4"); ?>" type="text" value="<?php echo esc_attr(@$instance["table3list4"]); ?>" /></label>
</p>
<p><?php _e( '商品の概要、キャッチコピー、メリットなどを簡潔に入力します。（全角16文字以内で1行に収まります）', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table3list5"); ?>">
		<?php _e( '商品に関する項目 #5:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table3list5"); ?>" name="<?php echo $this->get_field_name("table3list5"); ?>" type="text" value="<?php echo esc_attr(@$instance["table3list5"]); ?>" /></label>
</p>
<p><?php _e( '商品の概要、キャッチコピー、メリットなどを簡潔に入力します。（全角16文字以内で1行に収まります）', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table3buy"); ?>">
		<?php _e( 'ボタンテキスト:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table3buy"); ?>" name="<?php echo $this->get_field_name("table3buy"); ?>" type="text" value="<?php echo esc_attr(@$instance["table3buy"]); ?>" /></label>
</p>
<p><?php _e( 'ボタンに表示するテキストを入力します。', 'lang'); ?></p>

<p>
	<label for="<?php echo $this->get_field_id("table3url"); ?>">
		<?php _e( 'ボタンリンク URL:', 'lang' ); ?>
		<input class="widefat" id="<?php echo $this->get_field_id("table3url"); ?>" name="<?php echo $this->get_field_name("table3url"); ?>" type="text" value="<?php echo esc_attr(@$instance["table3url"]); ?>" /></label>
</p>
<p><?php _e( 'ボタンのリンク先のURLを入力します。', 'lang'); ?></p>

<hr />



	<?php
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("wp_table");') );
	
	



	/**
	 * Custom Code Widget #1
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

	class wp_widg1 extends WP_Widget {
		function wp_widg1() {
			$widget_ops = array(
				'classname' => 'wp_widg1',
				'description' => '任意でバナー広告などを追加できます.'
			);
			parent::__construct(
				'wp_widg1',
				'[Grazioso] カスタムコード #1',
				$widget_ops
			);
		}
		function widget( $args, $instance ) {
			extract($args);
			$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : @$instance['title'], $instance );
			$text = apply_filters( 'widget_execphp', @$instance['text'], $instance );
		?>
		<section class="group <?php echo $widget_id; ?>"><!-- section -->
			<div class="container-widget-1"><!-- container -->
				<div class="content-widget-1"><!-- content -->
					<div class="row col-3-3 centered wow animated fadeInDown" data-wow-offset="100"><!-- col -->
						<?php echo @$instance['filter'] ? wpautop($text) : $text; ?>
					</div><!-- /col -->
				</div><!-- /content -->
			</div><!-- /container -->
		</section><!-- /section -->
		<?php
			}
			function update( $new_instance, $old_instance ) {
				$instance = $old_instance;
				@$instance['title'] = strip_tags($new_instance['title']);
				if ( current_user_can('unfiltered_html') )
					@$instance['text'] =  $new_instance['text'];
				else
					@$instance['text'] = stripslashes( wp_filter_post_kses( $new_instance['text'] ) );
					@$instance['filter'] = isset($new_instance['filter']);
					return $instance;
				}
				function form( $instance ) {
					$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
					$title = strip_tags(@$instance['title']);
					$text = format_to_edit(@$instance['text']);
			?>
			<p>
				<label for="<?php echo $this->get_field_id("text"); ?>">
					<?php _e( 'コンテンツ:', 'lang' ); ?>
					<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
				</label>
			</p>
			<p><?php _e( '広告のバナーコードなどを貼付します。（HTMLタグ、Javascriptコードなどが使用できます）', 'lang'); ?></p>
			<hr />
		<?php
			}
		}
	add_action('widgets_init', create_function('', 'return register_widget("wp_widg1");'));
	
	
	
	

	/**
	 * Custom Code Widget #2
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

	class wp_widg2 extends WP_Widget {
		function wp_widg2() {
			$widget_ops = array(
				'classname' => 'wp_widg2',
				'description' => '任意でバナー広告などを追加できます.'
			);
			parent::__construct(
				'wp_widg2',
				'[Grazioso] カスタムコード #2',
				$widget_ops
			);
		}
		function widget( $args, $instance ) {
			extract($args);
			$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : @$instance['title'], $instance );
			$text = apply_filters( 'widget_execphp', @$instance['text'], $instance );
		?>
		<section class="group <?php echo $widget_id; ?>"><!-- section -->
			<div class="container-widget-2"><!-- container -->
				<div class="content-widget-2"><!-- content -->
					<div class="row col-3-3 centered wow animated fadeInDown" data-wow-offset="100"><!-- col -->
						<?php echo @$instance['filter'] ? wpautop($text) : $text; ?>
					</div><!-- /col -->
				</div><!-- /content -->
			</div><!-- /container -->
		</section><!-- /section -->
		<?php
			}
			function update( $new_instance, $old_instance ) {
				$instance = $old_instance;
				@$instance['title'] = strip_tags($new_instance['title']);
				if ( current_user_can('unfiltered_html') )
					@$instance['text'] =  $new_instance['text'];
				else
					@$instance['text'] = stripslashes( wp_filter_post_kses( $new_instance['text'] ) );
					@$instance['filter'] = isset($new_instance['filter']);
					return $instance;
				}
				function form( $instance ) {
					$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
					$title = strip_tags(@$instance['title']);
					$text = format_to_edit(@$instance['text']);
			?>
			<p>
				<label for="<?php echo $this->get_field_id("text"); ?>">
					<?php _e( 'コンテンツ:', 'lang' ); ?>
					<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
				</label>
			</p>
			<p><?php _e( '広告のバナーコードなどを貼付します。（HTMLタグ、Javascriptコードなどが使用できます）', 'lang'); ?></p>
			<hr />
		<?php
			}
		}
	add_action('widgets_init', create_function('', 'return register_widget("wp_widg2");'));
	
	
	
	
	
	/**
	 * Custom Code Widget #3
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/

	class wp_widg3 extends WP_Widget {
		function wp_widg3() {
			$widget_ops = array(
				'classname' => 'wp_widg3',
				'description' => '任意でバナー広告などを追加できます.'
			);
			parent::__construct(
				'wp_widg3',
				'[Grazioso] カスタムコード #3',
				$widget_ops
			);
		}
		function widget( $args, $instance ) {
			extract($args);
			$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : @$instance['title'], $instance );
			$text = apply_filters( 'widget_execphp', @$instance['text'], $instance );
		?>
		<section class="group <?php echo $widget_id; ?>"><!-- section -->
			<div class="container-widget-3"><!-- container -->
				<div class="content-widget-3"><!-- content -->
					<div class="row col-3-3 centered wow animated fadeInDown" data-wow-offset="100"><!-- col -->
						<?php echo @$instance['filter'] ? wpautop($text) : $text; ?>
					</div><!-- /col -->
				</div><!-- /content -->
			</div><!-- /container -->
		</section><!-- /section -->
		<?php
			}
			function update( $new_instance, $old_instance ) {
				$instance = $old_instance;
				@$instance['title'] = strip_tags($new_instance['title']);
				if ( current_user_can('unfiltered_html') )
					@$instance['text'] =  $new_instance['text'];
				else
					@$instance['text'] = stripslashes( wp_filter_post_kses( $new_instance['text'] ) );
					@$instance['filter'] = isset($new_instance['filter']);
					return $instance;
				}
				function form( $instance ) {
					$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
					$title = strip_tags(@$instance['title']);
					$text = format_to_edit(@$instance['text']);
			?>
			<p>
				<label for="<?php echo $this->get_field_id("text"); ?>">
					<?php _e( 'コンテンツ:', 'lang' ); ?>
					<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
				</label>
			</p>
			<p><?php _e( '広告のバナーコードなどを貼付します。（HTMLタグ、Javascriptコードなどが使用できます）', 'lang'); ?></p>
			<hr />
		<?php
			}
		}
	add_action('widgets_init', create_function('', 'return register_widget("wp_widg3");'));
	
	
	
	
	
	
	
?>