<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyJob;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return response()->json([
            'success' => true,
            'data' => $companies
        ]);
    }

    public function showJobs($companyId)
    {
        $jobs = CompanyJob::with('company')
            ->where('company_id', $companyId)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $jobs
        ]);
    }
}