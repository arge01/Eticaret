<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // bayan giyim
        $ID = DB::table('kategori')->insertGetId([
            'kategori_adi'=>'BAYAN GİYİM',
            'sef_link'=>'bayan-giyim',
            'img'=>'banner05.jpg',
            'img_text'=>'<h2 class="white-color">100 TL ve Üzerinde Alışverişlerde</h2><h3 class="white-color font-weak">Kargo Bedava</h3>'
        ]);
            DB::table('kategori')->insert(['kategori_adi'=>'Çanta', 'sef_link'=>'canta', 'ust_id'=>$ID]);
            DB::table('kategori')->insert(['kategori_adi'=>'Ayakkabı', 'sef_link'=>'ayakkabi', 'ust_id'=>$ID]);
            DB::table('kategori')->insert(['kategori_adi'=>'Aksesuar', 'sef_link'=>'aksesuar', 'ust_id'=>$ID]);

        // ekkek giyim
        $ID = DB::table('kategori')->insertGetId([
            'kategori_adi'=>'ERKEK GİYİM',
            'sef_link'=>'erkek-giyim',
            'img'=>'banner05.jpg',
            'img_text'=>'<h2 class="white-color">100 TL ve Üzerinde Alışverişlerde</h2><h3 class="white-color font-weak">Kargo Bedava</h3>'
        ]);
            DB::table('kategori')->insert(['kategori_adi'=>'Çanta', 'sef_link'=>'canta', 'ust_id'=>$ID]);
            DB::table('kategori')->insert(['kategori_adi'=>'Ayakkabı', 'sef_link'=>'ayakkabi', 'ust_id'=>$ID]);
            DB::table('kategori')->insert(['kategori_adi'=>'Aksesuar', 'sef_link'=>'aksesuar', 'ust_id'=>$ID]);

        // çocuk giyim
        $ID = DB::table('kategori')->insertGetId([
            'kategori_adi'=>'ÇOCUK GİYİM',
            'sef_link'=>'cocuk-giyim',
            'img'=>'banner05.jpg',
            'img_text'=>'<h2 class="white-color">100 TL ve Üzerinde Alışverişlerde</h2><h3 class="white-color font-weak">Kargo Bedava</h3>'
        ]);
            DB::table('kategori')->insert(['kategori_adi'=>'Çanta', 'sef_link'=>'canta', 'ust_id'=>$ID]);
            DB::table('kategori')->insert(['kategori_adi'=>'Ayakkabı', 'sef_link' => 'ayakkabi', 'ust_id'=>$ID]);
            DB::table('kategori')->insert(['kategori_adi'=>'Aksesuar', 'sef_link'=>'aksesuar', 'ust_id'=>$ID]);

        // genç giyim
        $ID = DB::table('kategori')->insertGetId([
            'kategori_adi' => 'GENÇ GİYİM',
            'sef_link' => 'genc-giyim',
            'img'=>'banner05.jpg',
            'img_text'=>'<h2 class="white-color">100 TL ve Üzerinde Alışverişlerde</h2><h3 class="white-color font-weak">Kargo Bedava</h3>'
        ]);
            DB::table('kategori')->insert(['kategori_adi' => 'Çanta', 'sef_link' => 'canta', 'ust_id' => $ID]);
            DB::table('kategori')->insert(['kategori_adi' => 'Ayakkabı', 'sef_link' => 'ayakkabi', 'ust_id' => $ID]);
            DB::table('kategori')->insert(['kategori_adi' => 'Aksesuar', 'sef_link' => 'aksesuar', 'ust_id' => $ID]);

        // aksesuar
        DB::table('kategori')->insertGetId(['kategori_adi' => 'Aksesuar', 'sef_link' => 'aksesuar']);

        // iç giyim
        DB::table('kategori')->insertGetId(['kategori_adi' => 'İç Giyim', 'sef_link' => 'ic-giyim']);
    }
}
