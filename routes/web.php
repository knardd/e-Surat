<?php
use App\Http\Controllers\SuratController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/admin', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [SuratController::class, 'pilih'])->name('surat.pilih');
Route::get('/surat/form/{jenis:slug}', [SuratController::class, 'form'])->name('surat.form');
Route::post('/surat/proses', [SuratController::class, 'proses'])->name('surat.proses');
Route::get('/surat/success/{id}', [SuratController::class, 'success'])->name('surat.success');
Route::get('/surat/pdf/{id}', [SuratController::class, 'pdf'])->name('surat.pdf');

require __DIR__.'/auth.php';
