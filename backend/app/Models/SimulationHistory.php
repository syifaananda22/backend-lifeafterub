<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SimulationHistory extends Model
{
    protected $fillable = [
        'user_id',
        'career_id',
        'title',
    ];
}