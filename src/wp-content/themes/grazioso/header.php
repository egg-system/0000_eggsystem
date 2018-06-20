<!DOCTYPE html>
	<!-- HTML5 Boilerplate -->
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
	<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

		<!-- Responsive and mobile friendly stuff -->
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.5, minimum-scale=1.0" />
		<!--[if IEMobile]>
			<meta http-equiv="cleartype" content="on">
		<![endif]-->        

		<?php if ( is_home() || is_front_page() ) : ?>
		<!-- META information -->
		<meta name="keywords" content="<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['misc_metakeywords']; echo stripslashes($echo_options); ?>" />
		<meta name="description" content="<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['misc_metadesc']; echo stripslashes($echo_options); ?>" />
		<?php endif; ?>
		<?php //カテゴリーページにMETAディスクリプションを挿入
		if ( is_category() ): //カテゴリページのとき ?>
		<meta name="description" content="<?php echo get_meta_description_from_category(); ?>" />
		<?php endif; ?>
		<?php //カテゴリーページにMETAキーワードを挿入
		if ( is_category() ): //カテゴリページのとき ?>
		<meta name="keywords" content="<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['misc_metakeywords']; echo stripslashes($echo_options); ?>,<?php echo get_meta_keyword_from_category(); ?>" />
		<?php endif; ?>
		<title>
			<?php
				/*Title for tags */
				if (function_exists('is_tag') && is_tag()) {
					bloginfo('name'); echo ' &nbsp;|&nbsp; '; single_tag_title("", true); }
					/*Title for archives */   
					elseif (is_archive()) {
						bloginfo('name'); echo ' &nbsp;|&nbsp; '; wp_title(''); echo ' Archive'; }
					/*Title for search */     
					elseif (is_search()) {
						bloginfo('name'); echo ' &nbsp;|&nbsp; '; echo 'Search Results: '.wp_specialchars($s); }
					/*Title for 404 */    
					elseif (is_404()) {
						bloginfo('name'); echo ' &nbsp;|&nbsp; '; echo 'Page Not Found '; }
					/*Title for front page */
					elseif (is_home()) {
						bloginfo('name'); echo ' &nbsp;|&nbsp; '; bloginfo('description'); }				 
					/*Title for static page */
					elseif (is_page()) {
						bloginfo('name'); echo ' &nbsp;|&nbsp; '; wp_title(''); }
					/*Title for static page */
					elseif (is_single()) {
						bloginfo('name'); echo ' &nbsp;|&nbsp; '; wp_title(''); }				 
					/*Title fallback */
				else  {
				bloginfo('name'); echo ' &nbsp;|&nbsp; '; wp_title(''); }
			?>
		</title>

		<!-- Wordpress -->
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />

		<!-- RSS & Pingback -->
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<!-- Queue libraries, stylesheets & scripts -->
		<?php wp_head(); // WP_HEAD ?>
	</head>
	<body <?php body_class(); ?>>
		<?php if ( mytheme_option( 'comments_selector' ) && mytheme_option( 'comments_selector' ) != 'choice4' ) { // FACEBOOK COMMENTS (SDK) ?>
		<?php } else { ?>
			<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['comments_facebook_sdk']; echo stripslashes($echo_options); ?>
		<?php }	?>
		<div id="Top"></div>
		<div id="wrapper"><!-- wrapper -->
			<div id="container-head"><!-- container -->
				<header class="group"><!-- section -->
					<div class="row col-2-6 logoalign"><!-- col -->
						<?php sitename(); // SITENAME/LOGO ?>
					</div><!-- /col -->
					<div class="row col-4-6"><!-- col -->
						<?php menu_drop(); // DROPDOWN MENU ?>
						<?php menu_button(); // MENU BUTTON ?>
					</div><!-- /col -->
				</header><!-- /section -->
			</div><!-- /container -->
			<div class="headgap"></div>
			<div id="container-expand"><!-- container -->
				<div id="content-expand"><!-- content -->
					<div class="row col-3-3"><!-- col -->
						<?php menu_slide(); // MENU ?>
					</div><!-- /col -->
				</div><!-- /content -->
			</div><!-- /container -->