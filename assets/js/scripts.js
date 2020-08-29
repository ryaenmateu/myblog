$(document).ready(function(){
  $('.menu-toggle').on('click',function(){
    $('.nav').toggleClass('showing');
    $('.nav ul').toggleClass('showing');
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
          url: "single2.php",
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

    // if the user clicks on the like button ...
    $('.like-btn').on('click', function(){
      var post_id = $(this).data('id');
      $clicked_btn = $(this);
      if ($clicked_btn.hasClass('fas-thumbs-up')) {
        action = 'like';
      } else if($clicked_btn.hasClass('far-thumbs-up')){
        action = 'unlike';
      }
      $.ajax({
        url: 'single2.php',
        type: 'post',
        data: {
          'action': action,
          'post_id': post_id
        },
        success: function(data){
          res = JSON.parse(data);
          if (action == "like") {
            $clicked_btn.removeClass('far-thumbs-up');
            $clicked_btn.addClass('fas-thumbs-up');
          } else if(action == "unlike") {
            $clicked_btn.removeClass('fas-thumbs-up');
            $clicked_btn.addClass('far-thumbs-up');
          }
          // display the number of likes and dislikes
          $clicked_btn.siblings('span.likes').text(res.likes);
          $clicked_btn.siblings('span.dislikes').text(res.dislikes);
    
          // change button styling of the other button if user is reacting the second time to post
          $clicked_btn.siblings('i.fas-thumbs-down').removeClass('fas-thumbs-down').addClass('far-thumbs-down');
        }
      });		
    
    });
    
    // if the user clicks on the dislike button ...
    $('.dislike-btn').on('click', function(){
      var post_id = $(this).data('id');
      $clicked_btn = $(this);
      if ($clicked_btn.hasClass('far-thumbs-down')) {
        action = 'dislike';
      } else if($clicked_btn.hasClass('fas-thumbs-down')){
        action = 'undislike';
      }
      $.ajax({
        url: 'single2.php',
        type: 'post',
        data: {
          'action': action,
          'post_id': post_id
        },
        success: function(data){
          res = JSON.parse(data);
          if (action == "dislike") {
            $clicked_btn.removeClass('far-thumbs-down');
            $clicked_btn.addClass('fas-thumbs-down');
          } else if(action == "undislike") {
            $clicked_btn.removeClass('fas-thumbs-down');
            $clicked_btn.addClass('far-thumbs-down');
          }
          // display the number of likes and dislikes
          $clicked_btn.siblings('span.likes').text(res.likes);
          $clicked_btn.siblings('span.dislikes').text(res.dislikes);
          
          // change button styling of the other button if user is reacting the second time to post
          $clicked_btn.siblings('i.fas-thumbs-up').removeClass('fas-thumbs-up').addClass('far-thumbs-up');
        }
      });	
    
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


