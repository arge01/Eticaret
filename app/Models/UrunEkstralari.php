<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrunEkstralari extends Model
{
    protected $table = 'urun_ekstralari';
    public function children(){
        return $this->belongsTo('App\Models\Urunler', 'urun_id','id');
    }
}
