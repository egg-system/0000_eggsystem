<?php
header('Content-type: text/css');
require('../../../../wp-load.php');
$widgets = get_wigdet_bg_list();
foreach(array_keys($widgets) as $type) {
	foreach($widgets[$type] as $item) {
?>
<?php 
        $is_video = false;
        //拡張子の取得
        $file_info = pathinfo($item->bgvideo_url);
        $img_extension = strtolower($file_info['extension']);
        if($img_extension=='mp4' || $img_extension=='mov' || $img_extension=='ogv' || $img_extension=='webm') {
?>
        video#grazioso_videobg_<?php echo $item->id; ?> {
            position: fixed;
            top: 0;
            right:0;
            bottom:0;
            min-width: 100%;
	    min-height: 100%;
	    width: auto;
	    height: auto;
            z-index: -100;
            background-size: cover;
            background-color: #000;
        }
        
        
<?php 
            $is_video = true;
        }
            
?>
        
<?php 
        $is_image = false;
        // if(!empty($item->bg_url)) {
            if($is_video) {
?>
            /* media */
            @media only screen and (max-width: 769px) {
                video#grazioso_videobg_<?php echo $item->id; ?> {
                    display: none;
                }
<?php       } ?>
        
        section.group.<?php echo $item->id; ?> {
            <?php if($item->bg_url) { ?>
            background-image: url(<?php echo $item->bg_url; ?>);
            background-size: cover;
            background-position: center;
            <?php } ?>
            <?php if($item->bg_fixed && !is_mobile()) { ?>
            background-attachment: fixed;
            <?php } ?>
            <?php if($item->bg_color) { ?>
            background-color: <?php echo $item->bg_color; ?>;
            <?php } ?>
        }
<?php   
            if($is_video) {
?>
            }
<?php       }
        $is_image = true;
    // }
?>
            
<?php   
    if($is_video && $is_image) {
?>
            @media only screen and (min-width: 769px) {
<?php
    }
?>
            
<?php   
    if($is_video) {
?>
            section.group.<?php echo $item->id; ?> {
                overflow-y: hidden;
                position: relative;
                background: transparent !important;
            }
<?php
    }
?>

<?php   
    if($is_video && $is_image) {
?>
            }
<?php
    }
?>
            
<?php if($item->bg_url || $item->bg_color || $item->bgvideo_url) { ?>
section.group.<?php echo $item->id; ?>>div {
	background: none;
}
<?php } ?>
<?php } } ?>
