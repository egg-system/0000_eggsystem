jQuery(document).ready(function($){
    var logo_name_alias = "";
	jQuery('#upload_logo_button').click(function() {
            logo_name_alias = "logo";
		tb_show('Upload a logo', 'media-upload.php?referer=customlogo-settings&amp;type=image&amp;TB_iframe=true&amp;post_id=0', false);
		return false;
	});
        
        jQuery('#upload_logo_sp_button').click(function() {
            logo_name_alias = "logo_sp";
		tb_show('Upload a smartphone logo', 'media-upload.php?referer=customlogo-settings&amp;type=image&amp;TB_iframe=true&amp;post_id=0', false);
		return false;
	});
        
	window.send_to_editor = function(html) {
            
            console.log(html);
            
		var image_url = $('img',html).attr('src');
		jQuery('#'+logo_name_alias+'_url').val(image_url);
		tb_remove();
		jQuery('#upload_'+logo_name_alias+'_preview img').attr('src',image_url);
		jQuery('#submit_options_'+logo_name_alias+'_form').trigger('click');
	}
});