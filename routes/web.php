<?php

$this::group(['prefix' => ''], function(){
    $this::get('/', 'AnasayfaController@anasayfa')->name('anasayfa');
    $this->get('/kategori/{kategori_ana_link}/{kategori_link}', 'AnasayfaController@kategori')->name('kategori');
    $this->get('/urun/{urun_link}', 'AnasayfaController@urunler')->name('urunler');
});

Route::group(['middleware' => 'auth'], function (){
    //kulanıcı girişi olduysa
});

Route::group(['prefix' => 'sepet'], function (){
    Route::get('/', 'SepetController@sepet')->name('sepet');
    Route::get('/api', 'SepetController@sepetApi')->name('sepetApi');
    Route::post('/ekle', 'SepetController@ekle')->name('sepet.ekle');
    Route::get('/ekle', 'SepetController@ekle_get');
    Route::post('/kaldir', 'SepetController@kaldir')->name('sepet.kaldir');
    Route::get('/kaldir', 'SepetController@kaldir_get');
    Route::post('/guncelle', 'SepetController@guncelle')->name('sepet.guncelle');
    Route::get('/guncelle', 'SepetController@guncelle_get');
});

Route::group(['prefix' => 'oturum'], function(){
    Route::get('/ac', 'UyeController@giris_form')->name('oturum.ac');
    Route::post('/ac', 'UyeController@giris');
    Route::get('/kaydol', 'UyeController@kaydol_form')->name('oturum.kaydol');
    Route::post('/kaydol', 'UyeController@kayit');
    Route::post('/cikis', 'UyeController@cikis')->name('oturum.cikis');
});

Route::get('/satinal', 'SatinAlController@al')->name('satinal');
