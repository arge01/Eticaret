<?php

use Illuminate\Database\Seeder;

class urunKategorileriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('urun_kategorileri')->insert([
            'urun_id' => 8,
            'kategori_id' => 3
        ]);

        DB::table('urun_kategorileri')->insert([
            'urun_id' => 7,
            'kategori_id' => 3
        ]);

        DB::table('urun_kategorileri')->insert([
            'urun_id' => 6,
            'kategori_id' => 3
        ]);

        DB::table('urun_kategorileri')->insert([
            'urun_id' => 5,
            'kategori_id' => 3
        ]);

        DB::table('urun_kategorileri')->insert([
            'urun_id' => 4,
            'kategori_id' => 3
        ]);

        DB::table('urun_kategorileri')->insert([
            'urun_id' => 3,
            'kategori_id' => 3
        ]);

        DB::table('urun_kategorileri')->insert([
            'urun_id' => 2,
            'kategori_id' => 3
        ]);

        DB::table('urun_kategorileri')->insert([
            'urun_id' => 1,
            'kategori_id' => 3
        ]);
    }
}
