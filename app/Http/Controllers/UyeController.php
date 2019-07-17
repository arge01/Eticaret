<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use App\Uyeler;
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
        return redirect()->route('anasayfa');
    }

    public function giris(){

        $this->validate(request(), [
            'email' => 'required|email',
            'sifre' => 'required'
        ]);

        if (auth()->attempt(['email' => request('email'), 'password' => request('sifre')], request()->has('benihatirla'))) {

            request()->session()->regenerate();
            return redirect()->intended();

        }else{

            $errors = [
                'email' => 'Hatalı Giriş'
            ];
            return back()->withErrors($errors);

        }

    }

    public function cikis(){

        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('oturum.ac');

    }

}
