<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{

    protected $table = 'details';
    protected $fillable = ['id', 'nomorSurah', 'nomorAyat', 'teksArab', 'teksLatin', 'teksIndonesia', 'audio'];

    public $timestamps = true;
    protected $cast = ['audio' => 'array'];
    
}
