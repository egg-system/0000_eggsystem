jQuery(function() {
  var $blocks = $('.animBlock.notViewed');
  var $window = $(window);

  jQuerywindow.on('scroll', function(e){
    jQueryblocks.each(function(i,elem){
      if($(this).hasClass('viewed')) 
        return;
        
      isScrolledIntoView($(this));
    });
  });
});
/* http://stackoverflow.com/a/488073/477958 */
function isScrolledIntoView(elem) {
  var docViewTop = jQuery(window).scrollTop();
  var docViewBottom = docViewTop + $(window).height();
  var elemOffset = 0;
  
  if(elem.data('offset') != undefined) {
    elemOffset = elem.data('offset');
  }
  var elemTop = $(elem).offset().top;
  var elemBottom = elemTop + $(elem).height();
  
  if(elemOffset != 0) { // custom offset is updated based on scrolling direction
    if(docViewTop - elemTop >= 0) {
      // scrolling up from bottom
      elemTop = jQuery(elem).offset().top + elemOffset;
    } else {
      // scrolling down from top
      elemBottom = elemTop + jQuery(elem).height() - elemOffset
    }
  }
  
  if((elemBottom <= docViewBottom) && (elemTop >= docViewTop)) {
    // once an element is visible exchange the classes
    jQuery(elem).removeClass('notViewed').addClass('viewed');
    
    var animElemsLeft = jQuery('.animBlock.notViewed').length;
    if(animElemsLeft == 0){
      // with no animated elements left debind the scroll event
      jQuery(window).off('scroll');
    }
  }
}