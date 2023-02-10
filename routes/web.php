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

Route::view('/', 'pages.homepage')->name('home');
Route::view('salons', 'pages.salons')->name('salons');
Route::view('about', 'pages.about')->name('about');
Route::view('contacts', 'pages.contacts')->name('contacts');
Route::view('sales-terms', 'pages.sales-terms')->name('sales-terms');
Route::view('finance-department', 'pages.finance-department')->name('finance-department');
Route::view('for-clients', 'pages.for-clients')->name('for-clients');
