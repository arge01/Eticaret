<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrunEsktralariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urun_ekstralari', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('urun_id');
            $table->integer('puani');
            $table->integer('tiklanma_sayisi');
            $table->decimal('toplam_satin_alma_fiyati', 6, 2);
            $table->integer('toplam_satin_alma_adedi');
            $table->string('kampanya_baslangic_tarihi',50);
            $table->string('kampanya_bitis_tarihi',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urun_ekstralari');
    }
}
