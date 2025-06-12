<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BorrowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Aturan: Durasi peminjaman 7 hari
        $loanDuration = 7;

        // Menghapus data lama untuk menghindari duplikasi saat seeding ulang
        DB::table('borrowings')->truncate();

        DB::table('borrowings')->insert([

            // Skenario 1: Buku yang sedang dipinjam (belum jatuh tempo)
            [
                'member_id' => 1, // Budi Perkasa
                'book_id' => 3,   // Mastering Web Development
                'borrowed_date' => Carbon::now()->subDays(3),
                'due_date' => Carbon::now()->subDays(3)->addDays($loanDuration),
                'returned_date' => null,
                'status' => 'borrowed',
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3),
            ],

            // Skenario 2: Buku yang sudah dikembalikan (tepat waktu)
            [
                'member_id' => 2, // Siti Aminah
                'book_id' => 5,   // Atomic Habits
                'borrowed_date' => Carbon::now()->subDays(15),
                'due_date' => Carbon::now()->subDays(15)->addDays($loanDuration),
                'returned_date' => Carbon::now()->subDays(10), // Dikembalikan 5 hari setelah pinjam
                'status' => 'returned',
                'created_at' => Carbon::now()->subDays(15),
                'updated_at' => Carbon::now()->subDays(10),
            ],

            // Skenario 3: Buku yang sedang dipinjam dan sudah lewat jatuh tempo (overdue)
            [
                'member_id' => 3, // Rahmat Hidayat
                'book_id' => 2,   // Panduan Lengkap Database
                'borrowed_date' => Carbon::now()->subDays(10),
                'due_date' => Carbon::now()->subDays(10)->addDays($loanDuration), // Jatuh tempo 3 hari yang lalu
                'returned_date' => null,
                'status' => 'overdue',
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(10),
            ],

            // Skenario 4: Buku yang sudah dikembalikan, tapi terlambat
            [
                'member_id' => 4, // Dewi Lestari
                'book_id' => 1,   // Belajar Laravel dari Awal
                'borrowed_date' => Carbon::now()->subMonth(), // Pinjam sebulan lalu
                'due_date' => Carbon::now()->subMonth()->addDays($loanDuration),
                'returned_date' => Carbon::now()->subDays(5), // Baru dikembalikan 5 hari lalu (terlambat banyak)
                'status' => 'returned',
                'created_at' => Carbon::now()->subMonth(),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            
            // Skenario 5: Peminjaman lain yang masih aktif
            [
                'member_id' => 5, // Agus Santoso
                'book_id' => 4,   // The Art of Clean Code
                'borrowed_date' => Carbon::now()->subDay(), // Baru pinjam kemarin
                'due_date' => Carbon::now()->subDay()->addDays($loanDuration),
                'returned_date' => null,
                'status' => 'borrowed',
                'created_at' => Carbon::now()->subDay(),
                'updated_at' => Carbon::now()->subDay(),
            ],

            // --- Data Tambahan Hingga 14 ---

            // Skenario 6: Anggota yang sama punya 1 pinjaman aktif & 1 overdue
            [
                'member_id' => 6, // Eka Wijaya
                'book_id' => 8,   // Laskar Pelangi
                'borrowed_date' => Carbon::now()->subDays(5),
                'due_date' => Carbon::now()->subDays(5)->addDays($loanDuration),
                'returned_date' => null,
                'status' => 'borrowed',
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'member_id' => 6, // Eka Wijaya
                'book_id' => 9,   // Bumi Manusia
                'borrowed_date' => Carbon::now()->subDays(12),
                'due_date' => Carbon::now()->subDays(12)->addDays($loanDuration),
                'returned_date' => null,
                'status' => 'overdue',
                'created_at' => Carbon::now()->subDays(12),
                'updated_at' => Carbon::now()->subDays(12),
            ],

            // Skenario 7: Peminjaman yang sudah sangat lama dan sudah kembali
            [
                'member_id' => 7, // Putri Ayu
                'book_id' => 10,  // The Pragmatic Programmer
                'borrowed_date' => Carbon::now()->subMonths(6),
                'due_date' => Carbon::now()->subMonths(6)->addDays($loanDuration),
                'returned_date' => Carbon::now()->subMonths(6)->addDays(5),
                'status' => 'returned',
                'created_at' => Carbon::now()->subMonths(6),
                'updated_at' => Carbon::now()->subMonths(6)->addDays(5),
            ],

            // Skenario 8: Peminjaman yang jatuh tempo TEPAT HARI INI
            [
                'member_id' => 8, // Ahmad Fauzi
                'book_id' => 11,  // Design Patterns
                'borrowed_date' => Carbon::now()->subDays($loanDuration),
                'due_date' => Carbon::now()->endOfDay(), // Jatuh tempo hari ini
                'returned_date' => null,
                'status' => 'borrowed',
                'created_at' => Carbon::now()->subDays($loanDuration),
                'updated_at' => Carbon::now()->subDays($loanDuration),
            ],

            // Skenario 9: Peminjaman oleh anggota lain, sudah kembali
            [
                'member_id' => 9, // Faisal Tanjung
                'book_id' => 13,  // Negeri 5 Menara
                'borrowed_date' => Carbon::now()->subDays(20),
                'due_date' => Carbon::now()->subDays(20)->addDays($loanDuration),
                'returned_date' => Carbon::now()->subDays(15),
                'status' => 'returned',
                'created_at' => Carbon::now()->subDays(20),
                'updated_at' => Carbon::now()->subDays(15),
            ],

            // Skenario 10: Peminjaman yang baru saja dibuat hari ini
            [
                'member_id' => 10, // Indah Permata
                'book_id' => 14,   // 1984
                'borrowed_date' => Carbon::now(),
                'due_date' => Carbon::now()->addDays($loanDuration),
                'returned_date' => null,
                'status' => 'borrowed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Skenario 11: Buku yang sama (ID 1) dipinjam lagi setelah dikembalikan
            [
                'member_id' => 11, // Rina Wati
                'book_id' => 1,    // Belajar Laravel dari Awal
                'borrowed_date' => Carbon::now()->subDays(2),
                'due_date' => Carbon::now()->subDays(2)->addDays($loanDuration),
                'returned_date' => null,
                'status' => 'borrowed',
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            
            // Skenario 12 & 13: Anggota (ID 12) dengan riwayat pinjam banyak
            [
                'member_id' => 12, // Joko Susilo
                'book_id' => 15,   // Harry Potter
                'borrowed_date' => Carbon::now()->subMonths(3),
                'due_date' => Carbon::now()->subMonths(3)->addDays($loanDuration),
                'returned_date' => Carbon::now()->subMonths(3)->addDays(6),
                'status' => 'returned',
                'created_at' => Carbon::now()->subMonths(3),
                'updated_at' => Carbon::now()->subMonths(3)->addDays(6),
            ],
            [
                'member_id' => 12, // Joko Susilo
                'book_id' => 16,   // To Kill a Mockingbird
                'borrowed_date' => Carbon::now()->subDays(25),
                'due_date' => Carbon::now()->subDays(25)->addDays($loanDuration),
                'returned_date' => null,
                'status' => 'overdue',
                'created_at' => Carbon::now()->subDays(25),
                'updated_at' => Carbon::now()->subDays(25),
            ],

            // Skenario 14: Anggota (ID 13) pinjam buku yang stoknya sedikit
            [
                'member_id' => 13, // Lia Kurnia
                'book_id' => 7,    // Introduction to Algorithms (stoknya sedikit)
                'borrowed_date' => Carbon::now()->subDays(4),
                'due_date' => Carbon::now()->subDays(4)->addDays($loanDuration),
                'returned_date' => null,
                'status' => 'borrowed',
                'created_at' => Carbon::now()->subDays(4),
                'updated_at' => Carbon::now()->subDays(4),
            ],
        ]);
    }
}