<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerPreference extends Model
{
    protected $table = 'career_preferences';

    protected $fillable = [
        'user_id',
        'minat',
        'skill',
        'gaya_kerja',
        'industri',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}