<?php

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

// ROUTE PAGES
Route::get('/', 'PagesController@index');
Route::get('product', 'PagesController@product');
Route::get('login', 'PagesController@login');
Route::post('login', 'PagesController@getLogin');
Route::get('product/detail/{produk}', 'PagesController@show');
Route::get('product/search', 'PagesController@search');

// ROUTE ADMIN
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');

    Route::get('/password', 'AdminController@editPassword');
    Route::post('/password', 'AdminController@updatePassword');

    Route::get('/kategori/content', 'KategoriController@getContent');
    Route::get('/kategori/search', 'KategoriController@search');

    Route::get('/jenis-kain/content', 'JenisKainController@getContent');
    Route::get('/jenis-kain/search', 'JenisKainController@search');

    Route::get('/product/content', 'ProdukController@getContent');
    Route::get('/product/search', 'ProdukController@search');
    
    Route::resource('/kategori', 'KategoriController');
    Route::resource('/jenis-kain', 'JenisKainController');
    Route::resource('/product', 'ProdukController');

    Route::get('/cetak','AdminController@cetak');

    Route::get('/logout', 'AdminController@logout');
});

