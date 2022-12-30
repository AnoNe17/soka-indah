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
        Schema::create('evaluasi_tumbuh_kembang', function (Blueprint $table) {
            $table->id();
            $table->integer('id_siswa');
            $table->integer('id_master_evaluasi_tumbuh_kembang');
            $table->tinyInteger('b')->default(0);
            $table->tinyInteger('c')->default(0);
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
        Schema::dropIfExists('evaluasi_tumbuh_kembangs');
    }
};
