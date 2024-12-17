@extends('UserPage.DashboardUser')

@section('content')

<style>
    body {
        background-color: #f4f6f9;
        font-family: 'Poppins', sans-serif; 
    }

    .container-fluid {
        background: linear-gradient(135deg, #0077b6, #00395d);
        padding: 20px;
        border-radius: 10px;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        border: none;
        background-color: #fff;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
    }

    .card-header {
        padding: 0;
        margin: 0;
        border: none;
        height: 120px;
        background: linear-gradient(135deg, #1e3c72, #2a5298); 
        position: relative;
    }

    .profile-img {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        object-fit: cover;
        margin-top: -80px;
        border: 6px solid white;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        background-color: #fff;
        position: relative;
        z-index: 2;
    }

    .card-body {
        padding: 40px;
        background-color: #f8f9fa;
        text-align: center;
    }

    .card-body h5 {
        font-size: 2rem;
        font-weight: 600;
        margin-top: 15px;
        margin-bottom: 20px;
        color: #333;
    }

    .card-body p {
        font-size: 1.1rem;
        color: #555;
        margin-bottom: 10px;
    }

    .card-body .badge-status {
        font-size: 15px;
        background-color: #28a745;
        color: white;
        padding: 8px 16px;
        border-radius: 30px;
        font-weight: 600;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 30px;
        margin-top: 25px;
    }

    .social-icons a {
        color: #555;
        font-size: 1.8rem;
        transition: color 0.3s, transform 0.3s;
    }

    .social-icons a:hover {
        color: #007bff;
        transform: scale(1.1);
    }

    @media (max-width: 768px) {
        .profile-img {
            width: 120px;
            height: 120px;
        }

        .card-body h5 {
            font-size: 1.6rem;
        }

        .card-body p {
            font-size: 1rem;
        }

        .social-icons a {
            font-size: 1.5rem;
        }
    }
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-header"></div>
                <img src="{{ asset('img/j2.jpg') }}" class="profile-img mx-auto d-block" alt="User Image">
                <div class="card-body">
                    <h5 class="card-title" id="profile-name"></h5>
                    <p id="profile-email"></p>
                    <p id="profile-no-telp"></p>
                    <p id="profile-alamat"></p>
                    <p id="profile-message" class="text-danger"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const token = localStorage.getItem('token'); // Jika token disimpan di localStorage

        if (!token) {
            document.getElementById('profile-message').textContent = 'Token is missing or invalid.';
            return;
        }

        fetch('http://127.0.0.1:8000/profile', {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + token,
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.user) {
                // Menampilkan data pengguna ke elemen HTML
                document.getElementById('profile-name').textContent = data.user.nama;
                document.getElementById('profile-email').textContent = 'Email: ' + data.user.email;
                document.getElementById('profile-no-telp').textContent = 'No Telp: ' + data.user.no_telp;
                document.getElementById('profile-alamat').textContent = 'Alamat: ' + data.user.alamat;
            } else {
                // Menampilkan pesan jika data tidak ditemukan
                document.getElementById('profile-message').textContent = 'User data not available.';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('profile-message').textContent = 'Failed to load profile data.';
        });
    });
</script>

@endsection
