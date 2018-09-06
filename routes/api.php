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
    Route::get('brand', 'Admin\BrandController@api')->name('brand');
    // Route::get('type', 'TypeController@datatable')->name('type');
});

Route::group(['prefix' => 'datatable', 'as' => 'datatable.'], function(){
    Route::get('user', 'DatatableController@user')->name('user');
    Route::get('brand', 'DatatableController@brand')->name('brand');
    Route::get('type', 'DatatableController@type')->name('type');
    Route::get('voucher', 'DatatableController@voucher')->name('voucher');

    Route::get('user_mobil', 'DatatableController@user_mobil')->name('user_mobil');
});

Route::group(['prefix' => 'select2', 'as' => 'select2.'], function(){
    Route::get('brand', 'Select2Controller@brand')->name('brand');
    Route::get('type', 'Select2Controller@type')->name('type');
    Route::get('provinsi', 'Select2Controller@provinsi')->name('provinsi');
    Route::get('kota', 'Select2Controller@kota')->name('kota');
});