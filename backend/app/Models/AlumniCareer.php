<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumniCareer extends Model
{
    protected $fillable = [
        'nama',
        'posisi',
        'perusahaan',
        'bidang',
        'fakultas',
        'prodi',
        'tahun_lulus',
        'foto',
        'deskripsi',
        'sumber_loker',
        'persiapan',
    ];
}