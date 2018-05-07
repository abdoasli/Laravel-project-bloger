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

use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/post','PostController');

Route::get('/post/page/{page}','PaginationController@page');


Route::post('/search','SearchController@search');
Route::post('/search/page/{page}','SearchController@searchPage');


Route::get('/test',function(){
	echo Illuminate\Support\Facades\Auth::user()->id;
});


Route::resource('/comment','CommentController');
Route::post('/comment/{post_id}','CommentController@store');