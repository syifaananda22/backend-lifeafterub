<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Biar bisa insert/update massal
    protected $fillable = [
        'user_id',
        'nama',
        'fakultas',
        'prodi',
        'tahun_masuk'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}