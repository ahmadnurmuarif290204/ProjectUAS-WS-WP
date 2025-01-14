<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Aplikasi Sinar Al-Qur'an</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&family=Quicksand:wght@300;500&display=swap" rel="stylesheet">
    <style>
        body,
        h1,
        h2,
        h3,
        p {
            font-family: 'Lora', serif;
        }

        .navbar {
            background-color: #1d3557;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .navbar .navbar-brand {
            color: #fff;
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .navbar .navbar-brand:hover {
            color: #f1faee;
        }

        .navbar-nav .nav-item .nav-link {
            color: #fff;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #f1faee;
            text-decoration: underline;
        }

        .navbar-toggler-icon {
            background-color: #fff;
        }

        .hero {
            background: linear-gradient(135deg, #1d3557, #457b9d);
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            padding: 0 20px;
            overflow: hidden;
            transition: all 0.5s ease-in-out;
        }

        .hero-content {
            z-index: 2;
            position: relative;
            text-shadow: 3px 3px 15px rgba(0, 0, 0, 0.6);
            animation: fadeIn 1.5s ease-out;
        }

        h1 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 5px;
        }

        p {
            font-size: 1.3rem;
            font-weight: 400;
            margin-bottom: 35px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-primary {
            background-color: #f1faee;
            border: none;
            padding: 20px 40px;
            font-size: 1.5rem;
            color: #1d3557;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #a8dadc;
            color: #1a1a1a;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .btn-primary:focus {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(200, 200, 200, 0.5);
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .footer {
            background-color: #1d3557;
            color: #fff;
            text-align: center;
            padding: 30px;
            font-size: 1.1rem;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.2);
        }

        .footer a {
            color: #f1faee;
            text-decoration: none;
            font-weight: 600;
        }

        .footer a:hover {
            color: #ffcc00;
        }

        .footer i {
            margin-right: 10px;
        }

        .footer .social-links {
            margin-top: 15px;
        }

        .footer .social-links i {
            font-size: 1.5rem;
            margin: 0 10px;
            transition: transform 0.3s ease;
        }

        .footer .social-links i:hover {
            transform: scale(1.2);
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 3.5rem;
            }

            .hero p {
                font-size: 1.1rem;
                margin-bottom: 25px;
            }

            .btn-primary {
                font-size: 1.3rem;
                padding: 15px 30px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Sinar Al-Qur'an</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            </div>
        </div>
    </nav>

    <div class="hero">
        <div class="hero-content">
            <h1>Selamat Datang di Sinar Al-Qur'an</h1>
            <p>Temukan Kedamaian, Pahami Wahyu-Nya, dan Tingkatkan Iman Anda Setiap Hari. Mari menjelajahi ayat-ayat yang menginspirasi untuk pencerahan dan kedamaian dalam hidup Anda.</p>
            <a href="{{ route('surah.index') }}" class="btn btn-primary">Jelajahi Daftar Surah</a>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 Sinar Al-Qur'an. Made in By Muslim People.</p>
        <p><a href="#">Kebijakan Privasi</a> | <a href="#">Syarat dan Ketentuan</a></p>
        <div class="social-links">
            <a href="#" class="text-white"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>