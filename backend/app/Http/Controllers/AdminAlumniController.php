<?php

namespace App\Http\Controllers;

use App\Models\AlumniCareer;
use Illuminate\Http\Request;

class AdminAlumniController extends Controller
{
    public function index()
    {
        return response()->json(
            AlumniCareer::orderBy('id', 'asc')->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'angkatan' => 'required',
            'prodi' => 'required',
            'karir' => 'required',
            'perusahaan' => 'required',
            'gaji' => 'nullable',
            'lokasi' => 'nullable',
            'tips' => 'nullable',
            'linkedin' => 'nullable',
            'image' => 'nullable',
        ]);

        $alumni = AlumniCareer::create($request->all());

        return response()->json([
            'message' => 'Data alumni berhasil ditambahkan',
            'data' => $alumni
        ]);
    }

    public function update(Request $request, $id)
    {
        $alumni = AlumniCareer::findOrFail($id);

        $alumni->update($request->all());

        return response()->json([
            'message' => 'Data alumni berhasil diperbarui',
            'data' => $alumni
        ]);
    }

    public function destroy($id)
    {
        $alumni = AlumniCareer::findOrFail($id);
        $alumni->delete();

        return response()->json([
            'message' => 'Data alumni berhasil dihapus'
        ]);
    }
}