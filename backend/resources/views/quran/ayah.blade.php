<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayat {{ $ayah->aya }} - Surah {{ $ayah->sura }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Ayat {{ $ayah->aya }} - Surah {{ $ayah->sura }}</h1>
        <div class="card">
            <div class="card-header">
                <h3>Surah {{ $ayah->sura }} - Ayat {{ $ayah->aya }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Teks:</strong> {{ $ayah->text }}</p>
            </div>
        </div>
        <a href="{{ url('/surah/' . $ayah->sura) }}" class="btn btn-primary mt-3">Kembali ke Surah</a>
    </div>
</body>
</html>
