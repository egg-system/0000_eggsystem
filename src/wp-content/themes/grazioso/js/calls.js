// Initialize Typer script

jQuery(function () {
      jQuery('[data-typer-targets]').typer();
	  jQuery.typer.options.highlightSpeed = 20;
	  jQuery.typer.options.typeSpeed = 180;
	  jQuery.typer.options.clearDelay = 1000;
	  jQuery.typer.options.typeDelay = 200;
	  jQuery.typer.options.clearOnHighlight = true;
	  jQuery.typer.options.typerInterval = 2000;
    });

// Dropdown div expanders

jQuery(document).ready(function(){
	jQuery("#expand_menu").click(function(){
		jQuery("#container-expand").slideToggle();
	});
});

jQuery(document).ready(function(){
	jQuery("#expand_comments").click(function(){
		jQuery("#container-expand-comments").slideToggle();
	});
});
