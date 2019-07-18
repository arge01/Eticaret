<?php

use Illuminate\Database\Seeder;

class UrunStoklariTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('urun_stoklari')->insert([
            'urun_id'  => 1,
            'stok_adedi' => 999,
            'stok_turu' => 'Adet',
            'renkleri' => 'Kırmızı, Mavi, Sarı, Yeşil, Siyah, Ela',
            'marka' => 'Tekstil',
            'stok_cinsi' => 'XS, S, M, L, XL, XXL'
        ]);

        DB::table('urun_stoklari')->insert([
            'urun_id'  => 2,
            'stok_adedi' => 450,
            'stok_turu' => 'Adet',
            'renkleri' => 'Kırmızı, Mavi, Sarı, Yeşil, Siyah, Ela',
            'marka' => 'Tekstil',
            'stok_cinsi' => '38, 39, 40, 41, 42, 43, 44, 45'
        ]);

        DB::table('urun_stoklari')->insert([
            'urun_id'  => 3,
            'stok_adedi' => 80,
            'stok_turu' => 'Adet',
            'renkleri' => 'Kırmızı, Mavi, Sarı, Yeşil, Siyah, Ela',
            'marka' => 'Tekstil',
            'stok_cinsi' => 'XS, S, M, L, XL, XXL'
        ]);

        DB::table('urun_stoklari')->insert([
            'urun_id'  => 4,
            'stok_adedi' => 120,
            'stok_turu' => 'Adet',
            'renkleri' => 'Kırmızı, Mavi, Sarı, Yeşil, Siyah, Ela',
            'marka' => 'Tekstil',
            'stok_cinsi' => 'XS, S, M, L, XL, XXL'
        ]);

        DB::table('urun_stoklari')->insert([
            'urun_id'  => 5,
            'stok_adedi' => 300,
            'stok_turu' => 'Adet',
            'renkleri' => 'Kırmızı, Mavi, Sarı, Yeşil, Siyah, Ela',
            'marka' => 'Tekstil',
            'stok_cinsi' => 'XS, S, M, L, XL, XXL'
        ]);

        DB::table('urun_stoklari')->insert([
            'urun_id'  => 5,
            'stok_adedi' => 3,
            'stok_turu' => 'Adet',
            'renkleri' => 'Kırmızı, Mavi, Sarı, Yeşil, Siyah, Ela',
            'marka' => 'Tekstil',
            'stok_cinsi' => 'XS, S, M, L, XL, XXL'
        ]);

        DB::table('urun_stoklari')->insert([
            'urun_id'  => 6,
            'stok_adedi' => 5,
            'stok_turu' => 'Adet',
            'renkleri' => 'Kırmızı, Mavi, Sarı, Yeşil, Siyah, Ela',
            'marka' => 'Tekstil',
            'stok_cinsi' => 'XS, S, M, L, XL, XXL'
        ]);

        DB::table('urun_stoklari')->insert([
            'urun_id'  => 7,
            'stok_adedi' => 0,
            'stok_turu' => 'Adet',
            'renkleri' => 'Kırmızı, Mavi, Sarı, Yeşil, Siyah, Ela',
            'marka' => 'Tekstil',
            'stok_cinsi' => 'XS, S, M, L, XL, XXL'
        ]);

        DB::table('urun_stoklari')->insert([
            'urun_id'  => 8,
            'stok_adedi' => 50,
            'renkleri' => 'Kırmızı, Mavi, Sarı, Yeşil, Siyah, Ela',
            'stok_turu' => 'Adet',
            'marka' => 'Tekstil',
            'stok_cinsi' => 'XS, S, M, L, XL, XXL'
        ]);
    }
}
