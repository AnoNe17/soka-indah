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
        Schema::create('detail_penilaian', function (Blueprint $table) {
            $table->id();
            $table->integer('id_penilaian');
            $table->integer('id_lingkup')->nullable();
            $table->integer('id_kd_indikator')->nullable();
            $table->integer('id_indikator')->nullable();
            $table->string('ceklis')->nullable();
            $table->string('anekdot')->nullable();
            $table->string('hasil_karya')->nullable();
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
        Schema::dropIfExists('detail_penilaian');
    }
};
