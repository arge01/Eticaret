<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrunEkstralari extends Model
{
    protected $table = 'urun_ekstralari';

    protected $fillable = [
        'urun_id', 'puani', 'tiklanma_sayisi', 'toplam_satin_alma_fiyati', 'toplam_satin_alma_adedi', 'kampanya_baslangic_tarihi', 'kampanya_bitis_tarihi',  'urun_puani', 'indirim_yuzdesi',
    ];

    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';

    public function children(){
        return $this->belongsTo('App\Models\Urunler', 'urun_id','id');
    }
}
