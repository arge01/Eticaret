<?php

use Illuminate\Database\Seeder;

class populerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('populer')->insert([
            'urunun_id'                => 1,
            'tiklanma_sayisi'          => 3,
            'toplam_satin_alma_fiyati' => 143,
            'toplam_satin_alma_adedi'  => 13
        ]);

        DB::table('populer')->insert([
            'urunun_id'                => 3,
            'tiklanma_sayisi'          => 4,
            'toplam_satin_alma_fiyati' => 143,
            'toplam_satin_alma_adedi'  => 13
        ]);

        DB::table('populer')->insert([
            'urunun_id'                => 3,
            'tiklanma_sayisi'          => 4,
            'toplam_satin_alma_fiyati' => 143,
            'toplam_satin_alma_adedi'  => 13
        ]);

        DB::table('populer')->insert([
            'urunun_id'                => 4,
            'tiklanma_sayisi'          => 4,
            'toplam_satin_alma_fiyati' => 193,
            'toplam_satin_alma_adedi'  => 13
        ]);

        DB::table('populer')->insert([
            'urunun_id'                => 5,
            'tiklanma_sayisi'          => 4,
            'toplam_satin_alma_fiyati' => 193,
            'toplam_satin_alma_adedi'  => 13
        ]);

        DB::table('populer')->insert([
            'urunun_id'                => 1,
            'tiklanma_sayisi'          => 4,
            'toplam_satin_alma_fiyati' => 193,
            'toplam_satin_alma_adedi'  => 13
        ]);

        DB::table('populer')->insert([
            'urunun_id'                => 8,
            'tiklanma_sayisi'          => 4,
            'toplam_satin_alma_fiyati' => 193,
            'toplam_satin_alma_adedi'  => 13
        ]);
    }
}
