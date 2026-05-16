<?php

namespace App\Http\Controllers;

use App\Models\CareerField;
use Illuminate\Http\Request;

class AdminCareerFieldController extends Controller
{
    public function index()
    {
        return response()->json(
            CareerField::latest()->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bidang' => 'required',
        ]);

        $field = CareerField::create([
            'nama_bidang' => $request->nama_bidang,
        ]);

        return response()->json([
            'message' => 'Career field berhasil ditambahkan',
            'data' => $field
        ]);
    }

    public function update(Request $request, $id)
    {
        $field = CareerField::findOrFail($id);

        $request->validate([
            'nama_bidang' => 'required',
        ]);

        $field->update([
            'nama_bidang' => $request->nama_bidang,
        ]);

        return response()->json([
            'message' => 'Career field berhasil diperbarui',
            'data' => $field
        ]);
    }

    public function destroy($id)
    {
        $field = CareerField::findOrFail($id);

        $field->delete();

        return response()->json([
            'message' => 'Career field berhasil dihapus'
        ]);
    }
}