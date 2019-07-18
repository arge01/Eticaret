<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Urunler extends Model
{
    protected $table = 'urunler';

    protected $fillable = [
        'urun_adi', 'sef_link', 'urun_img', 'urun_kategorileri', 'urun_aciklama', 'eski_fiyati', 'fiyati', 'urun_detayi'
    ];

    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';

    public function urun_resimleri(){
        return $this->hasMany('App\Models\UrunResimleri', 'urun_id','id');
    }

    public function urun_stok(){
        return $this->hasOne('App\Models\UrunStoklari', 'urun_id','id');
    }

    public function urun_yorumlari(){
        return $this->hasMany('App\Models\UrunYorumlari', 'urun_id', 'id');
    }

    public function urun_icerigi()
    {
        return $this->belongsTo('App\Models\MenuText', 'sef_link', 'link');
    }
}
