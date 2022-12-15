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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin', 'AdminController@index')->name('admin');
Route::get('staff', 'StaffController@index')->name('staff');
Route::get('manager', 'ManagerController@index')->name('manager');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::post('requisition', 'StaffController@sendNewRequest')->name('requisition');
Route::post('confirm_request', 'ManagerController@confirm_request')->name('confirm_request');
Route::post('reject_request', 'ManagerController@reject_request')->name('reject_request');