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
        Schema::create('master_siswa', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kelompok');
            $table->string('nama');
            $table->string('nama_panggilan')->nullable();
            $table->string('no_induk');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', array('Laki -     Laki', 'Perempuan'));
            $table->string('agama')->nullable();
            $table->string('anak_ke')->nullable();
            $table->date('tanggal_diterima')->nullable();
            $table->enum('status', array('Aktif', 'Non Aktif'));
            $table->string('nama_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('no_telp')->nullable();
            $table->text('alamat')->nullable();
            $table->text('foto')->nullable();
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
        Schema::dropIfExists('master_siswas');
    }
};
