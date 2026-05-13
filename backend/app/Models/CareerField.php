<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerField extends Model
{
    protected $table = 'career_fields';

    protected $fillable = [
        'nama_bidang'
    ];
}