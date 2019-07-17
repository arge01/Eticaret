<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class menuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //2. menü
        $ID = DB::table('menu')->insertGetId([
            'menu_adi'     =>'BAYAN',
            'ana_img'      =>'banner05.jpg',
            'sef_link'     => 'bayan',
            'ana_img_yazi' => '<h2 class="white-color">100 TL ve Üzerinde Alışverişlerde</h2><h3 class="white-color font-weak">Kargo Bedava</h3>',
            'kategori_id'  => 1
        ]);

        //3. menü
        $ID = DB::table('menu')->insertGetId([
            'menu_adi'     => 'ÇOCUK',
            'ana_img'      => 'banner05.jpg',
            'sef_link'     => 'cocuk',
            'ana_img_yazi' => '<h2 class="white-color">100 TL ve Üzerinde Alışverişlerde</h2><h3 class="white-color font-weak">Kargo Bedava</h3>',
            'kategori_id'  => 9
        ]);

        //4. menü
        $ID = DB::table('menu')->insertGetId([
            'menu_adi'     => 'ERKEK',
            'ana_img'      => 'banner05.jpg',
            'sef_link'     => 'erkek',
            'ana_img_yazi' => '<h2 class="white-color">100 TL ve Üzerinde Alışverişlerde</h2><h3 class="white-color font-weak">Kargo Bedava</h3>',
            'kategori_id'  => 5
        ]);

        //5. menü
        $ID = DB::table('menu')->insertGetId([
            'menu_adi'     => 'NE ARARSAN VAR!',
            'ana_img'      => 'banner05.jpg',
            'ana_img_yazi' => '<h2 class="white-color">100 TL ve Üzerinde Alışverişlerde</h2><h3 class="white-color font-weak">Kargo Bedava</h3>',
            'sef_link'     => 'ne-ararsan-var'
        ]);

            //bayan menü kategorisi
            $__ID = DB::table('menu')->insertGetId(['menu_adi'=>'BAYAN', 'menu_img'=>'banner06.jpg', 'sef_link'=>'ne-ararsan-bayan', 'alt_menu'=>$ID]);
                DB::table('menu')->insert(['menu_adi'=>'Çanta', 'sef_link'=>'canta', 'alt_menu'=>$__ID]);
                DB::table('menu')->insert(['menu_adi'=>'Ayakkabı', 'sef_link'=>'ayakkabi', 'alt_menu'=>$__ID]);
                DB::table('menu')->insert(['menu_adi'=>'Aksesuar', 'sef_link'=>'aksesuar', 'alt_menu'=>$__ID]);

            //erkek menü kategorisi
            $__ID = DB::table('menu')->insertGetId(['menu_adi'=>'ERKEK', 'menu_img'=>'banner07.jpg', 'sef_link'=>'ne-ararsan-erkek', 'alt_menu'=>$ID]);
                DB::table('menu')->insert(['menu_adi'=>'Çanta', 'sef_link'=>'canta', 'alt_menu'=>$__ID]);
                DB::table('menu')->insert(['menu_adi'=>'Ayakkabı', 'sef_link'=>'ayakkabi', 'alt_menu'=>$__ID]);
                DB::table('menu')->insert(['menu_adi'=>'Aksesuar', 'sef_link'=>'aksesuar', 'alt_menu'=>$__ID]);

            //giyim menü kategorisi
            $__ID = DB::table('menu')->insertGetId(['menu_adi'=>'GİYİM', 'menu_img'=>'banner09.jpg', 'sef_link'=>'ne-ararsan-giyim', 'alt_menu'=>$ID]);
                DB::table('menu')->insert(['menu_adi'=>'İç giyim', 'sef_link'=>'ic-giyim', 'alt_menu'=>$__ID]);
                DB::table('menu')->insert(['menu_adi'=>'Yazlık', 'sef_link'=>'yazlik', 'alt_menu'=>$__ID]);
                DB::table('menu')->insert(['menu_adi'=>'Kışlık', 'sef_link'=>'kislik', 'alt_menu'=>$__ID]);

            //aksesuar menü kategorisi
            $__ID = DB::table('menu')->insertGetId(['menu_adi'=>'AKSESUAR', 'menu_img'=>'banner08.jpg', 'sef_link'=>'ne-ararsan-aksesuar', 'alt_menu'=>$ID]);
                DB::table('menu')->insert(['menu_adi'=>'Saat', 'sef_link'=>'saat', 'alt_menu'=>$__ID]);
                DB::table('menu')->insert(['menu_adi'=>'Tesbih Kolleksiyonu', 'sef_link'=>'tesbih-kolleksiyonu', 'alt_menu'=>$__ID]);
                DB::table('menu')->insert(['menu_adi'=>'Künye, Bileklik, Atkı', 'sef_link'=>'kunye-bileklik-atki', 'alt_menu'=>$__ID]);
    }
}