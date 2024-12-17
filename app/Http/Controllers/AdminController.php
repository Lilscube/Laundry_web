<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'no_token' => 'required|integer|min:1|max:99999999999',
        ]);
    
        // Simpan admin tanpa `id_transaksi`
        $admin = Admin::create([
            'no_token' => $validatedData['no_token'],
        ]);
    
        return response()->json([
            'message' => 'Admin registered successfully.',
            'admin' => $admin,

        ], 201);
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'no_token' => 'required|integer',
        ]);

        // Periksa apakah admin dengan `no_token` ada
        $admin = Admin::where('no_token', $validatedData['no_token'])->first();

        if (!$admin) {
            return response()->json([
                'message' => 'Invalid token or admin does not exist.',
            ], 401);
        }
        // $token = $admin->createToken('admin-token')->plainTextToken;

        // Login berhasil
        return response()->json([
            'message' => 'Admin login successful.',
            'admin' => $admin,
            // 'token' => $token,
            
        ], 200);

    }

    public function logout(Request $request)
    {
        // Hapus semua token autentikasi yang aktif untuk admin
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Admin logged out successfully.',
        ], 200);
    }

    public function showLoginForm()
    {
        return view('AdminPage.LoginAdmin'); // Ganti dengan path view login Anda
    }



}
