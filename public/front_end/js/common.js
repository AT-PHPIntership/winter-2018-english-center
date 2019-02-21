function comment(key) {
  return window.js_variable.comment[key];
}

function navigate(key) {
  return window.js_variable.navigate[key];
}

function exercise(key) {
  return window.js_variable.exercise[key];
}

$(document).ready(function(){
 $('.uba_audioButton').on('click', function(){
   $(this).find('audio').trigger('play');
 });

 $('.btn-success').one('click', function() {
    var answers = $('input[type="radio"]:checked').map(function() {
          return this.id;
      }).get();
    var totalQuestion = $('.exercises').data('question');
    if (answers.length === totalQuestion) {
      var userId = $('.details').data('user');
      var token = $('.details').data('token');
      var lessonId = $(".exercises").data('lesson');
      $.ajax({
            url: 'user/lesson',
            method:"POST",
            dataType:"JSON",
            data: {answers:answers, userId:userId, lessonId:lessonId, _token:token},
            success: function(data){
              var output = '<div class="correct">Correct: ' + data.correct.length + '<span>' + ' / ' +  data.total.length + '</span>' + '</div>';
              $('.result-lesson').html(output);
              if (data.correct.length >= data.goal) {
                  var navigation = '<ul class="pagination">';
                  if (navigate('previous') != null) {
                   navigation += `<li><a href="detail/lesson/${navigate('previous')}"><i class="zmdi zmdi-chevron-left"></i></a></li>`;
                  }
                  if (navigate('next') != null) {
                    navigation += `<li><a href="detail/lesson/${navigate('next')}"><i class="zmdi zmdi-chevron-right"></i></a></li>`;
                  } else {
                    setTimeout( function() {
                      swal.fire({
                        title: exercise('congratulation'),
                        text: exercise('notification_next_course'),
                        type: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: exercise('next_course'),
                      }).then(function() {
                        location.assign("detail/" + data.courseId)
                      });
                    }, 3000);
                  }
                  navigation += '</ul>';
                  $('.pagination-content').append(navigation);
              } else {
                var minimum = '<div class="correct">' + exercise('notification_correct') + data.goal + exercise('question') + '</div>';
                var tryButton = `<button type="button" class="btn btn-success" onclick="return location.reload();"><i class="fa fa-edit"></i>` + exercise('again')+ `</button>`;
                $('.result-lesson').append(minimum);
                $('.box_bt_ctrl').append(tryButton);
              }
            }
      });
    } else {
        alert(trans('answer_exercise'));
    }
  });

//handle add comment to course and lesson 
 $('#comment-button').on('click', function() {
  var userId = $(this).data('user');
  var elementId = $(this).data('element');
  var content = $('#comment-text').val();
  var token = $(this).data('token');
  if ( window.location.href.split("/").includes("lesson")){
    var url = 'comment/lessons';
  } else {
    var url = 'comment/courses';
  }
  if (userId != undefined) {
          if (content !== '') {
            $.ajax({
              url: url,
              method: 'POST',
              dataType: 'JSON',
              data: {
                userId: userId,
                elementId: elementId,
                content: content,
                _token: token
              },
              success: function(data) {
                console.log(data);
                var output = '';
                output += '<div class="single-comment" data-id="' + data.id + '">';
                output += '<div class="author-image">';
                output += '<img src="' + data.userImage +' " alt="">';
                output += '</div>';
                output += '<div class="comment-text">';
                output += '<div class="author-info">';
                output += '<h4><a href="">' + data.userName + '</a></h4>';
                output += '<span class="reply"><a class="add-reply" id="' + data.id +'">' + comment('reply') + '</a></span>';
                output += '<span class="comment-time"><span>' + comment('posted_on') + '</span>' + data.created_at + '/</span>';
                output += '</div>';
                output += '<p>' + data.content +'</p>';
                output += ' </div>';
                output += ' </div>';
                $('.comments').append(output);
                $('#comment-text').val("");
              }
            });
          }
        } else {
           location.href = 'login';
        }
 });
});

//handle form reply comment to lesson and course
$(document).on('click', '.add-reply', function() {  
  if($('.add-reply').attr('disabled') !== 'disabled') {
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

//cancel reply comment to lesson and course
$(document).on('click', '.cancelReply', function() {
  var cancelId = $('.comment-reply').attr('data-id');
  $('div .comment-reply[data-id=' + cancelId + ']').remove();
  $('.add-reply').removeAttr('disabled');
});

//handle reply comment to lesson and course
$(document).on('click', '#reply-button', function() {
  var commentId = $(this).data('comment');
  var userId = $('#comment-button').data('user');
  var elementId = $('#comment-button').data('element');
  var token = $('#comment-button').data('token');
  var contentReply = $('#reply-text').val();
  if ( window.location.href.split("/").includes("lesson")){
    var url = 'reply/lessons';
  } else {
    var url = 'reply/courses';
  }
  if (userId != undefined) {
    if (contentReply != '') {
      $.ajax({
        url: url,
        method: 'POST',
        dataType: 'JSON',
        data: {
          userId: userId,
          elementId: elementId,
          content: contentReply,
          _token: token,
          parentComment: commentId
        },
        success: function(data) {
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
                output += '<p>' + data.content +'</p>';
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
