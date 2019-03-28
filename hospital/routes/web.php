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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');
Route::post('user/get_users', 'UserController@get_users');

Route::resource('header', 'HeaderController');
Route::get('header/dailyreport/{header}/{category}', 'HeaderController@dailyreport');
Route::post('header/dailyreport/{header}/{category}', 'HeaderController@dailyreport');
Route::get('header/monthlyreport/{header}/{category}', 'HeaderController@monthlyreport');
Route::post('header/monthlyreport/{header}/{category}', 'HeaderController@monthlyreport');

Route::resource('hospitalexpense', 'HospitalExpenseController');

Route::resource('otherexpense', 'OtherExpenseController');

Route::resource('stock', 'StockController');

Route::resource('test', 'TestController');

Route::resource('doctor', 'DoctorController');
Route::get('doctor/category/{type}', 'DoctorController@category')->name('doctor.category');
// Route::get('doctor/category/{type}', 'DoctorController.category')->name('doctor.category');

Route::resource('patient', 'PatientController');