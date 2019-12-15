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

Route::get('/','Home1Controller@home')->name('home1');
Route::get('/contact','Home1Controller@contact')->name('contact');
Route::resource('/posts','PostController');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');