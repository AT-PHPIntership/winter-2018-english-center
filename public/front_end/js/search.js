//Search product

//Delay a time before seach
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

// search home
$(document).ready(function () {
    $('#search').keyup(delay(function (e) {
        e.preventDefault();
        var query = $(this).val();
        // console.log(query);
        if (query != '' && query.length >= 1) {
            $.ajax({
                url: 'search/courses',
                method: "GET",
                data: { query: query },
                dataType: "JSON",
                success: function (data) {
                    if (data.length > 0) {
                        var output = '<ul>';
                        $.each(data, function (key, val) {
                            if (val.parent_id === null) {
                                output += '<li><a href="/detail/courses/' + val.id + '">' + val.name + '</a></li>';
                            } else {
                                output += '<li><a href="/detail/course/' + val.id + '">' + val.name + '</a></li>';
                            }
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

// search email user
$(document).ready(function () {
    $('#search-user').keyup(delay(function (e) {
        e.preventDefault();
        var query = $(this).val();
        // console.log(query);
        if (query != '' && query.length >= 1) {
            $.ajax({
                url: 'admin/users/search',
                method: "GET",
                data: { query: query },
                dataType: "JSON",
                success: function (data) {
                    // console.log(data);
                    if (data.length > 0) {
                        var output = '';
                        $.each(data, function (key, val) {
                            output += '<tr class="row search-result" data-id="'+ val.id +'">';
                            output += '<td>' + val.id + '</td>';
                            output += '<td>' + val.email + '</td>';
                            output += '<td>' + val.role + '</td>';
                            output += '<td>' + '<a href="admin/users/' + val.id + '" class="btn btn-warning">Detail</a>' + '</td>';
                            output += '<td>'
                            output += '<a href="admin/users/' + val.id +'/edit" class="btn btn-warning">Edit</a>';
                            if(val.role != 'Admin') {
                               output+= '<button type="submit" class="btn btn-danger form-delete btn-delete-item search-delete" data-title="Delete User" data-user-id="'+ val.id + '" data-token="'+ val.token +'">Delete</button>'; 
                            }
                            output += '</tr>';
                        });
                        $('#list-search-users').html(output);
                        output2 = '';
                        $('#search-no-result').html(output2);
                    } else {
                        output1 = '';
                        output2 = 'No result';
                        $('#list-search-users').html(output1);
                        $('#search-no-result').html(output2);
                    }
                }
            });
        } else {
            location.reload();
        }
    }, 250));
});

// delete user
$(document).ajaxComplete(function () {
    $('.search-delete').on('click', function () {
        var delUser = confirm('Are you sure you want to delete?');
        if(delUser) {
            var userId = $(this).data('user-id');
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN' : $('meta[name=“csrf-token”]').attr('content')
                }
            });
            $.ajax({
                url: 'admin/users/search/delete',
                type: 'DELETE',
                dataType: 'JSON',
                data: { "user-id" : userId, _token : $('meta[name="csrf-token"]').attr('content'),} ,
                success: function (data) {
                    // console.log(data);
                    $('.search-result[data-id='+ data + ']').remove();
                }
            });
        }
    });
});

// search course name
$(document).ready(function () {
    $('#search-course').keyup(delay(function (e) {
        e.preventDefault();
        var query = $(this).val();
        // console.log(query);
        if (query != '' && query.length >= 1) {
            $.ajax({
                url: 'admin/courses/search',
                method: "GET",
                data: { query: query },
                dataType: "JSON",
                success: function (data) {
                    // console.log(data);
                    if (data.length > 0) {
                        var output = '';
                        $.each(data, function (key, val) {
                            output += '<tr class="row search-result" data-id="'+ val.id +'">';
                            output += '<td style="text-align: center;">'+ val.id + '</td>';
                            output += '<td style="text-align: center;">'+ val.name + '</td>';
                            output += '<td style="text-align: center;">'+ val.course_parent + '</td>';
                            output += '<td style="text-align: center;">'+ val.view + '</td>';
                            output += '<td style="text-align: center;">'+ val.rating + '</td>';
                            output += '<td style="text-align: center;">'+ val.content + '</td>';
                            output += '<td style="text-align: center;">'
                            output += '<a href="admin/courses/' + val.id +'/edit" class="btn btn-warning">Edit</a>';
                            output+= '<button type="submit" class="btn btn-danger form-delete btn-delete-item search-delete" data-title="Delete Course" data-course-id="'+ val.id + '" data-token="'+ val.token +'">Delete</button>'; 
                            output += '</td>'
                            output += '</tr>';
                        });
                        $('#list-search-courses').html(output);
                        output2 = '';
                        $('#search-no-result-course').html(output2);
                    } else {
                        output1 = '';
                        output2 = 'No result';
                        $('#list-search-courses').html(output1);
                        $('#search-no-result-course').html(output2);
                    }
                }
            });
        } else {
            location.reload();
        }
    }, 250));
});

// delete course
$(document).ajaxComplete(function () {
    $('.search-delete').on('click', function () {
        var delCourse = confirm('Are you sure you want to delete?');
        if(delCourse) {
            var courseId = $(this).data('course-id');
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN' : $('meta[name=“csrf-token”]').attr('content')
                }
            });
            $.ajax({
                url: 'admin/courses/search/delete',
                type: 'DELETE',
                dataType: 'JSON',
                data: { "course-id" : courseId, _token : $('meta[name="csrf-token"]').attr('content'),} ,
                success: function (data) {
                    // console.log(data);
                    $('.search-result[data-id='+ data + ']').remove();
                }
            });
        }
    });
});
