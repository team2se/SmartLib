<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Impor HasMany

class Member extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'email', 'phone_number', 'address'];

    /**
     * Mendapatkan semua catatan peminjaman untuk anggota ini.
     */
    public function borrowings(): HasMany
    {
        return $this->hasMany(Borrowing::class);
        // Laravel akan secara otomatis mengasumsikan foreign key 'member_id' di tabel 'borrowings'.
    }
}