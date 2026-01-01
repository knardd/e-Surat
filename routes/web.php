<?php

use App\Http\Controllers\InstansiController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SuratController::class, 'pilih'])->name('surat.pilih');
Route::get('/surat/form/{jenis:slug}', [SuratController::class, 'form'])->name('surat.form');
Route::post('/surat/proses', [SuratController::class, 'proses'])->name('surat.proses');
Route::get('/surat/success/{id}', [SuratController::class, 'success'])->name('surat.success');
Route::get('/surat/pdf/{id}', [SuratController::class, 'pdf'])->name('surat.pdf');
Route::get('/surat/dashboard', [SuratController::class, 'dashboard'])->name('surat.dashboard');