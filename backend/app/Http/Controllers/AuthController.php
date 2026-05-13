<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */

    public function register(Request $request)
    {
        // VALIDASI
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        // BUAT USER
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // BUAT TOKEN
        $token = $user->createToken('auth_token')->plainTextToken;

        // RESPONSE
        return response()->json([
            'message' => 'Akun berhasil dibuat',
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
            ]
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        // VALIDASI LOGIN
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // CARI USER
        $user = User::with('profile')
            ->where('email', $request->email)
            ->first();

        // EMAIL TIDAK ADA
        if (!$user) {
            return response()->json([
                'message' => 'Email tidak ditemukan'
            ], 404);
        }

        // PASSWORD SALAH
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Password salah'
            ], 401);
        }

        // TOKEN LOGIN
        $token = $user->createToken('auth_token')->plainTextToken;

        // RESPONSE LOGIN
        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
                'nama' => $user->profile?->nama,
                'prodi' => $user->profile?->prodi,
            ]
        ]);
    }
}