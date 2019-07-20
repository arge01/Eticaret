<?php

namespace App\Http\Controllers;

use App\Models\UrunEkstralari;
use App\Models\UrunKategorileri;
use App\Models\Urunler;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\KoleksiyonMenu;
use App\Models\Gunluk;

class AnasayfaController extends Controller
{

    public function api(){

        if ( auth()->check() ) {
            $uye = auth()->user();
            auth()->user()->detay;
        }
        else {
            $uye = 'Tanımlı Değil';
        }
        $urun = Urunler::with(['urun_stok', 'urun_resimleri', 'urun_yorumlari'])->paginate(5);

        return response()->json([
            'uye'     => $uye,
            'urunler' => $urun
        ]);

    }

    public function anasayfa(){

        //sabitler
        $kategoriler = Kategori::whereRaw('ust_id is null')->get();
        $menuler = Menu::whereRaw('alt_menu is null')->get();

        //anasayfa
        $slider = Slider::all();
        $koleksiyon_menu = KoleksiyonMenu::all();
        $gunluk = Gunluk::orderBy('id', 'DESC')->take(6)->get();
        $son_veri = Gunluk::orderBy('id', 'DESC')->take(1)->first();
        $son_firsat = $son_veri->urunEkstrasi->urun_id;
        $son_firsat_urun = Gunluk::find($son_firsat);
        $haftanin_urunleri = UrunEkstralari::orderBy('urun_puani', 'DESC')->take(6)->get();
        $en_iyi_indirim = UrunEkstralari::orderBy('indirim_yuzdesi', 'DESC')->take(1)->first();
        $tum_urunler = Urunler::paginate(4);

        return view('anasayfa',
            compact(
                'kategoriler', 'menuler', 'slider', 'koleksiyon_menu', 'gunluk', 'son_firsat_urun', 'haftanin_urunleri', 'en_iyi_indirim', 'tum_urunler'
            ));

    }

    public function kategori($kategori_ana_link, $kategori_link){

        //sabitler
        $kategoriler = Kategori::whereRaw('ust_id is null')->get();
        $menuler = Menu::whereRaw('alt_menu is null')->get();

        //kategori sayfası
        $ana_kategori = Kategori::where('sef_link', $kategori_ana_link)->firstOrFail();
        $alt_kategori = Kategori::where('ust_id', $ana_kategori->id)->where('sef_link', $kategori_link)->firstOrFail();
        $tum_alt_kategoriler = Kategori::where('ust_id', $ana_kategori->id)->get();
        $urunler = UrunKategorileri::where('kategori_id', $alt_kategori->id)->orderBy('id', 'DESC')->paginate(9);

        return view('kategori',
            compact(
                'kategoriler', 'menuler', 'ana_kategori', 'alt_kategori', 'tum_alt_kategoriler', 'urunler'
            ));

    }

    public function urunler($urun_link){

        //sabitler
        $kategoriler = Kategori::whereRaw('ust_id is null')->get();
        $menuler = Menu::whereRaw('alt_menu is null')->get();

        //urunler sayfası
        $urun = Urunler::where('sef_link', $urun_link)->firstOrFail();
        $yorumlar = $urun->urun_yorumlari;

        $urun_kategorisi = UrunKategorileri::where('urun_id', $urun->id)->first();
        $alt_kategorisi = Kategori::where('id', $urun_kategorisi->kategori_id)->first();
        $ana_kategorisi = Kategori::where('id', $alt_kategorisi->ust_id)->first();

        $ilginizi_ceker = UrunKategorileri::where('kategori_id', $urun_kategorisi->kategori_id)
            ->where('urun_id', '!=' ,$urun->id)
            ->take(4)
            ->orderByRaw('RAND()')
            ->get();

        return view('urunler', compact(
            'urun', 'kategoriler', 'menuler', 'alt_kategorisi', 'ana_kategorisi', 'yorumlar', 'ilginizi_ceker'
        ));
    }
}
