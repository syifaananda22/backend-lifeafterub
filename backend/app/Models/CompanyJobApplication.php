<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyJobApplication extends Model
{
    protected $table = 'company_job_applications';
    protected $fillable = ['user_id','company_id','cv_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}