<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Career;
use App\Models\AlumniCareer;
use App\Models\SimulationHistory;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return response()->json([
            'total_users' => User::count(),
            'total_careers' => Career::count(),
            'total_alumni' => AlumniCareer::count(),
            'total_simulations' => SimulationHistory::count(),
        ]);
    }
}