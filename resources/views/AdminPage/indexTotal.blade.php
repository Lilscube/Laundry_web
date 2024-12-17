@extends('AdminPage.DashboardAdmin')

@section('content')

<style>
    .gambar {
        height: 100px;
        width: 100px;
        border-radius: 100px;
        border: 2px solid #ddd;
        background-image: none;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .table-container {
        padding: 20px;
        border-radius: 10px;
        background: linear-gradient(135deg, #0077b6, #00395d);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
    }

    .table {
        border: none;
        border-radius: 8px;
        background-color: white;
        width: 100%;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .table th, .table td {
        vertical-align: middle;
        padding: 10px;
        border: 1px solid #ddd;
    }

    .table th {
        background-color: #343a40;
        color: white;
    }

    .total-box {
        position: relative;
        float: right;
        padding: 15px 30px;
        background-color: #343a40;
        color: white;
        border-radius: 8px;
        font-size: 18px;
        font-weight: bold;
    }
</style>

<div class="container-fluid">
    <h4 class="fw-bold">Selamat Datang, Admin</h4>
    <h1>Total Transaksi</h1>

    <div class="table-container mt-4">
        <table class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>TGL ORDER</th>
                    <th>BERAT (KG)</th>
                    <th>DURASI</th>
                    <th>LAYANAN</th>
                    <th>HARGA</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($layanans as $key => $layanan)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($layanan->created_at)->format('d - m - Y') }}</td>
                        <td>{{ $layanan->berat }} kg</td>
                        <td>{{ $layanan->durasi }}</td>
                        <td>{{ ucfirst($layanan->detail_layanan) }}</td>
                        <td>Rp {{ number_format($layanan->harga, 0, ',', '.') }}</td>
                        <td>{{ $layanan->status ?? 'Lunas' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada transaksi yang diinputkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="total-box mt-3">
            <h4>Total Biaya: Rp {{ number_format($totalHarga, 0, ',', '.') }}</h4>
        </div>
    </div>
</div>

@endsection
