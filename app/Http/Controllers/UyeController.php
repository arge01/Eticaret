<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Sepet;
use App\Models\SepetUrun;
use App\Models\UrunStoklari;
use App\Uyeler;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UyeController extends Controller
{

    public function __construct(){
        $this->middleware('guest')
            ->except('cikis');
    }

    public function kaydol_form(){ //kayıt olmak için açılacak sayfa

        //sabitler
        $kategoriler = Kategori::whereRaw('ust_id is null')->get();
        $menuler = Menu::whereRaw('alt_menu is null')->get();

        return view('kaydol-form', compact('kategoriler', 'menuler'));
    }

    public function giris_form(){ //giriş yapmak için açılacak sayfa

        //sabitler
        $kategoriler = Kategori::whereRaw('ust_id is null')->get();
        $menuler = Menu::whereRaw('alt_menu is null')->get();

        return view('giris-form', compact('kategoriler', 'menuler'));
    }

    public function kayit(){ //kayıt olmak için post işlemi

        $this->validate(request(), [
            'adsoyad' => 'required|min:4|max:65',
            'email'   => 'required|email|unique:Uyeler',
            'sifre'   => 'required|confirmed|min:8|max:120'
        ]);

        $Uye = Uyeler::create([
            'adsoyad'             => request('adsoyad'),
            'email'               => request('email'),
            'sifre'               => Hash::make(request('sifre')),
            'aktivasyon_anahtari' => Str::random(65),
            'aktivasyon_durumu'   => 1
        ]);

        auth()->login($Uye);
        $sepet_id = auth()->id();
        Sepet::create(['uye_id' => $sepet_id]);
        session()->put('sepet_id', $sepet_id);

        if ( Cart::count() > 0 ) {

            foreach ( Cart::content() as $sepettekiler ) {

                SepetUrun::create(
                    [
                        'sepet_id'   => $sepet_id,
                        'urun_id'    => $sepettekiler->id,
                        'stok_cinsi' => $sepettekiler->options->stok_cinsi,
                        'renkleri'   => $sepettekiler->options->renk_turu,
                        'adet'       => $sepettekiler->qty,
                        'fiyati'     => $sepettekiler->price,
                        'durum'      => 'sepette',
                        'size'       => $sepettekiler->options->size,
                        'renk'       => $sepettekiler->options->renk
                    ]
                );

            }

        }

        Cart::destroy();
        $eklenen_urunler = SepetUrun::where('sepet_id', $sepet_id)->get();

        foreach ( $eklenen_urunler as $urunler ){
            Cart::add($urunler->urun->id, $urunler->urun->urun_adi, 1, $urunler->urun->fiyati, [
                'stok_cinsi'  => $urunler->stok_cinsi,
                'stok_adedi'  => $urunler->adet,
                'renk_turu'   => $urunler->renkleri,
                'size'        => $urunler->size,
                'renk'        => $urunler->renk,
                'eski_fiyati' => $urunler->urun->eski_fiyati,
                'link'        => $urunler->urun->sef_link,
                'img'         => $urunler->urun->urun_img,
                'url'         => config('app.url')
            ]);
        }

        return redirect()->route('anasayfa');
    }

    public function giris(){

        $this->validate(request(), [
            'email' => 'required|email',
            'sifre' => 'required'
        ]);

        if (auth()->attempt(['email' => request('email'), 'password' => request('sifre')], request()->has('benihatirla'))) {

            request()->session()->regenerate();

            $sepet_id = Sepet::firstOrCreate(['uye_id' => auth()->id()])->id;
            session()->put('sepet_id', $sepet_id);

            if ( Cart::count() > 0 ) {

                foreach ( Cart::content() as $sepettekiler ) {

                    SepetUrun::updateOrCreate(
                        [ 'sepet_id' => $sepet_id, 'urun_id' => $sepettekiler->id ],
                        [
                            'stok_cinsi' => $sepettekiler->options->stok_cinsi,
                            'renkleri'   => $sepettekiler->options->renk_turu,
                            'adet'       => $sepettekiler->qty,
                            'fiyati'     => $sepettekiler->price,
                            'durum'      => 'sepette',
                            'size'       => $sepettekiler->options->size,
                            'renk'       => $sepettekiler->options->renk
                        ]
                    );

                }

            }

            Cart::destroy();
            $eklenen_urunler = SepetUrun::where('sepet_id', $sepet_id)->get();

            foreach ( $eklenen_urunler as $urunler ){
                Cart::add($urunler->urun->id, $urunler->urun->urun_adi, 1, $urunler->urun->fiyati, [
                    'stok_cinsi'  => $urunler->stok_cinsi,
                    'stok_adedi'  => $urunler->adet,
                    'renk_turu'   => $urunler->renkleri,
                    'size'        => $urunler->size,
                    'renk'        => $urunler->renk,
                    'eski_fiyati' => $urunler->urun->eski_fiyati,
                    'link'        => $urunler->urun->sef_link,
                    'img'         => $urunler->urun->urun_img,
                    'url'         => config('app.url')
                ]);
            }

            return redirect()->intended();

        }else{

            $errors = [
                'email' => 'Hatalı Giriş'
            ];
            return back()->withInput()->withErrors($errors);

        }

    }

    public function cikis(){

        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('oturum.ac');

    }

}
