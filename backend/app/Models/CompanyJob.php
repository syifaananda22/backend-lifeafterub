<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyJob extends Model
{
    protected $table = 'company_jobs';
    protected $fillable = ['company_id','title','description','location','employment_type'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}