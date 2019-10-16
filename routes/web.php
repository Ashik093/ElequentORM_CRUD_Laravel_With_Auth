<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/create-post','PostController@Store');
Route::get('/all-post','PostController@AllPost')->name('all.post');
Route::get('/delete-post/{id}','PostController@Delete');
Route::get('/edit-post/{id}','PostController@Edit');
Route::post('/update-post/{id}','PostController@Update');
