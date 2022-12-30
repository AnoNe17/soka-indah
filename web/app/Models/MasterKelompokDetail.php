<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKelompokDetail extends Model
{
    use HasFactory;

    protected $table = 'master_kelompok_detail';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_kelompok',
        'id_siswa'        
    ];

    public function Siswa()
    {
        return $this->belongsTo('App\Models\MasterSiswa', 'id_siswa', 'id');
    }
}
