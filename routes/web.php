<?php

Route::group(['prefix' => '', 'middleware' => 'pos.base.uri'], function(){
    Route::get('/', 'AnasayfaController@anasayfa')->name('anasayfa');
    Route::get('/kategori/{kategori_ana_link}/{kategori_link}', 'AnasayfaController@kategori')->name('kategori');
    Route::get('/urun/{urun_link}', 'AnasayfaController@urunler')->name('urunler');
    Route::get('/api', 'AnasayfaController@api')->name('api');
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
    Route::get('/satinal', 'SepetController@odeme')->name('satinal');
});

Route::group(['prefix' => 'oturum'], function(){
    Route::get('/ac', 'UyeController@giris_form')->name('oturum.ac');
    Route::post('/ac', 'UyeController@giris');
    Route::get('/kaydol', 'UyeController@kaydol_form')->name('oturum.kaydol');
    Route::post('/kaydol', 'UyeController@kayit');
    Route::post('/cikis', 'UyeController@cikis')->name('oturum.cikis');
});

Route::group(['prefix' => 'yonetim', 'namespace' => 'Yonetim'], function(){
    Route::redirect('/', config('app.url').'yonetim/oturumac');

    //oturum aç get-post
    Route::match(['get', 'post'],'/oturumac', 'AdminController@oturumac')->name('yonetim.oturumac');

    //middleware
    Route::group(['middleware' => 'yonetici'], function () {
        Route::match(['get', 'post'],'/anasayfa', 'AnasayfaController@anasayfa')->name('yonetim.anasayfa');
        Route::get('/oturumkapat', 'AdminController@oturumkapat')->name('yonetim.oturumkapat');

        //kategori yonetim
        Route::group(['prefix' => '/kategori'], function () {
            Route::match(['get', 'post'], '/', 'KategoriController@kategori')->name('yonetim.kategori');
            Route::match(['get', 'post'], '/sil', 'KategoriController@kategorisil')->name('yonetim.kategorisil');
            Route::match(['get', 'post'], '/ekle', 'KategoriController@kategoriform')->name('yonetim.kategoriekle');
            Route::match(['get', 'post'], '/duzenle/{id}', 'KategoriController@kategoriform')->name('yonetim.kategoriduzenle');
            Route::match(['get', 'post'], '/listele', 'KategoriController@kategorilistele')->name('yonetim.kategorilistele');
            Route::match(['get', 'post'], '/altkategorigetir', 'KategoriController@altkategorigetir')->name('yonetim.altkategorigetir');
        });

        //slider yonetim
        Route::group(['prefix' => '/banner'], function () {
            Route::match(['get', 'post'], '/', 'BannerController@ekle')->name('yonetim.banner.ekle');
            Route::match(['get', 'post'], '/listele', 'BannerController@listele')->name('yonetim.banner.listele');
            Route::match(['get', 'post'], '/sil', 'BannerController@sil')->name('yonetim.banner.sil');
            Route::match(['get', 'post'], '/duzenle/{id}', 'BannerController@duzenle')->name('yonetim.banner.duzenle');
        });

        //alt slider yonetim
        Route::group(['prefix' => '/alt_banner'], function () {
            Route::match(['get', 'post'], '/', 'AltBannerController@ekle')->name('yonetim.alt_banner.ekle');
            Route::match(['get', 'post'], '/listele', 'AltBannerController@listele')->name('yonetim.alt_banner.listele');
            Route::match(['get', 'post'], '/sil', 'AltBannerController@sil')->name('yonetim.alt_banner.sil');
            Route::match(['get', 'post'], '/duzenle/{id}', 'AltBannerController@duzenle')->name('yonetim.alt_banner.duzenle');
        });

        //menü yönetimi
        Route::group(['prefix' => '/menu'], function () {
            Route::match(['get', 'post'], '/', 'MenuController@ekle')->name('yonetim.menu.ekle');
            Route::match(['get', 'post'], '/listele', 'MenuController@listele')->name('yonetim.menu.listele');
            Route::match(['get', 'post'], '/duzenle/{id}', 'MenuController@duzenle')->name('yonetim.menu.duzenle');
            Route::match(['get', 'post'], '/sil', 'MenuController@sil')->name('yonetim.menu.sil');
            Route::match(['get', 'post'], '/altmenugetir', 'MenuController@altmenugetir')->name('yonetim.altmenu.getir');
        });

        //ürün yönetimi
        Route::group(['prefix' => '/urun'], function () {
            Route::match(['get', 'post'], '/', 'UrunController@ekle')->name('yonetim.urun.ekle');
            Route::match(['get', 'post'], '/duzenle/{id}', 'UrunController@guncelle')->name('yonetim.urun.guncelle');
            Route::match(['get', 'post'], '/listele', 'UrunController@listele')->name('yonetim.urun.listele');
            Route::match(['get', 'post'], '/sil', 'UrunController@sil')->name('yonetim.urun.sil');
        });

        //referans yonetim
        Route::group(['prefix' => '/referans'], function () {
            Route::match(['get', 'post'], '/', 'ReferansController@ekle')->name('yonetim.referans.ekle');
            Route::match(['get', 'post'], '/duzenle/{id}', 'ReferansController@guncelle')->name('yonetim.referans.guncelle');
            Route::match(['get', 'post'], '/listele', 'ReferansController@listele')->name('yonetim.referans.listele');
            Route::match(['get', 'post'], '/sil', 'ReferansController@sil')->name('yonetim.referans.sil');
        });

        //içerik yönetimi
        Route::group(['prefix' => '/icerik'], function () {
            Route::match(['get', 'post'], '/', 'IcerikController@ekle')->name('yonetim.icerik.ekle');
            Route::match(['get', 'post'], '/ekle', 'IcerikController@anaekle')->name('yonetim.ana.icerik.ekle');
            Route::match(['get', 'post'], '/duzenle/{id}', 'IcerikController@guncelle')->name('yonetim.icerik.guncelle');
            Route::match(['get', 'post'], '/listele', 'IcerikController@listele')->name('yonetim.icerik.listele');
            Route::match(['get', 'post'], '/sil', 'IcerikController@sil')->name('yonetim.icerik.sil');
        });

        //alt resimler
        Route::group(['prefix' => '/resim'], function () {
            Route::match(['get', 'post'], '/ekle/{id}', 'ResimController@ekle')->name('yonetim.resim.ekle');
            Route::match(['get', 'post'], '/sil', 'ResimController@sil')->name('yonetim.resim.sil');
            Route::match(['get', 'post'], '/listele', 'ResimController@listele')->name('yonetim.resim.listele');
            Route::match(['get', 'post'], '/duzenle/{id}', 'ResimController@duzenle')->name('yonetim.resim.duzenle');
        });

    });

});
