<?php

use Illuminate\Support\Facades\Route;

Route::get('/',                    ['uses' => 'PagesController@homepage',             'as' => 'homepage']);
Route::get('about',                ['uses' => 'PagesController@about',                'as' => 'about']);
Route::get('contacts',             ['uses' => 'PagesController@contacts',             'as' => 'contacts']);
Route::get('sales-terms',          ['uses' => 'PagesController@salesTerms',           'as' => 'sales-terms']);
Route::get('finance-department',   ['uses' => 'PagesController@financeDepartment',    'as' => 'finance-department']);
Route::get('for-clients',          ['uses' => 'PagesController@forClients',           'as' => 'for-clients']);
Route::get('salons',               ['uses' => 'PagesController@salons',               'as' => 'salons']);
Route::get('articles',             ['uses' => 'PagesController@articles',             'as' => 'articles']);
