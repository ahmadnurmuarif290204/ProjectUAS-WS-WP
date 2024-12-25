<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Surah - {{ $surah->Nama_indonesia }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Detail Surah</h1>
        <div class="card">
            <div class="card-header">
                <h3>Surah {{ $surah->Nama_arab }} ({{ $surah->Nama_indonesia }})</h3>
            </div>
            <div class="card-body">
                <p><strong>Nama (English):</strong> {{ $surah->Nama_english }}</p>
                <p><strong>Ayat Pertama:</strong> {{ $surah->Ayat_pertama }}</p>
                <p><strong>Jumlah Ayat:</strong> {{ $surah->Jumlah_ayat }}</p>
                <p><strong>Tipe Surah:</strong> {{ $surah->Tipe }}</p>
                <p><strong>Urutan:</strong> {{ $surah->Urutan }}</p>
                <p><strong>Jumlah Rukus:</strong> {{ $surah->Jumlah_rukus }}</p>
            </div>
        </div>
        <a href="{{ url('/surahs') }}" class="btn btn-primary mt-3">Kembali ke Daftar Surah</a>
    </div>
</body>
</html>
