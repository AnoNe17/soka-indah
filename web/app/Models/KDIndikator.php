<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KDIndikator extends Model
{
    use HasFactory;

    protected $table = 'kd_indikator';
    protected $primaryKey = 'id';

    protected $fillable = [];

    public function Kelompok()
    {
        return $this->belongsTo('App\Models\MasterKelompok', 'id_kelompok');
    }

    public function Lingkup()
    {
        return $this->belongsTo('App\Models\Lingkup', 'id_lingkup');
    }

    public function Indikator(){
        return $this->hasMany('App\Models\Indikator', 'id_kd_indikator', 'id');
    }

}
