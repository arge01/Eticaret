<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SepetUrun extends Model
{
    protected $table = 'sepet_urun';
    protected $guarded = [];

    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT = 'silinme_tarihi';
}
