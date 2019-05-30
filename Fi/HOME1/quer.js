$(document).ready(function(){
		// when the user clicks on like
		$('.like').on('click', function(){
			var EventID = $(this).data('id');
			   var post = $(this);

			$.ajax({
				url: 'like.php',
				type: 'post',
				data: {
					'liked': 1,
					'EventID': EventID
				},
				success: function(response){
					post.parent().find('span.likes_count').text(response + " Joined");
					post.addClass('hide');
					post.siblings().removeClass('hide');
					
				}
			});
		});

		// when the user clicks on unlike
		$('.unlike').on('click', function(){
			var EventID = $(this).data('id');
		    var post = $(this);

			$.ajax({
				url: 'like.php',
				type: 'post',
				data: {
					'unliked': 1,
					'EventID': EventID
				},
				success: function(response){
					post.parent().find('span.likes_count').text(response + " Joined");
					post.addClass('hide');
					post.siblings().removeClass('hide');
				}
			});
		});
	});
