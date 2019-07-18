<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = [
        'menu_adi', 'sef_link', 'menu_img', 'ana_img', 'ana_img_yazi', 'kategori_id', 'menu_text', 'alt_menu', 'menu_acikalama'
    ];

    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';

    public function child()
    {
        return $this->hasMany($this, 'alt_menu', 'id');
    }

    public function category()
    {
        return $this->hasMany('APP\Models\Kategori', 'ust_id', 'kategori_id');
    }

    public function ana_menusu()
    {
        return $this->belongsTo($this, 'alt_menu', 'id');
    }

    public function menu_icerik()
    {
        return $this->hasMany('App\Models\MenuText', 'menu', 'id');
    }

    public function alt_menu_icerik()
    {
        return $this->belongsTo('App\Models\MenuText', 'id', 'menu');
    }
}
