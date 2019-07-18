<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(kategoriTableSeeder::class);
        $this->call(menuTableSeeder::class);
        $this->call(sliderTableSeeder::class);
        $this->call(koleksiyonTableSeeder::class);
        $this->call(urunlerTableSeeder::class);
        $this->call(populerTableSeeder::class);
        $this->call(urunEkstrasiSeeder::class);
        $this->call(urunKategorileriTableSeeder::class);
        $this->call(UrunResimleriSeeder::class);
        $this->call(UrunStoklariTableSeeder::class);
        $this->call(UrunYorumlariTableSeeder::class);
        $this->call(uyeDetay::class);
        $this->call(adminTableSeeder::class);
    }
}
