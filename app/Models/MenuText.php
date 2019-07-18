<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuText extends Model
{
    protected $table = 'menu_text';

    protected $fillable = [
        'menu', 'label', 'link', 'img', 'icerik'
    ];

    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';

    public function nerede(){
        return $this->belongsTo('App\Models\Menu', 'menu', 'id');
    }
}
