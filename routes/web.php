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
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::post('/posts', 'PostController@store')->name('posts.store');
Route::get('/posts/{post:slug}', 'PostController@show')->name('posts.show');
Route::get('/posts/{post:slug}/edit', 'PostController@edit')->name('posts.edit');
Route::put('/posts/{post:slug}', 'PostController@update')->name('posts.update');
Route::delete('/posts/{post:slug}', 'PostController@destroy')->name('posts.destroy');

Route::get('/tags', 'TagController@index')->name('tags.index');
Route::get('/tags/create', 'TagController@create')->name('tags.create');
Route::post('/tags', 'TagController@store')->name('tags.store');
Route::get('/tags/{tag:name}', 'TagController@show')->name('tags.show');
Route::get('/tags/{tag:name}/edit', 'TagController@edit')->name('tags.edit');
Route::put('/tags/{tag:name}', 'TagController@update')->name('tags.update');
Route::delete('/tags/{tag:name}', 'TagController@destroy')->name('tags.destroy');
