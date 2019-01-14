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

    Route::resource('vocabularies', 'VocabularyController');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin\Auth'], function() {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::get('/home', 'HomeController@index')->name('home');
