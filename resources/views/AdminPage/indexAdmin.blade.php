@extends('AdminPage.DashboardAdmin')

@section('content')

<style>
    .gambar {
        height: 100px;
        width: 100px;
        border-radius: 100px;
        border: 2px solid #dddddd;
        background-image: none;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .gambarKelas {
        width: 300px;
        height: 200px;
        border-radius: 10px;
        object-fit: cover;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card {
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.03);
    }

    .rating-icon {
        color: Gold;
    }

    .table {
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
    }

    .table th, .table td {
        vertical-align: middle;
        padding: 15px;
    }

    .container-fluid {
        background: linear-gradient(135deg, #0077b6, #00395d);
        padding: 20px;
        border-radius: 10px;
        
    }

    .content {
        padding: 20px;
    }

    .card-body h4 {
        font-size: 24px;
        font-weight: bold;
    }

    .card-body p {
        font-size: 14px;
        color: #666;
    }

    .table thead {
        background-color: #343a40;
        color: white;
    }
</style>

<div class="container-fluid">
    <h1 style="color: hsla(0, 0%, 0%, 0.8)">Dashboard</h1>

    <div class="row align-items-center mt-3">
        <div class="col-md-4 col-sm-6">
            <div class="card p-0 mx-3">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="gambar p-1 me-2" src="{{ asset('img/g2.jpg') }}" alt="Jumlah Orderan">
                        <div class="text-start mt-2">
                            <p class="m-0">Jumlah Orderan</p>
                            <h4>6</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card p-0 mx-3">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="gambar p-1 me-2" src="{{ asset('img/g1.jpg') }}" alt="Jumlah Karyawan">
                        <div class="text-start mt-2">
                            <p class="m-0">Jumlah Karyawan</p>
                            <h4>6</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card p-0 mx-3">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="gambar p-1 me-2" src="{{ asset('img/g3.jpg') }}" alt="Total Transaksi/Hari">
                        <div class="text-start mt-2">
                            <p class="m-0">Total Transaksi / Hari</p>
                            <h4>4</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h2 class="mt-4">Jumlah Orderan</h2>
        <table class="table table-striped border-dark text-center">
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>TGL ORDER</th>
                    <th>BERAT (KG)</th>
                    <th>DURASI</th>
                    <th>LAYANAN</th>
                    <th>METODE PEMBAYARAN</th>
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
                        <td>{{ ucfirst($layanan->metode_pembayaran) }}</td>
                        <td>Rp {{ number_format($layanan->harga, 0, ',', '.') }}</td>
                        <td>Lunas</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada layanan yang diinputkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
</div>

@endsection
