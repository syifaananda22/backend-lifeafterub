<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AlumniCareer;
use Illuminate\Http\Request;

class AlumniCareerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | AMBIL DATA ALUMNI CAREER
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        try {

            $query = AlumniCareer::query();

            if ($request->search) {
                $query->where(function ($q) use ($request) {
                    $q->where('nama', 'like', '%' . $request->search . '%')
                      ->orWhere('posisi', 'like', '%' . $request->search . '%')
                      ->orWhere('perusahaan', 'like', '%' . $request->search . '%')
                      ->orWhere('bidang', 'like', '%' . $request->search . '%')
                      ->orWhere('fakultas', 'like', '%' . $request->search . '%')
                      ->orWhere('prodi', 'like', '%' . $request->search . '%');
                });
            }

            if ($request->fakultas) {
                $query->where('fakultas', $request->fakultas);
            }

            $alumni = $query
                ->latest()
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Data karir alumni berhasil diambil',
                'data' => $alumni
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);

        }
    }

    /*
    |--------------------------------------------------------------------------
    | STATISTIK ALUMNI CAREER
    |--------------------------------------------------------------------------
    */

    public function stats()
    {
        try {

            return response()->json([
                'success' => true,
                'message' => 'Statistik karir alumni berhasil diambil',
                'data' => [
                    'total_alumni' => AlumniCareer::count(),

                    'total_perusahaan' => AlumniCareer::distinct('perusahaan')
                        ->count('perusahaan'),

                    'total_posisi' => AlumniCareer::distinct('posisi')
                        ->count('posisi'),

                    'total_fakultas' => AlumniCareer::distinct('fakultas')
                        ->count('fakultas'),
                ]
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);

        }
    }
}