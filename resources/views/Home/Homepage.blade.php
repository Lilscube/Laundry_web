<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laundry Licius</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #f0f4f8, #00395d);
            color: #333;
        }

        .navbar {
            background: linear-gradient(90deg, #00395d, #0077b6);
            padding: 10px;
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        #video-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            object-fit: cover;
            z-index: -1; 
        }

        .video-overlay {
            position: relative;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .video-overlay h1 {
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.7);
        }

        .services {
            padding: 150px 0;
            background: linear-gradient(120deg, #0077b6, #00b4d8);
            color: white;
            text-align: center;
        }

        .services h2 {
            font-size: 2rem;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .service-box {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .service-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .service-box img {
            width: 250px;
            height: 200px;
            margin-bottom: 20px;
        }

        .service-box h6 {
            margin-top: 15px;
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
        }

        .contact-map {
            padding: 100px 0;
            background: linear-gradient(90deg, #00b4d8, #48cae4);
            color: white;
            text-align: center;
        }

        .contact-map iframe {
            border: 0;
            width: 100%;
            height: 350px;
            border-radius: 10px;
        }

        .info-section {
            text-align: center;
            padding: 40px 20px;
            background-color: #fff;
        }

        .info-section h3 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            color: #0077b6;
        }

        .info-section h6 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            color: #000000;
        }

        .footer {
            background: linear-gradient(90deg, #0077b6, #00395d);
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer p {
            margin: 10px 0;
        }

        .footer-social {
            margin-top: 10px;
        }

        .footer-social a {
            margin: 0 5px;
        }

        .footer-social a img {
            width: 24px;
            height: 24px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="rounded-circle me-2" style="width: 100px; height: 50px;">
                Laundry Licius
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="MainLogin">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>    

    <div class="video-overlay">
        <video id="video-bg" autoplay loop muted>
            <source src="/vid/laundry_vid.mp4" type="video/mp4">
        </video>
        <h1>Laundry HEMAT CEPAT DAN MURAH</h1>
    </div>

    <section class="services">
        <h2>Kami, Hadir disini untuk kalian</h2>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 mb-4">
                    <div class="service-box">
                        <img src="{{ asset('img/j8.jpeg') }}" alt="Layanan Regular" class="layanan-gambar img-fluid rounded mb-2">
                        <h6>Reguler</h6>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="service-box">
                        <img src="{{ asset('img/j7.jpeg') }}" alt="Layanan Express" class="layanan-gambar img-fluid rounded mb-2">
                        <h6>Express</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-map">
        <h2>Laundry Licius</h2>
        <p>Jl. Bantul No 134, Kec. Depok, Kabupaten Sleman, Kota Yogyakarta</p>

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.5636165144967!2d110.36603187555186!3d-7.825267979894874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a577e2c8a1f6f%3A0x4fbfef389bc2cb95!2sLaundry%20Hub!5e0!3m2!1sen!2sid!4v1636790595749!5m2!1sen!2sid"
            allowfullscreen="" loading="lazy"></iframe>
    </section>

    <section class="info-section">
        <h3>Informasi Layanan</h3>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h6>Laundry Express</h6>
                    <p>
                        Laundry Express adalah layanan cuci pakaian yang menawarkan proses pencucian dan pengeringan yang cepat dengan jangka waktu yang lebih singkat dibandingkan dengan layanan laundry biasa. Biasanya, layanan ini tersedia dalam beberapa jam hingga maksimal satu hari.
                    </p>
                </div>
                <div class="col-md-6">
                    <h6>Laundry Reguler</h6>
                    <p>
                        Laundry Reguler adalah layanan cuci pakaian yang menawarkan proses pencucian, pengeringan, dan penyetrikaan dengan waktu penyelesaian yang lebih lama dibandingkan layanan laundry express. Biasanya, proses laundry reguler memakan waktu antara 1 hingga 3 hari, tergantung pada jumlah pakaian yang dicuci dan volume pekerjaan laundry tersebut.
                    </p>
                </div>
            </div>
            <p>Apapun pilihan Anda, kepuasan Anda adalah prioritas kami.</p>
        </div>
    </section>
     

    <footer class="footer">
        <p>© 2024 Laundry Licius | <a href="mailto:liciuslaundry@gmail.com">Licius@Gmail.com</a> | 082708913002</p>
        <div class="footer-social">
            <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/facebook.png" alt="Facebook"></a>
            <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/instagram-new.png" alt="Instagram"></a>
            <a href="#"><img src="https://img.icons8.com/ios-filled/50/ffffff/whatsapp.png" alt="WhatsApp"></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
