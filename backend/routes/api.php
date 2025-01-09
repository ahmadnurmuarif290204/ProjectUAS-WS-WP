<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\QuranController;


// untuk api surah
Route::get('/quran', [QuranController::class, 'quran']);
// untuk api ayat
Route::get('/details/{nomorSurah}', [QuranController::class, 'getDetailsBySurah']);
Route::get('/details', [QuranController::class, 'getAllDetail']);
Route::get('/details/{nomorSurah}/{nomorAyat}', [QuranController::class, 'getDetailAyat']);
Route::get('/import-details/{nomorSurah}', [QuranController::class, 'importDetailsBySurah']);
// untuk api tafsir nya 
Route::get('/tafsir/{nomorSurah}', [QuranController::class, 'getTafsirBySurah']);
Route::get('/tafsir', [QuranController::class, 'getAllTafsir']);
Route::get('/tafsir/{nomorSurah}/{nomorAyat}', [QuranController::class, 'getTafsirByAyat']);
Route::get('/import-tafsir/{nomorSurah}', [QuranController::class, 'importTafsirBySurah']);
