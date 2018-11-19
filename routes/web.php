<?php

Route::view('/', 'welcome');
Route::view('/about','about')->name('about');
Route::view('/blog','blog')->name('blog');
Route::view('/contact','contact')->name('contact');

Auth::routes();

Route::view('/post/board', 'post.board');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/assign', 'RoleController@assign')->name('assign');

    Route::resource('profile', 'ProfileController');
    Route::resource('role', 'RoleController');
    Route::resource('post', 'PostController');
    Route::resource('category', 'CategoryController');
    Route::resource('user', 'UserController');
    Route::resource('comment', 'CommentController');

    Route::view('/stats', 'stats.index');
});

Route::get('/search/', 'PostController@search')->name('search');