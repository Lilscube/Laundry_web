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

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .container-fluid {
        margin-top: 20px;
        padding: 30px;
    }

    h1, h2 {
        font-weight: bold;
    }

    .dashboard-header {
        text-align: left;
        color: black;
    }

    .welcome-message {
        font-weight: bold;
        font-size: 16px;
        color: black;
    }

    .total-box {
        position: relative;
        float: right;
        padding: 15px 30px;
        background-color: #343a40;
        color: white;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        font-size: 18px;
        font-weight: bold;
        display: inline-block;
    }

    .total-box h4 {
        margin: 0;
    }

    @media (max-width: 1000px) {
        .total-box {
            float: none;
            margin-top: 20px;
            text-align: center;
        }
    }
</style>

<div class="container-fluid">
    <h4 class="welcome-message">Selamat Datang, Admin</h4>
    <h1 class="dashboard-header">Total Transaksi</h1>

    <div class="table-container mt-4">
        <table class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>TGL ORDER</th>
                    <th>NAMA</th>
                    <th>BERAT (KG)</th>
                    <th>HARI</th>
                    <th>LAYANAN</th>
                    <th>HARGA</th>
                    <th>STATUS</th> 
                </tr>
            </thead>
            <tbody>
                @php
                    $totalHarga = 0;
                @endphp
                <tr>
                    <td>1</td>
                    <td>15 - 10 - 2024</td>
                    <td>Ayas</td>
                    <td>5kg</td>
                    <td>3 hari</td>
                    <td>Cuci Ekspres</td>
                    <td>Rp 30.000</td>
                    <td>Lunas</td>
                </tr>
                @php
                    $totalHarga += 30000;
                @endphp
                <tr>
                    <td>2</td>
                    <td>15 - 10 - 2024</td>
                    <td>Bobob</td>
                    <td>6kg</td>
                    <td>2 hari</td>
                    <td>Cuci Reguler</td>
                    <td>Rp 30.000</td>
                    <td>Lunas</td>
                </tr>
                @php
                    $totalHarga += 30000;
                @endphp
                <tr>
                    <td>3</td>
                    <td>14 - 10 - 2024</td>
                    <td>Charli</td>
                    <td>4kg</td>
                    <td>2 hari</td>
                    <td>Cuci Reguler</td>
                    <td>Rp 20.000</td>
                    <td>Lunas</td>
                </tr>
                @php
                    $totalHarga += 20000;
                @endphp
                <tr>
                    <td>4</td>
                    <td>14 - 10 - 2024</td>
                    <td>Echaa</td>
                    <td>5kg</td>
                    <td>2 hari</td>
                    <td>Cuci Reguler</td>
                    <td>Rp 25.000</td>
                    <td>Lunas</td>
                </tr>
                @php
                    $totalHarga += 25000;
                @endphp
            </tbody>
        </table>

        <div class="total-box mt-3">
            <h4>Total Biaya: Rp {{ number_format($totalHarga, 0, ',', '.') }}</h4>
        </div>
    </div>
</div>

@endsection
