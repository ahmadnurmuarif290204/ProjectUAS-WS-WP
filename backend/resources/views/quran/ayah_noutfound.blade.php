<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayat Tidak Ditemukan</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Ayat {{ $aya }} pada Surah {{ $sura }} Tidak Ditemukan</h1>
        <p>Mohon periksa kembali nomor surah dan ayat yang dimasukkan.</p>
        <a href="{{ url('/surahs') }}" class="btn btn-primary">Kembali</a>
    </div>
</body>

</html>