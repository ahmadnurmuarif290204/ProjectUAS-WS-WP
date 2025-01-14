<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuranController;


// Untuk mengambil API surah
Route::get('/quran', [QuranController::class, 'quran']);

// Untuk mengambil API detail ayat
Route::get('/details', [QuranController::class, 'getAllDetails']);
Route::get('/details/{nomorSurah}', [QuranController::class, 'getDetailsBySurah']);
Route::get('/details/{nomorSurah}/{nomorAyat}', [QuranController::class, 'getDetailAyat']);
Route::get('/import-details', [QuranController::class, 'importDetails']);

// Untuk mengambil API tafsir
Route::get('/tafsir', [QuranController::class, 'getAllTafsir']);
Route::get('/tafsir/{nomorSurah}', [QuranController::class, 'getTafsirsBySurah']);
Route::get('/tafsir/{nomorSurah}/{nomorAyat}', [QuranController::class, 'getTafsirByAyat']);
Route::get('/import-tafsir', [QuranController::class, 'importTafsir']);
