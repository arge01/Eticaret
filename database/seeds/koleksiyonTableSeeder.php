<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class koleksiyonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('koleksiyon_menu')->insert([
            'isim'     => 'Çanta Çeşitleri',
            'img'      => 'banner10.jpg',
            'aciklama' => 'Çok Satan Çanta Çeşitleri',
            'sef_link' => 'cok-satan-canta-cesitleri'
        ]);

        DB::table('koleksiyon_menu')->insert([
            'isim'     => 'Ayakkabı Çeşitleri',
            'img'      => 'banner11.jpg',
            'aciklama' => 'Çok Satan Ayakkabı Çeşitleri',
            'sef_link' => 'cok-satan-ayakkabi-cesitleri'
        ]);

        DB::table('koleksiyon_menu')->insert([
            'isim'     => 'Saat Çeşitleri',
            'img'      => 'banner12.jpg',
            'aciklama' => 'Çok Satan Saat Çeşitleri',
            'sef_link' => 'cok-satan-saat-cesitleri'
        ]);

    }
}
