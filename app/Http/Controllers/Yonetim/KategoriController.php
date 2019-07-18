<?php

namespace App\Http\Controllers\Yonetim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Carbon\Carbon;

class KategoriController extends Controller
{

    public function kategori(){

        if ( request()->isMethod('post') ) {

            $ID = request('ID');
            $kategori_adi  = request('kategori_adi');
            $kategori_link = request('kategori_link');

            if ( $ID > 0 ) {

                $update = Kategori::where('id', $ID)->firstOrfail();
                $update->update([
                    'kategori_adi' => $kategori_adi
                ]);

                $data = [
                    'ID' => $update->id,
                    'kategori_adi' => $update->kategori_adi
                ];

                return response()->json([
                    'mesaj_tur' => 'success',
                    'mesaj'     => 'Güncellendi',
                    'data'      => $data
                ]);

            } else {

                if ( $kategori_adi != NULL and $kategori_link != NULL ) {

                    $kategori_link = str_slug($kategori_link);

                    $add = Kategori::create([
                        'kategori_adi' => $kategori_adi,
                        'sef_link'     => $kategori_link,
                    ]);

                    $data = [
                        'ID'               => $add->id,
                        'kategori_adi'     => $add->kategori_adi,
                        'kategori_link'    => $add->sef_link,
                        'olusturma_tarihi' => date('m-d-Y', strtotime($add->olusturma_tarihi))
                    ];

                    return response()->json([
                        'mesaj_tur' => 'success',
                        'mesaj'     => 'Eklendi',
                        'data'      => $data
                    ]);

                } else {

                    $data = ['ID' => $ID, 'kategori_adi' => $kategori_adi, 'kategori_link' => $kategori_link];
                    return response()->json(['mesaj_tur' => 'success', 'mesaj' => 'Alanlar Boş', 'data' => $data]);

                }

            }

        } else {

            $kategoriler = Kategori::whereRaw('ust_id is null')->get();
            $altkategoriler = Kategori::whereRaw('ust_id > 0')->get();
            $tarih = Carbon::now();

            return view('yonetim.kategori', compact('kategoriler', 'altkategoriler', 'tarih'));

        }

    }

    public function kategorisil(){

        if ( request()->isMethod('post') ) {

            $ID = request('ID');
            $delete = Kategori::where('id', $ID)->firstOrfail();
            $delete->delete();

            /*$alt_delete = Kategori::where('ust_id', $ID)->firstOrfail();
            $alt_delete->delete();*/

            return response()->json(['mesaj_tur' => 'success', 'mesaj' => 'Silindi', 'data' => $delete]);

        } else {

            return back();

        }

    }

    public function kategoriform($id = 0){

        if ( $id > 0 ) { // gelen id varsa

            $gelen = Kategori::where('id', $id)->with('children')->firstOrFail();

            if ( $gelen->ust_id > 0 ) { //gelen alt kategoriyse

                $resim_baslik = Null;
                $resim_aciklama = Null;

            } else {
                $img_text = $gelen->img_text;

                $img_text1 = explode('<', $img_text);
                $img_text1 = explode('>', $img_text1[1]);

                $img_text2 = explode('<', $img_text);
                $img_text2 = explode('>', $img_text2[3]);

                $resim_baslik = $img_text2[1];
                $resim_aciklama = $img_text1[1];
            }

        } else { // gelen id yoksa

            $gelen = new Kategori;
            $resim_baslik = NULL;
            $resim_aciklama = NULL;

        }
        if ( request()->isMethod('post') ) { //gelen post işlemi varsa

            $this->validate(request(), [
                'kategori_adi' => 'required|min:4|max:65'
            ]);
            $resim_baslik   = request('resim_baslik');
            $resim_aciklama = stripcslashes(request('resim_aciklama'));
            $alt_kategori1  = request('alt_kategori1');
            $kategori_link  = str_slug(request('kategori_link'));
            $id = request('id');

            $data = [
                'kategori_adi' => request('kategori_adi'),
                'img'          => NULL,
                'img_text'     => '<h2 class="white-color">'.$resim_aciklama.'</h2><h3 class="white-color font-weak">'.$resim_baslik.'</h3>',
                'sef_link'     => $kategori_link
            ];

            if ( request()->hasFile('img') ) {
                $this->validate(request(), [
                    'img' => 'image|mimes:jpeg,png,gif,jpg,JPEG|max:4096'
                ]);
                $resim = request()->file('img');
                $dosya = $resim->hashName();
                if ( $resim->isValid() ) {
                    $resim->move('img', $dosya);
                    $data['img'] = $dosya;
                }
            } else {
                if ( $id > 0 ) {
                    $gelen = Kategori::find($id);
                    $data["img"] = $gelen->img;
                }
                else
                    $data['img'] = NULL;
            }

            if ( $id > 0 ) {
                $guncelle = Kategori::where('id', $id)->firstOrFail();
                $guncelle->update($data);

                if ( $alt_kategori1 != NULL ) {
                    $alt_kategori1 = explode(',', $alt_kategori1);
                    for ( $i = 0; $i < count($alt_kategori1); $i++ ) {
                        Kategori::updateOrCreate(
                            [ 'ust_id' => $guncelle->id, 'sef_link' => str_slug($alt_kategori1[$i]) ],
                            [ 'kategori_adi' => $alt_kategori1[$i] ]
                        );
                    }
                }

                return back()->with(['mesaj_tur' => 'info', 'mesaj' => 'Güncelleme işlemi başarılı', 'guncellenen' => $guncelle]);
            } else {
                $ekle = Kategori::create($data);

                if ( $alt_kategori1 != NULL ) {
                    $alt_kategori1 = explode(',', $alt_kategori1);
                    for ( $i = 0; $i < count($alt_kategori1); $i++ ) {
                        Kategori::create(
                            [ 'ust_id' => $ekle->id, 'sef_link' => str_slug($alt_kategori1[$i]), 'kategori_adi' => $alt_kategori1[$i] ]
                        );
                    }
                }

                return back()->with(['mesaj_tur' => 'success', 'mesaj' => 'Ekleme işlemi başarılı', 'eklenen' => $ekle]);
            }

        } else { // gelen post işlemi yoksa

            $kategoriler = Kategori::whereRaw('ust_id is null')->get();
            return view('yonetim.kategori-ekle', compact('kategoriler', 'gelen', 'resim_baslik', 'resim_aciklama'));

        }

    }

    public function kategorilistele(){

        if ( request()->isMethod('post') ) {

            return back();

        } else {

            $kategoriler = Kategori::whereRaw('ust_id is null')->get();
            $alt_kategoriler = Kategori::where('ust_id', '>', 0)->get();
            return view('yonetim.kategori-listele', compact('kategoriler', 'alt_kategoriler'));

        }

    }
}
