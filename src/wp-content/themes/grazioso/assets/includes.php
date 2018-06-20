<?php 
 /**
  * @package TRIAD Inc.
  * @since 1.0
 */
 


		
	/**
	 * Default commenting system
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	if ( ! function_exists( 'default_wp_comment' ) ) :
		function default_wp_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'lang' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '<i class="fa fa-pencil-square-o fa-lg"></i>', 'lang' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
		break;
		default :
	?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 80;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 80;
							echo get_avatar( $comment, $avatar_size );
							printf( __( '%1$s &nbsp; (%2$s)', 'lang' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s">%3$s</a>',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							get_comment_time( 'c' ),
							sprintf( __( '%1$s at %2$s', 'lang' ), get_comment_date(), get_comment_time() )
						)
						);
					?>
					<?php edit_comment_link( __( '<i class="fa fa-pencil-square-o fa-lg"></i>', 'lang' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'lang' ); ?></em>
					<br />
				<?php endif; ?>
			</div>
			<div class="comment-content"><?php comment_text(); ?></div>
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<i class="fa fa-reply fa-lg"></i>', 'lang' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</div><!-- #comment-## -->
	<?php
		break;
		endswitch;
		}
	endif;
	
	
	
	
	/**
	 * Create Responsive Menu Button
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	function comments_toggle() { ?>
		<a id="expand_comments" title="<?php _e( 'コメントを表示する', 'lang'); ?>">
			<i class="fa fa-comments-o fa-6x wow animated fadeInDown" data-wow-offset="100" data-wow-delay=".5s"></i>
		</a>
	<?php }
	
	
	
	
	
	/**
	 * Display Chosen Commenting System
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	function comments_display() { ?>
		<?php if ( mytheme_option( 'comments_selector' ) && mytheme_option( 'comments_selector' ) == 'choice1' ) { // DISQUS COMMENTS ?>
			<h1><span class="bordered"><?php _e('コメント', 'lang'); ?></span></h1>
			<?php if ( mytheme_option( 'comments_disqus' ) && mytheme_option( 'comments_disqus' ) != '' ) { ?>
				<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['comments_disqus']; echo stripslashes($echo_options); ?>
			<?php } else { ?>
				<p><?php _e('Disqus univeral code is missing from theme options.', 'lang'); ?></p>
			<?php } ?>
		<?php } elseif ( mytheme_option( 'comments_selector' ) && mytheme_option( 'comments_selector' ) == 'choice2' ) { // WP COMMENTS ?>		
			<h1><span class="bordered"><?php _e('コメント', 'lang'); ?></span></h1>
			<?php comments_template(); // COMMENTS TEMPLATE ?>
		<?php } elseif ( mytheme_option( 'comments_selector' ) && mytheme_option( 'comments_selector' ) == 'choice3' ) { // JETPACK COMMENTS ?>		
			<h1><span class="bordered"><?php _e('コメント', 'lang'); ?></span></h1>
			<?php comments_template(); // COMMENTS TEMPLATE ?>
		<?php } elseif ( mytheme_option( 'comments_selector' ) && mytheme_option( 'comments_selector' ) == 'choice4' ) { // FB COMMENTS ?>
			<h1><span class="bordered"><?php _e('コメント', 'lang'); ?></span></h1>
			<?php if ( mytheme_option( 'comments_facebook' ) && mytheme_option( 'comments_facebook' ) != '' ) { ?>
				<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['comments_facebook']; echo stripslashes($echo_options); ?>
			<?php } else { ?>
				<p><?php _e('Facebook comments code is missing from theme options.', 'lang'); ?></p>
			<?php } ?>
		<?php } elseif ( mytheme_option( 'comments_selector' ) && mytheme_option( 'comments_selector' ) == 'choice5' ) { // LIVEFYRE COMMENTS ?>
			<h1><span class="bordered"><?php _e('コメント', 'lang'); ?></span></h1>
			<?php if ( mytheme_option( 'comments_livefyre' ) && mytheme_option( 'comments_livefyre' ) != '' ) { ?>
				<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['comments_livefyre']; echo stripslashes($echo_options); ?>
			<?php } else { ?>
				<p><?php _e('LiveFyre comments code is missing from theme options.', 'lang'); ?></p>
			<?php } ?>
		<?php } ?>
	<?php }





	/**
	 * Prevent any 404s on pagination links
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0


	function remove_page_from_query_string($query_string) {
		if ($query_string['name'] == 'page' && isset($query_string['page'])) {
			unset($query_string['name']);
			list($delim, $page_index) = split('/', $query_string['page']);
			$query_string['paged'] = $page_index;
		}
		return $query_string;
	}
	add_filter('request', 'remove_page_from_query_string');
	*/	
	
	
	
	
	/**
	 * Custom archive pagination
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	function pagination($pages = '', $range = 4) {
		$showitems = ($range * 2)+1;  
		global $paged;
		if(empty($paged)) $paged = 1;
		if($pages == '')
	{
	global $wp_query;
	$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
		$pages = 1;
		}
	}   
	if(1 != $pages)
	{
	echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
			if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
				for ($i=1; $i <= $pages; $i++)
			{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
		echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
		}
	}
	if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
			echo "</div>\n";
		}
	}
	function paginationlinks() { ?>
		<?php
			echo '<div class="paginationblock">'; 
			   pagination($pages = '', $range = 1);
		   echo '</div>';
		 ?>
	<?php }





	/**
	 * Date format selector function
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	function dateformat() { ?>
		<?php 
			if ( mytheme_option( 'date_format' ) && mytheme_option( 'date_format' ) == 'choice2' ) {
				if (function_exists('wp_days_ago')) { 
					wp_days_ago();
				} else { 
					echo the_time('j日 n月, Y');
				}
			} elseif ( mytheme_option( 'date_format' ) && mytheme_option( 'date_format' ) == 'choice1' ) {
				if (function_exists('wp_days_ago')) { 
					wp_days_ago();
				} else { 
					echo the_time('n月 j日, Y');
				}
			} elseif ( mytheme_option( 'date_format' ) && mytheme_option( 'date_format' ) == 'choice3' ) {
				if (function_exists('wp_days_ago')) { 
					wp_days_ago();
				} else { 
					echo the_time('Y, n月 j日');
				}
			} elseif ( mytheme_option( 'date_format' ) && mytheme_option( 'date_format' ) == 'choice4' ) {
				if (function_exists('wp_days_ago')) { 
					wp_days_ago();
				} else { 
					echo the_time('Y, j日 n月');
				}
			}
		?>
	<?php }





	/**
	 * Display the 'Back to Top' button
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	

	function backtotop() { ?>
	
	
		<?php 
			if ( mytheme_option( 'select_backtop' ) && mytheme_option( 'select_backtop' ) == 'choice1' ) {
				echo '<div id="backtotop">';
					echo '<a href="#">';
						echo '<i class="fa fa-chevron-up fa-3x animated fadeInRight"></i>';
					echo '</a>';
				echo '</div>';
			} elseif ( mytheme_option( 'select_backtop' ) && mytheme_option( 'select_backtop' ) == 'choice2' ) {
				echo '<div id="backtotop">';
					echo '<a href="#">';
						echo '<i class="fa fa-chevron-circle-up fa-3x animated fadeInRight"></i>';
					echo '</a>';
				echo '</div>';
			} elseif ( mytheme_option( 'select_backtop' ) && mytheme_option( 'select_backtop' ) == 'choice3' ) {
				echo '<div id="backtotop">';
					echo '<a href="#">';
						echo '<i class="fa fa-angle-up fa-3x animated fadeInRight"></i>';
					echo '</a>';
				echo '</div>';
			} elseif ( mytheme_option( 'select_backtop' ) && mytheme_option( 'select_backtop' ) == 'choice4' ) {
				echo '<div id="backtotop">';
					echo '<a href="#">';
						echo '<i class="fa fa-angle-double-up fa-3x animated fadeInRight"></i>';
					echo '</a>';
				echo '</div>';
			} elseif ( mytheme_option( 'select_backtop' ) && mytheme_option( 'select_backtop' ) == 'choice5' ) {
				echo '<div id="backtotop">';
					echo '<a href="#">';
						echo '<i class="fa fa-arrow-circle-o-up fa-3x animated fadeInRight"></i>';
					echo '</a>';
				echo '</div>';
			} elseif ( mytheme_option( 'select_backtop' ) && mytheme_option( 'select_backtop' ) == 'choice6' ) {
				echo '<div id="backtotop">';
					echo '<a href="#">';
						echo '<i class="fa fa-arrow-circle-up fa-3x animated fadeInRight"></i>';
					echo '</a>';
				echo '</div>';
			} elseif ( mytheme_option( 'select_backtop' ) && mytheme_option( 'select_backtop' ) == 'choice7' ) {
				echo '<div id="backtotop">';
					echo '<a href="#">';
						echo '<i class="fa fa-arrow-up fa-3x animated fadeInRight"></i>';
					echo '</a>';
				echo '</div>';
			} elseif ( mytheme_option( 'select_backtop' ) && mytheme_option( 'select_backtop' ) == 'choice8' ) {
				echo '<div id="backtotop">';
					echo '<a href="#">';
						echo '<i class="fa fa-caret-up fa-3x animated fadeInRight"></i>';
					echo '</a>';
				echo '</div>';
			} elseif ( mytheme_option( 'select_backtop' ) && mytheme_option( 'select_backtop' ) == 'choice9' ) {
				echo '<div id="backtotop">';
					echo '<a href="#">';
						echo '<i class="fa fa-caret-square-o-up fa-3x animated fadeInRight"></i>';
					echo '</a>';
				echo '</div>';
			} else {
			}
		?>
	<?php }

	
	
	
		
			
	/**
	 * Display analytics tracking code
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
		
	function analytics() { ?>	
		<?php if ( mytheme_option( 'misc_analytics' ) && mytheme_option( 'misc_analytics' ) != '' ) { ?>
			<?php $options = get_option( 'mytheme_options' ); $echo_options = $options['misc_analytics']; echo stripslashes($echo_options); ?>
		<?php } ?>
	<?php }






	/**
	 * Display custom copyright text
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
		
	function copyrighttext() { ?>
		<?php if ( mytheme_option( 'copyright' ) && mytheme_option( 'copyright' ) != '' ) { ?>
			<p><?php $options = get_option( 'mytheme_options' ); $echo_options = $options['copyright']; echo stripslashes($echo_options); ?></p>
		<?php } else { ?>
			<p><?php _e('COPYRIGHT','lang'); ?> <?php _e('&copy;','lang'); ?> <?php echo date("Y"); ?> <?php echo get_bloginfo('name'); ?><?php _e('.','lang'); ?> <?php _e('All rights reserved.','lang'); ?></p>
		<?php } ?>  
	<?php }
?>