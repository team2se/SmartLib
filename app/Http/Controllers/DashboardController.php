<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard dengan data ringkasan.
     */
    public function index()
    {
        // 1. Jumlah total buku
        $totalBooks = Book::count();

        // 2. Jumlah total anggota
        $totalMembers = Member::count();

        // 3. Jumlah buku yang sedang dipinjam
        $booksCurrentlyBorrowed = Borrowing::where('status', 'borrowed')->count();

        // 4. Jumlah buku yang sudah dikembalikan
        $booksReturned = Borrowing::where('status', 'returned')->count();

        // 5. (Opsional) Daftar buku yang akan segera jatuh tempo (misalnya, dalam 3 hari ke depan)
        $booksDueSoon = Borrowing::with(['book', 'member'])
                            ->where('status', 'borrowed')
                            ->where('due_date', '>=', Carbon::now())
                            ->where('due_date', '<=', Carbon::now()->addDays(3))
                            ->orderBy('due_date', 'asc')
                            ->limit(5) // Batasi 5 buku saja
                            ->get();

        // 6. (Opsional) Daftar buku yang sudah melewati jatuh tempo (terlambat)
        // --- KODE BARU YANG BENAR ---
$overdueBooks = Borrowing::with(['book', 'member'])
                            ->where('status', 'overdue') // Langsung cari status 'overdue'
                            ->orderBy('due_date', 'asc')
                            ->limit(5)
                            ->get();


        // Kirim data ke view
        return view('dashboard', compact(
            'totalBooks',
            'totalMembers',
            'booksCurrentlyBorrowed',
            'booksReturned',
            'booksDueSoon',
            'overdueBooks'
        ));
    }
}
