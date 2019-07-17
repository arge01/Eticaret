<?php

use Illuminate\Database\Seeder;

class UrunYorumlariTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 8; $i++) {

            DB::table('urun_yorumlari')->insert([
                'urun_id' => $i,
                'uye_id' => 2,
                'yorum' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mollis mattis turpis id commodo. Vestibulum viverra turpis ac fringilla feugiat. Ut eget iaculis dui, ut pharetra massa. Cras gravida lacus vel lorem tristique lacinia id non dolor. Aliquam sit amet rhoncus elit. Maecenas interdum enim in sapien porta ultrices. Nullam suscipit sagittis scelerisque. Integer ac mauris vel justo malesuada elementum. Integer egestas metus ex, vitae pellentesque lectus cursus non. Fusce diam erat, tempus aliquam iaculis vitae, tincidunt in turpis. Morbi sed dictum urna, ut elementum magna. Sed purus lorem, tempor eget efficitur eget, tempus in justo. Curabitur aliquet tellus sit amet lacus aliquet varius. Donec magna enim, pulvinar ornare semper sed, volutpat vel nisl. Aenean faucibus risus vitae nulla lobortis aliquet. Suspendisse lorem diam, consectetur ac ipsum non, venenatis iaculis justo.',
                'puani' => '4'
            ]);

            DB::table('urun_yorumlari')->insert([
                'urun_id' => $i,
                'uye_id' => 3,
                'yorum' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mollis mattis turpis id commodo. Vestibulum viverra turpis ac fringilla feugiat. Ut eget iaculis dui, ut pharetra massa. Cras gravida lacus vel lorem tristique lacinia id non dolor. Aliquam sit amet rhoncus elit. Maecenas interdum enim in sapien porta ultrices. Nullam suscipit sagittis scelerisque. Integer ac mauris vel justo malesuada elementum. Integer egestas metus ex, vitae pellentesque lectus cursus non. Fusce diam erat, tempus aliquam iaculis vitae, tincidunt in turpis. Morbi sed dictum urna, ut elementum magna. Sed purus lorem, tempor eget efficitur eget, tempus in justo. Curabitur aliquet tellus sit amet lacus aliquet varius. Donec magna enim, pulvinar ornare semper sed, volutpat vel nisl. Aenean faucibus risus vitae nulla lobortis aliquet. Suspendisse lorem diam, consectetur ac ipsum non, venenatis iaculis justo.',
                'puani' => '4'
            ]);

            DB::table('urun_yorumlari')->insert([
                'urun_id' => $i,
                'uye_id' => 6,
                'yorum' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mollis mattis turpis id commodo. Vestibulum viverra turpis ac fringilla feugiat. Ut eget iaculis dui, ut pharetra massa. Cras gravida lacus vel lorem tristique lacinia id non dolor. Aliquam sit amet rhoncus elit. Maecenas interdum enim in sapien porta ultrices. Nullam suscipit sagittis scelerisque. Integer ac mauris vel justo malesuada elementum. Integer egestas metus ex, vitae pellentesque lectus cursus non. Fusce diam erat, tempus aliquam iaculis vitae, tincidunt in turpis. Morbi sed dictum urna, ut elementum magna. Sed purus lorem, tempor eget efficitur eget, tempus in justo. Curabitur aliquet tellus sit amet lacus aliquet varius. Donec magna enim, pulvinar ornare semper sed, volutpat vel nisl. Aenean faucibus risus vitae nulla lobortis aliquet. Suspendisse lorem diam, consectetur ac ipsum non, venenatis iaculis justo.',
                'puani' => '4'
            ]);

        }
    }
}
