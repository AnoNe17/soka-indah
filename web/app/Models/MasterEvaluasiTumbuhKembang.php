<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterEvaluasiTumbuhKembang extends Model
{
    use HasFactory;

    protected $table = 'master_evaluasi_tumbuh_kembang';
    protected $primaryKey = 'id';

    protected $fillable = [];
    public $timestamps = false;
}
