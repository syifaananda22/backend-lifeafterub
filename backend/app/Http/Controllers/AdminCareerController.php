<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class AdminCareerController extends Controller
{
    public function index()
    {
        return response()->json(
            Career::latest()->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'career_field_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'salary' => 'nullable',
            'skill' => 'nullable',
            'tools' => 'nullable',
            'tugas' => 'nullable',
            'prospek' => 'nullable',
            'image' => 'nullable',
        ]);

        $career = Career::create($request->all());

        return response()->json([
            'message' => 'Data karir berhasil ditambahkan',
            'data' => $career
        ]);
    }

    public function update(Request $request, $id)
    {
        $career = Career::findOrFail($id);

        $career->update($request->all());

        return response()->json([
            'message' => 'Data karir berhasil diperbarui',
            'data' => $career
        ]);
    }

    public function destroy($id)
    {
        $career = Career::findOrFail($id);
        $career->delete();

        return response()->json([
            'message' => 'Data karir berhasil dihapus'
        ]);
    }
}