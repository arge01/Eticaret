<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEsktraEkstraSepetUrun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sepet_urun', function (Blueprint $table) {
            $table->string('stok_cinsi', 150)->nullable();
            $table->string('renkleri', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sepet_urun', function (Blueprint $table) {
            //
        });
    }
}
