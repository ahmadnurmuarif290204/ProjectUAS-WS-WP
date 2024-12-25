<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuranText extends Model
{
    protected $table    = 'quran_text';
    protected $primaryKey   = 'index';
    public $timestamps  = 'false';
    protected $fillable    = ['sura', 'aya', 'text'];
}
