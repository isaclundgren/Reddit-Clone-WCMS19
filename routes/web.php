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

Route::get('/posts/create', 'PostController@create')->name('create');

Route::post('/posts', 'PostController@store')->name('store');

Route::get('/posts/{post}', 'PostController@show')->name('show');

Route::delete('/posts/{post}', 'PostController@destroy')->name('destroy');

Route::get('/edit/post/{post}', 'PostController@edit')->name('edit');

Route::patch('/edit/post/{id}', 'PostController@update')->name('update');



// Route::match(['put', 'patch'], '/posts/update/{post}', 'PostController@update')->name('update');







Route::get('users', 'UserController@index')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


