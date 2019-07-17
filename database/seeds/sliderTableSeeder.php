<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slider')->insert([
            'img'   => 'banner01.jpg',
            'title' => 'Çantada',
            'label' => '%50 İndirim',
            'text'  => '',
            'link'  => ''
        ]);

        DB::table('slider')->insert([
            'img'   => 'banner02.jpg',
            'title' => 'Ayakkabıda',
            'label' => '%50 İndirim',
            'text'  => '',
            'link'  => ''
        ]);

        DB::table('slider')->insert([
            'img'   => 'banner03.jpg',
            'title' => 'Saatde',
            'label' => '%50 İndirim',
            'text'  => '',
            'link'  => ''
        ]);
    }
}
