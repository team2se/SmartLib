<?php

namespace App\Http\Controllers;

use App\Models\Book; // 1. Impor model Book
use Illuminate\Http\Request; // 2. Impor Request untuk validasi dan mendapatkan input
use Illuminate\Support\Facades\Validator; // Opsional, untuk validasi kustom jika diperlukan

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // Aksi untuk GET /books
    {
        // 3. Ambil semua buku dari database
        $books = Book::orderBy('title', 'asc')->paginate(10); // Contoh: urutkan berdasarkan judul, paginasi 10 item per halaman
        // 4. Kirim data buku ke view 'books.index'
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // Aksi untuk GET /books/create
    {
        // 5. Tampilkan view 'books.create' yang berisi form tambah buku
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // Aksi untuk POST /books
    {
        // 6. Validasi input dari form
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|max:20|unique:books,isbn', // isbn harus unik di tabel 'books'
            'published_year' => 'required|integer|min:1000|max:' . date('Y'), // Tahun terbit antara 1000 dan tahun sekarang
            'stock' => 'required|integer|min:0',
        ]);

        // 7. Buat instance Book baru dan simpan ke database
        // Book::create($validatedData); // Cara singkat jika $fillable di model sudah diatur

        $book = new Book();
        $book->title = $validatedData['title'];
        $book->author = $validatedData['author'];
        $book->isbn = $validatedData['isbn'];
        $book->published_year = $validatedData['published_year'];
        $book->stock = $validatedData['stock'];
        $book->save();

        // 8. Redirect ke halaman daftar buku dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book) // Aksi untuk GET /books/{book} - Route Model Binding
    {
        // 9. $book sudah otomatis berisi instance Book yang sesuai dengan ID di URL
        // Kirim data buku ke view 'books.show'
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book) // Aksi untuk GET /books/{book}/edit - Route Model Binding
    {
        // 10. $book sudah otomatis berisi instance Book yang akan diedit
        // Kirim data buku ke view 'books.edit'
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book) // Aksi untuk PUT/PATCH /books/{book} - Route Model Binding
    {
        // 11. Validasi input dari form (mirip dengan store, tapi perhatikan aturan 'unique' untuk isbn)
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            // Untuk isbn, pastikan unik kecuali untuk buku ini sendiri
            'isbn' => 'required|string|max:20|unique:books,isbn,' . $book->id,
            'published_year' => 'required|integer|min:1000|max:' . date('Y'),
            'stock' => 'required|integer|min:0',
        ]);

        // 12. Update data buku di database
        // $book->update($validatedData); // Cara singkat jika $fillable di model sudah diatur

        $book->title = $validatedData['title'];
        $book->author = $validatedData['author'];
        $book->isbn = $validatedData['isbn'];
        $book->published_year = $validatedData['published_year'];
        $book->stock = $validatedData['stock'];
        $book->save();

        // 13. Redirect ke halaman daftar buku (atau detail buku) dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Data buku berhasil diperbarui!');
        // Atau redirect ke halaman detail:
        // return redirect()->route('books.show', $book->id)->with('success', 'Data buku berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book) // Aksi untuk DELETE /books/{book} - Route Model Binding
    {
        // 14. Hapus buku dari database
        try {
            $book->delete();
            // 15. Redirect ke halaman daftar buku dengan pesan sukses
            return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            // Tangani jika ada error foreign key constraint (misalnya buku masih dipinjam)
            // Anda mungkin ingin memeriksa kode error spesifik ($e->errorInfo[1])
            return redirect()->route('books.index')->with('error', 'Gagal menghapus buku. Mungkin buku ini masih terkait dengan data peminjaman.');
        }
    }
}