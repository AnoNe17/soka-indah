<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan_karakter', function (Blueprint $table) {
            $table->id();
            $table->integer('id_siswa');
            $table->integer('id_master_pendidikan_karakter');
            $table->tinyInteger('bm')->default(0);
            $table->tinyInteger('km')->default(0);
            $table->tinyInteger('sm')->default(0);
            $table->tinyInteger('k')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendidikan_karakter');
    }
};
