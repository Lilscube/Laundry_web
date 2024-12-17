<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Selection</title>

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
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            padding: 20px 30px;
            border-radius: 15px;
            width: auto;
            display: inline-block;
        }

        .login-title {
            font-size: 2rem;
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }

        .login-options {
            display: flex;
            justify-content: center;
            gap: 15px; 
        }

        .login-options a {
            text-decoration: none;
            color: #fff;
        }

        .login-option-btn {
            width: 120px; 
            height: 120px; 
            background-color: hsla(210, 30%, 50%, 0.8); 
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s;
        }

        .login-option-btn:hover {
            background-color: hsla(210, 30%, 60%, 0.8); 
        }

        .login-option-btn img {
            width: 50px; 
            height: 50px;
            margin-bottom: 10px;
        }

        .login-option-btn span {
            color: #fff;
            font-weight: 600;
        }
    </style>

    <video id="video-bg" autoplay loop muted>
        <source src="/vid/laundry_vid.mp4" type="video/mp4">
    </video>

    <section>
        <div class="container px-4 py-5 text-center" style="margin-top:-100px; margin-bottom:-10px;">
            <div class="my-5 display-5 fw-bold ls-tight" style="color: hsl(0, 0%, 100%)">
                LOGIN AS?
            </div>

            <div class="bg-glass">
                <div class="login-options">
                    <a href="{{ url('/UserLogin') }}">
                        <div class="login-option-btn">
                            <img src="https://img.icons8.com/ios-glyphs/90/user.png" alt="User Icon">
                            <span>User</span>
                        </div>
                    </a>
                    <a href="{{ url('/AdminLogin') }}">
                        <div class="login-option-btn">
                            <img src="https://img.icons8.com/ios-glyphs/90/admin-settings-male.png" alt="Admin Icon">
                            <span>Admin</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
