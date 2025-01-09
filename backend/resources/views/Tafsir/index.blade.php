<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tafsir dari Surah {{ $nomor }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Tafsir dari Surah {{ $nomor }}</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nomor Ayat</th>
                    <th>Teks Tafsir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tafsir as $item)
                <tr>
                    <td>{{ $item->nomorAyat }}</td>
                    <td>{{ $item->teksTafsir }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tafsir dari Surah {{ $nomor }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Tafsir dari Surah {{ $nomor }}</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nomor Ayat</th>
                    <th>Teks Tafsir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tafsir as $item)
                <tr>
                    <td>{{ $item->nomorAyat }}</td>
                    <td>{{ $item->teksTafsir }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>