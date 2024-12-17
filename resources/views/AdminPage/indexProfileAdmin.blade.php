@extends('AdminPage.DashboardAdmin')

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
                <div class="card-body">
                    <img src="{{ asset('img/admin.jpg') }}" class="profile-img mx-auto d-block" alt="User Image">
                    <h5 class="card-text" style="margin-top: 20px; margin-bottom:20px;">Admin</h5> 
                    <p class="card-text">Semangat Bekerja</p>
                    

                    <!-- <div class="social-icons">
                        <a href="https://facebook.com"><i class="fab fa-facebook"></i></a>
                        <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                        <a href="https://linkedin.com"><i class="fab fa-linkedin"></i></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

@endsection
