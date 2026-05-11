<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // SIMPAN / UPDATE PROFILE
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'fakultas' => 'required',
                'prodi' => 'required',
                'tahun_masuk' => 'required'
            ]);

            $profile = Profile::updateOrCreate(
                [
                    'user_id' => auth()->user()->id
                ],
                [
                    'nama' => $request->nama,
                    'fakultas' => $request->fakultas,
                    'prodi' => $request->prodi,
                    'tahun_masuk' => $request->tahun_masuk,
                ]
            );

            return response()->json([
                'message' => 'Profil berhasil disimpan',
                'data' => $profile
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // AMBIL PROFILE USER LOGIN
    public function show()
    {
        try {
            $profile = Profile::where('user_id', auth()->user()->id)->first();

            return response()->json($profile);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}