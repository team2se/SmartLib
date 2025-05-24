<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Impor HasMany

class Book extends Model
{
    use HasFactory;

    // Jika Anda ingin mengizinkan mass assignment untuk kolom tertentu
    // protected $fillable = ['title', 'author', 'isbn', 'published_year', 'stock'];

    /**
     * Mendapatkan semua catatan peminjaman untuk buku ini.
     */
    public function borrowings(): HasMany
    {
        return $this->hasMany(Borrowing::class);
        // Laravel akan secara otomatis mengasumsikan foreign key 'book_id' di tabel 'borrowings'
        // dan local key 'id' di tabel 'books'.
        // Jika nama foreign key atau local key berbeda, Anda bisa menentukannya sebagai argumen kedua dan ketiga.
        // Contoh: return $this->hasMany(Borrowing::class, 'foreign_key_di_borrowings', 'local_key_di_books');
    }
}