@extends('UserPage.DashboardUser')

@section('content')

<style>
    .table {
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #005082;
    }

    .table th {
        background-color: #005082;
        color: white;
        text-align: center;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f8f9fa;
    }

    .table-striped tbody tr:nth-of-type(even) {
        background-color: #e9ecef;
    }

    .table-hover tbody tr:hover {
        background-color: #d1ecf1;
        cursor: pointer;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
        border-radius: 25px;
        padding: 5px 10px;
        font-size: 0.9rem;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .alert {
        font-size: 1.2rem;
    }

    .custom-radius {
        border-radius: 3px;
    }
</style>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header text-center text-white" style="background: linear-gradient(135deg, #005082, #00a5cf);">
                    <h2>Riwayat Transaksi</h2>
                </div>
                <div class="card-body">
                        @if (isset($layanans) && $layanans->isNotEmpty())
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <!-- <th>ID User</th> -->
                                    <th>Detail Layanan</th>
                                    <th>Berat (Kg)</th>
                                    <th>Durasi</th>
                                    <th>Harga</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($layanans as $layanan)
                                    <tr>
                                        <!-- <td class="text-center">{{ $layanan->id_user }}</td> -->
                                        <td class="text-center">{{ ucfirst($layanan->detail_layanan) }}</td>
                                        <td class="text-center">{{ $layanan->berat }}</td>
                                        <td class="text-center">{{ $layanan->durasi }}</td>
                                        <td class="text-center">Rp {{ number_format($layanan->harga, 0, ',', '.') }}</td>
                                        <td class="text-center">{{ $layanan->metode_pembayaran }}</td>
                                        <td class="text-center">{{ $layanan->created_at->format('d-m-Y') }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('layanan.destroy', $layanan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" radius="25px" class="btn btn-danger custom-radius">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning text-center">
                            <strong>Belum ada riwayat transaksi.</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
