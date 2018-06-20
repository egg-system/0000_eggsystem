// Back to top button

jQuery(document).ready(function(){
	var pxShow = 300;
	var fadeInTime = 1000;
	var fadeOutTime = 1000;
	var scrollSpeed = 600;
	jQuery(window).scroll(function(){
		if(jQuery(window).scrollTop() >= pxShow){
			jQuery("#backtotop").fadeIn(fadeInTime);
		}else{
			jQuery("#backtotop").fadeOut(fadeOutTime);
		}
	});
	 
	jQuery('#backtotop a').click(function(){
		jQuery('html, body').animate({scrollTop:0}, scrollSpeed); 
		return false; 
	}); 
});