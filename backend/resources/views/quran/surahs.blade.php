<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Surah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Daftar Surah</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Surah</th>
                    <th>Jumlah Ayat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surahs as $index => $surah)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $surah->Nama_indonesia }}</td>
                        <td>{{ $surah->Jumlah_ayat }}</td>
                        <td><a href="{{ url('/surah/' . $surah->index . '/ayahs') }}" class="btn btn-info">Lihat Ayat</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
