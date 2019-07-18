<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrunResimleri extends Model
{
    protected $table = 'urun_resimleri';
    protected $fillable = [
        'urun_id', 'urun_adi', 'urun_img'
    ];

    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';

    public function urunu()
    {
        return $this->belongsTo('App\Models\Urunler', 'urun_id', 'id');
    }
}
