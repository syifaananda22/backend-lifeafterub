<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SimulationHistory;

class SimulationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SIMPAN HISTORY
    |--------------------------------------------------------------------------
    */

    public function storeHistory(Request $request)
    {
        try {

            $request->validate([
                'career_id' => 'required',
                'title' => 'required',
            ]);

            // cek user login
            if (!$request->user()) {

                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 401);

            }

            $history = SimulationHistory::create([
                'user_id' => $request->user()->id,
                'career_id' => $request->career_id,
                'title' => $request->title,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'History berhasil disimpan',
                'data' => $history
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
    | AMBIL HISTORY USER
    |--------------------------------------------------------------------------
    */

    public function getHistory(Request $request)
    {
        try {

            $history = SimulationHistory::where(
                'user_id',
                $request->user()->id
            )
            ->latest()
            ->get();

            return response()->json([
                'success' => true,
                'data' => $history
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
    | DELETE HISTORY
    |--------------------------------------------------------------------------
    */

    public function deleteHistory($id, Request $request)
    {
        try {

            $history = SimulationHistory::where('id', $id)
                ->where('user_id', $request->user()->id)
                ->first();

            if (!$history) {

                return response()->json([
                    'success' => false,
                    'message' => 'History tidak ditemukan'
                ], 404);

            }

            $history->delete();

            return response()->json([
                'success' => true,
                'message' => 'History berhasil dihapus'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);

        }
    }
}