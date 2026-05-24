<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\CareerController;
use App\Http\Controllers\Api\SimulationController;
use App\Http\Controllers\Api\AlumniCareerController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminAcademicController;
use App\Http\Controllers\AdminCareerController;
use App\Http\Controllers\AdminCareerFieldController;
use App\Http\Controllers\AdminAlumniController;
use App\Http\Controllers\AdminActivityController;
use App\Http\Controllers\AdminCompanyController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AdminCompanyJobController;

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
| COMPANY PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/{companyId}/jobs', [CompanyController::class, 'showJobs']);

/*
|--------------------------------------------------------------------------
| ALUMNI CAREER PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/alumni-careers', [AlumniCareerController::class, 'index']);
Route::get('/alumni-careers/stats', [AlumniCareerController::class, 'stats']);

/*
|--------------------------------------------------------------------------
| ADMIN PUBLIC READ
|--------------------------------------------------------------------------
| Route GET ini bisa diakses tanpa login supaya data dashboard/admin tetap load.
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);

Route::get('/admin/users', [AdminUserController::class, 'index']);

Route::get('/admin/academic', [AdminAcademicController::class, 'index']);

Route::get('/admin/careers', [AdminCareerController::class, 'index']);

Route::get('/admin/career-fields', [AdminCareerFieldController::class, 'index']);

Route::get('/admin/alumni', [AdminAlumniController::class, 'index']);

Route::get('/admin/activity', [AdminActivityController::class, 'index']);

Route::get('/admin/companies', [AdminCompanyController::class, 'index']);

Route::get('/admin/company-jobs', [AdminCompanyJobController::class, 'index']);

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES
|--------------------------------------------------------------------------
| Route di bawah ini tetap wajib login.
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
    | ADMIN USERS
    |--------------------------------------------------------------------------
    */

    Route::post('/admin/users', [AdminUserController::class, 'store']);
    Route::put('/admin/users/{id}', [AdminUserController::class, 'update']);
    Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | ADMIN ACADEMIC
    |--------------------------------------------------------------------------
    */

    Route::post('/admin/academic', [AdminAcademicController::class, 'store']);
    Route::put('/admin/academic/{id}', [AdminAcademicController::class, 'update']);
    Route::delete('/admin/academic/{id}', [AdminAcademicController::class, 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | ADMIN CAREERS
    |--------------------------------------------------------------------------
    */

    Route::post('/admin/careers', [AdminCareerController::class, 'store']);
    Route::put('/admin/careers/{id}', [AdminCareerController::class, 'update']);
    Route::delete('/admin/careers/{id}', [AdminCareerController::class, 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | ADMIN CAREER FIELDS
    |--------------------------------------------------------------------------
    */

    Route::post('/admin/career-fields', [AdminCareerFieldController::class, 'store']);
    Route::put('/admin/career-fields/{id}', [AdminCareerFieldController::class, 'update']);
    Route::delete('/admin/career-fields/{id}', [AdminCareerFieldController::class, 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | ADMIN ALUMNI
    |--------------------------------------------------------------------------
    */

    Route::post('/admin/alumni', [AdminAlumniController::class, 'store']);
    Route::put('/admin/alumni/{id}', [AdminAlumniController::class, 'update']);
    Route::delete('/admin/alumni/{id}', [AdminAlumniController::class, 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | ADMIN COMPANIES
    |--------------------------------------------------------------------------
    */

    Route::delete('/admin/companies/{id}', [AdminCompanyController::class, 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | ADMIN COMPANY JOBS
    |--------------------------------------------------------------------------
    */

    Route::post('/admin/company-jobs', [AdminCompanyJobController::class, 'store']);
    Route::put('/admin/company-jobs/{id}', [AdminCompanyJobController::class, 'update']);
    Route::delete('/admin/company-jobs/{id}', [AdminCompanyJobController::class, 'destroy']);
});

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