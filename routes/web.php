<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::namespace('Front')->group( function () {
    Route::get('/', 'FrontController@login');
});

Auth::routes(['register' => false]);

 Route::group(['middleware' => ['auth']], function () {

     Route::namespace('Admin')->group(function () {
         Route::get('/home', 'AdminController@homePage')->name('home');
         Route::resource('user', 'UserController');
     });

     Route::namespace('Resources')->group(function () {
         // Aktiva
         // TODO: Add rekap guna dan non-guna (bulanan? Per kategori?)
         Route::prefix('aktiva')->group(function () {
             // Route::get('/dump', 'AktivaController@dump');
             // Route::get('/{id}/show', 'AktivaController@show')->name('aktiva.show');
             //Route::get('/{id}/edit', 'AktivaController@edit')->name('aktiva.edit');
             Route::get('/categories', 'AktivaController@indexOfCategories')->name('aktiva.indexOfCategories');
             // Route::get('/{year}/{month}/categories', 'AktivaController@indexOfCategoriesByTime')->name('aktiva.indexOfCategoriesByTime');
             Route::get('/{year}/{month}/{category}/index/{status_guna}', 'AktivaController@indexByTimeAndCategory')->name('aktiva.indexByTimeAndCategory')
                 ->where('status_guna', 'guna|non_guna|jual|non_kapitalisasi')
                 ->where('category', 'tanah|bangunan|kendaraan|peralatan_kantor|peralatan_komputer|lain-lain');
             Route::get('/{category}/index/{status_guna}', 'AktivaController@indexByCategory')->name('aktiva.indexByCategory')
                 ->where('status_guna', 'guna|non_guna|jual|non_kapitalisasi')
                 ->where('category', 'tanah|bangunan|kendaraan|peralatan_kantor|peralatan_komputer|lain-lain');
             Route::get('/{category}/create', 'AktivaController@create')->name('aktiva.create')
                 ->where('category', 'tanah|bangunan|kendaraan|peralatan_kantor|peralatan_komputer|lain-lain');
             Route::get('/{id}/history', 'AktivaController@history')->name('aktiva.history');
             Route::get('/{year}/{month}/{category}/export/{status_guna}', 'AktivaController@exportbyCategoryAndTime')->name('aktiva.exportbyCategoryAndTime');
             Route::get('/{category}/export/{status_guna}', 'AktivaController@exportbyCategoryNonKapitalisasi')->name('aktiva.exportbyCategoryNonKapitalisasi');
             Route::get('/{year}/{month}/{category}/report/{status_guna}', 'AktivaController@reportbyCategoryAndTime')->name('aktiva.reportbyCategoryAndTime');
         });
         Route::resource('aktiva','AktivaController', ['only' => ['store', 'edit', 'update', 'destroy']]);

         // Barang
         Route::prefix('barang')->group(function () {
             Route::get('/index', 'BarangController@indexOfCategories')->name('barang.indexOfCategories');
             Route::get('/{category}/index', 'BarangController@indexByCategory')->name('barang.indexByCategory')
                 ->where('category', 'tanah|bangunan|kendaraan|peralatan_kantor|peralatan_komputer|lain-lain');
             Route::get('/{category}/create', 'BarangController@create')->name('barang.create')
                 ->where('category', 'tanah|bangunan|kendaraan|peralatan_kantor|peralatan_komputer|lain-lain');
             Route::get('/{category}/{id}/edit', 'BarangController@edit')->name('barang.edit')
                 ->where('category', 'tanah|bangunan|kendaraan|peralatan_kantor|peralatan_komputer|lain-lain');
             Route::get('/{category}/{id}/show', 'BarangController@show')->name('barang.show')
                 ->where('category', 'tanah|bangunan|kendaraan|peralatan_kantor|peralatan_komputer|lain-lain');
             Route::get('/search', 'BarangController@search')->name('barang.search');
             Route::get('/{category}/search', 'BarangController@searchByCategory')->name('barang.searchByCategory')
                 ->where('category', 'tanah|bangunan|kendaraan|peralatan_kantor|peralatan_komputer|lain-lain');
             Route::get('/{id}/peminjaman_history', 'BarangController@peminjamanHistory')->name('barang.peminjamanHistory');
             Route::get('/{id}/approve', 'BarangController@approve')->name('barang.approve');
         });
         Route::resource('barang','BarangController', ['only' => ['store', 'update', 'destroy']]);

         // Peminjaman
         // TODO: what
         Route::get('/peminjaman/requests', 'PeminjamanController@requests')->name('peminjaman.requests');
         Route::get('/peminjaman/{id}/approve', 'PeminjamanController@approve')->name('peminjaman.approve');
         Route::get('/peminjaman/{id}/tolak', 'PeminjamanController@tolak')->name('peminjaman.tolak');
         Route::resource('peminjaman', 'PeminjamanController');

     });

     Route::namespace('Settings')->group( function () {
         //Route::resource('konfigurasi','KonfigurasiController', ['only' => 'show', 'edit', 'update']);
         Route::get('/konfigurasi', 'KonfigurasiController@show')->name('konfigurasi.show');
         Route::get('/konfigurasi/edit', 'KonfigurasiController@edit')->name('konfigurasi.edit');
         Route::put('/konfigurasi/update', 'KonfigurasiController@update')->name('konfigurasi.update');
     });

 });


