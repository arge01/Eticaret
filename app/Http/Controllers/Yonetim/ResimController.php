<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Kategori;
use App\Models\Urunler;
use App\Models\UrunResimleri;
use JildertMiedema\LaravelPlupload\Facades\Plupload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class ResimController extends Controller
{
    /**
     *
     */
    public function listele()
    {
        $input = Input::get('id');
        if ( $input == NULL ) {
            $resimler = UrunResimleri::with('urunu')->get();
            return view('yonetim.resim.listele', compact('resimler', 'input'));
        } else {
            $resimler = UrunResimleri::where('urun_id', $input)->with('urunu')->get();
            return view('yonetim.resim.listele', compact('resimler', 'input'));
        }
    }
    public function duzenle($id)
    {
        return back();
    }
    public function sil()
    {
        if ( request()->isMethod('post') ) {
            $ID = request('ID');
            $delete = UrunResimleri::where('id', $ID)->firstOrfail();
            $path = public_path('img/'.$delete->urun_img);
            if (file_exists($path)) {
                unlink($path);
            }
            $delete->delete();
            return response()->json(['mesaj_tur' => 'success', 'mesaj' => 'Silindi', 'data' => $delete]);
        } else {
            return back();
        }
    }
    public function ekle($id)
    {
        $urunler = Urunler::all();
        if ( request()->isMethod('post') )
        {
            $resim = request()->file('file');
            $resim_adi = $resim->hashName();
            $thump = 'thump-'.$resim_adi;
            Image::make($resim->getRealPath())->save(public_path('img/' . $resim_adi));
            Image::make($resim->getRealPath())->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/' . $thump));
            $data = [
                'urun_id'  => $id,
                'urun_adi' => $resim_adi,
                'urun_img' => $resim_adi
            ];
            $ekle = UrunResimleri::create($data);
            /*Plupload::receive('file', function ($file) use ($id) {
                $dosya = $file->hashName();
                $thump = 'thump-'.$dosya;
                $file->move('images', $dosya);
                $data = [
                    'urun_id'  => $id,
                    'urun_adi' => $file->getClientOriginalName(),
                    'urun_img' => $dosya
                ];
                $ekle = UrunResimleri::create($data);
                return 'ready';
            });*/
        }
        return view('yonetim.resim.eklenen', compact('urunler', 'id'));
    }
}
