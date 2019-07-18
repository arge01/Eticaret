<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUyeDetay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uye_detay', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uye_id');
            $table->string('adi_soyadi', 150);
            $table->string('tel', 150)->nullable();
            $table->string('cep_tel', 150)->nullable();
            $table->string('mail', 150);
            $table->text('adresi');

            $table->timestamp('olusturma_tarihi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('guncelleme_tarihi')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uye_detay');
    }
}
