<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $table = 'careers';

    protected $fillable = [
        'field_id',
        'title',
        'salary',
        'skill',
        'description',
        'tugas',
        'prospek',
        'tools',
        'image'
    ];
}