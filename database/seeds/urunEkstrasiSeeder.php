<?php

use Illuminate\Database\Seeder;

class urunEkstrasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('urun_ekstralari')->insert([
            'urun_id'                 => 8,
            'puani'                     => 38,
            'tiklanma_sayisi'           => 153,
            'toplam_satin_alma_fiyati'  => 134,
            'toplam_satin_alma_adedi'   => 10,
            'kampanya_baslangic_tarihi' => '12/01/2017',
            'kampanya_bitis_tarihi'     => '12/01/2018',
            'urun_puani'                => 56,
            'indirim_yuzdesi'           => 20
        ]);

        DB::table('urun_ekstralari')->insert([
            'urun_id'                 => 5,
            'puani'                     => 38,
            'tiklanma_sayisi'           => 153,
            'toplam_satin_alma_fiyati'  => 134,
            'toplam_satin_alma_adedi'   => 10,
            'kampanya_baslangic_tarihi' => '12/01/2017',
            'kampanya_bitis_tarihi'     => '12/01/2018',
            'urun_puani'                => 95,
            'indirim_yuzdesi'           => 99.99
        ]);

        DB::table('urun_ekstralari')->insert([
            'urun_id'                   => 1,
            'puani'                     => 38,
            'tiklanma_sayisi'           => 153,
            'toplam_satin_alma_fiyati'  => 134,
            'toplam_satin_alma_adedi'   => 10,
            'kampanya_baslangic_tarihi' => '12/01/2017',
            'kampanya_bitis_tarihi'     => '12/01/2018',
            'urun_puani'                => 40,
            'indirim_yuzdesi'           => 5
        ]);
    }
}
