<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UyeDetay extends Model
{
    protected $table = 'uye_detay';

    protected $guarded = [];

    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';

    public function uye(){
        return $this->belongsTo('App\Models\Uyeler', 'id', 'uye_id');
    }
}
