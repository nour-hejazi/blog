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


// Pages Routes
Route::get('/', 'PagesController@getIndex');

Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');

Route::get('about', 'PagesController@getAbout');

// Posts Routes
Route::resource('posts', 'PostController');


Route::resource('tags' ,'TagsController')->except(['create']);

Route::resource('comments', 'CommentsController')->except(['index', 'show', 'create']);
 


// Blog Routes
Route::get('blog/{id}', 'BlogController@getSingle')->name('blog.single');

Route::get('blog', 'BlogController@getIndex')->name('blog.index');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

