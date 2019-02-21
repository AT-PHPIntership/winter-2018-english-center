<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'adminLogin'], function() {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('users', 'UserController');

    Route::resource('courses', 'CourseController');

    Route::resource('levels', 'LevelController');

    Route::post('vocabularies/import', 'VocabularyController@importFile')->name('vocabularies.import');
    Route::resource('vocabularies', 'VocabularyController');

    Route::resource('exercises', 'ExerciseController');
    
    Route::resource('lessons', 'LessonController');

    Route::resource('comments', 'CommentController');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin\Auth'], function() {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::group(['prefix' => 'user', 'namespace' => 'User'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    
    Route::group(['as' => 'user.'], function() {
        Route::get('/login', 'AuthController@showLoginForm')->name('login');
        Route::post('/login', 'AuthController@login')->name('login');
        Route::get('/logout', 'AuthController@logout')->name('logout');
    });
    ;
});

Route::group(['middleware' => ['filter', 'userLogin'],'namespace' => 'User', 'as' => 'user.'], function() {
    Route::get('/', 'HomeController@index');
    Route::get('course', 'CourseController@index')->name('course');
    Route::get('/detail/course/{course}', 'CourseController@show')->name('course.detail');
    Route::get('/detail/lesson/{lesson}', 'LessonController@show')->name('lesson.detail');
    Route::post('user/lesson', 'LessonController@resutlLesson');
    Route::post('comment/{element}', 'CourseController@elementComment');
    Route::post('reply/{element}', 'CourseController@elementReply');
});
