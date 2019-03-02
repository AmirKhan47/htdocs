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

Route::get('/welcome', function ()
{
    return view('welcome');
});

// Site Routes
Route::get('/', 'WebsiteController@index');
Route::get('/our_services', 'WebsiteController@our_services');
Route::get('/our_expertise', 'WebsiteController@our_expertise');
Route::get('/our_strengths', 'WebsiteController@our_strengths');
Route::get('/contact_us', 'WebsiteController@contact_us');
// {
    // $images = Slider::all();
    // $images = DB::table('sliders')->get();
    // dd($images[0]['image1_name']);
    // return view('index', ['images' => $images]);
// });

// Route::get('/portfolio', function ()
// {
//     return view('portfolio');
// });

// Route::get('/about', function ()
// {
//     return view('about');
// });

// Route::get('/blog-home', function ()
// {
//     return view('blog-home');
// });

// Route::get('/blog-single', function ()
// {
//     return view('blog-single');
// });

// Route::get('/portfolio-details', function ()
// {
//     return view('portfolio-details');
// });

// Route::get('/elements', function ()
// {
//     return view('elements');
// });

// Route::get('/contact', function ()
// {
//     return view('contact');
// });

// Admin Routes
// Route::get('/login', function ()
// {
//     return view('admin/login');
// });

Route::get('/login', 'LoginController@login');
Route::post('/login', 'LoginController@login');

Route::get('/logout', 'LoginController@logout');

Route::get('/admin', 'AdminController@index');

Route::get('/admin/user', 'AdminController@user');
Route::post('/admin/user', 'AdminController@user');

Route::get('/admin/update_user/{admin_id}', 'AdminController@update_user');
Route::post('/admin/update_user', 'AdminController@update_user');

Route::get('/admin/delete_user/{admin_id}', 'AdminController@delete_user');

Route::get('/admin/file', 'AdminController@file');
Route::post('/admin/file', 'AdminController@file');

Route::get('/admin/profile', 'AdminController@profile');
Route::post('/admin/profile', 'AdminController@profile');

Route::get('/admin/slider', 'AdminController@slider');
Route::post('/admin/slider', 'AdminController@slider');

Route::get('/admin/header', 'AdminController@header');
Route::post('/admin/header', 'AdminController@header');

Route::get('/admin/home', 'AdminController@home');
Route::post('/admin/home', 'AdminController@home');

Route::get('/admin/news', 'AdminController@news');
Route::post('/admin/news', 'AdminController@news');

// Route::get('/admin/profile/', 'AdminController@store');
// Route::get('/admin/profile', 'UserController@edit');
// Route::resource('/admin/slider', 'SliderController');
// Route::get('/admin/header', 'AdminController@header');

// Route::get('/admin/add', function ()
// {
//     return view('admin/add');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
