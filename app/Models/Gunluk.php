<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gunluk extends Model
{
    protected $table = 'urunler';
    public function urunEkstrasi(){
        return $this->hasOne('App\Models\UrunEkstralari', 'urun_id', 'id');
    }
}
