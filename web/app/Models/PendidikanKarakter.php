<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanKarakter extends Model
{
    use HasFactory;

    protected $table = 'pendidikan_karakter';
    protected $primaryKey = 'id';

    protected $fillable = [];
    public $timestamps = false;
}
