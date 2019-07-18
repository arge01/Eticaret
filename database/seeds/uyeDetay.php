<?php

use Illuminate\Database\Seeder;

class uyeDetay extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('uye_detay')->insert([
            'uye_id'     => 1,
            'adi_soyadi' => 'Arif GEVENCİ',
            'cep_tel'        => '05388799778',
            'mail'       => 'gevenci_arif@hotmail.',
            'adresi'     => 'Gülabibey mah. Kafkas Evl. Ekin 5. Sok. Apt:Kardelen No:7/14 ÇORUM/MERKEZ'
        ]);
    }
}
