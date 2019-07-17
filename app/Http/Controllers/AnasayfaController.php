<?php

namespace App\Http\Controllers;

use App\Models\UrunEkstralari;
use App\Models\UrunKategorileri;
use App\Models\Urunler;
use App\Models\UrunYorumlari;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\KoleksiyonMenu;
use App\Models\Gunluk;

class AnasayfaController extends Controller
{

    /**
     * @return mixed
     */
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

    /**
     * @param $kategori_ana_link
     * @param $kategori_link
     */
    public function kategori($kategori_ana_link, $kategori_link){

        $data = [
            'data' => 'Burada % Data Var'
        ];
        printf($data['data'], "data");
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

    /**
     * @param $urun_link
     * @return mixed
     */
    public function urunler($urun_link){

        //sabitler
        $kategoriler = Kategori::whereRaw('ust_id is null')->get();
        $menuler = Menu::whereRaw('alt_menu is null')->get();

        //urunler sayfası
        $urun = Urunler::where('sef_link', $urun_link)->firstOrFail();
        $urun_kategorisi = UrunKategorileri::where('urun_id', $urun->id)->first();
        $alt_kategorisi = Kategori::where('id', $urun_kategorisi->kategori_id)->first();
        $ana_kategorisi = Kategori::where('id', $alt_kategorisi->ust_id)->first();
        $yorumlar = UrunYorumlari::where('urun_id', $urun->id)->get();
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
