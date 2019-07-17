<?php

use Illuminate\Database\Seeder;

class UrunResimleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 8; $i++){
            DB::table('urun_resimleri')->insert([
                'urun_id'  => $i,
                'urun_img' => 'main-product01.jpg'
            ]);

            DB::table('urun_resimleri')->insert([
                'urun_id'  => $i,
                'urun_img' => 'main-product02.jpg'
            ]);

            DB::table('urun_resimleri')->insert([
                'urun_id'  => $i,
                'urun_img' => 'main-product03.jpg'
            ]);

            DB::table('urun_resimleri')->insert([
                'urun_id'  => $i,
                'urun_img' => 'main-product04.jpg'
            ]);
        }
    }
}
