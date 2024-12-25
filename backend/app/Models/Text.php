<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{

    protected $table = 'id_indonesian';
    protected $primaryKey = 'index';

    public $timestamps = false;
    protected $fillable = ['sura', 'aya', 'text'];
}
