<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/posts', 'PostController@index');

Route::get('/posts/create/{subreddit}', 'PostController@create')->name('create');

Route::post('/posts/create/{subreddit}', 'PostController@store')->name('store');

Route::get('/posts/{post}', 'PostController@show')->name('show');

Route::delete('/posts/{post}', 'PostController@destroy')->name('destroy');

Route::get('/edit/post/{post}', 'PostController@edit')->name('edit');

Route::patch('/edit/post/{id}', 'PostController@update')->name('update');

//SubReddits

Route::get('/subreddits', 'SubredditController@index');

Route::get('/subreddits/create', 'SubredditController@create')->name('create');

Route::post('/subreddits', 'SubredditController@store')->name('store');

Route::get('/subreddits/{subreddit}', 'SubredditController@show')->name('subreddit.show');



Route::get('users', 'AdminController@index')->middleware('auth');

Route::get('user', 'UserController@index')->middleware('auth');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


