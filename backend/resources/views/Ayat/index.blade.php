<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayat dari Surah {{ $nomor }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f9;
            transition: background-color 0.5s ease, color 0.5s ease;
            overflow-x: hidden;
        }

        .light-mode {
            background-color: #f8f9fa;
            color: #212529;
        }

        .dark-mode {
            background: linear-gradient(45deg, #1d1d1d, #282828);
            color: #e0e0e0;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://www.transparenttextures.com/patterns/ligature.png') repeat;
            z-index: -1;
            animation: moveBackground 60s linear infinite;
        }

        @keyframes moveBackground {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 100% 100%;
            }
        }

        .mode-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            cursor: pointer;
            font-size: 30px;
            z-index: 1000;
            transition: transform 0.3s ease-in-out;
        }

        .mode-toggle:hover {
            transform: scale(1.2);
        }

        h1 {
            text-align: center;
            font-size: 3rem;
            color: #007bff;
            font-weight: 700;
            margin-top: 100px;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }

        .dark-mode h1 {
            color: #a8dadc;
        }


        .container {
            position: relative;
            padding: 50px 15px;
        }


        .card {
            background-color: #fff;
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            margin-bottom: 30px;
            transform: translateY(0);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            padding: 20px;
            background: linear-gradient(45deg, #007bff, #1c6fb2);
            color: white;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 600;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .dark-mode .card-header {
            background: linear-gradient(45deg, #3d4a9d, #5a67d8);
        }

        .card-body {
            padding: 20px;
            font-size: 1.2rem;
            background-color: #fff;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.05);
        }

        .dark-mode .card-body {
            background-color: #2a2a3b;
        }

        .card-body p {
            line-height: 1.8;
        }


        .show-tafsir {
            color: #007bff;
            font-weight: bold;
            cursor: pointer;
            font-size: 1.2rem;
            text-decoration: none;
        }

        .dark-mode .show-tafsir {
            color: #a8dadc;
        }


        .tafsir-content {
            display: none;
            padding: 20px;
            background-color: #f8f9fa;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .dark-mode .tafsir-content {
            background-color: #3c3c4b;
        }


        footer {
            text-align: center;
            padding: 40px;
            background-color: #f4f4f4;
            color: #6c757d;
            margin-top: 50px;
            font-size: 0.9rem;
        }

        .dark-mode footer {
            background-color: #2a2a3b;
            color: #a8dadc;
        }


        .back-to-surah {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            font-size: 1.1rem;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 30px;
            transition: transform 0.3s ease-in-out;
        }

        .back-to-surah:hover {
            transform: scale(1.1);
            background-color: #1c6fb2;
        }

        .back-to-surah:active {
            transform: scale(0.95);
        }


        .fade-in {
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
</head>

<body class="light-mode">
    <div class="background"></div>
    <div class="container">
        <!-- Navigation Back to Surah -->
        <a href="{{ route('surah.index') }}" class="back-to-surah">
            <i class="bi bi-arrow-left-circle"></i> Kembali ke Daftar Surah
        </a>

        <button class="mode-toggle" id="modeToggle">
            <i class="bi bi-sun"></i>
        </button>
        <h1>Ayat dari Surah {{ $nomor }}</h1>

        @foreach($ayat as $item)
        <div class="card fade-in">
            <div class="card-header">
                Ayat {{ $item->nomorAyat }}
            </div>
            <div class="card-body">
                <p style="font-size: 2.5rem; text-align: right; font-weight: bold; direction: rtl;">{{ $item->teksArab }}</p>
                <p><strong>Latin:</strong> <em>{{ $item->teksLatin }}</em></p>
                <p><strong>Terjemahan:</strong> {{ $item->teksIndonesia }}</p>
                <a class="show-tafsir" data-ayat="{{ $item->nomorAyat }}">Tampilkan Tafsir</a>
                <div class="tafsir-content" id="tafsir-{{ $item->nomorAyat }}">
                    @foreach($tafsir as $tf)
                    @if($tf->nomorAyat == $item->nomorAyat)
                    <p>{{ $tf->teksTafsir }}</p>
                    @endif
                    @endforeach
                </div>
                <div>
                    @if(!empty($item->audio_url))
                    <audio controls class="audio">
                        <source src="{{ $item->audio_url }}" type="audio/mpeg">
                        Browser Anda tidak mendukung elemen audio.
                    </audio>
                    @else
                    <p>Audio tidak tersedia</p>
                    @endif
                </div>

            </div>
        </div>
        @endforeach
    </div>

    <footer>
        <p>&copy; 2024 Sinar Al-Qur'an. Made In Muslim People.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const audioElements = document.querySelectorAll('.audio');

            if (audioElements.length > 0) {
                
                audioElements[0].play();

                
                audioElements.forEach((audio, index) => {
                    audio.addEventListener('ended', () => {
                        const nextAudio = audioElements[index + 1];
                        if (nextAudio) {
                            nextAudio.play(); 
                        }
                    });
                });
            }
        });
        const modeToggle = document.getElementById('modeToggle');
        const body = document.body;

        modeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            body.classList.toggle('light-mode');
            const icon = modeToggle.querySelector('i');
            if (body.classList.contains('dark-mode')) {
                icon.classList.replace('bi-sun', 'bi-moon');
            } else {
                icon.classList.replace('bi-moon', 'bi-sun');
            }
        });

        const tafsirLinks = document.querySelectorAll('.show-tafsir');
        tafsirLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                const ayat = link.dataset.ayat;
                const tafsirContent = document.getElementById(`tafsir-${ayat}`);
                tafsirContent.style.display = tafsirContent.style.display === 'none' || !tafsirContent.style.display ? 'block' : 'none';
            });
        });
    </script>
</body>

</html>