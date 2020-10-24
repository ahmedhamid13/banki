<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::resource('banks', 'App\Http\Controllers\BankController')->middleware('auth');
Route::resource('accounts', 'App\Http\Controllers\AccountController')->middleware('auth');
Route::put('/accounts/deactivate/{account}', 'App\Http\Controllers\AccountController@deactivate')->name('accounts.deactivate')->middleware('password.confirm');
Route::resource('transactions', 'App\Http\Controllers\TransactionController')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
