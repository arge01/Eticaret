<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrunKategorileri extends Model
{
    protected $table = 'urun_kategorileri';

    protected $fillable = [
        'urun_id', 'kategori_id',
    ];

    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';

    public function urunu(){
        return $this->belongsTo('App\Models\Urunler', 'urun_id','id');
    }
}
