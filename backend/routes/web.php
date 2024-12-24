<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\QuranController;



Route::get('/', function () {
    return view('welcome');
});





Route::get('/surahs', [QuranController::class, 'showAllSurahs']);
Route::get('/surah/{sura}/ayahs', [QuranController::class, 'showAyahsBySurah']);
Route::get('/surah/{sura}/ayah/{aya}', [QuranController::class, 'showAyah']);
