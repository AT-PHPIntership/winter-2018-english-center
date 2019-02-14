$(document).ready(function(){
 $('.uba_audioButton').on('click', function(){
   $(this).find('audio').trigger('play');
 });
});
