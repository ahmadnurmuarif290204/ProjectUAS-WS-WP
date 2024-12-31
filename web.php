<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\QuranController;



Route::get('/', function () {
    return view('welcome');
});



Route::get('/', function () {
    return view('alquran');
});

Route::get('/surah', [QuranController::class, 'quran'])->name('surah.index');
Route::get('/surah/{nomor}', [QuranController::class, 'ayat'])->name('surah.ayat');
Route::get('/tafsir/{nomor}', [QuranController::class, 'tafsir'])->name('surah.tafsir');


Route::get('/surah', [QuranController::class, 'quran'])->name('surah.index');
Route::get('/surah/{nomor}', [QuranController::class, 'ayat'])->name('surah.ayat');
Route::get('/surah/audio/{nomor}', [QuranController::class, 'audioSurah'])->name('surah.audio');




