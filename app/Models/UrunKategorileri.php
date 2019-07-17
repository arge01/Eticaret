<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrunKategorileri extends Model
{
    protected $table = 'urun_kategorileri';
    public function urunu(){
        return $this->belongsTo('App\Models\Urunler', 'urun_id','id');
    }
}
