@extends('UserPage.DashboardUser')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow" style="background: linear-gradient(90deg, #0077b6, #00395d);">
                <div class="card-header text-center text-white" style="background: linear-gradient(90deg, #0077b6, #00395d)">
                    <h2>Layanan</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="layanan-item text-center border rounded p-3">
                                <img src="{{ asset('img/j7.jpeg') }}" alt="Layanan Express" class="layanan-gambar img-fluid rounded mb-2">
                                <h3 class="font-weight-bold">Express</h3>
                                <p>Pilihan cepat untuk pakaian Anda</p>
                                <a href="{{ url('UserPage/layananEx') }}" class="btn btn-primary">Pilih</a>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="layanan-item text-center border rounded p-3">
                                <img src="{{ asset('img/j8.jpeg') }}" alt="Layanan Regular" class="layanan-gambar img-fluid rounded mb-2">
                                <h3 class="font-weight-bold">Regular</h3>
                                <p>Pilihan standar untuk kebutuhan sehari-hari</p>
                                <a href="{{ url('UserPage/layananRe') }}" class="btn btn-primary">Pilih</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background: linear-gradient(135deg, #f0f4f8, #cfe9fc);
        font-family: 'Poppins', sans-serif;
        color: #333;
    }

    .card {
        border-radius: 15px;
        overflow: hidden;
    }

    .layanan-gambar {
        max-height: 150px; 
        object-fit: cover;
        border-radius: 10px; 
    }

    .layanan-item {
        height: 300px; 
        width: 100%;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #ffffff;
        border: 1px solid #dee2e6; 
        border-radius: 10px; 
        padding: 20px;
    }

    .layanan-item:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        background: linear-gradient(90deg, #0077b6, #00395d);
        border: none;
        border-radius: 25px;
        padding: 10px 20px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3; 
        transform: translateY(-2px);
    }
</style>

@endsection
