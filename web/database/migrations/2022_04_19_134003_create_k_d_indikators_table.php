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
        Schema::create('kd_indikator', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kelompok');
            $table->integer('id_lingkup');
            $table->string('kode');
            $table->string('nama_kd');
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
        Schema::dropIfExists('k_d_indikators');
    }
};
