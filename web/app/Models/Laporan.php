<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';
    protected $primaryKey = 'id';

    protected $fillable = [];
    public $timestamps = false;

    public function KDIndikator()
    {
        return $this->belongsTo('App\Models\KDIndikator', 'id_kd_indikator', 'id');
    }

    public function Indikator()
    {
        return $this->belongsTo('App\Models\Indikator', 'id_indikator', 'id');
    }
    
}
