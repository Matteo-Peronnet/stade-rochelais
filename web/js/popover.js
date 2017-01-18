$(function(){
    // Enables popover
    
    $('[data-toggle="popover"]').popover({
	   'trigger':'hover'
	   ,'container': 'body'
	   ,'html':true
	});
    		var element = document.querySelector('[data-toggle="popover"]');
    		$('[data-toggle="popover"]').on( "mouseover", function( event ) {
    		var pageY = event.pageY;
				console.log(pageY);
	  $('.popover').css('top', pageY-90 + 'px')
	});
});