<?php
if(!is_admin()) return;

// 値の保存処理
if(@$_POST['mode'] == 'update') {

	// 該当のキーのオプション値を保存
	foreach(@$_POST as $key=>$value){
		if(preg_match('/^widget_bg_url_(.+)$/', $key, $match)) {
                        // 画像URL保存
			$name = "widget_bgvideo_url_".$match[1];
			update_option($name, @$_POST[$name]);
                        
			// 画像URL保存
			$name = "widget_bg_url_".$match[1];
			update_option($name, @$_POST[$name]);

			// 固定(fixed)保存
			$name = "widget_bg_fixed_".$match[1];
			update_option($name, @$_POST[$name]);

			// 背景色保存
			$name = "widget_bg_color_".$match[1];
			update_option($name, @$_POST[$name]);
		}
	}

	// 保存しましたメッセージの表示
	?>
	<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
	<p><strong>設定を保存しました。</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">この通知を非表示にする</span></button></div>
	<?php
}

// 一覧のためのウィジェットリスト作成
$widget_list = get_wigdet_bg_list();
?>

<h2>ウィジェット背景設定</h2>

<form method="post" action="themes.php?page=widget-bg.php">
<input type="hidden" name="mode" value="update">

<?php foreach(array_keys($widget_list) as $type) { ?>
<section>
	<h3>
		<?php if($type=='sidebar-1') { echo 'Home'; } else if ($type=='sidebar-2') { echo 'Global'; }?>
		Widgets
	</h3>
	<table class="wp-list-table widefat fixed striped users">
		<thead>
			<tr>
				<th>登録済みのウィジェット</th>
                                <th>背景動画</th>
				<th>背景画像</th>
				<th>背景色</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($widget_list[$type] as $item) { ?>
			<tr>
				<td><?php echo $item->name; ?></td>
                                <td>
					<input type="text" id="widget_bgvideo_url" class="url" name="widget_bgvideo_url_<?php echo $item->id; ?>" value="<?php echo $item->bgvideo_url; ?>">
					<input type="button" id="widget_select_bgvideo" class="button select-image" value="動画を選択" rel="<?php echo $item->id; ?>">
				</td>
				<td>
					<input type="text" id="widget_bgimage_url" class="url" name="widget_bg_url_<?php echo $item->id; ?>" value="<?php echo $item->bg_url; ?>">
					<input type="button" id="widget_select_bgimage" class="button select-image" value="画像を選択" rel="<?php echo $item->id; ?>">
					<label><input type="checkbox" value="1" name="widget_bg_fixed_<?php echo $item->id; ?>"<?php echo $item->bg_fixed ? ' checked' : '' ?>>固定(fixed)</label>
				</td>
				<td>
					<input type="text" class="colorPicker" name="widget_bg_color_<?php echo $item->id; ?>" value="<?php echo $item->bg_color; ?>">
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</section>
<br>
<?php } ?>

<?php submit_button();?>

</form>

<script>
jQuery(function(){

	// メディアアップローダのロード
	jQuery('input#widget_select_bgimage').click(function(){
		url_input =jQuery(this).parent('td').find('input#widget_bgimage_url');
		window.send_to_editor = function(html) {
			imgurl = jQuery('img', html).attr('src');
                        url_input.val(imgurl);
			tb_remove();
		};
		formfield = url_input.attr('name');
		tb_show(null, 'media-upload.php?post_id=0&type=image&tab=library&TB_iframe=true');
		return false;
	});
        
        jQuery('input#widget_select_bgvideo').click(function(){
		url_input =jQuery(this).parent('td').find('input#widget_bgvideo_url');
		window.send_to_editor = function(html) {
			imgurl = jQuery(html).attr('href');
			url_input.val(imgurl);
			tb_remove();
		};
		formfield = url_input.attr('name');
                tb_show(null, 'media-upload.php?post_id=0&type=image&tab=library&TB_iframe=true');
		return false;
	});

	// カラーピッカーのロード
	jQuery('.colorPicker').wpColorPicker();
});
</script>
