<?php

namespace App\Http\Controllers;

use App\Models\CompanyJob;
use Illuminate\Http\Request;

class AdminCompanyJobController extends Controller
{
   public function index()
{
    return response()->json(CompanyJob::orderBy('id', 'asc')->get());
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|string|max:100',
        ]);

        $job = CompanyJob::create($validated);

        return response()->json($job, 201);
    }

    public function show(string $id)
    {
        $job = CompanyJob::findOrFail($id);

        return response()->json($job);
    }

    public function update(Request $request, string $id)
    {
        $job = CompanyJob::findOrFail($id);

        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|string|max:100',
        ]);

        $job->update($validated);

        return response()->json($job);
    }

    public function destroy(string $id)
    {
        $job = CompanyJob::findOrFail($id);
        $job->delete();

        return response()->json([
            'message' => 'Lowongan Pekerjaan berhasil dihapus'
        ]);
    }
}