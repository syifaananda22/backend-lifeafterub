<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'fakultas',
        'prodi',
        'tahun_masuk',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}