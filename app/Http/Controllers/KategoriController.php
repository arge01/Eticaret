<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index($kategori_ana_link, $kategori_link)
    {
        return view('kategori');
    }
}
