//Search product

// Delay a time before seach
function delay(callback, ms) {
    var timer = 0;
    return function () {
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}

$(document).ready(function () {
    $('#search').keyup(delay(function (e) {
        e.preventDefault();
        var query = $(this).val();
        if (query != '' && query.length >= 2) {
            $.ajax({
                url: 'user/search/courses',
                method: "GET",
                data: { query: query },
                dataType: "JSON",
                success: function (data) {
                    if (data.length > 0) {
                        var output = '<ul>';
                        $.each(data, function (key, val) {
                            output += '<li><a href="course/detail/' + val.id + '">' + val.name + '</a></li>';
                        });
                        output += '</ul>';
                        $('#courseList').html(output);
                        $('#courseList').fadeIn();
                    } else {
                        output = 'no result';
                        $('#courseList').html(output);
                        $('#courseList').fadeIn();
                    }
                }
            });
        } else {
            $('#courseList').fadeOut();
        }
    }, 250));
});

//Disappear search result when click out of form
$(document).bind('click', function (event) {
    // Check if we have not clicked on the search box
    if (!($(event.target).parents().andSelf().is('#search'))) {
        $('#courseList').fadeOut();
    }
});
