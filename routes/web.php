<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Operator\OperatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/cekSurat', [AdminController::class, 'cekSurat'])->name('admin.cekSurat');
    Route::get('/admin/surat/{id}', [AdminController::class, 'show'])->name('admin.show');
    Route::post('/admin/surat/{id}/approve', [AdminController::class, 'approve'])->name('admin.approve');
    Route::post('/admin/surat/{id}/reject', [AdminController::class, 'reject'])->name('admin.reject');
});

// Operator Routes
Route::middleware(['auth', 'role:operator'])->group(function () {
    Route::get('/operator/dashboard', [OperatorController::class, 'index'])->name('operator.dashboard');
    Route::get('/operator/surat/{id}', [OperatorController::class, 'show'])->name('operator.show');
    Route::post('/operator/surat/{id}/approve', [OperatorController::class, 'approve'])->name('operator.approve');
    Route::post('/operator/surat/{id}/reject', [OperatorController::class, 'reject'])->name('operator.reject');
    
    // User Management for Operator
    Route::get('/operator/users', [OperatorController::class, 'userIndex'])->name('operator.users.index');
    Route::post('/operator/users', [OperatorController::class, 'userStore'])->name('operator.users.store');
    Route::patch('/operator/users/{user}', [OperatorController::class, 'userUpdate'])->name('operator.users.update');
    Route::delete('/operator/users/{user}', [OperatorController::class, 'userDestroy'])->name('operator.users.destroy');
});

// User Routes (authenticated)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // User surat dashboard
    Route::get('/user/dashboard', [SuratController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/surat/download/{id}', [SuratController::class, 'download'])->name('surat.download');

    // Surat processing routes (authenticated)
    Route::get('/surat/pilih', [SuratController::class, 'pilih'])->name('surat.pilih');
    Route::get('/surat/form/{jenis:slug}', [SuratController::class, 'form'])->name('surat.form');
    Route::post('/surat/proses', [SuratController::class, 'proses'])->name('surat.proses');
    Route::get('/surat/success/{id}', [SuratController::class, 'success'])->name('surat.success');
    Route::get('/surat/pdf/{id}', [SuratController::class, 'pdf'])->name('surat.pdf');
});

require __DIR__.'/auth.php';
