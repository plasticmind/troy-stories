jQuery(document).ready(function($) {

	$('.site-header .logo a').css('opacity','1');

	if(!Cookies.get('returning_visitor')) {

		document.body.className += ' ' + 'animate';

		var paths = $('.site-header .logo path:not(defs path)');
		paths.each(function(i, e) {
		    e.style.strokeDasharray = e.style.strokeDashoffset = e.getTotalLength();
		});
		var tl = new TimelineMax();

		var e = Power0.easeIn;
		var d = 1; 

		tl.add([
		    TweenLite.to(paths.eq(0), .3, {strokeDashoffset: 0, delay: d+0, ease: e}), // T
		    TweenLite.to(paths.eq(1), .3, {strokeDashoffset: 0, delay: d+0.4, ease: e}), // T
		    TweenLite.to(paths.eq(2), 1, {strokeDashoffset: 0, delay: d+.8, ease: e}), // ro
		    TweenLite.to(paths.eq(3), .5, {strokeDashoffset: 0, delay: d+1.9, ease: e}), // y

		    TweenLite.to(paths.eq(4), .5, {strokeDashoffset: 0, delay: d+3}), // S
		   	TweenLite.to(paths.eq(5), .15, {strokeDashoffset: 0, delay: d+3.5}), // t
		    TweenLite.to(paths.eq(6), 1, {strokeDashoffset: 0, delay: d+3.65}), // ori
		    TweenLite.to(paths.eq(7), .15, {strokeDashoffset: 0, delay: d+4.80}), // i
		    TweenLite.to(paths.eq(8), .5, {strokeDashoffset: 0, delay: d+5.0}), // es

		]).timeScale(2);

		$('.site-header .logo').mouseenter(function() { tl.pause(); });
		$('.site-header .logo').mouseleave(function() { tl.play(); });	

		Cookies.set('returning_visitor', '1', { expires: 1 });
	}


});


function resizeGridItem(item){
  grid = document.getElementsByClassName("story-list")[0];
  rowHeight = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-auto-rows'));
  rowGap = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-row-gap'));
  rowSpan = Math.ceil(((item.querySelector('.content').getBoundingClientRect().height+rowGap)/(rowHeight+rowGap))+2);
  /*console.log('rowHeight='+rowHeight+' & rowGap='+rowGap+' & rowSpan='+rowSpan+' & item.content.height='+item.querySelector('.content').getBoundingClientRect().height);*/
    item.style.gridRowEnd = "span "+rowSpan;
}

function resizeAllGridItems(){
  allItems = document.getElementsByClassName("story");
  for(x=0;x<allItems.length;x++){
    resizeGridItem(allItems[x]);
  }
}

function resizeInstance(instance){
	item = instance.elements[0];
  resizeGridItem(item);
}

if (jQuery('.story-list').length > 0) { 
	window.onload = resizeAllGridItems();
	window.addEventListener("resize", resizeAllGridItems);

	allItems = document.getElementsByClassName("story");
	for(x=0;x<allItems.length;x++){
	  imagesLoaded( allItems[x], resizeInstance);
	}

	/* Infinite Scroll */

	document.getElementsByClassName('site-pagination')[0].style.visibility = 'hidden';

	var infScroll = new InfiniteScroll( '.story-list', {
	  path: '.site-pagination a',
	  append: '.story',
	  history: false
	});

	infScroll.on( 'append', function( response, path ) { resizeAllGridItems() });


}






/*
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

*/
