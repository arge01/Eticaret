<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uyeler;
use App\Models\Urunler;

class SatinAlController extends Controller
{
    protected $urunler;
    
    public function __construct(Urunler $urunler)
    {
        $this->urunler = $urunler;
    }

    public function urunler()
    {
        return $this->urunler->get();
    }

}
