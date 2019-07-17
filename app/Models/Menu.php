<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    public function child(){
        return $this->hasMany($this, 'alt_menu', 'id');
    }
    public function category(){
        return $this->hasMany('APP\Models\Kategori', 'ust_id', 'kategori_id');
    }
}
