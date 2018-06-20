<?php
/*
Plugin Name:Fixpage TitleBackground
Description: 投稿または固定ページ毎にタイトル背景を設定するプラグインです。
Version: 0.0.1
Author:
*/

if ( !defined( 'FIXPAGE_TILE_BACKGROUND_DELETE_SETTINGS' ) )
	define( 'FIXPAGE_TILE_BACKGROUND_DELETE_SETTINGS', true );

define( 'FIXPAGE_TILE_BACKGROUND_CUSTOM_FIELD_NAME', '_background_id' );

class FixPage_Title_Background {

	function __construct() {
		if ( function_exists( 'register_uninstall_hook' ) ) {
			register_uninstall_hook( __FILE__, 'FixPage_Title_Background::uninstall' );
		}
		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
	}

	public static function uninstall() {
		if ( FIXPAGE_TILE_BACKGROUND_DELETE_SETTINGS ) {
			delete_post_meta_by_key( FIXPAGE_TILE_BACKGROUND_CUSTOM_FIELD_NAME );
		}
	}

	function plugins_loaded() {
		if ( !current_theme_supports( 'post-thumbnails' ) ) {
				add_theme_support( 'post-thumbnails' );
		}
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'wp_ajax_set-post-background', array( $this, 'set_background' ) );
		add_action( 'wp_head', array( $this, 'enqueue_style' ) );
	}

	function admin_enqueue_scripts( $hook ) {
		global $post_ID;

		if ( !in_array( $hook, array( 'post-new.php', 'post.php' ) ) )
			return;

		wp_enqueue_media( array( 'post' => ( $post_ID ? $post_ID : null ) ) );
		wp_enqueue_script( 'xo-post-background-admin', plugins_url( '/admin.js', __FILE__ ), array( 'jquery', 'media-models', 'set-post-thumbnail' ) );

		wp_enqueue_style( 'xo-post-background-admin', plugins_url( '/admin.css', __FILE__ ) );
	}

	function add_meta_boxes() {
		add_meta_box( 'postbackgrounddiv', '背景画像', array( $this, 'add_meta_box' ), null, 'side', 'low' );
	}

	function add_meta_box( $post ) {
		$id = get_post_meta( $post->ID, FIXPAGE_TILE_BACKGROUND_CUSTOM_FIELD_NAME, true );
		echo $this->post_background_html( $id );
	}

	private function post_background_html( $background_id = null ) {
		global $_wp_additional_image_sizes, $post_ID;

		$ajax_nonce = wp_create_nonce( 'set_post_background-' . $post_ID );

		$format_link = '<p class="hide-if-no-js"><a href="#" id="set-post-background"%s>%s</a></p>' . "\n";
		$content = sprintf( $format_link, '', '背景画像を設定' );

		if ( $background_id && get_post( $background_id ) ) {
			$size = isset( $_wp_additional_image_sizes['post-thumbnail'] ) ? 'post-thumbnail' : array( 266, 266 );
			$thumbnail_html = wp_get_attachment_image( $background_id, $size );
			if ( !empty( $thumbnail_html ) ) {
				$content = sprintf( $format_link, ' aria-describedby="set-post-background-desc"', $thumbnail_html );
				$content .= '<p class="hide-if-no-js howto" id="set-post-background-desc">編集または更新する画像をクリック</p>';
				$content .= '<p class="hide-if-no-js"><a href="#" id="remove-post-background" onclick="FixPageRemoveBackground(\'' . $post_ID . '\',\'' . $ajax_nonce . '\');return false;">背景画像を削除</a></p>' . "\n";
			}
		}

		$script = 'new FixPageBackgroundMediaUploader({';
		$script .= 'uploader_title: "背景画像",';
		$script .= 'uploader_button_text: "背景画像を設定",';
		$script .= 'id: "' . $background_id . '",';
		$script .= 'selector: "#set-post-background",';
		$script .= 'cb: function(attachment) { FixPageSetAsBackground(attachment.id, "' . $post_ID . '", "' . $ajax_nonce . '"); }';
		$script .= '});';

		$content .= '<script type="text/javascript">' . $script . '</script>' . "\n";

		return $content;
	}

	function set_background() {
		global $post_ID;

		$post_ID = intval( $_POST['post_id'] );
		if ( !current_user_can( 'edit_post', $post_ID ) ) {
			die( '-1' );
		}
		$background_id = intval( $_POST['background_id'] );

		check_ajax_referer( 'set_post_background-' . $post_ID );

		if ( $background_id == '-1' ) {
			delete_post_meta( $post_ID, FIXPAGE_TILE_BACKGROUND_CUSTOM_FIELD_NAME );
			die( $this->post_background_html( null ) );
		}

		if ( $background_id && get_post( $background_id ) ) {
			$thumbnail_html = wp_get_attachment_image( $background_id, 'thumbnail' );
			if ( !empty( $thumbnail_html ) ) {
				update_post_meta( $post_ID, FIXPAGE_TILE_BACKGROUND_CUSTOM_FIELD_NAME, $background_id );
				die( $this->post_background_html( $background_id ) );
			}
		}

		die( '0' );
	}

	function get_image_src( $post_id = null, $size = 'fullsize' ) {
		if ( !isset( $post_id ) ) {
			global $post;
			$post_id = $post->ID;
		}
		$attachment_id = get_post_meta( $post_id, FIXPAGE_TILE_BACKGROUND_CUSTOM_FIELD_NAME, true );
		if ( ( $attachment_id === '' ) ) {
			return false;
		}
		return wp_get_attachment_image_src( $attachment_id, $size );
	}

	function enqueue_style() {
		$image_attributes = $this->get_image_src();
		if ( $image_attributes !== false ) {
			echo '<style type="text/css">';
			echo '.container-innerlead{ background-image: url("' . $image_attributes[0] . '") !important; background-size: cover !important; background-repeat: no-repeat !important; background-position: center center !important;}';
			echo '</style>' . "\n";
		}
	}
}

$fixpage_title_background = new FixPage_Title_Background();
