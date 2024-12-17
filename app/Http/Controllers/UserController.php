<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Handle user registration.
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'no_telp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'no_telp' => $validatedData['no_telp'],
            'alamat' => $validatedData['alamat'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return response()->json([
            'message' => 'User registered successfully.',
            'user' => $user,
        ], 201);
        // return redirect()->route('login.page')->with('success', 'Registrasi berhasil! Silakan login.');
        // return redirect()->route('UserLogin')->with('success', 'Registration successful. Please login.');
    }

    /**
     * Handle user login.
     */
    public function login(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'username' => 'required|string', // Bisa diubah menjadi 'username' jika login pakai username
            'password' => 'required|string',
        ]);

        $user = User::where('username', $validatedData['username'])->first();
    
        // Cek kredensial menggunakan username
        if (!Auth::attempt(['username' => $validatedData['username'], 'password' => $validatedData['password']])) {
            return response()->json([
                'message' => 'Username atau password salah.',
            ], 401);
        }
    
        // Ambil data user yang sedang login
        $user = Auth::user();
    
        // Buat token autentikasi menggunakan Laravel Sanctum
        $token = $user->createToken('auth_token')->plainTextToken;
    
        return response()->json([
            'message' => 'Login successful.',
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'User logged out successfully.',
        ]);
    }

    /**
     * Handle user update.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            'no_telp' => 'sometimes|string|max:15',
            'password' => 'sometimes|required|string|min:8',
            'alamat' => 'sometimes|required|string|max:255',
            'username' => 'sometimes|required|string|max:255|unique:users,username,' . $id,
        ]);

        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $user->update($validatedData);

        return response()->json([
            'message' => 'User updated successfully.',
            'user' => $user,
        ]);
    }

    /**
     * Handle user deletion.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully.',
        ]);
    }

    public function index()
    {
        // Ambil semua data user dari database
        $users = User::all();

        // Jika API digunakan, kembalikan sebagai JSON
        return response()->json([
            'message' => 'Data user retrieved successfully.',
            'users' => $users
        ], 200);

        // Jika menggunakan blade, tampilkan ke view
        // return view('Home.UserList', ['users' => $users]);
    }


    public function show($id)
    {
        // Cari user berdasarkan ID
        $user = User::find($id);

        // Jika user tidak ditemukan
        if (!$user) {
            return response()->json([
                'message' => 'User not found.'
            ], 404);
        }

        // Jika user ditemukan, kembalikan data user
        return response()->json([
            'message' => 'User data retrieved successfully.',
            'user' => $user
        ], 200);
    }

    public function profile()
    {
        // Ambil data user yang sedang login
        $user = Auth::user();
    
        // Jika user tidak login
        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized. Please login first.',
            ], 401);
        }
    
        // Kirim data user
        return response()->json([
            'message' => 'User profile retrieved successfully.',
            'user' => $user,
        ], 200);
    }

    public function indexProfileUser()
    {
        // $user = auth()->user();

        // Pastikan user sudah login
        // if (!$user) {
        //     return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        // }

        // Kirim data user ke view
        return view('UserPage.indexProfileUser', compact('user'));
    }

}
