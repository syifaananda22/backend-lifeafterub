<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        try {
            $user = $request->user();

            $profile = Profile::where('user_id', $user->id)->first();

            return response()->json([
                'success' => true,
                'data' => [
                    'email' => $user->email,
                    'nama' => $profile->nama ?? '',
                    'fakultas' => $profile->fakultas ?? '',
                    'prodi' => $profile->prodi ?? '',
                    'tahun_masuk' => $profile->tahun_masuk ?? '',
                    'foto' => $profile && $profile->foto
                        ? asset('storage/' . $profile->foto)
                        : null,
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'fakultas' => 'required',
                'prodi' => 'required',
                'tahun_masuk' => 'required',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $user = $request->user();

            $profile = Profile::where('user_id', $user->id)->first();

            $fotoPath = $profile->foto ?? null;

            if ($request->hasFile('foto')) {
                if ($fotoPath) {
                    Storage::disk('public')->delete($fotoPath);
                }

                $fotoPath = $request->file('foto')->store('profile', 'public');
            }

            $profile = Profile::updateOrCreate(
                [
                    'user_id' => $user->id,
                ],
                [
                    'nama' => $request->nama,
                    'fakultas' => $request->fakultas,
                    'prodi' => $request->prodi,
                    'tahun_masuk' => $request->tahun_masuk,
                    'foto' => $fotoPath,
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'Profil berhasil diperbarui',
                'data' => $profile
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $request->validate([
                'password_lama' => 'required',
                'password_baru' => 'required|min:6',
            ]);

            $user = $request->user();

            if (!Hash::check($request->password_lama, $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Password lama salah'
                ], 400);
            }

            $user->update([
                'password' => Hash::make($request->password_baru)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Password berhasil diganti'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}