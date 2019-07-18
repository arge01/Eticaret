<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{

    public function ekle(){
        $gelen = new Menu;
        $kategoriler = Kategori::whereRaw('ust_id is null')->get();

        if ( request()->isMethod('post') ) {
            $this->validate(request(), [
                'menu_adi' => 'required|min:3|max:50',
                'sef_link' => 'required|min:3|max:50'
            ]);
            $data = [
                'menu_adi'      => request('menu_adi'),
                'sef_link'      => request('sef_link'),
                'ana_img_yazi'  => stripcslashes(request('menu_text')),
                'kategori_id'   => request('kategori_id')
            ];
            if ( $data['kategori_id'] !== NULL ) {
                $anaKategori = Kategori::where('id', $data['kategori_id'])->first();
                $data['kategori_id'] = $anaKategori->id;
            }
            $ekle = Menu::create($data);
            if ( request('alt_menu') != NULL ) {
                $alt_menu = explode(',', request('alt_menu'));
                for ( $i = 0; $i < count($alt_menu); $i++ ) {
                    $yeni_id = $ekle->id;
                    Menu::create(
                        [ 'menu_adi' => $alt_menu[$i], 'sef_link' => str_slug($alt_menu[$i]), 'alt_menu' => $yeni_id ]
                    );
                }
            }
            return back()->with(['mesaj_tur' => 'success', 'mesaj' => 'Ekleme işlemi başarılı', 'eklenen' => $ekle]);
        } else {
            return view('yonetim.menu.ekle', compact('gelen', 'kategoriler'));
        }
    }

    public function listele(){
        $menuler = Menu::where('alt_menu', NULL)->get();
        $alt_menuler = Menu::where('alt_menu', '>', 0)->get();
        return view('yonetim.menu.listele', compact('menuler', 'alt_menuler'));
    }

    public function sil(){
        if ( request()->isMethod('post') ) {
            $ID = request('ID');
            $delete = Menu::where('id', $ID)->firstOrfail();
            if ( $delete->alt_menu != NULL ) {
                $delete->delete();
            } else {
                for ( $i = 0; $i < count($delete->child); $i++ ) {
                    $delete->child[$i]->delete();
                }
                $delete->delete();
            }
            return response()->json(['mesaj_tur' => 'success', 'mesaj' => 'Silindi', 'data' => $delete]);
        } else {
            return back();
        }
    }

    public function duzenle($id){
        if ( request()->isMethod('post') ) {
            $this->validate(request(), [
                'menu_adi' => 'required|min:3|max:50',
                'sef_link' => 'required|min:3|max:50',
                'id'       => 'required'
            ]);
            $data = [
                'menu_adi' => request('menu_adi'),
                'sef_link' => request('sef_link'),
                'ana_img_yazi' => request('menu_text')
            ];
            $guncelle = Menu::where('id', request('id'))->firstOrFail();
            $guncelle->update($data);
            $alt_menuler = request('alt_menu');

            if ( $alt_menuler != NULL ){
                $alt_menuler = explode(',', $alt_menuler);
                for ( $i = 0; $i < count($alt_menuler); $i++ ) {
                    Menu::updateOrCreate(
                        [ 'alt_menu' => request('id'), 'sef_link' => str_slug($alt_menuler[$i]) ],
                        [ 'menu_adi' => $alt_menuler[$i] ]
                    );
                }
            }

            return back()->with(['mesaj_tur' => 'info', 'mesaj' => 'Güncelleme işlemi başarılı', 'guncellenen' => $guncelle]);
        } else {
            $gelen = Menu::where('id', $id)->firstOrFail();
            $kategoriler = Kategori::whereRaw('ust_id is null')->get();
            return view('yonetim.menu.guncelle', compact('gelen', 'kategoriler'));
        }
    }

    public function altmenugetir()
    {
        if ( request()->isMethod('post') ) {
            $id = request('ID');
            $gelen = Menu::whereRaw('alt_menu is null')->where('id', $id)->firstOrFail();
            $menuler = Menu::where('alt_menu', '>', 0)->where('alt_menu', $id)->get();
            return view('yonetim.menu.altmenugetir', compact('id', 'menuler', 'gelen'));
        } else {
            return back();
        }
    }

}
