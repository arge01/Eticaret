<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Slider;
use phpDocumentor\Reflection\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{

    public function listele()
    {
        $slider = Slider::all();
        return view('yonetim.banner.listele', compact('slider'));
    }

    public function ekle()
    {
        $gelen = new Slider;
        if (request()->isMethod('post')) {
            $this->validate(request(), ['title' => 'required|min:3|max:30', 'img' => 'required']);
            if (request()->hasFile('img')) {
                $this->validate(request(), ['img' => 'image|mimes:jpeg,png,gif,jpg,JPEG|max:4096']);
                $resim = request()->file('img');
                $resim_adi = $resim->hashName();
                $thump = 'thump-' . $resim_adi;
                Image::make($resim->getRealPath())->fit(1200, 675)->save(public_path('img/' . $resim_adi));
                Image::make($resim->getRealPath())->fit(450, 253)->save(public_path('img/' . $thump));
            }
            $data = ['title' => request('title'), 'link' => str_slug(request('link')), 'label' => request('label'), 'text' => request('text'), 'img' => $resim_adi];

            $ekle = Slider::create($data);

            return back()->with(['mesaj_tur' => 'success', 'mesaj' => 'Ekleme işlemi başarılı', 'eklenen' => $ekle]);
        } else {
            return view('yonetim.banner.ekle', compact('gelen'));
        }

    }

    public function duzenle($id)
    {
        $gelen = Slider::where('id', $id)->firstOrFail();
        if (request()->isMethod('post')) {
            $this->validate(request(), ['id' => 'required', 'title' => 'required|min:3|max:30']);

            if (request()->hasFile('img')) {
                $this->validate(request(), ['img' => 'image|mimes:jpeg,png,gif,jpg,JPEG|max:4096']);
                $resim = request()->file('img');
                $resim_adi = $gelen->img;
                $thump = 'thump-' . $resim_adi;
                Image::make($resim->getRealPath())->fit(1200, 675)->save(public_path('img/' . $resim_adi));
                Image::make($resim->getRealPath())->fit(450, 253)->save(public_path('img/' . $thump));
            } else
                $resim_adi = $gelen->img;

            $data = ['title' => request('title'), 'link' => str_slug(request('link')), 'label' => request('label'), 'text' => request('text'), 'img' => $resim_adi];

            $guncelle = Slider::where('id', request('id'))->firstOrFail();
            $guncelle->update($data);

            return back()->with(['mesaj_tur' => 'info', 'mesaj' => 'Güncelleme işlemi başarılı', 'güncellenen' => $guncelle]);

        } else {
            return view('yonetim.banner.duzenle', compact('gelen'));
        }
    }

    public function sil(){
        if ( request()->isMethod('post') ) {
            $ID = request('ID');
            $delete = Slider::where('id', $ID)->firstOrfail();

            unlink(public_path('img/'.$delete->img));
            unlink(public_path('img/'.'thump-'.$delete->img));

            $delete->delete();

            return response()->json(['mesaj_tur' => 'success', 'mesaj' => 'Silindi', 'data' => $delete]);
        } else {
            return back();
        }
    }

}
