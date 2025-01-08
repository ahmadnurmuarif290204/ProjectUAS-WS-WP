<?php

namespace App\Http\Controllers;

use App\Models\Quran;
use App\Models\Detail;
use App\Models\Tafsir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuranController extends Controller
{
    public function quran()
    {

        $response = Http::get('https://equran.id/api/v2/surat');


        if ($response->successful()) {
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
                'code' => 200,
                'message' => 'Data surah berhasil diambil',
                'data' => $surah,
            ]);
        } else {
            return response()->json([
                'code' => 500,
                'message' => 'Gagal mengambil data surah dari API eksternal',
            ], 500);
        }
    }

    public function importDetailsBySurah($nomorSurah)
    {
        try {
            $response = Http::get("https://equran.id/api/v2/surat/$nomorSurah");

            if ($response->successful()) {
                $data = $response->json()['data']['ayat'];


                foreach ($data as $ayat) {
                    Detail::updateOrCreate(
                        ['nomorSurah' => $nomorSurah, 'nomorAyat' => $ayat['nomorAyat']],
                        [
                            'teksArab' => $ayat['teksArab'],
                            'teksLatin' => $ayat['teksLatin'],
                            'teksIndonesia' => $ayat['teksIndonesia'],
                            'audio' => json_encode($ayat['audio']),
                        ]
                    );
                }

                return response()->json([
                    'code' => 200,
                    'message' => 'Data detail ayat berhasil diimpor',
                ]);
            } else {
                return response()->json([
                    'code' => 500,
                    'message' => 'Gagal mengambil detail ayat dari API eksternal',
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'Terjadi kesalahan saat mengimpor detail ayat',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getDetailsBySurah($nomorSurah)
    {
        $details = Detail::where('nomorSurah', $nomorSurah)->get();


        if ($details->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Tidak ada detail ayat ditemukan untuk surah ini',
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Detail ayat berhasil diambil',
            'data' => $details,
        ]);
    }

    public function getDetailAyat($nomorSurah, $nomorAyat)
    {
        $detail = Detail::where('nomorSurah', $nomorSurah)
            ->where('nomorAyat', $nomorAyat)
            ->first();


        if (!$detail) {
            return response()->json([
                'code' => 404,
                'message' => 'Detail ayat tidak ditemukan untuk surah dan ayat ini',
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Detail ayat berhasil diambil',
            'data' => $detail,
        ]);
    }
    public function getAllDetail()
    {
        $details = Detail::all();

        if ($details->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Tidak ada data ayat ditemukan',
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Semua ayat berhasil diambil',
            'data' => $details,
        ]);
    }


    public function importTafsirBySurah($nomorSurah)
    {
        try {
            $response = Http::get("https://equran.id/api/v2/tafsir/$nomorSurah");

            if ($response->successful()) {
                $data = $response->json()['data']['tafsir'];


                foreach ($data as $ayat) {
                    Tafsir::updateOrCreate(
                        ['nomorSurah' => $nomorSurah, 'nomorAyat' => $ayat['ayat']],
                        ['teksTafsir' => $ayat['teks']]
                    );
                }

                return response()->json([
                    'code' => 200,
                    'message' => 'Data tafsir berhasil diimpor',
                ]);
            } else {
                return response()->json([
                    'code' => 500,
                    'message' => 'Gagal mengambil tafsir dari API eksternal',
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'Terjadi kesalahan saat mengimpor tafsir',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function getAllTafsir()
    {
        $tafsir = Tafsir::all();

        if ($tafsir->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Tidak ada data tafsir ditemukan',
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Semua tafsir berhasil diambil',
            'data' => $tafsir,
        ]);
    }


    public function getTafsirBySurah($nomorSurah)
    {
        $tafsir = Tafsir::where('nomorSurah', $nomorSurah)->get();

        if ($tafsir->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Tidak ada tafsir ditemukan untuk surah ini',
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Tafsir berhasil diambil',
            'data' => $tafsir,
        ]);
    }


    public function getTafsirByAyat($nomorSurah, $nomorAyat)
    {
        $tafsir = Tafsir::where('nomorSurah', $nomorSurah)
            ->where('nomorAyat', $nomorAyat)
            ->first();

        if (!$tafsir) {
            return response()->json([
                'code' => 404,
                'message' => 'Tafsir tidak ditemukan untuk surah dan ayat ini',
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Tafsir berhasil diambil',
            'data' => $tafsir,
        ]);
    }
}
