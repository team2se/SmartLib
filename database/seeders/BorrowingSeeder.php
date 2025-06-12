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
                'member_id' => 1, // Asumsi member dengan ID 1 ada
                'book_id' => 3,   // Asumsi buku dengan ID 3 ada
                'borrowed_date' => Carbon::now()->subDays(3),
                'due_date' => Carbon::now()->subDays(3)->addDays($loanDuration),
                'returned_date' => null,
                'status' => 'borrowed',
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3),
            ],

            // Skenario 2: Buku yang sudah dikembalikan (tepat waktu)
            [
                'member_id' => 2,
                'book_id' => 5,
                'borrowed_date' => Carbon::now()->subDays(15),
                'due_date' => Carbon::now()->subDays(15)->addDays($loanDuration),
                'returned_date' => Carbon::now()->subDays(10), // Dikembalikan 5 hari setelah pinjam
                'status' => 'returned',
                'created_at' => Carbon::now()->subDays(15),
                'updated_at' => Carbon::now()->subDays(10),
            ],

            // Skenario 3: Buku yang sedang dipinjam dan sudah lewat jatuh tempo (overdue)
            [
                'member_id' => 3,
                'book_id' => 2,
                'borrowed_date' => Carbon::now()->subDays(10),
                'due_date' => Carbon::now()->subDays(10)->addDays($loanDuration), // Jatuh tempo 3 hari yang lalu
                'returned_date' => null,
                'status' => 'overdue',
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(10),
            ],

            // Skenario 4: Buku yang sudah dikembalikan, tapi terlambat
            [
                'member_id' => 4,
                'book_id' => 1,
                'borrowed_date' => Carbon::now()->subMonth(), // Pinjam sebulan lalu
                'due_date' => Carbon::now()->subMonth()->addDays($loanDuration),
                'returned_date' => Carbon::now()->subDays(5), // Baru dikembalikan 5 hari lalu (terlambat banyak)
                'status' => 'returned',
                'created_at' => Carbon::now()->subMonth(),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            
            // Skenario 5: Peminjaman lain yang masih aktif
            [
                'member_id' => 5,
                'book_id' => 4,
                'borrowed_date' => Carbon::now()->subDay(), // Baru pinjam kemarin
                'due_date' => Carbon::now()->subDay()->addDays($loanDuration),
                'returned_date' => null,
                'status' => 'borrowed',
                'created_at' => Carbon::now()->subDay(),
                'updated_at' => Carbon::now()->subDay(),
            ],

        ]);
    }
}