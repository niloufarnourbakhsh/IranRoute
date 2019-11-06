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


    return view('main');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




/* admin URLs*/

Route::group(['middleware'=>'Admin'],function (){

    Route::get('/admin/user','AdminUserController@index');
    Route::delete('/user/delete/{id}','AdminUserController@destroy');


//admin post part
    Route::get('/admin','AdminPostsController@index');
    Route::get('/admin/post/create','AdminPostsController@create');
    Route::post('/admin/post/store','AdminPostsController@store')->name('create.post');
    Route::delete('/admin/post/delete/{id}','AdminPostsController@destroy');
    Route::get('/admin/post/edit/{id}','AdminPostsController@edit');
    Route::put('/admin/post/update/{id}','AdminPostsController@update');
    Route::put('/admin/post/Approve/{id}','AdminPostsController@Approve');
    Route::delete('/admin/delete/photo/{id}','PhotosController@destroy');
    Route::get('/admin/message','PostCommentController@index');
});


//pubic pages

Route::view('/about','user.about');
Route::get('/gallery','PhotosController@gallery');
Route::get('/showpost/{id}','AdminPostsController@showPost');
Route::post('/comment/create','PostCommentController@store');
Route::delete('/comment/delete/{id}','PostCommentController@delete');
Route::get('/contact','ContactFormController@create');
Route::post('/contact','ContactFormController@store');





