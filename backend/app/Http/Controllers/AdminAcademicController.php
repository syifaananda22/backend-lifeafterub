<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class AdminAcademicController extends Controller
{
    public function index()
    {
        return response()->json(
            Profile::with('user')
                ->latest()
                ->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:profiles,user_id',
            'nama' => 'required',
            'fakultas' => 'required',
            'prodi' => 'required',
            'tahun_masuk' => 'required',
        ]);

        $profile = Profile::create([
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return response()->json([
            'message' => 'Profil akademik berhasil ditambahkan',
            'data' => $profile
        ]);
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'fakultas' => 'required',
            'prodi' => 'required',
            'tahun_masuk' => 'required',
        ]);

        $profile->update([
            'nama' => $request->nama,
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return response()->json([
            'message' => 'Profil akademik berhasil diperbarui',
            'data' => $profile
        ]);
    }

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return response()->json([
            'message' => 'Profil akademik berhasil dihapus'
        ]);
    }
}