<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = ['name','description','industry','logo_path'];

    public function jobs()
    {
        return $this->hasMany(CompanyJob::class);
    }

    public function applications()
    {
        return $this->hasMany(CompanyJobApplication::class);
    }
}