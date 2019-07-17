<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Urunler;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class SepetController extends Controller
{

    public function sepet()
    {

        //sabitler
        $kategoriler = Kategori::whereRaw('ust_id is null')->get();
        $menuler = Menu::whereRaw('alt_menu is null')->get();

        $sepettekiurunler = Cart::content();
        return view('sepet', compact('sepettekiurunler', 'kategoriler', 'menuler'));

    }

    public function ekle()
    {

        $ID = request('ID');
        $urun = Urunler::find($ID);
        $sepet = Cart::add($urun->id, $urun->urun_adi, 1, $urun->fiyati, [
            'size'        => '',
            'renk'        => '',
            'eski_fiyati' => $urun->eski_fiyati,
            'link'        => $urun->sef_link,
            'img'         => $urun->urun_img,
            'url'         => config('app.url')
        ]);

        if ( count(Cart::content())>0 ) {
            $toplam = Cart::subtotal();
            $urun_sayisi = Cart::count();
        }else{
            $toplam = 0;
            $urun_sayisi = 0;
        }

        return response()->json([
            'mesaj_tur'   => 'success',
            'mesaj'       => 'Ürün sepete eklendi',
            'sepet'       => $sepet,
            'toplam'      => $toplam,
            'urun_sayisi' => $urun_sayisi
        ]);
        /*return redirect()->back()
            ->with('mesaj_tur', 'success')
            ->with('mesaj', 'Ürün sepete eklendi');*/

    }

    public function sepetApi()
    {
        return Cart::content();
    }

    public function ekle_get()
    {
        return back();
    }

    public function kaldir_get()
    {
        return back();
    }

    public function kaldir()
    {

        $rowID = request('rowID');
        Cart::remove($rowID);
        return redirect()->back()
            ->with('mesaj_tur', 'danger')
            ->with('mesaj', 'Ürün sepetten kaldırıldı');
    }

    public function guncelle()
    {

        $rowId = request('rowId');
        $adet  = request('adet');
        $size  = request('size');
        $renk  = request('renk');

        $cart = Cart::get($rowId);

        if ( $size === NULL ) {
            $size = $cart->options->size;
        }

        if ( $renk === NULL ) {
            $renk = $cart->options->renk;
        }

        if ( $adet === NULL ) {

            Cart::update($rowId, [
                'options' => [
                    'size'        => $size,
                    'renk'        => $renk,
                    'eski_fiyati' => $cart->options->eski_fiyati,
                    'link'        => $cart->options->link,
                    'img'         => $cart->options->img,
                    'url'         => $cart->options->url
                ]
            ]);

        } else {

            Cart::update($rowId, $adet);

        }

        /*return response()->json([
            'adet'        => $adet,
            'size'        => $size,
            'renk'        => $renk,
            'eski_fiyati' => $cart->options->eski_fiyati,
            'link'        => $cart->options->link,
            'img'         => $cart->options->img,
            'url'         => $cart->options->url
        ]);*/

        return redirect()->back()
            ->with('mesaj_tur', 'success')
            ->with('mesaj', 'Ürün başarıyla güncellendi');
    }

    public function guncelle_get()
    {
        return back();
    }

}
