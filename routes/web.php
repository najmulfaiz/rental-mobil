<?php

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('verify');

Route::group(['middleware' => ['auth']], function(){
    // ADMIN ROUTES
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function(){
        Route::get('home', 'HomeController@index')->name('home');
        Route::resource('user', 'UserController')->except(['show']);
        Route::resource('brand', 'BrandController')->except(['show']);
        Route::resource('type', 'TypeController')->except(['show']);
        Route::resource('voucher', 'VoucherController')->except(['show']);
    });

    // USER ROUTES
    Route::resource('user', 'UserController')->except(['index']);
    Route::patch('user/{user}/edit_photo', 'UserController@edit_photo')->name('user.edit_photo');

    // USER MOBIL ROUTES
    Route::resource('user/{user}/mobil', 'UserMobilController');

    // USER TRANSAKSI

});