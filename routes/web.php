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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin','auth']], function() {
    Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('profile', 'AdminController@profile')->name('admin.dashboard.profile');
    Route::get('settings', 'AdminController@settings')->name('admin.dashboard.settings');
    Route::resource('inns', 'InnController');
    Route::resource('freebies', 'FreebiesController');
    Route::resource('rooms', 'RoomControllers');
    Route::resource('room_rates', 'RoomRatesController');
    Route::resource('transactions', 'TransactionController');
});

Route::group(['prefix' => 'user', 'middleware' => ['isUser','auth']], function() {
    Route::get('dashboard', 'UserController@index')->name('user.dashboard');
    Route::get('profile', 'UserController@profile')->name('user.dashboard.profile');
    Route::get('settings', 'UserController@settings')->name('user.dashboard.settings');
    Route::resource('rooms-manager', 'RoomManagerController');
    Route::resource('inns-manager', 'InnManagerController');
    Route::resource('freebies-manager', 'FreebiesManagerController');
    Route::resource('transactions-manager', 'TransactionManagerController');
});