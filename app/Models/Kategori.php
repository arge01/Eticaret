<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    public function children(){
        return $this->hasMany($this, 'ust_id');
    }
}
