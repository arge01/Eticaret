<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUrunEkstralariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('urun_ekstralari', function (Blueprint $table) {
            $table->integer('urun_puani')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('urun_ekstralari', function (Blueprint $table) {
            $table->integer('urun_puani')->nullable();
        });
    }
}
