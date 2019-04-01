function comment(key) {
  return window.js_variable.comment[key];
}

function navigate(key) {
  return window.js_variable.navigate[key];
}

function exercise(key) {
  return window.js_variable.exercise[key];
}

$(document).ready(function () {
  $('.uba_audioButton').on('click', function () {
    console.log('aaa');
    $(this).find('audio').trigger('play');
  });
  $('.btn-success').one('click', function () {
    var answers = $('input[type="radio"]:checked').map(function () {
      return this.id;
    }).get();
    var totalQuestion = $('.exercises').data('question');
    if (answers.length === totalQuestion) {
      var userId = $('.details').data('user');
      var token = $('.details').data('token');
      var lessonId = $(".exercises").data('lesson');
      var courseId = $(".exercises").data('course');
      // debugger;
      $.ajax({
        url: 'lesson',
        method: "POST",
        dataType: "JSON",
        data: {
          answers: answers, 
          userId: userId,
          lessonId: lessonId,
          courseId: courseId,
          _token: token
        },
        success: function (data) {
          console.log(data.correct);
            if (data.correct == 0) {
              var output = '<div class="correct">Correct: 0 <span>' + ' / ' + data.total.length + '</span>' + '</div>';
              $('.result-lesson').html(output);
            } else {
              var output = '<div class="correct">Correct: ' + data.correct.length + '<span>' + ' / ' + data.total.length + '</span>' + '</div>';
              $('.result-lesson').html(output);
            }
            if (data.correct.length >= data.goal) {
              var navigation = '<ul class="pagination">';
              if (navigate('previous') != null) {
                navigation += `<li><a href="detail/lesson/${navigate('previous')}"><i class="zmdi zmdi-chevron-left"></i></a></li>`;
              }
              if (navigate('next') != null) {
                navigation += `<li><a class="next_lesson" href="detail/lesson/${navigate('next')}"><i class="zmdi zmdi-chevron-right"></i></a></li>`;
              }
              else {
                setTimeout(function () {
                  swal.fire({
                    title: exercise('congratulation'),
                    text: exercise('notification_next_course'),
                    type: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: exercise('next_course'),
                  }).then(function (isConfirm) {
                    if (isConfirm.dismiss != 'cancel') {
                      location.assign("detail/course/" + data.courseId);
                    }
                    return false;
                  });
                }, 2000);
              }
              navigation += '</ul>';
              $('.pagination-content').append(navigation);
            } else {
              var minimum = '<div class="correct">' + exercise('notification_correct') + data.goal + exercise('question') + '</div>';
              var tryButton = `<button type="button" class="btn btn-success" onclick="return location.reload();"><i class="fa fa-edit"></i>` + exercise('again') + `</button>`;
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
  $('#comment-button').on('click', function () {
    var userId = $(this).data('user');
    var elementId = $(this).data('element');
    var content = $('#comment-text').val();
    var token = $(this).data('token');
    if (window.location.href.split("/").includes("lesson")) {
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
          success: function (data) {
            var output = '';
            output += '<li class="comment-border" data-id=' + data.id + '>';
            output += '<article id="' + data.id + '">';
            if (data.userImage.substring(0, 4) == 'http') {
              output += '<img src="' + data.userImage + '" class="avatar avatar-60 photo"/>';
            }
            else {
              output += '<img src="storage/avatar/' + data.userImage + '" class="avatar avatar-60 photo"/>';
            }
            output += '<div class="comment-des">';
            output += '<div class="comment-by">';
            output += '<p class="author"><strong>' + data.userName + '</strong></p>';
            output += '<p class="date"><a><time>' + data.created_at + '</time></a> - <a href="" title="Edit Comment">Edit</a> - <a class="delete-comment" id="' + data.id + '">Delete</a>';
            // output += '<span class="reply"><a class="detele-comment" id="' + data.id + '">Delete</a></span>';
            output += '<span class="reply"><a class="add-reply" id=' + data.id + '>Reply</a></span>';
            output += '</div>';
            output += '<section>';
            output += '<p>' + data.content + '</p>';
            output += '</section>';
            output += '</div>';
            output += '</article>';
            output += '</li>';
            $('#commentList').append(output);
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
$(document).on('click', '.add-reply', function () {
  // console.log('ahaha');
  if ($('.add-reply').attr('disabled') !== 'disabled') {
    // console.log('dsada');
    var replyId = $(this).attr('id');
    var output = '';
    output += '<div class="single-comment comment-reply" data-id=' + replyId + '>';
    output += '<p class="discuss-lesson">' + comment('add') + ' <a class="cancelReply">' + comment('cancel') + '</a></p>';
    output += '<div class="single-comment">';
    output += '<div class="comment-text">';
    output += '<textarea class="form-control" id="reply-text" name="review" placeholder="' + comment('write') + '"></textarea>';
    output += '</div>';
    output += '<div class="col-lg pull-right">';
    output += '<input class="btn btn-block" id="reply-button" value="' + comment('submit') + '" data-comment=' + replyId + ' type="submit">';
    output += '</div>';
    output += '</div>';
    output += '</div>';
    $('article#' + replyId).append(output);
    $('.add-reply').attr('disabled', 'disabled');
  } else {
    return false;
  }
});

//cancel reply comment to lesson and course
$(document).on('click', '.cancelReply', function () {
  var cancelId = $('.comment-reply').attr('data-id');
  $('div .comment-reply[data-id=' + cancelId + ']').remove();
  $('.add-reply').removeAttr('disabled');
});

//handle reply comment to lesson and course
$(document).on('click', '#reply-button', function () {
  var commentId = $(this).data('comment');
  var userId = $('#comment-button').data('user');
  var elementId = $('#comment-button').data('element');
  var token = $('#comment-button').data('token');
  var contentReply = $('#reply-text').val();
  if (window.location.href.split("/").includes("lesson")) {
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
        success: function (data) {
          var output = '';
          output += '<ol class="children">';
          output += '<li class="children" id="commentChildren">';
          output += '<article id="' + data.id + '" class="comment">';
          if (data.userImage.substring(0, 4) == 'http') {
            output += '<img src="' + data.userImage + '" class="avatar avatar-60 photo"/>';
          }
          else {
            output += '<img src="storage/avatar/' + data.userImage + '" class="avatar avatar-60 photo"/>';
          }
          output += '<div class="comment-des">';
          output += '<div class="comment-by">';
          output += '<p class="author"><strong>' + data.userName + '</strong></p>';
          output += '<p class="date"><a><time>' + data.created_at + '</time></a> - <a class="edit-comment" id="' 
                    + data.id + '">Edit</a> - <a class="delete-comment" id="' 
                    + data.id + '">Delete</a>';
          output += '</div>';
          output += '<section>';
          output += '<p>' + data.content + '</p>';
          output += '</section>';
          output += '</div>';
          output += '</article>';
          output += '</li>';
          output += '</ol>';
          $('.comment-reply[data-id=' + data.parent_id + ']').remove();
          $('.comment-border[data-id=' + data.parent_id + ']').append(output);
          $('.add-reply').removeAttr('disabled');
        },
      });
    }
  } else {
    location.href = 'login';
  }
});

//delete comment 
$(document).on('click', '.delete-comment', function () {
  var commentId = $(this).attr('id');
  var userId = $('#comment-button').data('user');
  var token = $('#comment-button').data('token');
  if (userId != undefined) {
    $.ajax({
      url: 'delete/comment',
      type: 'DELETE',
      dataType: 'JSON',
      data: {
        userId: userId,
        commentId: commentId,
        _token: token,
      },
      success: function (data) {
        $('.comment-border[data-id=' + data.id + ']').remove();
        $('article[id=' + data.id + ']').remove();
      },
    });
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
// debugger;
$star_rating.on('click', function () {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();
$(document).ready(function () {

});

$(document).on('click', '.lesson', function () {
  var userId = $(this).data('user');
  var lessonId = $(this).data('lesson');
  var order = $(this).data('order');
  var orderLearn = $(this).data('order-learn');
  var href = $(this).data('href');
  var token = $(this).data('token');
  // debugger
  if (userId != undefined) {
    $.ajax({
        url: 'checkaccount',
        method: "POST",
        dataType: "JSON",
        data: {
          userId: userId,
          lessonId: lessonId,
          _token: token
        },
        success: function (data) {
          if (data.score != null) { 
            if (data.role == "Trial") {
              if (data.totalCourse < 2) {
                if (order > orderLearn) {
                  alert('Please complete the previous lesson.');            
                } else {
                  location.assign("detail/lesson/" + lessonId);
                }
              }
              if ((data.totalCourse == 2 && data.score < 40)) {
                if(data.learnedCourse.includes(data.currentCourse)) {
                  if (order > orderLearn) {
                    alert('Please complete the previous lesson.');            
                  } else {
                    location.assign("detail/lesson/" + lessonId);
                  }
                } else {
                  window.location.assign('unfinished');
                }
              } else if (data.totalCourse == 2 && data.score >= 40){
                window.location.assign('subscribe');
              }
            } 
            if (data.role == "VIP"){
              if (order > orderLearn) {
                alert('Please complete the previous lesson.');            
              } else {
                location.assign("detail/lesson/" + lessonId);
              }
            }
            if(data.role == "Admin") {
              location.assign("detail/lesson/" + lessonId);
            }
          } else {
            if(data.role == "Trial") {
              if (order > orderLearn) {
                alert('Please complete the previous lesson.');            
              } else {
                location.assign("detail/lesson/" + lessonId);
              }
            }
            if(data.role == "Admin") {
              location.assign("detail/lesson/" + lessonId);
            }
            if(data.role == 'VIP'){
              if (order > orderLearn) {
                alert('Please complete the previous lesson.');            
              } else {
                location.assign("detail/lesson/" + lessonId);
              }
            }
          }
        }
      });
  } else {
    window.location.href = '/login';
  }
});

$(document).on('click', '.js-course', function(){
  var userId = $(this).data('user');
  var courseId = $(this).data('course');
  var token =  $(this).data('token');
  if(courseId != undefined) {
    $.ajax({
      url: 'process',
      method: 'POST',
      dataType: 'JSON',
      data: {
        userId: userId,
        courseId: courseId,
        _token: token,
      },
      success: function(data) {
        if(data.length) {
          var output = '';
          var total = 0;
          $.each(data, function(key, val) {
            output += '<tr id="js-item">';
            output += '<td><p>'+ val.key +'</p></td>';
            output += '<td>';
            output += '<p>';
            output += '<a class="lesson-name" href="detail/lesson/'+ val.id +'">' + val.name_lesson + '</a>';
            output += '</p>';
            output += '</td>';
            output += '<td>';
            output += '<p>'+ val.date_start +'</p>';
            output += '</td>';
            output += '<td>';
            output += '<p> -- </p>';
            output += '</td>';
            output += '<td>';
            output += '<p>';
            output += '<div class="progress progress-sm active">';
            output += '<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '+ val.percent_learn +'%">'+ val.percent_learn +'%</div>';
            output += '</div>';
            output += '</p>';
            output += '</td>';
            output += '</tr>';
            total += +val.percent_learn / 5;
          });

            var item = '';
            item += '<tr>'
            item += '<th colspan="4">';
            item += '<p>Learing Progress</p>';
            item += '</th>';
            item += '<th id="total-all">';
            item += '<p>';
            item += '<div class="progress progress-sm active">';
            item += '<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:'+ total +'%">'+ total +'%</div>';
            item += '</p>';
            item += '</div>';
            item += '</th>';
            item += '</tr>';

            $('#js-body-lesson').html(output);
            $('#js-foot-lesson').html(item);
        } else {
          $('#js-body-lesson').html('');
          $('#js-foot-lesson').html('');
      }
    }
    });
  }
});
