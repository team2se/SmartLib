<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowingController; // 1. Impor BorrowingController

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Halaman awal (sementara diarahkan ke layouts.app, biasanya ke dashboard atau welcome)
Route::get('/', function () {
    return view('layouts.app'); // Ganti dengan view atau controller utama sesuai struktur aplikasimu
})->name('home');

// Rute resource untuk buku
Route::resource('books', BookController::class);

// Rute resource untuk anggota
Route::resource('members', MemberController::class);

// Rute untuk peminjaman & pengembalian buku
Route::get('borrowings', [BorrowingController::class, 'index'])->name('borrowings.index');
Route::get('borrowings/create', [BorrowingController::class, 'create'])->name('borrowings.create');
Route::post('borrowings', [BorrowingController::class, 'store'])->name('borrowings.store');
Route::put('borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.return');
Route::get('borrowings/{borrowing}', [BorrowingController::class, 'show'])->name('borrowings.show'); // Opsional
