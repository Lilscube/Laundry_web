<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

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

        #video-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; 
        }

        section {
            display: flex;
            flex-direction: column;
            align-items: center; 
            justify-content: center; 
            height: 100vh; 
            position: relative;
            z-index: 1;
        }

        .bg-glass {
            background-color: hsla(210, 30%, 50%, 0.8) !important;
            backdrop-filter: saturate(150%) blur(30px);
            padding: 40px; 
            border-radius: 8px; 
            width: 90%;
            max-width: 500px; 
            margin-top: 10px; 
        }

        .form-control {
            height: 50px; 
            font-size: 16px; 
        }

        h1 {
            color: hsl(207, 91%, 95%); 
        }

        .form-floating {
            width: 100%; 
            margin: 0 auto; 
        }

        button {
            height: 50px;
            font-size: 16px;
        }
    </style>

    <video id="video-bg" autoplay loop muted>
        <source src="/vid/laundry_vid.mp4" type="video/mp4">
    </video>

    <section>
        <div class="card bg-glass">
            <div class="card-body px-3 py-4">
            <form id="registerForm">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Name" required>
                    <label for="nama">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="no_telp" name="no_telp" class="form-control" placeholder="Phone" required>
                    <label for="no_telp">No Telepon</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Address" required>
                    <label for="alamat">Alamat</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>

            <script>
                document.getElementById('registerForm').addEventListener('submit', function (e) {
                    e.preventDefault();

                    const formData = {
                        nama: document.getElementById('nama').value,
                        email: document.getElementById('email').value,
                        no_telp: document.getElementById('no_telp').value,
                        alamat: document.getElementById('alamat').value,
                        username: document.getElementById('username').value,
                        password: document.getElementById('password').value,
                    };

                    fetch('http://127.0.0.1:8000/api/register', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify(formData),
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })

                    .then(data => {

                        console.log("Server Response:", data);

                        if (data.message === "User registered successfully.") {
                            alert("Registrasi berhasil!");
                            window.location.href = "/UserLogin"; // Redirect ke UserLogin
                        } else {
                            alert("Registrasi gagal: " + JSON.stringify(data.errors));
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert("Terjadi kesalahan jaringan atau server.");
                    });
                });
                </script>

                <!-- @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif -->

            </div>
        </div>
    </section> 
</body>
</html>
