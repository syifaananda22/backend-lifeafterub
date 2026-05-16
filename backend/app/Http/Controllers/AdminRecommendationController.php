<?php

namespace App\Http\Controllers;

use App\Models\CareerPreference;

class AdminRecommendationController extends Controller
{
    public function index()
    {
        return response()->json(
            CareerPreference::with([
                'user',
                'user.profile'
            ])
            ->orderBy('id', 'asc')
            ->get()
        );
    }

    public function destroy($id)
    {
        $recommendation = CareerPreference::findOrFail($id);

        $recommendation->delete();

        return response()->json([
            'message' => 'Data rekomendasi berhasil dihapus'
        ]);
    }
}