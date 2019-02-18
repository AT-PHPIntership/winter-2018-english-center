$(document).ready(function(){
 $('.uba_audioButton').on('click', function(){
   $(this).find('audio').trigger('play');
 });

 $('.btn-success').on('click', function() {
    var answers = $('input[type="radio"]:checked').map(function() {
          return this.id;
      }).get();
    var totalQuestion = $('.exercises').data('question');
    if (answers.length === totalQuestion) {
      var userId = $('.details').data('user');
      var token = $('.details').data('token');
      $.ajax({
            url: 'user/lesson',
            method:"POST",
            dataType:"JSON",
            data: {answers:answers, userId:userId, _token:token},
            success: function(data){
              var output = '<div class="correct">Correct: ' + data.correct.length + '<span>' + ' / ' +  data.total.length + '</span>' + '</div>';
              $('.result-lesson').html(output);
            }
      });
    } else {
        alert('Please answer all questions');
    }
  });
});
