<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSiswa extends Model
{
    use HasFactory;

    protected $table = 'master_siswa';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_kelompok',
        'nama',
        'nama_panggilan',
        'no_induk',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'anak_ke',
        'tanggal_diterima',
        'status',
        'nama_wali',
        'pekerjaan_wali',
        'no_telp',
        'alamat',
        'foto'
    ];
}
