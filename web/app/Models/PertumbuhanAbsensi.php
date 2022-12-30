<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertumbuhanAbsensi extends Model
{
    use HasFactory;
    protected $table = 'pertumbuhan_absensi';
    protected $primaryKey = 'id';

    protected $fillable = [];
    public $timestamps = false;
}
