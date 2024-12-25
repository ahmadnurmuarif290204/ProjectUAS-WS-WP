<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Surah Al-Qur'an</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Daftar Surah Al-Qur'an</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Surah (Arab)</th>
                    <th>Nama Surah (Indonesia)</th>
                    <th>Jumlah Ayat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surahs as $index => $surah)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $surah->Nama_arab }}</td>
                        <td>{{ $surah->Nama_indonesia }}</td>
                        <td>{{ $surah->Jumlah_ayat }}</td>
                        <td>
                            <a href="{{ url('/surah/' . $surah->index) }}" class="btn btn-info">Lihat Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
