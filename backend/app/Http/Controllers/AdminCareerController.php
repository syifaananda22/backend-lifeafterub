<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class AdminCareerController extends Controller
{
    public function index()
    {
        return response()->json(
            Career::orderBy('id', 'asc')->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'field_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'salary' => 'nullable',
            'skill' => 'nullable',
            'tools' => 'nullable',
            'tugas' => 'nullable',
            'prospek' => 'nullable',
            'image' => 'nullable',
        ]);

        $career = Career::create([
            'field_id' => $request->field_id,
            'title' => $request->title,
            'salary' => $request->salary,
            'skill' => $request->skill,
            'description' => $request->description,
            'tugas' => $request->tugas,
            'prospek' => $request->prospek,
            'tools' => $request->tools,
            'image' => $request->image,
        ]);

        return response()->json([
            'message' => 'Data karir berhasil ditambahkan',
            'data' => $career
        ]);
    }

    public function update(Request $request, $id)
    {
        $career = Career::findOrFail($id);

        $request->validate([
            'field_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'salary' => 'nullable',
            'skill' => 'nullable',
            'tools' => 'nullable',
            'tugas' => 'nullable',
            'prospek' => 'nullable',
            'image' => 'nullable',
        ]);

        $career->update([
            'field_id' => $request->field_id,
            'title' => $request->title,
            'salary' => $request->salary,
            'skill' => $request->skill,
            'description' => $request->description,
            'tugas' => $request->tugas,
            'prospek' => $request->prospek,
            'tools' => $request->tools,
            'image' => $request->image,
        ]);

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