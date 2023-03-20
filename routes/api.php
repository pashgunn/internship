<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('shield:default')->prefix('v1')->group( function () {
    Route::get('cars',          ['uses' => 'App\Http\Controllers\CarController@index',   'as' => 'cars.index']);
    Route::post('cars',         ['uses' => 'App\Http\Controllers\CarController@store',   'as' => 'cars.store']);
    Route::patch('cars/{car}',  ['uses' => 'App\Http\Controllers\CarController@update',  'as' => 'cars.update']);
    Route::delete('cars/{car}', ['uses' => 'App\Http\Controllers\CarController@destroy', 'as' => 'cars.destroy']);
});
