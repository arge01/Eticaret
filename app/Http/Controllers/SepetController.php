<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Sepet;
use App\Models\SepetUrun;
use App\Models\Urunler;
use App\Models\UrunStoklari;
use function Faker\Provider\pt_BR\check_digit;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class SepetController extends Controller
{

    public function sepet()
    {

        //sabitler
        $kategoriler = Kategori::whereRaw('ust_id is null')->get();
        $menuler = Menu::whereRaw('alt_menu is null')->get();

        //ürünler
        $sepettekiurunler = Cart::content();
        $urunler = Urunler::all();

        return view('sepet', compact('sepettekiurunler', 'kategoriler', 'menuler', 'urunler'));

    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ekle()
    {

        $ID = request('ID');
        $urun = Urunler::find($ID);
        $urun_stoklari = UrunStoklari::where('urun_id', $urun->id)->first();

        $sepet = Cart::add($urun->id, $urun->urun_adi, 1, $urun->fiyati, [
            'stok_cinsi'  => $urun_stoklari->stok_cinsi,
            'stok_adedi'  => $urun_stoklari->stok_adedi,
            'renk_turu'   => $urun_stoklari->renkleri,
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

        if ( $sepet->qty === NULL ) {
            $sepet_adedi = 1;
        }else {
            $sepet_adedi = $sepet->qty;
        }

        if ( auth()->check() ){

            $sepet_id = session('sepet_id');
            if ( !isset($sepet_id) ){

                $sepet = Sepet::create([
                    'uye_id' => auth()->id()
                ]);

                $sepet_id = $sepet->id;
                session()->put('sepet_id', $sepet_id);

            }

            SepetUrun::updateOrCreate(
                [ 'sepet_id' => $sepet_id, 'urun_id' => $urun->id ],
                [
                    'adet' => $sepet_adedi,
                    'fiyati' => $urun->fiyati,
                    'durum' => 'Sepette',
                    'stok_cinsi' => $urun_stoklari->stok_cinsi,
                    'renkleri' => $urun_stoklari->renkleri
                ]
            );
        }

        return response()->json([
            'mesaj_tur'   => 'success',
            'mesaj'       => 'Ürün sepete eklendi',
            'sepet'       => $sepet,
            'toplam'      => $toplam,
            'urun_sayisi' => $urun_sayisi
        ]);

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

        $sepet_id = session('sepet_id');
        $rowID = request('rowID');
        $silinecek = Cart::get($rowID);
        $urun_id = $silinecek->id;

        Cart::remove($rowID);

        if ( auth()->check() ) {
            SepetUrun::where('sepet_id', $sepet_id)->where('urun_id', $urun_id)->delete();
        }

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
                    'stok_cinsi'  => $cart->options->stok_cinsi,
                    'stok_adedi'  => $cart->options->stok_adedi,
                    'renk_turu'   => $cart->options->renk_turu,
                    'size'        => $size,
                    'renk'        => $renk,
                    'eski_fiyati' => $cart->options->eski_fiyati,
                    'link'        => $cart->options->link,
                    'img'         => $cart->options->img,
                    'url'         => $cart->options->url
                ]
            ]);

            if ( auth()->check() ){
                $sepet_id = session('sepet_id');

                SepetUrun::where('sepet_id', $sepet_id)->where('urun_id', $cart->id)->update([
                    'size' => $size,
                    'renk' => $renk
                ]);
            }

        } else {

            Cart::update($rowId, $adet);

            if ( auth()->check() ) {
                $sepet_id = session('sepet_id');

                if( $adet == 0 ){
                    SepetUrun::where('sepet_id', $sepet_id)->where('urun_id', $cart->id)->delete();
                }else {
                    SepetUrun::where('sepet_id', $sepet_id)->where('urun_id', $cart->id)->update([
                        'adet' => $adet
                    ]);
                }
            }

        }

        return redirect()->back()
            ->with('mesaj_tur', 'success')
            ->with('mesaj', 'Ürün başarıyla güncellendi');
    }

    public function guncelle_get()
    {
        return back();
    }

    public function odeme(){
        if ( auth()->check() ) {
            return $this->kayitli_uye();
        }else{
            return $this->misafir();
        }
    }

    public function kayitli_uye(){

        $uye = auth()->user();
        auth()->user()->detay;
        auth()->user()->sepet;
        auth()->user()->sepet->sepet_urun;

        return response()->json([
            'uye' => $uye
        ]);
    }

    public function misafir(){

        $data = Cart::content();

        return response()->json([
            'data' => $data
        ]);
    }

}
