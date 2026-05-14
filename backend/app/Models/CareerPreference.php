<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerPreference extends Model
{
    protected $fillable = [
        'user_id',
        'minat',
        'skill',
        'gaya_kerja',
        'industri',
    ];
}