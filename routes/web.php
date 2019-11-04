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

/* testing the pages*/
Route::view('/login1','user.login');
Route::view('/register1','user.register');
Route::view('/about','user.about');
Route::view('/gallery','user.gallery');
Route::view('/connect','user.connect');

