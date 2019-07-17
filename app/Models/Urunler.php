<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Urunler extends Model
{
    protected $table = 'urunler';
    
    public function urun_resimleri(){
        return $this->hasMany('App\Models\UrunResimleri', 'urun_id','id');
    }

    public function urun_stok(){
        return $this->hasOne('App\Models\UrunStoklari', 'urun_id','id');
    }
}
