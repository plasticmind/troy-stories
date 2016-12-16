jQuery(function($){
	$('.site-pagination').hide();
	$('.story-list').after( '<div class="load-more"><span>Load more stories</span></div>' );

	var button = $('.load-more');
	var page = 2;
	var loading = false;

	$('body').on('click', '.load-more', function(){
		if( ! loading ) {
			loading = true;
			var data = {
				action: 'pm_ajax_load_more',
				nonce: pmloadmore.nonce,
				page: page,
				query: pmloadmore.query,
			};
			$.post(pmloadmore.url, data, function(res) {
				if( res.success) {
					$('.story-list').append( res.data );
					$('.story-list').after( button );
					page = page + 1;
					loading = false;
				} else {
					// console.log(res);
				}
			}).fail(function(xhr, textStatus, e) {
				// console.log(xhr.responseText);
			});
		}
	});
});
