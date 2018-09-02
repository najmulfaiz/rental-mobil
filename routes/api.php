<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'api.'], function(){
    Route::get('brand', 'BrandController@api')->name('brand');
    // Route::get('type', 'TypeController@datatable')->name('type');
});

Route::group(['prefix' => 'datatable', 'as' => 'datatable.'], function(){
    Route::get('user', 'UserController@datatable')->name('user');
    Route::get('brand', 'BrandController@datatable')->name('brand');
    Route::get('type', 'TypeController@datatable')->name('type');
});
