<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;



Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\QuranController;

Route::get('/surah', [QuranController::class, 'ambilSemuaSurah']);
Route::get('/surah/{id}', [QuranController::class, 'ambilSurahBerdasarkanId']);
Route::get('/cari-surah', [QuranController::class, 'cariSurah']);

// Ayat
Route::get('/ayat/surah/{sura}', [QuranController::class, 'ambilAyatBerdasarkanSurah']);
Route::get('/ayat/surah/{sura}/ayat/{ayah}', [QuranController::class, 'ambilAyat']);
Route::get('/cari-ayat', [QuranController::class, 'cariAyat']);
// terjemah


// Rute untuk terjemahan


Route::get('/terjemahan/surah/{sura}', [QuranController::class, 'ambilTerjemahanSurah']);
Route::get('/terjemahan/surah/{sura}/ayat/{ayah}', [QuranController::class, 'ambilTerjemahanAyat']);

