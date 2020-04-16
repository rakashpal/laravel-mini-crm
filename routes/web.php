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

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::get('login','UserController@index')->name('login');
    Route::post('check_user','UserController@login');

    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard','DashboardController@index');
        Route::get('logout','UserController@logout');
        Route::resource('companies','CompanyController');
        Route::resource('employees','EmployeeController');
    });
});

