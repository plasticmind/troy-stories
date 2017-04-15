jQuery(window).on('load', function(){ var $ = jQuery;
 
        var $container = $('.story-list');
	
	$container.masonry({
		// set itemSelector so .grid-sizer is not used in layout
		//itemSelector: '.grid-item',
		// use element for option
		//columnWidth: '.grid-sizer',
		//percentPosition: true
		percentPosition: true,
		itemSelector: '.story',
		transitionDuration: 0
 	});

});


