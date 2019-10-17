<?php


Route::get('/', function () {
    return view('first_page');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::post('/create-post','PostController@Store');
Route::get('/all-post','PostController@AllPost')->name('all.post');
Route::get('/delete-post/{id}','PostController@Delete');
Route::get('/edit-post/{id}','PostController@Edit');
Route::post('/update-post/{id}','PostController@Update');
Route::get('pasword-change','HomeController@ChangePassword')->name('change.password');
Route::post('update-password','HomeController@UpdatePassword');
Route::get('add-news','PostController@AddNews')->name('add.news');
Route::post('create-news','PostController@CreateNews');
Route::get('all-news','PostController@AllNews')->name('all.news');
Route::get('/delete-post/{id}','PostController@DeletePost');
Route::get('/view-news/{id}','NewsController@ViewSingleNews');


