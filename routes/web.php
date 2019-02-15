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

    Route::resource('lessons', 'LessonController');
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
        //Login by Social account
        Route::get('auth/{provider}', 'AuthController@redirectToProvider')->name('social');
        Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');
        //register
        Route::get('/register', 'AuthController@showRegisterForm')->name('register');
        Route::post('/register', 'AuthController@register')->name('register');
        Route::get('activation/{token}', 'AuthController@activation')->name('activation');

        Route::get('/profiles', 'ProfileController@show')->name('profiles.show');
        Route::get('/profiles/edit', 'ProfileController@edit')->name('profiles.edit');
        Route::put('/profiles', 'ProfileController@update')->name('profiles.update');

        Route::get('search/courses', 'HomeController@getListCourses')->name('courses.search');
    });
});

Route::group(['prefix' => 'user', 'namespace' => 'User', 'as' => 'user.', 'middleware' => 'userLogin'], function() {
});
