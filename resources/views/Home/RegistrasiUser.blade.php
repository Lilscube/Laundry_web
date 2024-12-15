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
                <form id="registrationForm">
                    <h1 class="my-2 display-5 fw-bold">REGISTRATION</h1>
                    <span style="color: rgba(0, 0, 0, 0.8)">*USER</span>
                    <div class="form-floating mb-3">
                        <input type="text" id="name" class="form-control" placeholder="Name" required>
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" id="email" class="form-control" placeholder="Email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" id="address" class="form-control" placeholder="Address" required>
                        <label for="address">Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" id="username" class="form-control" placeholder="Username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" id="password" class="form-control" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const address = document.getElementById('address').value;
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            localStorage.setItem('userData', JSON.stringify({ name, email, address, username, password }));

            window.location.href = "{{ url('/user_login') }}"; 
        });
    </script>
</body>
</html>
