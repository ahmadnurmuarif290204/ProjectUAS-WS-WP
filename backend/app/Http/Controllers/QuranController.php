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
    // Fungsi untuk ambil data Surah dari API equran.id dan simpen ke database
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

        // Respon kalo gagal ambil data dari API
        return response()->json([
            'kode' => 500,
            'pesan' => 'Kamu gagal ambil data Surah nih !!',
        ], 500);
    }

    // Fungsi buat ambil semua detail ayat yang ada di database
    public function getAllDetail()
    {
        return response()->json([
            'kode' => 200,
            'pesan' => 'Kamu berhasil ambil semua data detail ayat',
            'data' => Detail::all(),
        ]);
    }

    // Fungsi buat ambil detail ayat berdasarkan nomor Surat
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

    // Fungsi buat ambil detail ayat berdasarkan nomor Surah dan Ayat
    public function getDetailAyat($nomorSurah, $nomorAyat)
    {
        // Cari detail ayat yang cocok dengan nomor Surah dan Ayat
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

    // Fungsi untuk Impor semua data detail ayat dari API ke database
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
                // Respon Kalo gagal ambil data, kasih tau error
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

    // Fungsi buat ambil tafsir berdasarkan nomor Surah
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

    // Fungsi buat ambil semua tafsir yang ada di database
    public function getAllTafsir()
    {
        return response()->json([
            'kode' => 200,
            'pesan' => 'Berhasil ambil semua data tafsir',
            'data' => Tafsir::all(),
        ]);
    }

    // Fungsi buat ambil tafsir berdasarkan nomor Surah dan Ayat
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
