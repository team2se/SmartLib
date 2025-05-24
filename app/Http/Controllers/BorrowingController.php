<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Carbon\Carbon; // Untuk manipulasi tanggal

class BorrowingController extends Controller
{
    /**
     * Menampilkan daftar semua transaksi peminjaman.
     */
    public function index()
    {
        // Ambil semua data peminjaman, beserta data buku dan anggota terkait (eager loading)
        // Urutkan berdasarkan tanggal peminjaman terbaru
        $borrowings = Borrowing::with(['book', 'member'])
                                ->orderBy('borrowed_date', 'desc')
                                ->paginate(10); // Paginasi jika datanya banyak

        return view('borrowings.index', compact('borrowings'));
    }

    /**
     * Menampilkan form untuk peminjaman buku baru.
     */
    public function create()
    {
        // Ambil semua anggota dan buku untuk ditampilkan di dropdown
        // Hanya ambil buku yang stoknya > 0
        $members = Member::orderBy('name')->get();
        $books = Book::where('stock', '>', 0)->orderBy('title')->get();

        if ($books->isEmpty()) {
            return redirect()->route('borrowings.index')->with('error', 'Tidak ada buku yang tersedia untuk dipinjam saat ini.');
        }
        if ($members->isEmpty()) {
            return redirect()->route('borrowings.index')->with('error', 'Tidak ada data anggota. Tambahkan anggota terlebih dahulu.');
        }

        return view('borrowings.create', compact('members', 'books'));
    }

    /**
     * Menyimpan data peminjaman baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            // 'borrowed_date' => 'required|date', // Bisa di-set otomatis
            // 'due_date' => 'required|date|after_or_equal:borrowed_date', // Bisa di-set otomatis
        ]);

        $book = Book::find($validatedData['book_id']);

        // 1. Validasi stok buku
        if ($book->stock <= 0) {
            return redirect()->back()->withInput()->with('error', 'Maaf, stok buku "' . $book->title . '" telah habis.');
        }

        // 2. Cek apakah anggota sudah meminjam buku ini dan belum dikembalikan
        $existingBorrowing = Borrowing::where('member_id', $validatedData['member_id'])
                                      ->where('book_id', $validatedData['book_id'])
                                      ->where('status', 'borrowed')
                                      ->first();

        if ($existingBorrowing) {
            return redirect()->back()->withInput()->with('error', 'Anggota ini sudah meminjam buku "' . $book->title . '" dan belum dikembalikan.');
        }

        // 3. Buat data peminjaman baru
        $borrowing = new Borrowing();
        $borrowing->member_id = $validatedData['member_id'];
        $borrowing->book_id = $validatedData['book_id'];
        $borrowing->borrowed_date = Carbon::now(); // Tanggal pinjam hari ini
        $borrowing->due_date = Carbon::now()->addDays(7); // Jatuh tempo 7 hari dari sekarang (sesuaikan)
        $borrowing->status = 'borrowed'; // Status awal
        $borrowing->save();

        // 4. Kurangi stok buku
        $book->decrement('stock');

        return redirect()->route('borrowings.index')->with('success', 'Buku "' . $book->title . '" berhasil dipinjam.');
    }

    /**
     * Menampilkan detail transaksi peminjaman (Opsional).
     */
    public function show(Borrowing $borrowing) // Route Model Binding
    {
        // Eager load relasi book dan member jika belum otomatis ter-load
        $borrowing->load(['book', 'member']);
        return view('borrowings.show', compact('borrowing'));
    }


    /**
     * Mengubah status peminjaman menjadi 'returned' dan mencatat returned_date.
     */
    public function returnBook(Request $request, Borrowing $borrowing) // Route Model Binding
    {
        // Pastikan buku memang sedang dipinjam
        if ($borrowing->status !== 'borrowed') {
            return redirect()->route('borrowings.index')->with('error', 'Status peminjaman buku ini tidak valid untuk dikembalikan.');
        }

        // 1. Update status dan tanggal kembali
        $borrowing->status = 'returned';
        $borrowing->returned_date = Carbon::now();
        $borrowing->save();

        // 2. Tambah kembali stok buku
        // Pastikan relasi 'book' sudah terdefinisi di model Borrowing
        if ($borrowing->book) {
            $borrowing->book->increment('stock');
        } else {
            // Handle jika buku tidak ditemukan (seharusnya tidak terjadi jika data konsisten)
            return redirect()->route('borrowings.index')->with('warning', 'Buku berhasil dikembalikan, namun ada masalah saat memperbarui stok buku terkait.');
        }


        return redirect()->route('borrowings.index')->with('success', 'Buku "' . $borrowing->book->title . '" berhasil dikembalikan.');
    }
}
