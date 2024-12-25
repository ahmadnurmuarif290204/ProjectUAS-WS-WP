<?php

namespace App\Http\Controllers;

use App\Models\Surah;

class QuranController extends Controller
{
    // Menampilkan daftar semua surah
    public function showAllSurahs()
    {
        // Ambil semua data surah dari database
        $surahs = Surah::all();

        // Periksa apakah data surah ditemukan
        if ($surahs->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'Data surah tidak ditemukan.'
            ]);
        }

        // Tampilkan daftar surah ke view
        return view('quran.surahs', compact('surahs'));
    }
}
