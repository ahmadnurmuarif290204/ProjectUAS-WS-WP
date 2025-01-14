<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Surah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, rgba(44, 130, 201, 0.4), rgba(44, 130, 201, 0.8)), url('https://images.unsplash.com/photo-1507395921814-19474273d849?crop=entropy&cs=tinysrgb&fit=max&ixid=MXwyMDg2MnwwfDF8c2VhcmNofDgxfHxsaXdoaXJlJTIwZGVzaWdufGVufDB8fHx8fDE2NzA4Mzc5MjM&ixlib=rb-1.2.1&q=80&w=1080');
            background-size: cover;
            background-position: center;
            color: #ecf0f1;
            margin: 0;
            padding: 0;
            height: 100vh;
            transition: background-color 0.3s ease;
        }

        h1 {
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 40px;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
            transition: font-size 0.3s ease;
        }

        .card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .card:hover {
            transform: translateY(-12px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #1f6fa6;
            color: white;
            font-size: 1.6rem;
            font-weight: 600;
            padding: 18px;
            text-align: center;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .card-body {
            background-color: #ffffff;
            padding: 25px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            color: #333;
        }

        .btn-info {
            background-color: #1f6fa6;
            color: white;
            font-size: 1.1rem;
            padding: 12px 30px;
            border-radius: 25px;
            border: none;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-info:hover {
            background-color: #14618b;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
        }

        .footer {
            background-color: #34495e;
            color: white;
            padding: 25px;
            text-align: center;
            margin-top: 50px;
            border-radius: 20px 20px 0 0;
        }

        .footer a {
            color: #ffdd59;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        body.dark-mode {
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        .dark-mode .card-header {
            background-color: #1abc9c;
        }

        .dark-mode .card-body {
            background-color: #34495e;
            color: #ecf0f1;
        }

        .dark-mode .footer {
            background-color: #2c3e50;
        }

        .dark-mode .btn-info {
            background-color: #1abc9c;
        }

        .mode-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #fff;
            border: none;
            padding: 15px;
            font-size: 1.6rem;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .mode-toggle:hover {
            background-color: #e0e0e0;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #1f6fa6;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .back-btn:hover {
            transform: translateY(-5px);
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.4rem;
            }

            .btn-info {
                font-size: 1rem;
                padding: 10px 25px;
            }

            .footer {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <a href="{{ url('/') }}" class="back-btn">
        <i class="bi bi-arrow-left-circle"></i> Kembali
    </a>

    <button id="modeToggle" class="mode-toggle">
        <i class="bi bi-sun-fill"></i>
    </button>

    <div class="container">
        <h1>Daftar Surah Al-Qur'an</h1>
        <div class="row">
            @foreach($surah as $item)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        Surah {{ $item->nomorSurah }}: {{ $item->namaSurah }}
                    </div>
                    <div class="card-body">
                        <p><strong>Jumlah Ayat:</strong> {{ $item->jumlahAyat }}</p>
                        <p><strong>Tempat Turun:</strong> {{ $item->tempatTurun }}</p>
                        <a href="{{ route('surah.ayat', ['nomor' => $item->nomorSurah]) }}" class="btn btn-info">
                            <i class="bi bi-book"></i> Lihat Ayat
                        </a>
                        <a href="{{ route('surah.audio', ['nomor' => $item->nomorSurah]) }}" class="btn btn-info mt-2">
                            <i class="bi bi-headphones"></i> Dengarkan AudioFull
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="footer">
            <p>&copy; 2024 Sinar Al-Qur'an. Made In Muslim People.</p>
        </div>
    </div>

    <script>
        const modeToggle = document.getElementById("modeToggle");
        const body = document.body;

        modeToggle.addEventListener("click", () => {
            body.classList.toggle("dark-mode");

            if (body.classList.contains("dark-mode")) {
                modeToggle.innerHTML = '<i class="bi bi-moon-fill"></i>';
            } else {
                modeToggle.innerHTML = '<i class="bi bi-sun-fill"></i>';
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>