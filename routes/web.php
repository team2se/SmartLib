<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;     // <--- 1. TAMBAHKAN IMPORT INI
use App\Http\Controllers\BorrowingController; // <--- 2. TAMBAHKAN IMPORT INI
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

    // Rute untuk resources
    Route::resource('books', BookController::class);
    Route::resource('members', MemberController::class);
    Route::resource('borrowings', BorrowingController::class); // <--- 3. PERBAIKI NAMA RESOURCE DAN CONTROLLER
    Route::middleware(['auth', 'verified'])->group(function () {
    // ... (rute profile, books, members) ...

    Route::resource('borrowings', BorrowingController::class);

    // Tambahkan rute ini untuk aksi pengembalian buku
    Route::put('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])
          ->name('borrowings.return'); // Memberi nama pada rute
});

});

require __DIR__.'/auth.php';