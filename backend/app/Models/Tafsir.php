<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tafsir extends Model
{
    
    protected $table = 'tafsirs';

    protected $fillable = ['id','nomorSurah','nomorAyat','teksTafsir'];
       
    public $timestamps = true;
}
