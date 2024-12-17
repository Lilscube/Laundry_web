<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="antialiased">
    <style>
        body {
            font-family: 'Figtree', Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }
        section {
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 1;
        }

        #video-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; 
        }

        .bg-glass {
            background-color: hsla(210, 30%, 50%, 0.8) !important;
            backdrop-filter: saturate(150%) blur(30px);
        }

        .toast-container {
            position: fixed;
            top: 1rem;
            right: 1rem;
            z-index: 1060;
        }

        .toast {
            background-color: #ff4d4d; 
            color: white;
        }

        .toast-header {
            background-color: #dc3545;
            color: white;
        }

        .toast .btn-close {
            filter: invert(1);
        }
    </style>

    <video id="video-bg" autoplay loop muted>
        <source src="/vid/laundry_vid.mp4" type="video/mp4">
    </video>

    <section>
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(222, 100%, 50%)">
                        LAUNDRY LICIUS<br />
                        <span style="color: hsl(207, 91%, 95%)">USER LOGIN</span>
                    </h1>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form id="loginForm">
                                <div>
                                    <h4 class="mb-3 text-center">USER LOGIN</h4>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                                    <label for="username">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Login</button>
                                
                                <div class="text-center mt-3">
                                    <p class="mb-0">Belum punya akun? <a href="{{ url('/RegistrasiUser') }}">Registrasi akun</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="toast-container">
            <div id="loginToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                <div class="toast-header">
                    <strong class="me-auto">Username atau Password salah!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <script>
            document.getElementById('loginForm').addEventListener('submit', function(event) {
                event.preventDefault();

                const username = document.getElementById('username').value;
                const password = document.getElementById('password').value;

                // Kirim data ke API login
                fetch('http://127.0.0.1:8000/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + localStorage.getItem('auth_token'),
                    },
                    body: JSON.stringify({
                        username: username, // Ganti 'username' jika inputan username Anda adalah email
                        password: password
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    console.log("Server Response:", data);

                    if (data.message === "Login successful.") {
                        alert("Login berhasil!");

                        // Simpan token ke localStorage
                        localStorage.setItem('auth_token', data.token);

                        // Redirect ke halaman UserPage/tentangKami
                        window.location.href = "{{ url('/UserPage/tentangKami') }}";
                    } else {
                        // Tampilkan toast jika login gagal
                        const toast = new bootstrap.Toast(document.getElementById('loginToast'));
                        toast.show();
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    const toast = new bootstrap.Toast(document.getElementById('loginToast'));
                    toast.show();
                });
            });
         </script>
    </body>
</html>
