<?php
 /**
  * @package TRIAD Inc.
  * @since 1.0
 */
?>
<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'lang' ); ?></p>
		</div><!-- #comments -->
		<?php
			return;
			endif;
		?>
		<?php ?>
		<?php if ( have_comments() ) : ?>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<nav id="comment-nav-above">
					<h1 class="assistive-text"><?php _e( 'Comment navigation', 'lang' ); ?></h1>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'lang' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'lang' ) ); ?></div>
				</nav>
			<?php endif; ?>
			<ol class="commentlist">
				<?php
					wp_list_comments( array( 'callback' => 'default_wp_comment' ) );
				?>
			</ol>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<nav id="comment-nav-below">
					<h1 class="assistive-text"><?php _e( 'Comment navigation', 'lang' ); ?></h1>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'lang' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'lang' ) ); ?></div>
				</nav>
			<?php endif; ?>
		<?php
			elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'lang' ); ?></p>
	<?php endif; ?>
	<?php 
		$your_fields =  array(
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'lang' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .               '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></p>',
			'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'lang' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" /></p>',
			'comment_field' => '',
		);
		comment_form(array('fields' => $your_fields, 'title_reply' => "コメントを書く"));
	?>
</div><!-- #comments -->
