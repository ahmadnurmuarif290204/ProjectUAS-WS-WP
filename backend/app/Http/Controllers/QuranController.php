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
            $data = $response->json()['data'];

            foreach ($data as $item) {
                Quran::updateOrCreate(
                    [
                        'nomorSurah' => $item['nomor'],
                    ],
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
            return view('surah.index', compact('surah'));
        } else {
            return response()->json([
                'code' => 500,
                'message' => 'Failed to fetch data surah from external API',
            ], 500);
        }
    }

    
    public function audioSurah($nomor)
    {
        $surah = Quran::where('nomorSurah', $nomor)->first();
        if ($surah && $surah->audio_full) {
            $audioUrls = json_decode($surah->audio_full, true);
            return view('quran.audio', compact('surah', 'audioUrls'));
        }

        return redirect()->route('quran.index')->with('error', 'Audio tidak tersedia untuk surah ini.');
    }

    public function importAyat()
    {
        $client = new Client([
            'timeout' => 7200,
            'connect_timeout' => 7200,
            'retry' => 10,
        ]);

        for ($nomor = 1; $nomor <= 114; $nomor++) {
            $url = "https://equran.id/api/v2/surat/{$nomor}";
            $response = Http::get($url);

            if ($response->successful()) {
                $data = $response->json()['data']['ayat'];

                foreach ($data as $ayat) {
                    Detail::updateOrCreate(
                        [
                            'nomorSurah' => $nomor,
                            'nomorAyat' => $ayat['nomorAyat'],
                        ],
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
                    'code' => 500,
                    'message' => "Failed to fetch data ayat for surah {$nomor} from external API"
                ], 500);
            }
        }

        return response()->json([
            'code' => 200,
            'message' => 'All ayat data retrieved successfully'
        ]);
    }

    public function ayat($nomor)
    {
        $ayat = Detail::where('nomorSurah', $nomor)->get();
        $tafsir = Tafsir::where('nomorSurah', $nomor)->get();

        foreach ($ayat as $item) {
            $audioArray = json_decode($item->audio, true); 
            $item->audio_url = $audioArray['01'] ?? ''; 
        }

        return view('ayat.index', compact('ayat', 'tafsir', 'nomor'));
    }

    public function importTafsir()
    {
        $client = new Client([
            'timeout' => 7200,
            'connect_timeout' => 7200,
            'retry' => 10,
        ]);

        for ($nomor = 1; $nomor <= 114; $nomor++) {
            $url = "https://equran.id/api/v2/tafsir/{$nomor}";
            $response = Http::get($url);

            if ($response->successful()) {
                $data = $response->json()['data']['tafsir'];

                foreach ($data as $ayat) {
                    Tafsir::updateOrCreate(
                        [
                            'nomorSurah' => $nomor,
                            'nomorAyat' => $ayat['ayat'],
                        ],
                        [
                            'teksTafsir' => $ayat['teks'],
                        ]
                    );
                }
            } else {
                return response()->json([
                    'code' => 500,
                    'message' => 'Failed to fetch data tafsir for surah {$nomor} from external API'
                ], 500);
            }
        }

        return response()->json([
            'code' => 200,
            'message' => 'All tafsir data retrieved successfully'
        ]);
    }

    
    public function tafsir($nomor)
    {
        $tafsir = Tafsir::where('nomorSurah', $nomor)->get();
        return view('tafsir.index', compact('tafsir', 'nomor'));
    }
}
