<?php
header('Content-type: text/javascript');
require('../../../../wp-load.php');
?>
jQuery(document).ready(function(){
<?php
$widgets = get_wigdet_bg_list();
foreach(array_keys($widgets) as $type) {
    foreach($widgets[$type] as $item) {
?>
<?php 
        //拡張子の取得
        $file_info = pathinfo($item->bgvideo_url);
        $img_extension = strtolower($file_info['extension']);
        if($img_extension=='mp4' || $img_extension=='mov' || $img_extension=='ogv' || $img_extension=='webm') {
?>
            jQuery('section.group.<?php echo $item->id; ?>').append(
                '<video autoplay loop id="grazioso_videobg_<?php echo $item->id; ?>">' + 
                '    <source src="<?php echo $item->bgvideo_url; ?>" type="video/mp4">' +
                '</video>'
            );
<?php 
        }
    }
}
?>
});