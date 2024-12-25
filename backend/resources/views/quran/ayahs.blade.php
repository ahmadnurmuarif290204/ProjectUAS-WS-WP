<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayat-ayat Surah {{ $surah->Nama_indonesia }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Ayat-ayat Surah {{ $surah->Nama_indonesia }}</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Ayat</th>
                    <th>Teks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ayahs as $index => $ayah)
                    <tr>
                        <td>{{ $ayah->aya }}</td>
                        <td>{{ $ayah->text }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ url('/surahs') }}" class="btn btn-primary mt-3">Kembali ke Daftar Surah</a>
    </div>
</body>
</html>
