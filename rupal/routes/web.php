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

Route::get('/', 'SitePagesController@index');

Route::get('/products', 'SitePagesController@products');

Route::get('/industry', 'SitePagesController@industry');

Route::get('/process', 'SitePagesController@processAndDesign');

Route::get('/consultants', 'SitePagesController@consultants');

Route::get('/partners', 'SitePagesController@partners');

Route::get('/strengths', 'SitePagesController@strengths');

Route::get('/gallery', 'SitePagesController@gallery');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


// Route::get('/home/files', 'FilesController@index');

// Route::get('/home/news', 'NewsController@index');

// Route::get('/home/users', 'UsersController@index');

Route::resource('files', 'FilesController');

Route::resource('news', 'NewsController');

Route::resource('users', 'UsersController');

Route::resource('sliderImages', 'SliderImagesController');
