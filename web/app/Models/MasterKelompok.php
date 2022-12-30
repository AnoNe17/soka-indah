<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKelompok extends Model
{
    use HasFactory;

    protected $table = 'master_kelompok';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_kelompok',
        'kelompok_umur',
        'wali_kelas'
    ];
}
