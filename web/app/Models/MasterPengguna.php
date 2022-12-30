<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPengguna extends Model
{
    use HasFactory;

    protected $table = 'master_pengguna';
    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'password',
        'nama',
        'email',
        'telp',
        'alamat',
        'status'
    ];

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
}
