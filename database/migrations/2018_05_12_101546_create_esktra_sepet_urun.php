<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEsktraSepetUrun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sepet_urun', function (Blueprint $table) {
            $table->string('size', 250)->nullable();
            $table->string('renk', 250)->nullable();
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
