/* add question-answer*/
$(document).ready(function(){
  var key = $('.questions').length - 1;
  var div = document.getElementById('question');
  var template = document.getElementById('template');
  $("body").on("click", "#add-questions", function(){
    var tmp = template;
    $(template).find(".errors").remove()
    tmp = tmp.innerHTML.replace(/key/g, key);
    $(div).append(tmp);
    key++;
  });
  $('body').on('click', '#remove-questions', function() {
    $(this).parent().remove();
  });

  validateField('.questions', '.form-group', "* Please enter question name");
  validateField('.answer', '.col-lg-6', "* Please enter answer name");
});

function validateField(elementClass, parentClass, messageError) {
  $('#question').on("blur", elementClass, function(event){
    $(this).parents(parentClass).find('.errors').remove();
    var items = [];
    if(elementClass === '.answer'){
      items = $('.' + this.classList[2]);
    }else{
      items = $('.questions');
    }
    var value = $(this).val();
    var error = $("<p class='errors' style='color: red;'></p>");
    if(value == ""){
      $(error).html(messageError);
      $(this).parents(parentClass).append(error);
    }
    for(var i = 0; i < items.length; i++){
      if($(this).is($(items[i]))){
        continue;
      }
      if(value != "" && value === $(items[i]).val()){
        $(error).html("* Name has been existed");
        $(this).parents(parentClass).append(error);
      }
    }
  });
}
function validateStatus(){
  var status = true;
  var boxQuestions = $("#question .box-question");
  console.log(boxQuestions);
  $('.error-status').remove();
  console.log(boxQuestions.length);
  for(var i = 0; i < boxQuestions.length; i++){
    var answersChecked = $(boxQuestions[i]).find('input[type="radio"]:checked').length;

    console.log("anser " + answersChecked);
    if(answersChecked === 0){
      var error = $("<p class='error-status' style='color: red;'>* Please choose correction answer</p>");
      $(boxQuestions[i]).append(error);
      status=false;
    }
  }
  return status;
}
function validate(elementClass, parentClass, messageError){
  var result = true;
  var fields = $(elementClass);
  for(var i = 0 ; i < fields.length - 1; i++){
    var value = $(fields[i]).val();
    var error = $("<p class='errors' style='color: red;'></p>");
    if(value == ""){
      $(error).html(messageError);
      $(fields[i]).parents(parentClass).append(error);
      result = false;
    }
  }
  return result;
}
$(document).ready(function() {
  $('body').on('click', '.create-exercise', function() {
    // $('.error-status').remove();
    $('.errors').remove();
    $('.error-exercise').remove();
    $('.error-lesson').remove();
    validate('.questions', '.form-group', "* Please enter question name");
    validate('.answer', '.col-lg-6', "* Please enter answer name");
    if(!validateStatus()) {
      return false;
    }
    var exercises = $('.title').val();
    var lessonId = $('.lesson').val();
    var questions = $('.questions').map(function() {
          return this.value;
      }).get();
    var questionsWithLast = questions.pop();
    var totalAnswer = [];
    for (var i = 0; i < questions.length; i++) {
       var answer = $('.answers-' + i).map(function() {
          return this.value;
        }).get();
       totalAnswer.push(answer);
    }
    var status = $('input[type="radio"]:checked').map(function() {
      return this.value;
    }).get();
    
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    // debugger;
    if (exercises != '') {
      $.ajax({

              url: 'admin/exercises/store',
              type:"POST",
              dataType:"JSON",
              data: {
                exercises: exercises, 
                lessonId: lessonId,
                questions: questions,
                totalAnswer: totalAnswer,
                status: status,
              },
              success: function(data){
                window.location.href = "admin/exercises";
              }
      });
      // debugger;
    } else {
      var error = $("<span class='text-red help is-danger error-exercise'>* Please enter exercise name</span>");
      $('.exercise').append(error);
      if(lessonId == '') {
        var errorLesson = $("<span class='text-red help is-danger error-lesson'>* Please enter lesson name</span>");
        $('.lessons').append(errorLesson);
      }
    }
  });
});
$(document).on('click', '.edit-exercise', function() {
    $('.errors').remove();
    $('.error-exercise').remove();
    $('.error-lesson').remove();

    if(!validate('.questions', '.form-group', "* Please enter question name")) {
      result = false;
    };
    if(!validate('.answer', '.col-lg-6', "* Please enter answer name")) {
      result = false;
    }

    var result =true;
    var exercises = $('.title').val();
    var lessonId = $('.lesson').val();
    if (exercises == '') {
      var error = $("<span class='text-red help is-danger error-exercise'>* Please enter exercise name</span>");
      $('.exercise').append(error);
      result = false;
    }
    if(lessonId == '') {
      var errorLesson = $("<span class='text-red help is-danger error-lesson'>* Please enter lesson name</span>");
      $('.lessons').append(errorLesson);
      result = false;
    }
    
    validate('.questions', '.form-group', "* Please enter question name");
    validate('.answer', '.col-lg-6', "* Please enter answer name");
    if(!validateStatus()) {
        result = false;
    }
    return result;
});
