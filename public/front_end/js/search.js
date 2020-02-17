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
                               output+= '<button type="submit" class="btn btn-danger form-delete btn-delete-item search-delete-user" data-title="Delete User" data-user-id="'+ val.id + '" data-token="'+ val.token +'">Delete</button>'; 
                            }
                            output += '</tr>';
                        });
                        $('#list-search-users').html(output);
                        output2 = '';
                        $('#search-no-result').html(output2);
                        output3 = '';
                        $('#pagination').html(output3);
                    } else {
                        output1 = '';
                        output2 = 'No result';
                        $('#list-search-users').html(output1);
                        $('#search-no-result').html(output2);
                        output3 = '';
                        $('#pagination').html(output3);
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
    $('.search-delete-user').on('click', function () {
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
                            output+= '<button type="submit" class="btn btn-danger form-delete btn-delete-item search-delete-course" data-title="Delete Course" data-course-id="'+ val.id + '" data-token="'+ val.token +'">Delete</button>'; 
                            output += '</td>'
                            output += '</tr>';
                        });
                        $('#list-search-courses').html(output);
                        output2 = '';
                        $('#search-no-result-course').html(output2);
                        output3 = '';
                        $('#pagination').html(output3);
                    } else {
                        output1 = '';
                        output2 = 'No result';
                        $('#list-search-courses').html(output1);
                        $('#search-no-result-course').html(output2);
                        output3 = '';
                        $('#pagination').html(output3);
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
    $('.search-delete-course').on('click', function () {
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

// search lesson name
$(document).ready(function () {
    $('#search-lesson').keyup(delay(function (e) {
        e.preventDefault();
        var query = $(this).val();
        // console.log(query);
        if (query != '' && query.length >= 1) {
            $.ajax({
                url: 'admin/lessons/search',
                method: "GET",
                data: { query: query },
                dataType: "JSON",
                success: function (data) {
                    // console.log(data);
                    if (data.length > 0) {
                        var output = '';
                        $.each(data, function (key, val) {
                            output += '<tr class="row search-result" data-id="'+ val.id +'">';
                            output += '<td>'+ val.id + '</td>';
                            output += '<td>'+ val.name + '</td>';
                            output += '<td>'+ val.course + '</td>';
                            output += '<td>'+ val.level + '</td>';
                            output += '<td>' + '<a href="admin/lessons/' + val.id + '" class="btn btn-warning">Detail</a>' + '</td>';
                            output += '<td>'
                            output += '<a href="admin/lessons/' + val.id +'/edit" class="btn btn-warning">Edit</a>';
                            output+= '<button type="submit" class="btn btn-danger form-delete btn-delete-item search-delete-lesson" data-title="Delete Lesson" data-lesson-id="'+ val.id + '" data-token="'+ val.token +'">Delete</button>'; 
                            output += '</td>'
                            output += '</tr>';
                        });
                        $('#list-search-lessons').html(output);
                        output2 = '';
                        $('#search-no-result-lesson').html(output2);
                        output3 = '';
                        $('#pagination').html(output3);
                    } else {
                        output1 = '';
                        output2 = 'No result';
                        $('#list-search-lessons').html(output1);
                        $('#search-no-result-lesson').html(output2);
                        output3 = '';
                        $('#pagination').html(output3);
                    }
                }
            });
        } else {
            location.reload();
        }
    }, 250));
});

// delete lesson
$(document).ajaxComplete(function () {
    $('.search-delete-lesson').on('click', function () {
        var delLesson = confirm('Are you sure you want to delete?');
        if(delLesson) {
            var lessonId = $(this).data('lesson-id');
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN' : $('meta[name=“csrf-token”]').attr('content')
                }
            });
            $.ajax({
                url: 'admin/lessons/search/delete',
                type: 'DELETE',
                dataType: 'JSON',
                data: { "lesson-id" : lessonId, _token : $('meta[name="csrf-token"]').attr('content'),} ,
                success: function (data) {
                    // console.log(data);
                    $('.search-result[data-id='+ data + ']').remove();
                }
            });
        }
    });
});

// search exercise name
$(document).ready(function () {
    $('#search-exercise').keyup(delay(function (e) {
        e.preventDefault();
        var query = $(this).val();
        // console.log(query);
        if (query != '' && query.length >= 1) {
            $.ajax({
                url: 'admin/exercises/search',
                method: "GET",
                data: { query: query },
                dataType: "JSON",
                success: function (data) {
                    // console.log(data);
                    if (data.length > 0) {
                        var output = '';
                        $.each(data, function (key, val) {
                            output += '<tr class="search-result" data-id="'+ val.id +'">';
                            output += '<td>'+ val.id + '</td>';
                            output += '<td>';
                            output += '<a href="admin/exercises/' + val.id + '">';
                            output += val.title;
                            output += '</a>';
                            output += '</td>';
                            output += '<td>'+ val.lesson + '</td>';
                            output += '<td>'
                            output += '<a href="admin/exercises/' + val.id +'/edit" class="btn btn-warning">Edit</a>';
                            output+= '<button type="submit" class="btn btn-danger form-delete btn-delete-item search-delete-exercise" data-title="Delete Exercise" data-exercise-id="'+ val.id + '" data-token="'+ val.token +'">Delete</button>'; 
                            output += '</td>'
                            output += '</tr>';
                        });
                        $('#list-search-exercises').html(output);
                        output2 = '';
                        $('#search-no-result-exercise').html(output2);
                        output3 = '';
                        $('#pagination').html(output3);
                    } else {
                        output1 = '';
                        output2 = 'No result';
                        $('#list-search-exercises').html(output1);
                        $('#search-no-result-exercise').html(output2);
                        output3 = '';
                        $('#pagination').html(output3);
                    }
                }
            });
        } else {
            location.reload();
        }
    }, 250));
});

// delete exercise
$(document).ajaxComplete(function () {
    $('.search-delete-exercise').on('click', function () {
        var delExercise = confirm('Are you sure you want to delete?');
        if(delExercise) {
            var exerciseId = $(this).data('exercise-id');
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN' : $('meta[name=“csrf-token”]').attr('content')
                }
            });
            $.ajax({
                url: 'admin/exercises/search/delete',
                type: 'DELETE',
                dataType: 'JSON',
                data: { "exercise-id" : exerciseId, _token : $('meta[name="csrf-token"]').attr('content'),} ,
                success: function (data) {
                    // console.log(data);
                    $('.search-result[data-id='+ data + ']').remove();
                }
            });
        }
    });
});

// search comment content
$(document).ready(function () {
    $('#search-comment').keyup(delay(function (e) {
        e.preventDefault();
        var query = $(this).val();
        // console.log(query);
        if (query != '' && query.length >= 1) {
            $.ajax({
                url: 'admin/comments/search',
                method: "GET",
                data: { query: query },
                dataType: "JSON",
                success: function (data) {
                    // console.log(data);
                    if (data.length > 0) {
                        var output = '';
                        $.each(data, function (key, val) {
                        // console.log(val);
                            output += '<tr class="search-result" data-id="'+ val.id +'">';
                            output += '<td>'+ val.id + '</td>';
                            output += '<td>'+ val.userName + '</td>';
                            output += '<td>'+ val.courseOrLesson + '</td>';
                            output += '<td>'+ val.content + '</td>';
                            output += '<td>'
                            output += '<a href="admin/comments/' + val.id +'" class="btn btn-warning">Detail</a>';
                            output+= '<button type="submit" class="btn btn-danger form-delete btn-delete-item search-delete-comment" data-title="Delete Comment" data-comment-id="'+ val.id + '" data-token="'+ val.token +'">Delete</button>'; 
                            output += '</td>'
                            output += '</tr>';
                        });
                        $('#list-search-comments').html(output);
                        output2 = '';
                        $('#search-no-result-comment').html(output2);
                        output3 = '';
                        $('#pagination').html(output3);
                    } else {
                        output1 = '';
                        output2 = 'No result';
                        $('#list-search-comments').html(output1);
                        $('#search-no-result-comment').html(output2);
                        output3 = '';
                        $('#pagination').html(output3);
                    }
                }
            });
        } else {
            location.reload();
        }
    }, 250));
});

// delete comment
$(document).ajaxComplete(function () {
    $('.search-delete-comment').on('click', function () {
        var delComment = confirm('Are you sure you want to delete?');
        if(delComment) {
            var commentId = $(this).data('comment-id');
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN' : $('meta[name=“csrf-token”]').attr('content')
                }
            });
            $.ajax({
                url: 'admin/comments/search/delete',
                type: 'DELETE',
                dataType: 'JSON',
                data: { "comment-id" : commentId, _token : $('meta[name="csrf-token"]').attr('content'),} ,
                success: function (data) {
                    // console.log(data);
                    $('.search-result[data-id='+ data + ']').remove();
                }
            });
        }
    });
});

// search vocabulary
$(document).ready(function () {
    $('#search-vocabulary').keyup(delay(function (e) {
        e.preventDefault();
        var query = $(this).val();
        // console.log(query);
        if (query != '' && query.length >= 1) {
            $.ajax({
                url: 'admin/vocabularies/search',
                method: "GET",
                data: { query: query },
                dataType: "JSON",
                success: function (data) {
                    // console.log(data);
                    if (data.length > 0) {
                        var output = '';
                        $.each(data, function (key, val) {
                        // console.log(val);
                            output += '<tr class="row search-result" data-id="'+ val.id +'">';
                            output += '<td style="text-align: center;">'+ val.id + '</td>';
                            output += '<td style="text-align: center;">'+ val.vocabulary + '</td>';
                            output += '<td style="text-align: center;">'+ val.phonetic_spelling + '</td>';
                            output += '<td style="text-align: center;">'+ val.word_type + '</td>';
                            output += '<td style="text-align: center;">'+ val.means + '</td>';
                            output += '<td style="cursor:pointer;text-align: center;">'
                            output += '<a type="button" class="uba_audioButton" >'
                            output += '<audio>'
                            output += '<source src="' + val.sound + '" type="audio/mpeg">'
                            output += '</audio>'
                            output += '</a>'
                            output += '</td>'
                            output += '<td style="text-align: center;">'
                            output += '<a href="admin/vocabularies/' + val.id +'" class="btn btn-warning">Detail</a>';
                            output += '</td>'
                            output += '<td style="text-align: center;">'
                            output += '<a href="admin/vocabularies/' + val.id +'/edit" class="btn btn-warning">Edit</a>';
                            output+= '<button type="submit" class="btn btn-danger form-delete btn-delete-item search-delete-vocabulary" data-title="Delete Vocabulary" data-vocabulary-id="'+ val.id + '" data-token="'+ val.token +'">Delete</button>'; 
                            output += '</td>'
                            output += '</tr>';
                        });
                        $('#list-search-vocabularies').html(output);
                        output2 = '';
                        $('#search-no-result-vocabulary').html(output2);
                        output3 = '';
                        $('#pagination').html(output3);
                    } else {
                        output1 = '';
                        output2 = 'No result';
                        $('#list-search-vocabularies').html(output1);
                        $('#search-no-result-vocabulary').html(output2);
                        output3 = '';
                        $('#pagination').html(output3);
                    }
                }
            });
        } else {
            location.reload();
        }
    }, 250));
});

// delete vocabulary
$(document).ajaxComplete(function () {
    $('.search-delete-vocabulary').on('click', function () {
        var delVocabulary = confirm('Are you sure you want to delete?');
        if(delVocabulary) {
            var vocabularyId = $(this).data('vocabulary-id');
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN' : $('meta[name=“csrf-token”]').attr('content')
                }
            });
            $.ajax({
                url: 'admin/vocabularies/search/delete',
                type: 'DELETE',
                dataType: 'JSON',
                data: { "vocabulary-id" : vocabularyId, _token : $('meta[name="csrf-token"]').attr('content'),} ,
                success: function (data) {
                    // console.log(data);
                    $('.search-result[data-id='+ data + ']').remove();
                }
            });
        }
    });
});
