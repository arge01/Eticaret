<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class urunlerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('urunler')->insert([
            'urun_adi'          => 'Çanta',
            'urun_img'          => 'product01.jpg',
            'sef_link'          => 'canta-u0001',
            'urun_kategorileri' => 1,
            'urun_aciklama'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae justo urna. Vestibulum maximus turpis vel odio vulputate, sed eleifend dolor egestas. Proin et sapien congue, egestas mauris ac, sodales arcu. Aliquam in ante augue. Nullam vulputate metus sed nisi aliquam sodales. Sed auctor, quam a gravida viverra, nulla nibh placerat tortor, sed varius sapien elit ut lacus.',
            'eski_fiyati'       => 45,
            'fiyati'            => 36
        ]);

        DB::table('urunler')->insert([
            'urun_adi'          => 'Saat',
            'urun_img'          => 'product02.jpg',
            'sef_link'          => 'saat-u0002',
            'urun_kategorileri' => 1,
            'urun_aciklama'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae justo urna. Vestibulum maximus turpis vel odio vulputate, sed eleifend dolor egestas. Proin et sapien congue, egestas mauris ac, sodales arcu. Aliquam in ante augue. Nullam vulputate metus sed nisi aliquam sodales. Sed auctor, quam a gravida viverra, nulla nibh placerat tortor, sed varius sapien elit ut lacus.',
            'eski_fiyati'       => 45,
            'fiyati'            => 36
        ]);

        DB::table('urunler')->insert([
            'urun_adi'          => 'Cüzdan',
            'urun_img'          => 'product03.jpg',
            'sef_link'          => 'cuzdan-u0001',
            'urun_kategorileri' => 1,
            'urun_aciklama'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae justo urna. Vestibulum maximus turpis vel odio vulputate, sed eleifend dolor egestas. Proin et sapien congue, egestas mauris ac, sodales arcu. Aliquam in ante augue. Nullam vulputate metus sed nisi aliquam sodales. Sed auctor, quam a gravida viverra, nulla nibh placerat tortor, sed varius sapien elit ut lacus.',
            'eski_fiyati'       => 30,
            'fiyati'            => 15
        ]);

        DB::table('urunler')->insert([
            'urun_adi'          => 'Spor Ayakkabısı',
            'urun_img'          => 'product04.jpg',
            'sef_link'          => 'sopr-ayakkabisi-u0004',
            'urun_kategorileri' => 1,
            'urun_aciklama'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae justo urna. Vestibulum maximus turpis vel odio vulputate, sed eleifend dolor egestas. Proin et sapien congue, egestas mauris ac, sodales arcu. Aliquam in ante augue. Nullam vulputate metus sed nisi aliquam sodales. Sed auctor, quam a gravida viverra, nulla nibh placerat tortor, sed varius sapien elit ut lacus.',
            'eski_fiyati'       => 45,
            'fiyati'            => 36
        ]);

        DB::table('urunler')->insert([
            'urun_adi'          => 'Bot',
            'urun_img'          => 'product05.jpg',
            'sef_link'          => 'bot-u0005',
            'urun_kategorileri' => 1,
            'urun_aciklama'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae justo urna. Vestibulum maximus turpis vel odio vulputate, sed eleifend dolor egestas. Proin et sapien congue, egestas mauris ac, sodales arcu. Aliquam in ante augue. Nullam vulputate metus sed nisi aliquam sodales. Sed auctor, quam a gravida viverra, nulla nibh placerat tortor, sed varius sapien elit ut lacus.',
            'eski_fiyati'       => 190,
            'fiyati'            => 90
        ]);

        DB::table('urunler')->insert([
            'urun_adi'          => 'Çanta',
            'urun_img'          => 'product06.jpg',
            'sef_link'          => 'canta-u0006',
            'urun_kategorileri' => 1,
            'urun_aciklama'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae justo urna. Vestibulum maximus turpis vel odio vulputate, sed eleifend dolor egestas. Proin et sapien congue, egestas mauris ac, sodales arcu. Aliquam in ante augue. Nullam vulputate metus sed nisi aliquam sodales. Sed auctor, quam a gravida viverra, nulla nibh placerat tortor, sed varius sapien elit ut lacus.',
            'eski_fiyati'       => 80,
            'fiyati'            => 70
        ]);

        DB::table('urunler')->insert([
            'urun_adi'          => 'Bayan Çantası',
            'urun_img'          => 'product07.jpg',
            'sef_link'          => 'bayan-cantasi-u0007',
            'urun_kategorileri' => 1,
            'urun_aciklama'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae justo urna. Vestibulum maximus turpis vel odio vulputate, sed eleifend dolor egestas. Proin et sapien congue, egestas mauris ac, sodales arcu. Aliquam in ante augue. Nullam vulputate metus sed nisi aliquam sodales. Sed auctor, quam a gravida viverra, nulla nibh placerat tortor, sed varius sapien elit ut lacus.',
            'eski_fiyati'       => 80,
            'fiyati'            => 70
        ]);

        DB::table('urunler')->insert([
            'urun_adi'          => 'Kemer',
            'urun_img'          => 'product08.jpg',
            'sef_link'          => 'kemer-u0008',
            'urun_kategorileri' => 1,
            'urun_aciklama'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae justo urna. Vestibulum maximus turpis vel odio vulputate, sed eleifend dolor egestas. Proin et sapien congue, egestas mauris ac, sodales arcu. Aliquam in ante augue. Nullam vulputate metus sed nisi aliquam sodales. Sed auctor, quam a gravida viverra, nulla nibh placerat tortor, sed varius sapien elit ut lacus.',
            'eski_fiyati'       => 80,
            'fiyati'            => 70
        ]);
    }
}
