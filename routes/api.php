<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('movies')->group(function() {
    Route::get('/titles-start/{channel}/{pp}', 'MovieController@titlesStart');
    Route::get('/titles-page/{channel}/{page}/{pp}', 'MovieController@titlesPage');
});

Route::prefix('series')->group(function() {
    Route::get('/titles-start/{channel}/{pp}', 'SeriesController@titlesStart');
    Route::get('/titles-page/{channel}/{page}/{pp}', 'SeriesController@titlesPage');
});
