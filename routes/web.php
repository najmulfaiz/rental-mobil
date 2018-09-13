<?php

Route::get('/', 'WebsiteController@landing');

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
    Route::resource('user/{user}/mobil', 'UserMobilController', ['names' => 'user_mobil']);

    // USER TRANSAKSI

});



// OTHER ROUTES
Route::get('list-produk', 'WebsiteController@list_produk')->name('website.list_produk');
Route::get('detail', 'WebsiteController@detail')->name('website.detail');
Route::get('tentang', 'WebsiteController@tentang')->name('website.tentang');
Route::get('kontak', 'WebsiteController@kontak')->name('website.kontak');
Route::get('mobil/{mobil_id}', 'WebsiteController@mobil')->name('website.mobil');

Route::post('pilih', 'WebsiteController@pilih')->name('website.pilih');
Route::get('pesan', 'WebsiteController@pesan')->name('website.pesan');
Route::post('pesan/simpan', 'WebsiteController@pesanStore')->name('website.pesan.store');
Route::get('transaksi/{transaksi_id}', 'WebsiteController@transaksi')->name('website.transaksi');