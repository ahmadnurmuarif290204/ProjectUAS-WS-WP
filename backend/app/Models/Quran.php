<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quran extends Model
{
    protected $table = 'qurans';
    protected $fillable = ['id', 'nomorSurah', 'namaSurah', 'namaLatin', 'jumlahAyat', 'tempatTurun', 'arti', 'deskripsi', 'audio_full'];

    public $timestamps = true;
    protected $cast = ['audio_full' => 'array'];
}
