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
#
//Authentication Routes

//Route::get('login','Auth\LoginController@showLoginForm');
//
//Route::post('login','Auth\LoginController@login');
//
//Route::get('logout','Auth\LoginController@logout');
//
////Registration Routes
//
//Route::get('register','Auth\RegisterController@showRegistrationForm');
//
//Route::post('register','Auth\RegisterController@register');

Auth::routes();

//categories

Route::resource('categories', 'CategoryController',['except' =>['create']]);

Route::resource('tags', 'TagController',['except' =>['create']]);

//Comments

Route::post('/comments/{id}','CommentsController@store')->name('comments.store');

Route::get('/comments/{id}/edit','CommentsController@edit')->name('comments.edit');

Route::put('/comments/{id}','CommentsController@update')->name('comments.update');

Route::delete('/comments/{id}','CommentsController@destroy')->name('comments.destroy');

Route::get('/comments/{id}/delete','CommentsController@delete')->name('comments.delete');

Route::get('/logout','Auth\LoginController@logout' );

Route::get('blog/{slug}/','BlogController@getSingle')->name('blog.single')->where('slug','[\w\d\-\_]+');

Route::get('blog','BlogController@getIndex')->name('blog.index');

Route::get('/contact','PagesController@getContact');

Route::post('/contact','PagesController@postContact');

Route::get('/about' ,'PagesController@getAbout');

Route::get('/','PagesController@getIndex');

Route::resource('/posts','PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
