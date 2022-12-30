<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lingkup extends Model
{
    use HasFactory;

    protected $table = 'lingkup';
    protected $primaryKey = 'id';

    protected $fillable = [];

    public function KDIndikator()
    {
        return $this->hasMany('App\Models\KDIndikator', 'id_lingkup', 'id');
    }
}
