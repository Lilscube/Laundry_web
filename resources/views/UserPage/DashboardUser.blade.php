<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS_C_11_Laundry</title>

    <style>
        body {
            font-family: 'Figtree', Helvetica, Arial, sans-serif;
            background: linear-gradient(90deg, #0077b6, #00395d);
            color: black;
        }

        .main-sidebar {
            background: linear-gradient(90deg, #0077b6, #00395d);
        }

        .main-header {
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .nav-sidebar .nav-item .nav-link {
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .nav-sidebar .nav-item .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .modal-content {
            border-radius: 10px;
        }

        .modal-header {
            background-color: #0066cc; 
            color: white;
        }

        .btn-close {
            background-color: white;
        }

        .main-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            padding: 10px;
            text-align: center;
            color: #343a40;
        }

        .logout-button {
            background-color: #d9534f;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-flex;
            align-items: center;
            font-size: 16px;
            text-decoration: none;
            justify-content: center;
            width: 100%;
        }

        .logout-button:hover {
            background-color: #c9302c;
            color: white;
        }

        .logout-button i {
            margin-right: 5px;
        }

        .logout-container {
            position: absolute;
            bottom: 0;
            width: 100%; 
            text-align: center; 
            padding: 20px; 
            box-sizing: border-box; 
        }

        .sidebar {
            position: center;
            min-height: 100vh;
        }

        .sidebar .user-panel .image img {
            width: 80px;
            height: 80px; 
            border-radius: 50%; 
            object-fit: cover; 
            border: 2px solid #000000; 
        }

        .user-panel {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .user-panel .image {
            margin-bottom: 10px; 
        }

        .user-panel .info {
            margin-top: 5px; 
        }

        .content-wrapper {
            padding: 20px;
        }
    </style>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="logout-button" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ url('UserPage/tentangKami') }}" class="brand-link">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Laundry Licius</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img/j2.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info text-center">
                        <a href="{{ url('UserPage/indexProfileUser') }}" class="nav-link" style="color:white">
                            User
                        </a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ url('UserPage/tentangKami') }}" class="nav-link">
                                <i class="nav-icon fas fa-info-circle"></i>
                                <p>Tentang Kami</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('UserPage/layanan') }}" class="nav-link">
                                <i class="nav-icon fas fa-tshirt"></i>
                                <p>Layanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('UserPage/tampilRiwayat') }}" class="nav-link">
                                <i class="nav-icon fas fa-history"></i>
                                <p>Riwayat Transaksi</p>
                            </a>
                        </li>
                    </ul>                                
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Laundry Licius
            </div>
            <strong>Copyright &copy; {{ date('Y') }} <a href="{{ url('UserPage/tentangKami') }}" style="color: #0066cc;">Laundry Licius</a>.</strong> All rights reserved.
        </footer>
    </div>

    <div class="modal fade" id="logoutModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Apakah ingin Logout?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="confirmLogout">Logout</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>

    <script>
        var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'), {
            backdrop: 'static',
            keyboard: false
        });

        document.querySelector('.logout-button').addEventListener('click', function (e) {
            e.preventDefault();
            logoutModal.show();
        });

        document.querySelector('.btn-secondary').addEventListener('click', function () {
            logoutModal.hide();
        });

        document.getElementById('confirmLogout').addEventListener('click', function () {
            sessionStorage.removeItem('loggedIn');
            window.location.href = "{{ url('/') }}"; 
        });
    </script>

</body>
</html>