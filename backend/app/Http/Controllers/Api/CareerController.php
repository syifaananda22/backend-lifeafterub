<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Career;
use App\Models\CareerField;

use Illuminate\Http\Request;

class CareerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | AMBIL SEMUA BIDANG KARIR
    |--------------------------------------------------------------------------
    */

    public function fields()
    {
        $fields = CareerField::orderBy(
            'id',
            'ASC'
        )->get();

        return response()->json($fields);
    }

    /*
    |--------------------------------------------------------------------------
    | AMBIL PEKERJAAN BERDASARKAN BIDANG
    |--------------------------------------------------------------------------
    */

    public function careersByField($id)
    {
        $careers = Career::where(
            'field_id',
            $id
        )
        ->orderBy(
            'title',
            'ASC'
        )
        ->get();

        return response()->json($careers);
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL PEKERJAAN
    |--------------------------------------------------------------------------
    */

    public function detail($id)
    {
        $career = Career::find($id);

        // JIKA DATA TIDAK DITEMUKAN

        if (!$career) {

            return response()->json([

                'success' => false,
                'message' => 'Data pekerjaan tidak ditemukan'

            ], 404);

        }

        // RESPONSE BERHASIL

        return response()->json([

            'success' => true,
            'data' => $career

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | SEARCH PEKERJAAN
    |--------------------------------------------------------------------------
    */

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $careers = Career::where(
            'title',
            'LIKE',
            '%' . $keyword . '%'
        )->orderBy(
            'title',
            'ASC'
        )->get();

        return response()->json($careers);
    }

    /*
    |--------------------------------------------------------------------------
    | REKOMENDASI PEKERJAAN
    |--------------------------------------------------------------------------
    */

    public function recommendation()
    {
        $careers = Career::inRandomOrder()
            ->take(6)
            ->get();

        return response()->json($careers);
    }
}