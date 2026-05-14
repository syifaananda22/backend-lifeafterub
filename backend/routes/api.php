<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\CareerController;
use App\Http\Controllers\Api\SimulationController;
use App\Http\Controllers\Api\AlumniCareerController;
use App\Http\Controllers\Api\CareerRecommendationController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| CAREER PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/fields', [CareerController::class, 'fields']);
Route::get('/careers/{id}', [CareerController::class, 'careersByField']);
Route::get('/career/{id}', [CareerController::class, 'detail']);
Route::get('/career-search', [CareerController::class, 'search']);
Route::get('/career-recommendation', [CareerController::class, 'recommendation']);

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profil', [ProfileController::class, 'show']);
    Route::post('/profil', [ProfileController::class, 'store']);
    Route::put('/profil/password', [ProfileController::class, 'changePassword']);

    /*
    |--------------------------------------------------------------------------
    | HISTORY SIMULATION
    |--------------------------------------------------------------------------
    */

    Route::post('/history', [SimulationController::class, 'storeHistory']);
    Route::get('/history', [SimulationController::class, 'getHistory']);
    Route::delete('/history/{id}', [SimulationController::class, 'deleteHistory']);

    /*
    |--------------------------------------------------------------------------
    | CAREER RECOMMENDATION
    |--------------------------------------------------------------------------
    */

    Route::post('/career-recommendations', [CareerRecommendationController::class, 'recommend']);
});

 /*
    |--------------------------------------------------------------------------
    | ALUMNI CAREER
    |--------------------------------------------------------------------------
    */

Route::get('/alumni-careers', [AlumniCareerController::class, 'index']);
Route::get('/alumni-careers/stats', [AlumniCareerController::class, 'stats']);

/*
|--------------------------------------------------------------------------
| FALLBACK
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return response()->json([
        'success' => false,
        'message' => 'API route not found'
    ], 404);
});