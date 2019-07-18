<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Kategori;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnasayfaController extends Controller
{
    public function anasayfa(){

        return view('yonetim.anasayfa');

    }
}
