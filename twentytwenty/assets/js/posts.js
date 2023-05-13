jQuery(function($){
	$('#filter').submit(function(){
		var filter = $('#filter');
		$.ajax({
			url:filter.attr('action'),
			data:filter.serialize(), // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				filter.find('button').text('Loading Posts....'); // changing the button label
			},
			success:function(data){
				filter.find('button').text('Show Posts'); // changing the button label back
				$('#response').html(data); // insert data
			}
		});
		return false;
	});
});

(function($){

	$(document).ready(function(){
		$(document).on('click', '.js-filter-item > a', function(e){
			e.preventDefault();

			var category = $(this).data('category');

			$.ajax({
				url:wp_ajax,
				data: { action: 'filter', category: category },
				type: 'post',
				success: function(result) {
					$('.js-filter').html(result);
				},
				error: function(result) {
					console.warn(result);
				}
			});
		});
	});

})(jQuery);
