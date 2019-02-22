function comment(key) {
  return window.js_variable.comment[key];
}

function rating(key) {
  return window.js_variable.rating[key];
}

$(document).ready(function () {
  $('.uba_audioButton').on('click', function () {
    $(this).find('audio').trigger('play');
  });

  $('.btn-success').on('click', function () {
    var answers = $('input[type="radio"]:checked').map(function () {
      return this.id;
    }).get();
    var totalQuestion = $('.exercises').data('question');
    if (answers.length === totalQuestion) {
      var userId = $('.details').data('user');
      var token = $('.details').data('token');
      $.ajax({
        url: 'user/lesson',
        method: "POST",
        dataType: "JSON",
        data: { answers: answers, userId: userId, _token: token },
        success: function (data) {
          var output = '<div class="correct">Correct: ' + data.correct.length + '<span>' + ' / ' + data.total.length + '</span>' + '</div>';
          $('.result-lesson').html(output);
        }
      });
    } else {
      alert(trans('answer_exercise'));
    }
  });
  function iyiy() {

  }
  //handle add comment to lesson 
  $('#comment-button').on('click', function () {
    var userId = $(this).data('user');
    var lessonId = $(this).data('lessons');
    var content = $('#comment-text').val();
    var token = $(this).data('token');
    if (userId != undefined) {
      if (content !== '') {
        $.ajax({
          url: 'lesson/comment',
          method: 'POST',
          dataType: 'JSON',
          data: {
            userId: userId,
            lessonId: lessonId,
            content: content,
            _token: token
          },
          success: function (data) {
            console.log(data);
            var output = '';
            output += '<div class="single-comment" data-id="' + data.id + '">';
            output += '<div class="author-image">';
            output += '<img src="' + data.userImage + ' " alt="">';
            output += '</div>';
            output += '<div class="comment-text">';
            output += '<div class="author-info">';
            output += '<h4><a href="">' + data.userName + '</a></h4>';
            output += '<span class="reply"><a class="add-reply" id="' + data.id + '">' + comment('reply') + '</a></span>';
            output += '<span class="comment-time">' + data.created_at + '/</span>';
            output += '</div>';
            output += '<p>' + data.content + '</p>';
            output += ' </div>';
            output += ' </div>';
            $('.comments').append(output);
            document.getElementById("comment-text").value = "";
          }
        });
      }
    } else {
      location.href = 'login';
    }
  });
});


//handle form reply comment to lesson
$(document).on('click', '.add-reply', function () {
  if ($('.add-reply').attr('disabled') !== 'disabled') {
    var replyId = $(this).attr('id');
    var output = '';
    output += '<div class="comment-reply" data-id=' + replyId + '>';
    output += '<p class="discuss-lesson">' + comment('add') + ' <a class="cancelReply">' + comment('cancel') + '</a></p>';
    output += '<div class="single-comment">';
    output += '<div class="comment-text">';
    output += '<textarea class="form-control" id="reply-text" name="review" placeholder="' + comment('write') + '"></textarea>';
    output += '</div>';
    output += '<div class="col-lg-2 pull-right">';
    output += '<input class="btn btn-block" id="reply-button" value="' + comment('submit') + '" data-comment=' + replyId + ' type="submit">';
    output += '</div>';
    output += '</div>';
    output += '</div>';
    $('div[data-id=' + replyId + ']').append(output);
    $('.add-reply').attr('disabled', 'disabled');
  } else {
    return false;
  }
});

//cancel reply comment to lesson
$(document).on('click', '.cancelReply', function () {
  var cancelId = $('.comment-reply').attr('data-id');
  $('div .comment-reply[data-id=' + cancelId + ']').remove();
  $('.add-reply').removeAttr('disabled');
});

//handle reply comment to lesson
$(document).on('click', '#reply-button', function () {
  var commentId = $(this).data('comment');
  var userId = $('#comment-button').data('user');
  var lessonId = $('#comment-button').data('lessons');
  var token = $('#comment-button').data('token');
  var commentReply = $('#reply-text').val();
  if (userId != undefined) {
    if (commentReply != '') {
      $.ajax({
        url: 'lesson/reply',
        method: 'POST',
        dataType: 'JSON',
        data: {
          userId: userId,
          lessonId: lessonId,
          content: commentReply,
          _token: token,
          parentComment: commentId
        },
        success: function (data) {
          console.log(data.parent_id);
          var output = '';
          output += '<div class="single-comment comment-reply">';
          output += '<div class="author-image">';
          output += '<img src="' + data.userImage + '" alt="">';
          output += '</div>';
          output += '<div class="comment-text">';
          output += '<div class="author-info">';
          output += '<h4><a href="">' + data.userName + '</a></h4>';
          output += '<span class="comment-time">' + data.created_at + '</span>';
          output += '</div>';
          output += '<p>' + data.content + '</p>';
          output += ' </div>';
          output += ' </div>';
          $('.comment-reply[data-id=' + data.parent_id + ']').remove();
          $('.single-comment[data-id=' + data.parent_id + ']').append(output);
          $('.add-reply').removeAttr('disabled');
        },
      });
    }
  } else {
    location.href = 'login';
  }
});

//star rating
var $star_rating = $('.star-rating .fa');

var SetRatingStar = function () {
  return $star_rating.each(function () {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};
debugger;
$star_rating.on('click', function () {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();
$(document).ready(function () {

});


