<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\LayananExpress;
use App\Models\LayananReguler;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Create a new layanan.
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'id_user' => 'required|integer|exists:users,id',
            'detail_layanan' => 'required|in:express,reguler', // Pilihan express atau reguler
            'berat' => 'required|integer',
            'durasi' => 'required|string',
            'harga' => 'required|integer',
            'metode_pembayaran' => 'required|string',
        ]);

        $layanan = Layanan::create($validatedData);

        if ($validatedData['detail_layanan'] === 'express') {
            LayananExpress::create([
                'id_layanan_exspres' => $layanan->id,
                'metode_pembayaran' => $validatedData['metode_pembayaran'],
            ]);
        } elseif ($validatedData['detail_layanan'] === 'reguler') {
            LayananReguler::create([
                'id_layanan_reguler' => $layanan->id,
                'metode_pembayaran' => $validatedData['metode_pembayaran'],
            ]);
        }

        return response()->json([
            'message' => 'Layanan created successfully.',
            'layanan' => $layanan,
        ], 201);
    }

    /**
     * Get all layanan.
     */
    public function index()
    {
        try {
            // Ambil semua data dari tabel layanan
            $layanans = Layanan::all();
    
            return response()->json([
                'status' => true,
                'message' => 'Data layanan retrieved successfully.',
                'data' => $layanans,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get a single layanan by ID.
     */
    public function show($id)
    {
        $layanan = Layanan::with(['layananExpress', 'layananReguler'])->find($id);

        if (!$layanan) {
            return response()->json([
                'message' => 'Layanan not found.',
            ], 404);
        }

        return response()->json([
            'message' => 'Layanan retrieved successfully.',
            'layanan' => $layanan,
        ], 200);
    }

    public function destroy($id)
    {
        try {
            $layanan = Layanan::findOrFail($id); // Cari layanan berdasarkan ID
            $layanan->delete(); // Hapus layanan

            return response()->json([
                'status' => true,
                'message' => 'Layanan deleted successfully.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete layanan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
