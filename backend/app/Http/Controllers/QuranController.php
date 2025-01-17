<?php

namespace App\Http\Controllers;

use App\Models\Quran;
use App\Models\Detail;
use App\Models\Tafsir;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuranController extends Controller
{
    public function quran()
    {
        $response = Http::get('https://equran.id/api/v2/surat');

        if ($response->successful()) {
            // Data Surat berhasil diambil, sekarang simpen ke database
            $data = $response->json()['data'];

            foreach ($data as $item) {
                Quran::updateOrCreate(
                    ['nomorSurah' => $item['nomor']],
                    [
                        'namaSurah' => $item['nama'],
                        'namaLatin' => $item['namaLatin'],
                        'jumlahAyat' => $item['jumlahAyat'],
                        'tempatTurun' => $item['tempatTurun'],
                        'arti' => $item['arti'],
                        'deskripsi' => $item['deskripsi'],
                        'audio_full' => json_encode($item['audioFull']),
                    ]
                );
            }
            $surah = Quran::all();

            return response()->json([
                'kode' => 200,
                'pesan' => 'Data surah berhasil diambil yaa  ',
                'data' => Quran::all(),
            ]);
        }

        
        return response()->json([
            'kode' => 500,
            'pesan' => 'Kamu gagal ambil data Surah nih !!',
        ], 500);
    }    
    public function getAllDetail()
    {
        return response()->json([
            'kode' => 200,
            'pesan' => 'Kamu berhasil ambil semua data detail ayat',
            'data' => Detail::all(),
        ]);
    }

    public function getDetailsBySurah($nomorSurah)
    {
        $details = Detail::where('nomorSurah', $nomorSurah)->get();

        if ($details->isEmpty()) {
            return response()->json([
                'kode' => 404,
                'pesan' => 'Detail engga ada nih di Surah ini',
            ], 404);
        }

        return response()->json([
            'kode' => 200,
            'pesan' => 'Detail berhasil diambil',
            'data' => $details,
        ]);
    }

    public function getDetailAyat($nomorSurah, $nomorAyat)
    {
        $detailAyat = Detail::where('nomorSurah', $nomorSurah)
            ->where('nomorAyat', $nomorAyat)
            ->first();

        if (!$detailAyat) {
            return response()->json([
                'kode' => 404,
                'pesan' => 'Ayat engga ada di Surah dan Ayat ini',
            ], 404);
        }

        return response()->json([
            'kode' => 200,
            'pesan' => 'Detail ayat berhasil diambil',
            'data' => $detailAyat,
        ]);
    }

    public function importDetails()
    {
        for ($nomor = 1; $nomor <= 114; $nomor++) {
            $response = Http::get("https://equran.id/api/v2/surat/{$nomor}");

            if ($response->successful()) {
                $ayatList = $response->json()['data']['ayat'];

                foreach ($ayatList as $ayat) {
                    // Simpan data ayat ke dalam database
                    Detail::updateOrCreate(
                        ['nomorSurah' => $nomor, 'nomorAyat' => $ayat['nomorAyat']],
                        [
                            'teksArab' => $ayat['teksArab'],
                            'teksLatin' => $ayat['teksLatin'],
                            'teksIndonesia' => $ayat['teksIndonesia'],
                            'audio' => json_encode($ayat['audio']),
                        ]
                    );
                }
            } else {
                return response()->json([
                    'kode' => 500,
                    'pesan' => "Kamu gagal ambil data untuk Surah {$nomor}",
                ], 500);
            }
        }

        return response()->json([
            'kode' => 200,
            'pesan' => 'Semua data detail ayat berhasil diimpor',
        ]);
    }

    public function getTafsirBySurah($nomorSurah)
    {
        $tafsir = Tafsir::where('nomorSurah', $nomorSurah)->get();

        if ($tafsir->isEmpty()) {
            return response()->json([
                'kode' => 404,
                'pesan' => 'Tafsir engga ada untuk Surah ini',
            ], 404);
        }

        return response()->json([
            'kode' => 200,
            'pesan' => 'Tafsir berhasil diambil',
            'data' => $tafsir,
        ]);
    }

    public function getAllTafsir()
    {
        return response()->json([
            'kode' => 200,
            'pesan' => 'Berhasil ambil semua data tafsir',
            'data' => Tafsir::all(),
        ]);
    }

    public function getTafsirByAyat($nomorSurah, $nomorAyat)
    {
        $tafsir = Tafsir::where('nomorSurah', $nomorSurah)
            ->where('nomorAyat', $nomorAyat)
            ->first();

        if (!$tafsir) {
            return response()->json([
                'kode' => 404,
                'pesan' => 'Tafsir engga ada untuk Surah dan Ayat ini',
            ], 404);
        }

        return response()->json([
            'kode' => 200,
            'pesan' => 'Tafsir berhasil diambil',
            'data' => $tafsir,
        ]);
    }
}
