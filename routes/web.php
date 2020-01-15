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

// Authentication Routes...
Route::get('cms', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('cms', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// CMS routes
Route::get('/cms/index', 'Admin\IndexController@index')->name('home');

Route::get('/cms/category', 'Admin\CategoryController@index')->name('cms/category');
Route::get('/cms/category/edit/{id}', 'Admin\CategoryController@edit')->name('cms/category/edit');
Route::post('/cms/category/edit/{id}', 'Admin\CategoryController@edit');
Route::get('/cms/category/add', 'Admin\CategoryController@add')->name('cms/category/add');
Route::post('/cms/category/add', 'Admin\CategoryController@add');
Route::get('/cms/category/delete/{id}', 'Admin\CategoryController@delete')->name('cms/category/delete');

Route::get('/cms/post', 'Admin\PostController@index')->name('cms/post');
Route::get('/cms/post/edit/{id}', 'Admin\PostController@edit')->name('cms/post/edit');
Route::post('/cms/post/edit/{id}', 'Admin\PostController@edit');
Route::get('/cms/post/add', 'Admin\PostController@add')->name('cms/post/add');
Route::post('/cms/post/add', 'Admin\PostController@add');
Route::get('/cms/post/delete/{id}', 'Admin\PostController@delete')->name('cms/post/delete');


Route::get('/', function () {
    return view('welcome');
});

