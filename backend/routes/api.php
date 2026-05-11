<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| AUTH (PUBLIC)
|--------------------------------------------------------------------------
*/

// REGISTER
Route::post('/register', [AuthController::class, 'register']);

// LOGIN
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| PROFILE (PROTECTED - WAJIB LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    // simpan / update profile
    Route::post('/profil', [ProfileController::class, 'store']);

    // ambil profile user login
    Route::get('/profil', [ProfileController::class, 'show']);
});