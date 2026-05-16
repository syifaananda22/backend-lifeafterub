<?php

namespace App\Http\Controllers;

use App\Models\SimulationHistory;
use App\Models\CareerPreference;

class AdminActivityController extends Controller
{
    public function index()
    {
        $histories = SimulationHistory::latest()
            ->get()
            ->map(function ($item) {
                return [
                    'id' => 'sim-' . $item->id,
                    'user' => 'User ID ' . $item->user_id,
                    'aktivitas' => 'Menyimpan simulasi karir: ' . ($item->title ?? '-'),
                    'status' => 'Selesai',
                    'created_at' => $item->created_at,
                ];
            });

        $preferences = CareerPreference::latest()
            ->get()
            ->map(function ($item) {
                return [
                    'id' => 'rec-' . $item->id,
                    'user' => 'User ID ' . $item->user_id,
                    'aktivitas' => 'Mengisi rekomendasi karir: ' . ($item->minat ?? '-'),
                    'status' => 'Selesai',
                    'created_at' => $item->created_at,
                ];
            });

        return response()->json(
            $histories
                ->merge($preferences)
                ->sortByDesc('created_at')
                ->values()
        );
    }
}