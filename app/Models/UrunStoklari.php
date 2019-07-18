<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrunStoklari extends Model
{
    protected $table = 'urun_stoklari';

    protected $fillable = [
        'urun_id', 'stok_adedi', 'stok_turu', 'renkleri', 'marka', 'stok_cinsi',
    ];

    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
}
