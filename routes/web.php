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
    return view('firstpage');
});
//EXTENDS AND YIELD RELATED ROUTES ARE HERE 
Route::get('/layout', function () {
    return view('layout');
});
Route::get('/first', function () {
    return view('first');
});
Route::get('/link', function () {
    return view('link');
});
//POST RELATED ROUTES ARE HERE
Route::post('/insert-post','PostController@insert_post');
Route::get('/all-post','PostController@all_post')->name('/all-post');
Route::get('/delete-post/{id}','PostController@delete_post');
Route::get('/edit-post/{id}','PostController@edit_post');
Route::post('/update-post/{id}','PostController@update_post');
//PASSWORD RELATED ROUTES ARE HERE
Route::get('/change-password','HomeController@change_password')->name('/change-password');
Route::post('/update-password','HomeController@update_password');
//NEWS RELATED ROUTES ARE HERE
Route::get('/add-news','NewsController@add_news')->name('/add-news');
Route::post('/insert-news','NewsController@insert_news');
Route::get('/all-news','NewsController@all_news')->name('/all-news');
Route::get('/delete-news/{id}','NewsController@delete_news');
Route::get('/view-news/{id}','NewsController@view_news');
//HOW TO SEND MAIL RELATED ROUTES ARE HERE
Route::get('/mail','MailController@mail_form');
Route::post('/send-mail','MailController@send_mail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
