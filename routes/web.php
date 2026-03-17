<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portfolio'); // Pastikan nama file di resources/views adalah portfolio.blade.php (huruf kecil semua)
});