<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Create a new Karyawan
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'id_admin' => 'required|integer|exists:admins,id',
            'foto_karyawan' => 'required|string|max:255',
            'nama_karyawan' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|unique:karyawans,email',
        ]);

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
            'id_admin' => 'sometimes|required|integer|exists:admins,id',
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
        // Ambil semua data karyawan
        $karyawans = Karyawan::all();

        // Kirim data ke view 'AdminPage.karyawan'
        return view('AdminPage.karyawan', compact('karyawans'));
    }

}
