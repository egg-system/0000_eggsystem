<?php 
 /**
  * @package TRIAD Inc.
  * @since 1.0
 */
 
	function head_inject() {
		$options = get_option( 'mytheme_options' );
		
		$widget_typer_bgcolor = $options['widget_typer_bgcolor'];
		$widget_typer_pcolor = $options['widget_typer_pcolor'];
		$widget_typer_spancolor = $options['widget_typer_spancolor'];
		
		$widget_announce_bgcolor = $options['widget_announce_bgcolor'];
		$widget_announce_pcolor = $options['widget_announce_pcolor'];
		
		$widget_announce2_bgcolor = $options['widget_announce2_bgcolor'];
		$widget_announce2_pcolor = $options['widget_announce2_pcolor'];

		$widget_blog_bgcolor = $options['widget_blog_bgcolor'];
		$widget_blog_altcolor = $options['widget_blog_altcolor'];
		$widget_blog_highlightcolor = $options['widget_blog_highlightcolor'];
		$widget_blog_pcolor = $options['widget_blog_pcolor'];

		$widget_youtube_bgcolor = $options['widget_youtube_bgcolor'];
		
		$widget_action_bgcolor = $options['widget_action_bgcolor'];
		$widget_action_pcolor = $options['widget_action_pcolor'];
		$widget_action_formcolor = $options['widget_action_formcolor'];
		$widget_action_pformcolor = $options['widget_action_pformcolor'];
		
		$widget_team_bgcolor = $options['widget_team_bgcolor'];
		$widget_team_pcolor = $options['widget_team_pcolor'];
		$widget_team_overlaycolor = $options['widget_team_overlaycolor'];
		
		$widget_gallery_bgcolor = $options['widget_gallery_bgcolor'];
		$widget_gallery_pcolor = $options['widget_gallery_pcolor'];
		$widget_gallery_overlaycolor = $options['widget_gallery_overlaycolor'];
		
		$widget_grid_bgcolor = $options['widget_grid_bgcolor'];
		$widget_grid_pcolor = $options['widget_grid_pcolor'];
		
		$widget_table_bgcolor = $options['widget_table_bgcolor'];
		$widget_table_tablecolor = $options['widget_table_tablecolor'];
		$widget_table_sepcolor = $options['widget_table_sepcolor'];
		$widget_table_titlecolor = $options['widget_table_titlecolor'];
		$widget_table_pcolor = $options['widget_table_pcolor'];
		$widget_table_listbgcolor = $options['widget_table_listbgcolor'];
		$widget_table_listpcolor = $options['widget_table_listpcolor'];
		$widget_table_listsepcolor = $options['widget_table_listsepcolor'];
		$widget_table_buttonbgcolor = $options['widget_table_buttonbgcolor'];
		//$widget_table_buttonpcolor = $options['widget_table_buttonpcolor'];
		$widget_table_buttonhovercolor = $options['widget_table_buttonhovercolor'];
		
		$sitename_color = $options['sitename_color'];

		/* add 2015.6.29 by TRIAD Inc. */
		$under_page_post_title_bg_color = @$options['under_page_post_title_bg_color'];
		$under_page_post_title_color    = @$options['under_page_post_title_color'];
		/* --- */
		
		$menu_drop_bgcolor = $options['menu_drop_bgcolor'];
		$menu_drop_pcolor = $options['menu_drop_pcolor'];
		$menu_drop_hover_bgcolor = $options['menu_drop_hover_bgcolor'];
		$menu_drop_hover_pcolor = $options['menu_drop_hover_pcolor'];
		$menu_drop_active_bgcolor = $options['menu_drop_active_bgcolor'];
		$menu_drop_active_pcolor = $options['menu_drop_active_pcolor'];
		
		$widget_widget_bgcolor = $options['widget_widget_bgcolor'];
		$widget_widget_pcolor = $options['widget_widget_pcolor'];
		$widget_widget_list_bgcolor = $options['widget_widget_list_bgcolor'];
		$widget_widget_list_pcolor = $options['widget_widget_list_pcolor'];
		$widget_widget_list_hover_bgcolor = $options['widget_widget_list_hover_bgcolor'];
		$widget_widget_list_hover_pcolor = $options['widget_widget_list_hover_pcolor'];
		
		$tooltip_bgcolor = $options['tooltip_bgcolor'];
		$tooltip_pcolor = $options['tooltip_pcolor'];
		
		$bttb_color = $options['bttb_color'];
		
		$menu_resp_bgcolor = $options['menu_resp_bgcolor'];
		$menu_resp_pcolor = $options['menu_resp_pcolor'];
		$menu_resp_alt_bgcolor = $options['menu_resp_alt_bgcolor'];
		$menu_resp_hover_bgcolor = $options['menu_resp_hover_bgcolor'];
		$menu_resp_hover_pcolor = $options['menu_resp_hover_pcolor'];
		
		$footer_bgcolor = $options['footer_bgcolor'];
		$footer_pcolor = $options['footer_pcolor'];
		$footer_link_color = $options['footer_link_color'];
		$footer_link_hover_color = $options['footer_link_hover_color'];
		
		$header_bgcolor = $options['header_bgcolor'];
		if(empty($header_bgcolor)) {
		    $header_bgcolor = "ffffff";
		}
		
		$rgba["r"] = hexdec(substr($header_bgcolor, 0, 2));
		$rgba["g"] = hexdec(substr($header_bgcolor, 2, 2));
		$rgba["b"] = hexdec(substr($header_bgcolor, 4, 2));
		
		$header_bgalpha = $options['header_bgalpha'];
		if($header_bgalpha!=0 && empty($header_bgalpha)) {
		    $header_bgalpha = 100;
		}
		$rgba["a"] = ($header_bgalpha/100);
		
		
		$header_background = "rgba({$rgba["r"]},{$rgba["g"]},{$rgba["b"]},{$rgba["a"]})";
		
		$header_sepcolor = $options['header_sepcolor'];
		
		$pagination_bgcolor = $options['pagination_bgcolor'];
		$pagination_pcolor = $options['pagination_pcolor'];
		$pagination_hicolor = $options['pagination_hicolor'];
		
		$jetpack_hicolor = $options['jetpack_hicolor'];
		
		$widget1_bgcolor = $options['widget1_bgcolor'];
		$widget1_pcolor = $options['widget1_pcolor'];
		
		$widget2_bgcolor = $options['widget2_bgcolor'];
		$widget2_pcolor = $options['widget2_pcolor'];
		
		$widget3_bgcolor = $options['widget3_bgcolor'];
		$widget3_pcolor = $options['widget3_pcolor'];
		
		/* add 2015.6.22 by TRIAD Inc. */
		$archive_post_title_color  = @$options['archive_post_title_color'];
		$archive_next_button_color = @$options['archive_next_button_color'];
		/* --- */

		$custom_css = $options['custom_css'];
		echo "<style>
		
		.container-typer {
			background: #$widget_typer_bgcolor;
		}
		
		.content-typer h1 {
			color: #$widget_typer_pcolor;
		}
		
		.content-typer span.colored {
			color: #$widget_typer_spancolor;
		}
		
		.container-announce {
			background: #$widget_announce_bgcolor;
		}
		
		.content-announce h1,
		.content-announce p {
			color: #$widget_announce_pcolor;
		}

		/* --- Modify TRIAD Inc. / 2015.6.29 --- */
		.container-innerlead {
			background: #$under_page_post_title_bg_color;
		}
		.content-innerlead * {
			color: #$under_page_post_title_color !important;
		}
		/* --- */

		.container-announce2 {
			background: #$widget_announce2_bgcolor;
		}
		
		.content-announce2 h1,
		.content-announce2 p {
			color: #$widget_announce2_pcolor;
		}
		
		/* --- Modify TRIAD Inc. / 2015.6.29 --- */
		.container-innerlead2 {
			background: #$under_page_post_title_bg_color;
		}
		/* --- */
		
		.container-blog {
			background: #$widget_blog_bgcolor;
		}
		
		.container-blog:nth-of-type(2n+0) {
			background: #$widget_blog_altcolor;
		}
		
		.container-blog:nth-of-type(2n+0) .circular {
			background: #$widget_blog_bgcolor;
			border: 1em solid #$widget_blog_bgcolor;
		}
		
		.circular {
			background: #$widget_blog_altcolor;
			border: 1em solid #$widget_blog_altcolor;
		}
		
		.content-blog p {
			color: #$widget_blog_pcolor;
		}
		
		.content-blog .overlay span {
			background: #$widget_blog_highlightcolor;
		}
		
		span.colored {
			color: #$widget_blog_highlightcolor;
		}
		
		.container-youtube,
		.list_container ul li:hover {
			background: #$widget_youtube_bgcolor;
		}
		
		.container-action {
			background: #$widget_action_bgcolor;
		}
		
		.cform {
			background: #$widget_action_formcolor;
			color: #$widget_action_pformcolor;
		}
		
		.wpcf7-submit,
		div.wpcf7 p {
			color: #$widget_action_pformcolor;
		}
		
		.wpcf7-submit:hover {
			background: #$widget_action_pformcolor;
			color: #$widget_action_formcolor;
		}
		
		.content-action h1,
		.content-action p {
			color: #$widget_action_pcolor;
		}
		
		.container-team {
			background: #$widget_team_bgcolor;
		}
		
		.content-team-title h1 {
			color: #$widget_team_pcolor;
		}
		
		.content-team .overlay span:hover {
			background: #$widget_team_overlaycolor;
		}
		
		.container-gallery {
			background: #$widget_gallery_bgcolor;
		}
		
		.content-gallery-title h1 {
			color: #$widget_gallery_pcolor;
		}
		
		.content-gallery .overlay span:hover {
			background: #$widget_gallery_overlaycolor;
		}
		
		.container-grid {
			background: #$widget_grid_bgcolor;
		}
		
		.content-grid h3,
		.content-grid p,
		.content-grid .fa {
			color: #$widget_grid_pcolor;
		}
		
		.container-table {
			background: #$widget_table_bgcolor;
		}
		
		.table_top,
		.table_bottom {
			background: #$widget_table_tablecolor;
		}
		
		.table_top h3,
		.table_top span.price {
			border-bottom: 1px solid #$widget_table_sepcolor;
		}
		
		.table_top h3,
		.table_top span.price,
		.table_top p span,
		.table_bottom h4 {
			color: #$widget_table_titlecolor;
		}
		
		.table_top p {
			color: #$widget_table_pcolor;
		}
		
		.table_mid {
			background: #$widget_table_listbgcolor;
		}
		
		.table_mid ul li {
			color: #$widget_table_listpcolor;
		}
		
		.table_mid ul li {
			border-bottom: 1px solid #$widget_table_listsepcolor;
		}
		
		.table_mid ul {
			border-top: 1px solid #$widget_table_listsepcolor;
		}
		
		.table_bottom span {
			background: #$widget_table_buttonbgcolor;
			border: 1px solid #$widget_table_buttonbgcolor;
		}
		
		.table_bottom span:hover {
			color: #$widget_table_buttonbgcolor;
		}
		
		.table_bottom span:hover {
			background: #$widget_table_buttonhovercolor;
		}
		
		header h1 a,
		header h1 a:visited,
		header h1 a:active,
		header h1 a:hover,
		#expand_menu {
			color: #$sitename_color;
		}
		
		.dropmenu li a, 
		.dropmenu li a:link, 
		.dropmenu li a:visited,
		.dropmenu li li a, 
		.dropmenu li li a:link, 
		.dropmenu li li a:visited,
		.dropmenu li li li a, 
		.dropmenu li li li a:link, 
		.dropmenu li li li a:visited {
			background: #$menu_drop_bgcolor;
			color: #$menu_drop_pcolor;
		}
		
		.dropmenu li a:hover, 
		.dropmenu li a:active,
		.dropmenu li li a:hover, 
		.dropmenu li li a:active,
		.dropmenu li li li a:hover, 
		.dropmenu li li li a:active {
			background: #$menu_drop_hover_bgcolor;
			color: #$menu_drop_hover_pcolor;
		}
		
		.dropmenu li ul,
		.dropmenu li li ul {
			background: #$menu_drop_bgcolor;
			border: 1px solid #$menu_drop_hover_bgcolor;
		}
		
		.dropmenu .current-post-ancestor a:hover,
		.dropmenu .current-menu-ancestor a:hover,
		.dropmenu .current-menu-item a:hover,
		.dropmenu .current_page_item a:hover,
		.dropmenu .current-post-ancestor a, 
		.dropmenu .current-post-ancestor a:visited, 
		.dropmenu .current-menu-ancestor a, 
		.dropmenu .current-menu-ancestor a:visited, 
		.dropmenu .current-menu-item a, 
		.dropmenu .current-menu-item a:visited, 
		.dropmenu .current_page_item a, 
		.dropmenu .current_page_item a:visited,
		.dropmenu .current-post-ancestor li a, 
		.dropmenu .current-post-ancestor li a:visited, 
		.dropmenu .current-menu-ancestor li a, 
		.dropmenu .current-menu-ancestor li a:visited, 
		.dropmenu .current-menu-item li a, 
		.dropmenu .current-menu-item li a:visited, 
		.dropmenu .current_page_item li a, 
		.dropmenu .current_page_item li a:visited {
			background: #$menu_drop_active_bgcolor !important;
			color: #$menu_drop_active_pcolor !important;
		}
		
		.container-widget {
			background: #$widget_widget_bgcolor;
		}
		
		.content-widget p,
		.content-widget .fa-6x,
		.content-widget h1 {
			color: #$widget_widget_pcolor;
		}
		
		.container-widget-1 {
			background: #$widget1_bgcolor;
		}
		
		.content-widget-1 p,
		.content-widget-1 .fa-6x,
		.content-widget-1 h1 {
			color: #$widget1_pcolor;
		}
		
		.container-widget-2 {
			background: #$widget2_bgcolor;
		}
		
		.content-widget-2 p,
		.content-widget-2 .fa-6x,
		.content-widget-2 h1 {
			color: #$widget2_pcolor;
		}
		
		.container-widget-3 {
			background: #$widget3_bgcolor;
		}
		
		.content-widget-3 p,
		.content-widget-3 .fa-6x,
		.content-widget-3 h1 {
			color: #$widget3_pcolor;
		}
		
		.widget li a,
		.widget li a:visited,
		.content-widget li a,
		.content-widget li a:visited {
			background: #$widget_widget_list_bgcolor;
			color: #$widget_widget_list_pcolor;
		}

		.content-widget li a:hover, 
		.content-widget li a:active {
			background: #$widget_widget_list_hover_bgcolor;
			color: #$widget_widget_list_hover_pcolor;
		}

		.ui-tooltip {
			background: #$tooltip_bgcolor;
		}
		
		body .ui-tooltip {
			color: #$tooltip_pcolor;
		}
		
		#backtotop a {
			color: #$bttb_color;
		}
		
		.responsive li a, 
		.responsive li a:link, 
		.responsive li a:visited {
			background: #$menu_resp_bgcolor;
			color: #$menu_resp_pcolor;
		}
		
		.responsive li li a, 
		.responsive li li a:link, 
		.responsive li li a:visited,
		.responsive li li li a, 
		.responsive li li li a:link, 
		.responsive li li li a:visited {
			background: #$menu_resp_alt_bgcolor;
			color: #$menu_resp_pcolor;
		}
		
		.responsive li a:hover, 
		.responsive li a:active,
		.responsive li li a:hover, 
		.responsive li li a:active,
		.responsive li li li a:hover, 
		.responsive li li li a:active {
			background: #$menu_resp_hover_bgcolor;
			color: #$menu_resp_hover_pcolor;
		}
		
		#container-footer {
			background: #$footer_bgcolor;
		}
		
		footer p {
			color: #$footer_pcolor;
		}
		
		footer .fa,
		.footmenu li a, 
		.footmenu li a:link, 
		.footmenu li a:visited {
			color: #$footer_link_color;
		}
		
		footer .fa:hover,
		.footmenu li a:hover, 
		.footmenu li a:active {
			color: #$footer_link_hover_color;
		}
		
		#container-head {
			background: $header_background;
			border-bottom: 1px solid #$header_sepcolor;
		}
		
		.container-innerpagination {
			background: #$pagination_bgcolor;
		}
		
		.pagination span,
		.pagination a {
			color: #$pagination_pcolor;
			border: 1px solid #$pagination_hicolor;
		}
		
		.pagination a:hover {
			background: #$pagination_hicolor;
			color: #$pagination_pcolor !important;
			border: 1px solid #$pagination_hicolor;
		}
		
		.pagination .current {
			background: #$pagination_hicolor;
			color: #$pagination_pcolor;
			border: 1px solid #$pagination_hicolor;
		}
		
		.gallery-item img:hover {
			border: 1em solid #$jetpack_hicolor !important;
		}
		
			/*  Archive page === */
			.container-archive .pad_post h2 a {
				color: #$archive_post_title_color;
			}
			span.rmore span {
				color: #$archive_next_button_color;
				border-color: #$archive_next_button_color;
			}
			span.rmore span:hover{
				background-color: #$archive_next_button_color;
			}

			/*  CUSTOM === */
			
			$custom_css
			
		</style>";
		
		if ( mytheme_option( 'bttb_shadow' ) && mytheme_option( 'bttb_shadow' ) == 'choice2' ) {		
			echo "<style>
				#backtotop {
					text-shadow: 1px 1px #000000;
				}
			</style>";
		}
		
                $is_responsive_select = false;
		if ( mytheme_option( 'responsive_select' ) && mytheme_option( 'responsive_select' ) == 'choice2' ) {		
			echo "<style>
                                @media only screen and (max-width: 720px) {
                                    #expand_menu {
                                        right: 0px !important;
                                    }
                                    .logoalign{
                                        float: left !important;
                                    }
                                }
			</style>";
                        $is_responsive_select = true;
		}
		
		if ( mytheme_option( 'responsive_select' ) && mytheme_option( 'responsive_select' ) == 'choice3' ) {		
			echo "<style>
                                @media only screen and (max-width: 720px) {
                                    #expand_menu {
                                        left: 0px !important;
                                    }
                                    .logoalign{
                                        float: right !important;
                                    }
                                }
				
			</style>";
                        $is_responsive_select = true;
		}
                
                if ( !$is_responsive_select ) {		
			echo "<style>
                                @media only screen and (max-width: 720px) {
                                
                                    #expand_menu {
                                        left: 0px !important;
                                    }
                                    .logoalign{
                                        float: right !important;
                                    }
                                }
			</style>";
		}
		
		if ( mytheme_option( 'responsive_sticky' ) && mytheme_option( 'responsive_sticky' ) == 'choice1' ) {		
			echo "<style>
				#container-head,
				#container-expand {
					position: relative !important;
				}
				.headgap {
					padding-top: 0em;
				}
			</style>";
		}

		
	}
	add_action( 'wp_head', 'head_inject' );

?>