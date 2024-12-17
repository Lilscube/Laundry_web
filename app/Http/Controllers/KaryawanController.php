<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryawanController extends Controller
{
    /**
     * Create a new Karyawan
     */
    public function create(Request $request)
    {
        // Validasi input tanpa id_admin
        $validatedData = $request->validate([
            'foto_karyawan' => 'required|string|max:255',
            'nama_karyawan' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|unique:karyawans,email',
        ]);

        // Tambahkan id_admin dari Auth (admin yang sedang login)
        // $validatedData['id_admin'] = Auth::id();

        // Simpan data karyawan ke database
        $karyawan = Karyawan::create($validatedData);

        return response()->json([
            'message' => 'Karyawan created successfully.',
            'karyawan' => $karyawan,
        ], 201);
    }


    /**
     * Get all Karyawans
     */
    public function index()
    {
        $karyawans = Karyawan::all();

        return response()->json([
            'message' => 'Karyawan list retrieved successfully.',
            'karyawans' => $karyawans,
        ], 200);
    }

    /**
     * Get a single Karyawan by ID
     */
    public function show($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json([
                'message' => 'Karyawan not found.',
            ], 404);
        }

        return response()->json([
            'message' => 'Karyawan retrieved successfully.',
            'karyawan' => $karyawan,
        ], 200);
    }

    /**
     * Update a Karyawan by ID
     */
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json([
                'message' => 'Karyawan not found.',
            ], 404);
        }

        $validatedData = $request->validate([
            'foto_karyawan' => 'sometimes|required|string|max:255',
            'nama_karyawan' => 'sometimes|required|string|max:255',
            'no_telp' => 'sometimes|required|string|max:15',
            'email' => 'sometimes|required|email|unique:karyawans,email,' . $id,
        ]);

        $karyawan->update($validatedData);

        return response()->json([
            'message' => 'Karyawan updated successfully.',
            'karyawan' => $karyawan,
        ], 200);
    }

    /**
     * Delete a Karyawan by ID
     */
    public function delete($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json([
                'message' => 'Karyawan not found.',
            ], 404);
        }

        $karyawan->delete();

        return response()->json([
            'message' => 'Karyawan deleted successfully.',
        ], 200);
    }

    public function viewKaryawan()
    {
        $karyawans = Karyawan::all();
        // dd($karyawans); // Debugging
        return view('AdminPage.karyawan', ['karyawans' => $karyawans]);
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'foto_karyawan' => 'required|string|max:255',
            'nama_karyawan' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|unique:karyawans,email',
        ]);

        // Simpan ke database
        $karyawan = Karyawan::create($validatedData);

        // Redirect ke halaman karyawan dengan pesan sukses
        return redirect()->route('karyawan.view')
                        ->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        // Cari data karyawan berdasarkan ID
        $karyawan = Karyawan::find($id);

        // Periksa jika data karyawan ditemukan
        if (!$karyawan) {
            return redirect()->back()->with('error', 'Karyawan tidak ditemukan.');
        }

        // Hapus data karyawan
        $karyawan->delete();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Karyawan berhasil dihapus.');
    }



}
