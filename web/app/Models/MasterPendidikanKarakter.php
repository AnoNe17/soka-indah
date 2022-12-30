<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPendidikanKarakter extends Model
{
    use HasFactory;

    protected $table = 'master_pendidikan_karakter';
    protected $primaryKey = 'id';

    protected $fillable = [];
}
