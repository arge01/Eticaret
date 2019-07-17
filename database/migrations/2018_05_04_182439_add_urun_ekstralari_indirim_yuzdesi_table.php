<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUrunEkstralariIndirimYuzdesiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('urun_ekstralari', function (Blueprint $table) {
            $table->decimal('indirim_yuzdesi', 6, 2)->nullable();
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
            $table->decimal('indirim_yuzdesi', 6, 2)->nullable();
        });
    }
}
