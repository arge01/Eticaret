<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Uyeler extends Authenticatable
{
    /*Use SoftDeletes;*/
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'uyeler';

    protected $fillable = [
        'adsoyad', 'email', 'sifre', 'aktivasyon_anahtari', 'aktivasyon_durumu'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'sifre', 'aktivasyon_anahtari',
    ];

    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';

    public function getAuthPassword(){
        return $this->sifre;
    }

    public function detay(){
        return $this->hasOne('App\Models\UyeDetay','uye_id', 'id');
    }

    public function sepet() {
        return $this->belongsTo('App\Models\Sepet', 'id', 'uye_id');
    }
}
