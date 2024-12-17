<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Layanan;
use App\Models\LayananExpress;
use App\Models\LayananReguler;
use App\Models\Karyawan;
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
            $layanan = Layanan::findOrFail($id);
            $layanan->delete();
    
            return back()->with('success', 'Riwayat transaksi berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'detail_layanan' => 'required|in:express,reguler', // Harus "express" atau "reguler"
            'berat' => 'required|integer|min:1',
            'durasi' => 'required|string',
            'harga' => 'required|integer|min:1000',
            'metode_pembayaran' => 'required|string',
        ]);

        try {
            // Ambil ID user yang sedang login
            $userId = Auth::id();

            // Simpan data layanan ke database
            $layanan = Layanan::create([
                'id_user' => $userId,
                'detail_layanan' => $validatedData['detail_layanan'],
                'berat' => $validatedData['berat'],
                'durasi' => $validatedData['durasi'],
                'harga' => $validatedData['harga'],
                'metode_pembayaran' => $validatedData['metode_pembayaran'],
            ]);

            // Simpan detail layanan (express atau reguler)
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
                'status' => true,
                'message' => 'Layanan successfully stored.',
                'data' => $layanan
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to store layanan.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function tampilRiwayat()
    {
        // Ambil data layanan express dan reguler dari database
        $layanans = Layanan::whereIn('detail_layanan', ['express', 'reguler'])->get();

        // Kirim data ke view
        return view('UserPage.tampilRiwayat', compact('layanans'));
    }

    public function indexForAdmin()
    {
        try {
            // Ambil semua data layanan
            $layanans = Layanan::all();

            // Kembalikan data ke view
            return view('AdminPage.indexAdmin', compact('layanans'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat data layanan.');
        }
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $layanan = Layanan::findOrFail($id);
            $layanan->status = $request->input('status');
            $layanan->save();

            return response()->json([
                'status' => true,
                'message' => 'Status updated successfully.',
                'data' => $layanan,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to update status.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function indexTotal()
    {
        // Ambil semua data layanan dari database
        $layanans = Layanan::all();

        // Hitung total harga
        $totalHarga = $layanans->sum('harga');

        // Kirim data layanan dan total harga ke view
        return view('AdminPage.indexTotal', compact('layanans', 'totalHarga'));
    }

    public function indexDashboard()
    {
        // Ambil jumlah orderan dari layanan
        $jumlahOrderan = Layanan::count();

        // Ambil jumlah karyawan dari tabel karyawan
        $jumlahKaryawan = Karyawan::count();

        // Hitung total transaksi
        $totalTransaksi = Layanan::sum('harga');

        // Ambil semua data layanan
        $layanans = Layanan::all();

        // Kirim data ke view
        return view('AdminPage.indexAdmin', compact('jumlahOrderan', 'jumlahKaryawan', 'totalTransaksi', 'layanans'));
    }
}
