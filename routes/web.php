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

Auth::routes();

Route::get('/home', 'PostController@index')->name('home');

Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/create', 'PostController@create')->middleware('auth')->name('posts.create');
Route::post('/posts', 'PostController@store')->middleware('auth')->name('posts.store');
Route::get('/posts/{post:slug}', 'PostController@show')->name('posts.show');
Route::get('/posts/{post:slug}/edit', 'PostController@edit')->middleware('auth')->name('posts.edit');
Route::put('/posts/{post:slug}', 'PostController@update')->middleware('auth')->name('posts.update');
Route::delete('/posts/{post:slug}', 'PostController@destroy')->middleware('auth')->name('posts.destroy');

Route::get('/tags', 'TagController@index')->name('tags.index');
Route::get('/tags/create', 'TagController@create')->name('tags.create');
Route::post('/tags', 'TagController@store')->middleware('auth')->name('tags.store');
Route::get('/tags/{tag:name}', 'TagController@show')->name('tags.show');
Route::get('/tags/{tag:name}/edit', 'TagController@edit')->middleware('auth')->name('tags.edit');
Route::put('/tags/{tag:name}', 'TagController@update')->middleware('auth')->name('tags.update');
Route::delete('/tags/{tag:name}', 'TagController@destroy')->middleware('auth')->name('tags.destroy');
