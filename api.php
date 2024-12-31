<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\QuranController;


// buat api

Route::get('/qurans', [QuranController::class, 'index']);
Route::get('/qurans/{id}', [QuranController::class, 'show']);
Route::get('/qurans/surah/{nomorSurah}', [QuranController::class, 'getBySurahNumber']);


Route::get('/qurans/details/{nomorSurah}', [QuranController::class, 'getDetailsBySurah']);
Route::get('/qurans/details/{nomorSurah}/{nomorAyat}', [QuranController::class, 'getDetailAyat']);

Route::get('/qurans/tafsir/{nomorSurah}', [QuranController::class, 'getTafsirBySurah']);
Route::get('/qurans/tafsir/{nomorSurah}/{nomorAyat}', [QuranController::class, 'getTafsirAyat']);
