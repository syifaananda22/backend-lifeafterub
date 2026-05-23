<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyJob;
use Illuminate\Http\Request;

class AdminCompanyController extends Controller
{
    // List semua perusahaan
    public function index()
    {
        $companies = Company::all();

        return response()->json([
            'success' => true,
            'data' => $companies
        ]);
    }

    // List jobs perusahaan tertentu
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

    // Hapus perusahaan
    public function destroy($id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json([
                'success' => false,
                'message' => 'Perusahaan tidak ditemukan'
            ], 404);
        }

        $company->delete();

        return response()->json([
            'success' => true,
            'message' => 'Perusahaan berhasil dihapus'
        ]);
    }

    // Upload CV
    public function applyJob(Request $request, $companyId)
    {
        //
    }

    // Upload logo
    public function uploadLogo(Request $request, $companyId)
    {
        //
    }
}