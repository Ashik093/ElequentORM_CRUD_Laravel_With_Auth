<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/create-post','PostController@Store');
Route::get('/all-post','PostController@AllPost')->name('all.post');
