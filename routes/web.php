<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController; // PASTIKAN INI ADA DAN BENAR
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified']) // 'verified' opsional
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () { // 'verified' opsional, sesuaikan
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // INI BAGIAN PENTING UNTUK RUTE BUKU
    Route::resource('books', BookController::class);
});

require __DIR__.'/auth.php';