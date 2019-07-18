<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Kategori;
use App\Models\UrunEkstralari;
use App\Models\UrunKategorileri;
use App\Models\Urunler;
use App\Models\UrunStoklari;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class UrunController extends Controller
{
    public function ekle()
    {
        $gelen = new Urunler;
        $yeni_id = Input::get('id');
        $kategoriler = Kategori::whereRaw('ust_id is null')->get();
        if (request()->isMethod('post')) {
            $this->validate(request(), ['title' => 'required|min:3|max:500', 'img' => 'required']);
            if (request()->hasFile('img')) {
                $this->validate(request(), ['img' => 'image|mimes:jpeg,png,gif,jpg,JPEG|max:4096']);
                $resim = request()->file('img');
                $resim_adi = $resim->hashName();
                Image::make($resim->getRealPath())->fit(270, 360)->save(public_path('img/' . $resim_adi));
            }
            $data = [
                'urun_adi' => request('title'),
                'sef_link' => str_slug(request('link')),
                'urun_kategorileri' => request('alt_kategori'),
                'urun_img' => $resim_adi,
                'urun_aciklama' => request('text'),
                'eski_fiyati' => request('eski_fiyati'),
                'fiyati' => request('fiyati'),
            ];
            //return $data;
            $ekle = Urunler::create($data);
            UrunKategorileri::create([
                'urun_id' => $ekle->id,
                'kategori_id' => $data['urun_kategorileri'],
            ]);
            $ID = $ekle->id;
            $stok_adedi = [
                'urun_id' => $ID,
                'stok_turu' => request('stok_turu'),
                'stok_adedi' => request('stok_adedi'),
                'renkleri' => request('renkleri'),
                'marka' => request('marka'),
                'stok_cinsi' => request('stok_cinsi'),
            ];
            $urun_esktralari = [
                'urun_id' => $ID,
            ];
            UrunStoklari::create($stok_adedi);
            UrunEkstralari::create($urun_esktralari);

            return back()->with(['mesaj_tur' => 'success', 'mesaj' => 'Ekleme işlemi başarılı', 'eklenen' => $ekle]);
        } else {
            return view('yonetim.urun.ekle', compact('gelen', 'kategoriler', 'yeni_id'));
        }
    }
    public function guncelle($id)
    {
        $gelen = Urunler::where('id', $id)->firstOrFail();
        $kategoriler = Kategori::whereRaw('ust_id is null')->get();
        if (request()->isMethod('post')) {
            $this->validate(request(), ['title' => 'required|min:3|max:500', 'text' => 'required']);
            if (request()->hasFile('img')) {
                $this->validate(request(), ['img' => 'image|mimes:jpeg,png,gif,jpg,JPEG|max:4096']);
                $resim = request()->file('img');
                $resim_adi = $gelen->urun_img;
                Image::make($resim->getRealPath())->fit(270, 360)->save(public_path('img/' . $resim_adi));
            } else {
                $resim_adi = $gelen->urun_img;
            }
            $data = [
                'urun_adi' => request('title'),
                'sef_link' => str_slug(request('link')),
                'urun_kategorileri' => request('alt_kategori'),
                'urun_img' => $resim_adi,
                'urun_aciklama' => request('text'),
                'eski_fiyati' => request('eski_fiyati'),
                'fiyati' => request('fiyati'),
            ];

            $stok_adedi = [
                'stok_turu' => request('stok_turu'),
                'stok_adedi' => request('stok_adedi'),
                'renkleri' => request('renkleri'),
                'marka' => request('marka'),
                'stok_cinsi' => request('stok_cinsi'),
            ];
            $ekle_stok_adedi = UrunStoklari::where('urun_id', $gelen->id)->update($stok_adedi);

            $guncelle = Urunler::where('id', request('id'))->firstOrFail();
            $guncelle->update($data);

            return back()->with(['mesaj_tur' => 'success', 'mesaj' => 'Güncelleme İşlemi Başarılı', 'eklenen' => $guncelle]);
        } else {
            return view('yonetim.urun.duzenle', compact('gelen', 'kategoriler'));
        }
    }
    public function sil()
    {
        if ( request()->isMethod('post') ) {
            $ID = request('ID');
            $delete = Urunler::where('id', $ID)->firstOrfail();

            $path = public_path('img/'.$delete->urun_img);
            if (file_exists($path)) {
                unlink($path);
            }

            UrunEkstralari::where('urun_id', $delete->id)->delete();
            UrunStoklari::where('urun_id', $delete->id)->delete();
            UrunKategorileri::where('urun_id', $delete->id)->delete();
            $delete->delete();

            return response()->json(['mesaj_tur' => 'success', 'mesaj' => 'Silindi', 'data' => $delete]);
        } else {
            return back();
        }
    }
    public function listele()
    {
        $id = Input::get('id');
        if ( $id != NULL ) {
            $urunler = Urunler::where('urun_kategorileri', $id)->get();
            return view('yonetim.urun.listele', compact('urunler'));
        } else {
            $urunler = Urunler::all();
            return view('yonetim.urun.listele', compact('urunler'));
        }
    }
}
