<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('keperluan');
});
Route::post('/surat/keperluan', UserController::class, 'Keperluan');
Route::post('/surat/generate', UserController::class, 'generateSurat')->name('form');
