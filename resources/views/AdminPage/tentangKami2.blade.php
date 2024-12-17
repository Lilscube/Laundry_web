@extends('AdminPage.DashBoardAdmin')

@section('content')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style>
    body {
        background-image: url('{{ asset('img/background.jpg') }}'); 
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        overflow-x: hidden;
    }

    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5); 
        z-index: -1;
    }

    h1 {
        font-size: 3rem;
        font-weight: bold;
        text-shadow: 0 4px 10px rgba(0, 0, 0, 0.6);
        color: #ffdd57; 
        margin-bottom: 30px;
    }

    .container-fluid {
        margin-top: 50px;
    }

    .card {
        background-color: #ffffff;
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
        transition: all 0.4s ease;
        overflow: hidden;
    }

    .card:hover {
        transform: scale(1.02);
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.5);
    }

    .card-body {
        padding: 40px;
        text-align: left;
        font-size: 1.1rem;
        color: #333;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 10px; 
    }

    .card-body h2 {
        font-size: 1.8rem;
        font-weight: bold;
        margin-bottom: 20px;
        color: #005082;
    }

    .card-img-top {
        border-radius: 20px 20px 0 0;
        object-fit: cover;
        height: 450px;
        transition: transform 0.4s ease;
    }

    .card:hover .card-img-top {
        transform: scale(1.1);
    }

    ul {
        list-style: none;
        padding-left: 0;
    }

    ul li {
        padding-left: 20px;
        margin-bottom: 10px;
        position: relative;
        color: #333;
        font-size: 1.1rem;
    }

    ul li:before {
        position: absolute;
        left: 0;
        color: #0077b6;
        font-size: 1.5rem;
        line-height: 1.2;
    }

    .card-text {
        font-size: 1.2rem;
        line-height: 1.7;
        color: #555;
    }

    .btn-learn-more {
        background: linear-gradient(120deg, #0077b6, #00b4d8);
        color: white;
        font-size: 1rem;
        padding: 12px 25px;
        border-radius: 50px;
        text-decoration: none;
        margin-top: 30px;
        display: inline-block;
        transition: all 0.3s ease;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    .btn-learn-more:hover {
        background: linear-gradient(120deg, #005082, #0077b6);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        transform: translateY(-5px);
    }

    @media (max-width: 768px) {
        h1 {
            font-size: 2.2rem;
        }

        .card-img-top {
            height: 250px;
        }

        .card-body {
            padding: 20px;
        }

        .btn-learn-more {
            padding: 10px 20px;
            font-size: 0.9rem;
        }
    }
</style>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12 text-center">
      <h1 style="color: hsla(210, 30%, 50%, 0.8)">Tentang Kami</h1>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <img src="{{ asset('img/j4.jpg') }}" class="card-img-top" alt="Laundry Image">
        <div class="card-body">
          <h2>Tentang Laundry Licius</h2>
          <p class="card-text">Kami adalah penyedia jasa laundry terbaik dan terpercaya di kota Yogyakarta. Kami memiliki pengalaman dan pengetahuan yang luas dalam bisnis laundry, serta menggunakan teknologi terkini untuk memberikan hasil terbaik kepada pelanggan kami.</p>
          
          <h2>Visi Kami</h2>
          <p class="card-text">Menjadi laundry berkualitas yang dikelola secara profesional, memberikan kontribusi positif bagi pelanggan, karyawan, dan pemilik.</p>

          <h2>Misi Kami</h2>
          <ul>
            <p class="card-text">Selalu meningkatkan kualitas SDM kami agar dapat memberikan layanan terbaik dan profesional.
            Memberikan pelayanan yang prima dan penuh perhatian kepada semua pelanggan kami. Menghasilkan proses laundry yang bersih, rapi, dan harum dengan bahan ramah lingkungan.
            Menjaga ketepatan waktu dalam penyelesaian laundry untuk kepuasan pelanggan. Membangun manajemen dan teamwork yang solid untuk efektivitas kerja.
            </p>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="text-center mt-5">
    <!-- <p style="color: #333">&copy; 2024 Laundry Kami. Semua hak dilindungi. | <a href="#" style="color: hsla(210, 30%, 50%, 0.8)">Kebijakan Privasi</a> | <a href="#" style="color: hsla(210, 30%, 50%, 0.8)">Kontak</a></p> -->
  </div>
</div>

@endsection

