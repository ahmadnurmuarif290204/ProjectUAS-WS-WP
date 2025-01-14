<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\QuranController;



Route::get('/', function () {
    return view('welcome');
});


