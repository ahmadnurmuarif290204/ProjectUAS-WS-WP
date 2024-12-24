<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{

    protected $table = 'sura';

    protected $primaryKey = 'index';
    public $timestamps = false;
    protected $fillable = [
        'name_arabic',
        'name_english',
        'start',
        'ayas',
        'type',
        'order',
        'rukus',
    ];
}
