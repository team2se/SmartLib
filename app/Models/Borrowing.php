<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Impor BelongsTo

class Borrowing extends Model
{
    use HasFactory;

    // protected $fillable = ['member_id', 'book_id', 'borrowed_date', 'due_date', 'returned_date', 'status'];

    /**
     * Mendapatkan buku yang terkait dengan peminjaman ini.
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
        // Laravel akan secara otomatis mengasumsikan foreign key 'book_id' di tabel 'borrowings'
        // untuk merujuk ke 'id' di tabel 'books'.
        // Jika nama foreign key berbeda, Anda bisa menentukannya sebagai argumen kedua.
        // Contoh: return $this->belongsTo(Book::class, 'custom_book_foreign_key');
    }

    /**
     * Mendapatkan anggota yang terkait dengan peminjaman ini.
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
        // Laravel akan secara otomatis mengasumsikan foreign key 'member_id' di tabel 'borrowings'.
    }
}