/* add question-answer*/
$(document).ready(function(){
  var key = 0;
  var div = document.getElementById('question');
  var template = document.getElementById('template');
  $("#add-questions").on("click", function(){
    var tmp = template;
    tmp = tmp.innerHTML.replace(/key/g, key);
    $(div).append(tmp);
    key++;
  });
});
