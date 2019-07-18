<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
        'kategori_adi', 'img', 'img_text', 'sef_link', 'ust_id'
    ];

    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';

    public function children(){
        return $this->hasMany($this, 'ust_id');
    }

    public function ana_kategori(){
        return $this->belongsTo($this, 'ust_id', 'id');
    }

    public function urunleri(){
        return $this->hasMany('App\Models\UrunKategorileri', 'kategori_id', 'id' );
    }
}
