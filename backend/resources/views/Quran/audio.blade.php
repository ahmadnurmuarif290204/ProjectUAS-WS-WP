<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AudioFull Surah: {{ $surah->namaLatin }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f8fa;
            color: #212529;
        }

        .container {
            padding-top: 80px;
            max-width: 800px;
            margin: auto;
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: bold;
            color: #6c63ff;
        }

        p {
            text-align: center;
            font-size: 1.1rem;
            margin-bottom: 40px;
            color: #495057;
        }

        .list-group {
            margin-top: 40px;
        }

        .list-group-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .list-group-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .list-group-item audio {
            width: 100%;
            border-radius: 10px;
        }

        .back-to-surah {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c63ff;
            color: white;
            font-size: 1.1rem;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 30px;
            transition: background-color 0.3s ease;
        }

        .back-to-surah:hover {
            background-color: #5a54d8;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #f7f8fa;
            color: #6c757d;
            font-size: 0.9rem;
            margin-top: 40px;
        }


        .dark-mode {
            background-color: #2a2a3b;
            color: #e0e0e0;
        }

        .dark-mode h1 {
            color: #9aa5eb;
        }

        .dark-mode .list-group-item {
            background-color: #3c3c4b;
            border-color: #444;
        }

        .dark-mode .list-group-item:hover {
            background-color: #4a4b60;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .dark-mode .back-to-surah {
            background-color: #5a54d8;
        }

        .dark-mode footer {
            background-color: #2a2a3b;
            color: #9aa5eb;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="{{ route('surah.index') }}" class="back-to-surah">
            <i class="bi bi-arrow-left-circle"></i> Kembali ke Daftar Surah
        </a>
        <h1>Audio Surah: {{ $surah->namaLatin }}</h1>
        <p>{{ $surah->arti }}</p>

        @if(!empty($audioUrls))
        <div class="list-group">
            @foreach($audioUrls as $key => $url)
            <div class="list-group-item">
                <h5 class="text-center">Qari {{ $key }}</h5>
                <audio controls>
                    <source src="{{ $url }}" type="audio/mpeg">
                    Browser Anda tidak mendukung elemen audio.
                </audio>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center text-danger">Audio tidak tersedia untuk surah ini.</p>
        @endif
    </div>

    <footer>
        <p>&copy; 2024 Sinar Al-Qur'an. Made In Muslim People.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>