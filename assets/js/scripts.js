$(document).ready(function(){
  $('.menu-toggle').on('click',function(){
    $('.nav').toggleClass('showing');
    $('.nav ul').toggleClass('showing');
  });



  $(document).ready(function(){
    // When user clicks on submit comment to add comment under post
    $(document).on('click', '#submit_comment', function(e) {
      e.preventDefault();
      var comment_text = $('#comment_text').val();
      var url = $('#comment_form').attr('action');
      // Stop executing if not value is entered
      if (comment_text === "" ) return;
      $.ajax({
        url: url,
        type: "POST",
        data: {
          comment_text: comment_text,
          comment_posted: 1
        },
        success: function(data){
          var response = JSON.parse(data);
          if (data === "error") {
            alert('There was an error adding comment. Please try again');
          } else {
            $('#comments-wrapper').prepend(response.comment)
            $('#comments_count').text(response.comments_count); 
            $('#comment_text').val('');
          }
        }
      });
    });
    // When user clicks on submit reply to add reply under comment
    $(document).on('click', '.reply-btn', function(e){
      e.preventDefault();
      // Get the comment id from the reply button's data-id attribute
      var comment_id = $(this).data('id');
      // show/hide the appropriate reply form (from the reply-btn (this), go to the parent element (comment-details)
      // and then its siblings which is a form element with id comment_reply_form_ + comment_id)
      $(this).parent().siblings('form#comment_reply_form_' + comment_id).toggle(500);
      $(document).on('click', '.submit-reply', function(e){
        e.preventDefault();
        // elements
        var reply_textarea = $(this).siblings('textarea'); // reply textarea element
        var reply_text = $(this).siblings('textarea').val();
        var url = $(this).parent().attr('action');
        $.ajax({
          url: url,
          type: "POST",
          data: {
            comment_id: comment_id,
            reply_text: reply_text,
            reply_posted: 1
          },
          success: function(data){
            if (data === "error") {
              alert('There was an error adding reply. Please try again');
            } else {
              $('.replies_wrapper_' + comment_id).append(data);
              reply_textarea.val('');
            }
          }
        });
      });
    });
  });





	$(document).ready(function(){
		// when the user clicks on like
		$('.like').on('click', function(){
			var post_id = $(this).data('id');
			    $post = $(this);

			$.ajax({
				url: 'single2.php',
				type: 'post',
				data: {
					'liked': 1,
					'post_id': post_id
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});

		// when the user clicks on unlike
		$('.unlike').on('click', function(){
			var post_id = $(this).data('id');
		    $post = $(this);

			$.ajax({
				url: 'single2.php',
				type: 'post',
				data: {
					'unliked': 1,
					'post_id': post_id
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});
	});


  
  $('.post-wrapper').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    nextArrow: $('.next'),
    prevArrow: $('.prev'),
     responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
          
});
});


ClassicEditor
.create( document.querySelector( '#body' ) )
.then( editor => {
        console.log( editor );
} )
.catch( error => {
        console.error( error );
} );
