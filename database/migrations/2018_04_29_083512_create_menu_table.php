<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu_adi', 50);
            $table->string('sef_link', 50);
            $table->string('menu_img', 50)->nullable();
            $table->string('ana_img', 50)->nullable();
            $table->text('ana_img_yazi')->nullable();
            $table->integer('kategori_id')->nullable();
            $table->integer('menu_text')->nullable();
            $table->integer('alt_menu')->nullable();
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
        Schema::dropIfExists('menu');
    }
}
